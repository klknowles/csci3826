<?php
//displayOneCategoryItems.php
$categoryCode = $_GET['categoryCode'];
$categoryQuery = "SELECT * FROM my_Products
                   WHERE product_category_code = '$categoryCode'
                   ORDER BY product_name ASC";
$category = mysqli_query($db, $categoryQuery);
$numRecords = mysqli_num_rows($category);

$departmentQuery = "SELECT department_name FROM my_Ref_Product_Categories
                    WHERE product_category_code = '$categoryCode'";
$department = mysqli_query($db, $departmentQuery);
$row = mysqli_fetch_assoc($department);

echo
  "<h2>${row['department_name']} Products List</h2>
   <table class='w3-table-all w3-centered w3-border-black'>
     <thead>
       <tr class='w3-amber w3-border-black'>
         <th>Product Image</th>
         <th>Product Name</th>
         <th>Price</th>
         <th># in Stock</th>
         <th>Purchase Options</th>
       </tr>
     </thead>";

for ($i = 1; $i <= $numRecords; $i++)
{
  $row = mysqli_fetch_array($category, MYSQLI_ASSOC);
  $productImageURL = $row['product_image_url'];
  $productName = $row['product_name'];
  $productPrice = $row['product_price'];
  $productPriceAsString = sprintf("$%.2f", $productPrice);
  $productInventory = $row['product_inventory'];
  $productID = $row['product_id'];
  $shoppingCartURL = "pages/shoppingCart.php?productID=$productID";
  $catalogURL = "pages/productCatalog.php";
  $rowColor = $i%2 == 0 ? "w3-amber" : "w3-yellow";
  echo
  "<tr class='$rowColor w3-border-black'>
    <td>
      <img height='70' width='70'
           src='$productImageURL'
           alt='Product Image'>
    </td><td style='text-align: left;'>
      $productName
    </td><td>
      $productPriceAsString
    </td><td>
      $productInventory
    </td><td>
      <a class='w3-button w3-teal w3-small w3-border w3-border-black'
         style='width: 200px'
         href='$shoppingCartURL'>Buy this item</a>
      <a class='w3-button w3-teal w3-small w3-border w3-border-black'
         style='width: 200px'
         href='$catalogURL'>Return to product catalog</a>

    </td></tr>";
}
echo
"</table>";
mysqli_close($db);
?>
