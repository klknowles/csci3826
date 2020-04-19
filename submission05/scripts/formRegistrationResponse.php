<?php
//registrationFormResponse.php
include("../common/document_head.html");
?>
  <body class="w3-auto" style="max-width: 750px">
    <header class="w3-container">
      <?php
        include("../common/banner.php");
        include("../common/menus.html");
        include("../scripts/connectToDatabase.php");
      ?>
    </header>
    <main class="w3-container">
      <div class="w3-container w3-border-left w3-border-right w3-border-black
      w3-yellow">
        <article>
          <?php
            include("../scripts/formRegistrationProcess.php");
          ?>
        </article>
      </div>
    </main>
    <footer class="w3-container">
      <div class="w3-bar w3-center w3-teal">
        <?php include("../common/footer_content.html"); ?>
      </div>
    </footer>
  </body>
</html>

