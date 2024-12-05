$(document).ready(function () {
    console.log("loaded");

    // Function to handle the gender selection
    function selectGender(gender) {
        console.log("Selected gender:", gender);
        const genderButton = document.querySelector(".dropdown-toggle.gender");
        genderButton.textContent = gender;
    }

    // Wait until the DOM content is fully loaded

    // Get the dropdown menu element
    const genderDropdown = document.getElementById("genderDropdown");

    // Add a 'click' event listener to the dropdown menu
    genderDropdown.addEventListener("click", function (event) {
        console.log("clicked");
        // Check if the clicked element is a dropdown item
        if (event.target.classList.contains("dropdown-item")) {
            // Get the gender value from the data-value attribute
            const gender = event.target.getAttribute("data-value");
            selectGender(gender);
        }
    });

    // Log all items in localStorage
    console.log("Local Storage Items:");
    for (let i = 0; i < localStorage.length; i++) {
        const key = localStorage.key(i);
        const value = localStorage.getItem(key);
        console.log(`${key}: ${value}`);
    }

    // Fetch and render room data
    fetch("/rooms")
    .then((response) => {
        if (!response.ok) {
            throw new Error(
                "Network response was not ok " + response.statusText
            );
        }
        return response.json();
    })
    .then((data) => {
        const container = document.querySelector(".book-room");

        // Clear any previous content
        container.innerHTML = "";

        // Display all rooms
        data.forEach((room) => {
            const roomHtml = `
                <div class="col-md-12 col-lg-6 col-sm-12 book-card">
                    <div class="book-accom card">
                        <img src="${room.image_path}" class="card-img-top w-369.33" alt="${room.room_type}">
                        <div class="card-body">
                            <h3 class="card-title text-start">${room.room_type}</h3>
                            <p class="card-text book-room-dex text-start">${room.description}</p>
                        </div>
                        <div class="card-footer">
                            <h4 class="suite-price text-start">Php ${parseFloat(room.price).toFixed(2)}/per night</h4>
                            <div class="form-check d-flex align-items-center justify-content-start text-start">
                                <input class="form-check-input room-checkbox" type="checkbox" id="selectRoom${room.id}" data-price="${room.price}" data-room-type="${room.room_type}">
                                <label class="form-check-label ms-2" for="selectRoom${room.id}">Select Room</label>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML("beforeend", roomHtml);
        });
    })
    .catch((error) => {
        console.error("Error fetching rooms:", error);
    });



    // Update total price and room details on checkbox change
    $(document).on(
        "change",
        ".room-checkbox, #discountStudent, #discountSenior, #noDiscount",
        function () {
            let baseTotal = 1500; // Initial total to account for service charge & tax
            let bookedRooms = "";
            let totalNights = parseInt($("#totalNightsInput").val()) || 0; // Retrieve total nights value
            let roomTotal = 0; // Total for selected rooms

            // Loop through each checked checkbox to add up prices and get room types
            $(".room-checkbox:checked").each(function () {
                let roomPrice = parseFloat($(this).data("price"));
                roomTotal += roomPrice; // Add the room price to room total
                bookedRooms += `<p><strong>${$(this).data(
                    "room-type"
                )}</strong></p>`;
            });

            // Calculate the total price based on the number of nights
            let total = baseTotal + roomTotal * totalNights; // Include total nights multiplied by room prices

            // Determine the selected discount option
            let discountOption = $(
                'input[name="discountOption"]:checked'
            ).val();
            let totalDiscount = 0;

            // Apply discounts based on the selected option
            if (discountOption === "student") {
                totalDiscount = total * 0.2; // 20% discount for students
            } else if (discountOption === "senior") {
                totalDiscount = total * 0.2; // 20% discount for seniors
            }

            // Final total after discounts
            total -= totalDiscount;

            // Update totalPrice and booked rooms in the receipt
            $(".totalPriceDisplay").text(total.toFixed(2));
            $(".booked-rooms").html(bookedRooms);
        }
    );
});
