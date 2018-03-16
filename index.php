<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Criptomonedas</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"></link>
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/vue.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">CRIPTOMONEDAS</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="/">Inicio <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?current=price">Evolucion Precios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="?current=delete">Eliminar Criptomoneda</a>
              </li>
            </ul>
          </div>
        </nav>
        <div class="container-fluid" id="app">
                <div class="row justify-content-sm-center">

                    <?php
                        if(isset($_GET['current']))
                        {
                            switch ($_GET['current']) {
                                case 'price':
                                    include "includes/_price.php";
                                    break;
                                case 'delete':
                                    include "includes/_delete.php";
                                    break;

                                default:
                                    include "includes/_404.php";
                                    break;
                            }
                        }else {
                            include "includes/_inicio.php";
                        }
                     ?>
                </div>
        </div>

        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>
