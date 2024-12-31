<!-- resources/views/components/sidebar.blade.php -->
<aside class="asidebar  collapse navbar-collapse" id="navbarSupportedContent">
    <div class="asidebar-top">
        <ul class="internal-icon">
            <li><a href="{{route('admin.drivers.index')}}">
                    <span class="material-symbols-outlined">
                        {{-- home --}}
                    </span>
                     Drivers
                </a>
            </li>
            <li><a href="{{route('admin.buses.index')}}">
                <span class="material-symbols-outlined">
                        {{-- account_balance_wallet --}}
                    </span>
                     Busses
                </a>
            </li>
            <li><a href="{{route('admin.routes.index')}}">
                <span class="material-symbols-outlined">
                        {{-- finance_mode --}}
                    </span>
                     Routes
                </a>
            </li>
            <li><a href="{{route('admin.bus-routes.index')}}">
                <span class="material-symbols-outlined">
                        {{-- kid_star --}}
                    </span>
                     Bus Route
                </a>
            </li>
            <li><a href="{{route('admin.stops.index')}}">
                <span class="material-symbols-outlined">
                        {{-- finance_mode --}}
                    </span>
                     Stops
                </a>
            </li>
        </ul>
    </div>
    <div class="asidebar-bottom">
        <ul class="internal-icon">
            <li>
                
            <form method="POST" action="{{ route('logout') }}">
                @csrf
    
                <button type="submit" class="button button-primiary">
                    {{ __('Log Out') }}
                </button>
            </form>
            </li>
        </ul>
        <div class="divider"></div>
        <div class="asidebar-copyright">
            <p>© FlexInvest 2024</p>
        </div>
    </div>
</aside>
