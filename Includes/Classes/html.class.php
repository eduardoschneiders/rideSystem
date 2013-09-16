  <?php
  class Html{

    public function header(){
      $html = '
        <html>
          <head>
            ' . $this->head() . '
          </head>
          <body>
            ' . $this->headerArea() . '
            <div class="container">
              <div class="row">
                <div class="span12">
                  <div class="well">
      ';

      return $html;
    }

    public function footer(){
      $html = '
                  </div>
                  ' . $this->footerArea() . '
                </div>
              </div>
            </div>
          </body>
        </html>
      ';

      return $html;
    }

    public function head(){
      $html = '
          <meta charset="utf-8">
          <title>Want a ride? (:</title>
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
          <link href="http://fonts.googleapis.com/css?family=Signika" rel="stylesheet" type="text/css">
          <link href="Css/bootstrap.css" rel="stylesheet">
          <link href="Css/layout.css" rel="stylesheet">

        <script type="text/javascript" src="Js/bootstrap.js"></script>
        <script type="text/javascript" src="Js/bootstrap.min.js"></script>
      ';

      return $html;
    }

    private function headerArea(){
      $html = '
        <header>
          <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
              <div class="container">
                <a class="brand" href="#">
                  <span class="branco">ride</span><span class="laranja">System</span>
                </a>
                <div class="nav-collapse">
                  <ul class="nav">
                    <li class="active"><a href="#">Hommer</a></li>
                    <li><a href="#">Caronas</a></li>
                    <li><a href="#about">Sobre</a></li>
                    <li><a href="#contact">Contato</a></li>
                  </ul>

                  <ul class="nav pull-right login">
                    <li><a href="#">Login</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </header>
      ';

      return $html;
    }

    private function footerArea(){
      $html = '
        <footer>
          <p>@ rideSystem ;-)</p>
        </footer>
      ';

      return $html;
    }




  }
