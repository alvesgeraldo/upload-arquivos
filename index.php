<?php

require __DIR__.'/vendor/autoload.php';

if (isset($_FILES['arquivo'])) {
  echo '<pre>';
  print_r($_FILES);
  echo '</pre>';
}

include __DIR__.'/includes/form.php';