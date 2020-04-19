      <div class="w3-border w3-border-black w3-yellow">
        <div id="logo" class="w3-half w3-center">
          <img src="images/logo.png" alt="JaCoT Logo"
            style="width=100%">
        </div>
        <div class="w3-half w3-right-align">
          <div class="w3-panel">
            <h4>Welcome!</h4>
            <?php
            $date = date("l, F jS");
            $time = date("g:ia");
            echo "<h6 id='datetime'>It's $date.<br>";
            echo "Our time is $time.</h6>"
            ?>
            <a class="w3-button w3-teal w3-round" title="Not yet active"
            href="pages/sorry.html">Click here to log in</a>
            <?php
              function get_daily_quote()
              {
                $time = intval(date('z'));
                $json_file_contents = (
                  file_get_contents(dirname(__DIR__)."/resources/quotes.json")
                );
                $quotes_array = json_decode($json_file_contents, true);
                $random_index = ($time % count($quotes_array));

                return $quotes_array[$random_index];
              }
              $quote = get_daily_quote();
              echo '<p id="dailyquote" class="Quote w3-left-align">'.
                   "Today's {$quote['adjective']} quote, from ".
                   "{$quote['name']}: {$quote['quote']}</p>";
            ?>
          </div>
        </div>
        <script src="scripts/datetime.js"></script>
