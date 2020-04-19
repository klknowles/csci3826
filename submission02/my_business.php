  <?php include("common/document_head.html"); ?>
  <!-- my_business.php -->
  <body class="Body w3-auto">
    <header class="w3-container">
        <?php
          include("common/banner.php");
          include("common/menus.html");
        ?>
    </header>
    <main class="w3-container">
      <div class="w3-container w3-border-left w3-border-right
        w3-border-black w3-yellow" style="padding-right:0">
        <article class="w3-half">
          <h3>
            Welcome to Just a Couple of Tools!
          </h3>
          <p>Founded in 2020, by a couple of university students suffering
             from crippling student debt, Just a Couple of Tools was created
             after binge-watching every episode of Home Improvement. The
             classic series sitcom was the inspiration to establish an online
             store and community for finding the best tools for the coolest
             jobs.
          </p>
          <p>So, come check us out! We definitely have what you're looking
             for.
          </p>
        </article>
        <?php
          include("resources/slideshow_images.html");
        ?>
      </div>
    </main>
    <footer class="w3-container">
      <div class="w3-bar w3-center w3-teal">
        <?php
        include("common/footer_content.html");
        ?>
      </div>
    </footer>
  </body>
</html>
