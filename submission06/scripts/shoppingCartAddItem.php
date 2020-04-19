<?php
//shoppingCartAddItem.php
session_start();
include("connectToDatabase.php");
$customerID = $_SESSION['customer_id'];
$productID = $_GET['productID'];

$query =
  "SELECT
      my_Orders.order_id,
      my_Orders.order_status_code,
      my_Orders.customer_id
   FROM my_Orders
   WHERE
      my_Orders.order_status_code = 'IP' and
      my_Orders.customer_id = $customerID";
$order = mysqli_query($db, $query);
$row = mysqli_fetch_array($order, MYSQLI_ASSOC);
$orderID = $row['order_id'];

$query =
  "SELECT *
   FROM my_Products
   WHERE product_id = '$productID'";
$product = mysqli_query($db, $query);
$row = mysqli_fetch_array($product, MYSQLI_ASSOC);
$productInventory = $row['product_inventory'];

$quantityRequested = $_GET['quantity'];
if ($quantityRequired > $productInventory)
{
  $gotoRetry = "../pages/shoppingCart.php?
                productID=$productID&retrying=true";
  header("Location: $gotoRetry");
}
else
{
  $productPrice = $row['product_price'];
  $query = "INSERT INTO `my_Order_Items`
  (
      order_item_status_code,
      order_id,
      product_id,
      order_item_quantity,
      order_item_price,
      other_order_item_details
  )
  VALUES
  (
      'IP',
      '$orderID',
      '$productID',
      '$quantityRequested',
      '$productPrice',
      NULL
  )";
  $success = mysqli_query($db, $query);
  header("Location: ../pages/shoppingCart.php?productID=view");
}
?>
