<!-- resources/views/layouts/sidebar.blade.php -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url(config('adminlte.dashboard_url', 'home')) }}" class="brand-link">
        <img src="{{ asset(config('adminlte.logo_img')) }}"
             alt="{{ config('adminlte.logo_img_alt') }}"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">{!! config('adminlte.logo') !!}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                @foreach(config('adminlte.menu') as $item)
                    @if(isset($item['can']) && !auth()->user()->can($item['can']))
                        @continue
                    @endif
                    <li class="nav-item">
                        <a href="{{ isset($item['url']) ? url($item['url']) : '#' }}" class="nav-link">
                            <i class="nav-icon {{ $item['icon'] ?? 'fas fa-circle' }}"></i>
                            <p>{{ $item['text'] ?? '' }}</p>
                        </a>
                    </li>
                @endforeach
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
