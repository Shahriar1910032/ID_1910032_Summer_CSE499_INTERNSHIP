<!-- partial:partials/_sidebar.html -->
@php
    $id = Auth::user()->id;
    $agentId = App\Models\User::find($id);
    $status = $agentId->status;
@endphp
<nav class="sidebar">

    <div class="sidebar-header">
        <a href="{{ route('agent.dashboard') }}" class="sidebar-brand">
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
                <a href="{{ route('agent.dashboard') }}" class="nav-link">
                    <i class="link-icon" data-feather="box"></i>
                    <span class="link-title">Dashboard</span>
                </a>
            </li>
            @if ($status === '1')
                <li class="nav-item">
                    <a href="{{ route('agent.all.property') }}" class="nav-link">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">All Property</span>
                    </a>
                </li>
                <li class="nav-item nav-category">real estate</li>
                {{-- <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false"
                        aria-controls="emails">
                        <i class="link-icon" data-feather="box"></i>
                        <span class="link-title">Property-</span>
                        <i class="link-arrow" data-feather="chevron-down"></i>
                    </a>
                    <div class="collapse" id="emails">
                        <ul class="nav sub-menu">
                            <li class="nav-item">
                                <a href="{{ route('agent.all.property') }}" class="nav-link">All Property</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/read.html" class="nav-link">Read</a>
                            </li>
                            <li class="nav-item">
                                <a href="pages/email/compose.html" class="nav-link">Compose</a>
                            </li>
                        </ul>
                    </div>
                </li> --}}
                <li class="nav-item">
                    <a href="{{ route('agent.buy.package') }}" class="nav-link">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Buy Package</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('agent.package.history') }}" class="nav-link">
                        <i class="link-icon" data-feather="calendar"></i>
                        <span class="link-title">Package History</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('agent.property.message') }}" class="nav-link">
                        <i class="link-icon" data-feather="message-square"></i>
                        <span class="link-title">Property Message</span>
                    </a>
                </li>

            @endif

        </ul>
    </div>


</nav>
