@extends('patient-sidebar')

@section('content')

<link rel="stylesheet" href="{{ asset('CSS/appoint.css') }}">

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
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
        <button href="{{ route('patients.appointment') }}" class="app-btn">New Appointment</button>
    </div>

    <div class="table-container">
        <table>
            <thead>
                <tr style="border-top: none;">
                    <th class="active-filters" colspan="4">Active filters: <span class="completed">Completed</span> <span class="pending">Pending</span></th>
                </tr>
                <tr>
                    <th>Doctor</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                <tr data-status="{{ $appointment->status }}">
                    <td>
                        <img src="https://media.istockphoto.com/id/2193298525/photo/portrait-of-a-smiling-female-doctor-looking-at-camera.webp?a=1&b=1&s=612x612&w=0&k=20&c=34vKqLqRNTmfXKdHBSOlJePXvFgwBvUUqu8r1VA5nmI="
                            alt="Profile" class="profile-pic">
                        <div class="doctor-info">
                            <p>{{ $appointment->doctor?->name }}</p>
                            <p>{{ $appointment->doctor?->email }}</p>
                        </div>
                    </td>
                    <td>
                        <div class="time-date">
                            <p cass="time">{{ $appointment->appointment_time->format('h:i A') }}</p>
                            <p class="date">{{ $appointment->appointment_date->format('jS M, Y') }}</p>
                        </div>
                    </td>
                    <td>
                        <span class="status {{ $appointment->status }}">{{ ucfirst($appointment->status) }}</span>
                    </td>
                    <td>
                        <div class="edit-delete">
                            <span><img src="{{ asset('img/edit.svg') }}" alt=""></span>

                            <form action="{{ route('patients.appointment.destroy', ['appointment' => $appointment->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete" >
                                    <img src="{{ asset('img/delete.svg') }}" alt="">
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                @empty
                <tr colspan="4">
                    <td>No Appointments Found</td>
                </tr>

                @endforelse
            </tbody>
        </table>
    </div>
</div>


<div class="form-container">
    <form action="{{  route('appointment.store') }}" method="post" id="appointment-form">

        <div class="head">
            <h4>Book an Appointment</h4>
            <img class="close" src="{{ asset('img/close.svg') }}" alt="">
        </div>

        <div class="content">
            <label for="doctor_id">Select Doctor</label>
            <select id="doctor_id" name="doctor_id" required>
                <option value="">Choose a doctor</option>

                @foreach ($doctors as $doctor)
                <option
                    value="{{ $doctor->doctor_id }}"
                    {{  old('doctor_id') == $doctor->doctor_id ? 'selected' : '' }}>
                    {{ $doctor->name }} ({{ $doctor->specialty }})
                </option>
                @endforeach

            </select>

            <div class="date-time">
                <div class="input">
                    <label for="appointment_date">Date</label>
                    <input type="date" name="appointment_date" id="appointment_date" value="{{ old('appointment_date') }}" required>
                </div>

                <div class="input">
                    <label for="appointment_time">Time</label>
                    <input type="time" name="appointment_time" id="appointment_time" value="{{ old('appointment_time') }}" required>
                </div>
            </div>
        </div>

        <button type="submit" class="submit-btn">
            Book Appointment
        </button>
    </form>
</div>

<script>
    const appBtn = document.querySelector('.app-btn');
    const appointmentForm = document.getElementById('appointment-form');
    const formContainer = document.querySelector('.form-container');
    const close = document.querySelector('.close');
    appBtn.addEventListener('click', () => {
        appointmentForm.style.display = appointmentForm.style.display = 'none' ? 'block' : 'none';
        formContainer.classList.add('active');
    });

    close.addEventListener('click', () => {
        formContainer.classList.remove('active');
    });

    formContainer.addEventListener('click', (e) => {
        if (e.target === this) {
            this.classList.remove('active');
        }
    });
</script>

@endsection