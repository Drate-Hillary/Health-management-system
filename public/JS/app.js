function showRecordTab(tabId) {
    // Hide all record tabs
    document.querySelectorAll('.record-tab').forEach(tab => {
        tab.classList.remove('active');
    });

    // Show the selected tab
    const selectedTab = document.getElementById(tabId);
    if (selectedTab) {
        selectedTab.classList.add('active');
    } else {
        console.error(`Tab with ID "${tabId}" not found.`);
    }

    // Update tab button active state
    document.querySelectorAll('.records-tabs .tab').forEach(button => {
        button.classList.remove('active');
        if (button.getAttribute('onclick') === `showRecordTab('${tabId}')`) {
            button.classList.add('active');
        }
    });
}

// Analytics Charts
let bloodPressureChart, cholesterolChart, glucoseChart;

function initializeCharts() {
    // Sample data (replace with real data from server)
    const data = {
        '6m': {
            labels: ['Nov 2024', 'Dec 2024', 'Jan 2025', 'Feb 2025', 'Mar 2025', 'Apr 2025'],
            bloodPressure: {
                systolic: [120, 125, 130, 128, 122, 135],
                diastolic: [80, 82, 85, 83, 80, 88]
            },
            cholesterol: [200, 205, 210, 215, 218, 220],
            glucose: [90, 95, 100, 105, 108, 110]
        },
        '1y': {
            labels: ['May 2024', 'Jul 2024', 'Sep 2024', 'Nov 2024', 'Jan 2025', 'Mar 2025'],
            bloodPressure: {
                systolic: [118, 122, 127, 130, 125, 135],
                diastolic: [78, 80, 83, 85, 82, 88]
            },
            cholesterol: [195, 200, 205, 210, 215, 220],
            glucose: [85, 90, 95, 100, 105, 110]
        },
        'all': {
            labels: ['Jan 2024', 'Apr 2024', 'Jul 2024', 'Oct 2024', 'Jan 2025', 'Apr 2025'],
            bloodPressure: {
                systolic: [110, 118, 122, 130, 125, 135],
                diastolic: [75, 78, 80, 85, 82, 88]
            },
            cholesterol: [190, 195, 200, 210, 215, 220],
            glucose: [80, 85, 90, 100, 105, 110]
        }
    };

    // Blood Pressure Chart
    bloodPressureChart = new Chart(document.getElementById('bloodPressureChart'), {
        type: 'line',
        data: {
            labels: data['6m'].labels,
            datasets: [
                {
                    label: 'Systolic (mmHg)',
                    data: data['6m'].bloodPressure.systolic,
                    borderColor: '#007bff',
                    fill: false
                },
                {
                    label: 'Diastolic (mmHg)',
                    data: data['6m'].bloodPressure.diastolic,
                    borderColor: '#ff5733',
                    fill: false
                }
            ]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: false,
                    suggestedMin: 60,
                    suggestedMax: 150
                }
            }
        }
    });

    // Cholesterol Chart
    cholesterolChart = new Chart(document.getElementById('cholesterolChart'), {
        type: 'line',
        data: {
            labels: data['6m'].labels,
            datasets: [{
                label: 'Cholesterol (mg/dL)',
                data: data['6m'].cholesterol,
                borderColor: '#28a745',
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: false,
                    suggestedMin: 150,
                    suggestedMax: 250
                }
            }
        }
    });

    // Glucose Chart
    glucoseChart = new Chart(document.getElementById('glucoseChart'), {
        type: 'line',
        data: {
            labels: data['6m'].labels,
            datasets: [{
                label: 'Glucose (mg/dL)',
                data: data['6m'].glucose,
                borderColor: '#ffc107',
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: false,
                    suggestedMin: 70,
                    suggestedMax: 150
                }
            }
        }
    });
}

// Update charts based on time range
function updateCharts() {
    const timeRange = document.getElementById('time-range').value;
    const data = {
        '6m': {
            labels: ['Nov 2024', 'Dec 2024', 'Jan 2025', 'Feb 2025', 'Mar 2025', 'Apr 2025'],
            bloodPressure: {
                systolic: [120, 125, 130, 128, 122, 135],
                diastolic: [80, 82, 85, 83, 80, 88]
            },
            cholesterol: [200, 205, 210, 215, 218, 220],
            glucose: [90, 95, 100, 105, 108, 110]
        },
        '1y': {
            labels: ['May 2024', 'Jul 2024', 'Sep 2024', 'Nov 2024', 'Jan 2025', 'Mar 2025'],
            bloodPressure: {
                systolic: [118, 122, 127, 130, 125, 135],
                diastolic: [78, 80, 83, 85, 82, 88]
            },
            cholesterol: [195, 200, 205, 210, 215, 220],
            glucose: [85, 90, 95, 100, 105, 110]
        },
        'all': {
            labels: ['Jan 2024', 'Apr 2024', 'Jul 2024', 'Oct 2024', 'Jan 2025', 'Apr 2025'],
            bloodPressure: {
                systolic: [110, 118, 122, 130, 125, 135],
                diastolic: [75, 78, 80, 85, 82, 88]
            },
            cholesterol: [190, 195, 200, 210, 215, 220],
            glucose: [80, 85, 90, 100, 105, 110]
        }
    };

    // Update Blood Pressure Chart
    bloodPressureChart.data.labels = data[timeRange].labels;
    bloodPressureChart.data.datasets[0].data = data[timeRange].bloodPressure.systolic;
    bloodPressureChart.data.datasets[1].data = data[timeRange].bloodPressure.diastolic;
    bloodPressureChart.update();

    // Update Cholesterol Chart
    cholesterolChart.data.labels = data[timeRange].labels;
    cholesterolChart.data.datasets[0].data = data[timeRange].cholesterol;
    cholesterolChart.update();

    // Update Glucose Chart
    glucoseChart.data.labels = data[timeRange].labels;
    glucoseChart.data.datasets[0].data = data[timeRange].glucose;
    glucoseChart.update();
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', () => {
    // Initialize charts when records section is opened
    document.querySelector('a[onclick="showSection(\'records\')"]').addEventListener('click', () => {
        if (!bloodPressureChart) {
            initializeCharts();
        }
    });
});