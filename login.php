<?php
session_start();
include 'koneksi.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

$error = '';

if (isset($_POST['signin'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = 'Please fill in all fields';
    } else {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            $error = 'Database error';
        } else {
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                if (password_verify($password, $row['password'])) {
                    $_SESSION['username'] = $username;
                    $_SESSION['user_id'] = $row['user_id']; // Set user_id in session

                    $stmt->close();
                    $conn->close();
                    header("Location: index.php");
                    exit();
                } else {
                    $error = 'Invalid password';
                }
            } else {
                $error = 'No user found with that username';
            }
            $stmt->close();
        }
    }
    $conn->close();
}

if (!empty($error)) {
    header("Location: signin.php?error=" . urlencode($error));
    exit();
}

if (isset($_POST['signup'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $verify_password = $_POST['verify_password'];

    if (empty($name) || empty($username) || empty($email) || empty($password) || empty($verify_password)) {
        $error = 'Please fill in all fields';
    } elseif ($password !== $verify_password) {
        $error = 'Passwords do not match';
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (nama, username, email, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt === false) {
            $error = 'Database error';
        } else {
            $stmt->bind_param("ssss", $name, $username, $email, $hashed_password);
            if ($stmt->execute()) {
                $stmt->close();
                $conn->close();
                header("Location: signin.php?success=Account created successfully. Please sign in.");
                exit();
            } else {
                $error = 'Error creating account';
                $stmt->close();
            }
        }
    }
    $conn->close();
    header("Location: .php?error=" . urlencode($error));
    exit();
}

