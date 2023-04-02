
<section class="sidebar">
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    @if (Auth::user()->hasRole('superadmin'))
        @include('layout.menu_superadmin');
    @elseif(Auth::user()->hasRole('user'))
        @include('layout.menu_user');
    @endif
    </ul>
</section>