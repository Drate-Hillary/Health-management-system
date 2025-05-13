@extends('doctor-sidebar')

@section('content')

<h1>Welcome, Dr. [Doctor Name]</h1>
<div class="dashboard-grid">
    <div class="card">
        <h3>Today’s Appointments</h3>
        <p>5 Appointments Scheduled</p>
        <button href="{{ route('/doctor-partials/appointment') }}" class="{{ request()->routeIs('/doctor-partials/appointment') }}">View Schedule</button>
    </div>
    <div class="card">
        <h3>Recent Patients</h3>
        <p>Last: John Doe, 15 Apr 2025</p>
        <button onclick="showSection('patients')">View Records</button>
    </div>
    <div class="card">
        <h3>Prescriptions</h3>
        <p>Pending: 3 Prescriptions</p>
        <button onclick="showSection('prescriptions')">Manage Prescriptions</button>
    </div>
    <div class="card">
        <h3>Messages</h3>
        <p>2 Unread Messages</p>
        <button onclick="showSection('communication')">View Messages</button>
    </div>
</div>

@endsection