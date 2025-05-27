@extends('doctor-sidebar')

@section('content')

<h1>Welcome, {{ Auth('doctor')->user()->name }}</h1>
<div class="dashboard-grid">
    <div class="card">
        <h3>Today’s Appointments</h3>
        <p>{{ $combinedCount }} Appointment{{ $combinedCount != 1 ? 's' : '' }} Scheduled</p>
        <a href="{{ route('/doctor-partials/appointment') }}">
            <button type="submit" >View Schedule</button>
        </a>
    </div>
    <div class="card">
        <h3>Recent Patients</h3>
        <p>Last: John Doe, 15 Apr 2025</p>
        <a href="{{ route('/doctor-partials/patient-records') }}">
            <button type="submit">View Records</button>
        </a>
    </div>
    <div class="card">
        <h3>Prescriptions</h3>
        <p>Pending: 3 Prescriptions</p>
        <a href="{{ route('/doctor-partials/prescription') }}">
            <button type="submit" >Manage Prescriptions</button>
        </a>
    </div>
    <div class="card">
        <h3>Messages</h3>
        <p>2 Unread Messages</p>
        <a href="{{ route('/doctor-partials/telemedicine') }}">
            <button type="submit" >View Messages</button>
        </a>
    </div>
</div>

@endsection