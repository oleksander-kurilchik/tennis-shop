<div class="card sidebar sidebar-admin admin-sidebar">
    <div class="card-header  admin-sidebar__header   d-flex align-items-center justify-content-between">
        <span class="admin-sidebar__title">  <img class="admin-sidebar__title-logo"
                                                  src="/service-resourse/images/sidebar/logo.png" alt=""></span>
        <button class="btn btn-info btn-sm d-none d-md-inline-block " id="button_toggle_sidebar"><i class="fa fa-bars"
                                                                                                    aria-hidden="true">

            </i>
        </button>
    </div>
    <ul class="list-group  admin-sidebar__list-group  list-group-flush">

        @can('orders.index')
        <li class="list-group-item  admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{route('admin.orders.index')}}">
                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/orders.svg" alt=""> </span>
                <span class="__link-label">    Замовлення</span>
            </a>
        </li>
        @endcan
        @can('categories.index')
        <li class="list-group-item  admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.categories.index")  }}">
                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/categories.svg" alt=""> </span>
                <span class="__link-label">   Категорії</span>
            </a>
        </li>
            @endcan
            @can('pages.index')

         <li class="list-group-item  admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.landing_pages.index")  }}">
                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/landing-page.svg" alt=""></span>
                <span class="__link-label"> Сторінки </span>
            </a>
        </li>
            @endcan
            @can('mainslider.index')
            <li class="list-group-item  admin-sidebar-item">
                <a class="admin-sidebar-item__link" href="{{ route("admin.main-slider.index")  }}">
                    <span class="__link-icon"> <img src="/service-resourse/images/sidebar/main-slider.svg" alt=""> </span>
                    <span class="__link-label">   Слайдер головної сторінки</span>
                </a>
            </li>
            @endcan
            @can('feedback.index')
            <li class="list-group-item  admin-sidebar-item">
                <a class="admin-sidebar-item__link" href="{{ route("admin.feedback.index")  }}">
                    <span class="__link-icon"> <img src="/service-resourse/images/sidebar/feedback.svg" alt=""> </span>
                    <span class="__link-label">  Зворотрій звязок</span>
                </a>
            </li>
            @endcan


            @can('menu.index')
        <li class="list-group-item admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route('admin.menus.index') }}">
                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/menu.svg" alt=""> </span>
                <span class="__link-label"> Меню</span>
            </a>
        </li>
            @endcan

            @can('products.index')

        <li class="list-group-item  admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{route("admin.products.index")}}">
                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/products.svg" alt=""> </span>
                <span class="__link-label">   Товари</span>
            </a>
        </li>
            @endcan
            @can('products-reviews.index')

            <li class="list-group-item  admin-sidebar-item">
                <a class="admin-sidebar-item__link" href="{{route("admin.products-reviews.index")}}">
                    <span class="__link-icon"> <img src="/service-resourse/images/sidebar/review.svg" alt=""> </span>
                    <span class="__link-label">   Відгуки на товари</span>
                </a>
            </li>
            @endcan
            @can('filters.index')

        <li class="list-group-item  admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{route("admin.filters.index")}}">
                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/filter.svg" alt=""> </span>
                <span class="__link-label">    Фільтри товару</span>
            </a>
        </li>
            @endcan
            <li class="list-group-item  admin-sidebar-item">
                <a class="admin-sidebar-item__link" href="{{route("admin.products_attributes.groups.index")}}">
                    <span class="__link-icon"> <img src="/service-resourse/images/sidebar/product_attributes.svg" alt=""> </span>
                    <span class="__link-label">    Атрибути товарів</span>
                </a>
            </li>






            @can('users_login_log.index')

        <li class="list-group-item admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.backend_users_log.login.index") }}">
                <span class="__link-icon">  <img src="/service-resourse/images/sidebar/users_logs.svg" alt=""></span>
                <span class="__link-label">   Логи користувачів </span>
            </a>
        </li>
            @endcan
            @can('laravel_log_viewer.index')
        <li class="list-group-item admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.laravel_log_viewer.index") }}">
                <span class="__link-icon">  <img src="/service-resourse/images/sidebar/logs.svg" alt=""></span>
                <span class="__link-label">  Логи </span>
            </a>

        </li>
            @endcan
            @can('download_files.index')

        <li class="list-group-item admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{route("admin.downloaded_files.index") }}">
                <span class="__link-icon">  <img src="/service-resourse/images/sidebar/download.svg" alt=""></span>
                <span class="__link-label">  Завантаження </span>
            </a>
        </li>
            @endcan

            @can('frontend_users.index')
                <li class="list-group-item admin-sidebar-item">
                    <a class="admin-sidebar-item__link" href="{{ route("admin.frontend_users.index") }}">
                        <span class="__link-icon"> <img src="/service-resourse/images/sidebar/admin_users.svg" alt=""></span>
                        <span class="__link-label"> Кліенти </span>
                    </a>
                </li>
            @endcan



{{--        <li class="list-group-item  admin-sidebar-item">--}}
{{--            <a class="admin-sidebar-item__link" href="{{ route("admin.main-slider.index")  }}">--}}
{{--                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/main-slider.svg" alt=""> </span>--}}
{{--                <span class="__link-label">   Слайдер головної сторінки</span>--}}
{{--            </a>--}}
{{--        </li>--}}

                @can('robots_txt.edit')
        <li class="list-group-item  admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.edit_robots_txt.edit")  }}">
                <span class="__link-icon">
                <img src="/service-resourse/images/sidebar/robots_txt.svg" alt="">
                </span>
                <span class="__link-label">  Редагувати robots.txt  </span>
            </a>
        </li>
            @endcan
            @can('file_manager.index')

        <li class="list-group-item admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.file_manager.index") }}">
                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/file-manager.svg" alt=""></span>
                <span class="__link-label">   Файловий менеджер </span>
            </a>
        </li>
            @endcan
            @can('backend_users.index')
        <li class="list-group-item admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.backend_users.index") }}">
                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/admin_users.svg" alt=""></span>
                <span class="__link-label">  Адміністративний доступ </span>
            </a>
        </li>
            @endcan
            @can('roles.index')
        <li class="list-group-item admin-sidebar-item">

            <a class="admin-sidebar-item__link" href="{{ route("admin.roles.index") }}">
                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/admin_users.svg" alt=""></span>
                <span class="__link-label">  Ролі </span>
            </a>
        </li>
            @endcan
            @can('permissions.index')
        <li class="list-group-item admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.permissions.index") }}">
                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/admin_users.svg" alt=""></span>
                <span class="__link-label">  Дозволи </span>
            </a>
        </li>
            @endcan
            @can('settings.index')

        <li class="list-group-item admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.settings.index") }}">
                <span class="__link-icon"> <img src="/service-resourse/images/sidebar/settings.svg" alt=""></span>
                <span class="__link-label">  Налаштування сайту </span>
            </a>
        </li>

            @endcan
            @can('cache.index')
        <li class="list-group-item admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.cache.clear") }}">
                <span class="__link-icon">  <img src="/service-resourse/images/sidebar/clear.svg" alt=""></span>
                <span class="__link-label">   Очистка кешу </span>
            </a>
        </li>
            @endcan
            @can('maintenance_mode.index')
        <li class="list-group-item admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.maintenance_mode.index") }}">
                <span class="__link-icon">   <img src="/service-resourse/images/sidebar/maintenance_mode.svg"
                                                  alt=""></span>
                <span class="__link-label">   Режим обслуговування </span>
            </a>
        </li>
            @endcan
            @can('artisan.index')
        <li class="list-group-item admin-sidebar-item">
            <a class="admin-sidebar-item__link" href="{{ route("admin.artisan_commands.index") }}">
                <span class="__link-icon">   <img src="/service-resourse/images/sidebar/artisan.svg"
                                                  alt=""></span>
                <span class="__link-label">   Команди artisan </span>
            </a>
        </li>
            @endcan


    </ul>
</div>
