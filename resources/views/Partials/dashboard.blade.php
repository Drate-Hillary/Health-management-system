@extends('patient-sidebar')

@section('content')

<!-- Dashboard Section -->
<h1>Welcome, [Patient Name]</h1>
<div class="dashboard-grid">
    <div class="card">
        <h3>Upcoming Appointments</h3>
        <span class="span-section">
            <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?q=80&w=1528&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                alt="">
            <p>
                <span>Doctor's Name: <span class="span2">Dr. Smith</span></span>
                <span>Date: 25 Apr, 2025</span>
                <span>Time: 10:00 AM</span>
            </p>
        </span>
        <button onclick="showSection('appointments')">Book New</button>
    </div>
    <div class="card">
        <h3>Health Summary</h3>
        <p>Last Checkup: 15 Apr 2025</p>
        <button onclick="showSection('records')">View Records</button>
    </div>
    <div class="card">
        <h3>Prescriptions</h3>
        <p>Active: 2 Medications</p>
        <button onclick="showSection('prescriptions')">View Prescriptions</button>
    </div>
    <div class="card">
        <h3>Billing</h3>
        <p>Pending: $150</p>
        <button onclick="showSection('billing')">Pay Now</button>
    </div>
</div>

@endsection