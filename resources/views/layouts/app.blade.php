@include('partials.header')
<body>
    <div id="app">
        @include('partials.navbar')

        <main class="content my-auto py-4">
            <div class="container">
                @include('flash::message')

                <div class="row justify-content-center">
                    @yield('content')
                </div>
            </div>
        </main>

        @include('partials.footer')
    </div>

    @include('partials.scripts')
</body>
</html>
