@include('partials.header')
<body>
    <div id="app">
        @include('partials.navbar')

        <main class="content my-auto py-4">
            <div class="container">
                @include('flash::message')

                <div class="row justify-content-center">
                    <div class="col-12 col-md-9">
                        @yield('content')
                    </div>
                    <div class="col-12 col-md-3">
                        @yield('sidebar')

                        <div class="card">
                            <h2 class="card-header">Navigation</h2>
                            <div class="card-body">
                                <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                                    <a class="nav-link{{ request()->is('admin/users*') ? ' active' : '' }}" href="{{ route('admin.users') }}">Utilisateurs</a>
                                    <a class="nav-link{{ request()->is('admin/polls*') ? ' active' : '' }}" href="{{ route('admin.polls') }}">Votes</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        @include('partials.footer')
    </div>

    @include('partials.scripts')
</body>
</html>
