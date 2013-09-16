<?php

class Util{
  public function redirect($pag){
    echo '<script type="text/javascript">document.location.href="'.$pag.'";</script>';
  }
}