<?php
require_once '../connection/connect.php';

// Define error variables
$errors = array();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize input data
    $restaurantName = mysqli_real_escape_string($conn, $_POST['restaurant_name']);
    $description = mysqli_real_escape_string($conn, $_POST['restaurant_description']);
    $address = mysqli_real_escape_string($conn, $_POST['restaurant_address']);
    $city = mysqli_real_escape_string($conn, $_POST['restaurant_city']);
    $state = mysqli_real_escape_string($conn, $_POST['restaurant_state']);
    $postalCode = mysqli_real_escape_string($conn, $_POST['restaurant_postalCode']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['restaurant_phoneNumber']);
    $restaurantEmail = mysqli_real_escape_string($conn, $_POST['restaurant_email']);
    $website = mysqli_real_escape_string($conn, $_POST['restaurant_website']);

    // Validation checks
    if (empty($restaurantName)) {
        $errors['restaurantName'] = "Restaurant name is required";
    }

    if (empty($address)) {
        $errors['address'] = "Address is required";
    }

    if (empty($city)) {
        $errors['city'] = "City is required";
    }

    if (empty($state)) {
        $errors['state'] = "State is required";
    }

    if (empty($postalCode)) {
        $errors['postalCode'] = "Postal code is required";
    }

    if (empty($phoneNumber)) {
        $errors['phoneNumber'] = "Phone number is required";
    }

    if (empty($restaurantEmail)) {
        $errors['restaurantEmail'] = "Email is required";
    } elseif (!filter_var($restaurantEmail, FILTER_VALIDATE_EMAIL)) {
        $errors['restaurantEmail'] = "Invalid email format";
    }

    // Check if there are no validation errors
    if (empty($errors)) {
        // Prepare and execute the SQL query to insert data into the restaurants table
        $sql = "INSERT INTO restaurants (name, description, address, city, state, postal_code, phone_number, email, website)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'sssssssss', $restaurantName, $description, $address, $city, $state, $postalCode, $phoneNumber, $restaurantEmail, $website);

            if (mysqli_stmt_execute($stmt)) {
                // Restaurant signup successful
                echo "success";
            } else {
                // Error occurred during signup
                echo "An error occurred during restaurant sign up.";
            }

            mysqli_stmt_close($stmt);
        } else {
            // Error in prepared statement
            echo "An error occurred during restaurant sign up.";
        }
    } else {
        // Validation errors exist, return them as JSON
        echo implode(' , ', $errors);
    }
}

mysqli_close($conn);
?>
