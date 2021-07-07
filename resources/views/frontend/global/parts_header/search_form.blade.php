<form action="{{route('frontend.products.search')}}"  class="input-group b-search-form ">
    <div class="input-group-prepend">
        <button type="submit" class="b-search-form__submit  ">


            <svg width="21" height="20" viewBox="0 0 21 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="8.33333" cy="8.33333" r="7.33333" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M20.0004 20L14.2227 14.2222" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>




        </button>

    </div>
    <input  placeholder="@lang('header.search')..." name="search" type="text" class="form-control__default   b-search-form__input js-b-search-form__input" aria-label=" "
    autocomplete="off"
    >
</form>
