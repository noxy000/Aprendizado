<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        Resultado do Processamento
    </header>
    <main>
        <?php //pra exibir o que o usuário digitou no form do html
            $nome = $_GET["nome"] ?? "Sem";
            $sobrenome = $_GET["sobrenome"] ?? "Nome";
            echo "É um prazer te conhecer, $nome $sobrenome! Este é o meu site";
        ?>
        <p><a href="javascript:history.go(-1)">Voltar para a página anterior</a></p>
    </main>
</body>
</html>

<!--$n sendo a variável do php e nome entre '' sendo o name do html-->

<!--$_GET e etc... // Uma variável super global que vem declarada-->

<!-- Se o formulário foi enviado com method get então é $_GET, mesma coisa pro post, e só funciona se post=POST e get=GET agora pra funcionar pros dois independente do que for colocado no html, aqui no php é colocado o $_REQUEST, ela é uma função $_GET, $_POST, $_COOKIES-->

<!--Operador de coalescência nula ?? se o php não receber informação nenhum do html ele vai botar alguma outra informação pra substituir-->