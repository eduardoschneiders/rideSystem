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

    public function footer(){
      $html = '
          </body>
        </html>
      ';

      return $html;
    }

    public function head(){
      $html = '
        <link type="text/css" rel="stylesheet" href="Css/layout.css" />
        <link type="text/css" rel="stylesheet" href="Css/bootstrap-responsive.css" />
        <link type="text/css" rel="stylesheet" href="Css/bootstrap-responsive.min.css" />
        <link type="text/css" rel="stylesheet" href="Css/bootstrap.css" />
        <link type="text/css" rel="stylesheet" href="Css/bootstrap.min.css" />

        <script type="text/javascript" src="Js/bootstrap.js"></script>
        <script type="text/javascript" src="Js/bootstrap.min.js"></script>
      ';

      return $html;
    }




  }
