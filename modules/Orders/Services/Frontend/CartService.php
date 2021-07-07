<?php


namespace TrekSt\Modules\Orders\Services\Frontend;

use Cart;
use Gloudemans\Shoppingcart\CartItem;
use TrekSt\Modules\Products\Models\Product;
class CartService
{
    protected $productModel;
    protected $cartInstance;
    public function __construct($productModel )
    {
        /** @var $productModel Product   */
        $this->productModel = $productModel;
        $this->cartInstance = Cart::instance('shopping');
    }
    public function addProductToCart($productId, $qty , $params = []  ){

        $product = $this->productModel->newQuery()->published()->where('id', $productId)->first();
        $this->cartInstance->add([
            'id' => $productId,
            'name' => $productId,
            'qty' => $qty,
            'price' => $product->front->price,
        ]);

        return [
            'title' => $product->trans->title,
            'logo' => $product->logo ? $product->logo->path->path_0x : ''
        ];

    }


    public function response(){

        $cart_content =  $this->cartInstance->content();
        $total_count = 0;
        $total_price = 0;
        $cartItems = collect();
        $code = __('globals.courses.' . \CurrencyHandler::currentCode());
         if ($this->cartInstance->count() === 0) {
             return $this->getEmptyResponse();
         }
        $total_count = Cart::count();
        $productIds = $cart_content->pluck('id');
        $products = $this->productModel->newQuery()->published()->whereIn('id', $productIds)->with(['trans', 'logo'])->get();
        foreach ($cart_content as $key => $cartItem) {
            $itemOptions = $cartItem->options;
            $product = $products->where('id', $cartItem->id)->first();
            if ($product == null) {
                $this->cartInstance->remove($key);
                continue;
            }
            $item = $this->productResponse($product, $cartItem);/// $product->makeCartResponse();
            $item ['card_id'] = $key;
            $cartItems[] = $item;
            $total_price += $item ['totalPrice'];
        }
        $cartItems = $cartItems->sortBy('sorting')->values();
        $total_price = format_price(round($total_price, \CurrencyHandler::current()->round));
        return ['items' => $cartItems, 'totalPrice' => $total_price, 'count' => $total_count, 'code' => $code];


    }


    protected function productResponse($product,$cartItem){

        $response = [
            'title'=>$product->trans->title,
            'url'=>$product->front->url,
            'products_id'=> $product->id,
            'id'=> $product->id,
            'sorting' => $product->sorting,
            'price' => format_price($product->front->price),
            'oldPrice' =>  $product->front->old_price?format_price($product->front->old_price ):null,
            'vendor_code' => $product->vendor_code,
            'code' => $product->code,
            'code' => 'грн.',
            'qty' => $cartItem->qty,
            'totalPrice' => format_price(round($cartItem->qty * $product->price, 2)),
        ];
        $logo = '';
        if ($product->logo !== null) {
            $logo = $product->logo->path->path_0x;
        }
        else{
            $logo =  $product->noImage;
        }
        $response['logo'] = $logo;
        return $response;

    }
    protected function getEmptyResponse(){
       return ['items' => 0, 'totalPrice' => 0, 'count' => 0, 'code' => $code = trans('globals.courses.' . \CurrencyHandler::currentCode())];
    }

    public function getCount(){
       return  $this->cartInstance->count();
    }

    public function changeProductCount($cartItemId ,$count){
        try {
            $item = $this->cartInstance->get($cartItemId);
        } catch (\Exception $exception) {

        }
        if ($item != null) {
            $this->cartInstance->update($cartItemId,$count);
        }
    }


    public function deleteItem($cartItemId){
        try {
            $this->cartInstance->remove($cartItemId);
        } catch (\Exception $exception) {
        }
    }









    public function clearCart(){
        $this->cartInstance->destroy();
    }

    public function getContent(){
       return $this->cartInstance->content();
    }








}
