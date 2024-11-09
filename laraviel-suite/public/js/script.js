document.addEventListener("DOMContentLoaded", function() {

    fetch('/rooms')
        .then(response => response.ok ? response.json() : Promise.reject('Error fetching rooms'))
        .then(data => {
            const container = document.querySelector('.standard-room');
            data.forEach(room => {
                container.insertAdjacentHTML('beforeend', `
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
                `);
            });
        })
        .catch(console.error);

    let currentStep = 1, dateSelectionStep = 0, checkInDate = null, checkOutDate = null, checkInCell = null, checkOutCell = null;
    
    function isValidDateSelection() {
        if (checkInDate && checkOutDate) {
            const checkInDateObject = new Date(checkInDate), checkOutDateObject = new Date(checkOutDate);
            return checkOutDateObject >= checkInDateObject;
        }
        return false;
    }

    function calculateNights(checkIn, checkOut) {
        const checkInDateObject = new Date(checkIn), checkOutDateObject = new Date(checkOut);
        const nights = Math.ceil((checkOutDateObject - checkInDateObject) / (1000 * 60 * 60 * 24));
        if (nights >= 0) {
            document.querySelector('.nights').textContent = `${nights} nights`;
            document.querySelector('#checkIndd').textContent = checkIn;
            document.querySelector('#checkOutdd').textContent = checkOut;
            document.querySelector('#totalNightsInput').value = nights;
            return true;
        }
        alert('Check-out date should be after Check-in date!');
        document.querySelector('.nights').textContent = 'N/A';
        dateSelectionStep = 0;
        return false;
    }

    function generateCalendar(year, month, calendarId, titleId) {
        const date = new Date(year, month), daysInMonth = new Date(year, month + 1, 0).getDate(), firstDay = new Date(year, month, 1).getDay();
        document.getElementById(titleId).textContent = `${date.toLocaleString('default', { month: 'long' })} ${year}`;
        let table = `<thead><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr></thead><tbody><tr>`;
        for (let i = 0; i < firstDay; i++) table += `<td></td>`;
        for (let day = 1; day <= daysInMonth; day++) {
            const paddedDay = String(day).padStart(2, '0');
            table += `<td><span class="clickable-day" data-date="${year}-${month + 1}-${paddedDay}">${paddedDay}</span></td>`;
            if ((day + firstDay) % 7 === 0) table += `</tr><tr>`;
        }
        table += `</tr></tbody>`;
        document.getElementById(calendarId).innerHTML = table;
        document.querySelectorAll(`#${calendarId} .clickable-day`).forEach(day => {
            day.addEventListener('click', function() {
                const selectedDate = this.getAttribute('data-date');
                const parentTd = this.parentElement;
                if (dateSelectionStep === 0) {
                    checkInDate = selectedDate;
                    document.querySelector('.check-in').textContent = checkInDate;
                    checkInCell = parentTd;
                    dateSelectionStep = 1;
                    parentTd.classList.add('active-cell');
                } else {
                    checkOutDate = selectedDate;
                    document.querySelector('.check-out').textContent = checkOutDate;
                    checkOutCell = parentTd;
                    if (calculateNights(checkInDate, checkOutDate)) {
                        dateSelectionStep = 0;
                        document.querySelectorAll(`#${calendarId} td`).forEach(cell => cell.classList.remove('active-cell'));
                        checkInCell.classList.add('active-cell');
                        checkOutCell.classList.add('active-cell');
                        let currentDate = new Date(checkInDate), checkOutDateObject = new Date(checkOutDate);
                        while (currentDate <= checkOutDateObject) {
                            const dateString = `${currentDate.getFullYear()}-${currentDate.getMonth() + 1}-${String(currentDate.getDate()).padStart(2, '0')}`;
                            const dayElement = document.querySelector(`.clickable-day[data-date="${dateString}"]`);
                            if (dayElement) dayElement.parentElement.classList.add('active-cell');
                            currentDate.setDate(currentDate.getDate() + 1);
                        }
                    } else {
                        alert('Invalid date selection! Please select valid check-in and check-out dates.');
                    }
                }
            });
        });
    }

    document.querySelector('.nextBtn').addEventListener('click', function() {
        if (isValidDateSelection()) {
            const checkIndate1 = $('#checkIndd').text(), checkOutdate1 = $('#checkOutdd').text();
            if (currentStep < document.querySelectorAll('.circle').length) {
                document.querySelectorAll('.circle')[currentStep].classList.add('light');
                if (currentStep === 1) {
                    document.querySelector('#select-accommodation').classList.remove('d-none');
                    document.querySelector('#date-picker').classList.add('d-none');
                    currentStep++;
                } else if (currentStep === 2) {
                    document.querySelector('#guest-info').classList.remove('d-none');
                    document.querySelector('#select-accommodation').classList.add('d-none');
                    currentStep++;
                } else if (currentStep === 3) {
                    document.querySelector('#guest-info').classList.add('d-none');
                    finalConfirmation(checkIndate1, checkOutdate1);
                    document.querySelector('#booking-confirmation').classList.remove('d-none');
                }
            }
        } else {
            alert('Please select a valid Check-in and Check-out date!');
        }
    });

    function finalConfirmation(cin, cout) {
        const guestData = {
            lastname: document.getElementById('lastname').value,
            firstname: document.getElementById('firstname').value,
            salutation: document.getElementById('salutation').value,
            birthdate: document.getElementById('birthdate').value,
            gender: document.querySelector('.dropdown-toggle.gender').textContent,
            guestCount: document.getElementById('guestCount').value,
            discountOption: document.querySelector('input[name="discountOption"]:checked').value,
            email: document.getElementById('email').value,
            contactNumber: document.getElementById('contactNumber').value,
            address: document.getElementById('address').value,
            checkIn: cin,
            checkOut: cout,
            bookedRooms: $(".booked-rooms").text().trim().replace(/(\d{4,}\.\d{2})(?=\w)/g, "$1 "),
            priceTotal: parseFloat($("span.totalPriceDisplay").text().replace('Php', '').trim()).toFixed(2)
        };

        $('.greeting').text(`Dear ${guestData.salutation} ${guestData.lastname},`);
        $('.guest-info1').append(`
            Guest Name: <span>${guestData.lastname}, ${guestData.firstname}</span><br>
            Check-In Date: <span>${cin}</span><br>
            Check-Out Date: <span>${cout}</span><br>
            Room Type and Room Rates: <br><span>${guestData.bookedRooms}</span>
        `);
        $('span.total-price').text(`Php ${guestData.priceTotal}`);

        fetch('/submit-guest-info', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify(guestData)
        })
            .then(response => response.json())
            .then(data => data.errors ? console.log('Validation errors:', data.errors) : console.log('Response from server:', data))
            .catch(console.error);
    }

    const currentDate = new Date();
    generateCalendar(currentDate.getFullYear(), currentDate.getMonth(), 'currentMonthCalendar', 'currentMonthTitle');
    generateCalendar(currentDate.getFullYear(), currentDate.getMonth() + 1, 'nextMonthCalendar', 'nextMonthTitle');

});
