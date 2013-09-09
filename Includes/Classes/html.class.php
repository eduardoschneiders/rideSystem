  <?php
  class Html{

    public function header(){
      $html = '
        <html>
          <head>
            ' . $this->head() . '
          </head>
          <body>

      ';

      return $html;
    }

    public function head(){
      $html = '
        <link type="text/css" rel="stylesheet" href="Css/Geral.css" />
      ';

      return $html;
    }

    public function footer(){
      $html = '
          </body>
        </html>
      ';

      return $html;
    }



  }
