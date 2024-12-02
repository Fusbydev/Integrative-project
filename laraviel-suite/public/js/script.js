document.addEventListener("DOMContentLoaded", function () {

    console.log(localStorage.getItem("bookingId"));
    fetch("/rooms")
        .then((response) => {
            if (!response.ok) {
                throw new Error(
                    "Network response was not ok " + response.statusText
                );
            }
            return response.json(); // Parse the JSON data from the response
        })
        .then((data) => {
            const container = document.querySelector(".standard-room"); // Select the container
            data.forEach((room) => {
                const roomHtml = `
                <div class="col-md-6 col-lg-4 col-sm-12">
                    <div class="suite card">
                        <img src="${
                            room.image_path
                            }" class="card-img-top w-369.33" alt="${
                            room.room_type
                            }">
                        <div class="card-body">
                            <h3 class="card-title">${room.room_type}</h3>
                            <p class="card-text">${room.description}</p>
                            <h4 class="suite-price mt-2">Php ${parseFloat(
                                room.price
                                ).toFixed(2)}/per night
                            </h4>
                            <div class="row text-center">
                                <div class="col">
                                    <a href="/book-now" class="card-book">BOOK NOW</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
            `;
                container.insertAdjacentHTML("beforeend", roomHtml); // Append to the container
            });
        })
        .catch((error) => {
            console.error("Error fetching rooms:", error);
        });

    const monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];

    const currentMonthDropdown = document.getElementById(
        "currentMonthDropdown"
    );
    const nextMonthDropdown = document.getElementById("nextMonthDropdown");

    const currentDate = new Date();
    const currentMonth = currentDate.getMonth(); // Current month index (0-11)
    const currentYear = currentDate.getFullYear();

    // Populate the current month dropdown with months from the current month onward
    for (let i = currentMonth; i < monthNames.length; i++) {
        const option = document.createElement("option");
        option.value = i + 1; // Month value (1-12)
        option.textContent = monthNames[i];
        currentMonthDropdown.appendChild(option);
    }

    // Populate the next month dropdown with months from the current month onward, and wrap around for next year
    for (
        let i = currentMonth + 1;
        i < monthNames.length + currentMonth + 1;
        i++
    ) {
        const monthIndex = i % 12; // Wrap around after December
        const yearOffset = Math.floor(i / 12); // Increment year after December
        const option = document.createElement("option");
        option.value = monthIndex + 1; // Month value (1-12)
        option.textContent = `${monthNames[monthIndex]} ${
            currentYear + yearOffset
        }`;
        nextMonthDropdown.appendChild(option);
    }

    // Set the default selected option to the current month
    currentMonthDropdown.value = currentMonth + 1;
    nextMonthDropdown.value =
        (currentMonth + 1) % 12 === 0 ? 1 : currentMonth + 2; // Set next month or wrap around to January

    let dateSelectionStep = 0,
        checkInDate = null,
        checkOutDate = null,
        checkInCell = null,
        checkOutCell = null;

    function isValidDateSelection() {
        if (checkInDate && checkOutDate) {
            const checkInDateObject = new Date(checkInDate),
                checkOutDateObject = new Date(checkOutDate);
            return checkOutDateObject >= checkInDateObject;
        }
        return false;
    }

    function calculateNights(checkIn, checkOut) {
        const checkInDateObject = new Date(checkIn),
            checkOutDateObject = new Date(checkOut);
        const nights = Math.ceil(
            (checkOutDateObject - checkInDateObject) / (1000 * 60 * 60 * 24)
        );
        if (nights >= 0) {
            document.querySelector(".nights").textContent = `${nights} nights`;
            document.querySelector("#checkIndd").textContent = checkIn;
            document.querySelector("#checkOutdd").textContent = checkOut;
            document.querySelector("#totalNightsInput").value = nights;
            return true;
        }
        alert("Check-out date should be after Check-in date!");
        document.querySelector(".nights").textContent = "N/A";
        dateSelectionStep = 0;
        return false;
    }

    function generateCalendar(year, month, calendarId, titleId) {
        // Adjust year and month if month exceeds December
        if (month > 11) {
            year += 1; // Increment year
            month = 0; // Reset to January
        }
    
        const date = new Date(year, month),
            daysInMonth = new Date(year, month + 1, 0).getDate(),
            firstDay = new Date(year, month, 1).getDay();
    
        document.getElementById(titleId).textContent = `${date.toLocaleString(
            "default",
            { month: "long" }
        )} ${year}`;
    
        let table = `<thead><tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr></thead><tbody><tr>`;
        for (let i = 0; i < firstDay; i++) table += `<td></td>`;
        for (let day = 1; day <= daysInMonth; day++) {
            const paddedDay = String(day).padStart(2, "0");
            table += `<td><span class="clickable-day" data-date="${year}-${
                month + 1
            }-${paddedDay}">${paddedDay}</span></td>`;
            if ((day + firstDay) % 7 === 0) table += `</tr><tr>`;
        }
        table += `</tr></tbody>`;
        document.getElementById(calendarId).innerHTML = table;
    
        document
            .querySelectorAll(`#${calendarId} .clickable-day`)
            .forEach((day) => {
                day.addEventListener("click", function () {
                    const selectedDate = this.getAttribute("data-date");
                    const parentTd = this.parentElement;
                    if (dateSelectionStep === 0) {
                        checkInDate = selectedDate;
                        document.querySelector(".check-in").textContent =
                            checkInDate;
                        checkInCell = parentTd;
                        dateSelectionStep = 1;
                        parentTd.classList.add("active-cell");
                    } else {
                        checkOutDate = selectedDate;
                        document.querySelector(".check-out").textContent =
                            checkOutDate;
                        checkOutCell = parentTd;
                        if (calculateNights(checkInDate, checkOutDate)) {
                            dateSelectionStep = 0;
                            document
                                .querySelectorAll(`#${calendarId} td`)
                                .forEach((cell) =>
                                    cell.classList.remove("active-cell")
                                );
                            checkInCell.classList.add("active-cell");
                            checkOutCell.classList.add("active-cell");
                            let currentDate = new Date(checkInDate),
                                checkOutDateObject = new Date(checkOutDate);
                            while (currentDate <= checkOutDateObject) {
                                const dateString = `${currentDate.getFullYear()}-${
                                    currentDate.getMonth() + 1
                                }-${String(currentDate.getDate()).padStart(
                                    2,
                                    "0"
                                )}`;
                                const dayElement = document.querySelector(
                                    `.clickable-day[data-date="${dateString}"]`
                                );
                                if (dayElement)
                                    dayElement.parentElement.classList.add(
                                        "active-cell"
                                    );
                                currentDate.setDate(currentDate.getDate() + 1);
                            }
                        } else {
                            alert(
                                "Invalid date selection! Please select valid check-in and check-out dates."
                            );
                        }
                    }
                });
            });
    }
    

    // Event listeners for the month dropdowns
    currentMonthDropdown.addEventListener("change", function () {
        const selectedMonth = parseInt(currentMonthDropdown.value) - 1; // Convert to 0-based index
        generateCalendar(
            currentDate.getFullYear(),
            selectedMonth,
            "currentMonthCalendar",
            "currentMonthTitle"
        );
    });

    nextMonthDropdown.addEventListener("change", function () {
        const selectedMonth = parseInt(nextMonthDropdown.value) - 1; // Convert to 0-based index
        const selectedYear =
            selectedMonth <= currentMonth ? currentYear + 1 : currentYear; // Check if we need to increment the year
        generateCalendar(
            selectedYear,
            selectedMonth,
            "nextMonthCalendar",
            "nextMonthTitle"
        );
    });



    let currentStep = 1;
    document.querySelector(".nextBtn").addEventListener("click", function () {
        if (isValidDateSelection()) {
            const checkIndate1 = $("#checkIndd").text(),
                checkOutdate1 = $("#checkOutdd").text();
            if (currentStep < document.querySelectorAll(".circle").length) {
                document
                    .querySelectorAll(".circle")
                    [currentStep].classList.add("light");
                if (currentStep === 1) {
                    document
                        .querySelector("#select-accommodation")
                        .classList.remove("d-none");
                    document
                        .querySelector("#date-picker")
                        .classList.add("d-none");
                    currentStep++;
                } else if (currentStep === 2) {
                    document
                        .querySelector("#guest-info")
                        .classList.remove("d-none");
                    document
                        .querySelector("#select-accommodation")
                        .classList.add("d-none");
                    currentStep++;
                } else if (currentStep === 3) {
                    document
                        .querySelector("#guest-info")
                        .classList.add("d-none");
                    finalConfirmation(checkIndate1, checkOutdate1);
                    document
                        .querySelector("#booking-confirmation")
                        .classList.remove("d-none");
                }
            }
        }
    });

    function generateUniqueId() {
        const uniqueId =
            Math.random().toString(36).substr(2, 9) + Date.now().toString(36);
        localStorage.setItem("bookingId", uniqueId);
        return uniqueId;
    }

    function finalConfirmation(cin, cout) {
        // Call generateUniqueId if bookingId doesn't already exist in localStorage
        let bookingId = localStorage.getItem("bookingId");
        if (!bookingId) {
            // If no bookingId, generate and store a new one
            bookingId = generateUniqueId();
        } else {
            // If bookingId exists, remove it from localStorage before generating a new one
            localStorage.removeItem("bookingId");
            bookingId = generateUniqueId(); // Generate a new uniqueId
        }

        const guestData = {
            bookingId: bookingId || "", // Ensure bookingId is a string
            lastname: document.getElementById("lastname")?.value.trim() || "",
            firstname: document.getElementById("firstname")?.value.trim() || "",
            salutation: document.getElementById("salutation")?.value || "",
            birthdate: document.getElementById("birthdate")?.value || "",
            gender: document.querySelector(".dropdown-toggle.gender")?.textContent.trim() || "",
            guestCount: parseInt(document.getElementById("guestCount")?.value, 10) || 0,
            discountOption: document.querySelector('input[name="discountOption"]:checked')?.value || "None",
            email: document.getElementById("email")?.value.trim() || "",
            contactNumber: document.getElementById("contactNumber")?.value.trim() || "",
            address: document.getElementById("address")?.value.trim() || "",
            checkIn: cin || "", // Ensure `cin` is a valid date string
            checkOut: cout || "", // Ensure `cout` is a valid date string
            bookedRooms: Array.isArray($(".booked-rooms").text().trim().match(/(?<=\d{4,}\.\d{2})\w+/g)) 
                ? $(".booked-rooms").text().trim().match(/(?<=\d{4,}\.\d{2})\w+/g).join(",") 
                : "", // Convert array to comma-separated string
            priceTotal: parseFloat($("span.totalPriceDisplay").text().replace("Php", "").trim()) || 0, // Ensure this is a valid number
        };
        
        $(".greeting").text(
            `Dear ${guestData.salutation} ${guestData.lastname},`
        );
        $(".guest-info1").append(`
            Guest Name: <span>${guestData.lastname}, ${guestData.firstname}</span><br>
            Check-In Date: <span>${cin}</span><br>
            Check-Out Date: <span>${cout}</span><br>
            Room Type and Room Rates: <br><span>${guestData.bookedRooms}</span>
        `);
        $("span.total-price").text(`Php ${guestData.priceTotal}`);
        console.log(guestData);
        fetch("/submit-guest-info", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(guestData),
        })
        
            .then((response) => response.json())
            .then((data) =>
                data.errors
                    ? console.log("Validation errors:", data.errors)
                    : alert("Check your email for a detailed receipt and tracking information for your stay. We're looking forward to hosting you!")
                )
            .catch(console.error);

        const incomeData = {
            customer_name: guestData.lastname,
            availed_service: "booking reservation",
            price: guestData.priceTotal,
        };
    
        fetch("/add-income", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
            },
            body: JSON.stringify(incomeData),
        })
            .then((response) => response.json())
            .then((data) => {
                if (data.success) {
                    
                } else {
                    console.error("Error:", data.message);
                }
            })
            .catch(console.error);


        const accountData = {
            password: guestData.bookingId,
            name: guestData.lastname,
            role: 'guest',
            email: guestData.email
        };

            fetch("/register", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                Accept: "application/json",
                "X-CSRF-TOKEN": document
                    .querySelector('meta[name="csrf-token"]')
                    .getAttribute("content"),
                },
                body: JSON.stringify(accountData),
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        
                    } else {
                        console.error("Error:", data.message);
                    }
                })
                .catch((error) => {

                })
    }

    
    // Initialize calendars
    generateCalendar(
        currentYear,
        currentMonth,
        "currentMonthCalendar",
        "currentMonthTitle"
    );
    generateCalendar(
        currentYear,
        currentMonth + 1,
        "nextMonthCalendar",
        "nextMonthTitle"
    );

});
