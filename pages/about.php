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
            <h1>Our Mission</h1>
        </div>
    </section>
    <div class="about-container">
        <div class="about-section-title">
            <h1>Who We Are</h1>
        </div>
        <div class="about-section-text">
            <p>Gym's Club was founded with the belief that everyone deserves access to high-quality fitness resources
                and unwavering support. We understand that embarking on a fitness journey can be challenging, and that's
                why our mission is to provide an inclusive, motivating environment where individuals of all fitness
                levels can thrive. <br><br>

                Our team of certified professionals is passionate about helping you achieve your personal fitness goals,
                whether that's losing weight, building muscle, improving your endurance, or simply feeling better in
                your day-to-day life. With years of experience and a deep commitment to fitness, our trainers are
                equipped with the knowledge and skills to guide you through every step of your journey. <br><br>

                At Gym's Club, we offer a variety of training programs tailored to meet your unique needs. Whether you
                prefer one-on-one personal training sessions, engaging group classes, or a self-guided workout, we have
                the right program for you. Our trainers take the time to understand your goals and create customized
                plans that challenge and inspire you. <br><br>

                In addition to our training programs, we believe in fostering a supportive community where members can
                connect, share their experiences, and motivate each other. Our gym is more than just a place to work
                out; it's a space where friendships are formed, achievements are celebrated, and everyone feels like
                they belong. <br><br>

                We also provide a range of wellness services to complement your fitness routine, including nutritional
                counseling, wellness workshops, and recovery programs. Our holistic approach ensures that you're not
                only building physical strength but also nurturing your overall well-being. <br><br>

                State-of-the-art equipment, modern facilities, and a welcoming atmosphere make Gym's Club the perfect
                place to pursue your fitness journey. Whether you're just starting out or looking to elevate your
                training to the next level, our dedicated team is here to support you every step of the way. <br><br>

                Join us at Gym's Club and experience a fitness community like no other. Together, we'll achieve your
                goals, surpass your limits, and create a healthier, happier you.
            </p>
        </div>
    </div>
    <br>
    <br>
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