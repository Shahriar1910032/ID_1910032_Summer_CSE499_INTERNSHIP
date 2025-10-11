<!-- partial:partials/_sidebar.html -->
<nav class="sidebar">
    <div class="sidebar-header">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
            Property-<span>Seek</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item nav-category">Main</li>
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.all.type') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Property Type</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.index.amenities') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Amenities</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.property.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Property</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.package.history') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Package</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.property.state.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Property State</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.testimonials.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Testimonials</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#agents" role="button" aria-expanded="false"
                    aria-controls="agents">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Blog</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="agents">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.blog.category.index') }}" class="nav-link">Category List</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.blog.index') }}" class="nav-link">Blog List</a>
                        </li>

                    </ul>
                </div>
            </li>

            <li class="nav-item nav-category">Users All Function</li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                    aria-controls="emails">
                    <i class="link-icon" data-feather="user"></i>
                    <span class="link-title">Manage Agent</span>
                    <i class="link-arrow" data-feather="chevron-down"></i>
                </a>
                <div class="collapse" id="emails">
                    <ul class="nav sub-menu">
                        <li class="nav-item">
                            <a href="{{ route('admin.all.agent') }}" class="nav-link">All Agent</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.add.agent') }}" class="nav-link">Add Agent</a>
                        </li>


                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.property.message') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Property Message</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.blog.comment') }}" class="nav-link">
                    <i class="link-icon" data-feather="message-square"></i>
                    <span class="link-title">Blog Comment</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.contact.message.index') }}" class="nav-link">
                    <i class="link-icon" data-feather="calendar"></i>
                    <span class="link-title">Contact Mesage</span>
                </a>
            </li>

        </ul>
    </div>
</nav>
<!-- <nav class="settings-sidebar"> -->
    <div class="sidebar-body">
        <a href="#" class="settings-sidebar-toggler">
            <i data-feather="settings"></i>
        </a>
        <div class="theme-wrapper">
            <h6 class="text-muted mb-2">Light Theme:</h6>
            <a class="theme-item" href="../demo1/dashboard.html">
                <img src="../assets/images/screenshots/light.jpg" alt="light theme">
            </a>
            <h6 class="text-muted mb-2">Dark Theme:</h6>
            <a class="theme-item active" href="../demo2/dashboard.html">
                <img src="../assets/images/screenshots/dark.jpg" alt="light theme">
            </a>
        </div>
    </div>
<!-- </nav> -->
