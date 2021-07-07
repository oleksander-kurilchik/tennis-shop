
@if(!Auth::guard('frontend')->check())
<a href="{{route('frontend.account.login')}}" class="b-image-primary-btn b-header__profile-btn">
                        <span class="b-image-primary-btn__logo ">

                            <svg class="b-image-primary-btn__logo-img b-header__profile-btn-icon" width="20px"
                                 viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.6 21V18.7778C18.6 16.3232 16.6301 14.3333 14.2 14.3333H5.4C2.96995 14.3333 1 16.3232 1 18.7778V21"
                                stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <ellipse cx="9.80039" cy="5.44444" rx="4.4" ry="4.44444" stroke="#1D2E72" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </span>
    <span class="b-image-primary-btn__title">
                            @lang('header.login')
                        </span>
</a>

@else



    <a href="{{route('frontend.account.profile.show')}}" class="b-image-primary-btn b-header__profile-btn">
                        <span class="b-image-primary-btn__logo ">

                            <svg class="b-image-primary-btn__logo-img b-header__profile-btn-icon" width="20px"
                                 viewBox="0 0 20 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18.6 21V18.7778C18.6 16.3232 16.6301 14.3333 14.2 14.3333H5.4C2.96995 14.3333 1 16.3232 1 18.7778V21"
                                stroke="#1D2E72" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <ellipse cx="9.80039" cy="5.44444" rx="4.4" ry="4.44444" stroke="#1D2E72" stroke-width="2"
                                     stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                        </span>
        <span class="b-image-primary-btn__title">
                            @lang('header.account')
                        </span>
    </a>


@endif
