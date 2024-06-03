<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

<!-- Link css-->
<link rel="stylesheet" href="css/style.css">
    <title>Historico</title>
</head>
<body>

 <!-- NavBar -->
 <nav class="navbar navbar-expand-lg navbar-light bg-light sombra">
        <a class="navbar-brand" href="dashboard.php">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">

           

          </ul>
        </div>
      </nav>

      <br><h4>Aqui pode consultar os historicos dos sensores e atuadores</h4><br>

<section>

<div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button type="button" id="btnHistorico" class="btn btn-info" data-toggle="collapse" data-target="#demo1">
        Temperatura
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div id="demo1" class="collapse">
        
            <div class="container">

            <div class="card">
                <table class="table table-borderless table-striped">
                    <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Sensor</th>
                        <th scope="col">Data</th>
                        <th scope="col">Valor</th>
                    </tr>

                    </thead>

                    <tbody>

                    <?php 
                    
                    $delimiter =",";
                    $content = file("api/files/temperatura/log.txt");

                    $i=1;

                    if (filesize("api/files/temperatura/log.txt") < 10 ){

                        $historico ='
                            <tr>
                                <th scope="row">1</th>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr> ';
                    }else {
                        foreach ($content as $row) {
                            list($nome, $data, $valor) = explode($delimiter, $row);
                            echo '
                                    <tr>
                                        <th scope="row">' . $i .'</th>
                                        <td>' . $nome . '</td>
                                        <td>' . $data . '</td>
                                        <td>' . $valor . '</td>
                                    </tr> ';

                                    

                        $i++;

                        }

                    }?>

                    </tbody>

                </table>

            </div>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo2">
        Humidade
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div id="demo2" class="collapse">
        
        <div class="container">

        <div class="card">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Sensor</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                </tr>

                </thead>

                <tbody>

                <?php 
                
                $delimiter =",";
                $content = file("api/files/humidade/log.txt");

                $i=1;

                if (filesize("api/files/humidade/log.txt") < 10 ){

                    $historico ='
                        <tr>
                            <th scope="row">1</th>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr> ';
                }else {
                    foreach ($content as $row) {
                        list($nome, $data, $valor) = explode($delimiter, $row);
                        echo '
                                <tr>
                                    <th scope="row">' . $i .'</th>
                                    <td>' . $nome . '</td>
                                    <td>' . $data . '</td>
                                    <td>' . $valor . '</td>
                                </tr> ';

                                

                    $i++;

                    }

                }?>

                </tbody>

            </table>

        </div>
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo3">
        Humidade do Solo
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div id="demo3" class="collapse">
        
        <div class="container">

        <div class="card">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Sensor</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                </tr>

                </thead>

                <tbody>

                <?php 
                
                $delimiter =",";
                $content = file("api/files/humidadesolo/log.txt");

                $i=1;

                if (filesize("api/files/humidadesolo/log.txt") < 10 ){

                    $historico ='
                        <tr>
                            <th scope="row">1</th>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr> ';
                }else {
                    foreach ($content as $row) {
                        list($nome, $data, $valor) = explode($delimiter, $row);
                        echo '
                                <tr>
                                    <th scope="row">' . $i .'</th>
                                    <td>' . $nome . '</td>
                                    <td>' . $data . '</td>
                                    <td>' . $valor . '</td>
                                </tr> ';

                                

                    $i++;

                    }

                }?>

                </tbody>

            </table>

        </div>
              </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo4">
        Luzes
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div id="demo4" class="collapse">
        
        <div class="container">

        <div class="card">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Sensor</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                </tr>

                </thead>

                <tbody>

                <?php 
                
                $delimiter =",";
                $content = file("api/files/luzes/log.txt");

                $i=1;

                if (filesize("api/files/luzes/log.txt") < 10 ){

                    $historico ='
                        <tr>
                            <th scope="row">1</th>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr> ';
                }else {
                    foreach ($content as $row) {
                        list($nome, $data, $valor) = explode($delimiter, $row);
                        echo '
                                <tr>
                                    <th scope="row">' . $i .'</th>
                                    <td>' . $nome . '</td>
                                    <td>' . $data . '</td>
                                    <td>' . $valor . '</td>
                                </tr> ';

                                

                    $i++;

                    }

                }?>

                </tbody>

            </table>

        </div>
              </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo5">
        Rega
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div id="demo5" class="collapse">
        
        <div class="container">

        <div class="card">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Sensor</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                </tr>

                </thead>

                <tbody>

                <?php 
                
                $delimiter =",";
                $content = file("api/files/rega/log.txt");

                $i=1;

                if (filesize("api/files/rega/log.txt") < 10 ){

                    $historico ='
                        <tr>
                            <th scope="row">1</th>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr> ';
                }else {
                    foreach ($content as $row) {
                        list($nome, $data, $valor) = explode($delimiter, $row);
                        echo '
                                <tr>
                                    <th scope="row">' . $i .'</th>
                                    <td>' . $nome . '</td>
                                    <td>' . $data . '</td>
                                    <td>' . $valor . '</td>
                                </tr> ';

                                

                    $i++;

                    }

                }?>

                </tbody>

            </table>

        </div>
              </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button type="button" class="btn btn-info" data-toggle="collapse" data-target="#demo6">
        Ventilação
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
      <div id="demo6" class="collapse">
        
        <div class="container">

        <div class="card">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Sensor</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valor</th>
                </tr>

                </thead>

                <tbody>

                <?php 
                
                $delimiter =",";
                $content = file("api/files/ventilacao/log.txt");

                $i=1;

                if (filesize("api/files/ventilacao/log.txt") < 10 ){

                    $historico ='
                        <tr>
                            <th scope="row">1</th>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr> ';
                }else {
                    foreach ($content as $row) {
                        list($nome, $data, $valor) = explode($delimiter, $row);
                        echo '
                                <tr>
                                    <th scope="row">' . $i .'</th>
                                    <td>' . $nome . '</td>
                                    <td>' . $data . '</td>
                                    <td>' . $valor . '</td>
                                </tr> ';

                                

                    $i++;

                    }

                }?>

                </tbody>

            </table>

        </div>
              </div>
    </div>
  </div>

</div>
</section>




<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</body>
</html>