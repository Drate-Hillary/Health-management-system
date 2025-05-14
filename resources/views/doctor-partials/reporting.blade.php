@extends('doctor-sidebar')

@section('content')

<h1>Reporting</h1>
<div class="tabs">
    <button class="tab active" onclick="showTab('patient-results')">Patient Results</button>
    <button class="tab" onclick="showTab('analytics')">Analytics</button>
</div>

<!-- Patient Results Tab -->
<div id="patient-results" class="tab-content active">
    <h2>Patient Results</h2>
    <div class="search-bar">
        <label for="patient-search" class="sr-only">Search by patient name or ID</label>
        <input type="text" id="patient-search" placeholder="Search by patient name or ID" aria-describedby="search-help">
        <select id="date-filter" aria-label="Filter by date">
            <option value="">All Dates</option>
            <option value="last-30-days">Last 30 Days</option>
            <option value="last-90-days">Last 90 Days</option>
            <option value="2025">2025</option>
        </select>
        <button type="button" onclick="filterResults()">Filter</button>
    </div>
    <div class="table-container">
        <table id="results-table">
            <thead>
                <tr>
                    <th>Patient Name</th>
                    <th>Test Type</th>
                    <th>Result</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <!-- Mock data; replace with dynamic data -->
                <tr>
                    <td data-label="Patient Name">John Doe</td>
                    <td data-label="Test Type">Blood Glucose</td>
                    <td data-label="Result">120 mg/dL</td>
                    <td data-label="Date">15 Apr 2025</td>
                </tr>
                <tr>
                    <td data-label="Patient Name">Jane Smith</td>
                    <td data-label="Test Type">Blood Pressure</td>
                    <td data-label="Result">130/85 mmHg</td>
                    <td data-label="Date">10 Apr 2025</td>
                </tr>
                <!-- Dynamic data example -->
                {{-- @foreach ($results as $result)
                                <tr>
                                    <td data-label="Patient Name">{{ $result->patient_name }}</td>
                <td data-label="Test Type">{{ $result->test_type }}</td>
                <td data-label="Result">{{ $result->value }}</td>
                <td data-label="Date">{{ \Carbon\Carbon::parse($result->date)->format('d M Y') }}</td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
    </div>
</div>

<!-- Analytics Tab -->
<div id="analytics" class="tab-content">
    <h2>Analytics</h2>
    <div class="analytics-grid">
        <div class="chart-card">
            <h3>Blood Pressure Trends (John Doe)</h3>
            <canvas id="bp-chart"></canvas>
        </div>
        <div class="chart-card">
            <h3>Appointment Frequency (2025)</h3>
            <canvas id="appointment-chart"></canvas>
        </div>
        <div class="chart-card">
            <h3>Top Prescriptions</h3>
            <canvas id="prescription-chart"></canvas>
        </div>
    </div>
</div>

<!-- Include Chart.js and Font Awesome -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Link CSS and JS -->
<link rel="stylesheet" href="{{ asset('CSS/docRecord.css') }}">
@endsection