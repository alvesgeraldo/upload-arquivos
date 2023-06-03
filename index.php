<?php

require __DIR__.'/vendor/autoload.php';

use App\File\Upload;

if (isset($_FILES['arquivo'])) {
  $obj = new Upload($_FILES['arquivo']);
  $success = $obj->upload(__DIR__.'/files');

  if ($success) {
    echo 'Arquivo enviado com sucesso!';
    exit;
  }

  echo 'Problemas ao enviar o arquivo!';
}

include __DIR__.'/includes/form.php';