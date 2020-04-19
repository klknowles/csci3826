<?php
//logout.php
session_start();
$logged_in = isset($_SESSION['customer_id']);
if ($logged_in)
{
  $customer_id = $_SESSION['customer_id'];
  include("../scripts/connectToDatabase.php");
  session_unset();
  session_destroy();
}
include("../common/document_head.html");
?>
  <body class="w3-auto" stle="max-width: 750px">
    <header class="w3-container">
      <?php
      include("../common/banner.php");
      include("../common/menus.html");
      ?>
    </header>
    <main class="w3-container">
      <div class="w3-container w3-border-left w3-border-right w3-border-black
      w3-yellow">
        <article>
          <h4>Logout</h4>
          <p>
            Thank you for visiting our iconic website.
          <br>
            You have successfully logged out.
          </p>
          <p>
            If you want to log back in,
            <a href="pages/formLogin.php">click here</a>.
          </p>
          <p>
            To browse our product catalog,
            <a title="Not yet active" href="pages/sorry.html">click here</a>.
          </p>
        </article>
      </div>
    </main>
    <footer class="w3-container">
      <div class="w3-bar w3-center w3-teal">
      <?php
      include("../common/footer_content.html");
      ?>
      </div>
    </footer>
  </body>
</html>
