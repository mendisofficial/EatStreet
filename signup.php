<?php require_once 'connection/connect.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - EatStreet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- Navigation Menu -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Breadcrumb Navigation -->
    <nav aria-label="breadcrumb" class="container my-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Signup</li>
        </ol>
    </nav>

    <!-- Signup Form Section -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Sign Up</h2>

                <form id="user_signUpForm" method="POST" onsubmit="signUp(event); return false;">
                    <div class="row">
                        <!-- First Name -->
                        <div class="col-md-6 form-group">
                            <label for="firstName">First Name</label>
                            <input type="text" class="form-control" id="user_signUpFirstName" name="user_signUpFirstName" required>
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-6 form-group">
                            <label for="lastName">Last Name</label>
                            <input type="text" class="form-control" id="user_signUpLastName" name="user_signUpLastName" required>
                        </div>
                    </div>

                    <div class="row">
                        <!-- Email -->
                        <div class="col-md-6 form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="user_signUpEmail" name="user_signUpEmail" required>
                        </div>

                        <!-- Contact Number -->
                        <div class="col-md-6 form-group">
                            <label for="contactNumber">Contact Number</label>
                            <input type="text" class="form-control" id="user_signUpContactNumber" name="user_signUpContactNumber" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="user_signUpPassword" name="user_signUpPassword" required>
                    </div>

                    <!-- Confirm Password -->
                    <div class="form-group">
                        <label for="confirmPassword">Confirm Password</label>
                        <input type="password" class="form-control" id="user_signUpConfirmPassword" name="user_signUpConfirmPassword" required>
                    </div>

                    <!-- Gender -->
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select class="form-control" id="user_signUpGender" name="user_signUpGender">
                        <option value="0">Select your gender</option>
                        <?php
                        $sql = "SELECT * FROM `gender`";
                        $result = mysqli_query($conn, $sql);
                        $rows = mysqli_num_rows($result);

                        for($x = 0; $x < $rows; $x++){
                            $data = mysqli_fetch_assoc($result);
                            ?>
                            
                            <option value="<?php echo $data["gender_id"]; ?>"><?php echo $data["gender_name"]; ?></option>
                            <?php
                        }
                        ?>
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </form>
                
                <br>
                <!-- Display Error Messages -->
                <div id="user_signUpErrorMessage" class="alert alert-danger" style="display: none;">
                    <span id="errorMessageText"></span>
                </div>

                <!-- Display Success Message -->
                <div id="user_signUpSuccessMessage" class="alert alert-success" style="display: none;">
                    Sign up successful
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
