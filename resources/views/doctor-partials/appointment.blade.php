@extends('doctor-sidebar')

@section('content')

<h1>Appointments</h1>
<h2>Today’s Schedule</h2>
<div class="table-container">
    <table id="appointment-table">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Patient Name">John Doe</td>
                <td data-label="Time">10:00 AM</td>
                <td data-label="Actions">
                    <button class="btn btn-start">Start Consultation</button>
                    <button class="btn btn-cancel">Cancel</button>
                </td>
            </tr>
            <tr>
                <td data-label="Patient Name">Jane Smith</td>
                <td data-label="Time">11:30 AM</td>
                <td data-label="Actions">
                    <button class="btn btn-start">Start Consultation</button>
                    <button class="btn btn-cancel">Cancel</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection