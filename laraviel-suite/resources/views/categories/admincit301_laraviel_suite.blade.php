<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <title>admin dashboard</title>
  <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>

  <!-- Burger Icon -->
  <div class="burger-icon" onclick="toggleSidebar()">&#9776;</div>

  <!-- Sidebar -->
  <div class="sidebar d-flex flex-column" id="mySidebar" style="height: 100vh;">
    <div class="text-center">
      <img src="./images/logo.png" alt="" style="width: 100px;">
    </div>
    <div>
      <a href="#dashboard" onclick="setActive(this)">Dashboard</a>
      <a href="#customer" onclick="setActive(this)">Customer</a>
      <a href="#room-service" onclick="setActive(this)">Room Service</a>
      <a href="#calendar" onclick="setActive(this)">Calendar</a>
      <a href="#room-management" onclick="setActive(this)">Room Management</a>
      <a href="#income-tracker" onclick="setActive(this)">Income Tracker</a>
      <a href="{{ route('registeremployee') }}" class="add-employee">
        Add Employee
      </a>
      </form>
    </div>
    <footer class="mt-auto d-flex flex-column justify-content-center align-items-center text-center">
      <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" class="nav-link btn btn-link p-2" style="color: red; text-decoration: none; border: solid red 1px;">
          <i class="bi bi-box-arrow-right"></i> Logout
        </button>
      </form>
      <p style="font-size: 12px;" class="mt-3">&copy; Laraveil Suite.</p>
    </footer>

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

    <!-- Search Form -->
    <form action="{{ url('/admin') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input
                type="text"
                class="form-control"
                name="search"
                placeholder="Search by last name, email, or booking ID"
                value="{{ request()->input('search') }}"
                aria-label="Search" />
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-search"></i> Search
            </button>
        </div>
    </form>

    <!-- Guests Table -->
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
                        <button
                            type="button"
                            class="btn btn-sm btn-primary me-2 d-flex"
                            data-bs-toggle="modal"
                            data-bs-target="#editModal-{{ $guest->id ?? 1 }}">
                            <i class="bi bi-pencil-fill me-1"></i> Edit
                        </button>

                        <!-- Delete Button -->
                        <form
                            action="{{ route('guest.destroy', $guest->id ?? 1) }}"
                            method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this guest?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger d-flex">
                                <i class="bi bi-trash-fill me-1"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center">
        {{ $guests->links('pagination::bootstrap-5') }}
    </div>
</section>



    <!-- Edit Modal -->
    <div class="modal fade" id="editModal-{{ $guest->id ?? 1 ?? 1 }}" tabindex="-1" aria-labelledby="editModalLabel-{{ $guest->id ?? 1 ?? 1 }}" aria-hidden="true">

      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel-{{ $guest->id ?? 1 }}">Edit Guest Information</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('guest.update', $guest->id ?? 1) }}" method="POST">
              @csrf
              @method('PUT')

              <div class="mb-3">
                <label for="lastname-{{ $guest->id ?? 1 }}" class="form-label">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="lastname-{{ $guest->id ?? 1 }}"
                  name="lastname"
                  value="{{ $guest->lastname ?? 1 }}"
                  required>
              </div>

              <div class="mb-3">
                <label for="contact_number-{{ $guest->id ?? 1 }}" class="form-label">Contact Number</label>
                <input
                  type="text"
                  class="form-control"
                  id="contact_number-{{ $guest->id ?? 1 }}"
                  name="contact_number"
                  value="{{ $guest->contact_number ?? 1 }}"
                  required>
              </div>

              <div class="mb-3">
                <label for="email-{{ $guest->id ?? 1 }}" class="form-label">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email-{{ $guest->id ?? 1 }}"
                  name="email"
                  value="{{ $guest->email ?? 1 }}"
                  required>
              </div>

              <div class="mb-3">
                <label for="booked_rooms-{{ $guest->id ?? 1 }}" class="form-label">Booked Rooms</label>
                <input
                  type="text"
                  class="form-control"
                  id="booked_rooms-{{ $guest->id ?? 1 }}"
                  name="booked_rooms"
                  value="{{ $guest->booked_rooms ?? 1 }}"
                  required>
              </div>

              <div class="mb-3">
                <label for="check_in-{{ $guest->id ?? 1 }}" class="form-label">Check-in Date</label>
                <input
                  type="date"
                  class="form-control"
                  id="check_in-{{ $guest->id ?? 1 }}"
                  name="check_in"
                  value="{{ $guest->check_in ?? 1 }}"
                  required>
              </div>

              <div class="mb-3">
                <label for="check_out-{{ $guest->id ?? 1 }}" class="form-label">Check-out Date</label>
                <input
                  type="date"
                  class="form-control"
                  id="check_out-{{ $guest->id ?? 1 }}"
                  name="check_out"
                  value="{{ $guest->check_out ?? 1 }}"
                  required>
              </div>

              <button type="submit" class="btn btn-primary">Update Guest</button>
            </form>
          </div>
        </div>
      </div>
    </div>


    <section id="room-service" class=" p-4 rounded-4 shadow my-2">
      <div class="container-fluid">
        <h2>Room Service</h2>

        
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th scope="col">Service Name</th>
                    <th scope="col">Available Services</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                @foreach ($roomServices as $roomService)
                <tbody>
                
                  <tr>
                    <td>{{ $roomService->service_name }}</td>
                    <td>{{ $roomService->availed_service }}</td>
                    <td>{{ $roomService->description }}</td>
                    <td>{{ $roomService->price }}</td>
                    <td>
                      <a href="#" class="btn btn-primary">Edit</a>
                      <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                </tbody>
                @endforeach
              </table>
            <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRoomServiceModal">Add Room Service</button>

      </div>
    </section>

    <!--modal for add room service-->
    <div class="modal fade" id="addRoomServiceModal" tabindex="-1" aria-labelledby="addRoomServiceModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="addRoomServiceModalLabel">Add Room Service</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('room.create') }}" method="POST">
              @csrf
              <div class="mb-3">
                <label for="service_name" class="form-label">Service Name</label>
                <input type="text" class="form-control" id="service_name" name="service_name" required>
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
              </div>
              <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" min="0" step="0.01" required>
              </div>
              <div class="mb-3">
                <label for="availed_service" class="form-label">Available Services</label>
                <input type="text" class="form-control" id="availed_service" name="availed_service" required>
              </div>
              <button type="submit" class="btn btn-primary">Add Room Service</button>
            </form>
          </div>
        </div>
      </div>
    </div>

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

                        <!-- Button Container -->
                        <div class="mt-auto d-flex justify-content-center mt-3">
                            <form action="{{ route('room.destroy', $room->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this room?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger me-2"><i class="bi bi-trash-fill"></i> Delete</button>
                            </form>

                            <!-- Edit Button triggers a modal -->
                            <button  class="btn btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#editRoomModal{{ $room->id }}">
                                <i class="bi bi-pencil-fill me-2"></i>Edit
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Add New Room Button -->
        <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addRoomModal">Add New Room</a>

    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="addRoomModal" tabindex="-1" aria-labelledby="addRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRoomModalLabel">Add New Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('room.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <!-- Room Type Dropdown -->
                    <div class="mb-3">
                        <label for="roomType" class="form-label">Room Type</label>
                        <select class="form-select" id="roomType" name="room_type" required>
                            <option value="Standard">Standard</option>
                            <option value="Deluxe">Deluxe</option>
                            <option value="Luxury">Luxury</option>
                        </select>
                    </div>

                    <!-- Room Price -->
                    <div class="mb-3">
                        <label for="roomPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="roomPrice" name="price" required>
                    </div>
                      <!-- Room description -->
                    <div class="mb-3">
                        <label for="roomDescription" class="form-label">Description</label>
                        <input type="text" class="form-control" id="roomDescription" name="description" required>
                    </div>
                    <!-- Room Image -->
                    <div class="mb-3">
                        <label for="roomImage" class="form-label">Room Image</label>
                        <input type="file" class="form-control" id="roomImage" name="image" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Room</button>
                </div>
            </form>
        </div>
    </div>
</div>

@foreach($rooms as $room)
<div class="modal fade" id="editRoomModal{{ $room->id }}" tabindex="-1" aria-labelledby="editRoomModalLabel{{ $room->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editRoomModalLabel{{ $room->id }}">Edit Room Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('room.update', $room->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                    <select class="form-select" id="roomType" name="room_type" required>
                            <option value="Standard" {{$room->room_type == 'Standard Room' ? 'selected' : ''}}>Standard</option>
                            <option value="Deluxe" {{$room->room_type == 'Deluxe Room' ? 'selected' : ''}}>Deluxe</option>
                            <option value="Luxury" {{$room->room_type == 'Luxury Room' ? 'selected' : ''}}>Luxury</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="roomDescription" class="form-label">Description</label>
                        <textarea class="form-control" id="roomDescription" name="description" rows="3" required>{{ $room->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="roomPrice" class="form-label">Price</label>
                        <input type="number" class="form-control" id="roomPrice" name="price" value="{{ $room->price }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="roomImage" class="form-label">Image</label>
                        <input type="file" class="form-control" id="roomImage" name="image">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach


<div class="income-tracker container-fluid" id="income-tracker">
    <h2>Income Tracker</h2>
    <table>
        <thead>
            <tr>
                <th class="text-center">Customer Name</th>
                <th class="text-center">Availed Services</th>
                <th class="text-center">Price</th>
            </tr>
        </thead>
        <tbody id="incomeList">
            <!-- Loop through the incomeTracker data -->
            @foreach($incomeTracker as $income)
            <tr>
                <td class="text-center">{{ $income->customer_name }}</td>
                <td class="text-center">{{ $income->availed_service }}</td>
                <td class="text-center">Php {{ number_format($income->price, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination links -->
    <div class="text-center">
        {{ $incomeTracker->links('pagination::bootstrap-5') }}
    </div>
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