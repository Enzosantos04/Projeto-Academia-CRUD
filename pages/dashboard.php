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

// Verifique se o método de requisição é POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifique se o usuário é admin e se o botão 'insert_member' foi pressionado
    if ($_SESSION['position'] === 'admin' && isset($_POST['insert_member'])) {
        $name = $_POST['name']; // Obtém o nome do novo membro do formulário
        $password = $_POST['password']; // Obtém a senha do novo membro do formulário
        insertMember($dbConnect, $name, $password); // Chama a função para inserir um novo membro
    }
    // Verifique se o usuário é admin e se o botão 'insert_staff' foi pressionado
    if ($_SESSION['position'] === 'admin' && isset($_POST['insert_staff'])) {
        $name = $_POST['name']; // Obtém o nome do novo membro do formulário
        $password = $_POST['password']; // Obtém a senha do novo membro do formulário
        insertStaff($dbConnect, $name, $password); // Chama a função para inserir um novo membro
    }


    // Verifique se o usuário é admin e se o botão 'delete_member' foi pressionado
    if ($_SESSION['position'] === 'admin' && isset($_POST['delete_member'])) {
        $member_id = $_POST['member_id']; // Obtém o ID do membro a ser deletado do formulário
        deleteMember($dbConnect, $member_id); // Chama a função para deletar um membro
    }
    // Verifique se o usuário é admin e se o botão 'delete_staff' foi pressionado
    if ($_SESSION['position'] === 'admin' && isset($_POST['delete_staff'])) {
        $staff_id = $_POST['staff_id']; // Obtém o ID do staff a ser deletado do formulário
        deleteStaff($dbConnect, $staff_id); // Chama a função para deletar um staff
    }

    // Verifique se o usuário é admin e se o botão 'insert_class' foi pressionado
    if ($_SESSION['position'] === 'admin' && isset($_POST['insert_class'])) {
        $class_name = $_POST['class_name']; // Obtém o nome da nova classe do formulário
        insertClass($dbConnect, $class_name); // Chama a função para inserir uma nova classe
    }
    // Verifique se o usuário é staff e se o botão 'insert_class' foi pressionado
    if ($_SESSION['position'] === 'staff' && isset($_POST['insert_class'])) {
        $class_name = $_POST['class_name']; // Obtém o nome da nova classe do formulário
        insertClass($dbConnect, $class_name); // Chama a função para inserir uma nova classe
    }

    // Verifique se o usuário é admin e se o botão 'delete_class' foi pressionado
    if ($_SESSION['position'] === 'admin' && isset($_POST['delete_class'])) {
        $class_id = $_POST['class_id']; // Obtém o ID da classe a ser deletada do formulário
        deleteClass($dbConnect, $class_id); // Chama a função para deletar uma classe
    }
    // Verifique se o usuário é staff e se o botão 'delete_class' foi pressionado
    if ($_SESSION['position'] === 'staff' && isset($_POST['delete_class'])) {
        $class_id = $_POST['class_id']; // Obtém o ID da classe a ser deletada do formulário
        deleteClass($dbConnect, $class_id); // Chama a função para deletar uma classe
    }

    // Verifique se o usuário é admin ou staff e se o botão 'link_member_to_class' foi pressionado
    if (($_SESSION['position'] === 'admin' || $_SESSION['position'] === 'staff') && isset($_POST['link_member_to_class'])) {
        $member_id = $_POST['member_id']; // Obtém o ID do membro do formulário
        $class_id = $_POST['class_id']; // Obtém o ID da classe do formulário
        linkMemberToClass($dbConnect, $member_id, $class_id); // Chama a função para vincular um membro a uma classe
    }

    // Verifique se o usuário é admin ou staff e se o botão 'insert_routine' foi pressionado
    if (($_SESSION['position'] === 'admin' || $_SESSION['position'] === 'staff') && isset($_POST['insert_routine'])) {
        $routine_name = $_POST['routine_name']; // Obtém o nome da nova classe do formulário
        insertRoutine($dbConnect, $routine_name); // Chama a função para inserir uma nova classe
    }
    // Verifique se o usuário é admin ou staff e se o botão 'delete_routine' foi pressionado
    if (($_SESSION['position'] === 'admin' || $_SESSION['position'] === 'staff') && isset($_POST['delete_routine'])) {
        $routine_id = $_POST['routine_id']; // Obtém o ID da classe a ser deletada do formulário
        deleteRoutine($dbConnect, $routine_id); // Chama a função para deletar uma classe
    }
    // Verifique se o usuário é admin ou staff e se o botão 'link_member_to_routine' foi pressionado
    if (($_SESSION['position'] === 'admin' || $_SESSION['position'] === 'staff') && isset($_POST['link_member_to_routine'])) {
        $member_id = $_POST['member_id']; // Obtém o ID do membro do formulário
        $routine_id = $_POST['routine_id']; // Obtém o ID da classe do formulário
        linkMemberToRoutine($dbConnect, $member_id, $routine_id); // Chama a função para vincular um membro a uma classe
    }
    // verifique se o usuario é admin ou staff e se o botao 'update_member' foi pressionado
    if ($_SESSION['position'] === 'admin' && isset($_POST['update_member'])) {
        $member_id = $_POST['member_id']; // Obtém o ID do membro do formulário
        $new_name = $_POST['new_name']; // Obtém o novo nome do membro do formulário
        updateMember($dbConnect, $member_id, $new_name); // Chama a função para atualizar o nome do membro

    }
    // verifique se o usuario é admin ou staff e se o botao 'update_staff' foi pressionado
    if ($_SESSION['position'] === 'admin' && isset($_POST['update_staff'])) {
        $staff_id = $_POST['staff_id']; // Obtém o ID do staff do formulário
        $new_staff = $_POST['new_staff']; // Obtém o novo nome do staff do formulário
        updateStaff($dbConnect, $staff_id, $new_staff); // Chama a função para atualizar o nome do staff
    }
    //verifique se o usuario é admin e se o botao 'update_password_member' foi pressionado
    if ($_SESSION['position'] === 'admin' && isset($_POST['update_password_member'])) {
        $member_id = $_POST['member_id']; // Obtém o ID do membro do formulário
        $new_pass = $_POST['new_pass']; // Obtém o nova senha do membro do formulário
        updateMemberPassword($dbConnect, $member_id, $new_pass); // Chama a função para atualizar a senha do membro
    }
    //verifique se o usuario é admin e se o botao 'update_password_staff' foi pressionado
    if ($_SESSION['position'] === 'admin' && isset($_POST['update_password_staff'])) {
        $staff_id = $_POST['staff_id']; // Obtém o ID do staff do formulário
        $new_pass_staff = $_POST['new_pass_staff']; // Obtém o nova senha do staff do formulário
        updateStaffPassword($dbConnect, $staff_id, $new_pass_staff); // Chama a função para atualizar a senha do staff
    }
    //verifique se o usuario é admin ou staff e se o botao 'update_class' foi pressionado
    if (($_SESSION['position'] === 'admin' || $_SESSION['position'] === 'staff') && isset($_POST['update_class'])) {
        $class_id = $_POST['class_id']; // Obtém o ID da classe do formulário
        $new_class = $_POST['new_class']; // Obtém nova classe do formulário
        updateClass($dbConnect, $class_id, $new_class); // Chama a função para atualizar a classe
    }
    //verifique se o usuario é admin ou staff e se o botao 'update_routine' foi pressionado
    if (($_SESSION['position'] === 'admin' || $_SESSION['position'] === 'staff') && isset($_POST['update_routine'])) {
        $routine_id = $_POST['routine_id']; // Obtém o ID da routine do formulário
        $new_routine = $_POST['new_routine']; // Obtém nova routine do formulário
        updateRoutine($dbConnect, $routine_id, $new_routine); // Chama a função para atualizar a routine
    }
    //verifique se o usuario é admin ou staff e se o botao 'insert_workout' foi pressionado
    if (($_SESSION['position'] === 'admin' || $_SESSION['position'] === 'staff') && isset($_POST['insert_workout'])) {
        $exercise = $_POST['exercise']; // Obtém o valor do exercício do formulário
        $equipment = $_POST['equipment']; // Obtém o valor do equipamento do formulário
        $sets = $_POST['sets']; // Obtém o valor das séries do formulário
        $reps = $_POST['reps']; // Obtém o valor das repetições do formulário
        insertWorkout($dbConnect, $exercise, $equipment, $sets, $reps); // Chama a função para inserir uma nova workout
    }
    // Verifique se o usuário é admin ou staff e se o botão 'delete_workout' foi pressionado
    if (($_SESSION['position'] === 'admin' || $_SESSION['position'] === 'staff') && isset($_POST['delete_workout'])) {
        $workout_id = $_POST['workout_id']; // Obtém o ID da workout a ser deletada do formulário
        deleteWorkout($dbConnect, $workout_id); // Chama a função para deletar um workout
    }
    // Verifique se o usuário é admin ou staff e se o botão 'link_member_to_workout' foi pressionado
    if (($_SESSION['position'] === 'admin' || $_SESSION['position'] === 'staff') && isset($_POST['link_member_to_workout'])) {
        $member_id = $_POST['member_id'];
        $workout_id = $_POST['workout_id'];
    }
}

$classes = fetchClasses($dbConnect); // Obtém a lista de classes do banco de dados
$members = fetchMembers($dbConnect); // Obtém a lista de membros do banco de dados
$memberClasses = fetchClasses($dbConnect); // Obtem a lista de classes do banco de dados
$staffs = fetchStaff($dbConnect); // Obtem a lista de staffs do banco de dados 
$routines = fetchRoutines($dbConnect); // Obtem a lista de staffs do banco de dados
$memberRoutines = fetchRoutines($dbConnect); // obtem a lista de routines do banco de dados 
$workouts = fetchWorkout($dbConnect);


if ($_SESSION['position'] === 'member' && isset($_SESSION['member_id'])) {
    $member_id = $_SESSION['member_id'];
    $memberWorkouts = fetchMemberWorkout($dbConnect, $member_id);
    $memberClasses = fetchMemberClasses($dbConnect, $member_id);
    $memberRoutines = fetchMemberRoutine($dbConnect, $member_id);
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
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap"
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
                        <li>
                            <form method="POST" action="">
                                <button type="submit" name="logout" id="btn-logout"
                                    style="color: green; background-color: #c4161c;   padding: 10px; border-radius: 5px; color: white; text-decoration: none; text-transform:uppercase">Log
                                    Out</button>
                            </form>
                        </li>
                    </div>
                </ul>
            </nav>
        </div>
    </header>

    <div class="dashboard-content">
        <?php
        if (isset($_SESSION['validate']) && $_SESSION['validate'] == 'validated') {
            switch ($_SESSION['position']) {
                case 'admin':
                    echo '<div class="form-Option">
                    <h2>Administrator</h2>
                    <h2>New Member</h2>
                    <form action="" method="POST">
                        <input type="text" name="name" placeholder="Member Name" required>
                        <input type="password" name="password" placeholder="Member Password" required>
                        <button type="submit" name="insert_member">Add Member</button>
                    </form>
                    <h3>Existing Members</h3>
                    <div class="member-list">
                        <ul>';
                    foreach ($members as $member) {
                        echo '<li>' . htmlspecialchars($member['name']) . ' 
                        <form method="POST" action="">
                            <input type="hidden" name="member_id" value="' . $member['id'] . '">
                            <input type="text" name="new_name" placeholder="New Member">
                            <input type="password" name="new_pass" placeholder="New Password">
                            <button type="submit" name="update_member">Update member</button>
                            <button type="submit" name="update_password_member">Update password</button>
                            <button type="submit" name="delete_member">Delete</button>
                        </form></li>';
                    }
                    echo '  </ul>
                    </div>';

                    echo '';
                    //staff adding and showing
                    echo '<h2>New Staff</h2>
                    <form action="" method="POST">
                        <input type="text" name="name" placeholder="Staff Name" required>
                        <input type="password" name="password" placeholder="Staff Password" required>
                        <button type="submit" name="insert_staff">Add Staff</button>
                        <h3>Existing Staff</h3>
                    </form>
                    <div class="staff-list">
                        <ul>';
                    foreach ($staffs as $staff) {
                        echo '<li>' . htmlspecialchars($staff['name']) . ' 
                        <form method="POST" action="">
                            <input type="hidden" name="staff_id" value="' . $staff['id'] . '">
                            <input type="text" name="new_staff" placeholder="New Staff">
                            <input type="password" name="new_pass_staff" placeholder="New Password">
                            <button type="submit" name="update_staff">Update Staff</button>
                            <button type="submit" name="update_password_staff">Update password</button>
                            <button type="submit" name="delete_staff">Delete Staff</button>
                        </form></li>';
                    }
                    echo '  </ul>
                    </div>';
                    echo '';
                    echo '<h3>Add New Class</h3>
                    <form action="" method="POST">
                        <input type="text" name="class_name" placeholder="Class Name" required>
                        <button type="submit" name="insert_class">Add Class</button>
                    </form>';

                    echo '<h3>Existing Classes</h3>
                    <div class="class-list">
                    <ul>';
                    foreach ($classes as $class) {
                        echo '<li>' . htmlspecialchars($class['name']) . ' 
                        <form method="POST" action="">
                            <input type="hidden" name="class_id" value="' . $class['id'] . '">
                            <input type="text" name="new_class" placeholder="New Class">
                            <button type="submit" name="update_class">Update Class</button>
                            <button type="submit" name="delete_class">Delete Class</button>
                        </form>
                    </li>';
                    }
                    echo '</ul>
                          </div>
                          
                       <h3>Link Member to Class</h3>
                        <form action="" method="POST">
                            <select name="member_id">
                                <option value="">Select a Member</option>';
                    foreach ($members as $member) {
                        echo '<option value="' . $member['id'] . '">' . htmlspecialchars($member['name']) . '</option>';
                    }
                    echo '</select>
                            <select name="class_id">
                                <option value="">Select a Class</option>';
                    foreach ($classes as $class) {
                        echo '<option value="' . $class['id'] . '">' . htmlspecialchars($class['name']) . '</option>';
                    }
                    echo '</select>
                            <button type="submit" name="link_member_to_class">Link Member to Class</button>
                        </form>
                        
                      </select>';
                    //routines
                    echo '<h3>Add New Routine</h3>
                        <form action="" method="POST">
                            <input type="text" name="routine_name" placeholder="Routine Name" required>
                            <button type="submit" name="insert_routine">Add Routine</button>
                        </form>';
                    echo '</ul>
                    <h3>Existing Routines</h3>
                    <div class="routines-list">
                        <ul>';

                    //routines
                    foreach ($routines as $routine) {
                        echo '<li>' . htmlspecialchars($routine['name']) . ' 
                        <form method="POST" action="">
                            <input type="hidden" name="routine_id" value="' . $routine['id'] . '">
                            <input type="text" name="new_routine" placeholder="New Routine">
                            <button type="submit" name="update_routine">Update Routine</button>
                            <button type="submit" name="delete_routine">Delete Routine</button>
                        </form></li>';
                    }
                    echo '</ul>
                    </div>';

                    // Formulário para adicionar novas rotinas


                    // linking member to routine
                    echo '</ul>
                        <h3>Link Member to Routine</h3>
                        <form action="" method="POST">
                            <select name="member_id">
                                <option value="">Select a Member</option>';
                    foreach ($members as $member) {
                        echo '<option value="' . $member['id'] . '">' . htmlspecialchars($member['name']) . '</option>';
                    }
                    echo '</select>
                            <select name="routine_id">
                                <option value="">Select a Routine</option>';
                    foreach ($routines as $routine) {
                        echo '<option value="' . $routine['id'] . '">' . htmlspecialchars($routine['name']) . '</option>';
                    }
                    echo '</select>
                            <button type="submit" name="link_member_to_routine">Link Member to Routine</button>
                        </form>
                        
                      </select>';
                    echo '<h3>Add New Workout</h3>
                      <form action="" method="POST">
                          <input type="text" name="exercise" placeholder="Exercise" required>
                          <input type="text" name="equipment" placeholder="Equipment" required>
                          <input type="text" name="sets" placeholder="Sets" required>
                          <input type="text" name="reps" placeholder="Reps" required>
                          <button type="submit" name="insert_workout">Add Workout</button>
                      </form>';

                    echo '<h3>Existing Workout</h3>';
                    echo '<div class="workout-list">';
                    echo '<table id="tableW">';
                    echo '<tr>';
                    echo '<th>Exercise</th>';
                    echo '<th>Equipment</th>';
                    echo '<th>Sets</th>';
                    echo '<th>Reps</th>';
                    echo '<th>Action</th>'; // Coluna para ações
                    echo '</tr>';

                    foreach ($workouts as $workout) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($workout['exercise']) . '</td>';
                        echo '<td>' . htmlspecialchars($workout['equipment']) . '</td>';
                        echo '<td>' . htmlspecialchars($workout['sets']) . '</td>';
                        echo '<td>' . htmlspecialchars($workout['reps']) . '</td>';
                        echo '<td>';

                        // Botão de edição que faz uma requisição POST para a página de edição
                        echo '<form method="POST" action="edit_workout.php" style="display:inline;">';
                        echo '<input type="hidden" name="workout_id" value="' . htmlspecialchars($workout['id']) . '">';
                        echo '<button type="submit" name="edit_workout">Edit</button>';
                        echo '</form>';

                        // Formulário para exclusão
                        echo '<form method="POST" style="display:inline;">';
                        echo '<input type="hidden" name="workout_id" value="' . htmlspecialchars($workout['id']) . '">';
                        echo '<button type="submit" name="delete_workout" value="delete">Delete</button>';
                        echo '</form>';

                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</table>';
                    echo '</div>';

                    // linking workout
                    echo '</ul>
                    <h3>Link Member to Workout</h3>
                    <form action="" method="POST">
                        <select name="member_id">
                            <option value="">Select a Member</option>';
                    foreach ($members as $member) {
                        echo '<option value="' . $member['id'] . '">' . htmlspecialchars($member['name']) . '</option>';
                    }
                    echo '</select>
                        <select name="workout_id">
                            <option value="">Select a Workout</option>';
                    foreach ($workouts as $workout) {
                        echo '<option value="' . $workout['id'] . '">' . 'Exercise: ' . htmlspecialchars($workout['exercise']) . ' ' . 'Equipment: ' . htmlspecialchars($workout['equipment']) . ' ' . 'Sets: ' . ' ' . ' ' . htmlspecialchars($workout['sets']) . ' ' . 'Reps: ' . htmlspecialchars($workout['reps']) . '</option>';
                    }
                    echo '</select>
                        <button type="submit" name="link_member_to_workout">Link Member to Workout</button>
                    </form>
                    
                  </select> </div>';
                    break;

                case 'staff':
                    echo '<div class="form-Option">
                    <h2>Staff</h2>
                    <form action="" method="POST">
                        <input type="text" name="class_name" placeholder="Class Name" required>
                        <button type="submit" name="insert_class">Add Class</button>
                    </form>
                    <h3>Existing Members</h3>
                    <div class="member-list">
                    <ul>';

                    foreach ($members as $member) {
                        echo '<li>' . htmlspecialchars($member['name']) . ' 
                        <form method="POST" action="">
                            <input type="hidden" name="member_id" value="' . $member['id'] . '">
                        </form>
                      </li>';
                    }
                    echo '</div>';
                    echo '</ul> 
                    <h3>Existing Classes</h3>
                    <div class="class-list">
                    <ul>';

                    foreach ($classes as $class) {
                        echo '<li>' . htmlspecialchars($class['name']) . ' 
                        <form method="POST" action="">
                            <input type="hidden" name="class_id" value="' . $class['id'] . '">
                            <input type="text" name="new_class" placeholder="New Class">
                            <button type="submit" name="update_class">Update Class</button>
                            <button type="submit" name="delete_class">Delete</button>
                        </form>
                      </li>';
                    }
                    echo '</div>';
                    echo '</ul>
                    <h3>Link Member to Class</h3>
                    <form action="" method="POST">
                        <select name="member_id">
                            <option value="">Select a Member</option>';

                    foreach ($members as $member) {
                        echo '<option value="' . $member['id'] . '">' . htmlspecialchars($member['name']) . '</option>';
                    }

                    echo '</select>
                        <select name="class_id">
                            <option value="">Select a Class</option>';

                    foreach ($classes as $class) {
                        echo '<option value="' . $class['id'] . '">' . htmlspecialchars($class['name']) . '</option>';
                    }

                    echo '</select>
                        <button type="submit" name="link_member_to_class">Link Member to Class</button>
                    </form>
                    
                   
                    <ul>';



                    echo '<h3>Add New Routine</h3>
                    <form action="" method="POST">
                        <input type="text" name="routine_name" placeholder="Routine Name" required>
                        <button type="submit" name="insert_routine">Add Routine</button>
                    </form>';
                    echo '</ul>
                <h3>Existing Routines</h3>
                <div class="routines-list">
                    <ul>';

                    //routines
                    foreach ($routines as $routine) {
                        echo '<li>' . htmlspecialchars($routine['name']) . ' 
                    <form method="POST" action="">
                        <input type="hidden" name="routine_id" value="' . $routine['id'] . '">
                        <input type="text" name="new_routine" placeholder="New Routine">
                        <button type="submit" name="update_routine">Update Routine</button>
                        <button type="submit" name="delete_routine">Delete Routine</button>
                    </form></li>';
                    }
                    echo '</ul>
                </div>';

                    // Formulário para adicionar novas rotinas


                    // linking member to routine
                    echo '</ul>
                    <h3>Link Member to Routine</h3>
                    <form action="" method="POST">
                        <select name="member_id">
                            <option value="">Select a Member</option>';
                    foreach ($members as $member) {
                        echo '<option value="' . $member['id'] . '">' . htmlspecialchars($member['name']) . '</option>';
                    }
                    echo '</select>
                        <select name="routine_id">
                            <option value="">Select a Routine</option>';
                    foreach ($routines as $routine) {
                        echo '<option value="' . $routine['id'] . '">' . htmlspecialchars($routine['name']) . '</option>';
                    }
                    echo '</select>
                        <button type="submit" name="link_member_to_routine">Link Member to Routine</button>
                    </form>
                    
                  </select>';

                    // WORKOUT SECTION
                    echo '<h3>Add New Workout</h3>
                    <form action="" method="POST">
                        <input type="text" name="exercise" placeholder="Exercise" required>
                        <input type="text" name="equipment" placeholder="Equipment" required>
                        <input type="text" name="sets" placeholder="Sets" required>
                        <input type="text" name="reps" placeholder="Reps" required>
                        <button type="submit" name="insert_workout">Add Workout</button>
                    </form>';

                    echo '<h3>Existing Workout</h3>';
                    echo '<div class="workout-list">';
                    echo '<table id="tableW">';
                    echo '<tr>';
                    echo '<th>Exercise</th>';
                    echo '<th>Equipment</th>';
                    echo '<th>Sets</th>';
                    echo '<th>Reps</th>';
                    echo '<th>Action</th>'; // Coluna para ações
                    echo '</tr>';

                    foreach ($workouts as $workout) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($workout['exercise']) . '</td>';
                        echo '<td>' . htmlspecialchars($workout['equipment']) . '</td>';
                        echo '<td>' . htmlspecialchars($workout['sets']) . '</td>';
                        echo '<td>' . htmlspecialchars($workout['reps']) . '</td>';
                        echo '<td>';

                        // Botão de edição que faz uma requisição POST para a página de edição
                        echo '<form method="POST" action="edit_workout.php" style="display:inline;">';
                        echo '<input type="hidden" name="workout_id" value="' . htmlspecialchars($workout['id']) . '">';
                        echo '<button type="submit" name="edit_workout">Edit</button>';
                        echo '</form>';

                        // Formulário para exclusão
                        echo '<form method="POST" style="display:inline;">';
                        echo '<input type="hidden" name="workout_id" value="' . htmlspecialchars($workout['id']) . '">';
                        echo '<button type="submit" name="delete_workout" value="delete">Delete</button>';
                        echo '</form>';

                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</table>';
                    echo '</div>';
                     // linking workout
                     echo '</ul>
                     <h3>Link Member to Workout</h3>
                     <form action="" method="POST">
                         <select name="member_id">
                             <option value="">Select a Member</option>';
                     foreach ($members as $member) {
                         echo '<option value="' . $member['id'] . '">' . htmlspecialchars($member['name']) . '</option>';
                     }
                     echo '</select>
                         <select name="workout_id">
                             <option value="">Select a Workout</option>';
                     foreach ($workouts as $workout) {
                         echo '<option value="' . $workout['id'] . '">' . 'Exercise: ' . htmlspecialchars($workout['exercise']) . ' ' . 'Equipment: ' . htmlspecialchars($workout['equipment']) . ' ' . 'Sets: ' . ' ' . ' ' . htmlspecialchars($workout['sets']) . ' ' . 'Reps: ' . htmlspecialchars($workout['reps']) . '</option>';
                     }
                     echo '</select>
                         <button type="submit" name="link_member_to_workout">Link Member to Workout</button>
                     </form>
                     
                   </select> </div>';
                    break;

                case 'member':
                    echo '<div class="form-Option-members">
                                  <h2>Member</h2>
                                  <h3>My Classes</h3>
                                  <ul>';

                    // Exibe a lista de classes vinculadas ao membro
                    foreach ($memberClasses as $memberClass) {
                        echo '<li>' . htmlspecialchars($memberClass['name']) . '</li>'; // Verifique o nome da chave
                    }

                    echo '</ul>
                              <h3>My Routine</h3>
                              <ul>';

                    // Exibe a lista de rotinas do membro

                    foreach ($memberRoutines as $memberRoutine) {
                        echo '<li>' . htmlspecialchars($memberRoutine['name']) . '</li>'; // Verifique o nome da chave
                    }


                    echo '<h3>My Workout</h3>';
                    echo '<div class="workout-list">';
                    echo '<table id="tableW" >';
                    echo '<tr>';
                    echo '<th>Exercise</th>';
                    echo '<th>Equipment</th>';
                    echo '<th>Sets</th>';
                    echo '<th>Reps</th>';
                    echo '</tr>';
                    foreach ($workouts as $workout) {
                        echo '<tr>';
                        echo '<td>' .  htmlspecialchars($workout['exercise']) . '</td>';
                        echo '<td>' . htmlspecialchars($workout['equipment']) . '</td>';
                        echo '<td>' . htmlspecialchars($workout['sets']) . '</td>';
                        echo '<td>' . htmlspecialchars($workout['reps']) . '</td>';

                        echo '</tr>';
                    }

                    echo '</table> </div> ';
                    break;

                default:
                    echo 'Anonymous Access';
            }
        }
        ?>
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
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
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