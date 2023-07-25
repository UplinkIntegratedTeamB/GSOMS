<nav id="sidebarMenu" class="sidebar d-lg-block bg-gray-800 text-white collapse" data-simplebar>
    <div class="sidebar-inner px-2 pt-3">
        @include('layouts.responsive-topbar')

        @if(auth()->user()->roles->first()->name !== 'bmo' )
            @include('layouts.navigation')
        @else
            @include('layouts.bmo')
        @endif

    </div>
</nav>
