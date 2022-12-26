<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" id ="frm">
                            <div class="form-group">
                                <label for=""> Escriba un texto </label>
                                <input type="text" name="palindromo" id="palindromo" placeholder="Palindromo" class ="form-control">
                            </div>
                            <div class="form-group">
                                <input type="button" value = "comprobar" id="comprobar" class="btn btn-primary btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <table class="table table-hover table-responsive">
                <thead class = "thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Valor del usuario</th>
                        <th>Valor de salida</th>
                    </tr>
                </thead>
                <tbody id="resultado">


                </tbody>
            </table>
        </div>
    </div>

    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">
    <script src="script.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
</body>
</html>