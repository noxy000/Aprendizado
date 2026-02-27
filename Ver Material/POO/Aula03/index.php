<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 02 POO</title>
</head>
<body>
    <pre>
        <?php
            require_once 'Caneta.php';
            $c1 = new Caneta;
            $c1->modelo = "Bic crystal";
            $c1->cor = "Azul";
            //$c1->ponta = 0.5; Privado
            //$c1->carga = 99; Protegido
            //$c1->tampada = true; Protegido
            $c1->rabiscar();
            $c1->tampar(); // É possível tampar, usando o método public pra mudar tampada privado
            print_r($c1); // Ou use var dump
            //$c1->tampar(); Privado
            // Desprivando métodos tampar e destampar no arquivo Caneta.php...
        ?>
    </pre>
</body>
</html>