<x-master>
    <main class="py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2">
                    @include('partials._sidebar_links')
                </div>
                <div class="col-md-8">
                    @yield('content')
                </div>
                <div class="col-md-2">
                    @include('partials._friends_list')
                </div>
            </div>
        </div>
    </main>
</x-master>