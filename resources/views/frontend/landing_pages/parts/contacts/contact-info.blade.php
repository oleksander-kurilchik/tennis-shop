<div class="p-page-contacts__contacts-info">
    <div class="p-page-contacts__address  p-page-contacts__info-item">
        <div class="p-page-contacts__info-item-title">
            @lang('contacts.shop')
        </div>
        <div class="p-page-contacts__info-item-description">
            <p>
{{--                м. Луцьк, вул. Сухомлинського, 1, ТЦ «Портсіті»--}}
                {{config('site.contacts.address')}}
            </p>
            <p>
{{--                099 88 00 012, 093 99 00 123--}}
                {{config('site.contacts.phones')}}
            </p>
            <p>
                <a class="p-page-contacts__info-email" href="mailto:{{config('site.contacts.mail')}}">{{config('site.contacts.mail')}}</a>
            </p>
        </div>
    </div>
    <div class="p-page-contacts__work-schedule p-page-contacts__info-item">
        <div class="p-page-contacts__info-item-title">
           @lang('contacts.work_schedule')
        </div>
        <div class="p-page-contacts__info-item-description">
{{--            <p>пн-пт: 9:00 – 22:00</p>--}}
{{--            <p>сб-нд: 10:00 – 20:00</p>--}}
            {!!  config('site.contacts.work_schedule') !!}
        </div>
    </div>
    <div class="p-page-contacts__social p-page-contacts__info-item">
        <div class="p-page-contacts__info-item-title">
{{--            Соцмережі--}}
            @lang('contacts.social_title')
        </div>
        <div class="p-page-contacts__info-item-description">
            <div><p>
{{--                    Підписуйтесь на оновлення--}}
                    @lang('contacts.subscribe_social')
                </p></div>
            <div class="p-page-contacts__social-list">
                <div class="p-page-contacts__social-item">
                    <a href="{{config('site.social.facebook')}}" class="p-page-contacts__social-link">
                        <img src="/images/contacts/facebook.svg" alt="" class="p-page-contacts__social-img">
                    </a>
                </div>
                <div class="p-page-contacts__social-item">
                    <a href="{{config('site.social.instagram')}}" class="p-page-contacts__social-link">
                        <img src="/images/contacts/instagram.svg" alt="" class="p-page-contacts__social-img">
                    </a>
                </div>


            </div>


        </div>
    </div>
</div>
