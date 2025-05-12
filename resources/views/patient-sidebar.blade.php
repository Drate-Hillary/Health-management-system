<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard - Health Management System</title>

    <link rel="stylesheet" href="{{ asset('CSS/PatientSidebar.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/profile.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/billing.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/telemedicine.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/appointment.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/record.css') }}">
    <link rel="stylesheet" href="{{ asset('CSS/prescription.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <!-- Sidebar Navigation -->
    <div class="sidebar">

        <div class="logo">
            <h2>HMS Patient</h2>
        </div>

        <ul>
            <li>
                <a href="{{ route('/partials/dashboard') }}" class="{{ request()->routeIs('/partials/dashboard') ? 'active' : '' }}">
                    <img src="{{ asset('img/dashboard.svg') }}" alt=""> Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('/partials/profile') }}" class="{{ request()->routeIs('/partials/profile') ? 'active' : ''}}" >
                    <img src="{{ asset('img/user.svg') }}" alt=""> Profile
                </a>
            </li>

            <li>
                <a href="{{ route('/partials/appointment') }}" class="{{ request()->routeIs('/partial/appointment') ? 'active' : '' }}">
                    <img src="{{ asset('img/calendar.svg') }}" alt=""> Appointments
                </a>
            </li>

            <li>
                <a href="{{ route('/partials/records') }}" class="{{ request()->routeIs('/partials/records') ? 'active' : '' }}" >
                    <img src="{{ asset('img/records.svg') }}" alt=""> Health Records
                </a>
            </li>

            <li>
                <a href="{{ route('/partials/perscription') }}" class="{{ request()->routeIs('/partials/prescription') ? 'active' : '' }}" >
                    <img src="{{ asset('img/prescription.svg') }}" alt=""> Prescriptions
                </a>
            </li>

            <li>
                <a href="{{ route('/partials/billing') }}" class="{{ request()->routeIs('/partials/billing') ? 'active' : '' }}" >
                    <img src="{{ asset('img/creditCard.svg') }}" alt=""> Billing
                </a>
            </li>

            <li>
                <a href="{{ route('/partials/telemedicine') }}" class="{{ request()->routeIs('/partials/telemedicine') ? 'active' : '' }}" >
                    <img src="{{ asset('img/message.svg') }}" alt=""> Telemedicine
                </a>
            </li>

            <li>
                <a href="#" onclick="logout()" class="logout">
                    <img src="{{ asset('img/logout.svg') }}" alt=""> Logout
                </a>
            </li>

        </ul>
    </div>

    <!-- main content -->
    <div class="main-content">

        @yield('content')

    </div>


    <!-- External js -->
    <script src="{{ asset('JS/app.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/chart.js"></script>

</body>

</html>