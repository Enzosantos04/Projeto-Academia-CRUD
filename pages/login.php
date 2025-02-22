<?php
session_start();
include_once('../functions/functions.php');
$dbConnect = dbLink();

if ($dbConnect) {
    echo '<!-- Connection established -->';
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $position = $_POST['position'];

    // Define associative array to map the tables
    $tableMap = [
        'admin' => 'admin',
        'staff' => 'staff',
        'member' => 'members'
    ];

    // Verify if the position exists in the table
    if (array_key_exists($position, $tableMap)) {
        // Automatic query
        $table = $tableMap[$position];
        $query = "SELECT name, password FROM $table WHERE name = ?";

        // Prepare to execute the query 
        $stmt = $dbConnect->prepare($query);
        $stmt->execute([$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Verify the results of the query 
        if ($result && password_verify($password, $result['password'])) {
            $_SESSION['validate'] = 'validated';
            $_SESSION['position'] = $position;
            header('Location: dashboard.php');
            exit();
        } else {
            echo 'Username or password are incorrect, try it again!';
        }
    } else {
        echo 'Invalid position selected.';
    }
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
                <a href="../index.php"><img src="../images/file (2).png" alt="" id="imglogo"></a>
            </div>
        </div>
        <div class="navbar">
            <nav>
                <ul>
                    <li><a href="../pages/about.php">About Us</a></li>
                    <li><a href="../pages/equipment.php">Equipment Section</a></li>
                    <li><a href="../pages/timetable.php">Timetable</a></li>
                    <li><a href="https://www.google.com/maps/dir//mindroom+maps/data=!4m6!4m5!1m1!4e2!1m2!1m1!1s0x6b9103975a5f5c9f:0x98218c2e11a332d0?sa=X&ved=1t:3061&ictx=111" target="_blank">Find a gym</a></li>
                    <li><a href="../pages/contact.php">contact</a></li>
                    <div class="btn-position">
                        <li id="btn-login"> <a href="../pages/login.php">Member Access</a></li>
                    </div>
                </ul>
            </nav>
        </div>
    </header>
    <div class="form-container-login">
        <h2>Login</h2>
        <form method="post" action="login.php">
            <div class="form-group-login">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group-login">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group-login">
                <label for="position">Position</label>
                <select id="position" name="position" required>
                    <option value="" disabled selected hidden>Select a position</option>
                    <option value="staff">Staff</option>
                    <option value="admin">Admin</option>
                    <option value="member">Member</option>
                </select>
            </div>
            <button type="submit" class="btn-login">Login</button>
        </form>
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