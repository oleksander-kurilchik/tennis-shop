<?php
namespace App\Http\Middleware\Frontend;

use App\Classes\CategoriesMenuHandler;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\View;
use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\Menus\Repositories\Frontend\MenuRepository;
use TrekSt\Modules\Orders\Services\Frontend\CartService;
use TrekSt\Modules\Products\Models\Product;
use Schema;
use Cache;
use DB;

class FrontendSettingsMiddleware
{

    /**
     * Change the Request headers to accept "application/json" first
     * in order to make the wantsJson() function return true
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->lodFrontendSettings();
        return $next($request);
    }

    protected function lodFrontendSettings(){
//        $allConfig = config();
//        $allConfig = 10;

        $array_settings =  Cache::remember("frontend.settings.all_".app()->getLocale(), 6000, function () {
            $locale = app()->getLocale();
            $array_settings = [];
            if (Schema::hasTable('settings')) {
                $primarySettings = DB::table('settings')
                    ->where ('languages_id',$locale );
                $settings = DB::table('settings')
                    ->whereNull('languages_id')
                    ->whereNotIn('key',function($query) use ($locale){
                        $query->select('key')->from('settings')->where('languages_id',$locale);
                    })
                    ->union($primarySettings)
                    ->get();
                foreach ($settings as $item){
                    $array_settings [$item->key] = $item->value;
                }
            }
            return $array_settings;
        });
        config($array_settings);
//        $allConfig = config('*');
        $debug = 10;

    }

}
