<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - EatStreet</title>
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
            <li class="breadcrumb-item active" aria-current="page">Select your restaurant</li>
        </ol>
    </nav>

    <!-- Search Form Section -->
    <section class="container my-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2>Search Restaurants in [Your City]</h2>
                <form class="search-form" action="search-results.php" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" id="cityInput" placeholder="Enter your restaurant name">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="searchButton">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Search Results Section -->
    <section class="container my-5">
        <h2>Restaurants in [City Name]</h2>

        <!-- Sample Restaurant Listings (Placeholder Content) -->
        <div class="row">
            <!-- Restaurant 1 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/200x150" class="card-img-top" alt="Restaurant 1">
                    <div class="card-body">
                        <h5 class="card-title">Sample Restaurant 1</h5>
                        <p class="card-text">Cuisine Type: Cuisine A</p>
                        <p class="card-text">Rating: 4.3/5</p>
                        <a href="#" class="btn btn-primary">View Menu</a>
                    </div>
                </div>
            </div>

            <!-- Restaurant 2 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/200x150" class="card-img-top" alt="Restaurant 2">
                    <div class="card-body">
                        <h5 class="card-title">Sample Restaurant 2</h5>
                        <p class="card-text">Cuisine Type: Cuisine B</p>
                        <p class="card-text">Rating: 4.1/5</p>
                        <a href="#" class="btn btn-primary">View Menu</a>
                    </div>
                </div>
            </div>

            <!-- Restaurant 3 -->
            <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/200x150" class="card-img-top" alt="Restaurant 3">
                    <div class="card-body">
                        <h5 class="card-title">Sample Restaurant 3</h5>
                        <p class="card-text">Cuisine Type: Cuisine A</p>
                        <p class="card-text">Rating: 4.5/5</p>
                        <a href="#" class="btn btn-primary">View Menu</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- No Results Message (to be displayed when there are no search results) -->
        <!-- <p>No restaurants found in [City Name].</p> -->
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
