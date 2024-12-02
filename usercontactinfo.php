<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information - Disaster Management</title>
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

        .contact-box p {
            margin-bottom: 10px;
            font-size: 16px;
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

            .contact-section {
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
            <h1>Contact Information</h1>
            <div class="nav-right">
                <div class="profile">
                    <img src="adminicon.png" alt="User"> 
                </div>
            </div>
        </header>
        <section class="contact-section">
            <div class="contact-box">
                <h3>Perundurai - Safe Place</h3>
                <p><strong>Location:</strong> Perundurai, Erode</p>
                <p><strong>Emergency Contacts:</strong></p>
                <ul>
                    <li><strong>NDRF:</strong> 1070</li>
                    <li><strong>SDRF:</strong> 1000</li>
                    <li><strong>Police:</strong> 100</li>
                    <li><strong>Medical:</strong> 108</li>
                </ul>
            </div>

            <div class="contact-box">
                <h3>Kangeyam - Rescue Point</h3>
                <p><strong>Location:</strong> Kangeyam, Tamil Nadu</p>
                <p><strong>Emergency Contacts:</strong></p>
                <ul>
                    <li><strong>NDRF:</strong> 1070</li>
                    <li><strong>SDRF:</strong> 1000</li>
                    <li><strong>Police:</strong> 100</li>
                    <li><strong>Medical:</strong> 108</li>
                </ul>
            </div>

            <div class="contact-box">
                <h3>Erode - Emergency Shelter</h3>
                <p><strong>Location:</strong> Erode, Tamil Nadu</p>
                <p><strong>Emergency Contacts:</strong></p>
                <ul>
                    <li><strong>NDRF:</strong> 1070</li>
                    <li><strong>SDRF:</strong> 1000</li>
                    <li><strong>Police:</strong> 100</li>
                    <li><strong>Medical:</strong> 108</li>
                </ul>
            </div>
        </section>
    </div>
</body>
</html>
