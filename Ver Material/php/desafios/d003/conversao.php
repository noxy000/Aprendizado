<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
        <h1>Conversor de Moedas v1.0</h1>
        <?php
            $cotação = 5.24;
            $real = $_REQUEST["din"] ?? 0;
            $dolar = $real / $cotação;
            $padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY); // Tudo que usar esse padrão vai ser estilo pt-br
            echo "<p>Seus " . numfmt_format_currency($padrao, $real, "BRL") . " equivalem a <strong>" . numfmt_format_currency($padrao, $dolar, "USD") . "</strong></p>";
        ?>
        <button onclick="javascript:history.go(-1)">Voltar</button>
    </main>
</body>
</html>

<!--
echo "Seus R$ " . number_format($real, 2, ",", ".") . " equivalem a US$ " . number_format($dolar, 2, ",", ".");

Jeito mais profissional: Internacionalização
Biblioteca: intl

$padrao = numfmt_create("pt_BR", NumberFormatter::CURRENCY); // Tudo que usar esse padrão vai ser estilo pt-br

echo "Seus " . numfmt_format_currency($padrao, $real, "BRL") . " equivalem a " . numfmt_format_currency($padrao, $dolar, "USD");
-->
