<?php
//shoppingCartProcess.php
$retrying = isset($_GET['retrying']) ? true : false;
$items = getExistingOrder($db, $customerID);
$numRecords = mysqli_num_rows($items);
$colorSwitch = 0;

/* NOTE(nclowes): This is perhaps not so relevant for the sake of the
   project. I have just noticed that it breaks when productID is
   undefined. Redirect to view if not set.
*/
if (!isset($productID))
{
  header("Location: ../pages/shoppingCart.php?productID=view");
}

if ($numRecords == 0 && $productID == 'view')
{
  echo
  "<p>Your shopping cart is empty.</p>
   <p>To continue shopping, please
   <a href='pages/productCatalog.php'>
    click here
    </a></p>";
}
else
{
  displayHeader();
  $grandTotal = 0;
  if ($numRecords == 0)
  {
    createOrder($db, $customerID);
  }
  else
  {
    for ($i = 1; $i <= $numRecords; $i++)
    {
      $grandTotal += displayExistingItemColumns($db, $items);
    }
  }

  if ($productID != 'view')
  {
    if ($retrying)
    {
      $rowColor = getRowColor();
      echo
      "<tr class='$rowColor w3-border-black'>
        <tdcolspan='7'>Please re-enter a product
          quantity not exceeding our current stock.
        </td>
       </tr>";
    }
    displayNewItemColumns($db, $productID);
  }
  displayFooter($grandTotal);
}
mysqli_close($db);

function getExistingOrder($db, $customerID)
{
  $query =
    "SELECT
        my_Orders.order_id,
        my_Orders.customer_id,
        my_Orders.order_status_code,
        my_Order_Items.*
     FROM
        my_Order_Items, my_Orders
     WHERE
        my_Orders.order_id = my_Order_Items.order_id and
        my_Orders.order_status_code = 'IP'           and
        my_Orders.customer_id = '$customerID'";
  $items = mysqli_query($db, $query);
  return $items;
}

function createOrder($db, $customerID)
{
  $query = "INSERT INTO `my_Orders`
  (
      customer_id,
      order_status_code,
      date_order_placed,
      order_details
  )
  VALUES
  (
      '$customerID',
      'IP',
      CURDATE(),
      NULL
  )";
  $success = mysqli_query($db, $query);
}

function displayHeader()
{
  echo
  "<form id='orderForm'
         action='scripts/shoppingCartAddItem.php'>
      <table class='w3-table-all w3-centered w3-border w3-border-black'>
        <tr class='w3-amber w3-border-black'>
          <th>Product Image</th>
          <th>Product Name</th>
          <th>Price</th>
          <th># in Stock</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Action</th>
        </tr>";
}

function displayFirstFourColumns($db, $productID)
{
  $query =
    "SELECT *
    FROM `my_Products`
    WHERE product_id='$productID'";
  $product = mysqli_query($db, $query);
  $row = mysqli_fetch_array($product, MYSQLI_ASSOC);
  $productPrice = sprintf("$%1.2f", $row['product_price']);
  $rowColor = getRowColor();
  echo
  "<tr class='$rowColor w3-border-black'>
    <td>
      <img height='70' width='70'
        src='$row[product_image_url]' alt='Product Image'>
    </td><td style='text-align: left;'>
      $row[product_name]
    </td><td style='text-align: right;'>
      $productPrice
    </td><td>
      $row[product_inventory]
    </td>";
}

function displayExistingItemColumns($db, $items)
{
  $row = mysqli_fetch_array($items, MYSQLI_ASSOC);
  $productID = $row['product_id'];
  displayFirstFourColumns($db, $productID);
  $total = $row['order_item_quantity'] * $row['order_item_price'];
  $totalAsString = sprintf("$%1.2f", $total);
  $paramString = "orderItemID=$row[order_item_id]&orderID=$row[order_id]";
  echo
    "<td>
      $row[order_item_quantity]
     </td><td style='text-align: right;'>
      $totalAsString
    </td><td>
      <p><a class='w3-button w3-teal w3-border w3-border-black w3-small'
          style='width: 150px'
          href='scripts/shoppingCartDeleteItem.php?$paramString'>
          Delete from cart</a></p>
      </p><a class='w3-button w3-teal w3-border w3-border-black w3-small'
          style='width: 150px'
          href='pages/productCatalog.php'>
          Continue shopping</a></p>
      </td>
    </tr>";
   return $total;
}

function displayNewItemColumns($db, $productID)
{
  $query = "SELECT * FROM my_Products
            WHERE product_id = '$productID'";
  $product = mysqli_query($db, $query);
  $row = mysqli_fetch_assoc($product);

  displayFirstFourColumns($db, $productID);
  echo
  "<td>
     <input type='hidden' id='productID' name='productID' value=$productID>
     <input type='number' id='quantity' name='quantity' size='3' required=''
      value='1' title='Number between 1 and $row[product_inventory]'
      min='1' max='$row[product_inventory]'>
   </td><td>
   TBA
   </td><td>
     <p>
       <input class='w3-button w3-teal w3-small w3-border w3-border-black'
        style='width: 150px'
        type='submit' value='Add to cart'></p>
     <p><a class='w3-button w3-teal w3-small w3-border w3-border-black'
        style='width: 150px'
        href='pages/productCatalog.php'>
        Continue shopping</a></p>
   </td>
 </tr>";
}

function displayFooter($grandTotal)
{
  $grandTotalAsString = sprintf("$%1.2f", $grandTotal);
  $rowColor = getRowColor();
  echo
    "<tr class='$rowColor'>
       <td colspan='5'>
         <p class='w3-left-align'>Grand Total:</p>
       </td><td>
         <p class='w3-right-align'><strong>$grandTotalAsString</strong>
       </td><td>
         <p><a class='w3-button w3-teal w3-border w3-border-black w3-small'
             href='pages/checkout.php'>
             Proceed to checkout</a></p>
       </td>
     </tr>
   </table>
</form>";
}

/* NOTE(nclowes): I realize, in hindsight, that this can be achieved with
   CSS, but that would require refactoring for which we do not have time.
*/

/*getRowColor()
  Get a number value for alternative between table row colors.
*/
function getRowColor()
{
  global $colorSwitch;
  $colorSwitch = 1 - $colorSwitch;

  return ($colorSwitch == 0) ? "w3-amber" : "w3-yellow";
}
?>
