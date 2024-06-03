<?php
	session_start();

    header('Content-Type: text/html; charset=utf-8');

	$_value = file_get_contents('files/'.$_POST['nome'].'/valor.txt');

	//gravar nos ficheiros as informacoes enviadas como post
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){

		
		if (isset($_POST['nome'])  && isset($_POST['valor'])){
				
				if ($_value != $_POST['valor']){
					
					file_put_contents('files/'.$_POST['nome'].'/valor.txt', $_POST['valor']);
                    file_put_contents('files/'.$_POST['nome'].'/log.txt',$_POST['nome'] .','. date(' d/m/Y h:i:s ', time()) .','. $_POST['valor'].PHP_EOL,FILE_APPEND);
					file_put_contents('files/'.$_POST['nome'].'/data.txt', date(' d/m/Y h:i:s ', time()));}
                                        
                    echo("POST foi reconhecido!");
		}else{
			echo'algo correu mal, POST chegou vazio';

		}
	
	  //Metodo GET
    } elseif($_SERVER["REQUEST_METHOD"] == 'GET'){
		echo("GET foi reconhecido!");
		echo file_get_contents('files/'.$_POST['nome'].'/valor.txt');
	}else{
       echo("Método não foi reconhecido!");
      }

	   //volta automaticamente para a pagina anterior
	if (isset($_SERVER['HTTP_REFERER']))
	header('Location: ' . $_SERVER['HTTP_REFERER']);

