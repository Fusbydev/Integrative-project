document.addEventListener("DOMContentLoaded", function() {

    fetch('/rooms')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json(); // Parse the JSON data from the response
    })
    .then(data => {
        const container = document.querySelector('.standard-room'); // Select the container
        data.forEach(room => {
            const roomHtml = `
                <div class="col-md-4">
                    <div class="suite card">
                        <img src="${room.image_path}" class="card-img-top w-369.33" alt="${room.room_type}">
                        <div class="card-body">
                            <h3 class="card-title">${room.room_type}</h3>
                            <p class="card-text">${room.description}</p>
                            <h4 class="suite-price">Php ${parseFloat(room.price).toFixed(2)}/per night</h4>
                            <button class="btn btn-outline-light">Book now</button>
                            <button class="btn btn-outline-light" data-toggle="modal" data-target="#amenitiesModal">Check amenities</button>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', roomHtml); // Append to the container
        });
    })
    .catch(error => {
        console.error('Error fetching rooms:', error);
    });

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
            document.querySelector('#checkIndd').textContent = checkIn;
            document.querySelector('#checkOutdd').textContent = checkOut;
            document.querySelector('#totalNightsInput').value = nights;
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
                
                    // Calculate nights and reset step
                    if (calculateNights(checkInDate, checkOutDate)) {
                        dateSelectionStep = 0; // Reset for new selection
                
                        // Remove active class from all cells
                        const allCells = document.querySelectorAll(`#${calendarId} td`);
                        allCells.forEach(cell => cell.classList.remove('active-cell'));
                
                        // Highlight the check-in and check-out cells
                        checkInCell.classList.add('active-cell');
                        checkOutCell.classList.add('active-cell');
                
                        // Highlight all dates between check-in and check-out
                        let currentDate = new Date(checkInDate);
                        const checkOutDateObject = new Date(checkOutDate);
                
                        while (currentDate <= checkOutDateObject) {
                            const year = currentDate.getFullYear();
                            const month = currentDate.getMonth() + 1; // getMonth() is 0-indexed, so add 1
                            const day = currentDate.getDate();
                
                            // Format date as `YYYY-M-D` to match `data-date` attribute format
                            const dateString = `${year}-${month}-${day}`;
                
                            // Find the <span> element for this date and add active-cell class
                            const dayElement = document.querySelector(`.clickable-day[data-date="${dateString}"]`);
                            if (dayElement) {
                                dayElement.parentElement.classList.add('active-cell'); // Highlight the <td> containing this day
                            }
                
                            // Move to the next day
                            currentDate.setDate(currentDate.getDate() + 1);
                        }
                    } else {
                        alert('Invalid date selection! Please select valid check-in and check-out dates.');
                    }
                }
                
            });
        });
    }

    // Check if the user can proceed by validating the dates before advancing the step
    nextButton.addEventListener('click', function () {
        console.log("Button clicked!");
        
        
        var checkIndate1 = $('#checkIndd').text();
        var checkOutdate1 = $('#checkOutdd').text();
        console.log("yawa "+checkIndate1);  
        console.log("yawa "+checkOutdate1);
        
        $('.checkIndd').text(checkIndate1);
        $('.checkOutdd').text(checkOutdate1);

    if (isValidDateSelection()) {
        console.log("Is valid date selection?", isValidDateSelection());

        if (currentStep < circles.length) {
            // Highlight the current step
            circles[currentStep].classList.add('light'); 

            // Handle visibility based on currentStep
            if (currentStep === 1) {
                document.querySelector('#select-accommodation').classList.remove('d-none');
                document.querySelector('#date-picker').classList.add('d-none');
                
                currentStep++;
            } else if (currentStep === 2) {
                document.querySelector('#guest-info').classList.remove('d-none');
                document.querySelector('#select-accommodation').classList.add('d-none');
                currentStep++;
               
            } else if (currentStep == 3) {
                document.querySelector('#guest-info').classList.add('d-none');
                finalConfirmation(checkIndate1, checkOutdate1);
                document.querySelector('#booking-confirmation').classList.remove('d-none');
            }
        }
    } else {
        alert('Please select a valid Check-in and Check-out date!');
    }
    console.log(currentStep);
});





function finalConfirmation(cin, cout) {
    // Extract values from the form inputs
    const lastname = document.getElementById('lastname').value;
    const firstname = document.getElementById('firstname').value;
    const salutation = document.getElementById('salutation').value;
    const birthdate = document.getElementById('birthdate').value;
    const gender = document.querySelector('.dropdown-toggle.gender').textContent; // Get the text from the dropdown
    const guestCount = document.getElementById('guestCount').value;
    const discountOption = document.querySelector('input[name="discountOption"]:checked').value;
    const email = document.getElementById('email').value;
    const contactNumber = document.getElementById('contactNumber').value;
    const address = document.getElementById('address').value;
    const privacyPolicyAccepted = document.getElementById('privacy').checked;
    const createAccount = document.getElementById('reservation').checked;

    let bookedRooms = $(".booked-rooms").text();

    $('.greeting').text("Dear " + salutation +" " + lastname +",");

    $('.guest-info1').append(
    `Guest Name: <span>${lastname}, ${firstname}</span> <br>
    Check-In Date: <span>${cin}</span><br>
    Check-Out Date: <span>${cout}</span><br>
    Room Type: <span>[room type]</span>`);

    let priceTotal = $("span.totalPriceDisplay").text();

    $('span.total-price').text(parseInt(priceTotal).toFixed(2));

    // Log the extracted values for confirmation
    console.log('Lastname:', lastname);
    console.log('Firstname:', firstname);
    console.log('Salutation:', salutation);
    console.log('Birthdate:', birthdate);
    console.log('Gender:', gender);
    console.log('Number of Guests:', guestCount);
    console.log('Discount Option:', discountOption);
    console.log('Email:', email);
    console.log('Contact Number:', contactNumber);
    console.log('Address:', address);
    console.log('Privacy Policy Accepted:', privacyPolicyAccepted);
    console.log('Create Account for Future Reservations:', createAccount);

    // Optionally, you can show a confirmation alert or proceed with form submission
    alert('Your information has been saved successfully!');

    // Add any additional processing you want here, such as sending data to a server
}



    const currentDate = new Date();

    // Generate the current month calendar
    generateCalendar(currentDate.getFullYear(), currentDate.getMonth(), 'currentMonthCalendar', 'currentMonthTitle');

    // Generate the next month calendar
    generateCalendar(currentDate.getFullYear(), currentDate.getMonth() + 1, 'nextMonthCalendar', 'nextMonthTitle');

    // Make the GET request using the fetch API


});