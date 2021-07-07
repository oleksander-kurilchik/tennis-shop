<?php
namespace TrekSt\Modules\Products\Seo\SchemaOrg;


use Carbon\Carbon;
use Spatie\SchemaOrg\Schema;
use CurrencyHandler;

class ProductSchemaOrg
{
    protected $model;
    public function __construct($model)
    {
        $this->model = $model;
    }
    public function render(){

        $model = $this->model;
        $product = Schema::product();
        $product->name($model->trans->title);
        $product->description($model->trans->short_description);
        $product->productID($model->vendor_code);
        $product->sku($model->vendor_code);
        $product->url($model->front->url);

        if ($model->logo) {
            $product->logo([$model->logo->path->path_1x, $model->logo->path->path_2x, $model->logo->path->path_3x]);
        }
        $images = [];
        foreach ($model->images as $image) {
            $images[] = $image->path->path_1x;
            $images[] = $image->path->path_2x;
            $images[] = $image->path->path_3x;

        }
        if (count($images)) {
            $product->image($images);
        }
        $offer = Schema::offer();
        $offer->price($model->front->price);
        $offer->url($model->front->url);
        $offer->priceCurrency(strtoupper(CurrencyHandler::current()->code));
        $offer->availability(\Spatie\SchemaOrg\ItemAvailability::PreOrder);
         $offer->priceValidUntil(Carbon::now()->addYear()->toIso8601String());
        $product->offers($offer);
        $agregateRating = Schema::aggregateRating();
        $agregateRating->ratingValue(5);
        $agregateRating->reviewCount(1);
        $product->aggregateRating($agregateRating);
        return $product->toScript();
    }

}
