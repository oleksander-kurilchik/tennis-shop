<?php

use Illuminate\Database\Seeder;
use TrekSt\Modules\Products\Repositories\Admin\ProductsImagesRepository;
use TrekSt\Modules\Products\Services\ProductsImageService;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $imageService = new ProductsImageService();
        $imageRepository = new ProductsImagesRepository();

        $rawProducts   = factory(\TrekSt\Modules\Products\Models\Product::class, 1000)->raw();
        $debug = 0 ;
        $productRepositories = new \TrekSt\Modules\Products\Repositories\Admin\ProductsRepository();
        $productImageRepositories = new \TrekSt\Modules\Products\Repositories\Admin\ProductsImagesRepository();
        foreach ($rawProducts as $rawProduct){
            $product =  $productRepositories->create($rawProduct);
            $rawImages  = factory(\TrekSt\Modules\Products\Models\ProductsImage::class, 8)->raw();
            foreach ($rawImages as $rawImage)
            {
               $img =  new  \Illuminate\Http\UploadedFile($rawImage['file']->getRealPath(),$rawImage['file']->getFilename());
                $imageName = $imageService->create($img);
                $imageRepository->create([
                    'image_name' => $imageName, 'products_id' => $product->id
                ]);
            }
        }

    }
}
