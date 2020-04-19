<?php include("../common/document_head.html"); ?>
  <!-- estore.php -->
  <body class="Body w3-auto">
    <header class="w3-container">
      <?php
        include("../common/banner.html");
        include("../common/menus.html");
      ?>
    </header>
    <main class="w3-container">
      <div class="w3-container w3-border-left w3-border-right w3-border-black
      w3-yellow" style="padding-right:0">
      <article>
        <h3>
          Welcome to our e-store
        </h3>
        <p>
          Please choose from the following links:
        </p>
        <ul>
          <li>
            To browse our product catalog,
            <a title="Not active yet" href="pages/sorry.html">click here</a>.
          </li>
          <li>
            For existing users: To login,
            <a title="Not yet active" href="pages/sorry.html">click here</a>.
          </li>
          <li>
            For new users: To register,
            <a title="Not yet active" href="pages/sorry.html">click here</a>.
          </li>
          <li>
            For existing users: To log out,
            <a title="Not yet active" href="pages/sorry.html">click here</a>.
          </li>
        </ul>
      </article>
    </main>
    <footer class="w3-container">
      <div class="w3-bar w3-center w3-teal">
        <?php include("../common/footer_content.html"); ?>
      </div>
    </footer>
  </body>
</html>

