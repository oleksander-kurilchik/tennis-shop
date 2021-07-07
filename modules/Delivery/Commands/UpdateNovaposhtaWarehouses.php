<?php

namespace TrekSt\Modules\Delivery\Commands;

use Illuminate\Console\Command;
use URL;
use DB;
use LisDev\Delivery\NovaPoshtaApi2;
use  TrekSt\Modules\Delivery\Models\NovaposhtaWarehouse;

class UpdateNovaposhtaWarehouses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'novaposhta:update-warehouses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update novaposhta city database';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        if (!$this->confirm('Ви хочете оновити відділення нової пошти ?')) {
//            return;
//        }
        $novaPoshta = new NovaPoshtaApi2(
            config("site.novaposhta_api_key"),
            'ru', // Язык возвращаемых данных: ru (default) | ua | en
            FALSE, // При ошибке в запросе выбрасывать Exception: FALSE (default) | TRUE
            'curl' // Используемый механизм запроса: curl (defalut) | file_get_content
        );
        $citiesValue = $novaPoshta->getWarehouses(null);
        if ($citiesValue['success'] == true) {
            NovaposhtaWarehouse::truncate();
            foreach ($citiesValue['data'] as $key => $item) {
                echo "Додано " . ($key + 1) . " відділень \r";
                $waarehouse = new NovaposhtaWarehouse($item);
//                $city->Conglomerates = json_encode($item['Conglomerates']);
                $waarehouse->save();
            }
            echo "\nОновлення відділень завершено\n";
        } else {
            echo '\nПомилка отримання даних\n';
        }


    }
}
