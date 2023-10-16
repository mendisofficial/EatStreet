<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Include your database connection file here
    require_once '../connection/connect.php';
    session_start();

    // Initialize an array to store response data
    $response = array();

    // Retrieve user input from the form
    $email = $_POST["user_signInEmail"];
    $password = $_POST["user_signInPassword"];
    $rememberMe = isset($_POST["user_signInRememberMe"]) ? $_POST["user_signInRememberMe"] : 0;

    // Perform authentication logic
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user["password"])) {
        // Authentication successful
        $response = "success";
        $_SESSION["user"] = $user;

        // Implement "Remember Me" logic here (set cookies, sessions, etc.)
        if ($rememberMe == 1) {
            // Set a cookie to remember the user
            setcookie("user_id", $user["user_id"], time() + 604800, "/");
            // 604800 seconds = 1 week
        }

    } else {
        // Authentication failed
        $response = "Invalid email or password.";
    }

    // Close the database connection
    mysqli_close($conn);

    // Send the response message back to the JavaScript
    echo $response;
} else {
    // Handle cases where the form is not submitted via POST method
    echo "Invalid request.";
}
?>