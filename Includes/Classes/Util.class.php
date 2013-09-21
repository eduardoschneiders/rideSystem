<?php

class Util{
  public function redirect($pag){
    echo '<script type="text/javascript">document.location.href="'.$pag.'";</script>';
  }

  public function uniqId(){
    return md5(microtime());
  }

  public function pr($val){
    echo "<pre>";
    print_r($val);
    echo "</pre>";
  }
}