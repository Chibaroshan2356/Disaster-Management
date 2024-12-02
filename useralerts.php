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
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 10px;
            border-radius: 5px;
            font-weight: bold;
            font-size: 12px;
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
            margin: 5% auto;
            padding: 40px; 
            border-radius: 10px;
            width: 50%;
            position: relative;
        }

        .modal-content h2 {
            margin-bottom: 10px;
        }

        .modal-content .alert-level-box {
            position: absolute;
            top: 30px; 
            right: 20px;
            padding: 10px 15px; 
            border-radius: 5px;
            font-size: 14px;
            letter-spacing: 1px; 
        }

        .modal-content .alert-level-box.catastrophic {
            background-color: #ee220b;
            color: #fff;
        }

        .modal-content .alert-level-box.severe {
            background-color: #f39c12;
            color: #fff;
        }

        .modal-content .close {
            position: absolute;
            top: 10px;
            right: 20px;
            color: red;
            font-size: 28px;
            cursor: pointer;
        }

        .modal-content .close:hover {
            color: darkred;
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
            <h1>Diasater Tracking</h1>
            <div class="nav-right">
                <div class="profile">
                    <img src="adminicon.png" alt="User"> 
                </div>
            </div>
        </header>
        <section class="alerts-section">
            <h2>Disaster Alerts</h2>
            <div class="alert-container">
                <div class="alert-box" data-alert="earthquake">
                    <h3>Earthquake Warning</h3>
                    <div class="alert-level-box catastrophic">CATASTROPHIC</div>
                    <div class="alert-details">
                        <div class="affected-states">
                            <p><strong>Affected Areas:</strong> Andhra Pradesh, Karnataka</p>
                        </div>
                    </div>
                    <button class="alert-btn">View Alert</button>
                    <p><i class="fas fa-calendar-alt"></i> 25 Sep, 2023</p>
                </div>
                <div class="alert-box" data-alert="flood">
                    <h3>Flood Warning</h3>
                    <div class="alert-level-box severe">SEVERE</div>
                    <div class="alert-details">
                        <div class="affected-states">
                            <p><strong>Affected Areas:</strong> Tamil Nadu, Kerala</p>
                        </div>
                    </div>
                    <button class="alert-btn">View Alert</button>
                    <p><i class="fas fa-calendar-alt"></i> 24 Sep, 2023</p>
                </div>
            </div>
        </section>
        <div id="alertModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h2 id="alertTitle">Alert Title</h2>
                <div id="alertLevel" class="alert-level-box">Level</div>
                <h3>Affected Areas:</h3>
                <p id="affectedStates"></p>

                <h3>Rescue Teams Contacts:</h3>
                <p>NDRF: 1070, SDRF: 1000, Police: 100, Medical: 108</p>

                <h3>Rescue Camps Location:</h3>
                <p id="rescueCamps"></p>
            </div>
        </div>

    </div>
    <script>
        const alertsData = {
            earthquake: {
                title: "Earthquake Alert",
                level: "CATASTROPHIC",
                affectedStates: "Bhavani,Erode",
                rescueCamps: "Bhavani,Erode Fire service"
            },
            flood: {
                title: "Flood Alert",
                level: "SEVERE",
                affectedStates: "Perundurai,kangeyam",
                rescueCamps: "Perundurai,kangeyam Fire service"
            }
        };
        const modal = document.getElementById('alertModal');
        const closeModal = document.querySelector('.close');
        const alertTitle = document.getElementById('alertTitle');
        const alertLevel = document.getElementById('alertLevel');
        const affectedStates = document.getElementById('affectedStates');
        const rescueCamps = document.getElementById('rescueCamps');
        document.querySelectorAll('.alert-btn').forEach(alertBtn => {
            alertBtn.addEventListener('click', function () {
                const alertBox = this.closest('.alert-box');
                const alertType = alertBox.dataset.alert;
                const alertData = alertsData[alertType];
                alertTitle.innerText = alertData.title;
                alertLevel.innerText = alertData.level;
                alertLevel.className = `alert-level-box ${alertType}`;
                affectedStates.innerText = alertData.affectedStates;
                rescueCamps.innerText = alertData.rescueCamps;
                modal.style.display = "block";
            });
        });
        closeModal.onclick = function () {
            modal.style.display = "none";
        }
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
</body>
</html>
