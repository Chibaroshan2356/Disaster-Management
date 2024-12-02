<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Contact Information</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            min-height: 100vh;
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

        /* Contact Edit Section with Grid */
        .contact-section {
            background-color: rgb(0, 204, 255);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .contact-box {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            text-align: left;
        }

        .contact-box h3 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .contact-box label {
            font-size: 16px;
            margin-bottom: 5px;
            display: block;
        }

        .contact-box input[type="text"], .contact-box input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        .contact-box button {
            background-color: #1e90ff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .contact-box button:hover {
            background-color: #007bff;
            transform: scale(1.05);
        }

        /* Floating Message */
        .floating-message {
            position: fixed;
            top: 20px;
            right: 20px;
            background-color: rgba(0, 200, 0, 0.9); /* Green color */
            color: white;
            padding: 15px;
            border-radius: 5px;
            opacity: 0;
            transition: opacity 0.5s ease, transform 0.5s ease;
            transform: translateY(-20px);
            z-index: 1000;
        }

        .floating-message.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
                width: 100%;
            }

            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
            }

            .top-nav {
                left: 0;
                width: 100%;
            }

            .top-nav h1 {
                font-size: 20px;
            }

            .contact-section {
                grid-template-columns: 1fr;
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
                <li><a href="admincontactinfo.php"><i class="fas fa-address-card"></i>Contact Information</a></li>
                <li><a href="volunteer.php"><i class="fas fa-handshake"></i> Disaster Volunteer Program</a></li>
                <li><a href="volunteerlist.php"><i class="fas fa-users"></i> Disaster Volunteer List</a></li>
            </ul>
        </nav>
    </aside>

    <!-- Main Content Area -->
    <div class="main-content">
        <!-- Top Navigation -->
        <header class="top-nav">
            <h1>Edit Contact Information</h1>
            <div class="nav-right">
                <div class="profile">
                    <img src="adminicon.png" alt="Admin"> <span>Admin</span>
                </div>
            </div>
        </header>

        <!-- Contact Edit Section -->
        <section class="contact-section">
            <div class="contact-box">
                <h3>Edit Contact - Perundurai</h3>
                <label for="location">Location</label>
                <input type="text" id="location1" value="Perundurai, Erode">
                
                <label for="ndrf">NDRF Contact</label>
                <input type="number" id="ndrf1" value="1070">
                
                <label for="sdrf">SDRF Contact</label>
                <input type="number" id="sdrf1" value="1000">
                
                <label for="police">Police Contact</label>
                <input type="number" id="police1" value="100">
                
                <label for="medical">Medical Contact</label>
                <input type="number" id="medical1" value="108">
                
                <button onclick="saveChanges()">Save Changes</button>
            </div>

            <div class="contact-box">
                <h3>Edit Contact - Kangeyam</h3>
                <label for="location">Location</label>
                <input type="text" id="location2" value="Kangeyam, Tamil Nadu">
                
                <label for="ndrf">NDRF Contact</label>
                <input type="number" id="ndrf2" value="1070">
                
                <label for="sdrf">SDRF Contact</label>
                <input type="number" id="sdrf2" value="1000">
                
                <label for="police">Police Contact</label>
                <input type="number" id="police2" value="100">
                
                <label for="medical">Medical Contact</label>
                <input type="number" id="medical2" value="108">
                
                <button onclick="saveChanges()">Save Changes</button>
            </div>

            <div class="contact-box">
                <h3>Edit Contact - Erode</h3>
                <label for="location">Location</label>
                <input type="text" id="location3" value="Erode, Tamil Nadu">
                
                <label for="ndrf">NDRF Contact</label>
                <input type="number" id="ndrf3" value="1070">
                
                <label for="sdrf">SDRF Contact</label>
                <input type="number" id="sdrf3" value="1000">
                
                <label for="police">Police Contact</label>
                <input type="number" id="police3" value="100">
                
                <label for="medical">Medical Contact</label>
                <input type="number" id="medical3" value="108">
                
                <button onclick="saveChanges()">Save Changes</button>
            </div>
        </section>

        <!-- Floating Message -->
        <div id="floatingMessage" class="floating-message">
            Changes Saved Successfully!
        </div>
    </div>

    <script>
        function saveChanges() {
            // Show the floating message
            const floatingMessage = document.getElementById('floatingMessage');
            floatingMessage.classList.add('show');
            
            // Hide the message after 3 seconds
            setTimeout(() => {
                floatingMessage.classList.remove('show');
            }, 3000);
        }
    </script>
</body>
</html>
