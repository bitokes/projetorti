<?php

if($_POST['ON']){

    file_put_contents('api/files/'.$_POST['nomeAt'].'/valor.txt', '1');
    file_put_contents('api/files/atuador1/log.txt',"ON" .' ,'. date(' d/m/Y h:i:s ', time()) .PHP_EOL,FILE_APPEND );
    file_put_contents('api/files/atuador1/data.txt', date(' d/m/Y h:i:s ', time()));
}elseif($_POST['OFF']){
    file_put_contents('api/files/'.$_POST['nomeAt'].'/valor.txt', '0');
    file_put_contents('api/files/'.$_POST['nomeAt'].'/log.txt',"ON" .' ,'. date(' d/m/Y h:i:s ', time()) .PHP_EOL,FILE_APPEND );
    file_put_contents('api/files/'.$_POST['nomeAt'].'/data.txt', date(' d/m/Y h:i:s ', time()));
}else{
    throw new Exception('Algo correu mal, input não reconhecido', 1);
}

if (isset($_SERVER['HTTP_REFERER']))
	header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>