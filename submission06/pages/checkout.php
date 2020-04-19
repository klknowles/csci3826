<?php
//checkout.php
session_start();
if (!preg_match('/shoppingCart.php/', $_SERVER['HTTP_REFERER']))
  header("Location: shoppingCart.php?productID=view");
$customerID = $_SESSION['customer_id'];
include("../common/document_head.html");
?>
  <body class="Body w3-auto" style="max-width: 750px">
    <header class="w3-container">
      <?php
      include("../common/banner.php");
      include("../common/menus.html");
      include("../scripts/connectToDatabase.php");
      ?>
    </header>
    <main class="w3-container">
      <div class="w3-container w3-border-left w3-border-rightw3-border-black
      w3-yellow">
        <article>
          <?php
          include("../scripts/checkoutProcess.php");
          ?>
        </article>
      </div>
    </main>
    <footer class='w3-container'>
      <div class="w3-bar w3-center w3-teal">
        <?php include("../common/footer_content.html"); ?>
      </div>
    </footer>
  </body>
</html>
