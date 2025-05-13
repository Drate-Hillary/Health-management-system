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