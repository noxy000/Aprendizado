<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 05 POO</title>
</head>

<body>

    <pre>
        <?php
        require_once 'Banco.php';

        $p1 = new Banco; // Jubileu

        $p2 = new Banco; // Creusa

        $p1->abrirConta("CC");
        $p1->setDono("Jubileu");
        $p1->setNumConta(1111);

        $p2->abrirConta("CP");
        $p2->setDono("Creusa");
        $p2->setNumConta(2222);

        $p1->depositar(300);
        $p2->depositar(500);

        $p2->sacar(100);

        $p1->pagarMensal();
        $p2->pagarMensal();

        $p1->sacar(338);
        $p2->sacar(530);

        $p1->fecharConta();
        $p2->fecharConta();

        print_r($p1);
        print_r($p2);
        ?>
    </pre>

</body>

</html>