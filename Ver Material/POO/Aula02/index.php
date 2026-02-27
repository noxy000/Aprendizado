<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 02 POO</title>
</head>
<body>
    <?php  // PHP permite fazer várias classes dentro do mesmo arquivo
        require_once 'Caneta.php'; // fazer a classe carregar no index
        $c1 = new Caneta; // instanciando o objeto

        // colocando atributos

        $c1->cor = 'Azul';
        $c1->ponta = 0.5;
        $c1->tampada = false;

        // tampar a caneta
        $c1->tampar();

        $c1->rabiscar();

        //var_dump($c1); // para mostrar todas as características, até mesmo nulas

        print_r($c1); // para mostrar apenas os atributos adicionados

        echo "<br>";

        $c2 = new Caneta;
        $c2->cor = "Verde";
        $c2->carga = 50;
        $c2->tampar();

        print_r($c2);
    ?>
</body>
</html>