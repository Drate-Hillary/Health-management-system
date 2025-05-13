@extends('doctor-sidebar')

@section('content')
    <div class="main-content">
        <section id="profile" class="section">
            <h1>Manage Profile</h1>
            <form id="profile-form" class="profile-form">
                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" id="name" placeholder="Dr. Sarah Smith" required>
                </div>

                <div class="form-group">
                    <label for="specialty">Specialty</label>
                    <div class="custom-dropdown">
                        <input type="text" id="specialty-display" class="specialty-display" placeholder="Select Specialty" readonly aria-describedby="specialty-help">
                        <input type="hidden" id="specialty" name="specialty" value="{{ old('specialty', $doctor->specialty ?? '') }}" required>
                        <button type="button" class="dropdown-toggle" aria-expanded="false" aria-controls="specialty-list">
                            <span class="sr-only">Toggle Specialty List</span>
                            <img src="{{ asset('img/down.svg') }}" alt="">
                        </button>
                        <ul id="specialty-list" class="choices" aria-hidden="true">
                            <li data-value="">Select Specialty</li>
                            <li data-value="Cardiology">Cardiology</li>
                            <li data-value="Dermatology">Dermatology</li>
                            <li data-value="Endocrinology">Endocrinology</li>
                            <li data-value="Gastroenterology">Gastroenterology</li>
                            <li data-value="Neurology">Neurology</li>
                            <li data-value="Obstetrics/Gynecology">Obstetrics/Gynecology</li>
                            <li data-value="Oncology">Oncology</li>
                            <li data-value="Pediatrics">Pediatrics</li>
                            <li data-value="Psychiatry">Psychiatry</li>
                            <li data-value="Radiology">Radiology</li>
                            <li data-value="Surgery">Surgery</li>
                            <li data-value="Urology">Urology</li>
                            <li data-value="Other">Other</li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" placeholder="example@hospital.com" required>
                </div>

                <button type="submit" class="submit-btn">Save Changes</button>
            </form>
        </section>
    </div>

    <!-- Include Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Link CSS and JS -->
    <link rel="stylesheet" href="{{ asset('css/doctor-profile.css') }}">
    <script src="{{ asset('js/doctor-profile.js') }}"></script>
@endsection

