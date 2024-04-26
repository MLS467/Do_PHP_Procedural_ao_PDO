<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
    .erro {
        color: red;
    }

    .input_erro {
        border: 1px solid red;
    }
    </style>
    <title>Document</title>
</head>


<body>
    <div class="container">
        <form style="height: 300px;"
            class="w-100 mt-5 d-flex justify-content-start d-flex flex-column mb-3 d-flex align-items-start"
            action="valida_login.php" method="POST">

            <div class="row w-50 mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <?php

                    if (isset($_SESSION['erro2']) and $_SESSION['erro2'] == 'ok') { ?>
                    <input type="email" class="form-control border-danger" name="email" id="inputEmail3">
                    <?php } else { ?>
                    <input type="email" class="form-control border-dark" name="email" id="inputEmail3">
                    <?php } ?>

                </div>
            </div>
            <div class="row mb-3 w-50 mb-3">
                <label for="inputPassword3" class="col-sm-2 col-form-label ">Senha</label>
                <div class="col-sm-10">
                    <?php

                    if (isset($_SESSION['erro2']) and $_SESSION['erro2'] == 'ok') { ?>
                    <input type="password" name="senha" class="form-control border-danger" id="inputPassword3">
                    <?php } else { ?>
                    <input type="password" name="senha" class="form-control border-dark" id="inputPassword3">
                    <?php } ?>
                </div>
            </div><br><br>
            <?php

            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                session_unset();
            }
            ?> <div class="w-100 text-start">
                <button type="submit" name="Login" class="btn btn-dark px-5">Entrar</button>

                <button type="reset" class="btn btn-dark px-5">Limpar</button>

            </div>


        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>