@extends('patient-sidebar')

@section('content')

<link rel="stylesheet" href="{{ asset('CSS/appoint.css') }}">
<!-- Appointments Section -->

<div class="appointment-wrapper">

    <div class="header">
        <h1>Appointments</h1>
        <div class="search-container">
            <img src="{{ asset('img/search.svg') }}" alt="">
            <input type="text" class="search-bar" placeholder="Search">
        </div>
        <div class="filter">
            <img src="{{ asset('img/filter.svg') }}" alt="">
        </div>
        <button class="app-btn">New Appointment</button>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr style="border-top: none;">
                    <th class="active-filters" colspan="4">Active filters: <span class="completed">Completed</span> <span class="pending">Pending</span></th>
                </tr>
                <tr>
                    <th>Patient</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img src="https://images.unsplash.com/photo-1695392175234-2cd1b7eca108?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8cG9ydGFyaXR8ZW58MHx8MHx8fDA%3D"
                            alt="Profile" class="profile-pic">
                        <div class="doctor-info">
                            <p>Docteur Docteur</p>
                            <p>vatsal@gmail.com</p>
                        </div>
                    </td>
                    <td>
                        <div class="time-date">
                            <p cass="time">3:15 PM</p>
                            <p class="date">23rd Apr, 2025</p>
                        </div>
                    </td>
                    <td>
                        <span class="status completed">Completed</span>
                    </td>
                    <td>
                        <span class="edit"><img src="{{ asset('img/edit.svg') }}" alt=""></span>
                        <span class="delete"><img src="{{ asset('img/delete.svg') }}" alt=""></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8cG9ydHJhaXR8ZW58MHx8MHx8fDA%3D"
                            alt="Profile" class="profile-pic">
                        <div class="doctor-info">
                            <p>Docteur Docteur</p>
                            <p>vatsal@gmail.com</p>
                        </div>
                    </td>
                    <td>
                        <div class="time-date">
                            <p>5:15 PM</p>
                            <p>16th Apr, 2025</p>
                        </div>
                    </td>
                    <td>
                        <span class="status pending">Pending</span>
                    </td>
                    <td>
                        <span class="edit"><img src="{{ asset('img/edit.svg') }}" alt=""></span>
                        <span class="delete"><img src="{{ asset('img/delete.svg') }}" alt=""></span>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<div class="form-container">
    <form id="appointment-form">
        <h1>Book Appointment</h1>
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
</div>

<script>
    const appBtn = document.querySelector('.app-btn');
    const appointmentForm = document.getElementById('appointment-form');
    const formContainer = document.querySelector('.form-container');
    appBtn.addEventListener('click', () => {
        appointmentForm.style.display = appointmentForm.style.display = 'none' ? 'block' : 'none';
        formContainer.classList.add('active');
    });
</script>

@endsection