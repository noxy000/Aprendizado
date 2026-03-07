<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <pre>
        <?php
        //require_once 'Pessoa.php';
        require_once 'Visitante.php';
        //$p1 = new Pessoa;
        $v1 = new Visitante;
        $v1->setNome("Juvenal");
        $v1->setIdade(33);
        $v1->setSexo("M");
        print_r($v1);
        ?>
    </pre>
</body>

</html>