<?php
  function get_daily_quote()
  {
    include('/var/shared/vendor/autoload.php');
    include($_SERVER["CONTEXT_DOCUMENT_ROOT"] . '/../htpasswd/mongodb.inc');
    $client = new MongoDB\Client(
        "mongodb://".MONGO_USERNAME.":".MONGO_PASSWORD."@".MONGO_SERVER."/"
        .MONGO_DATABASE
    );
    $collection = $client->u06->quotes;

    // Get the day of the year.
    $time = intval(date('z'));

    // Use the modulus operator to get a 'random' value.
    $random_index = ($time % $collection->count());

    return $collection->findOne( [ '_id'=>$random_index ] );
  }

  $quote = get_daily_quote();
  echo '<p id="dailyquote" class="Quote w3-left-align">'.
       "Today's {$quote->adjective} quote, from ".
       "{$quote->name}: {$quote->quote}</p>";
?>
