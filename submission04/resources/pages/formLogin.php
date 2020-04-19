<?php include("../common/document_head.html");
//formLogin.php
session_start();
if (isset($_SESSION['customer_id']))
{
    header('Location: estore.php');
}
$retrying = isset($_GET['retrying']);
include("../common/document_head.html");
?>
  <body class="Body w3-auto">
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
          <h4 class="w3-center">
            <strong>Login Form</strong>
          </h4>
          <p class="w3-center w3-red w3-padding">Important Note</p>
          <p>
            <span class="w3-padding-16">
              Use of our online services requires a login. If you do not yet
              have an account, you must
              <a href="pages/formRegistration.php">register here</a>.
            </span>
          </p>
          <form id="loginForm" action="scripts/formLoginProcess.php"
          method="post" autocomplete="on">
            <div class="w3-row w3-section">
              <div class="w3-quarter w3-container">
                Login Name:
              </div>
              <div class="w3-threequarter w3-container w3-wide">
                <input type="text" name="loginName" required=""
                  style="width: 90%" value=""
                  placeholder="Must be name assigned at registration">
              </div>
              <div class="w3-quarter w3-container">
                Password:
              </div>
              <div class="w3-threequarter w3-container w3-wide">
                <input type="password" name="loginPassword" required=""
                style="width: 90%;" value=""
                placeholder="Must be password chosen at registration">
              </div>
            </div>
            <div class="w3-row w3-section">
              <div class="w3-quarter w3-container">
              </div>
              <div class="w3-threequarter w3-container">
                <input type="submit" value="Log in">
                <input type="reset" value="Reset Form">
              </div>
            </div>
            <div class="w3-row">
            <?php if ($retrying) { ?>
              <p class="w3-red w3-padding">
              Login failed. An invalid username or password was entered.
              Please try again.
              </p>
            <?php } ?>
            </div>
          </form>
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
