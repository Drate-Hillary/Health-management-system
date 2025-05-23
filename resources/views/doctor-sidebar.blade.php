<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor's Dashboard</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="{{ asset('CSS/docSidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/telemedicine.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/appoint.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/patientrecord.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/docprescription.css') }}">

</head>
<body>
    
    <!-- Sidebar Navigation -->
    <div class="sidebar">
        <div class="logo">
            <img src="{{ asset('img/user.svg') }}" alt="">
            <h2>{{ auth('doctor')->user()->specialty }}</h2>
        </div>
        <hr>
        <ul>
            <div class="scrollable">
                <li>
                    <a href="{{ route('/doctor-partials/dashboard') }}" class="{{ request()->routeIs('doctor-partials.dashboard') ? 'active' : '' }}" >
                        <img src="{{ asset('img/dashboard.svg') }}" alt=""> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/register') }}" class="{{ request()->routeIs('doctor-partials.register') ? 'active' : '' }}" >
                        <img src="{{ asset('img/register.svg') }}" alt=""> <span>Register Patient</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/patient-records') }}" class="{{ request()->routeIs('doctor-partials.patient-records') ? 'active' : '' }}">
                        <img src="{{ asset('img/records.svg') }}" alt=""> <span>Patient Records</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/appointment') }}" class="{{ request()->routeIs('doctor-partials.appointment') ? 'active' : '' }}" >
                        <img src="{{ asset('img/calendar.svg') }}" alt=""> <span>Appointments</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/prescription') }}" class="{{ request()->routeIs('doctor-partials.prescription') ? 'active' : '' }}">
                        <img src="{{ asset('img/prescription.svg') }}" alt=""> <span>Prescriptions</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/telemedicine') }}" class="{{ request()->routeIs('doctor-partials.telemedicine') ? 'active' : '' }}">
                        <img src="{{ asset('img/message.svg') }}" alt=""> <span> Telemedicine</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/reporting') }}" class="{{ request()->routeIs('doctor-partials.reporting') ? 'active' : '' }}" >
                        <img src="{{ asset('img/report.svg') }}" alt=""> <span>Reporting</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/profile') }}" class="{{ request()->routeIs('doctor-partials.profile') ? 'active' : '' }}">
                        <img src="{{ asset('img/user.svg') }}" alt=""> <span>Profile</span>
                    </a>
                </li>
            </div>

            <li>
                <form action="{{ route('logout') }}" method="Post" >
                    @csrf
                    <button type="submit" class="logout">
                        <img src="{{ asset('img/logout.svg') }}" alt=""><span>Logout</span>
                    </button>
                </form>
            </li>

        </ul>

    </div>

    <!-- main content -->
     <div class="main-content">
        @yield('content')
     </div>


     <!-- JS -->
      <script src="{{ asset('JS/app.js') }}"></script>

</body>
</html>