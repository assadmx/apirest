<?php
include "config.php";
include "utils.php";


$dbConn =  connect($db);

function palindromo($palabra)
{
    $cadena = $palabra['valor_usuario'];
    $input = explode(" ", strtolower($cadena));
    //echo "esta es la salida";
    //var_dump($input); die();
    $inputdepurado="";
    foreach($input as $c)
    {
        trim($c);
        $inputdepurado .= $c; 
    }
    if($inputdepurado == strrev($inputdepurado))
    {
        return "Es Palindromo";
    }
    else {
        return "No es Palindromo, sorry";
    }
}

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id_palindromo']))
    {
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT * FROM palindromo where id_palindromo=:id_palindromo");
      $sql->bindValue(':id_palindromo', $_GET['id_palindromo']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      exit();
	  }
    else {
      //Mostrar lista de post
      $sql = $dbConn->prepare("SELECT * FROM palindromo");
      $sql->execute();
      $sql->setFetchMode(PDO::FETCH_ASSOC);
      header("HTTP/1.1 200 OK");
      echo json_encode( $sql->fetchAll()  );
      exit();
	}
}

// Crear un nuevo post
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $input = $_POST;
    //$inputjson = json_encode($input);
    //$valor = $input[valor_usuario];
    $validainput=palindromo($input);
    $sql = "INSERT INTO palindromo
          (valor_usuario, valor_salida)
          VALUES
          (:valor_usuario, '".$validainput."')";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if($postId)
    {
      $input['id_palindromo'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
	 }
}

//Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	$id = $_GET['id_palindromo'];
  $statement = $dbConn->prepare("DELETE FROM palindromo where id_palindromo=:id_palindromo");
  $statement->bindValue(':id_palindromo', $id);
  $statement->execute();
	header("HTTP/1.1 200 OK");
	exit();
}

//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = $_GET;
    $postId = $input['id_palindromo'];
    $fields = getParams($input);

    $sql = "
          UPDATE palindromo
          SET $fields
          WHERE id_palindromo='$postId'
           ";

    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);

    $statement->execute();
    header("HTTP/1.1 200 OK");
    exit();
}


//En caso de que ninguna de las opciones anteriores se haya ejecutado
header("HTTP/1.1 400 Bad Request");

?>