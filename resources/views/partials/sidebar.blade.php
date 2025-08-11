<div class="dlabnav">
    <div class="dlabnav-scroll">
        <ul class="metismenu" id="menu">

            <li>
                <a href="{{ route('dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> {{-- Custom Dashboard icon --}}
                    <span class="nav-text">Home</span>
                </a>
            </li>

            @can('manage')

            <li>
                <a href="{{ route('manange.index') }}">
                    <i class="fas fa-user-plus"></i> {{-- Best for adding user --}}
                    <span class="nav-text">Add Divce</span>
                </a>
            </li>

            <li>
                <a href="{{ route('user_table.index') }}">
                    <i class="fas fa-users"></i> {{-- Suitable for user table --}}
                    <span class="nav-text">Divces Table</span>
                </a>
            </li>

            @endcan
            <li>
                <a href="{{ route('breach_table') }}">
                    <i class="fas fa-exclamation-triangle text-danger"></i> {{-- Best for breaches and alerts --}}
                    <span class="nav-text">Breach Table</span>
                </a>
            </li>

            <li>
                <a href="{{ route('setting.index') }}" class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-cogs"></i> {{-- Multiple for settings --}}
                    <span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route("general_setting.index") }}">General Settings</a></li>
                    <li><a href="{{ route("setting.index") }}">Functional Settings</a></li>
                    <li><a href="{{ route("seting_mangment") }}">Administrative Settings</a></li>
                </ul>
            </li>

            <li>
                <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                    <i class="fas fa-credit-card"></i> {{-- Suitable for payment --}}
                    <span class="nav-text">Payment Options</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{ route('karymy_bank.index') }}">Al-Kuraimi Bank</a></li>
                    <li><a href="{{ route('visa.index') }}">Visa Card</a></li>
                </ul>
            </li>

            <li>
                <a href="{{ route('help.index') }}">
                    <i class="fas fa-life-ring"></i> {{-- Best for help and support --}}
                    <span class="nav-text">Help</span>
                </a>
            </li>

            <li>
                <a href="#">
                    <i class="fas fa-file-alt"></i> {{-- Best for DataSheet --}}
                    <span class="nav-text">DataSheet</span>
                </a>
            </li>

            <li>
                <a href="{{ route('abut_us.index') }}">
                    <i class="fas fa-info-circle"></i> {{-- Best for About Us --}}
                    <span class="nav-text">About us</span>
                </a>
            </li>

            <li>
                <a href="widget-basic.html" class="" aria-expanded="false"
                    onclick="document.getElementById('logoutForm').submit(); return false;">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="nav-text">Logout</span>
                </a>
            </li>
        </ul>

        <div class="side-bar-profile">
            <div class="d-flex align-items-center justify-content-between mb-3">
                <div class="side-bar-profile-img">
                    <img src="images/user.jpg" alt="">
                </div>
                <div class="profile-info1">
                    <h4 class="fs-18 font-w500">Soeng Souy</h4>
                    <span>example@mail.com</span>
                </div>
                <div class="profile-button">
                    <i class="fas fa-caret-down scale5 text-light"></i>
                </div>
            </div>
            <div class="d-flex justify-content-between mb-2 progress-info">
                <span class="fs-12"><i class="fas fa-star text-orange me-2"></i>Task Progress</span>
                <span class="fs-12">20/45</span>
            </div>
            <div class="progress default-progress">
                <div class="progress-bar bg-gradientf progress-animated" style="width: 45%; height:10px;"
                    role="progressbar">
                    <span class="sr-only">45% Complete</span>
                </div>
            </div>
        </div>

        <div class="copyright">
            <p><strong></strong> </p>
            <p class="fs-12"></p>
        </div>
    </div>
</div>
