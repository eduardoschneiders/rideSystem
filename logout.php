<?php
  include('Includes/config.php');
  session_destroy();
  session_unset();

  Util::redirect('index.php');
?>

