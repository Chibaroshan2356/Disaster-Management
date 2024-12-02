<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Disaster Management</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #ffffff;
            display: flex;
            min-height: 100vh;
            margin: 0;
        }

        /* Sidebar Styles */
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

        /* Main Content Styles */
        .main-content {
        flex-grow: 1;
         margin-left: 240px;
        padding: 30px;
        width: calc(100% - 240px);
        margin-top: 80px; /* Adjusted to move content down */
        }


        /* Top Navigation Bar */
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

        /* Alerts Section */
        .alert-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-top: 20px;
            max-width: 100%;
        }

        .alert-box {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: rgb(172, 243, 170);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(255, 255, 255, 0.1);
            position: relative;
        }

        .alert-box h3 {
            margin: 0 0 15px 0;
            font-size: 18px;
        }

        .alert-details {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .affected-states {
            text-align: left;
            flex-grow: 1;
        }

        .alert-level-box {
            text-align: right;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            margin-left: 10px;
        }

        .alert-level-box.catastrophic {
            background-color: #ee220b;
            color: #fff;
        }

        .alert-level-box.severe {
            background-color: #f39c12;
            color: #fff;
        }

        .alert-btn {
            align-self: flex-end;
            background-color: #1e90ff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .alert-btn:hover {
            background-color: #007bff;
            transform: scale(1.05);
        }

        .add-alert-btn {
            background-color: #1e90ff;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
            font-size: 16px;
        }

        .add-alert-btn:hover {
            background-color: #007bff;
            transform: scale(1.05);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            overflow: auto;
        }

        .modal-content {
            background-color: white;
            margin: 10% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 50%;
            border-radius: 8px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .modal-btn {
            padding: 10px 20px;
            margin: 10px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            border: none;
        }

        .modal-confirm {
            background-color: #d9534f;
            color: white;
        }

        .modal-cancel {
            background-color: #5bc0de;
            color: white;
        }

        .modal form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .modal input, .modal select, .modal button {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        .modal label {
            font-size: 16px;
            text-align: left;
        }

        /* Floating message styles */
        .floating-message {
            display: none;
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: #28a745;
            color: white;
            padding: 15px 25px;
            border-radius: 5px;
            font-size: 16px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(-50px);
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .floating-message.show {
            display: block;
            opacity: 1;
            transform: translateY(0);
        }

        .floating-message.hide {
            opacity: 0;
            transform: translateY(-50px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .alert-container {
                grid-template-columns: 1fr;
            }
            .modal-content {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
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

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Top Navigation -->
        <header class="top-nav">
            <h1>Disaster Tracking</h1>
            <div class="nav-right">
                <div class="profile">
                    <img src="adminicon.png" alt="Admin"> <span>Admin</span>
                </div>
            </div>
        </header>

        <!-- Alerts Section -->
        <div class="container">
            <div class="header-actions">
                <h2>Disaster Alerts</h2>
                <div align="right">
                    <button class="add-alert-btn" onclick="openModal()">Add Alert</button>
                </div>
            </div>
            <div class="alert-container">
                <!-- Disaster Alert Card -->
                <div class="alert-box">
                    <h3>Flood Warning</h3>
                    <div class="alert-details">
                        <div class="affected-states">
                            <p><strong>Affected Areas:</strong> Bhavani, Erode</p>
                        </div>
                        <div class="alert-level-box catastrophic">CATASTROPHIC</div>
                    </div>
                    <p><i class="fas fa-calendar-alt"></i> 23 Sep, 2023</p>
                    <button class="alert-btn">ALERT PEOPLE</button>
                </div>

                <div class="alert-box">
                    <h3>Heat Wave</h3>
                    <div class="alert-details">
                        <div class="affected-states">
                            <p><strong>Affected Areas:</strong> Rajkot, Gujarat</p>
                        </div>
                        <div class="alert-level-box severe">SEVERE</div>
                    </div>
                    <p><i class="fas fa-calendar-alt"></i> 24 Sep, 2023</p>
                    <button class="alert-btn">ALERT PEOPLE</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="alertModal" class="modal">
        <div class="modal-content">
            <h2>Create New Alert</h2>
            <form id="alertForm">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                <label for="level">Alert Level:</label>
                <select id="level" name="level" required>
                    <option value="severe">Severe</option>
                    <option value="moderate">Moderate</option>
                    <option value="catastrophic">Catastrophic</option>
                </select>
                <label for="states">Affected States:</label>
                <input type="text" id="states" name="states" required>
                <label for="date">Date:</label>
                <input type="date" id="date" name="date" required>
                <button type="button" class="modal-btn modal-confirm" onclick="submitAlert()">Submit</button>
                <button type="button" class="modal-btn modal-cancel" onclick="closeModal()">Cancel</button>
            </form>
        </div>
    </div>

    <!-- Floating Message -->
    <div id="floatingMessage" class="floating-message">Notifications sent</div>

    <!-- JavaScript -->
    <script>
        // Open the modal
        function openModal() {
            document.getElementById('alertModal').style.display = 'block';
        }

        // Close the modal
        function closeModal() {
            document.getElementById('alertModal').style.display = 'none';
        }

        // Handle form submission
        function submitAlert() {
            const form = document.getElementById('alertForm');
            if (form.checkValidity()) {
                console.log('Form Submitted');
                console.log('Title:', form.title.value);
                console.log('Level:', form.level.value);
                console.log('States:', form.states.value);
                console.log('Date:', form.date.value);
                closeModal();
            } else {
                alert('Please fill in all required fields.');
            }
        }

        // Show floating message
        function showFloatingMessage() {
            const message = document.getElementById('floatingMessage');
            message.classList.add('show');

            // Hide after 3 seconds
            setTimeout(() => {
                message.classList.remove('show');
            }, 3000);
        }

        // Handle "ALERT PEOPLE" button click
        document.querySelectorAll('.alert-btn').forEach(button => {
            button.addEventListener('click', () => {
                showFloatingMessage();
            });
        });
    </script>
</body>
</html>
