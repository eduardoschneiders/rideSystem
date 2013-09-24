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
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
      session_start();

      if($_SESSION['logged']){
        $login = '<li><img src="Photos/People/' . $_SESSION["userPhoto"] . '"></li>
                  <li><a href="addTravel.php">Cadastrar Viagem</a></li>
                  <li><a href="addCar.php">Cadastrar Carro</a></li>';
      }else{
        $login = '<li><a href="addPerson.php">Cadastrar-se</a></li>
                  <li><a href="login.php">Login</a></li>';
      }

      $html = '
        <header>
          <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
              <div class="container">
                <a class="brand" href="./">
                  <span class="branco">ride</span><span class="laranja">System</span>
                </a>
                <div class="nav-collapse">
                  <ul class="nav">
                    <li class="active"><a href="./">Hommer</a></li>
                    <li><a href="showTravels.php?driver=' . $_SESSION['userId'] . '">Minhas Caronas</a></li>
                    <li><a href="#about">Sobre</a></li>
                    <li><a href="#contact">Contato</a></li>
                  </ul>

                  <ul class="nav pull-right login">
                    ' . $login . '
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
