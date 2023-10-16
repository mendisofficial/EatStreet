<?php
require_once 'connection/connect.php'; // Include your database connection script here
session_start();

// Check if the restaurant_id is provided in the URL
if (isset($_GET['restaurant_id']) && is_numeric($_GET['restaurant_id'])) {
    // Get the restaurant ID from the URL
    $restaurant_id = $_GET['restaurant_id'];

    // Query the database to retrieve restaurant information
    $restaurant_query = "SELECT * FROM restaurants WHERE restaurant_id = $restaurant_id";
    $restaurant_result = mysqli_query($conn, $restaurant_query);

    if ($restaurant_result) {
        $restaurant_data = mysqli_fetch_assoc($restaurant_result);

        // Query the database to retrieve menu items for this restaurant
        $menu_query = "SELECT * FROM menu WHERE restaurant_id = $restaurant_id";
        $menu_result = mysqli_query($conn, $menu_query);
    }
} else {
    // If the restaurant ID is not provided or not valid, you can show an error message or redirect back to the homepage
    echo "Invalid restaurant ID or no restaurant ID provided.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $restaurant_data['name']; ?> - EatStreet</title>
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
            <li class="breadcrumb-item"><a href="#">Select your restaurant</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $restaurant_data['name']; ?></li>
        </ol>
    </nav>

    <!-- Restaurant Information Section -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h2><?php echo $restaurant_data['name']; ?></h2>
                <p><strong>Cuisine Type:</strong> <?php echo $restaurant_data['description']; ?></p>
                <p><strong>Rating:</strong> <?php echo $restaurant_data['rating']; ?>/5</p>
                <p><strong>Address:</strong> <?php echo $restaurant_data['address']; ?>, <?php echo $restaurant_data['city']; ?>, <?php echo $restaurant_data['state']; ?> <?php echo $restaurant_data['postal_code']; ?></p>
                <p><strong>Phone:</strong> <?php echo $restaurant_data['phone_number']; ?></p>
                <!-- Add more restaurant information here -->
            </div>
            <div class="col-md-6">
            <img src="https://via.placeholder.com/400x300" alt="Restaurant Image" class="img-fluid">
            </div>
        </div>
    </section>

    <!-- Menu Items Section -->
    <section class="container my-5">
        <h2>Menu</h2>

        <!-- Category Filters -->
        <div class="btn-group mb-4">
            <button type="button" class="btn btn-primary active" data-category="all">All</button>
            <!-- Add category buttons based on your menu categories -->
        </div>

        <!-- Menu Items with Categories and Images -->
        <div class="row" id="user_menuItems">
            <?php
            while ($menu_item = mysqli_fetch_assoc($menu_result)) {
                ?>
                <div class="col-md-4 mb-4" data-category="<?php echo $menu_item['category']; ?>">
                    <div class="card">
                    <img src="https://via.placeholder.com/400x300" class="card-img-top" alt="menu-item">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $menu_item['name']; ?></h5>
                            <p class="card-text"><?php echo $menu_item['description']; ?></p>
                            <p class="card-text">Price: $<?php echo $menu_item['price']; ?></p>
                            <!-- Add more menu item details here -->
                            <?php
                            if ($menu_item['is_vegetarian']) {
                                echo '<p class="card-text">Vegetarian: Yes</p>';
                            } else {
                                echo '<p class="card-text">Vegetarian: No</p>';
                            }

                            if ($menu_item['is_spicy']) {
                                echo '<p class="card-text">Spicy: Yes</p>';
                            } else {
                                echo '<p class="card-text">Spicy: No</p>';
                            }
                            ?>
                            <a class="btn btn-primary" onclick="">Buy Now</a>
                            <a class="btn btn-primary" onclick="addToCart(<?php echo $menu_item['menu_id'] ?>);">Add to Cart</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
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
