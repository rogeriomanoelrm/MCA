<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke - Cadastrar</title>
    <link rel="stylesheet" href="mca12.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>

    <?php
    require './Conn.php';
    require './User.php';

    $formData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

    if (!empty($formData['SendAddUser'])) {
        // var_dump($formData);
        // die();
        $createUser = new User();
        $createUser->formData = $formData;
        $value = $createUser->index();

        if ($value) {
            header("Location: emptypage.php");
            echo "<script>alert('Cadastro realizado com sucesso!')</script>";
        } else {
            echo "<p style='color: #f00;'>Error!</p>";
        }
    }

    ?>

<header id="ham">

<nav>


<img src="./img/logomca.gif" alt="">

<img id="bt-fechar" src="./img/bt-fechar.png" alt="">
                <img id="bt-hamburguer" src="./img/bt-hamburguer.png" alt="">


    <ul class="menu-principal">
        <lu><a href="index.php">Home</a></lu>
        <lu>Sobre</lu>
        <lu><a href="celulas.php">Celulas</a></lu>
        <lu> Contato</lu>
    </ul>
 
</header>



    <form id="contato" name="CreateUser" method="POST" action="">






        <div class="main" id="main">


            <label>Nome: </label>
            <input id="#nome" type="text" name="nome" placeholder="" />

            <label>Data de hoje:</label>
            <input id="#datahoje" type="date" name="datahoje" placeholder="" />

            <label>Data de nasc: </label>
            <input id="#datanasc" type="date" name="datanasc" placeholder="" />

            <label>telefone:</label>
            <input id="#telefone" type="text" name="telefone" placeholder="" />




            <div class="buttons">
                <input href="emptypage.php" type="submit" value="ENVIAR" name="SendAddUser" />
                <input type="reset" value="LIMPAR">
            </div>





        </div>


        <br><br>

    </form>




    <script src="./JS/jquery-3.7.1.min.js"></script>
<script src="./JS/menu-hamburguer.js"></sCRipt>

</body>

</html>
