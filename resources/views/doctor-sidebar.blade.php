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
            <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?q=80&w=1528&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="">
            <h2>HMS Doctor</h2>
        </div>
        <ul>
            <div class="scrollable">
                <li>
                    <a href="{{ route('/doctor-partials/dashboard') }}" class="{{ request()->routeIs('/doctor-partials/dashboard') ? 'active' : '' }}" >
                        <img src="{{ asset('img/dashboard.svg') }}" alt=""> <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/patient-records') }}" class="{{ request()->routeIs('/doctor-partials/patient-rcords') ? 'active' : '' }}">
                        <img src="{{ asset('img/records.svg') }}" alt=""> <span>Patient Records</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/appointment') }}" class="{{ request()->routeIs('/doctor-partials/appointment') ? 'active' : '' }}" >
                        <img src="{{ asset('img/calendar.svg') }}" alt=""> <span>Appointments</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/prescription') }}" class="{{ request()->routeIs('/doctor-partials/prescription') ? 'active' : '' }}">
                        <img src="{{ asset('img/prescription.svg') }}" alt=""> <span>Prescriptions</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/telemedicine') }}" class="{{ request()->routeIs('/doctor-partials/telemedicine') ? 'active' : '' }}">
                        <img src="{{ asset('img/message.svg') }}" alt=""> <span> Telemedicine</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/reporting') }}" class="{{ request()->routeIs('/doctor-partials/reporting') ? 'active' : '' }}" >
                        <img src="{{ asset('img/report.svg') }}" alt=""> <span>Reporting</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('/doctor-partials/profile') }}" class="{{ request()->routeIs('/doctor-partials/profile') ? 'active' : '' }}">
                        <img src="{{ asset('img/user.svg') }}" alt=""> <span>Profile</span>
                    </a>
                </li>
            </div>

            <li>
                <a href="#" onclick="logout()" class="logout">
                    <img src="{{ asset('img/logout.svg') }}" alt=""> <span>Logout</span>
                </a>
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