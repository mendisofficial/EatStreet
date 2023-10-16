<?php
require_once '../connection/connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Initialize an array to store error messages
    $errors = [];

    // Retrieve user input from the form
    $firstName = $_POST["user_signUpFirstName"];
    $lastName = $_POST["user_signUpLastName"];
    $email = $_POST["user_signUpEmail"];
    $contactNumber = $_POST["user_signUpContactNumber"];
    $password = $_POST["user_signUpPassword"];
    $confirmPassword = $_POST["user_signUpConfirmPassword"];
    $gender = $_POST["user_signUpGender"];

    // Validate the form data (You can add more validation as needed)
    if (empty($firstName) || empty($lastName) || empty($email) || empty($contactNumber) || empty($password) || empty($confirmPassword) || empty($gender)) {
        $errors[] = 'All fields are required.';
    }

    if ($password !== $confirmPassword) {
        $errors[] = 'Passwords do not match.';
    }

    // Check if the email is already registered (Assuming you have a 'users' table)
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $errors[] = 'Email already exists. Please use a different email.';
    }

    if (empty($errors)) {
        // No validation errors, insert the user into the database (Hash the password for security)
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $insertSql = "INSERT INTO `users` (`first_name`, `last_name`, `email`, `contact_number`, `password`, `gender_id`) VALUES ('$firstName', '$lastName', '$email', '$contactNumber', '$hashedPassword', '$gender')";

        if (mysqli_query($conn, $insertSql)) {
            // Registration success
            echo 'success';
        } else {
            // Database error
            echo 'An error occurred while registering. Please try again later.';
        }
    } else {
        // Validation errors occurred, display them
        echo implode(' , ', $errors);
    }
} else {
    // Redirect or handle GET requests if needed
    // For example, you can redirect to the signup page with a message
    header("Location: signup.php?message=Invalid Request");
    // exit();
}
?>
