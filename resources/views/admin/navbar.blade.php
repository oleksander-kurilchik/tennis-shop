<div class="row ">
    <div class="col-12 p-0">
        <nav class="navbar navbar-expand-md  navbar-dark bg-dark">
            <a class="navbar-brand" href="{{route("admin.index")}}">
                Адмін-панель
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
                    aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('admin.backend_account.show')}}">Користувач: {{Auth::guard("backend")->user()->name}}
                        </a>
                    </li>
                    <li class="nav-item">

                        <a href="#" class="nav-link"> Логін: {{Auth::guard("backend")->user()->email}}</a>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route("admin.auth.logout")}}">Вихід</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>
