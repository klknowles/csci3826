<?php
//displayListOfCategories.php

$query = "SELECT * FROM my_Ref_Product_Categories
                   ORDER BY department_name";
$categories = mysqli_query($db, $query);
$numRecords = mysqli_num_rows($categories);
$categoryCount = 0;
$currentDepartment = "";
echo "<div class='w3-bar-block w3-teal w3-border w3-border-black w3-center'>";
for ($i = 1; $i <= $numRecords; $i++)
{
  $row = mysqli_fetch_array($categories, MYSQLI_ASSOC);
  if ($currentDepartment != $row['department_name'])
  {
    $currentDepartment = $row['department_name'];
  }
  $productCatCode = urlencode($row['product_category_code']);
  $productCatDesc = $row['product_category_description'];
  $categoryURL = "pages/category.php?categoryCode=$productCatCode";
  echo
  "<a class='w3-bar-item w3-hover-light-gray
             w3-border w3-border-black w3-center'
     title=$currentDepartment href='$categoryURL'
     style='text-decoration:none'>$productCatDesc
   </a>\n";
  $categoryCount++;
}
echo "</div>";
mysqli_close($db);
?>
