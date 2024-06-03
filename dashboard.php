<?php

session_start();
//Verifica se a variável username está definida
//Caso contrário mostra a mensagem "Acesso restrito!" na função "die" e pára a execução do script

if (!isset($_SESSION['username'])) {
  header("refresh:0;url=index.php");
  die("Acesso restrito!");
}



$atuador1_valor = file_get_contents('api/files/luzes/valor.txt');
$atuador2_valor = file_get_contents('api/files/ventilacao/valor.txt');
$atuador3_valor = file_get_contents('api/files/rega/valor.txt');

$atuador1_hora = file_get_contents('api/files/luzes/hora.txt');
$atuador2_hora = file_get_contents('api/files/ventilacao/hora.txt');
$atuador3_hora = file_get_contents('api/files/rega/hora.txt');

$atuador1_data = file_get_contents('api/files/luzes/data.txt');
$atuador2_data = file_get_contents('api/files/ventilacao/data.txt');
$atuador3_data = file_get_contents('api/files/rega/data.txt');

$sensor1_valor = file_get_contents('api/files/temperatura/valor.txt');
$sensor2_valor = file_get_contents('api/files/humidade/valor.txt');
$sensor3_valor = file_get_contents('api/files/humidadesolo/valor.txt');

$sensor1_hora = file_get_contents('api/files/temperatura/hora.txt');
$sensor2_hora = file_get_contents('api/files/humidade/hora.txt');
$sensor3_hora = file_get_contents('api/files/humidadesolo/hora.txt');

$sensor1_data = file_get_contents('api/files/temperatura/data.txt');
$sensor2_data = file_get_contents('api/files/humidade/data.txt');
$sensor3_data = file_get_contents('api/files/humidadesolo/data.txt');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

     <!-- Link css-->
     <link rel="stylesheet" href="css/style.css">
    <title>Estufa inteligente</title>
</head>
<body>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sombra">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Home</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">

            <li class="nav-item active">
                <a class="nav-link" href="historico.php">Histórico </a>
              </li>

          </ul>
          
        </div>
        <a class="btn btn-outline-danger" href="logout.php" type="submit">LogOut</a>
        </div>
        
      </nav>

      <br><h2>Bem vindo <?= $_SESSION['username'] ?> !</h2><br>
    

      <!-- 1º grupo de Cards/Grupo dos sensores -->
      <Section>
        <div class= "container">
      <div class="card-deck">
        
        <div class="card">
        <div class= "cardimg">
          <br>
        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-thermometer-half" viewBox="0 0 16 16">
        <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415"/>
        <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1"/>
        </svg></div>
        
          <div class="card-body">
            <h5 class="card-title">Temperatura</h5>
            <p class="card-text">Leitura:  <?= $sensor1_valor ?></p>
          </div>
          <div class="card-footer ">
            <small class="text-muted"><p>Ultima atualização <?= $sensor1_data ?></p></small>
          </div>
        </div>
        

        <div class="card">
        <div class= "cardimg">
          <br>
          <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-moisture" viewBox="0 0 16 16">
          <path d="M13.5 0a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V7.5h-1.5a.5.5 0 0 0 0 1H15v2.75h-.5a.5.5 0 0 0 0 1h.5V15h-1.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 .5-.5V.5a.5.5 0 0 0-.5-.5zM7 1.5l.364-.343a.5.5 0 0 0-.728 0l-.002.002-.006.007-.022.023-.08.088a29 29 0 0 0-1.274 1.517c-.769.983-1.714 2.325-2.385 3.727C2.368 7.564 2 8.682 2 9.733 2 12.614 4.212 15 7 15s5-2.386 5-5.267c0-1.05-.368-2.169-.867-3.212-.671-1.402-1.616-2.744-2.385-3.727a29 29 0 0 0-1.354-1.605l-.022-.023-.006-.007-.002-.001zm0 0-.364-.343zm-.016.766L7 2.247l.016.019c.24.274.572.667.944 1.144.611.781 1.32 1.776 1.901 2.827H4.14c.58-1.051 1.29-2.046 1.9-2.827.373-.477.706-.87.945-1.144zM3 9.733c0-.755.244-1.612.638-2.496h6.724c.395.884.638 1.741.638 2.496C11 12.117 9.182 14 7 14s-4-1.883-4-4.267"/>
         </svg></div>
        
          <div class="card-body">
            <h5 class="card-title">Humidade</h5>
            <p class="card-text">Leitura: <?= $sensor2_valor ?></p>
          </div>
          <div class="card-footer">
            <small class="text-muted"><p>Ultima atualização <?= $sensor2_data ?> </p></small>
          </div>
        </div>

        <div class="card">
        <div class= "cardimg">
          <br>
          <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-globe-asia-australia" viewBox="0 0 16 16">
          <path d="m10.495 6.92 1.278-.619a.483.483 0 0 0 .126-.782c-.252-.244-.682-.139-.932.107-.23.226-.513.373-.816.53l-.102.054c-.338.178-.264.626.1.736a.48.48 0 0 0 .346-.027ZM7.741 9.808V9.78a.413.413 0 1 1 .783.183l-.22.443a.6.6 0 0 1-.12.167l-.193.185a.36.36 0 1 1-.5-.516l.112-.108a.45.45 0 0 0 .138-.326M5.672 12.5l.482.233A.386.386 0 1 0 6.32 12h-.416a.7.7 0 0 1-.419-.139l-.277-.206a.302.302 0 1 0-.298.52z"/>
          <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0M1.612 10.867l.756-1.288a1 1 0 0 1 1.545-.225l1.074 1.005a.986.986 0 0 0 1.36-.011l.038-.037a.88.88 0 0 0 .26-.755c-.075-.548.37-1.033.92-1.099.728-.086 1.587-.324 1.728-.957.086-.386-.114-.83-.361-1.2-.207-.312 0-.8.374-.8.123 0 .24-.055.318-.15l.393-.474c.196-.237.491-.368.797-.403.554-.064 1.407-.277 1.583-.973.098-.391-.192-.634-.484-.88-.254-.212-.51-.426-.515-.741a7 7 0 0 1 3.425 7.692 1 1 0 0 0-.087-.063l-.316-.204a1 1 0 0 0-.977-.06l-.169.082a1 1 0 0 1-.741.051l-1.021-.329A1 1 0 0 0 11.205 9h-.165a1 1 0 0 0-.945.674l-.172.499a1 1 0 0 1-.404.514l-.802.518a1 1 0 0 0-.458.84v.455a1 1 0 0 0 1 1h.257a1 1 0 0 1 .542.16l.762.49a1 1 0 0 0 .283.126 7 7 0 0 1-9.49-3.409Z"/>
          </svg></div>
        
          <div class="card-body">
            <h5 class="card-title">Humidade do solo</h5>
            <p class="card-text">Leitura: <?= $sensor3_valor ?></p>
          </div>
          <div class="card-footer">
            <small class="text-muted"><p>Ultima atualização <?= $sensor3_data ?> </p></small>
          </div>
        </div>
      </div><br>

      

    
        <!-- 2º grupo de Cards/Grupo dos atuadores -->

        <div class="card-deck">

            <div class="card ">
              <div class= "cardimg">
              <br>
            <?php

                    if( $atuador1_valor == 1){
                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">
                            <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1"/>
                            </svg>';
                   }else{
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-lightbulb-fill" viewBox="0 0 16 16">
                          <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13h-5a.5.5 0 0 1-.46-.302l-.761-1.77a2 2 0 0 0-.453-.618A5.98 5.98 0 0 1 2 6m3 8.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1-.5-.5"/>
                          </svg>';
                   } ?>
              </div>
            
            

              <div class="card-body">
                <h5 class="card-title">Luzes</h5>
                <p class="card-text">Estado:
                   <?php

                    if( $atuador1_valor == 1){
                      echo "ON";
                   }else{
                    echo"OFF";
                   } ?>
                  
                  </p>
                  <form action="btnAtuadores.php" method="post">
                    <input name="nomeAt" value="luzes" type="hidden">
                    <input class="btn btn-outline-success" name="ON" type="submit" value="ON">
                    <input class="btn btn-outline-danger" name="OFF" type="submit" value="OFF">
                  </form><br>
        
  
              </div>
              <div class="card-footer">
                <small class="text-muted"><p>Ultima atualização <?= $atuador1_data ?></p></small>
              </div>
            </div>
    
            <div class="card">
            <div class= "cardimg">
          <br>
          <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-fan" viewBox="0 0 16 16">
          <path d="M10 3c0 1.313-.304 2.508-.8 3.4a2 2 0 0 0-1.484-.38c-.28-.982-.91-2.04-1.838-2.969a8 8 0 0 0-.491-.454A6 6 0 0 1 8 2c.691 0 1.355.117 1.973.332Q10 2.661 10 3m0 5q0 .11-.012.217c1.018-.019 2.2-.353 3.331-1.006a8 8 0 0 0 .57-.361 6 6 0 0 0-2.53-3.823 9 9 0 0 1-.145.64c-.34 1.269-.944 2.346-1.656 3.079.277.343.442.78.442 1.254m-.137.728a2 2 0 0 1-1.07 1.109c.525.87 1.405 1.725 2.535 2.377q.3.174.605.317a6 6 0 0 0 2.053-4.111q-.311.11-.641.199c-1.264.339-2.493.356-3.482.11ZM8 10c-.45 0-.866-.149-1.2-.4-.494.89-.796 2.082-.796 3.391q0 .346.027.678A6 6 0 0 0 8 14c.94 0 1.83-.216 2.623-.602a8 8 0 0 1-.497-.458c-.925-.926-1.555-1.981-1.836-2.96Q8.149 10 8 10M6 8q0-.12.014-.239c-1.02.017-2.205.351-3.34 1.007a8 8 0 0 0-.568.359 6 6 0 0 0 2.525 3.839 8 8 0 0 1 .148-.653c.34-1.267.94-2.342 1.65-3.075A2 2 0 0 1 6 8m-3.347-.632c1.267-.34 2.498-.355 3.488-.107.196-.494.583-.89 1.07-1.1-.524-.874-1.406-1.733-2.541-2.388a8 8 0 0 0-.594-.312 6 6 0 0 0-2.06 4.106q.309-.11.637-.199M8 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2"/>
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
          </svg></div>
            
              <div class="card-body">
                <h5 class="card-title">Ventilação</h5>
              
                <p class="card-text">Estado:
                   <?php

                    if( $atuador2_valor == 1){
                      echo "ON";
                   }else{
                    echo"OFF";
                   } ?>
                  
                  </p>
                  <form action="btnAtuadores.php" method="post">
                    <input name="nomeAt" value="ventilacao" type="hidden">
                    <input class="btn btn-outline-success" name="ON" type="submit" value="ON">
                    <input class="btn btn-outline-danger" name="OFF" type="submit" value="OFF">
                  </form><br>
              </div>
              <div class="card-footer">
                <small class="text-muted"><p>Ultima atualização <?= $atuador2_data ?></p></small>
              </div>
            </div>
    
            <div class="card">
            <div class= "cardimg">
              <br>
            <?php

                    if( $atuador3_valor == 1){
                      echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-droplet" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M7.21.8C7.69.295 8 0 8 0q.164.544.371 1.038c.812 1.946 2.073 3.35 3.197 4.6C12.878 7.096 14 8.345 14 10a6 6 0 0 1-12 0C2 6.668 5.58 2.517 7.21.8m.413 1.021A31 31 0 0 0 5.794 3.99c-.726.95-1.436 2.008-1.96 3.07C3.304 8.133 3 9.138 3 10a5 5 0 0 0 10 0c0-1.201-.796-2.157-2.181-3.7l-.03-.032C9.75 5.11 8.5 3.72 7.623 1.82z"/>
                            <path fill-rule="evenodd" d="M4.553 7.776c.82-1.641 1.717-2.753 2.093-3.13l.708.708c-.29.29-1.128 1.311-1.907 2.87z"/>
                            </svg>';
                   }else{
                    echo '<svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-droplet-fill" viewBox="0 0 16 16">
                          <path d="M8 16a6 6 0 0 0 6-6c0-1.655-1.122-2.904-2.432-4.362C10.254 4.176 8.75 2.503 8 0c0 0-6 5.686-6 10a6 6 0 0 0 6 6M6.646 4.646l.708.708c-.29.29-1.128 1.311-1.907 2.87l-.894-.448c.82-1.641 1.717-2.753 2.093-3.13"/>
                          </svg>';
                   } ?>
              </div>
              <div class="card-body">
                <h5 class="card-title">Rega</h5>
               
                <p class="card-text">Estado:
                   <?php

                    if( $atuador3_valor == 1){
                      echo "ON";
                   }else{
                    echo"OFF";
                   } ?>
                  
                  </p>
                  <form action="btnAtuadores.php" method="post">
                    <input name="nomeAt" value="rega" type="hidden">
                    <input class="btn btn-outline-success" name="ON" type="submit" value="ON">
                    <input class="btn btn-outline-danger" name="OFF" type="submit" value="OFF">
                  </form><br>
              </div>
              <div class="card-footer">
                <small class="text-muted"><p>Ultima atualização <?= $atuador3_data ?></p></small>
              </div>
            </div>
          </div>
          </div>
        </Section>
 



      
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

</body>
</html>