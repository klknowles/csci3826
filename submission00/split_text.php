<?php
  echo "Programmed by Kendrick Knowles and Nathan Clowes"
       . "\n"
       . "================================================";

  $words = file_get_contents($argv[1]);
  $words = preg_split('/\W+/', $words, null, PREG_SPLIT_NO_EMPTY);
  sort($words);
  $words_count = array_fill_keys(array_unique($words), 0);

  foreach ($words as $word) {
    $words_count[$word]++;
  }

  foreach ($words_count as $word => $count) {
    echo "\n$word...$count";
  }

  echo "\n";
?>
