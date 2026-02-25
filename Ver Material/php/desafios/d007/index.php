<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        // Puxando o valor da API do Banco Central
        $url = "https://api.bcb.gov.br/dados/serie/bcdata.sgs.1619/dados/ultimos/1?formato=json";
        $dados = json_decode(file_get_contents($url), true);
        
        // Converte o valor da API (que vem com vírgula) para o padrão do PHP (ponto)
        $minimo = (float) str_replace(',', '.', $dados[0]['valor']);

        $valor = $_GET["valor"] ?? 0;

        // Cálculos
        $divisao = (int)($valor / $minimo);
        $resto = $valor % $minimo;
    ?>
    <main>
        <h1>Informe seu salário</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="valor">Salário (R$)</label>
            <input type="number" name="valor" id="valor" step="0.01" value="<?=$valor?>">
            <p>Considerando o salário mínimo de <strong>R$ <?=number_format($minimo, 2, ",", ".")?></strong></p>
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section id="resultado">
        <h2>Resultado Final</h2>       
        <p>Quem recebe um salário de R$<?=number_format($valor, 2, ",", ".")?> ganha <strong><?=$divisao?> salários mínimos</strong> + R$ <?=number_format($resto, 2, ",", ".")?></p>
    </section>
</body>
</html>