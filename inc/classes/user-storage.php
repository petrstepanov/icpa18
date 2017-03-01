<?php

class UserStorage {

  private $user_dirname;

  function __construct() {
    $current_user = wp_get_current_user();
    $upload_dir = wp_upload_dir();
    $this->user_dirname = $upload_dir['basedir'].'/'.$current_user->user_login;
  }

  private function checkFolderExists($dirname){
    if ( ! file_exists( $dirname ) ) {
      $error = new WP_Error( 'user_has_no_files', __( 'Directory <strong>' . $dirname . '</strong> does not exist.' ) );
      return $error;
    }
  }

  public function getFilenamesList() {
    if (is_wp_error($error = $this->checkFolderExists($this->user_dirname))) {
      return $error;
    }
    $pattern = ($this->user_dirname) . "/*.*";
    $filesArray = array();
    $i = 0;
    foreach (glob( $pattern ) as $filename) {
        $file = array("name" => basename($filename), "size" => filesize($filename));
        $filesArray[$i++] = $file;
    }
    return $filesArray;
  }

  public function saveFile($file) {
    if ( ! file_exists( $this->user_dirname ) ) {
        wp_mkdir_p( $user_dirname );
    }
    $file_name = basename($file['name']);
    $user_file_path = $this->user_dirname . '/' . $file_name;
    if (!move_uploaded_file($file['tmp_name'], $user_file_path)) {
      $error = new WP_Error( 'move_file_failed', __( 'Something went wrong while we were moving your file. Please give it another try.' ) );
      return $error;
    }
    return 1;
  }

  public function removeFile($file){
    if (is_wp_error($error = $this->checkFolderExists($this->user_dirname))) {
      return $error;
    }
    $file_name = basename($file['name']);
    $user_file_path = $this->user_dirname . '/' . $file_name;
    if (!unlink($user_file_path)){
      $error = new WP_Error( 'delete_file_failed', __( 'Something went wrong while deleting your file. Please try again later.' ) );
      return $error;
    }
    return 1;
  }
}

?>
