<?php


namespace TrekSt\Modules\Orders\Services;


use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class OrderXlsxService
{
    public function __construct($order, $user)
    {
        $this->user = $user;
        $this->order = $order;
    }


    protected function getHeaderBoldStyle(){
        return  [
            'font' => [
                'name' => 'Arial',
                'bold' => true,
                'italic' => false,
                'strikethrough' => false,
                'size'=>12,

            ],

            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ]
        ];
    }


    protected function getBoldStyle(){
        return  [
            'font' => [
                'name' => 'Arial',
                'bold' => true,
                'italic' => false,
                'strikethrough' => false,
                'size'=>10,

            ],

        ];
    }




    public function save($file){



        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $spreadsheet->getDefaultStyle()->getFont()->setSize(10);

        $sheet->getColumnDimension('A')->setWidth(25);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(25);
        $sheet->mergeCells('A1:D1');
        $sheet->setCellValue('A1',trans('excel.order.number_order').$this->order->id);
        $sheet->getStyle('A1')->applyFromArray($this->getHeaderBoldStyle());

        $sheet->setCellValue('A3', trans('excel.order.pip') );
        $sheet->getStyle('A3')->applyFromArray($this->getBoldStyle());

        $sheet->setCellValue('B3',$this->user->first_name);
        $sheet->setCellValue('C3',$this->user->last_name );
        $sheet->setCellValue('D3',$this->user->patronymic );


        $userData = [
            trans('excel.order.email') => $this->user->email,
            trans('excel.order.phone') => $this->user->phone,
            trans('excel.order.country') => $this->user->country->{'title_'.app()->getLocale()},
            trans('excel.order.regions') =>$this->user->country->id == 1? $this->user->region->{'title_'.app()->getLocale()}:'',
            trans('excel.order.city') => $this->user->city,
            trans('excel.order.address') => $this->user->address,
            trans('excel.order.company') => $this->user->company,
            trans('excel.order.stores_number') => $this->user->stores_number,
            trans('excel.order.date') => $this->order->date_order,

        ] ;

        $iteration = 4;
        foreach ($userData as $title=>$value){
            $sheet->setCellValue('A'.$iteration,$title );
            $sheet->getStyle('A'.$iteration)->applyFromArray($this->getBoldStyle());
            $sheet->mergeCells("B{$iteration}:D{$iteration}");
            $sheet->setCellValue("B{$iteration}",$value);

            $sheet->setCellValueExplicit("B{$iteration}",$value,DataType::TYPE_STRING);
            $iteration++;

        }
        $iteration++;
        $sheet->mergeCells("A{$iteration}:D{$iteration}");
        $sheet->setCellValue("A{$iteration}",trans('excel.order.product_list'));
        $sheet->getStyle("A{$iteration}")->applyFromArray($this->getHeaderBoldStyle());
        $iteration++;
        $sheet->setCellValue("A{$iteration}",trans('excel.order.product_name'));
        $sheet->setCellValue("B{$iteration}",trans('excel.order.vendor_code'));
        $sheet->setCellValue("C{$iteration}",trans('excel.order.dimensional_grid'));
        $sheet->setCellValue("D{$iteration}",trans('excel.order.qty'));

        $sheet->getStyle('A'.$iteration)->applyFromArray($this->getBoldStyle());
        $sheet->getStyle('B'.$iteration)->applyFromArray($this->getBoldStyle());
        $sheet->getStyle('C'.$iteration)->applyFromArray($this->getBoldStyle());
        $sheet->getStyle('D'.$iteration)->applyFromArray($this->getBoldStyle());

        $iteration++;
        foreach ($this->order->products as $productItem)
        {
            $product = $productItem->product;
            if($product){
                $sheet->setCellValueExplicit("A{$iteration}", $product->trans->title  ,DataType::TYPE_STRING  );
                $sheet->setCellValueExplicit("B{$iteration}", $product->vendor_code ,DataType::TYPE_STRING   );
                $sheet->setCellValueExplicit("C{$iteration}", $product->dimensional_grid ,DataType::TYPE_STRING   );
                $sheet->setCellValueExplicit("D{$iteration}", $productItem-> quantity ,DataType::TYPE_STRING );
            }
            else{
                $sheet->setCellValueExplicit("A{$iteration}", $productItem->product_name ,DataType::TYPE_STRING  );
                $sheet->setCellValueExplicit("B{$iteration}", $productItem->vendor_code ,DataType::TYPE_STRING   );
                $sheet->setCellValueExplicit("C{$iteration}", $productItem->dimensional_grid ,DataType::TYPE_STRING   );
                $sheet->setCsetCellValueExplicitellValue("D{$iteration}", $productItem-> quantity  );

            }
            $iteration++;
        }

        $writer = new Xlsx($spreadsheet);
        $writer->save($file);



    }








}
