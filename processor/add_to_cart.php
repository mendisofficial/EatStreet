<?php
session_start();
require_once '../connection/connect.php';

if (isset($_SESSION['user'])) {
    $user_id = $_SESSION['user']['user_id'];

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Get the menu_id from the query string
        if (isset($_GET['menu_id']) && is_numeric($_GET['menu_id'])) {
            $menu_id = mysqli_real_escape_string($conn, $_GET['menu_id']);

            // Check if the item already exists in the cart for the user
            $checkCartQuery = "SELECT * FROM cart WHERE user_id = $user_id AND menu_id = $menu_id";
            $checkCartResult = mysqli_query($conn, $checkCartQuery);

            if (mysqli_num_rows($checkCartResult) > 0) {
                // If the item already exists, update the quantity
                $updateQuantityQuery = "UPDATE cart SET quantity = quantity + 1 WHERE user_id = $user_id AND menu_id = $menu_id";
                if (mysqli_query($conn, $updateQuantityQuery)) {
                    echo "Item quantity updated in the cart.";
                } else {
                    echo "Failed to update item quantity in the cart.";
                }
            } else {
                // If the item doesn't exist, insert it into the cart
                $insertCartQuery = "INSERT INTO cart (user_id, menu_id, quantity) VALUES ($user_id, $menu_id, 1)";
                if (mysqli_query($conn, $insertCartQuery)) {
                    echo "Item added to the cart.";
                } else {
                    echo "Failed to add item to the cart.";
                }
            }
        } else {
            echo "Invalid menu_id provided.";
        }
    } else {
        echo "Invalid request method.";
    }
} else {
    echo "You need to be logged in to add items to your cart.";
}
?>
