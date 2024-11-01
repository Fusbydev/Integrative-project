$(document).ready(function() {
    console.log('loaded');


    // Log all items in localStorage
    console.log("Local Storage Items:");
    for (let i = 0; i < localStorage.length; i++) {
        const key = localStorage.key(i);
        const value = localStorage.getItem(key);
        console.log(`${key}: ${value}`);
    }



    

    // Fetch and render room data
    fetch('/rooms')
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok ' + response.statusText);
        }
        return response.json();
    })
    .then(data => {
        const container = document.querySelector('.book-room');
        data.forEach(room => {
            const roomHtml = `
                <div class="col-md-4 book-card">
                    <div class="suite card">
                        <img src="" class="card-img-top w-369.33" alt="${room.room_type}">
                        <div class="card-body">
                            <h3 class="card-title">${room.room_type}</h3>
                            <p class="card-text book-room-dex">${room.description}</p>
                            <h4 class="suite-price">Php ${parseFloat(room.price).toFixed(2)}/per night</h4>
                            <div class="form-check">
                                <input class="form-check-input room-checkbox" type="checkbox" id="selectRoom${room.id}" data-price="${room.price}" data-room-type="${room.room_type}">
                                <label class="form-check-label" for="selectRoom${room.id}">
                                    Select Room
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            container.insertAdjacentHTML('beforeend', roomHtml);
        });
    })
    .catch(error => {
        console.error('Error fetching rooms:', error);
    });

    // Update total price and room details on checkbox change
    $(document).on('change', '.room-checkbox', function() {
        
        let baseTotal = 1500; // Initial total to account for service charge & tax
        let bookedRooms = '';
        let totalNights = parseInt($('#totalNightsInput').val()) || 0; // Retrieve total nights value
        let roomTotal = 0; // Total for selected rooms
    
        // Loop through each checked checkbox to add up prices and get room types
        $('.room-checkbox:checked').each(function() {
            let roomPrice = parseFloat($(this).data('price'));
            roomTotal += roomPrice; // Add the room price to room total
            bookedRooms += `<p><strong>${$(this).data('room-type')}</strong> : Php ${roomPrice.toFixed(2)}</p>`;
        }); 
    
        // Calculate the total price based on the number of nights
        let total = baseTotal + (roomTotal * totalNights); // Include total nights multiplied by room prices
    
        // Update totalPrice and booked rooms in the receipt
        $('.totalPriceDisplay').text(total.toFixed(2));
        $('.booked-rooms').html(bookedRooms);
    });
    
});
