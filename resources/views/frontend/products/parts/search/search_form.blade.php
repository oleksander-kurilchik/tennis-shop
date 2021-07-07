<form  class="p-page-search__search-form pb-4" action="{{route("frontend.products.search")}}">
    <div class="input-group p-page-search__search-form-input-group" >
        <input type="text" class=" form-control__default " placeholder="@lang('search.search')"   name="search"  value="{{Request::get("search")}}" inputmode="search"  >
        <div class="input-group-append p-page-search__search-form-append">
            <button class="button-default-primary p-page-search__search-form-submit" type="submit" >
                <svg class="p-page-search__search-form-image-submit" width="20" height="20" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 20 20">
                    <g>
                        <g>
                            <path d="M8.56929,2.10526c3.35062,0 6.07643,2.67579 6.07643,5.96491c0,3.28913 -2.72581,5.96491 -6.07643,5.96491c-3.35062,0 -6.07643,-2.67578 -6.07643,-5.96491c0,-3.28912 2.72581,-5.96491 6.07643,-5.96491zM19.69357,18.20596l-4.84214,-4.94771c1.245,-1.45404 1.92714,-3.28351 1.92714,-5.18807c0,-4.44983 -3.685,-8.07018 -8.21428,-8.07018c-4.52929,0 -8.21429,3.62035 -8.21429,8.07018c0,4.44982 3.685,8.07017 8.21429,8.07017c1.70035,0 3.32071,-0.50386 4.70607,-1.46035l4.87893,4.98526c0.20392,0.20807 0.47821,0.32281 0.77214,0.32281c0.27821,0 0.54214,-0.10421 0.7425,-0.29368c0.42571,-0.40246 0.43928,-1.06983 0.02964,-1.48843z" fill="#000000" fill-opacity="1"></path>
                        </g>
                    </g>
                </svg>
            </button>
        </div>
    </div>
</form>
