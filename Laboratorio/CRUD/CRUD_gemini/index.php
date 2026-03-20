<?php
require_once 'config.php';
require_once 'Usuario.php';

$p = new Usuario($pdo); // Instanciamos a classe passando a conexão

// --- LÓGICA DE CADASTRAR / ATUALIZAR ---
if (isset($_POST['nome'])) {
    // Usando o ?? (Null Coalescing) do Guanabara para segurança
    $id_update = $_POST['id_up'] ?? ''; 
    $nome = $_POST['nome'] ?? '';
    $telefone = $_POST['telefone'] ?? '';
    $email = $_POST['email'] ?? '';

    if (!empty($nome) && !empty($email)) {
        if (!empty($id_update)) {
            // Se tem ID de update, a gente atualiza
            $p->atualizarDados($id_update, $nome, $telefone, $email);
            header("location: index.php"); // Recarrega a página para limpar o POST
        } else {
            // Se não tem ID, é um cadastro novo
            if (!$p->cadastrarPessoa($nome, $telefone, $email)) {
                echo "<script>alert('Email já cadastrado!');</script>";
            }
        }
    }
}

// --- LÓGICA DE EXCLUIR ---
if (isset($_GET['id'])) {
    $id_pessoa = $_GET['id'];
    $p->excluirPessoa($id_pessoa);
    header("location: index.php");
}

// --- LÓGICA DE PREPARAR EDIÇÃO ---
$res_edit = [];
if (isset($_GET['id_up'])) {
    $id_update = $_GET['id_up'];
    $res_edit = $p->buscarDadosPessoa($id_update);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD Gemini</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <section id="esquerda">
        <form method="POST">
            <h2><?php echo isset($res_edit['id']) ? "Atualizar Pessoa" : "Cadastrar Pessoa"; ?></h2>
            
            <input type="hidden" name="id_up" value="<?php echo $res_edit['id'] ?? ''; ?>">
            
            <label for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="<?php echo $res_edit['nome'] ?? ''; ?>" required>
            
            <label for="telefone">Telefone</label>
            <input type="text" name="telefone" id="telefone" value="<?php echo $res_edit['telefone'] ?? ''; ?>">
            
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $res_edit['email'] ?? ''; ?>" required>
            
            <input type="submit" value="<?php echo isset($res_edit['id']) ? "Atualizar" : "Cadastrar"; ?>">
        </form>
    </section>

    <section id="direita">
        <table>
            <tr id="titulo">
                <td>Nome</td>
                <td>Telefone</td>
                <td colspan="2">Email</td>
            </tr>
            <?php
            $dados = $p->buscarDados();
            if (count($dados) > 0) {
                // O FOREACH MODERNO QUE A GENTE CONVERSOU
                foreach ($dados as $pessoa) {
                    echo "<tr>";
                    echo "<td>" . $pessoa['nome'] . "</td>";
                    echo "<td>" . $pessoa['telefone'] . "</td>";
                    echo "<td>" . $pessoa['email'] . "</td>";
                    echo "<td>
                            <a href='index.php?id_up=" . $pessoa['id'] . "'>Editar</a>
                            <a href='index.php?id=" . $pessoa['id'] . "' onclick='return confirm(\"Deseja excluir?\")'>Excluir</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Ainda não há pessoas cadastradas!</td></tr>";
            }
            ?>
        </table>
    </section>
</body>
</html>