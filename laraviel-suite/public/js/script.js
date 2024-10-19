document.addEventListener("DOMContentLoaded", function() {
    let currentStep = 1;
    const circles = document.querySelectorAll('.circle');
    const nextButton = document.querySelector('.nextBtn');
    let dateSelectionStep = 0;
    let checkInDate = null;
    let checkOutDate = null;
    let checkInCell = null; // To store reference to the check-in cell
    let checkOutCell = null; // To store reference to the check-out cell
    
    // Function to validate if both check-in and check-out dates are properly selected and valid
    function isValidDateSelection() {
        if (checkInDate && checkOutDate) {
            const checkInDateObject = new Date(checkInDate);
            const checkOutDateObject = new Date(checkOutDate);
            return checkOutDateObject >= checkInDateObject; // Check-out must be on or after check-in
        }
        return false; // Invalid if either date is missing
    }

    // Function to calculate nights between check-in and check-out dates
    function calculateNights(checkIn, checkOut) {
        const checkInDateObject = new Date(checkIn);
        const checkOutDateObject = new Date(checkOut);
        const timeDifference = checkOutDateObject - checkInDateObject;
        const nights = Math.ceil(timeDifference / (1000 * 60 * 60 * 24));

        if (nights >= 0) {
            document.querySelector('.nights').textContent = nights + ' nights';
            return true; // Valid date range
        } else {
            alert('Check-out date should be after Check-in date!');
            document.querySelector('.nights').textContent = 'N/A';
            document.querySelector('.check-in').textContent = 'Select a date';
            document.querySelector('.check-out').textContent = 'Select a date';
            dateSelectionStep = 0;
            return false; // Invalid date range
        }
    }

    // Generate calendar for each month
    function generateCalendar(year, month, calendarId, titleId) {
        const date = new Date(year, month);
        const monthName = date.toLocaleString('default', { month: 'long' });
        const daysInMonth = new Date(year, month + 1, 0).getDate();
        
        // Set the month title
        document.getElementById(titleId).textContent = `${monthName} ${year}`;
        
        // Get the weekday of the first day of the month
        const firstDay = new Date(year, month, 1).getDay();

        // Create table headers for the weekdays
        let table = `<thead><tr>
            <th>Sun</th>
            <th>Mon</th>
            <th>Tue</th>
            <th>Wed</th>
            <th>Thu</th>
            <th>Fri</th>
            <th>Sat</th>
        </tr></thead><tbody><tr>`;

        // Fill the first row with empty cells until the first day of the month
        for (let i = 0; i < firstDay; i++) {
            table += `<td></td>`;
        }

        // Fill in the days of the month, each day is wrapped in a clickable span
        for (let day = 1; day <= daysInMonth; day++) {
            table += `<td><span class="clickable-day" data-date="${year}-${month + 1}-${day}">${day}</span></td>`;
            if ((day + firstDay) % 7 === 0) {
                table += `</tr><tr>`; // Start a new row after every Saturday
            }
        }

        // Close the table rows and body
        table += `</tr></tbody>`;
        
        // Set the table content to the calendar element
        document.getElementById(calendarId).innerHTML = table;

        // Add event listeners to all clickable days
        const clickableDays = document.querySelectorAll(`#${calendarId} .clickable-day`);
        clickableDays.forEach(day => {
            day.addEventListener('click', function() {
                const selectedDate = this.getAttribute('data-date');
                const parentTd = this.parentElement; // Get the parent <td> element

                if (dateSelectionStep === 0) {
                    // First click: Set Check-in date
                    checkInDate = selectedDate;
                    document.querySelector('.check-in').textContent = checkInDate;
                    checkInCell = parentTd; // Store reference to check-in cell
                    dateSelectionStep = 1; // Move to next step

                    // Highlight the check-in cell
                    parentTd.classList.add('active-cell'); // Add active class to check-in cell
                } else {
                    // Second click: Set Check-out date
                    checkOutDate = selectedDate;
                    document.querySelector('.check-out').textContent = checkOutDate;
                    checkOutCell = parentTd; // Store reference to check-out cell
                    calculateNights(checkInDate, checkOutDate);
                    dateSelectionStep = 0; // Reset for new selection

                    // Remove active class from all cells
                    const allCells = document.querySelectorAll(`#${calendarId} td`);
                    allCells.forEach(cell => cell.classList.remove('active-cell'));

                    // Highlight both cells if within the same month
                    if (new Date(checkInDate).getMonth() === new Date(checkOutDate).getMonth() && 
                        new Date(checkInDate).getFullYear() === new Date(checkOutDate).getFullYear()) {
                        checkInCell.classList.add('active-cell'); // Highlight check-in cell
                        checkOutCell.classList.add('active-cell'); // Highlight check-out cell
                    } else {
                        checkOutCell.classList.add('active-cell'); // Highlight only check-out cell
                    }
                }
            });
        });
    }

    // Check if the user can proceed by validating the dates before advancing the step
    nextButton.addEventListener('click', function () {
        if (isValidDateSelection()) {
            if (currentStep < circles.length) {
                circles[currentStep].classList.add('light'); // Highlight the step
                currentStep++; // Move to the next step
            }
        } else {
            alert('Please select a valid Check-in and Check-out date!');
        }
    });

    const currentDate = new Date();

    // Generate the current month calendar
    generateCalendar(currentDate.getFullYear(), currentDate.getMonth(), 'currentMonthCalendar', 'currentMonthTitle');

    // Generate the next month calendar
    generateCalendar(currentDate.getFullYear(), currentDate.getMonth() + 1, 'nextMonthCalendar', 'nextMonthTitle');
});