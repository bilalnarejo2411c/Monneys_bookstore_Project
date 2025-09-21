<?php
session_start();

// Database Connection
$host = "localhost";
$user = "root";      
$pass = "";          
$db   = "monneys_bookstore";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Helper function: clean input
function clean($v){
    return trim($v ?? '');
}

// ================== SIGNUP ==================
if (isset($_POST['signup'])) {
    $username = clean($_POST['username']);
    $email    = clean($_POST['email']);
    $password = clean($_POST['password']);

    // Validation
    if ($username === '' || $email === '' || $password === '') {
        echo "<script>alert('Please fill all fields'); window.location.href='../index.php';</script>";
        exit;
    }

    // Check duplicate email
    $check = $conn->prepare("SELECT id FROM users WHERE email=? LIMIT 1");
    $check->bind_param("s", $email);
    $check->execute();
    $check->store_result();

    if ($check->num_rows > 0) {
        echo "<script>alert('Email already registered!'); window.location.href='../index.php';</script>";
        $check->close();
        exit;
    }
    $check->close();

    // Insert user
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $hash);

    if ($stmt->execute()) {
        $_SESSION['username'] = $username;
        $_SESSION['email']    = $email;
        echo "<script>alert('Signup Successful!'); window.location.href='../orignal.php';</script>";
    } else {
        echo "<script>alert('Signup Failed!'); window.location.href='../index.php';</script>";
    }
    $stmt->close();
    exit;
}

// ================== LOGIN ==================
if (isset($_POST['login'])) {
    $email    = clean($_POST['email']);
    $password = clean($_POST['password']);

    if ($email === '' || $password === '') {
        echo "<script>alert('Please enter email and password'); window.location.href='../index.php';</script>";
        exit;
    }

    // ✅ Check if Admin login
    if ($email === "admin@site.com" && $password === "admin123") {
        $_SESSION['username'] = "admin";
        $_SESSION['email']    = $email;
        $_SESSION['role']     = "admin";
        echo "<script>alert('Welcome Admin!'); window.location.href='../admin_orders.php';</script>";
        exit;
    }

    // ✅ Normal User login
    $stmt = $conn->prepare("SELECT username, password, role FROM users WHERE email=? LIMIT 1");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['email']    = $email;
            $_SESSION['role']     = $row['role'];
            
            if ($row['role'] === "admin") {
                echo "<script>alert('Welcome Admin!'); window.location.href='../admin_orders.php';</script>";
            } else {
                echo "<script>alert('Login Successful!'); window.location.href='../orignal.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid Password!'); window.location.href='../index.php';</script>";
        }
    } else {
        echo "<script>alert('No user found with this email!'); window.location.href='../index.php';</script>";
    }
    $stmt->close();
    exit;
}

$conn->close();
?>
