<?php
include "config.php";
include "utils.php";


$dbConn =  connect($db);

function burbuja($arreglo_usuario)
{
    $arreglo=explode(",",$arreglo_usuario['valor_usuario']);
    $longitud = count($arreglo);
    for ($i = 0; $i < $longitud; $i++) {
        for ($j = 0; $j < $longitud - 1; $j++) {
            if ($arreglo[$j] > $arreglo[$j + 1]) {
                $temporal = $arreglo[$j];
                $arreglo[$j] = $arreglo[$j + 1];
                $arreglo[$j + 1] = $temporal;
            }
        }
    }
    return $arreglo;
}

/*
  listar todos los posts o solo uno
 */
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['id_ordenamiento']))
    {
      //Mostrar un post
      $sql = $dbConn->prepare("SELECT * FROM ordenarray where id_ordenamiento=:id_ordenamiento");
      $sql->bindValue(':id_ordenamiento', $_GET['id_ordenamiento']);
      $sql->execute();
      header("HTTP/1.1 200 OK");
      exit();
	  }
    else {
      //Mostrar lista de post
      $sql = $dbConn->prepare("SELECT * FROM ordenarray");
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
    
    $arrayordenado=burbuja($input);
    $sql = "INSERT INTO ordenarray
          (valor_usuario, valor_salida)
          VALUES
          (:valor_usuario, '".implode(",",$arrayordenado)."')";
    $statement = $dbConn->prepare($sql);
    bindAllValues($statement, $input);
    $statement->execute();
    $postId = $dbConn->lastInsertId();
    if($postId)
    {
      $input['id_ordenamiento'] = $postId;
      header("HTTP/1.1 200 OK");
      echo json_encode($input);
      exit();
	 }
}

//Borrar
if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
{
	$id = $_GET['id_ordenamiento'];
  $statement = $dbConn->prepare("DELETE FROM ordenarray where id_ordenamiento=:id_ordenamiento");
  $statement->bindValue(':id_ordenamiento', $id);
  $statement->execute();
	header("HTTP/1.1 200 OK");
	exit();
}

//Actualizar
if ($_SERVER['REQUEST_METHOD'] == 'PUT')
{
    $input = $_GET;
    $postId = $input['id_ordenamiento'];
    $fields = getParams($input);

    $sql = "
          UPDATE ordenarray
          SET $fields
          WHERE id_ordenamiento='$postId'
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