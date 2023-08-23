<ul class="nav flex-column pt-3 pt-md-0">
    <li class="nav-item">
        <p class=" d-flex align-items-center">
            <span class="sidebar-icon me-3">
                <img src="{{ asset('images/brand/bgstacruz.png') }}" height="50" width="50" alt="Volt Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text">
                GSOMS
            </span>
        </p>
    </li>

    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}">
        <a href="{{ route('home') }}" class="nav-link">
            <span class="sidebar-icon">
                <i class="fas fa-home"></i>
            </span>
            <span class="sidebar-text">{{ __('Dashboard') }}</span>
        </a>
    </li>

    <li class="nav-item">
        <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-app">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-folder"></i>
                </span>
                <span class="sidebar-text">Purchase Request</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false">
            <ul class="flex-column nav">
                @staff
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchase-request.index') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="sidebar-text">Create PR</span>
                    </a>
                </li>
                @endstaff
                @user
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchase-request.index') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="sidebar-text">Create PR</span>
                    </a>
                </li>
                @enduser
                @user
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchase-request.show', auth()->id()) }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-file"></i>
                        </span>
                        <span class="sidebar-text">History</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchaseRequest.completedPrUser') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-file"></i>
                        </span>
                        <span class="sidebar-text">Completed PR</span>
                    </a>
                </li>
                @enduser
                @staff
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchase-request.show', auth()->id()) }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-file"></i>
                        </span>
                        <span class="sidebar-text">PR List</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchaseRequest.completedPr') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-file"></i>
                        </span>
                        <span class="sidebar-text">Completed PR</span>
                    </a>
                </li>
                @endstaff
                @headstaff
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchase-request.show', auth()->id()) }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-file"></i>
                        </span>
                        <span class="sidebar-text">PR List</span>
                    </a>
                </li>
                @endheadstaff
                @admin
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('purchase-request.show', auth()->id()) }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-file"></i>
                        </span>
                        <span class="sidebar-text">PR List</span>
                    </a>
                </li>
                @endadmin
            </ul>
        </div>
    </li>
    @staff
    <li class="nav-item">
        <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-appShopping">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-shopping-cart"></i>
                </span>
                <span class="sidebar-text">Shopping</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-appShopping" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item">
                    <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        data-bs-target="#submenu-appR">
                        <span>
                            <span class="sidebar-icon me-3">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span class="sidebar-text">Reports</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        </span>
                    </span>
                    <div class="multi-level collapse" role="list" id="submenu-appR" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('bac.index') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">Bac Resolution</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('rfq.index') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">RFQ</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('abstract.index') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">Abstract Canvass</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('po.index') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">Purchase Order</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('air.index') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">AIR</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('par.show') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">PAR</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ics.show') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">ICS</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ris.show') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">RIS</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </li>
    <li class="nav-item">
        <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-appBidding">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-gavel"></i>
                </span>
                <span class="sidebar-text">Bidding</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-appBidding" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item">
                    <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                        data-bs-target="#submenu-appBr">
                        <span>
                            <span class="sidebar-icon me-3">
                                <i class="far fa-folder-open"></i>
                            </span>
                            <span class="sidebar-text">Bidding Reports</span>
                        </span>
                        <span class="link-arrow">
                            <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                    clip-rule="evenodd">
                                </path>
                            </svg>
                        </span>
                    </span>
                    <div class="multi-level collapse" role="list" id="submenu-appBr" aria-expanded="false">
                        <ul class="flex-column nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('invitation.index') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">Invitation of Bid</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('abstract-bid.index') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">Abstract of Bid</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('resolution-bid.index') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">Resolution</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('po-bid.index') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">Purchase Order</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('air-bid.index') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">AIR</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('ris-bid.index') }}">
                                    <span class="sidebar-icon">
                                        <i class="fas fa-file-pdf"></i>
                                    </span>
                                    <span class="sidebar-text">RIS</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </li>
    @endstaff
    <li class="nav-item">
        <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-app1">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-boxes"></i>
                </span>
                <span class="sidebar-text">Inventory</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-app1" aria-expanded="false">
            <ul class="flex-column nav">
                @staff
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('item.create') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-box-open"></i>
                        </span>
                        <span class="sidebar-text">Add Items</span>
                    </a>
                </li>
                @endstaff
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('inventory.index') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-box"></i>
                        </span>
                        <span class="sidebar-text">Item List</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    @admin
    <li class="nav-item">
        <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-app7">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-circle fa-fw"></i>
                </span>
                <span class="sidebar-text">Create Account</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-app7" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.create') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="sidebar-text">Add Users</span>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <span class="sidebar-icon me-3">
                            <i class="fas fa-user-alt fa-fw"></i>
                        </span>
                        <span class="sidebar-text">{{ __('Users') }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    @endadmin

    @if(auth()->user()->roles->first()->name !== 'user')
    <li class="nav-item">
        <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-app2">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-users"></i>
                </span>
                <span class="sidebar-text">Suppliers</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-app2" aria-expanded="false">
            <ul class="flex-column nav">
                @staff
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('suppliers.create') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        <span class="sidebar-text">Add Supplier</span>
                    </a>
                </li>
                @endstaff
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('suppliers.index') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-user-friends"></i>
                        </span>
                        <span class="sidebar-text">Supplier List</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    @admin
    <li class="nav-item">
        <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-appItem">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-boxes"></i>
                </span>
                <span class="sidebar-text">Item Type</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-appItem" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('itemType.create') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-user-plus"></i>
                        </span>
                        <span class="sidebar-text">Add Item Type</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('itemType.index') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-user-friends"></i>
                        </span>
                        <span class="sidebar-text">Item Types</span>
                    </a>
                </li>
            </ul>
        </div>
    </li>
    @endadmin
    <li class="nav-item">
        <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-appV">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-car-side"></i>
                </span>
                <span class="sidebar-text">Vehicle Registration</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-appV" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vehicle.create') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="sidebar-text">Register Vehicle</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vehicle.index') }}">
                        <span class="sidebar-icon">
                            <i class="fas fa-car"></i>
                        </span>
                        <span class="sidebar-text">Registered Vehicles</span>
                    </a>
                </li>
            </ul>
        </div>
        <li class="nav-item">
            <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
                data-bs-target="#submenu-appRIS">
                <span>
                    <span class="sidebar-icon me-3">
                        <i class="fas fa-shuttle-van"></i>
                    </span>
                    <span class="sidebar-text">Trip Ticket</span>
                </span>
                <span class="link-arrow">
                    <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                            clip-rule="evenodd">
                        </path>
                    </svg>
                </span>
            </span>
            <div class="multi-level collapse" role="list" id="submenu-appRIS" aria-expanded="false">
                <ul class="flex-column nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('trip-ticket.create') }}">
                            <span class="sidebar-icon">
                                <i class="fas fa-plus"></i>
                            </span>
                            <span class="sidebar-text">Add Trip Ticket</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('trip-ticket.index') }}">
                            <span class="sidebar-icon">
                                <i class="fas fa-file-pdf"></i>
                            </span>
                            <span class="sidebar-text">Trip Ticket</span>
                        </a>
                    </li>

                </ul>
            </div>
        </li>
    </li>
    @endif
</ul>
