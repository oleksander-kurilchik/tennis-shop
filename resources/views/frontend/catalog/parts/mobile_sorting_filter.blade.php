<div class="p-catalog__mobile-filter-sorting container d-block d-lg-none">
    <div class="row">
        <div class="col-md-6 p-catalog__mobile-filter-item p-catalog__mobile-sorting">
            <select class="form-control__default p-catalog__select-sorting js-p-catalog__select-sorting w-100" autocomplete="off"
                    data-placeholder="@lang('category.sorting.title')"
            >
                <option></option>
                <option data-type="price-asc" value="{{Request::fullUrlWithQuery(['sorting' => 'price-asc'])}}"
                    {{ Request::get('sorting') == 'price-asc'?' selected ':''}}
                >@lang('category.sorting.cheaper')</option>
                <option data-type="price-desc" value="{{Request::fullUrlWithQuery(['sorting' => 'price-desc'])}}"
                    {{ Request::get('sorting') == 'price-desc'?' selected ':''}}
                >@lang('category.sorting.expensive')</option>
                <option data-type="top" value="{{Request::fullUrlWithQuery(['sorting' => 'top'])}}"
                    {{ Request::get('sorting') == 'top'?' selected ':''}}
                >@lang('category.sorting.top')</option>
                <option data-type="new" value="{{Request::fullUrlWithQuery(['sorting' => 'new'])}}"
                    {{ Request::get('sorting') == 'new'?' selected ':''}}
                >@lang('category.sorting.new')</option>
                <option data-type="sale" value="{{Request::fullUrlWithQuery(['sorting' => 'sale'])}}"
                    {{ Request::get('sorting') == 'sale'?' selected ':''}}
                >@lang('category.sorting.sale')</option>
            </select>

        </div>
        <div class="col-md-6 p-catalog__mobile-filter-item">
            <button class="button-default-primary button-default-primary_sm w-100 js-category-show-filters">
                <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16 1H0L6.4 8.35778V13.4444L9.6 15V8.35778L16 1V1Z" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Фільтри (2)
            </button>
        </div>
    </div>
</div>
