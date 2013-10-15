<?php

class Util{
  public function redirect($pag){
    echo '<script type="text/javascript">document.location.href="'.$pag.'";</script>';
  }

  public function uniqId(){
    return md5(microtime());
  }

  public function getPage(){
    return end(explode('/', $_SERVER['SCRIPT_FILENAME']));
  }

  public function convertDate($date){
    $returnData = substr($date, 8, 2) . '/';
    $returnData .= substr($date, 5, 2) . '/';
    $returnData .= substr($date, 0, 4);
    return $returnData;
  }

  public function pr($val){
    echo "<pre>";
    print_r($val);
    echo "</pre>";
  }
}