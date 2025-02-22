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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
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
                    <li><a href="https://www.google.com/maps/dir//mindroom+maps/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x6b9103975a5f5c9f:0x98218c2e11a332d0?sa=X&ved=1t:3061&ictx=111" target="_blank">Find a gym</a></li>
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
            <h1>Our Equipments</h1>
        </div>
    </section>
    <div class="equipments-container">
        <div class="equipments-section-title">
            <h1>Gym Structure</h1>
        </div>
        <div class="equipments-section-image">
            <div class="eq-img">
                <img src="../images/equpments.jpg" alt="Gym Equipment" id="eq-img">
                <div class="bottom-background">
                    <p>Welcome to our gym, where we offer a comprehensive range of top-of-the-line equipment to meet all
                        your fitness needs. Our facility is equipped with the latest machines and tools, designed to
                        provide you with a safe, effective, and enjoyable workout experience. <br><br>

                        <strong>Strength Training Machines:</strong> <br>
                        Our strength training area features a variety of resistance machines that target every muscle
                        group. These machines are designed to help you build muscle, increase strength, and improve
                        overall fitness. With adjustable weights and ergonomic designs, you can customize your workout
                        to suit your fitness level and goals. <br><br>

                        <strong>Cardio Equipment:</strong> <br>
                        Stay on top of your cardiovascular health with our selection of cardio machines, including
                        treadmills, stationary bikes, and elliptical trainers. Each piece of equipment is equipped with
                        advanced features to monitor your heart rate, calories burned, and other key metrics to keep you
                        motivated and on track. <br><br>

                        <strong>Free Weights:</strong> <br>
                        Our free weights section includes dumbbells, barbells, and kettlebells in various sizes and
                        weights. This area is perfect for those who prefer a more versatile and dynamic workout,
                        allowing for a wide range of exercises to enhance strength, flexibility, and balance. <br><br>

                        <strong>Functional Training:</strong> <br>
                        We offer a dedicated space for functional training, equipped with medicine balls, resistance
                        bands, and other tools to help you improve your functional strength and coordination. This area
                        is ideal for those looking to enhance their athletic performance or everyday physical
                        activities. <br><br>

                        <strong>Comfort and Safety:</strong> <br>
                        Our gym is designed with your comfort and safety in mind. The spacious layout, cushioned
                        flooring, and well-maintained equipment ensure a pleasant and secure workout environment. Our
                        knowledgeable staff is always available to assist you with proper equipment use and to provide
                        guidance on your fitness journey. <br><br>

                        Join us today and experience the best in fitness technology and equipment. Whether you're a
                        beginner or a seasoned athlete, our gym has everything you need to achieve your health and
                        fitness goals.
                    </p>
                </div>
            </div>
        </div>
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