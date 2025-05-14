@extends('doctor-sidebar')

@section('content')

<h1>Prescriptions</h1>
<form id="prescription-form" class="prescription-form">
    <div class="form-group">
        <label for="patient-display">Patient</label>
        <div class="custom-dropdown">
            <input type="text" id="patient-display" class="patient-display" placeholder="Select Patient" readonly aria-describedby="patient-help">
            <input type="hidden" id="patient" name="patient" required>
            <button type="button" class="dropdown-toggle" aria-expanded="false" aria-controls="patient-list">
                <span class="sr-only">Toggle Patient List</span>
                <img src="{{ asset('img/down.svg') }}" alt="">
            </button>
            <ul id="patient-list" class="choices" aria-hidden="true">
                <li data-value="">Select Patient</li>
                <li data-value="john-doe">John Doe</li>
                <li data-value="jane-smith">Jane Smith</li>
                <li data-value="john-doe">John Doe</li>
                <li data-value="jane-smith">Jane Smith</li>
                <li data-value="john-doe">John Doe</li>
                <li data-value="jane-smith">Jane Smith</li>
                <li data-value="john-doe">John Doe</li>
                <li data-value="jane-smith">Jane Smith</li>
            </ul>
        </div>
    </div>
    <div class="form-group">
        <label for="medication">Medication</label>
        <input type="text" id="medication" placeholder="e.g., Metformin 500mg" required>
    </div>
    <div class="form-group">
        <label for="instructions">Instructions</label>
        <textarea id="instructions" placeholder="e.g., Take 1 tablet daily"></textarea>
    </div>
    <button type="submit" class="submit-btn">Issue Prescription</button>
</form>
<h2>Recent Prescriptions</h2>
<ul id="prescription-list" class="prescription-list">
    <li>John Doe - Metformin 500mg, 15 Apr 2025</li>
</ul>

@endsection