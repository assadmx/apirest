<?php
    function API($ruta){

        $url = "http://127.0.0.1/pruebas/";
        $respuesta = $url.$ruta;
        return $respuesta;
    }

    $direccion= API("palindromo");
    $json =file_get_contets($direccion);
    $datos = json_decode ($json,true);
    print_r($datos)
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palindromo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
<div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-center">Palindromo</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="frm">
                            <div class="form-group">
                                <label for="">Palindromo a comprobar</label>
                                <input type="hidden" name="idp" id="idp" value="">
                                <input type="text" name="palindromo" id="palindromo" placeholder="Palindromo" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="button" value="Comprobar" id="registrar" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 ml-auto">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="buscra">Buscar:</label>
                                <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover table-resposive">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Valor Usuario</th>
                            <th>Valor Salida</th>
                        </tr>
                    </thead>
                    <tbody id="resultado">
                        <?php
                            foreach ($datos as $data) {
                                echo "<tr>
                                        <td>" . $data['id_palindromo'] . "</td>
                                        <td>" . $data['valor_usuario'] . "</td>
                                        <td>" . $data['valor_salida'] . "</td>
                                        <td>
                                            <button type='button' class='btn btn-success' onclick=Editar('" . $data['id_palindromo'] . "')>Editar</button>
                                            <button type='button' class='btn btn-danger' onclick=Eliminar('" . $data['id_palindromo'] . "')>Eliminar</button>
                                        </td>        
                                    </tr>";
                            }
                            
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!--
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-center">Palindromo</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="frm">
                            <div class="form-group">
                                <label for="">Palindromo a comprobar</label>
                                <input type="hidden" name="idp" id="idp" value="">
                                <input type="text" name="palindromo" id="palindromo" placeholder="Palindromo" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="button" value="Comprobar" id="registrar" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 ml-auto">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="buscra">Buscar:</label>
                                <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover table-resposive">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Valor Usuario</th>
                            <th>Valor Salida</th>
                        </tr>
                    </thead>
                    <tbody id="resultado">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    !-->
</body>

</html>