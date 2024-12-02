<?php
    include('db.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Disaster Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
        .sidebar {
            width: 240px;
            background-color: #000000;
            color: #fff;
            padding: 20px;
            position: fixed;
            height: 100vh;
        }
        .sidebar-header {
            font-size: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        .sidebar nav ul {
            list-style: none;
        }
        .sidebar nav ul li {
            margin-bottom: 30px;
        }
        .sidebar nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 20px;
            display: center;
            align-items: center;
        }
        .sidebar nav ul li a:hover {
            color: #1e90ff;
        }
        .main-content {
        flex-grow: 1;
         margin-left: 240px;
        padding: 30px;
        width: calc(100% - 240px);
        margin-top: 80px;
        }
        .top-nav {
            position: fixed;
            top: 0;
            left: 240px;
            width: calc(100% - 240px);
            background-color: #2d3436;
            color: #ffffff;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }
        .top-nav h1 {
            font-size: 24px;
            color: #ffffff;
            margin: 0;
        }
        .nav-right {
            display: flex;
            align-items: center;
        }
        .profile {
            display: flex;
            align-items: center;
            color: #ffffff;
        }
        .profile img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }
        .profile span {
            font-size: 18px;
        }
        .dashboard-overview {
            display: flex;
            justify-content: space-between;
        }
        .widget {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            border-radius: 10px;
            width: 22%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        table th, table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: center;
        }
        table th {
            background-color: #333;
            color: white;
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
        }
        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 5px;
            width: 300px;
            text-align: center;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .floating-message {
        position: fixed;
        top: 20px; 
        right: 20px; 
        background-color: #28a745;
        color: white;
        padding: 8px 15px; 
        border-radius: 5px;
        display: none;
        align-items: center;
        font-size: 14px; 
        z-index: 1000; 
        }
        .floating-message.show {
        display: flex;
        }
        .floating-message.hide {
        display: none;
        }
        .floating-message i {
        margin-right: 5px; 
        }
        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }
        .event-card {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .event-card img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
        .event-card h3 {
            margin-top: 10px;
            font-size: 20px;
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <nav>
            <ul>
                <li><a href="admin.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="alerts.php"><i class="fas fa-exclamation-triangle"></i> Disaster Tracking</a></li>
                <li><a href="admincontactinfo.php"><i class="fas fa-address-card"></i> Contact Information</a></li>
                <li><a href="volunteer.php"><i class="fas fa-handshake"></i> Disaster Volunteer Program</a></li>
                <li><a href="volunteerlist.php"><i class="fas fa-users"></i> Disaster Volunteer List</a></li>
            </ul>
        </nav>
    </aside>
    <div class="main-content">
        <header class="top-nav">
            <h1>Dashboard</h1>
            <div class="nav-right">
                <div class="profile">
                    <img src="adminicon.png" alt="Admin"> <span>Admin</span>
                </div>
            </div>
        </header>
        <section class="dashboard-overview">
            <div class="widget">
                <h3>Active Disasters</h3>
                <p>2</p>
            </div>
            <div class="widget">
                <h3>New Users</h3>
                <p>32</p>
            </div>
            <div class="widget">
                <h3>Articles Published</h3>
                <p>20</p>
            </div>
            <div class="widget">
                <h3>Messages Received</h3>
                <p>4</p>
            </div>
        </section>
        <section class="content-section">
            <h2>Manage Content</h2> 
            <table>
                <thead>
                    <tr>
                        <th>S.No</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Registration Count</th>
                        <th>Alerts Count</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="content-table-body">
                    <tr>
                        <td>1</td>
                        <td>NDRF Mock Drill Exercise</td>
                        <td>17-09-2024</td>
                        <td>150</td>
                        <td>105</td>
                        <td>
                            <button class="notify-btn">Notify Users</button>
                            <button class="delete-btn">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>SDRF Mock Drill Exercise</td>
                        <td>14-09-2024</td>
                        <td>200</td>
                        <td>173</td>
                        <td>
                            <button class="notify-btn">Notify Users</button>
                            <button class="delete-btn">Delete</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>CAP Emergency Response Training</td>
                        <td>24-09-2024</td>
                        <td>175</td>
                        <td>129</td>
                        <td>
                            <button class="notify-btn">Notify Users</button>
                            <button class="delete-btn">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </section>
        <div id="floating-message" class="floating-message">
            <i class="fas fa-check-circle"></i> Notification Sent
        </div>
        <div id="deleteModal" class="modal">
            <div class="modal-content">
                <h3>Are you sure you want to delete this row?</h3>
                <button id="confirmDelete" class="modal-btn modal-confirm">Confirm</button>
                <button id="cancelDelete" class="modal-btn modal-cancel">Cancel</button>
            </div>
        </div>
        <section class="events-section">                  
            <h2>Upcoming Events</h2>
            <div align="right"><button class="add-event-btn">ADD EVENT</button></div>         
            <div class="event-grid">
                <div class="event-card">
                    <img src="ndrf-logo.png" alt="NDRF Logo">
                    <h3>NDRF Mock Drill Exercise</h3>
                    <p>This is a community service programme organised by NDRF</p>
                    <p><i class="fas fa-map-marker-alt"></i> Reliance Shopping Mall</p>
                    <p><i class="fas fa-calendar-alt"></i> 15-10-2024</p>
                </div>
            </div>
        </section>
        <br>
        <h2>Completed Events</h2><br>
        <div class="event-grid">
            <div class="event-card">
                <img src="ndrf-logo.png" alt="NDRF Logo">
                <h3>NDRF Mock Drill Exercise</h3>
                <p>This is a community service programme organised by NDRF</p>
                <p><i class="fas fa-map-marker-alt"></i> Govt School</p>
                <p><i class="fas fa-calendar-alt"></i> 28-08-2024</p>
            </div>
            <div class="event-card">
                <img src="ndrf-logo.png" alt="NDRF Logo">
                <h3>SDRF Mock Drill Exercise</h3>
                <p>This is a community service programme organised by NDRF</p>
                <p><i class="fas fa-map-marker-alt"></i> City Stadium</p>
                <p><i class="fas fa-calendar-alt"></i> 17-06-2024</p>
            </div>
            <div class="event-card">
                <img src="ndrf-logo.png" alt="NDRF Logo">
                <h3>CAP Emergency Response Training</h3>
                <p>This is a community service programme organised by NDRF</p>
                <p><i class="fas fa-map-marker-alt"></i> City Park</p>
                <p><i class="fas fa-calendar-alt"></i> 17-04-2024</p>
            </div>
        </div>
        </section>
    </div>

    <script>
        let rowToDelete = null;
        function showFloatingMessage() {
            const message = document.getElementById('floating-message');
            message.classList.add('show'); 
            setTimeout(() => {
                message.classList.add('hide');
            }, 3000);
            setTimeout(() => {
                message.classList.remove('show', 'hide'); 
            }, 3500);
        }
        function showDeleteModal(row) {
            rowToDelete = row;
            const modal = document.getElementById('deleteModal');
            modal.style.display = 'block';
        }
        function hideDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.style.display = 'none';
        }
        function confirmDelete() {
            if (rowToDelete) {
                rowToDelete.remove();
                rowToDelete = null;
            }
            hideDeleteModal();
        }
        document.querySelectorAll('.delete-btn').forEach(button => {
            button.addEventListener('click', function() {
                const row = this.closest('tr');
                showDeleteModal(row); 
            });
        });
        document.getElementById('confirmDelete').addEventListener('click', confirmDelete);
        document.getElementById('cancelDelete').addEventListener('click', hideDeleteModal);
        document.querySelectorAll('.notify-btn').forEach(button => {
            button.addEventListener('click', showFloatingMessage);
        });
    </script>
</body>
</html>