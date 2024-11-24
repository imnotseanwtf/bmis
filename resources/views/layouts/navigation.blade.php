<style>
    .nav-item.is-active .nav-link {
        background-color: #A11;
        /* Change to your desired color */
        color: white;
        /* Adjust text color if needed */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
        /* Adds a shadow effect */
        border-radius: 4px;
        /* Optional: Add rounded corners */
    }
</style>

<ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-3">
                <img src="{{ asset('images/logo/kayanlog.png') }}" height="80" width="80" alt="Volt Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text">
                Barangay <br> Management <br> Information <br> System
            </span>
        </a>
    </li>

    @resident
        <li class="nav-item {{ request()->routeIs('home') ? 'is-active' : '' }}">
            <a href="{{ route('home') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Home') }}</span>
            </a>
        </li>
    @endresident

    @admin
        <li class="nav-item {{ request()->routeIs('dashboard') ? 'is-active' : '' }}">
            <a href="{{ route('dashboard') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Dashboard') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('resident.index') ? 'is-active' : '' }}">
            <a href="{{ route('resident.index') }}" class="nav-link">
                <span class="sidebar-icon me-3">
                    <i class="fas fa-user-alt fa-fw"></i>
                </span>
                <span class="sidebar-text">{{ __('Resident') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('blotter.index') ? 'is-active' : '' }}">
            <a href="{{ route('blotter.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Blotter Record') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('house.index') ? 'is-active' : '' }}">
            <a href="{{ route('house.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('House') }}</span>
            </a>
        </li>

        <li class="nav-item {{ request()->routeIs('request-document.index') ? 'is-active' : '' }}">
            <a href="{{ route('request-document.index') }}" class="nav-link">
                <span class="sidebar-icon me-3">
                    <i class="fas fa-user-alt fa-fw"></i>
                </span>
                <span class="sidebar-text">{{ __('Appointment') }}</span>
            </a>
        </li>
    @endadmin

    @imbestigador
        <li class="nav-item {{ request()->routeIs('blotter.index') ? 'is-active' : '' }}">
            <a href="{{ route('blotter.index') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Blotter Record') }}</span>
            </a>
        </li>
    @endimbestigador

    @resident
        <li class="nav-item {{ request()->routeIs('request-document.index') ? 'is-active' : '' }}">
            <a href="{{ route('request-document.index') }}" class="nav-link">
                <span class="sidebar-icon me-3">
                    <i class="fas fa-user-alt fa-fw"></i>
                </span>
                <span class="sidebar-text">{{ __('Appointment') }}</span>
            </a>
        </li>

        {{-- <li class="nav-item {{ request()->routeIs('about') ? 'is-active' : '' }}">
            <a href="{{ route('about') }}" class="nav-link">
                <span class="sidebar-icon">
                    <svg class="icon icon-xs me-2" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                        <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                    </svg>
                </span>
                <span class="sidebar-text">{{ __('Services') }}</span>
            </a>
        </li> --}}
    @endresident




</ul>
