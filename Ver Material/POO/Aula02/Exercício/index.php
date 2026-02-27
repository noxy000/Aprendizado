<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 02 POO</title>
</head>
<body>
    <?php
        require_once 'computador.php';

        $pc = new Computador;

        $pc->placamãe = 'Inventada B405-M';
        $pc->processador = 'AMD Ryzen 9990g';
        $pc->fonte = 'Super forte';
        $pc->funcionando = false;

        print_r($pc);

        $pc->ligar();

        $pc->consertar();
        echo "Tentando consertar...";

        $pc->ligar();
    ?>
</body>
</html>