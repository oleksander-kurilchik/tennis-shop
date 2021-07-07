<?php


namespace TrekSt\Modules\Orders\Repositories\Account;


use TrekSt\Modules\Orders\Models\Order;

class OrdersRepository
{
    public function __construct($userId)
    {
        $this->userId = $userId;

        $this->orderModel = new Order;

    }

    public function paginateActual( )
    {
        $query = $this->orderModel->newQuery()->where('users_id',$this->userId)->orderByDesc('id');

            $query->whereIn('status', [Order::NEW_ORDER,Order::BEING_PROCESSED,Order::CONFIRMED,Order::PAID,Order::RETURNED_FOR_REVISION])  ;

        return $query->with(['products.product.logo','products.product.trans','products.price','price'])->paginate();
    }

    public function paginateComplete( )
    {
        $query = $this->orderModel->newQuery()->orderByDesc('id');
        $query->whereIn('status', [Order::COMPLETED,Order::CANCELED])  ;
        return $query->paginate();
    }


    public function deleteById($id)
    {
        $model = $this->orderModel->newQuery()->findOrFail($id);
        $model->delete();
        return $model;
    }



}
