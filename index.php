<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EatStreet - Discover Local Restaurants</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- Header -->
    <?php include 'includes/header.php'; ?>

    <!-- Navigation Menu -->
    <?php include 'includes/navbar.php'; ?>

    <!-- Introductory Content -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6">
                <h2>Welcome to EatStreet</h2>
                <p>Discover the best local restaurants in your city. From fast food to fine dining, we've got it all covered.</p>
                <p>Explore menus, read reviews, and place your order for delivery or pickup.</p>
                <a href="#" class="btn btn-primary">Get Started</a>
            </div>
            <div class="col-md-6">
                <img src="https://via.placeholder.com/600x400" alt="Food Image" class="img-fluid">
            </div>
        </div>
    </section>

    <!-- Horizontal Rule -->
    <hr>

    <?php
    require_once 'connection/connect.php';

    // Number of results per page
    $resultsPerPage = 3;

    // Get the current page number from the URL, default to page 1
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;

    // Calculate the OFFSET for the SQL query
    $offset = ($page - 1) * $resultsPerPage;

    // Query to fetch the most recently added 6 restaurants
    $query = "SELECT * FROM restaurants ORDER BY created_at DESC LIMIT $resultsPerPage OFFSET $offset";
    $result = mysqli_query($conn, $query);

    // Query to count the total number of restaurants
        //$totalQuery = "SELECT COUNT(*) as total FROM restaurants";
        //$totalResult = mysqli_query($conn, $totalQuery);
        //$totalRow = mysqli_fetch_assoc($totalResult);
        //$totalRestaurants = $totalRow['total'];
    $totalRestaurants = 6;

    // Calculate the total number of pages
    $totalPages = ceil($totalRestaurants / $resultsPerPage);
    ?>

    <!-- Recently Added Restaurants Section with Pagination -->
    <section class="container my-5">
        <h2>Recently Added Restaurants</h2>

        <div class="row">
            <!-- Loop through the retrieved restaurants and display them -->
            <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/200x150" class="card-img-top" alt="<?php echo $row['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['name']; ?></h5>
                            <p class="card-text">Description: <?php echo $row['description']; ?></p>
                            <p class="card-text">Address: <?php echo $row['address']; ?></p>
                            <!-- Add more restaurant details as needed -->
                            <a href="#" class="btn btn-primary">View Menu</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>

        <!-- Pagination -->
        <ul class="pagination">
            <!-- Generate pagination links -->
            <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                <li class="page-item <?php echo ($page === $i) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </section>

    <!-- Horizontal Rule -->
    <hr>

    <!-- Recommended Dishes Section with Pagination -->
    <section class="container my-5">
        <h2>Recommended Dishes</h2>

        <div class="row">
            <?php
            // Query to fetch recently added menu items (you can customize this query as needed)
            $menu_query = "SELECT * FROM menu ORDER BY created_at DESC LIMIT $resultsPerPage";
            $menu_result = mysqli_query($conn, $menu_query);

            // Loop through the retrieved menu items and display them as recommended dishes
            while ($menu_item = mysqli_fetch_assoc($menu_result)) {
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="https://via.placeholder.com/200x150" class="card-img-top" alt="<?php echo $menu_item['name']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $menu_item['name']; ?></h5>
                            <p class="card-text">Description: <?php echo $menu_item['description']; ?></p>
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
                            <a href="#" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>

        <!-- Pagination (Recommended Dishes) -->
        <ul class="pagination">
            <?php
            // Generate pagination links
            for ($i = 1; $i <= $totalPages; $i++) {
                echo '<li class="page-item' . ($page === $i ? ' active' : '') . '">';
                echo '<a class="page-link" href="?page=' . $i . '">' . $i . '</a>';
                echo '</li>';
            }
            ?>
        </ul>
    </section>

    <!-- Horizontal Rule -->
    <hr>

    <!-- Call to Action for Restaurant Registration -->
    <section class="container my-5 text-center">
        <h2>Are you a restaurant owner?</h2>
        <p>If you own a restaurant, you can register it on EatStreet and reach more customers.</p>
        <a href="#" class="btn btn-primary">Register Your Restaurant</a>
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
