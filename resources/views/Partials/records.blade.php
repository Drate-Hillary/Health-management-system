@extends('patient-sidebar')

@section('content')

<h1>Health Records</h1>
<div class="records-container">

    <!-- Tabs for Navigation -->
    <div class="records-tabs">
        <button class="tab active" onclick="showRecordTab('history')">Medical History</button>
        <button class="tab" onclick="showRecordTab('lab-results')">Lab Results</button>
        <button class="tab" onclick="showRecordTab('analytics')">Health Analytics</button>
    </div>

    <!-- Medical History Tab -->
    <div id="history" class="record-tab active">
        <h2>Medical History</h2>
        <table class="records-table">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Diagnosis</th>
                    <th>Treatment</th>
                    <th>Doctor</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>10 Apr 2025</td>
                    <td>Hypertension</td>
                    <td>Lisinopril 10mg</td>
                    <td>Dr. Smith</td>
                    <td>Follow-up in 3 months</td>
                </tr>
                <tr>
                    <td>15 Jan 2025</td>
                    <td>Type 2 Diabetes</td>
                    <td>Metformin 500mg</td>
                    <td>Dr. Jones</td>
                    <td>Monitor blood glucose daily</td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Lab Results Tab -->
    <div id="lab-results" class="record-tab">
        <h2>Lab Results</h2>
        <div class="lab-results-grid">
            <div class="card">
                <h3>Blood Test (15 Apr 2025)</h3>
                <p><strong>Hemoglobin:</strong> 13.5 g/dL (Normal)</p>
                <p><strong>Cholesterol:</strong> 220 mg/dL (High)</p>
                <p><strong>Glucose:</strong> 110 mg/dL (Elevated)</p>
                <button onclick="downloadReport('blood-test-2025-04-15.pdf')">Download Report</button>
            </div>
            <div class="card">
                <h3>Imaging Report (10 Mar 2025)</h3>
                <p><strong>Type:</strong> Chest X-Ray</p>
                <p><strong>Findings:</strong> No abnormalities</p>
                <button onclick="downloadReport('xray-2025-03-10.pdf')">Download Report</button>
            </div>
        </div>
    </div>

    <!-- Analytics Tab -->
    <!-- Analytics Tab -->
    <div id="analytics" class="record-tab">
        <h2>Health Analytics</h2>
        <div class="analytics-container">
            <!-- Filter for Time Range -->
            <div class="analytics-filter">
                <label for="time-range">Select Time Range:</label>
                <select id="time-range">
                    <option value="6m">Last 6 Months</option>
                    <option value="1y">Last 1 Year</option>
                    <option value="all">All Time</option>
                </select>
            </div>
            <!-- Static Visualizations -->
            <div class="charts-grid">
                <!-- Blood Pressure Visualization -->
                <div class="chart-card">
                    <h3>Blood Pressure Trend</h3>
                    <div class="static-chart blood-pressure">
                        <div class="chart-bars">
                            <!-- Systolic -->
                            <div class="chart-bar systolic" style="height: 60%;"></div>
                            <div class="chart-bar systolic" style="height: 62.5%;"></div>
                            <div class="chart-bar systolic" style="height: 65%;"></div>
                            <div class="chart-bar systolic" style="height: 64%;"></div>
                            <div class="chart-bar systolic" style="height: 61%;"></div>
                            <div class="chart-bar systolic" style="height: 67.5%;"></div>
                            <!-- Diastolic -->
                            <div class="chart-bar diastolic" style="height: 40%;"></div>
                            <div class="chart-bar diastolic" style="height: 41%;"></div>
                            <div class="chart-bar diastolic" style="height: 42.5%;"></div>
                            <div class="chart-bar diastolic" style="height: 41.5%;"></div>
                            <div class="chart-bar diastolic" style="height: 40%;"></div>
                            <div class="chart-bar diastolic" style="height: 44%;"></div>
                        </div>
                        <div class="chart-labels">
                            <span>Nov 2024</span>
                            <span>Dec 2024</span>
                            <span>Jan 2025</span>
                            <span>Feb 2025</span>
                            <span>Mar 2025</span>
                            <span>Apr 2025</span>
                        </div>
                    </div>
                </div>
                <!-- Cholesterol Visualization -->
                <div class="chart-card">
                    <h3>Cholesterol Levels</h3>
                    <div class="static-chart">
                        <div class="chart-bars">
                            <div class="chart-bar cholesterol" style="height: 80%;"></div>
                            <div class="chart-bar cholesterol" style="height: 82%;"></div>
                            <div class="chart-bar cholesterol" style="height: 84%;"></div>
                            <div class="chart-bar cholesterol" style="height: 86%;"></div>
                            <div class="chart-bar cholesterol" style="height: 87.2%;"></div>
                            <div class="chart-bar cholesterol" style="height: 88%;"></div>
                        </div>
                        <div class="chart-labels">
                            <span>Nov 2024</span>
                            <span>Dec 2024</span>
                            <span>Jan 2025</span>
                            <span>Feb 2025</span>
                            <span>Mar 2025</span>
                            <span>Apr 2025</span>
                        </div>
                    </div>
                </div>
                <!-- Blood Glucose Visualization -->
                <div class="chart-card">
                    <h3>Blood Glucose Levels</h3>
                    <div class="static-chart">
                        <div class="chart-bars">
                            <div class="chart-bar glucose" style="height: 60%;"></div>
                            <div class="chart-bar glucose" style="height: 63.3%;"></div>
                            <div class="chart-bar glucose" style="height: 66.7%;"></div>
                            <div class="chart-bar glucose" style="height: 70%;"></div>
                            <div class="chart-bar glucose" style="height: 72%;"></div>
                            <div class="chart-bar glucose" style="height: 73.3%;"></div>
                        </div>
                        <div class="chart-labels">
                            <span>Nov 2024</span>
                            <span>Dec 2024</span>
                            <span>Jan 2025</span>
                            <span>Feb 2025</span>
                            <span>Mar 2025</span>
                            <span>Apr 2025</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Insights -->
            <div class="insights">
                <h3>Health Insights</h3>
                <ul>
                    <li class="alert"><i class="fas fa-exclamation-triangle"></i> High cholesterol detected in last test (220 mg/dL).</li>
                    <li><i class="fas fa-check-circle"></i> Blood pressure stable over the last 6 months.</li>
                    <li><i class="fas fa-info-circle"></i> Monitor glucose levels closely due to elevated readings.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection