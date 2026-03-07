<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício</title>
</head>
<body>
    <pre>
        <?php
        require_once 'Pessoa.php';
        require_once 'Livro.php';
        $p[0] = new Pessoa("Pedro", 22, "M");
        $p[1] = new Pessoa("Maria", 22, "F");
        $l[0] = new Livro("PHP Básico", "Gustavo Guanabara", 100, $p[0]);
        $l[1] = new Livro("POO com PHP", "Gustavo Guanabara", 100, $p[0]);
        $l[2] = new Livro("PHP Avançado", "Gustavo Guanabara", 100, $p[1]);


        $l[0]->abrir();
        $l[0]->folhear(100);

        $l[0]->detalhes();
        $l[1]->detalhes();
        $l[2]->detalhes();
        ?>
    </pre>
</body>
</html>