<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

require_once 'connection/connect.php';

$user_id = $_SESSION['user']['user_id'];
$user_query = "SELECT * FROM users WHERE user_id = $user_id";
$user_result = mysqli_query($conn, $user_query);

if ($user_result) {
    $user_data = mysqli_fetch_assoc($user_result);
} else {
    echo "Error: Unable to retrieve user information.";
    exit();
}

// Initialize variables for form fields
$firstName = $user_data['first_name'];
$lastName = $user_data['last_name'];
$email = $user_data['email'];
$contactNumber = $user_data['contact_number'];
$gender_id = $user_data['gender_id'];

$gender_query = "SELECT gender_name FROM gender WHERE gender_id = $gender_id";
$gender_result = mysqli_query($conn, $gender_query);

if ($gender_result){
    $gender_data = mysqli_fetch_assoc($gender_result);
} else {
    echo "Error: Unable to retrieve gender information.";
    exit();
}

$gender = $gender_data['gender_name'];

// Check if the form is submitted for updating profile
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve updated form values
    $updatedFirstName = mysqli_real_escape_string($conn, $_POST['first_name']);
    $updatedLastName = mysqli_real_escape_string($conn, $_POST['last_name']);
    $updatedContactNumber = mysqli_real_escape_string($conn, $_POST['contact_number']);

    // Perform the update in the database
    $updateQuery = "UPDATE users SET 
                    first_name = '$updatedFirstName',
                    last_name = '$updatedLastName',
                    contact_number = '$updatedContactNumber'
                    WHERE user_id = $user_id";

    $updateResult = mysqli_query($conn, $updateQuery);

    if ($updateResult) {
        // Redirect to the profile page with a success message
        header("Location: profile.php?success=1");
        exit();
    } else {
        // Handle the case where the update failed
        $updateError = "Error: Unable to update profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - EatStreet</title>
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
            <li class="breadcrumb-item active" aria-current="page">My Profile</li>
        </ol>
    </nav>

    <!-- User Profile Section -->
    <section class="container my-5">
        <h2>My Profile</h2>
        <?php if (isset($updateError)) : ?>
            <div class="alert alert-danger"><?php echo $updateError; ?></div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name:</strong> <?php echo $firstName . ' ' . $lastName; ?></p>
                <p><strong>Email:</strong> <?php echo $email; ?></p>
                <p><strong>Contact Number:</strong> <?php echo $contactNumber; ?></p>
                <p><strong>Gender:</strong> <?php echo $gender; ?></p>
            </div>
        </div>
    </section>

    <!-- Update Your Profile Section -->
    <section class="container my-5">
        <h2>Update Your Profile</h2>
        <form method="POST" action="profile.php">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo $firstName; ?>" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo $lastName; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="<?php echo $email; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" class="form-control" id="contact_number" name="contact_number" value="<?php echo $contactNumber; ?>" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <input type="text" class="form-control" value="<?php echo $gender; ?>" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </section>

    <!-- Footer -->
    <?php include 'includes/footer.php'; ?>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
