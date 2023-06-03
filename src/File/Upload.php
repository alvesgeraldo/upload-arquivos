<?php

namespace App\File;

class Upload
{

  private string $name;
  private string $extension;
  private string $type;
  private string $tmpName;
  private string $error;
  private int $size;

  public function __construct(array $files)
  {
    $this->type = $files['type'];
    $this->tmpName = $files['tmp_name'];
    $this->error = $files['error'];
    $this->size = $files['size'];

    $info = pathinfo($files['name']);
    $this->name = $info['filename'];
    $this->extension = $info['extension'];
  }

  private function getBaseName():string
  {
    $extension = strlen($this->extension) ? '.'.$this->extension : '';

    return $this->name.$extension;
  }

  public function upload(string $dir)
  {
    if ($this->error != 0) return false;

    $path = $dir.'/'.$this->getBaseName();
    
    return move_uploaded_file($this->tmpName, $path);
  }
}