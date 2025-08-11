<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="robots" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
    <meta property="og:image" content="https://fillow.dexignlab.com/xhtml/social-image.png">
    <meta name="format-detection" content="telephone=no">

    <!-- PAGE TITLE HERE -->
    <title>Functional Settings</title>

    <!-- FAVICONS ICON -->
    <link rel="shortcut icon" type="image/png" href="images/favicon.png">
    <link href="vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    @livewireStyles
</head>

<body>

    <body>
        <?php
$title = "Functional Settings";
    ?>

        <!--*******************
            Preloader start
        ********************-->
        <div id="preloader">
            <div class="lds-ripple">
                <div></div>
                <div></div>
            </div>
        </div>
        <!--*******************
            Preloader end
        ********************-->

        <!--**********************************
            Main wrapper start
        ***********************************-->
        <div id="main-wrapper">

            <!--**********************************
                Nav header start
            ***********************************-->
            @include('partials.nav')

            <!--**********************************
                Nav header end
            ***********************************-->



            <!--**********************************
                Header start
            ***********************************-->

            @include('partials.header')
            <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

            <!--**********************************
                Sidebar start
            ***********************************-->
            @include('partials.sidebar')
            <!--**********************************
                Sidebar end
            ***********************************-->

            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                @if (session('massges'))
                    <div class="alert alert-success solid alert-dismissible fade show">
                        <svg viewbox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none"
                            stroke-linecap="round" stroke-linejoin="round" class="me-2">
                            <polyline points="9 11 12 14 22 4"></polyline>
                            <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                        </svg>
                        <strong>Success!</strong> {{ session('massges') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="btn-close">
                        </button>
                    </div>
                @endif
                <div class="container-fluid">
                    <!-- Test Button Section -->
                    <livewire:live-wire-test />
                    <br><br>
                    <!-- Update Settings Form -->

                    <!-- Sensor Enable Section -->
                    <div>
                        SMS Settings
                    </div>
                    <livewire:user-sms />

                    {{-- <form action="" method="get">

                        <label>Send SMS to Numbers:</label><br>
                        <input type="input" name="n1_sms" value="+967778467871" readonly>
                        <input type="input" name="n2_sms" value="+967778989123" readonly>
                        <input type="input" name="n3_sms" value="+967711232316" readonly>
                    </form> --}}

                    <br>

                    <!-- WhatsApp Settings -->
                    <label>Send WhatsApp Messages :</label><br>

                    <livewire:user-whatsaap />
                    <br>

                    <!-- Email Settings -->
                    <label>telegram:</label><br>
                    <livewire:users-telegram />
                    <br>
                    <livewire:setting-action-and-reaction />

               {{-- <form action="{{ route('update_setting', Auth::id()) }}" method="get">
    @csrf

    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <strong>Select Sensors</strong>
        </div>
        <div class="card-body">

            <div class="form-check mb-2">
                <input type="hidden" name="IR_senser" value="0">
                <input class="form-check-input" type="checkbox" id="ir_sensor" name="IR_senser" value="1" @checked($key->IR_senser)>
                <label class="form-check-label" for="ir_sensor">Do you enable IR Sensor?</label>
            </div>

            <div class="form-check mb-2">
                <input type="hidden" name="SWITCH_senser" value="0">
                <input class="form-check-input" type="checkbox" id="switch_sensor" name="SWITCH_senser" value="1" @checked($key->SWITCH_senser)>
                <label class="form-check-label" for="switch_sensor">Do you enable Switch Sensor?</label>
            </div>

            <div class="form-check mb-2">
                <input type="hidden" name="fire_senser" value="0">
                <input class="form-check-input" type="checkbox" id="fire_sensor" name="fire_senser" value="1" @checked($key->fire_senser)>
                <label class="form-check-label" for="fire_sensor">Do you enable Fire Sensor?</label>
            </div>

        </div>
    </div>

    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">
            <strong>Notification Settings</strong>
        </div>
        <div class="card-body">

            <div class="form-check mb-2">
                <input type="hidden" name="alart_sound" value="0">
                <input class="form-check-input" type="checkbox" id="alert_sound" name="alart_sound" value="1" @checked($key->alart_sound)>
                <label class="form-check-label" for="alert_sound">Enable Alert Sound?</label>
            </div>

            <div class="form-check mb-2">
                <input type="hidden" name="send_whatapp" value="0">
                <input class="form-check-input" type="checkbox" id="send_whatsapp" name="send_whatapp" value="1" @checked($key->send_whatapp)>
                <label class="form-check-label" for="send_whatsapp">Send or Receive WhatsApp Enable?</label>
            </div>

            <div class="form-check mb-2">
                <input type="hidden" name="send_sms" value="0">
                <input class="form-check-input" type="checkbox" id="send_sms" name="send_sms" value="1" @checked($key->send_sms)>
                <label class="form-check-label" for="send_sms">Send SMS Alert?</label>
            </div>

            <div class="form-check mb-2">
                <input type="hidden" name="send_emil" value="0">
                <input class="form-check-input" type="checkbox" id="send_telegram" name="send_emil" value="1" @checked($key->send_telegram)>
                <label class="form-check-label" for="send_telegram">Send or Receive Telegram Enable?</label>
            </div>

            <div class="form-check mb-2">
                <input type="hidden" name="send_pumm" value="0">
                <input class="form-check-input" type="checkbox" id="pumm_alert" name="send_pumm" value="1" @checked($key->send_pumm)>
                <label class="form-check-label" for="pumm_alert">Activate Pumm Alert?</label>
            </div>

            <div class="form-check mb-2">
                <input type="hidden" name="send_eleictrical" value="0">
                <input class="form-check-input" type="checkbox" id="electrical_alert" name="send_eleictrical" value="1" @checked($key->send_eleictrical)>
                <label class="form-check-label" for="electrical_alert">Send Electrical Alert?</label>
            </div>

            <div class="form-check mb-2">
                <input type="hidden" name="send_network" value="0">
                <input class="form-check-input" type="checkbox" id="network_alert" name="send_network" value="1" @checked($key->send_network)>
                <label class="form-check-label" for="network_alert">Send Network Alert?</label>
            </div>

        </div>
    </div>

    <div class="text-start">
    <button type="submit" class="btn btn-success px-4">OK</button>
</div>
</form> --}}

                </div>


                <div class="container mt-5">

                </div>
            </div>

        </div>
        <!--**********************************
                Content body end
            ***********************************-->

        <!--**********************************
                Footer start
            ***********************************-->
        <div class="footer">

        </div>
        <!--**********************************
                Footer end
            ***********************************-->

        <!--**********************************
               Support ticket button start
            ***********************************-->

        <!--**********************************
               Support ticket button end
            ***********************************-->



        </div>
        <!--**********************************
            Main wrapper end
        ***********************************-->

        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="vendor/global/global.min.js"></script>
        <script src="vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
        <script src="js/custom.min.js"></script>
        <script src="js/dlabnav-init.js"></script>
        <script src="js/demo.js"></script>
        <script src="js/styleSwitcher.js"></script>
        @livewireScripts
    </body>

</html>
