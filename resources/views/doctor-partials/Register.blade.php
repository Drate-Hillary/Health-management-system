@extends('doctor-sidebar')

@section('content')

<h1>Register Patient</h1>

@if (session('success'))
<div class="success success-message msg">
    {{ session('success') }}
</div>
@endif

@if($errors->any())
<div class="error-messages msg">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form id="profile-form" action="{{ route('patients.register') }}" method="POST">

    @csrf
    <div class="form-grid">
        <div class="form-group">
            <label for="patient_id">Patient ID</label>
            <input type="text" id="patient_id" name="patient_id" value="{{ old('patient_id', session('generated_patient_id')) }}" style="cursor: not-allowed;" required>
            <a href="{{ route('patient.generateID') }}"></a>
        </div>

        <div class="form-group">
            <label for="name">Patient Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" placeholder="John Doe" required>
        </div>

        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" value="{{ old('age') }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender</label>
            <div class="custom-dropdown">
                <input type="text" id="gender" name="gender" placeholder="Select Patient's Gender" value="{{ old('gender') }}" readonly>
                <button type="button" class="dropdown-toggle" aria-label="Toggle gender dropdown">
                    <img src="{{ asset('img/down.svg') }}" class="down" alt="">
                </button>
                <ul class="choices">
                    <li data-value="" disabled>Select the Patient's Gender</li>
                    <li data-value="Male">Male</li>
                    <li data-value="Female">Female</li>
                </ul>
            </div>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="johndoe@patients.com" required>
        </div>

        <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" name="phone" placeholder="+1234567890" required>
        </div>
    </div>

    <button type="submit" class="submit-btn">Save Details</button>
</form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const msg = document.querySelector('.msg');

        if (msg) {
            setTimeout(function() {
                let opacity = 1;
                const fadeInterval = setInterval(function() {
                    if (opacity <= 0) {
                        clearInterval(fadeInterval);
                        msg.style.display = 'none';
                    } else {
                        opacity -= 0.05;
                        msg.style.opacity = opacity;
                    }
                }, 50);
            }, 2000);
        }
    });

    const dropdowns = document.querySelectorAll('.custom-dropdown');
    dropdowns.forEach(dropdown => {
        const input = dropdown.querySelector('input');
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const choices = dropdown.querySelector('.choices');
        const options = choices.querySelectorAll('li:not([disabled])');

        toggle.addEventListener('click', () => {
            choices.classList.toggle('active');
        });

        options.forEach(option => {
            option.addEventListener('click', () => {
                input.value = option.getAttribute('data-value');
                choices.classList.remove('active');
            });
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', (e) => {
            if (!dropdown.contains(e.target)) {
                choices.classList.remove('active');
            }
        });
    });
</script>

@endsection