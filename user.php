<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Disaster Management</title>
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
            margin: 0;
        }
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
        .floating-message {
        position: fixed;
        top: 80px; 
        right: 20px;
        background-color: rgba(60, 179, 113, 0.9);
        color: white;
        padding: 15px 25px;
        border-radius: 8px;
        font-size: 16px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        opacity: 0;
        visibility: hidden;
        transform: translateY(-30px);
        transition: all 0.6s ease;
        }
        .floating-message.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }
        .floating-message.hide {
            opacity: 0;
            transform: translateY(-30px);
        }
        .dashboard-overview {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .widget {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .widget h3 {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .widget p {
            font-size: 24px;
            color: #fc0000;
        }
        .events-section {
            margin-top: 30px;
        }
        .events-section h2 {
            font-size: 22px;
            margin: 20px 0;
        }
        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        .event-card {
            background-color: rgba(122, 219, 146, 0.979);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            position: relative;
        }

        .event-card img {
            width: 30%;
            height: auto;
            border-radius: 10px;
            margin-bottom: 10px;
        }
        .register-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: #000000;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s;
        }

        .register-btn:hover {
            background-color: #007bff;
            transform: scale(1.05);
        }
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            text-align: center;
            width: 300px;
        }
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

            .event-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <aside class="sidebar">
        <nav>
            <ul>
                <li><a href="user.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
                <li><a href="useralerts.php"><i class="fas fa-calendar-alt"></i> Disaster Tracking</a></li>
                <li><a href="usercontactinfo.php"><i class="fas fa-address-card"></i> Contact Information</a></li>
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
                    <img src="adminicon.png" alt="User"> 
                </div>
            </div>
        </header>
        <section class="events-section">
            <h2>Upcoming Events</h2>
            <div class="event-grid">
                <div class="event-card">
                    <img src="ndrf-logo.png" alt="NDRF Logo">
                    <h3>NDRF Mock Drill Exercise</h3>
                    <p>This is a community service programme organised by NDRF</p>
                    <p><i class="fas fa-map-marker-alt"></i> Reliance Shopping Mall</p>
                    <p><i class="fas fa-calendar-alt"></i> 15-10-2024</p>
                    <button class="register-btn">Register</button>
                </div>
            </div>
        </section>
        <section class="events-section">                   
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
                <p>This is a community service programme organised by SDRF</p>
                <p><i class="fas fa-map-marker-alt"></i> City Stadium</p>
                <p><i class="fas fa-calendar-alt"></i> 17-06-2024</p>
            </div>
            <div class="event-card">
                <img src="ndrf-logo.png" alt="NDRF Logo">
                <h3>CAP Emergency Response Training</h3>
                <p>This is a community service programme organised by CAP</p>
                <p><i class="fas fa-map-marker-alt"></i> City Park</p>
                <p><i class="fas fa-calendar-alt"></i> 17-04-2024</p>
            </div>
            </div>
        </section>
        <div class="floating-message">Successfully Registered!</div>
    </div>

    <script>
        document.querySelectorAll('.register-btn').forEach(button => {
            button.addEventListener('click', function() {
                const message = document.querySelector('.floating-message');
                message.classList.add('show');
                setTimeout(() => {
                    message.classList.remove('show');
                }, 2000);
            });
        });
    </script>
</body>
</html>