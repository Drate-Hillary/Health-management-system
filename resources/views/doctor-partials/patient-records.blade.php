@extends('doctor-sidebar')

@section('content')

<h1>Patient Records</h1>
<div class="search-bar">
    <label for="patient-search" class="sr-only">Search by patient name or ID</label>
    <input type="text" id="patient-search" placeholder="Search by patient name or ID" aria-describedby="search-help">
    <button type="button" onclick="searchPatient()">
        <img src="{{ asset('img/search.svg') }}" alt="Search icon" class="search-icon"> Search
    </button>
</div>

<div id="success-message" class="success-message" style="display: none;">
    Updates saved successfully!
</div>

<div class="patient-details">
    <h2>Patient: John Doe</h2>
    <p><strong>ID:</strong> P12345</p>
    <p><strong>Age:</strong> 35</p>
    <p><strong>Medical History:</strong> Hypertension, Type 2 Diabetes</p>
    <p><strong>Last Visit:</strong> 15 Apr 2025</p>

    <form id="patient-update-form" class="patient-update-form">
        <div class="form-wrapper">
            <div class="form-group">
                <label for="diagnosis">Update Diagnosis</label>
                <textarea id="diagnosis" placeholder="Enter diagnosis (e.g., ICD-10 codes)" aria-describedby="diagnosis-help"></textarea>
            </div>
            <div class="form-group">
                <label for="notes">Notes</label>
                <textarea id="notes" placeholder="Additional notes" Ａaria-describedby="notes-help"></textarea>
            </div>
        </div>
        <button type="submit" class="submit-btn">Save Updates</button>
    </form>
</div>

@endsection