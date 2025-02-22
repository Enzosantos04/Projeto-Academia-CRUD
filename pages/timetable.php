<?php
session_start();
include_once('../functions/functions.php');
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!-- Connection established -->';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym's Club</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <link rel="icon" href="../images/file (2).png">
    <script src="https://kit.fontawesome.com/af867aa7fa.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="header-content">
            <div class="img-header">
                <a href="../index.php"><img src="../images/file (2).png" alt="Logo" id="imglogo"></a>
            </div>
        </div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="../pages/about.php">About Us</a></li>
                    <li><a href="../pages/equipment.php">Equipment Section</a></li>
                    <li><a href="../pages/timetable.php">Timetable</a></li>
                    <li><a href="https://www.google.com/maps/dir//mindroom+maps/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x6b9103975a5f5c9f:0x98218c2e11a332d0?sa=X&ved=1t:3061&ictx=111"
                            target="_blank">Find a gym</a></li>
                    <li><a href="../pages/contact.php">Contact</a></li>
                    <div class="btn-position">
                        <?php if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'validated') : ?>
                        <div class="btns-logged-out">
                            <li id="btn-dash-test">
                                <a href=" ../pages/dashboard.php">Dashboard</a>
                            </li>
                            <li id="">
                                <form method="post" action="../pages/dashboard.php">
                                    <button type="submit" name="logout" class="logout-btn">Log Out</button>
                                </form>
                            </li>
                        </div>
                        <?php else : ?>
                        <li id="btn-login"><a href="../pages/login.php">Member Access</a></li>
                        <?php endif; ?>
                    </div>
                </ul>
            </nav>
        </div>
    </header>
    <section id="cta-image">
        <div class="text-cta">
            <h1>Our Timetable</h1>
        </div>
    </section>
    <div class="timetable">
        <h1>Gym's Club Timetable</h1>
        <table>
            <thead>
                <tr>
                    <th>Time</th>
                    <th>Monday</th>
                    <th>Tuesday</th>
                    <th>Wednesday</th>
                    <th>Thursday</th>
                    <th>Friday</th>
                    <th>Saturday</th>
                    <th>Sunday</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>6:00 - 7:00 AM</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                    <td>Strength Machines</td>
                    <td>Cardio</td>
                    <td>Conditioning</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                </tr>
                <tr>
                    <td>7:00 - 8:00 AM</td>
                    <td>Weights & Bars</td>
                    <td>Cardio</td>
                    <td>Conditioning</td>
                    <td>Strength Machines</td>
                    <td>Weights & Bars</td>
                    <td>Conditioning</td>
                    <td>Strength Machines</td>
                </tr>
                <tr>
                    <td>8:00 - 9:00 AM</td>
                    <td>Strength Machines</td>
                    <td>Conditioning</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                    <td>Cardio</td>
                    <td>Strength Machines</td>
                    <td>Conditioning</td>
                </tr>
                <tr>
                    <td>9:00 - 10:00 AM</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                    <td>Strength Machines</td>
                    <td>Cardio</td>
                    <td>Conditioning</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                </tr>
                <tr>
                    <td>10:00 - 11:00 AM</td>
                    <td>Weights & Bars</td>
                    <td>Cardio</td>
                    <td>Conditioning</td>
                    <td>Strength Machines</td>
                    <td>Weights & Bars</td>
                    <td>Conditioning</td>
                    <td>Strength Machines</td>
                </tr>
                <tr>
                    <td>11:00 - 12:00 PM</td>
                    <td>Strength Machines</td>
                    <td>Conditioning</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                    <td>Cardio</td>
                    <td>Strength Machines</td>
                    <td>Conditioning</td>
                </tr>
                <tr>
                    <td>12:00 - 1:00 PM</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                    <td>Strength Machines</td>
                    <td>Cardio</td>
                    <td>Conditioning</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                </tr>
                <tr>
                    <td>1:00 - 2:00 PM</td>
                    <td>Weights & Bars</td>
                    <td>Cardio</td>
                    <td>Conditioning</td>
                    <td>Strength Machines</td>
                    <td>Weights & Bars</td>
                    <td>Conditioning</td>
                    <td>Strength Machines</td>
                </tr>
                <tr>
                    <td>2:00 - 3:00 PM</td>
                    <td>Strength Machines</td>
                    <td>Conditioning</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                    <td>Cardio</td>
                    <td>Strength Machines</td>
                    <td>Conditioning</td>
                </tr>
                <tr>
                    <td>3:00 - 4:00 PM</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                    <td>Strength Machines</td>
                    <td>Cardio</td>
                    <td>Conditioning</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                </tr>
                <tr>
                    <td>4:00 - 5:00 PM</td>
                    <td>Weights & Bars</td>
                    <td>Cardio</td>
                    <td>Conditioning</td>
                    <td>Strength Machines</td>
                    <td>Weights & Bars</td>
                    <td>Conditioning</td>
                    <td>Strength Machines</td>
                </tr>
                <tr>
                    <td>5:00 - 6:00 PM</td>
                    <td>Strength Machines</td>
                    <td>Conditioning</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                    <td>Cardio</td>
                    <td>Strength Machines</td>
                    <td>Conditioning</td>
                </tr>
                <tr>
                    <td>6:00 - 7:00 PM</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                    <td>Strength Machines</td>
                    <td>Cardio</td>
                    <td>Conditioning</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                </tr>
                <tr>
                    <td>7:00 - 8:00 PM</td>
                    <td>Weights & Bars</td>
                    <td>Cardio</td>
                    <td>Conditioning</td>
                    <td>Strength Machines</td>
                    <td>Weights & Bars</td>
                    <td>Conditioning</td>
                    <td>Strength Machines</td>
                </tr>
                <tr>
                    <td>8:00 - 9:00 PM</td>
                    <td>Strength Machines</td>
                    <td>Conditioning</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                    <td>Cardio</td>
                    <td>Strength Machines</td>
                    <td>Conditioning</td>
                </tr>
                <tr>
                    <td>9:00 - 10:00 PM</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                    <td>Strength Machines</td>
                    <td>Cardio</td>
                    <td>Conditioning</td>
                    <td>Cardio</td>
                    <td>Weights & Bars</td>
                </tr>
            </tbody>
        </table>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h2>About Us</h2>
                <p>We are a modern gym offering the best equipment and facilities for all your fitness needs. Join us to
                    achieve your fitness goals!</p>
            </div>

            <div class="footer-section">
                <h2>Contact Us</h2>
                <p>123 Gym Street, Fitness City, Fit Country</p>
                <p>Email: contact@gym.com</p>
                <p>Phone: (123) 456-7890</p>
            </div>
            <div class="footer-section">
                <h2>Social Links</h2>
                <a href="#"><i class="fa-brands fa-instagram"> </i> </a>
                <a href="#"><i class="fa-brands fa-youtube"></i></a>
                <a href="#"><i class="fa-brands fa-facebook"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2024 Enzo Santos. All rights reserved.
        </div>

    </footer>
</body>

</html>