<?php include("../common/document_head.html"); ?>
  <!-- estore.php -->
  <body class="Body w3-auto">
    <header class="w3-container">
      <?php
        include("../common/banner.php");
        include("../common/menus.html");
      ?>
  </header>
    <main class="w3-container">
      <div class="w3-container w3-border-left w3-border-right w3-border-black w3-light-grey">
        <div class="w3-center">
          <h2>Choose from our variety of tools.</h2>
        </div>
          <p><button class="w3-button w3-block w3-teal" onclick="window.location.href = 'pages/productcatalog1.php';">Automotive</button></p>
          <p><button class="w3-button w3-block w3-yellow" onclick="window.location.href = 'pages/productcatalog2.php';">Gardening</button></p>
          <p><button class="w3-button w3-block w3-teal" onclick="window.location.href = 'pages/productcatalog3.php';">Home Improvement</button></p>
      </div>
    </main>
    <footer class="w3-container">
      <div class="w3-bar w3-center w3-teal">
        <?php include("../common/footer_content.html"); ?>
      </div>
    </footer>
  </body>
</html>
