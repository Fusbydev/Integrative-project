<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>admin dashboard</title>
  <style>
    /* Reset and Basic Styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: row;
        min-height: 100vh;
        overflow-x: hidden;
        background-color: #f4f6f9;
    }

    /* Sidebar Styles */
    .sidebar {
        width: 250px;
        background-color: #2c3e50;
        color: #ecf0f1;
        height: 1000vh;
        position: fixed;
        transition: transform 0.3s ease, width 0.3s ease;
        overflow-y: auto;
        padding-top: 60px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
    }

    /* Collapsed sidebar on mobile */
    .sidebar.collapsed {
        width: 70px;
    }

    /* Sidebar link styles */
    .sidebar a {
        display: block;
        padding: 15px 20px;
        color: #ecf0f1;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    .sidebar a:hover {
        background-color: #34495e;
    }

    .sidebar a.active {
        background-color: #1abc9c;
        color: #fff;
    }

    /* Sidebar icon-only style when collapsed */
    .sidebar.collapsed a {
        text-align: center;
        padding: 15px 0;
    }

    .sidebar.collapsed a span {
        display: none;
    }

    /* Main content area */
    .content {
        margin-left: 250px;
        padding: 30px;
        flex: 1;
        transition: margin-left 0.3s ease;
    }

    /* Burger Icon for Mobile */
    .burger-icon {
        position: fixed;
        top: 20px;
        right: 20px; /* Move it to the right side */
        font-size: 30px;
        cursor: pointer;
        z-index: 1000;
        display: none;
        color: #2c3e50;
    }

    /* Responsive sidebar toggle */
    @media screen and (max-width: 1024px) {
        /* Collapsed Sidebar */
        .sidebar {
            transform: translateX(-100%);
        }

        /* When sidebar is open on mobile */
        .sidebar.responsive {
            transform: translateX(0);
            width: 250px;
        }

        /* Shift content based on sidebar state */
        .content {
            margin-left: 0;
        }

        /* Show burger icon for sidebar toggle */
        .burger-icon {
            display: block;
        }

        /* Adjust main content when sidebar is collapsed */
        .content.shifted {
            margin-left: 70px;
        }
    }

    /* Dashboard Cards */
    .dashboard-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 20px;
    }

    .card {
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 12px;
        flex: 1;
        min-width: 250px;
        text-align: center;
        transition: transform 0.3s ease;
    }
    .card h3 {
        color: #2c3e50;
        margin-bottom: 10px;
    }

    .card p {
        font-size: 1.2em;
        color: #1abc9c;
    }

    /* Calendar Styles */
    .calendar {
        background-color: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        padding: 20px;
        border-radius: 12px;
        margin-bottom: 20px;
    }

    .calendar-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .calendar-header button {
        background-color: #1abc9c;
        color: white;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 8px;
        transition: background-color 0.3s ease;
    }

    .calendar-header button:hover {
        background-color: #16a085;
    }

    .calendar-days {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 8px;
        font-weight: bold;
    }

    .calendar-day {
        padding: 15px;
        background-color: #ecf0f1;
        border-radius: 8px;
        cursor: pointer;
        text-align: center;
        transition: background-color 0.3s ease;
    }

    .calendar-day:hover {
        background-color: #bdc3c7;
    }

    .calendar-day.current-day {
        background-color: #1abc9c;
        color: white;
    }

    .calendar-day.active-day {
        background-color: #3498db;
        color: white;
    }

    .calendar-day.empty {
        background-color: transparent;
        cursor: default;
    }

    /* Responsive Adjustments */
    @media screen and (max-width: 768px) {
        .calendar, .customer-list {
            width: 100%;
        }
    }

    /* Additional Styles for Sidebar Toggle */
    .sidebar-toggle-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #1abc9c;
        color: white;
        padding: 10px;
        cursor: pointer;
        font-size: 20px;
        transition: background-color 0.3s ease;
    }

    .sidebar-toggle-btn:hover {
        background-color: #16a085;
    }
    /* Room Management Styles */
.room-management {
    background-color: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 30px;
    border-radius: 12px;
    margin-bottom: 20px;
    text-align: center;
}

/* Room List Container */
.room-list {
  display: flex;
  flex-wrap: wrap; /* Allow the items to wrap to the next line */
  gap: 20px; /* Adds space between each room card */
  justify-content: flex-start; /* Aligns the cards to the start of the container */
  padding: 20px; /* Adds padding around the container */
}

/* Individual Room Card */
.room {
  background-color: #f4f6f9;
  padding: 15px;
  border-radius: 8px;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  width: 300px; /* Fixed width for the card */
  text-align: left;
  display: flex;
  flex-direction: column;
  gap: 10px;
  flex-grow: 0; /* Prevents the card from growing */
}

/* Input fields within the room card */
.room input {
  padding: 8px;
  margin-bottom: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 100%; /* Makes the input field fill the card */
}
/* Room Header */
.room h4 {
  margin-bottom: 10px;
  font-size: 1.2em;
  color: #2c3e50;
}

/* Room Details */
.room p {
  font-size: 1em;
  color: #34495e;
  margin-bottom: 15px;
}

/* Room Action Buttons */
.room button {
  padding: 10px 15px;
  background-color: #1abc9c;
  color: white;
  border: none;
  border-radius: 8px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  width: 100%; /* Makes the button fill the card */
  font-size: 1.1em;
}

/* Hover effect for Action Buttons */
.room button:hover {
  background-color: #16a085;
}

/* Add Room Button (Standalone) */
.add-room-btn {
  background-color: #2c3e50;
  color: white;
  padding: 15px 25px;
  border-radius: 10px;
  cursor: pointer;
  font-size: 1.2em;
  transition: background-color 0.3s ease;
  display: block;
  width: 100%;
  text-align: center;
  margin-top: 20px;
}

/* Hover effect for Add Room Button */
.add-room-btn:hover {
  background-color: #34495e;
}

/* Make the cards responsive on smaller screens */
@media screen and (max-width: 768px) {
  .room {
    width: 100%; /* On smaller screens, make the room card take up the full width */
    max-width: 500px; /* Prevents it from getting too wide */
  }
}

/* Income Tracker Container */
.income-tracker {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    max-width: 900px;
    margin: 20px auto;
}

/* Table Styles */
.income-tracker table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

.income-tracker th,
.income-tracker td {
    padding: 12px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

.income-tracker th {
    background-color: #2c3e50;
    color: white;
}

/* Add Income Button */
.add-income-btn {
    background-color: #1abc9c;
    color: white;
    padding: 12px 25px;
    border-radius: 8px;
    cursor: pointer;
    font-size: 1.1em;
    transition: background-color 0.3s ease;
    display: inline-block;
    text-align: center;
}

.add-income-btn:hover {
    background-color: #16a085;
}

/* Room Image */
.room img {
  width: 100%;
  height: 150px;
  object-fit: cover;
  border-radius: 8px;
}


</style>

</head>
<body>

  <!-- Burger Icon -->
  <div class="burger-icon" onclick="toggleSidebar()">&#9776;</div>

  <!-- Sidebar -->
  <div class="sidebar" id="mySidebar">
    <div>
      <a href="#dashboard" onclick="setActive(this)">Dashboard</a>
      <a href="#customer" onclick="setActive(this)">Customer</a>
      <a href="#calendar" onclick="setActive(this)">Calendar</a>
      <a href="#room-management" onclick="setActive(this)">Room Management</a>
      <a href="#income-tracker" onclick="setActive(this)">Income Tracker</a>
    </div>
  </div>

  <!-- Main Content -->
  <div class="content">
    <!-- Dashboard Section -->
    <section id="dashboard">
    <h1>Dashboard<br/></h1>
      <div class="dashboard-container">
        <div class="card">
          <h3>Total Customers</h3>
          <p>120</p>
        </div>
        <div class="card">
          <h3>Total Rooms</h3>
          <p>50</p>
        </div>
        <div class="card">
          <h3>Total Income</h3>
          <p>$10,000</p>
        </div>
      </div>
    </section>

    <!-- Customer Section -->
    <section id="customer" class="container my-4">
    <h2 class="mb-3">Customer Information</h2>
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="table-dark">
          <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Room</th>
            <th>Check-in</th>
            <th>Check-out</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John</td>
            <td>Doe</td>
            <td>123-456-7890</td>
            <td>john@example.com</td>
            <td>101</td>
            <td>2024-11-01</td>
            <td>2024-11-10</td>
            <td>
              <button class="btn btn-sm btn-primary me-2">Update</button>
              <button class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
          <tr>
            <td>Jane</td>
            <td>Smith</td>
            <td>987-654-3210</td>
            <td>jane@example.com</td>
            <td>102</td>
            <td>2024-11-02</td>
            <td>2024-11-12</td>
            <td>
              <button class="btn btn-sm btn-primary me-2">Update</button>
              <button class="btn btn-sm btn-danger">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </section>

    <!-- Calendar Section -->
    <section id="calendar">
    <h1>Calendar<br/></h1>
      <div class="calendar">
        <div class="calendar-header">
          <button onclick="changeMonth(-1)">&#8592; Prev</button>
          <span id="month-year"></span>
          <button onclick="changeMonth(1)">Next &#8594;</button>
        </div>
        <div class="calendar-days" id="calendarDays"></div>
      </div>
      <div id="customerBookings" class="customer-list" style="display:none;">
        <h3>Customer Bookings for Selected Day</h3>
        <table>
          <thead>
            <tr>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Room Number</th>
              <th>Check-out Date</th>
            </tr>
          </thead>
          <tbody id="customerBookingsTable"></tbody>
        </table>
      </div>
    </section>


    <!-- Room Management Section -->
    <!-- Room Management Section -->
    <section id="room-management">
    <div class="card">
      <h3>Room Management</h3>

      <!-- Room List Container -->
      <div class="room-list" id="roomList">
        <!-- Room items will be dynamically added here -->
      </div>

      <button class="add-room-btn" onclick="addRoom()">Add New Room</button>
    </div>
    </section>


  <div class="income-tracker">
    <h2>Income Tracker</h2>
    <table>
        <thead>
            <tr>
                <th>Customer Name</th>
                <th>Check-In</th>
                <th>Check-Out</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody id="incomeList">
            <!-- Dynamic rows will be inserted here -->
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    let currentDate = new Date();

    function toggleSidebar() {
      const sidebar = document.getElementById("mySidebar");
      sidebar.classList.toggle("responsive");
    }

    function setActive(link) {
      const links = document.querySelectorAll(".sidebar a");
      links.forEach(link => link.classList.remove("active"));
      link.classList.add("active");
    }

    function changeMonth(direction) {
      currentDate.setMonth(currentDate.getMonth() + direction);
      renderCalendar();
    }

    function renderCalendar() {
      const monthYear = document.getElementById("month-year");
      monthYear.textContent = `${currentDate.toLocaleString('default', { month: 'long' })} ${currentDate.getFullYear()}`;

      const daysContainer = document.getElementById("calendarDays");
      daysContainer.innerHTML = "";

      const firstDay = new Date(currentDate.getFullYear(), currentDate.getMonth(), 1);
      const lastDay = new Date(currentDate.getFullYear(), currentDate.getMonth() + 1, 0);
      const totalDays = lastDay.getDate();
      const startingDay = firstDay.getDay();

      for (let i = 0; i < startingDay; i++) {
        const emptyDiv = document.createElement("div");
        emptyDiv.classList.add("calendar-day", "empty");
        daysContainer.appendChild(emptyDiv);
      }

      for (let i = 1; i <= totalDays; i++) {
        const dayDiv = document.createElement("div");
        dayDiv.classList.add("calendar-day");
        dayDiv.textContent = i;

        // Check if it's the current day
        if (i === new Date().getDate() && currentDate.getMonth() === new Date().getMonth()) {
          dayDiv.classList.add("current-day");
        }

     // Add click event to toggle active state
      dayDiv.onclick = function() {
        
        if (this.classList.contains("active-day")) {
          this.classList.remove("active-day");
          hideBookings();
        } else {
          const allDays = document.querySelectorAll(".calendar-day");
          allDays.forEach(day => day.classList.remove("active-day"));
          this.classList.add("active-day");

          showCustomerBookings(i);
        }
      };

        daysContainer.appendChild(dayDiv);
      }
    }

    function showCustomerBookings(day) {
      const bookingsSection = document.getElementById("customerBookings");
      bookingsSection.style.display = "block";

      const tableBody = document.getElementById("customerBookingsTable");
      tableBody.innerHTML = ""; // Clear previous data

      // Fetch customer bookings for the selected day
      const sampleBookings = [
        { firstName: "John", lastName: "Doe", roomNumber: 101, checkOutDate: "2024-11-10" },
        { firstName: "Jane", lastName: "Smith", roomNumber: 102, checkOutDate: "2024-11-12" }
      ];

      sampleBookings.forEach(booking => {
        const row = document.createElement("tr");
        row.innerHTML = `<td>${booking.firstName}</td><td>${booking.lastName}</td><td>${booking.roomNumber}</td><td>${booking.checkOutDate}</td>`;
        tableBody.appendChild(row);
      });
    }

    function hideBookings() {
      const bookingsSection = document.getElementById("customerBookings");
      bookingsSection.style.display = "none";
    }

    // Initial render
    renderCalendar();


    // Room Data (In a real-world application, this would be fetched from a server)
    let rooms = [
  { id: 1, image: 'https://via.placeholder.com/300', roomNumber: 101, type: 'Single', description: 'A cozy single room with basic amenities.', price: 100 },
  { id: 2, image: 'https://via.placeholder.com/300', roomNumber: 102, type: 'Double', description: 'A spacious double room with a beautiful view.', price: 150 },
];

// Render rooms
function renderRooms() {
  const roomList = document.getElementById('roomList');
  roomList.innerHTML = '';

  rooms.forEach(room => {
    const roomDiv = document.createElement('div');
    roomDiv.classList.add('room');

    roomDiv.innerHTML = `
      <img src="${room.image}" alt="Room Image">
      <h4> ${room.type}</h4>
      <p>Description: ${room.description}</p>
      <p>Price: $${room.price}</p>
      <button onclick="deleteRoom(${room.id})">Delete</button>
      <button onclick="editRoom(${room.id})">Edit</button>
    `;

    roomList.appendChild(roomDiv);
  });
}

// Add Room function
function addRoom() {
  const image = prompt("Enter Image URL:");
  const type = prompt("Enter Room Type (e.g. Single, Double):");
  const description = prompt("Enter Room Description:");
  const price = prompt("Enter Room Price:");

  if (image && roomNumber && type && description && price) {
    const newRoom = {
      id: rooms.length + 1,
      image: image,
      roomNumber: parseInt(roomNumber),
      type: type,
      description: description,
      price: parseFloat(price)
    };
    rooms.push(newRoom);
    renderRooms();
  }
}

// Edit Room function
function editRoom(id) {
  const room = rooms.find(r => r.id === id);
  const image = prompt("Edit Image URL:", room.image);
  const roomNumber = prompt("Edit Room Number:", room.roomNumber);
  const type = prompt("Edit Room Type:", room.type);
  const description = prompt("Edit Room Description:", room.description);
  const price = prompt("Edit Room Price:", room.price);

  if (image && roomNumber && type && description && price) {
    room.image = image;
    room.roomNumber = parseInt(roomNumber);
    room.type = type;
    room.description = description;
    room.price = parseFloat(price);
    renderRooms();
  }
}

// Delete Room function
function deleteRoom(id) {
  const roomIndex = rooms.findIndex(r => r.id === id);
  if (roomIndex !== -1) {
    rooms.splice(roomIndex, 1);
    renderRooms();
  }
}

// Initial render
renderRooms();

  </script>

</body>
</html>
