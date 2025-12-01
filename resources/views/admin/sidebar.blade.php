<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <li
        class="nav-item 
        {{ request()->routeIs('banner.index') ||
        request()->routeIs('banner.create') ||
        request()->routeIs('banner.edit')
            ? 'active'
            : '' }}">
        <a class="nav-link" href="{{ route('banner.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Banner</span>
        </a>
    </li>

    <li
        class="nav-item 
        {{ request()->routeIs('testimonial.index') ||
        request()->routeIs('testimonial.create') ||
        request()->routeIs('testimonial.edit')
            ? 'active'
            : '' }}">
        <a class="nav-link" href="{{ route('testimonial.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Testimonial</span>
        </a>
    </li>

    <li class="nav-item 
        {{ request()->routeIs('contact.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('contact.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Contact Us</span>
        </a>
    </li>

    <li
        class="nav-item 
        {{ request()->routeIs('gallery.index') || request()->routeIs('gallery.create') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('gallery.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Gallery</span>
        </a>
    </li>

    <li
        class="nav-item 
        {{ request()->routeIs('jobs.index') || request()->routeIs('jobs.create') || request()->routeIs('jobs.edit')
            ? 'active'
            : '' }}">
        <a class="nav-link" href="{{ route('jobs.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Jobs</span>
        </a>
    </li>

    <li
        class="nav-item 
        {{ request()->routeIs('career.index') || request()->routeIs('career.show') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('career.index') }}">
            <i class="fas fa-fw fa-cog"></i>
            <span>Careers</span>
        </a>
    </li>
</ul>
