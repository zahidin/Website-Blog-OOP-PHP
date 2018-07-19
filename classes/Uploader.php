<?php
require_once 'core/init.php';

class Uploader{
  private $_errors = array(),
          $_passed = false;

  function do_upload(){
    $folder = 'uploads/';
    $file = $folder . basename($_FILES["file_gallery"]['name']);
    $imageFileType = strtolower(pathinfo($file,PATHINFO_EXTENSION));

    $check = getimagesize($_FILES["file_gallery"]["tmp_name"]);

    if($check == false){
      $this->addError('File is not mage');
    }

    if(file_exists("file_gallery")) {
      $this->addError('Sorry, file already exists.');
    }

    if ($_FILES["file_gallery"]["size"] > 500000) {
      $this->addError('Sorry, your file is too large.');
    }

    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
      $this->addError('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
    }

    if(empty($this->_errors)){
      move_uploaded_file($_FILES["file_gallery"]["tmp_name"], $file);
      $this->_passed = true;
    }

    return $this;
  }

  function delete_image($filename)
  {
    $file = "uploads/" . $filename;
    if(unlink($file)){
      return true;
    }else{
      return false;
    }

  }

  function edit_image($nama_file)
  {
    $this->do_upload();
    $this->delete_image($nama_file);

  }

  private function addError($error)
  {
    $this->_errors[] = $error;
  }

  public function errors()
  {
    return $this->_errors;
  }

  public function passed()
  {
    return $this->_passed;
  }

  public function get_namefile(){
    $name_file = basename($_FILES["file_gallery"]["name"]);
    return $name_file;
  }


}
?>
