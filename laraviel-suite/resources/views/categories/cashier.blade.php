<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>CASHIER dashboard</title>
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

  <!-- Burger Icon -->
  <div class="burger-icon" onclick="toggleSidebar()">&#9776;</div>

  <!-- Sidebar -->
  <div class="sidebar" id="mySidebar">
    <div>
      <a href="#dashboard" onclick="setActive(this)">Cashier Dashboard</a>
      <a href="#customer" onclick="setActive(this)">Customer</a>
      <a href="#room-service" onclick="setActive(this)">Room Service</a>
      <a href="#calendar" onclick="setActive(this)">Calendar</a>
      <a href="#room-management" onclick="setActive(this)">Room Management</a>
      <a href="#income-tracker" onclick="setActive(this)">Income Tracker</a>
      <form method="POST" action="{{ route('logout') }}" class="d-inline">
          @csrf
          
          <button type="submit" class="nav-link btn btn-link" style="color: red; text-decoration: none;">Logout</button>
      </form>
    </div>
  </div>

  <!-- Main Content -->
  <div class="content">
    <!-- Dashboard Section -->
    <section id="dashboard">
      <h1>Dashboard<br /></h1>
      <div class="dashboard-container">
        <div class="card">
          <h3>Total Customers</h3>
          <p>{{ $totalGuests }}</p>
        </div>
        <div class="card">
          <h3>Total Rooms</h3>
          <p>{{ $totalRooms }}</p>
        </div>
        <div class="card">
          <h3>Total Income</h3>
          <p>Php {{ number_format($totalGuestPayments, 2) }}</p>
        </div>
      </div>
    </section>

    <!-- Customer Section -->
    <section id="customer" class="container my-4">
      <h2 class="mb-3">Customer Information</h2>
      <form action="#" method="GET" class="mb-3">
        <div class="input-group">
          <input type="text" class="form-control" name="search" placeholder="Search by last name, email, or booking id" aria-label="Search">
          <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Search</button>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead class="table-dark">
            <tr class="text-center" style="font-size: 12px;">
              <th>Booking ID</th>
              <th style="width: 100px;">Last Name</th>
              <th>Contact Number</th>
              <th>Email</th>
              <th>Room</th>
              <th style="width: 100px;">Check-in</th>
              <th style="width: 100px;">Check-out</th>
              <th style="width: 150px;">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($guests as $guest)
        <tr>
            <td>{{ $guest->booking_id }}</td>
            <td>{{ $guest->lastname }}</td>
            <td>{{ $guest->contact_number }}</td>
            <td>{{ $guest->email }}</td>
            <td>{{ $guest->booked_rooms }}</td>
            <td>{{ $guest->check_in }}</td>
            <td>{{ $guest->check_out }}</td>
            <td class="d-flex">
              <!-- Edit Button -->
              <a class="btn btn-sm btn-primary me-2 d-flex"> <i class="bi bi-pencil-fill  me-1"></i> Edit</a>
              
              <!-- Delete Button -->
              <form action="{{ route('guest.destroy', $guest->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this guest?')">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger d-flex"><i class="bi bi-trash-fill me-1"></i> Delete</button>
              </form>
          </td>
        </tr>
        @endforeach
          </tbody>
        </table>
      </div>
    </section>

    <section id="room-service" class="bg-warning p-4 rounded-4 shadow my-2">
      <p>
        this container is for adding room services availed by the guests, add a checkbox for thre services and an input for booking id and a add button to add the services in inbcome tracker
      </p>
    </section>

    <!-- Calendar Section -->
    <section id="calendar">
      <h1>Calendar<br /></h1>
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
          <div class="row">
          @foreach($rooms as $room)
            <div class="col-md-6 col-lg-4 col-sm-12 mb-4">
              <div class="room d-flex flex-column text-center" style="height: 100%; display: flex; flex-direction: column;">
                <img src="{{ $room->image_path }}" alt="Room Image" class="img-fluid mb-3">
                <h4>{{ $room->room_type }}</h4>
                <p>Description: {{ $room->description }}</p>
                <p>Price: Php {{ number_format($room->price, 2) }}</p>
                
                <!-- Button Container with fixed position at the bottom -->
                <div class="mt-auto d-flex justify-content-center mt-3">
                  <form action="{{ route('room.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this room?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger me-2"> <i class="bi bi-trash-fill"></i> Delete</button>
                  </form>
                  <a class="btn btn-primary ms-2 d-flex align-items-center"> <i class="bi bi-pencil-fill me-2"></i>Edit</a>
                </div>
              </div>
            </div>
          @endforeach
          </div>
        </div>
        <button class="add-room-btn" onclick="addRoom()">Add New Room</button>
      </div>
    </section>


    <div class="income-tracker container-fluid" id="income-tracker">
    <h2>Income Tracker</h2>
    <table>
        <thead>
            <tr>
                <th  class="text-center">Customer Name</th>
                <th  class="text-center">Availed Services</th>
                <th  class="text-center">Price</th>
            </tr>
        </thead>
        <tbody id="incomeList">
            <!-- Loop through the incomeTracker data -->
            @foreach($incomeTracker as $income)
                <tr>
                    <td  class="text-center">{{ $income->customer_name }}</td>
                    <td  class="text-center">{{ $income->availed_service }}</td>
                    <td  class="text-center">Php {{ number_format($income->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

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

      renderCalendar();

    </script>

</body>

</html>