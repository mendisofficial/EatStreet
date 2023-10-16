<?php require_once '../connection/connect.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Sign Up - EatStreet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <!-- Header -->
    <?php include '../includes/header.php'; ?>

    <!-- Navigation Menu -->
    <?php include '../includes/navbar.php'; ?>

    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="container my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Restaurant Signup</li>
        </ol>
    </nav>

    <!-- Restaurant Signup Form Section -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Restaurant Sign Up</h2>

                <form id="restaurant_signUpForm" method="POST" onsubmit="restaurantSignUp(event); return false;">
                    <!-- Restaurant Name -->
                    <div class="form-group">
                        <label for="restaurantName">Restaurant Name</label>
                        <input type="text" class="form-control" id="restaurant_name" name="restaurant_name" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="restaurant_description" name="restaurant_description" rows="4"></textarea>
                    </div>

                    <!-- Address -->
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="restaurant_address" name="restaurant_address">
                    </div>

                    <!-- City -->
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="restaurant_city" name="restaurant_city">
                    </div>

                    <!-- State -->
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="restaurant_state" name="restaurant_state">
                    </div>

                    <!-- Postal Code -->
                    <div class="form-group">
                        <label for="postalCode">Postal Code</label>
                        <input type="text" class="form-control" id="restaurant_postalCode" name="restaurant_postalCode">
                    </div>

                    <!-- Phone Number -->
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="text" class="form-control" id="restaurant_phoneNumber" name="restaurant_phoneNumber">
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="restaurantEmail">Email</label>
                        <input type="email" class="form-control" id="restaurant_email" name="restaurant_email" required>
                    </div>

                    <!-- Website -->
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input type="text" class="form-control" id="restaurant_website" name="restaurant_website">
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
                
                <br>
                <!-- Display Error Messages -->
                <div id="restaurant_signUpErrorMessage" class="alert alert-danger" style="display: none;">
                    <span id="restaurant_signUpErrorMessageText"></span>
                </div>

                <!-- Display Success Message -->
                <div id="restaurant_signUpSuccessMessage" class="alert alert-success" style="display: none;">
                    Restaurant sign up successful
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include '../includes/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/script.js"></script>
</body>
</html>
