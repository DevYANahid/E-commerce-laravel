<!-- begin navbar -->
<nav class="navbar navbar-expand-md">

    <!-- begin navbar-header -->
    <div class="navbar-header d-flex align-items-center">
        <a href="javascript:void(0)" class="mobile-toggle"><i class="ti ti-align-right"></i></a>
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">
            <img src="{{ asset('upload/images/defoult_image/logo.png') }}" class="img-fluid logo-desktop" alt="logo" />
            <img src="{{ asset('upload/images/defoult_image/logo-icon.png') }}" class="img-fluid logo-mobile" alt="logo" />
        </a>
    </div>
    <!-- end navbar-header -->
    <!-- begin navigation -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navigation d-flex">
            <ul class="navbar-nav nav-right ml-auto">
                @if($company->status == 0)
                    <a href="tel:+8801764470022"> To active your licence, please contract with DAC developer. <br> Phone: +8801764470022</a>
                @else
                    {{ 'Expire Date: ' . date('d-M-Y',strtotime($company->expire_date)) }}
                @endif
            </ul>
        </div>
    </div>
    <!-- end navigation -->
</nav>
<!-- end navbar -->
