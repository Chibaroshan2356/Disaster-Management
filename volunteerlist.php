<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Disaster Management</title>
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
            background-color: #f4f4f4;
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
        }

        .sidebar nav ul li a:hover {
            color: #1e90ff;
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

        .search-bar {
            display: flex;
            align-items: center;
            background-color: #fff;
            border-radius: 5px;
            padding: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-right: 20px;
        }

        .search-bar input {
            border: none;
            outline: none;
            padding: 8px;
            font-size: 16px;
            width: 200px;
            border-radius: 5px 0 0 5px;
        }

        .search-bar button {
            background-color: #1e90ff;
            border: none;
            padding: 8px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            color: #fff;
        }

        .search-bar button i {
            font-size: 14px;
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

        /* Main Content Styles */
        .main-content {
            flex-grow: 1;
            margin-left: 240px;
            padding: 30px;
            width: calc(100% - 240px);
            margin-top: 60px; /* To prevent content from being hidden behind the navbar */
        }

        /* Volunteer List Styles */
        .volunteer-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .volunteer-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            text-align: center;
            width: 30%;
            box-sizing: border-box;
        }

        .volunteer-card h3 {
            font-size: 22px;
            margin-top: 10px;
        }

        .volunteer-card p {
            font-size: 16px;
            margin: 10px 0;
        }

        .volunteer-card a {
            text-decoration: none;
        }

        .volunteer-card .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
        }

        .volunteer-card .button:hover {
            background-color: #218838;
        }

        /* Responsive Styles */
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

            .volunteer-list {
                flex-direction: column;
                gap: 10px;
            }

            .volunteer-card {
                width: 100%;
            }
        }
    </style>
</head>
<body>

    <!-- Sidebar -->
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

    <!-- Top Navigation Bar -->
    <header class="top-nav">
        <h1>Disaster Volunteer List</h1>
        <div class="nav-right">
            <div class="profile">
                <img src="adminicon.png" alt="User">
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Disaster Preparedness Volunteers in Chennai</h2>

        <div class="volunteer-list" id="volunteerList">
            <!-- Volunteer Cards -->
            <div class="volunteer-card">
                <h3>Gowtham</h3>
                <p><strong>Area:</strong> Adyar</p>
                <p><strong>Contact Number:</strong> <a href="tel:+919876543210">+91 76399 37814</a></p>
                <p><strong>Email:</strong> gowtham@gmail.com</p>
                <p><strong>Skills:</strong> Medical Aid, Rescue Assistance</p>
                <a href="https://wa.me/917639937814" target="_blank" class="button">Message on WhatsApp</a>
            </div>

            <div class="volunteer-card">
                <h3>Dharshan</h3>
                <p><strong>Area:</strong> Koyambedu</p>
                <p><strong>Contact Number:</strong> <a href="tel:+919884206325">+91 63806 31799</a></p>
                <p><strong>Email:</strong> dharshan@gmail.com</p>
                <p><strong>Skills:</strong> Food Distribution, Community Awareness</p>
                <a href="https://wa.me/916380631799" target="_blank" class="button">Message on WhatsApp</a>
            </div>

            <div class="volunteer-card">
                <h3>Amarnath</h3>
                <p><strong>Area:</strong> T Nagar</p>
                <p><strong>Contact Number:</strong> <a href="tel:+919443467529">+91 94434 67529</a></p>
                <p><strong>Email:</strong> amarnath@gmail.com</p>
                <p><strong>Skills:</strong> Medical Aid, Food Distribution</p>
                <a href="https://wa.me/919443467529" target="_blank" class="button">Message on WhatsApp</a>
            </div>
            <!-- Volunteer 4 -->
            <div class="volunteer-card">
                <h3>Bharath</h3>
                <p><strong>Area:</strong> Velachery</p>
                <p><strong>Contact Number:</strong> <a href="tel:+919876543213">+91 98765 43213</a></p>
                <p><strong>Email:</strong> bharath@gmail.com</p>
                <p><strong>Skills:</strong> Rescue Assistance, Community Awareness</p>
                <a href="https://wa.me/919876543213" target="_blank" class="button">Message on WhatsApp</a>
            </div>

            <!-- Volunteer 5 -->
            <div class="volunteer-card">
                <h3>Roshan</h3>
                <p><strong>Area:</strong> Nungambakkam</p>
                <p><strong>Contact Number:</strong> <a href="tel:+919876543214">+91 98765 43214</a></p>
                <p><strong>Email:</strong> roshan@gmail.com</p>
                <p><strong>Skills:</strong> Medical Aid, Food Distribution</p>
                <a href="https://wa.me/919876543214" target="_blank" class="button">Message on WhatsApp</a>
            </div>

            <!-- Volunteer 6 -->
            <div class="volunteer-card">
                <h3>Latha</h3>
                <p><strong>Area:</strong> Mylapore</p>
                <p><strong>Contact Number:</strong> <a href="tel:+919876543215">+91 98765 43215</a></p>
                <p><strong>Email:</strong> latha@gmail.com</p>
                <p><strong>Skills:</strong> Rescue Assistance, Community Awareness</p>
                <a href="https://wa.me/919876543215" target="_blank" class="button">Message on WhatsApp</a>
            </div>

            <!-- Volunteer 7 -->
            <div class="volunteer-card">
                <h3>Bharathi</h3>
                <p><strong>Area:</strong> Korattur</p>
                <p><strong>Contact Number:</strong> <a href="tel:+919876543216">+91 98765 43216</a></p>
                <p><strong>Email:</strong> bharathi@gmail.com</p>
                <p><strong>Skills:</strong> Food Distribution, Medical Aid</p>
                <a href="https://wa.me/919876543216" target="_blank" class="button">Message on WhatsApp</a>
            </div>

            <!-- Volunteer 8 -->
            <div class="volunteer-card">
                <h3>Elakya</h3>
                <p><strong>Area:</strong> Perungudi</p>
                <p><strong>Contact Number:</strong> <a href="tel:+919876543217">+91 98765 43217</a></p>
                <p><strong>Email:</strong> elakya@gmail.com</p>
                <p><strong>Skills:</strong> Community Awareness, Rescue Assistance</p>
                <a href="https://wa.me/919876543217" target="_blank" class="button">Message on WhatsApp</a>
            </div>

            <!-- Volunteer 9 -->
            <div class="volunteer-card">
                <h3>Harini</h3>
                <p><strong>Area:</strong> Kotturpuram</p>
                <p><strong>Contact Number:</strong> <a href="tel:+919876543218">+91 98765 43218</a></p>
                <p><strong>Email:</strong> harini@gmail.com</p>
                <p><strong>Skills:</strong> Medical Aid, Food Distribution</p>
                <a href="https://wa.me/919876543218" target="_blank" class="button">Message on WhatsApp</a>
            </div>

            <!-- Volunteer 10 -->
            <div class="volunteer-card">
                <h3>Pavithra</h3>
                <p><strong>Area:</strong> Tondiarpet</p>
                <p><strong>Contact Number:</strong> <a href="tel:+919876543219">+91 98765 43219</a></p>
                <p><strong>Email:</strong> pavithra@gmail.com</p>
                <p><strong>Skills:</strong> Rescue Assistance, Community Awareness</p>
                <a href="https://wa.me/919876543219" target="_blank" class="button">Message on WhatsApp</a>
            </div>

            
        </div>
    </div>

    <script>
    // Search functionality for filtering volunteers
    document.getElementById('searchInput').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const volunteerCards = document.querySelectorAll('.volunteer-card');
    let found = false;

    volunteerCards.forEach(function(card) {
        const name = card.querySelector('h3').textContent.toLowerCase();
        const area = card.querySelector('.area').textContent.toLowerCase();
        const skills = card.querySelector('.skills').textContent.toLowerCase();

        if (name.includes(filter) || area.includes(filter) || skills.includes(filter)) {
            card.style.display = ''; // Show the card
            found = true;
        } else {
            card.style.display = 'none'; // Hide the card
        }
    });

    // Show no results message if no volunteer matches the search
    const noResultsMessage = document.getElementById('noResults');
    noResultsMessage.style.display = found ? 'none' : 'block';
    });
    </script>

</body>
</html>
