<?php 

//--------------------------CONEXAO------------------------------------

try {
    $pdo = new PDO("mysql:host=localhost;dbname=crudpdo","root", "");
} catch (PDOException $e) { // Se der erro vai cair no catch
    echo "Erro com banco de dados: ".$e->getMessage();
} catch (Exception $e) { // Qualquer erro que não seja de banco de dados
    echo "Erro genérico: ".$e->getMessage();
}
//--------------------------INSERT-------------------------------------

// 1 forma:
$res = $pdo->prepare("INSERT INTO pessoa(nome, telefone, email) VALUES (:n, :t, :e)");

    // 1 forma:
    //$res->bindValue(":n", "Roberta"); // Aceita mais coisas
    //$res->bindValue(":t", "11111111");
    //$res->bindValue(":e", "Roberta@gmail.com");
    //$res->execute();

    // 2 forma:
    //$nome = "Miriam"; // Pra colocar no Param
    //$res->bindParam(":n",$nome); // Aceita apenas variáveis
    //$res->execute();

// 2 forma:
//$pdo->query("INSERT INTO pessoa(nome, telefone, email) VALUES('Paulo', '22222222', 'Paulo@gmail.com')");
// O query não precisa de execute(), ele já executou só com o comando dele

//--------------------------DELETE E UPDATE----------------------------

// 1 forma:
//$cmd = $pdo->prepare("DELETE FROM pessoa WHERE id = :id");
//$id = 4;
//$cmd->bindParam(":id", $id);//
//$cmd->execute();

// 2 forma:
//$res = $pdo->query("DELETE FROM pessoa WHERE id = '7'");

// Update

//$cmd = $pdo->prepare("UPDATE pessoa SET email = :e WHERE id = :id");
//$cmd->bindValue(":e", "Creuzita@gmail.com");
//$cmd->bindValue(":id", 8);
//$cmd->execute()

//$cmd = $pdo->query("UPDATE pessoa SET email = 'Robertinha@gmail.com' WHERE id = '6'");

//--------------------------SELECT-------------------------------------

$cmd = $pdo->prepare("SELECT * FROM pessoa WHERE id = :id");
$cmd->bindValue(":id", '6');
$cmd->execute();
//$cmd->fetch(); // Quando vem apenas uma linha da banco de dados, ideal nesse caso
// Ou
//$cmd->fetchAll(); // Para todas as linhas
$resultado = $cmd->fetch(PDO::FETCH_ASSOC); // Sem esse parâmetro ele repete os dados falando posições

foreach ($resultado as $key => $value) {
    echo $key.": ".$value."<br>";
}

?>