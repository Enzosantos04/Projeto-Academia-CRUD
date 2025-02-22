<?php
session_start();
include_once('./functions/functions.php');
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
            <h1>Elevate Your Workout</h1>
        </div>
    </section>

    <div class="stats-container">
        <div class="stat-item">
            <h1>250,000+</h1>
            <p>Members choose to train with us</p>
        </div>
        <div class="stat-item">
            <h1>200+</h1>
            <p>Gyms located globally</p>
        </div>
        <div class="stat-item">
            <h1>1,250,000+</h1>
            <p>Workouts in our gyms each month</p>
        </div>
    </div>
    <br><br><br><br>
    <hr class="line">
    <div class="all">
        <div class="testtext">
            <div class="ball">
                <p>Why Gym's Club</p>
            </div>
        </div>
    </div>
    <div class="text-content">
        <h1>
            MAKE FITNESS YOUR <br>PRIORITY.</h1>
    </div>
    <div class="sub-text">
        <p>At Gym's Club, we understand that your lifestyle changes, that’s why we’ve made fitness straightforward and
            stress
            free. Join today on a no lock-in contract membership and start achieving your fitness goals. We value
            flexibility at Gym's Club, with unlimited 24/7 access, no hidden fees and over 200+ clubs globally for an
            affordable weekly price.</p>
    </div>

    <div class="main-content-boxes">
        <div class="boxes">
            <a href=""><img src="./images/gym.webp" alt="" class="img-all"></a>
            <div class="box-text">
                <h1>Our Gym facilities</h1>
            </div>
            <div class="text-below">
                <p>Empowering your fitness journey with state-of-the-art equipment, <br>expert trainers, and a community
                    that inspires greatness.</p>
            </div>
            <div class="btntext">
                <a href="">Learn more</a>
            </div>
        </div>

        <div class="boxes">
            <a href=""><img src="./images/training.webp" alt="" class="img-all"></a>
            <div class="box-text">
                <h1>Our Personal Training</h1>
            </div>
            <div class="text-below">
                <p>Transforming your fitness goals into reality with personalized training,<br> expert guidance, and
                    unwavering support.</p>
            </div>
            <div class="btntext">
                <a href="">Learn more</a>
            </div>
        </div>
        <div class="boxes">
            <a href=""><img src="./images/medball.webp" alt="" class="img-all"></a>
            <div class="box-text">
                <h1>Our Timetable</h1>
            </div>
            <div class="text-below">
                <p>Flexibility for your fitness: discover our comprehensive timetable <br>with classes and sessions to
                    fit
                    every schedule.</p>
            </div>
            <div class="btntext">
                <a href="">Learn more</a>
            </div>
        </div>
    </div>

    <div class="secondary-content">
        <div class="sec-boxes">
            <div class="sec-box-text">
                <h1>Feel Supported With Gym's Club</h1>
            </div>
            <div class="sec-box-text2">
                At Gym's Club, we are dedicated to fostering a welcoming and inclusive environment where everyone
                can
                achieve their fitness goals. Our state-of-the-art facilities, expert trainers, and diverse classes
                are
                designed to support you every step of the way on your fitness journey. Join us to experience a
                community
                that inspires and motivates you to be your best self.
            </div>
            <div class="sec-box-btn"><a href="">Learn more</a></div>
        </div>
        <div class="sec-boxes2">
            <img src="images/box2.jpg" alt="" id="imgbox2">
        </div>
    </div>


    <div class="personal-banner">
        <a href=""><img src="./images/banner2.webp" alt="" id="banner-personal"></a>
    </div>

    <div class="motivation-title">
        <h1>Fitness Motivation</h1>
    </div>


    <div class="motivation-cards">
        <div class="cards">
            <img src="./images/food1.webp" alt="" class="food-img">
            <div class="text-cards-title">
                <h3>Easy Pumpkin Protein Muffins</h3>
            </div>
            <div class="food-text">
                <p> Perfectly spiced and packed with protein,<br> these pumpkin muffins are great for a<br> quick
                    and
                    healthy snack.</p>
            </div>
        </div>
        <div class="cards">
            <img src="./images/food2.webp" alt="" class="food-img">
            <div class="text-cards-title">
                <h3>Nutritious Avocado and Nut Mix</h3>
            </div>
            <div class="food-text">
                <p>A nutritious blend of healthy fats<br> and proteins, ideal for a balanced<br> and sustained
                    energy
                    boost.</p>
            </div>
        </div>
        <div class="cards">
            <img src="./images/food3.webp" alt="" class="food-img">
            <div class="text-cards-title">
                <h3>Healthy Feast with Friends</h3>
            </div>
            <div class="food-text">
                <p>Enjoy healthy eating with friends,<br> making every meal a delightful<br> and nutritious
                    experience.
                </p>
            </div>
        </div>
        <div class="cards">
            <img src="./images/food4.webp" alt="" class="food-img">
            <div class="text-cards-title">
                <h3>Blueberry Protein Yogurt Bowl</h3>
            </div>
            <div class="food-text">
                <p>Start your day with creamy yogurt<br> and fresh blueberries, rich in<br> antioxidants and
                    protein.
                </p>
            </div>
        </div>
        <div class="cards">
            <img src="./images/food5.webp" alt="" class="food-img">
            <div class="text-cards-title">
                <h3>Berry Delight Yogurt</h3>
            </div>
            <div class="food-text">
                <p> Savor the refreshing mix of yogurt<br> and berries, a perfect balance<br> of sweetness and
                    nutrition.</p>
            </div>
        </div>
        <div class="cards">
            <img src="./images/food6.webp" alt="" class="food-img">
            <div class="text-cards-title">
                <h3>Fresh Veggie and Nut Medley
                </h3>
            </div>
            <div class="food-text">
                <p>Keep your meals vibrant and healthy<br> with a variety of fresh veggies<br> and nutritious nuts.
                </p>
            </div>
        </div>
        <div class="cards">
            <img src="./images/food7.webp" alt="" class="food-img">
            <div class="text-cards-title">
                <h3>Avocado Tomato Toast</h3>
            </div>
            <div class="food-text">
                <p>Elevate your toast with creamy<br> avocado and tomatoes, a simple<br> yet nutrient-rich meal.</p>
            </div>
        </div>
        <div class="cards">
            <img src="./images/food8.webp" alt="" class="food-img">
            <div class="text-cards-title">
                <h3>Raspberry Yogurt Parfait</h3>
            </div>
            <div class="food-text">
                <p>Delight in the combination of<br> yogurt and raspberries, a refreshing<br> and protein-rich
                    snack.
                </p>
            </div>
        </div>
    </div>


    <div class="find-sale">
        <div class="find-gym">
            <a href="https://www.google.com/maps/dir//mindroom+maps/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x6b9103975a5f5c9f:0x98218c2e11a332d0?sa=X&ved=1t:3061&ictx=111" target="_blank"><button>
                    Find a Gym </button></a>
        </div>
        <div class="sales-gym">
            <a href=""><button> Flash Sales </button></a>
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