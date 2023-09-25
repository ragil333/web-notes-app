<div class="iq-sidebar  sidebar-default ">
    <div class="iq-sidebar-logo d-flex align-items-center justify-content-between">
        <a href="{{ route('home') }}" class="header-logo">
            <img src="{{ asset('/assets/images/logo.png') }}" class="img-fluid rounded-normal light-logo" alt="logo">
            <h4 class="logo-title ml-3">NotePlus</h4>
        </a>
        <div class="iq-menu-bt-sidebar">
            <i class="las la-times wrapper-menu"></i>
        </div>
    </div>
    <div class="sidebar-caption dropdown">
        <a href="#" class="iq-user-toggle d-flex align-items-center justify-content-between"
            id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="{{ asset('/assets/images/user/1.jpg') }}" class="img-fluid rounded avatar-50 mr-3" alt="user">
            <div class="caption">
                <h6 class="mb-0 line-height">{{ Session::get('user')['email'] }}</h6>
            </div>
        </a>
        <div class=" w-100 border-0 my-2" aria-labelledby="dropdownMenuButton">
            <br><br>
            <a class="dropdown-item mb-2" href="{{ route('home') }}">
                <i class="las la-clipboard font-size-20 mr-1"></i>
                <span class="mt-2">Your Notes</span>
            </a>
            <a class="dropdown-item mb-2" href="{{ route('user') }}">
                <i class="las la-user font-size-20 mr-1"></i>
                <span class="mt-2">User</span>
            </a>
            <hr class="my-2">
            <a class="dropdown-item" href="{{ route('logout') }}">
                <i class="las la-sign-out-alt font-size-20 mr-1"></i>
                <span>Logout</span>
            </a>
        </div>
    </div>

</div>
