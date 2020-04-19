<?php include("../common/document_head.html"); ?>
<!--feedback.php-->
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
          <h3 class="w3-center">
            Feedback form ... Tell Us What You Think, or Ask Us a Question.
          </h3>
          <form id="contactForm" action="scripts/submitFeedback.php" method="post">
            <div class="w3-row">
              <div class="w3-third w3-container w3-wide">
                <h4>Salutation:</h4>
              </div>
              <div class="w3-twothird w3-container">
                <p>
                  <select name="salutation" required>
                    <option value="" selected disabled hidden>
                      Choose one
                    </option>
                    <option value="Mrs.">Mrs.</option>
                    <option value="Ms.">Ms.</option>
                    <option value="Mr.">Mr.</option>
                    <option value="Dr.">Dr.</option>
                  </select>
                </p>
              </div>
            </div>
            <div class="w3-row">
              <div class="w3-third w3-container w3-wide">
                <h4>First Name:</h4>
              </div>
              <div class="w3-twothird w3-container">
                <p>
                  <input type="text" name="firstName" required
                   title="Initial capital, spaces and hyphens allowed"
                   style="width: 100%;"
                   pattern="^[A-Z][A-Za-z -]*$">
                </p>
              </div>
            </div>
            <div class="w3-row">
              <div class="w3-third w3-container w3-wide">
                <h4>Last Name:</h4>
              </div>
              <div class="w3-twothird w3-container">
                <p>
                  <input type="text" name="lastName" required
                         title="Initial capital, spaces and hyphens allowed"
                         style="width: 100%;"
                         pattern="^[A-Z][A-Za-z -]*$">
                </p>
              </div>
            </div>
            <div class="w3-row">
              <div class="w3-third w3-container w3-wide">
                <h4>E-mail Address:</h4>
              </div>
              <div class="w3-twothird w3-container">
                <p>
                  <input type="text" name="email" required
                  title="x@y.z, x and y can have . or -, z only 2 or 3 letters"
                  style="width: 100%;"
                  pattern="^\w+([.-]?\w+)*@\w+([.-]?\w+)*(\.\w{2,3})$">
                </p>
              </div>
            </div>
            <div class="w3-row">
              <div class="w3-third w3-container w3-wide">
                <h4>Phone Number:</h4>
              </div>
              <div class="w3-twothird w3-container w3-wide">
                <p>
                  <input type="text" name="phone"
                         title="xxx-yyy-zzzz, area code xxx- optional"
                         style="width: 100%;"
                         pattern="^(\d{3}-)?\d{3}-\d{4}$">
                </p>
              </div>
            </div>
            <div class="w3-row">
              <div class="w3-third w3-container w3-wide">
                <h4>Subject:</h4>
              </div>
              <div class="w3-twothird w3-container">
                <p><input type="text" name="subject" required
                          style="width: 100%;">
                </p>
              </div>
            </div>
            <div class="w3-row">
              <div class="w3-third w3-container w3-wide">
                <h4>Comments:</h4>
              </div>
              <div class="w3-twothird w3-container">
                <p><textarea name="message" rows="6" required
                             style="width: 100%;"></textarea>
                </p>
              </div>
            </div>
            <div class="w3-row">
              <div class="w3-third w3-container">
                <p>&nbsp;</p>
              </div>
              <div class="w3-twothird w3-container">
                <h6>
                  Please check if you would like us to get
                  back to you: <input type="checkbox" name="reply">
                </h6>
              </div>
            </div>
            <div class="w3-row">
              <div class="w3-third w3-container">
                <p>&nbsp;</p>
              </div>
              <div class="w3-twothird w3-container">
                <p>
                  <input type="submit"
                         value="Send Feedback">
                  <input type="reset"
                         value="Reset Form">
                </p>
              </div>
            </div>
          </form>
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
</html


