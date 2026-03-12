<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">School Admin</div>
    </a>

    <hr class="sidebar-divider my-0">

    <!-- Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <!-- Banner -->
    <li class="nav-item {{ request()->routeIs('banner.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('banner.index') }}">
            <i class="fas fa-images"></i>
            <span>Banner</span>
        </a>
    </li>

    <!-- Testimonial -->
    <li class="nav-item {{ request()->routeIs('testimonial.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('testimonial.index') }}">
            <i class="fas fa-comments"></i>
            <span>Testimonial</span>
        </a>
    </li>

    <!-- Contact Us -->
    <li class="nav-item {{ request()->routeIs('contact.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('contact.index') }}">
            <i class="fas fa-envelope-open-text"></i>
            <span>Contact Us</span>
        </a>
    </li>

    <!-- Gallery -->
    <li class="nav-item {{ request()->routeIs('gallery.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('gallery.index') }}">
            <i class="fas fa-photo-video"></i>
            <span>Gallery</span>
        </a>
    </li>

    <!-- Jobs -->
    <li class="nav-item {{ request()->routeIs('jobs.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('jobs.index') }}">
            <i class="fas fa-briefcase"></i>
            <span>Jobs</span>
        </a>
    </li>

    <!-- Careers -->
    <li class="nav-item {{ request()->routeIs('career.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('career.index') }}">
            <i class="fas fa-user-graduate"></i>
            <span>Careers</span>
        </a>
    </li>

    {{-- FAQ --}}
    <li class="nav-item {{ request()->routeIs('faq.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('faq.index') }}">
            <i class="fas fa-question-circle"></i>
            <span>FAQs</span>
        </a>
    </li>

    {{-- Top Management --}}
    <li class="nav-item {{ request()->routeIs('management.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('management.index') }}">
            <i class="fas fa-question-circle"></i>
            <span>Top Management</span>
        </a>
    </li>

    {{-- Events --}}
    <li class="nav-item {{ request()->routeIs('events.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('events.index') }}">
            <i class="fas fa-calendar-alt"></i>
            <span>Events</span>
        </a>
    </li>
</ul>
