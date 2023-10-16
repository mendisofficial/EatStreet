<?php
isset($_SESSION["user"]) ? $user = $_SESSION["user"] : $user = null;
?>

<!-- Header -->
<header class="bg-dark text-white py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <h1 class="mb-0"><a href="#" class="text-white">EatStreet</a></h1>
            </div>
            <div class="col-md-6">
                <form class="search-form" action="restaurantSearch.php" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" id="user_cityInput" name="city" placeholder="Enter your city">
                        <div class="input-group-append">
                            <button class="btn btn-primary" id="user_cityInputSearchButton" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-3 text-right">
                <ul class="list-inline">
                    <?php
                    if (isset($_SESSION["user"])) {
                        echo '<li class="list-inline-item"><a href="profile.php" class="text-white">Welcome, ' . $user["first_name"] . '</a></li>';
                        echo '<li class="list-inline-item"><a class="text-white" onclick="signOut();">Sign Out</a></li>';
                    } else {
                        echo '<li class="list-inline-item"><a href="signin.php" class="text-white">Sign In</a></li>';
                        echo '<li class="list-inline-item"><a href="signup.php" class="text-white">Sign Up</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</header>
