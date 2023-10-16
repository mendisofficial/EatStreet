<?php
session_start();
require_once '../connection/connect.php';

if(isset($_SESSION["user"])){

    $pid = $_GET["id"];
    $qty = $_GET["qty"];
    $umail = $_SESSION["u"]["email"];

    $array;

    $order_id = uniqid();

    $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='".$pid."'");
    $product_data = $product_rs->fetch_assoc();

    $city_rs = Database::search("SELECT * FROM `users_has_address` WHERE `users_email`='".$umail."'");
    $city_num = $city_rs->num_rows;

    if($city_num == 1){
        $city_data = $city_rs->fetch_assoc();

        $city_id = $city_data["city_city_id"];
        $address = $city_data["line1"].",".$city_data["line2"];

        $district_rs = Database::search("SELECT * FROM `city` WHERE `city_id`='".$city_id."'");
        $district_data = $district_rs->fetch_assoc();

        $district_id = $district_data["district_district_id"];
        $delivery = 0;

        if($district_id == 15){
            $delivery = $product_data["delivery_fee_colombo"];
        }else{
            $delivery = $product_data["delivery_fee_other"];
        }

        $item = $product_data["title"];
        $amount = ((int)$product_data["price"] * (int)$qty) + (int)$delivery;

        $fname = $_SESSION["u"]["fname"];
        $lname = $_SESSION["u"]["lname"];
        $mobile = $_SESSION["u"]["mobile"];
        $uaddress = $address;
        $city = $district_data["city_name"];

        $currency = "LKR";

        $hash = strtoupper(
            md5(
                $_ENV["PAYHERE_MERCHANT_ID"] . 
                $order_id . 
                number_format($amount, 2, '.', '') . 
                $currency .  
                strtoupper(md5($_ENV["PAYHERE_MERCHANT_SECRET"])) 
            ) 
        );

        $array ["id"] =$order_id;
        $array ["item"] =$item;
        $array ["amount"] =$amount;
        $array ["fname"] =$fname;
        $array ["lname"] =$lname;
        $array ["mobile"] =$mobile;
        $array ["address"] =$uaddress;
        $array ["umail"] =$umail;
        $array ["city"] =$city;
        $array ["hash"] =$hash;

        echo json_encode($array);

    }else{
        echo ("address error");
    }

}

?>