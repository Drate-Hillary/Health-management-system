@extends('patient-sidebar')

@section('content')

<!-- Appointments Section -->
<h1>Book Appointment</h1>

<div class="msg">
    Appointment booked successfully!
</div>

<form id="appointment-form">
    <label for="doctor">Select Doctor</label>
    <select id="doctor" required>
        <option value="">Choose a doctor</option>
        <option value="dr-smith">Dr. Smith (Cardiologist)</option>
        <option value="dr-jones">Dr. Jones (General Physician)</option>
    </select>

    <div class="date-time">
        <div class="input">
            <label for="date">Date</label>
            <input type="date" id="date" required>
        </div>

        <div class="input">
            <label for="time">Time</label>
            <input type="time" id="time" required>
        </div>
    </div>

    <button type="submit" class="submit-btn">Book Appointment</button>
</form>
<h2>Upcoming Appointments</h2>

<div class="msg bg-red-200">
    Appointment cancelled successfully!
</div>
<ul id="appointment-list">
    <li>Dr. Smith - 25 Apr 2025, 10:00 AM <button onclick="cancelAppointment(this)">Cancel</button></li>
</ul>

@endsection
