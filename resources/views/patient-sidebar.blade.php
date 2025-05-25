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
    <!-- Hamburger Menu Icon -->
    <div class="hamburger" onclick="toggleSidebar()">
        <img src="{{ asset('img/menu.svg') }}" alt="">
    </div>

    <!-- Sidebar Navigation -->
    <div class="sidebar" id="sidebar">
        <div class="logo">
            <h2>HMS Patient</h2>
        </div>
        <ul>
            <li>
                <a href="{{ route('/patients/dashboard') }}" class="{{ request()->routeIs('patients.dashboard') ? 'active' : '' }}">
                    <img src="{{ asset('img/dashboard.svg') }}" alt=""> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('/patients/profile') }}" class="{{ request()->routeIs('partials.profile') ? 'active' : '' }}">
                    <img src="{{ asset('img/user.svg') }}" alt=""> <span>Profile</span>
                </a>
            </li>
            <li>
                <a href="{{ route('/patients/appointment') }}" class="{{ request()->routeIs('partial.appointment') ? 'active' : '' }}">
                    <img src="{{ asset('img/calendar.svg') }}" alt=""> <span>Appointments</span>
                </a>
            </li>
            <li>
                <a href="{{ route('/patients/records') }}" class="{{ request()->routeIs('partials.records') ? 'active' : '' }}">
                    <img src="{{ asset('img/records.svg') }}" alt=""> <span>Health Records</span>
                </a>
            </li>
            <li>
                <a href="{{ route('/patients/prescription') }}" class="{{ request()->routeIs('partials.prescription') ? 'active' : '' }}">
                    <img src="{{ asset('img/prescription.svg') }}" alt=""> <span>Prescriptions</span>
                </a>
            </li>
            <li>
                <a href="{{ route('/patients/billing') }}" class="{{ request()->routeIs('partials.billing') ? 'active' : '' }}">
                    <img src="{{ asset('img/creditCard.svg') }}" alt=""> <span>Billing</span>
                </a>
            </li>
            <li>
                <a href="{{ route('/patients/telemedicine') }}" class="{{ request()->routeIs('partials.telemedicine') ? 'active' : '' }}">
                    <img src="{{ asset('img/message.svg') }}" alt=""> <span>Telemedicine</span>
                </a>
            </li>
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

    <!-- Main Content -->
    <div class="main-content">
        <div class="details">
            <img src="{{ asset('img/card.svg') }}" alt="">
        </div>
        @yield('content')
    </div>

    <!-- External JS -->
    <script src="{{ asset('JS/app.js') }}"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }
    </script>
</body>
</html>