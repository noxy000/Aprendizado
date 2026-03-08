<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <?php 
    //Programa Principal
        require_once 'Mamifero.php';
        require_once 'Lobo.php';
        require_once 'Cachorro.php';
        $c = new Cachorro();
        //$c->emitirSom();
        $c->reagirFrase("Olá");         // Abanar e Latir
        $c->reagirFrase("Vai Apanhar"); // Rosnar
        $c->reagirHora(11, 45);         // Abanar
        $c->reagirHora(21, 00);         // Ignorar
        $c->reagirDono(true);           // Abanar
        $c->reagirDono(false);          // Rosnar e Latir
        $c->reagirIdadePeso(2, 12.5);   // Latir
        $c->reagirIdadePeso(17, 4.5);   // Ronar
    ?>
</body>
</html>