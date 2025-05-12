@extends('patient-sidebar')

@section('content')

<!-- Prescriptions Tab -->
<h2>Prescriptions</h2>
<div class="prescriptions-container">
    <div class="prescription-card">
        <h3>Current Prescriptions</h3>
        <div class="prescription-table">
            <table>
                <thead>
                    <tr>
                        <th>Medication</th>
                        <th>Dosage</th>
                        <th>Frequency</th>
                        <th>Start Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Lisinopril</td>
                        <td>10 mg</td>
                        <td>Once daily</td>
                        <td>2024-11-01</td>
                        <td class="status active">Active</td>
                    </tr>
                    <tr>
                        <td>Metformin</td>
                        <td>500 mg</td>
                        <td>Twice daily</td>
                        <td>2024-12-15</td>
                        <td class="status active">Active</td>
                    </tr>
                    <tr>
                        <td>Atorvastatin</td>
                        <td>20 mg</td>
                        <td>Once daily</td>
                        <td>2025-01-10</td>
                        <td class="status active">Active</td>
                    </tr>
                    <tr>
                        <td>Aspirin</td>
                        <td>81 mg</td>
                        <td>Once daily</td>
                        <td>2024-10-01</td>
                        <td class="status discontinued">Discontinued</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection