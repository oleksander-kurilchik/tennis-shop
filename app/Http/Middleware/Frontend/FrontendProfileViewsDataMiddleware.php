<?php
namespace App\Http\Middleware\Frontend;

use App\Classes\CategoriesMenuHandler;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\View;
use TrekSt\Modules\Categories\Models\Category;
use TrekSt\Modules\Menus\Repositories\Frontend\MenuRepository;
use TrekSt\Modules\Orders\Models\Order;
use TrekSt\Modules\Orders\Services\Frontend\CartService;
use TrekSt\Modules\Products\Models\Product;
use Schema;
use Cache;
use DB;

class FrontendProfileViewsDataMiddleware
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
        $this->assignToViews();
        return $next($request);
    }


    protected function assignToViews(){
//         View::share('_cartValue',  (new CartService(new Product))->response());
//        $_footerMenu =  (new MenuRepository())->getMenu('footer');
//        View::share('_headerMenu', $_headerMenu);
//        $menuCategories = CategoriesMenuHandler::getInstance()->getCategories();
//        View::share('_menuCategories', $menuCategories);
//        View::share('_footerMenu', $_footerMenu);
        $user = \Auth::guard('frontend')->user();
        $_menuOrdersQty =      Order::query()->where('users_id',\Auth::guard('frontend')->user()->id)->whereIn('status', [Order::NEW_ORDER,Order::BEING_PROCESSED,Order::CONFIRMED,Order::PAID,Order::RETURNED_FOR_REVISION])->count();
        View::share('_menuOrdersQty', $_menuOrdersQty);

    }

}
