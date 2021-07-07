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
use TrekSt\Modules\Products\Repositories\Frontend\ProductsRepository;
use TrekSt\Modules\Wishlist\Repository\Frontend\WishlistRepository;

class FrontendViewsDataMiddleware
{
    public function __construct(){
        $this->productsRepository = new ProductsRepository();
    }

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
         View::share('_cartValue',  (new CartService(new Product))->response());
        $_footerMenu =  (new MenuRepository())->getMenu('footer');
//        View::share('_headerMenu', $_headerMenu);
        $menuCategories = CategoriesMenuHandler::getInstance()->getCategories();
        View::share('_menuCategories', $menuCategories);
        View::share('_footerMenu', $_footerMenu);

        View::share('_wishlistQty', \WishlistHandler::getCount());

    }

}
