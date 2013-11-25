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
        <script type="text/javascript" src="Js/jquery-1.10.2.min.js"></script>
      ';

      return $html;
    }

    private function headerArea(){
      session_start();

      switch (Util::getPage()) {
        case 'index.php':
          $active['index'] = 'active';
          break;

        case 'showTravels.php':
          if($_SERVER['QUERY_STRING'])
            $active['showTravels'] = 'active';
          else
            $active['index'] = 'active';

          break;

        case 'showCar.php':
          $active['showCar'] = 'active';
          break;

        case 'addTravel.php':
          $active['addTravel'] = 'active';
          break;

        case 'addCar.php':
          $active['addCar'] = 'active';
          break;

        default:
          # code...
          break;
      }

      if($_SESSION['logged']){

        $photo_path = 'img/no_profile_photo.jpg';
        if ($_SESSION["userPhoto"])
          $photo_path = 'Photos/People/' . $_SESSION["userPhoto"];

        $login = '<li class="' . $active['addTravel'] . '"><a href="addTravel.php">Cadastrar Viagem</a></li>
                  <li class="' . $active['addCar'] . '"><a href="addCar.php">Cadastrar Carro</a></li>
                  <li class="noStyle"><a href="profile.php?idPerson=' . $_SESSION['userId'] . '"><img style="max-width: 25px; max-height: 25px;" src="' . $photo_path . '"></a></li>
                  <li class="noStyle logout"><a href="logout.php"></a></li>';
        $myThings = '
                    <li class="' . $active['showTravels'] . '"><a href="showTravels.php?driver=' . $_SESSION['userId'] . '">Minhas Caronas</a></li>
                    <li class="' . $active['showCar'] . '"><a href="showCar.php">Meu Carro</a></li>';
      }else{
        $login = '<li><a href="profile.php">Cadastrar-se</a></li>
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
                    <li class="' . $active['index'] . '"><a href="./">Hommer</a></li>
                    ' . $myThings . '
                    <li><a href="#about">Sobre</a></li>
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
