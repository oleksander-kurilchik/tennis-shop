<div class="p-catalog__filters">
    <div class="p-catalog__filters-container">
        <div class="p-catalog__filters__title-block d-flex d-lg-none justify-content-between ">
            <div class="p-catalog__filters-title">
                Фільтри
            </div>
            <div class="p-catalog__filters-close-modals">
                <button class="close js-category-close-filters">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 1L1 15" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M1 1L15 15" stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>


            </div>

        </div>


        <div class="p-catalog__filters-group">

            <div class="b-card-list">
                <div class="b-card-list__groups-list">
                    @if ($subCategories->isNotEmpty())
                        <div class="b-card-list__group">
                            <div class="b-card-list__group-title">
                                @lang('category.sub_category')
                            </div>
                            <div class="b-card-list__group-content">
                                @foreach($subCategories as $subCategory)
                                    <div class="b-card-list__group-item">
                                        <div class="form-checkbox-primary">
                                            <input class="form-checkbox-primary__input-default js-b-filter-block__categories-item-input" type="checkbox" value="{{$subCategory->id}}"
                                                   id="sub_category_{{$subCategory->id}}" autocomplete="off"  {{$subCategory->checked?'checked':''}}>
                                            <label  class="form-checkbox-primary__label-default "
                                                    for="sub_category_{{$subCategory->id}}">
                                                {{$subCategory->trans->title}}
                                            </label>

                                        </div>

                                    </div>
                                @endforeach



                            </div>
                        </div>




                    @endif



                    <div class="b-card-list__group">
                        <div class="b-card-list__group-title">
                            @lang('category.Price')
                        </div>
                        <div class="b-card-list__group-content">
                            @include('frontend.catalog.parts.range-price-slider')
                         </div>
                    </div>

                    @foreach($filters as $filter)
                        <div class="b-card-list__group">
                            <div class="b-card-list__group-title">
                                {{$filter->trans->title}}
                            </div>
                            <div class="b-card-list__group-content">
                                @foreach($filter->values as $filterValue)
                                    <div class="b-card-list__group-item {{$loop->iteration>8?'d-none':''}}">
                                        <div class="form-checkbox-primary">
                                            <input class="form-checkbox-primary__input-default js-b-filter-block__filter-item-input" type="checkbox" value="{{$filterValue->id}}"
                                                   id="category_filter_value_{{$filterValue->id}}" autocomplete="off" {{$filterValue->checked?'checked':''}}>
                                            <label  class="form-checkbox-primary__label-default "
                                                    for="category_filter_value_{{$filterValue->id}}">
                                                {{$filterValue->trans->title}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
                                @if($filter->values->count() > 8)
                                    <div class="b-card-list__group-item-show-more js-b-card-list__group-item-show-more">
                                      @lang('category.show_more')   {{ $filter->values->count() - 8}} <svg width="10" height="6" viewBox="0 0 10 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.75078 5.875C4.91693 6.04167 5.08307 6.04167 5.24922 5.875L9.85981 1.28125C10.0467 1.09375 10.0467 0.916667 9.85981 0.75L9.26791 0.125C9.081 -0.0416667 8.90446 -0.0416667 8.73832 0.125L5 3.84375L1.26168 0.125C1.09553 -0.0416667 0.919003 -0.0416667 0.732087 0.125L0.140187 0.75C-0.046729 0.916667 -0.046729 1.09375 0.140187 1.28125L4.75078 5.875Z" fill="#1D2E72"/>
                                        </svg>
                                    </div>
                                    <div class="b-card-list__group-item-hide js-b-card-list__group-item-hide d-none">
                                        @lang('category.show_less')
                                    </div>
                                @endif


                            </div>
                        </div>


                    @endforeach
                        <div class="b-card-list__group d-block d-lg-none">
{{--                            <div class="b-card-list__group-title">--}}
{{--                                --}}
{{--                            </div>--}}
                            <div class="b-card-list__group-content">
                                <button  class="button-default js-b-filter-block__apply-filter w-100">Застосувати</button>

                            </div>
                        </div>

                </div>



            </div>








        </div>


    </div>


</div>
