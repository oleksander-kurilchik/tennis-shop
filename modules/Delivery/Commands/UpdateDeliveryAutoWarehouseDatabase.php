<?php

namespace TrekSt\Modules\Delivery\Commands;

use Illuminate\Console\Command;
use LaravelLocalization;
use Carbon\Carbon;
use App;
use TrekSt\Modules\Delivery\Models\DeliveryAutoWarehouse;
use URL;


use DB;
use DeliveryAuto\Auto;



class UpdateDeliveryAutoWarehouseDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'delivery:update-warehouse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update delivery city database';

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
//        if (!$this->confirm('Ви хочете оновити відділення Delivery Auto ?')) {
//            return;
//        }

        $culture = 'ua';
        $secret = config('site.deliveri.secret', 'cbc9d94a4f3fb782dad3b4b68071d77d');
        $publicKey = config('site.deliveri.public_key', 'CDE23A92-8DDB-E811-8182-000D3A20E396');
        $country = 1;
        $devAuto = new Auto($publicKey, $secret, $culture, $country);
        $response = json_decode($devAuto->getWarehouseCity([ ]), true);


        if ($response['status'] == true) {
            DeliveryAutoWarehouse::truncate();

            foreach ($response['data'] as $key => $item) {
                echo "Додано " . ($key + 1) . " відділень \r";
                $warehouse = new DeliveryAutoWarehouse($item);
                $warehouse->save();
            }
            echo "\nОновлення відділень завершено\n";
        } else {
            echo '\nПомилка отримання даних\n';
        }


    }
}
