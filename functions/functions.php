<?php


// function to database connection
function dbLink()
{
    $db_host = 'localhost'; // db host
    $db_name = 'gym_db'; // db name
    $db_user = 'mri'; // username db
    $db_pass = 'password'; // password db

    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_user, $db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch (PDOException $e) {
        echo "Unable to access database: " . $e->getMessage();
        return null;
    }
}

// LOG OUT


// function to log out
function logout()
{
    // clean all variables
    $_SESSION = array();
    // destroy session
    session_destroy();
    // redirect to login page
    header("Location: ../pages/login.php");
    exit();
}

//verify if form was sent
if (isset($_POST['logout'])) {
    logout();
}




// Function to insert member with password hash to make encrypted
function insertMember($dbConnect, $name, $password)
{
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO members (name, password) VALUES (:name, :password)";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->execute();
}

// Função para deletar um membro do banco de dados
function deleteMember($dbConnect, $member_id)
{
    $query = "DELETE FROM members WHERE id = :member_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();
}

// Função para inserir uma nova classe no banco de dados
function insertClass($dbConnect, $class_name)
{
    $query = "INSERT INTO classes (name) VALUES (:class_name)";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':class_name', $class_name, PDO::PARAM_STR);
    $stmt->execute();
}

// Função para deletar uma classe do banco de dados
function deleteClass($dbConnect, $class_id)
{
    $query = "DELETE FROM classes WHERE id = :class_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':class_id', $class_id, PDO::PARAM_INT);
    $stmt->execute();
}

// Função para vincular um membro a uma classe
function linkMemberToClass($dbConnect, $member_id, $class_id)
{
    try {
        $stmt = $dbConnect->prepare("INSERT INTO memberstoclass (membersid, classid) VALUES (?, ?)");
        $stmt->execute([$member_id, $class_id]);
        echo "Member linked to class successfully!";
    } catch (PDOException $e) {
        echo "Error linking member to class: " . $e->getMessage();
    }
}

// Função para buscar todas as classes do banco de dados
function fetchClasses($dbConnect)
{
    $query = "SELECT id, name FROM classes";
    $stmt = $dbConnect->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para buscar todos os membros do banco de dados
function fetchMembers($dbConnect)
{
    $query = "SELECT id, name FROM members";
    $stmt = $dbConnect->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para buscar as classes vinculadas a um membro específico
function fetchMemberClasses($dbConnect, $member_id)
{
    $query = "SELECT c.id, c.name AS class_name 
              FROM classes c
              INNER JOIN memberstoclass mc ON c.id = mc.classid
              WHERE mc.membersid = :member_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Função para inserir uma nova rotina no banco de dados
function insertRoutine($dbConnect, $routine_name)
{
    $query = "INSERT INTO routine (name) VALUES (:routine_name)";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':routine_name', $routine_name, PDO::PARAM_STR);
    $stmt->execute();
}


// Função para buscar todas as rotinas do banco de dados
function fetchRoutines($dbConnect)
{
    $query = "SELECT id, name FROM routine";
    $stmt = $dbConnect->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// funcao pata deletar rotinas do banco de dados
function deleteRoutine($dbConnect, $routine_id)
{
    $query = "DELETE FROM routine WHERE id = :routine_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':routine_id', $routine_id, PDO::PARAM_INT);
    $stmt->execute();
}
function linkMemberToRoutine($dbConnect, $member_id, $routine_id)
{
    try {
        $stmt = $dbConnect->prepare("INSERT INTO memberstoroutine (membersid, routineid) VALUES (?, ?)");
        $stmt->execute([$member_id, $routine_id]);
        echo "Member linked to Routine successfully!";
    } catch (PDOException $e) {
        echo "Error linking member to Routine: " . $e->getMessage();
    }
}

function fetchMemberRoutine($dbConnect, $member_id)
{
    $query = "SELECT c.id, c.name 
              FROM routine c
              INNER JOIN memberstoroutine mc ON c.id = mc.routineid
              WHERE mc.memberid = :member_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':membersid', $member_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// insert staff with encrypt password
function insertStaff($dbConnect, $name, $password)
{
    // this variable makes the password be encrypted 
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO staff (name, password) VALUES (:name, :password)";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':name', $name, PDO::PARAM_STR);
    $stmt->bindParam(':password', $hashedPassword, PDO::PARAM_STR);
    $stmt->execute();
}

// fecth staff 
function fetchStaff($dbConnect)
{
    $query = "SELECT id, name FROM staff";
    $stmt = $dbConnect->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteStaff($dbConnect, $staff_id)
{
    $query = "DELETE FROM staff WHERE id = :staff_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_INT);
    $stmt->execute();
}


// Update member 

function updateMember($dbConnect, $member_id, $new_name)
{
    $query = "UPDATE members SET name = :new_name WHERE id = :member_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':new_name', $new_name);
    $stmt->bindParam(':member_id', $member_id);
    $stmt->execute();
}


// update staff 

function updateStaff($dbConnect, $staff_id, $new_staff)
{
    $query = "UPDATE staff SET name = :new_staff WHERE id = :staff_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':new_staff', $new_staff);
    $stmt->bindParam(':staff_id', $staff_id);
    $stmt->execute();
}


function updateMemberPassword($dbConnect, $member_id, $new_pass)
{
    $hashedPassword = password_hash($new_pass, PASSWORD_DEFAULT);
    $query = "UPDATE members SET password=:new_pass WHERE id=:member_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':new_pass', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();
}

function updateStaffPassword($dbConnect, $staff_id, $new_pass_staff)
{
    $hashedPassword = password_hash($new_pass_staff, PASSWORD_DEFAULT);
    $query = "UPDATE staff SET password=:new_pass_staff WHERE id=:staff_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':new_pass_staff', $hashedPassword, PDO::PARAM_STR);
    $stmt->bindParam(':staff_id', $staff_id, PDO::PARAM_INT);
    $stmt->execute();
}

function updateClass($dbConnect, $class_id, $new_class)
{
    $query = "UPDATE classes SET name=:new_class WHERE id=:class_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':class_id', $class_id);
    $stmt->bindParam(':new_class', $new_class);
    $stmt->execute();
}

function updateRoutine($dbConnect, $routine_id, $new_routine)
{
    $query = "UPDATE routine SET name=:new_routine WHERE id=:routine_id ";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':routine_id', $routine_id);
    $stmt->bindParam(':new_routine', $new_routine);
    $stmt->execute();
}


function insertWorkout($dbConnect, $exercise, $equipment, $sets, $reps)
{
    $query = "INSERT INTO workout (exercise, equipment, sets, reps) VALUES (:exercise, :equipment, :sets, :reps)";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':exercise', $exercise, PDO::PARAM_STR);
    $stmt->bindParam(':equipment', $equipment, PDO::PARAM_STR);
    $stmt->bindParam(':sets', $sets, PDO::PARAM_INT);
    $stmt->bindParam(':reps', $reps, PDO::PARAM_INT);
    $stmt->execute();
}

function fetchWorkout($dbConnect)
{
    $query = "SELECT id, exercise, equipment, sets, reps FROM workout";
    $stmt = $dbConnect->query($query);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function deleteworkout($dbConnect, $workout_id)
{
    $query = "DELETE FROM workout WHERE id=:workout_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':workout_id', $workout_id, PDO::PARAM_INT);
    $stmt->execute();
}

function linkMemberToWorkout($dbConnect, $member_id, $workout_id)
{
    try {
        $stmt = $dbConnect->prepare("INSERT INTO workoutmembers (membersid, workoutid) VALUES (?, ?)");
        $stmt->execute([$member_id, $workout_id]);
        echo "Member linked to class successfully!";
    } catch (PDOException $e) {
        echo "Error linking member to class: " . $e->getMessage();
    }
}

function fetchMemberWorkout($dbConnect, $member_id)
{
    $query = "SELECT c.id, c.exercise, c.equipment, c.sets, c.reps
              FROM workout c
              INNER JOIN workoutmembers mc ON c.id = mc.workoutid
              WHERE mc.membersid = :member_id";
    $stmt = $dbConnect->prepare($query);
    $stmt->bindParam(':member_id', $member_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function updateWorkout($dbConnect, $workout_id, $new_exercise, $new_equipment, $new_sets, $new_reps)
{
    $sql = "UPDATE workout SET exercise = :exercise, equipment = :equipment, sets = :sets, reps = :reps WHERE id = :workout_id";
    $stmt = $dbConnect->prepare($sql);
    $stmt->bindParam(':exercise', $new_exercise);
    $stmt->bindParam(':equipment', $new_equipment);
    $stmt->bindParam(':sets', $new_sets);
    $stmt->bindParam(':reps', $new_reps);
    $stmt->bindParam(':workout_id', $workout_id);
    $stmt->execute();
}
