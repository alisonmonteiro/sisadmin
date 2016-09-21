<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">{{ config('info.admin.name') }}</a>
        </div>

        <div class="collapse navbar-collapse" id="main-navbar">
            {!! Menu::render('admin-navbar', 'navbar-right') !!}

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ url('admin/auth/logout') }}" title="{{ trans('auth::form.logout') }}">
                        {{ trans('auth::form.logout') }} <i class="fa fa-sign-out text-danger" aria-hidden="true"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
