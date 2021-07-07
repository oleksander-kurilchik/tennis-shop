<div class="image-block-form pt-4">
    <div class="card">
        <div class="card-header">Зображення</div>
        <div class="card-body">
            @forelse($images as $image_item)

                <div class="pt-4 pb-4 w-100">
                    @include("admin.products.image_size_button",["image_item"=>$image_item])
                </div>

            @empty
                <div class="no-found-images">
                    Зображень не знайдено
                </div>
            @endforelse
        </div>
    </div>
</div>