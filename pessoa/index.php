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
        font-size: 10px;
        width: 100%;
        text-align: center;
        margin-top: 10px;
    }

    #erroDiv {
        /* border: 1px solid red; */
        display: flex;
        justify-content: start;
        align-items: center;
    }

    .input_erro {
        border: 1px solid red;
    }

    form {
        background-image: url(../img/o-astronauta-do-doodle-esta-pedalando-no-espaco_185029-1046.jpg);
        background-repeat: no-repeat;
        background-size: contain;
        height: 300px;
    }

    body {
        background-image: url(../img/1600w-lKp1cXK1ybY.webp);
        background-repeat: no-repeat;
        background-size: cover;
        height: 450px;

    }

    button {
        margin-right: 5px;
        width: 75%;
        margin-bottom: 5px;
    }
    </style>
    <title>Document</title>
</head>


<body class="d-flex justify-content-start align-items-start w-100">
    <div id="caixa" class="containers w-75">
        <div class="d-flex mt-5 ms-3 justify-content-start">
            <h1><strong>Login</strong>
            </h1><br>

        </div>
        <form
            class="w-75  d-flex justify-content-end d-flex  mb-3 d-flex align-items-center border shadow p-3 mb-5 ms-3 bg-body-tertiary rounded"
            action="valida_login.php" method="POST">
            <div class="container  d-flex justify-content-center  flex-column align-items-end">

                <div class="row w-75 mb-3 d-flex justify-content-center ">
                    <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10 w-50">
                        <?php

                        if (isset($_SESSION['erro2']) and $_SESSION['erro2'] == 'ok') { ?>
                        <input type="email" class="form-control border-danger" name="email" id="inputEmail3">
                        <?php } else { ?>
                        <input type="email" class="form-control border-dark" name="email" id="inputEmail3">
                        <?php } ?>

                    </div>
                </div>
                <div class="row mb-3 w-75 mb-3 d-flex justify-content-center">
                    <label for="inputPassword3" class="col-sm-2 col-form-label ">Senha</label>
                    <div class="col-sm-10 w-50">
                        <?php
                        if (isset($_SESSION['erro2']) and $_SESSION['erro2'] == 'ok') { ?>
                        <input type="password" name="senha" class="form-control border-danger" id="inputPassword3">
                        <?php } else { ?>
                        <input type="password" name="senha" class="form-control border-dark" id="inputPassword3">
                        <?php } ?>
                    </div>
                </div><br><br>

                <div>
                    <button type="submit" name="Login" class="btn btn-dark px-5 text-center">Entrar</button>

                    <button type="reset" class="btn btn-dark px-5 text-center">Limpar</button>

                </div>

            </div>
        </form>
        <div id="erroDiv">
            <?php

            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                session_unset();
            }
            ?>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>