<?php
session_start();

include_once('../functions/functions.php');
$dbConnect = dbLink();
if ($dbConnect) {
    echo '<!-- Connection established -->';
}

// Verifique se a sessão é válida antes de permitir acesso à página
if (!isset($_SESSION['validate']) || $_SESSION['validate'] !== 'validated') {
    header('Location: ../pages/login.php');
    exit();
}
if ($_SESSION['position'] !== 'admin' && $_SESSION['position'] !== 'staff') {
    header("location: dashboard.php");
    exit();
}
// Processa o formulário de atualização
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_workout'])) {
    $workout_id = $_POST['workout_id'];
    $new_exercise = $_POST['exercise'];
    $new_equipment = $_POST['equipment'];
    $new_sets = $_POST['sets'];
    $new_reps = $_POST['reps'];

    updateWorkout($dbConnect, $workout_id, $new_exercise, $new_equipment, $new_sets, $new_reps);
    header("Location: dashboard.php");
    exit();
}
// Obtém o ID do exercício a partir do POST
if (isset($_POST['workout_id'])) {
    $workout_id = $_POST['workout_id'];

    // Obtém os dados do exercício
    $sql = "SELECT * FROM workout WHERE id = :workout_id";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bindParam(':workout_id', $workout_id);
    $stmt->execute();
    $workout = $stmt->fetch(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gym's Club Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap" rel="stylesheet">
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
                        <li>
                            <form method="POST" action="">
                                <button type="submit" name="logout" id="btn-logout" style="color: green; background-color: #c4161c;   padding: 10px; border-radius: 5px; color: white; text-decoration: none; text-transform:uppercase">Log
                                    Out</button>
                            </form>
                        </li>
                    </div>
                </ul>
            </nav>
        </div>
    </header>

    <body>
        <div class="form-Option">
            <h3>Edit Workout</h3>
            <form method="POST" action="">
                <input type="text" name="exercise" value="<?php echo htmlspecialchars($workout['exercise']); ?>" required>
                <input type="text" name="equipment" value="<?php echo htmlspecialchars($workout['equipment']); ?>" required>
                <input type="text" name="sets" value="<?php echo htmlspecialchars($workout['sets']); ?>" required>
                <input type="text" name="reps" value="<?php echo htmlspecialchars($workout['reps']); ?>" required>
                <input type="hidden" name="workout_id" value="<?php echo htmlspecialchars($workout['id']); ?>">
                <button type="submit" name="update_workout">Update</button>
            </form>
            </form>
        </div>
    </body>

</html>