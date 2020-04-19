      <div class="w3-border w3-border-black w3-yellow">
        <div id="logo" class="w3-half w3-center">
          <img src="images/logo.png" alt="JaCoT Logo"
            style="width: 100%">
        </div>
        <div class="w3-half w3-right-align">
          <div class="w3-panel">
            <?php
            include(dirname(__DIR__)."/scripts/welcome.php");
            include(dirname(__DIR__)."/scripts/datetime.php");
            include(dirname(__DIR__)."/scripts/logButton.php");
            include(dirname(__DIR__)."/scripts/quote.php");
            ?>
          </div>
        </div>
        <script src="scripts/datetime.js"></script>
