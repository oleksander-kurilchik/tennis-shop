<?php

namespace TrekSt\Modules\Delivery\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App;
use TrekSt\Modules\Delivery\Models\NovaposhtaCity;
use URL;
use DB;
use LisDev\Delivery\NovaPoshtaApi2;

class UpdateNovaposhtaCityDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'novaposhta:update-city';

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
//        if (!$this->confirm('Ви хочете оновити міста нової пошти ?')) {
//            return;
//        }
        $novaPoshta = new NovaPoshtaApi2(
            config("site.novaposhta_api_key"),
            'ru', // Язык возвращаемых данных: ru (default) | ua | en
            FALSE, // При ошибке в запросе выбрасывать Exception: FALSE (default) | TRUE
            'curl' // Используемый механизм запроса: curl (defalut) | file_get_content
        );
        $citiesValue = $novaPoshta->getCities();
        if ($citiesValue['success'] == true) {
//                App\Models\Frontend\IntimeCity::truncate();
            NovaposhtaCity::truncate();
            foreach ($citiesValue['data'] as $key => $item) {
//                if ($item['Ref'] == 'db5c88d4-391c-11dd-90d9-001a92567626'){
//                    $dddd = 10;
//                }
                echo "Додано " . ($key + 1) . " міст \r";
                $city = new NovaposhtaCity($item);
                $city->Conglomerates = json_encode($item['Conglomerates']);
                $city->save();
            }
            echo "\nОновлення міст завершено\n";
        } else {
            echo '\nПомилка отримання даних\n';
        }


    }
}
