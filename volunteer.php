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
        .disaster-list {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .disaster-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 10px;
            text-align: center;
            width: 30%;
            box-sizing: border-box;
        }

        .disaster-card img {
            width: 100%;
            border-radius: 8px;
        }

        .disaster-card h3 {
            font-size: 22px;
            margin-top: 10px;
        }

        .disaster-card p {
            font-size: 16px;
            margin: 10px 0;
        }

        .disaster-card button {
            padding: 10px 20px;
            background-color: #1e90ff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .disaster-card button:hover {
            background-color: #007bff;
        }
        .form-section {
            display: none;
            margin-top: 20px;
            text-align: center;
        }

        .form-section input, .form-section select {
            padding: 10px;
            margin: 5px;
            width: 80%;
        }

        .thank-you-message {
            display: none;
            font-size: 18px;
            color: green;
            text-align: center;
            margin-top: 20px;
        }
        .qr-section {
            display: none;
            text-align: center;
            margin-top: 20px;
        }

        .timer {
            font-size: 24px;
            color: red;
            margin-top: 10px;
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

            .disaster-list {
                flex-direction: column;
                gap: 10px;
            }

            .disaster-card {
                width: 100%;
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
            <h1>Disaster Volunteer Program</h1>
            <div class="nav-right">
                <div class="profile">
                    <img src="adminicon.png" alt="User"> 
                </div>
            </div>
        </header>
        <section class="disaster-list">
            <div class="disaster-card" data-disaster="Flood">
                <img src="flood.jpg" alt="Flood">
                <h3>Flood in kilpauk</h3>
                <p><strong>Location:</strong> kilpauk</p>
                <p><strong>Date:</strong> 02-10-2024</p>
                <button class="view-details-btn">View Details</button>
            </div>
            <div class="disaster-card" data-disaster="Earthquake">
                <img src="earthquake.jpeg" alt="Earthquake">
                <h3>Earthquake in T Nagar</h3>
                <p><strong>Location:</strong> T Nagar</p>
                <p><strong>Date:</strong> 15-09-2024</p>
                <button class="view-details-btn">View Details</button>
            </div>
            <div class="disaster-card" data-disaster="Fire">
                <img src="fire.jpeg" alt="Fire">
                <h3>Fire in Villivakkam</h3>
                <p><strong>Location:</strong> Villivakkam</p>
                <p><strong>Date:</strong> 01-11-2024</p>
                <button class="view-details-btn">View Details</button>
            </div>
        </section>
        <div id="physical-work-form" class="form-section">
            <h3>Volunteer for Physical Work</h3>
            <form id="physicalForm">
                <input type="text" placeholder="Full Name" required><br>
                <input type="email" placeholder="Email" required><br>
                <input type="text" placeholder="Contact Number" required><br>
                <select required>
                    <option value="" disabled selected>Select how you can help</option>
                    <option value="Medical Aid">Medical Aid</option>
                    <option value="Food Distribution">Food Distribution</option>
                    <option value="Rescue Assistance">Rescue Assistance</option>
                </select><br>
                <button type="submit" class="button">Submit</button>
            </form>
        </div>
        <div id="financial-support-form" class="form-section">
            <h3>Support Financially</h3>
            <form id="paymentForm">
                <input type="number" placeholder="Enter Amount (in INR)" required><br>
                <button type="submit" class="button">Pay Now</button>
            </form>
        </div>
        <div id="qr-section" class="qr-section">
            <h3>Scan the QR Code to Pay</h3>
            <img id="qr-code" src="qr.jpg" alt="QR Code" style="width: 200px;">
            <div class="timer" id="timer">Time remaining: <span id="time">60</span> seconds</div>
        </div>
        <div id="thank-you-message" class="thank-you-message">
            Thank you for your help! Your support means a lot to the people in need.
        </div>
    </div>

    <script>
        const viewDetailsButtons = document.querySelectorAll('.view-details-btn');
        const physicalWorkForm = document.getElementById('physical-work-form');
        const financialSupportForm = document.getElementById('financial-support-form');
        const thankYouMessage = document.getElementById('thank-you-message');
        const qrSection = document.getElementById('qr-section');
        const timeElement = document.getElementById('time');

        viewDetailsButtons.forEach(button => {
            button.addEventListener('click', function() {
                const disasterName = this.closest('.disaster-card').getAttribute('data-disaster');
                alert("Showing details for: " + disasterName);
                const helpChoice = prompt("How would you like to help? Type 'physical' for physical work, 'financial' for financial support.");

                if (helpChoice === 'physical') {
                    physicalWorkForm.style.display = 'block';
                    financialSupportForm.style.display = 'none';
                } else if (helpChoice === 'financial') {
                    financialSupportForm.style.display = 'block';
                    physicalWorkForm.style.display = 'none';
                }
            });
        });
        document.getElementById('physicalForm').addEventListener('submit', function(event) {
            event.preventDefault();
            physicalWorkForm.style.display = 'none';
            thankYouMessage.style.display = 'block';
        });
        document.getElementById('paymentForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const amount = document.querySelector('#paymentForm input[type="number"]').value;
            alert("You will be paying ₹" + amount);
            qrSection.style.display = 'block';
            financialSupportForm.style.display = 'none';
            startTimer(60); // 
        });
        function startTimer(duration) {
            let timer = duration;
            const interval = setInterval(function() {
                if (timer > 0) {
                    timeElement.textContent = timer;
                    timer--;
                } else {
                    clearInterval(interval);
                    qrSection.style.display = 'none';
                    thankYouMessage.style.display = 'block';
                }
            }, 1000);
        }
    </script>
</body>
</html>
