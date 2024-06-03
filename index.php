<!doctype html>
<html lang="en">
<head>

<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link href="css/style.css" rel="stylesheet">
<title>Login Page</title>
</head>
<body>


<!-- Criação do formulário -->
<div class="container">
    <br>
    <form id= "formlogin" class="form" method="post">
      
        <div class="mb-2">
        <label for="exampleInputEmail1" class="form-label"><b>Username</b></label>
            <input type="text" placeholder="Escreva o username" class="form-control" name="username" id="exampleInputEmail1">
        </div>

        <div class="mb-2">
            <label for="exampleInputPassword1" class="form-label"><b>Password</b></label>
            <input type="password" placeholder="Escreva a senha" class="form-control" name="password" id="exampleInputPassword1">
        </div>
    <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>


<?php

$flag = 0;

// Caminho do ficheiro
$caminhoFicheiro = "credenciais.txt";

//user1 password1
//user2 password2
//user3 password3


// verifica se o ficheiro existe
if (file_exists($caminhoFicheiro)) {
    // Open the file for reading
    $ficheiroAberto = fopen($caminhoFicheiro, "r");

    // Verifica se o ficheiro abriu corretamente
    if ($ficheiroAberto) {
        // le o ficheiro linha a linha até ao fim do ficheiro
        while (($linha = fgets($ficheiroAberto)) !== false) {
            // Divide a linha em user e password
            list($username, $password) = explode(",", trim($linha));

            //aqui começa o processo de autenticação
            if(isset($_POST['username']) && isset($_POST['password'])){
                
                if (password_verify($_POST['password'], $password) && $_POST['username'] == $username){

                        $flag= 0;
                        session_start();
                        $_SESSION['username'] = $username;
                        header( "Location: dashboard.php" );

                }else{
                    $flag = 1;
                    }
            
            }

        }
        if($flag == 1){
            echo "<script>alert('ERRO!! Credênciais erradas');</script>";   
        }

        // Close the file handle
        fclose($ficheiroAberto);
    } else {
        // Mensagem de erro caso não seja possivel abrir o ficheiro
        echo "Erro: Não foi possível abrir o ficheiro.";
    }
} else {
    // Mensagem de erro caso o ficheiro não seja encontrado
    echo "Erro: O ficheiro não foi encontrado.";
}

?>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>