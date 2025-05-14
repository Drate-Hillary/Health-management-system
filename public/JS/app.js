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

const dropdownToggle = document.querySelector('.dropdown-toggle');
const specialtyList = document.querySelector('#specialty-list');
const specialtyDisplay = document.querySelector('#specialty-display');
const specialtyInput = document.querySelector('#specialty');
const choices = document.querySelectorAll('.choices li');
const form = document.querySelector('#profile-form');

// Toggle dropdown
dropdownToggle.addEventListener('click', () => {
    const isOpen = specialtyList.classList.toggle('active');
    specialtyList.setAttribute('aria-hidden', !isOpen);
    dropdownToggle.setAttribute('aria-expanded', isOpen);
});

// Handle selection
choices.forEach(choice => {
    choice.addEventListener('click', () => {
        const value = choice.getAttribute('data-value');
        const text = choice.textContent;

        // Update display and hidden input
        specialtyDisplay.value = text;
        specialtyInput.value = value;

        // Highlight selected item
        choices.forEach(c => c.removeAttribute('aria-selected'));
        choice.setAttribute('aria-selected', 'true');

        // Close dropdown
        specialtyList.classList.remove('active');
        specialtyList.setAttribute('aria-hidden', 'true');
        dropdownToggle.setAttribute('aria-expanded', 'false');
    });

    // Keyboard navigation
    choice.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            choice.click();
        }
    });
});

const patientList = document.querySelector('#patient-list');
const patientDisplay = document.querySelector('#patient-display');
const patientInput = document.querySelector('#patient');
const prescriptionList = document.querySelector('#prescription-list');

// Toggle dropdown
dropdownToggle.addEventListener('click', () => {
    const isOpen = patientList.classList.toggle('active');
    patientList.setAttribute('aria-hidden', !isOpen);
    dropdownToggle.setAttribute('aria-expanded', isOpen);
});

// Handle selection
choices.forEach(choice => {
    choice.addEventListener('click', () => {
        const value = choice.getAttribute('data-value');
        const text = choice.textContent;

        // Update display and hidden input
        patientDisplay.value = text;
        patientInput.value = value;

        // Highlight selected item
        choices.forEach(c => c.removeAttribute('aria-selected'));
        choice.setAttribute('aria-selected', 'true');

        // Close dropdown
        patientList.classList.remove('active');
        patientList.setAttribute('aria-hidden', 'true');
        dropdownToggle.setAttribute('aria-expanded', 'false');
    });

    // Keyboard navigation
    choice.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            choice.click();
        }
    });
});

// Close dropdown when clicking outside
document.addEventListener('click', (e) => {
    if (!patientList.contains(e.target) && !dropdownToggle.contains(e.target)) {
        patientList.classList.remove('active');
        patientList.setAttribute('aria-hidden', 'true');
        dropdownToggle.setAttribute('aria-expanded', 'false');
    }
});

// Tab Switching
function showTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(content => {
        content.classList.remove('active');
    });
    document.querySelectorAll('.tab').forEach(tab => {
        tab.classList.remove('active');
    });

    document.getElementById(tabId).classList.add('active');
    document.querySelector(button[onclick="showTab('${tabId}')"]).classList.add('active');
}

// Filter Results
function filterResults() {
    const query = document.getElementById('patient-search').value;
    const dateFilter = document.getElementById('date-filter').value;
    // Replace with API call: fetch(/api/results?query=${query}&date=${dateFilter})
}

// Chart Initialization
document.addEventListener('DOMContentLoaded', () => {
    // Blood Pressure Trend Chart (Line)
    const bpChart = new Chart(document.getElementById('bp-chart'), {
        type: 'line',
        data: {
            labels: ['Jan 2025', 'Feb 2025', 'Mar 2025', 'Apr 2025'],
            datasets: [{
                label: 'Systolic (mmHg)',
                data: [120, 125, 130, 128],
                borderColor: '#3498db',
                fill: false
            }, {
                label: 'Diastolic (mmHg)',
                data: [80, 82, 85, 84],
                borderColor: '#2ecc71',
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: false }
            }
        }
    });

    // Appointment Frequency Chart (Bar)
    const appointmentChart = new Chart(document.getElementById('appointment-chart'), {
        type: 'bar',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr'],
            datasets: [{
                label: 'Appointments',
                data: [10, 15, 12, 8],
                backgroundColor: '#3498db'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Top Prescriptions Chart (Bar)
    const prescriptionChart = new Chart(document.getElementById('prescription-chart'), {
        type: 'bar',
        data: {
            labels: ['Metformin', 'Lisinopril', 'Atorvastatin'],
            datasets: [{
                label: 'Prescriptions Issued',
                data: [20, 15, 10],
                backgroundColor: '#2ecc71'
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: { beginAtZero: true }
            }
        }
    });

    // Initialize default tab
    showTab('patient-results');
});