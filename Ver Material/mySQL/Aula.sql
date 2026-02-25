DDL Definição
DML Manipulação
DQL: Consultas (Ex: SELECT)
DCL Controle
DTL Transações, seguindos os princípios ACID(DICA pra facilitar), durabilidade, isolamento, consistência, atomicidade


"Criando primeiro banco de dados"


Tipos Primitivos do mySQL

Numéricos: (inteiros: tinyint, bigint, smallint, int, mediumint), (reais: decimal, float, double, real) e (lógicos: bit, boolean)

Data/Tempo: date, time, timestamp, year, datetime

Literal: (caracteres: char(fixo), varchar(variante)), (texto: tinytext, text, mediumtext, longtext), (binários: tinyblob, blob, longblob, mediumblob), (coleção: enum, set)

Espacial: geometry, point, polygon, multipolygon e muitos outros

----------------------------------

Comandos

CREATE DATABASE cadastro
default character set utf8mb4
default collate utf8mb4_general_ci;

----------------------------------

use cadastro;

CREATE TABLE pessoas (
    nome varchar(30),
    idade tinyint(3), -- Com atualizações mais recentes não precisa colocar o (3) pra especificar, o banco ignora isso.
    sexo char(1),
    peso float,
    altura float,
    nacionalidade varchar(20)
);

(descreva pessoas)

describe pessoas;

informações:

+---------------+-------------+------+-----+---------+-------+
| Field         | Type        | Null | Key | Default | Extra |
+---------------+-------------+------+-----+---------+-------+
| nome          | varchar(30) | YES  |     | NULL    |       |
| idade         | tinyint(3)  | YES  |     | NULL    |       |
| sexo          | char(1)     | YES  |     | NULL    |       |
| peso          | float       | YES  |     | NULL    |       |
| altura        | float       | YES  |     | NULL    |       |
| nacionalidade | varchar(20) | YES  |     | NULL    |       |
+---------------+-------------+------+-----+---------+-------+

--Apagar caso queira:

DROP DATABASE cadastro;


Por conta da idade das pessoas mudarem não podemos simplesmente fixar essa informação

seria mais adequado a seguinte tabela:

CREATE TABLE pessoas (
    nome varchar(30) NOT NULL,
    nascimento date,
    sexo enum('M', 'F'),
    peso decimal(5,2),
    altura decimal(3,2),
    nacionalidade varchar(20) DEFAULT 'Brasil'
) DEFAULT CHARSET = utf8mb4;

O Uso das Crases (``)

O que é: Um sinal que diz para a MariaDB: "Isso aqui é um nome (de tabela ou coluna), não é um comando".

Uso Recomendado: Apenas quando o nome da sua coluna for igual a um comando do SQL (ex: `select`, `order`, `delete`).

Uso "Gambiarra": Permite colocar espaços ou acentos (ex: `nome do usuário`). Não faça isso.

Jeito Raiz (O que as empresas usam): * Espaço? Use o underscore ( _ ). Ex: data_nascimento.

Acento? Não use. Ex: configuracao em vez de configuração.



Para não inserir as mesmas pessoas vamos adicionar um id

CREATE TABLE pessoas (
    id int NOT NULL AUTO_INCREMENT, -- Cada pessoa que eu cadastrar vai receber um código, 1, 2, 3...
    nome varchar(30) NOT NULL,
    nascimento date,
    sexo enum('M', 'F'),
    peso decimal(5,2),
    altura decimal(3,2),
    nacionalidade varchar(20) DEFAULT 'Brasil',
    PRIMARY KEY (id)
) DEFAULT CHARSET = utf8mb4;


Estudar Prepared Statements e SQL Injection pra ter mais segurança



"Inserindo dados na Tabela"

SQL/MariaDB é separada por categorias, o create table por exemplo, é para definição da minha tabela

e todo comando que faz parte da definição da estrutura é um DDL(Data definition language)


Inserir dados na tabela

INSERT INTO pessoas -- insira na tebela pessoas...
(id ,nome, nascimento, sexo, peso, altura, nacionalidade) -- Dá pra tirar o id e nacionalidade, ele vai colocar o valor padrão 
VALUES -- valores...
(DEFAULT, 'Claudio de Oliveira', '1988-10-25', 'M', '85.50', '1.83', 'Brasil'); -- É possível colocar DEFAULT no lugar dos que não foram colocados


-- Para ver os dados

SELECT * FROM pessoas; -- Selecione todos os dados de pessoas


-- Agora quando id, nome e etc são adicionados exatamente na mesma ordem que está nas pastas podemos omitir pates do código

-- Por exemplo:

INSERT INTO pessoas VALUES
(DEFAULT, 'Adalgiza', '1930-11-2', 'F', '63.2', '1.75', 'Irlanda'); -- Peso e altura não precisam de '' por serem numéricos, mas pode ser colocado e compreendido


-- Também é possível adicionar várias pessoas com 1 comando de insert into

INSERT INTO pessoas
(id ,nome, nascimento, sexo, peso, altura, nacionalidade) --Pode ser omitido
VALUES
(DEFAULT, 'Ana', '1975-12-22', 'F', '52.30', '1.45', 'EUA'),
(DEFAULT, 'Pedro', '2000-7-15', 'M', '52.30', '1.45', 'Brasil'),
(DEFAULT, 'Maria', '1999-5-30', 'F', '75.90', '1.70', 'Portugal');


-- O comando insert into é da classificação DML (Data Manipulation Language)



-- Para alterar a tabela é usado ALTER TABLE, adicionando nova coluna:

ALTER TABLE pessoas
ADD COLUMN profissao varchar(10);

-- Para remover coluna

ALTER TABLE pessoas
DROP COLUMN profissao;

-- Para colocar a coluna depois da uma específica

ALTER TABLE pessoas
ADD COLUMN profissao varchar(10) AFTER nome;

-- Para colocar como primeira coluna

ALTER TABLE pessoas
ADD COLUMN codigo int FIRST; -- A palavra column pode ser omitida

-- Para modificar a coluna

ALTER TABLE pessoas
MODIFY COLUMN profissao varchar(20); -- Troquei de 10 pra 20

-- Para modificar o nome da coluna

ALTER TABLE pessoas
CHANGE COLUMN profissao prof varchar(20);

-- Para mudar o nome da table inteira

ALTER TABLE pessoas RENAME TO gafanhotos;

-- Criando nova tabela

CREATE TABLE IF NOT EXISTS cursos ( -- Só vai criar caso não exista, também tem o IF EXISTS para outras situações
   idcurso int,
   nome varchar(20) NOT NULL UNIQUE, -- Único, ele não vai deixar colocar dois cursos com o mesmo nome
   descricao text ,
   carga int UNSIGNED, -- Sem sinal, impede números negativos e dobra a capacidade de números positivos
   totaulas int UNSIGNED,
   ano year DEFAULT '2016',
   PRIMARY KEY (idcurso)
) DEFAULT CHARSET = utf8mb4;

-- Comando que vai mostrar erro por já existir tabela gafanhotos, anteriormente pessoas

CREATE TABLE IF NOT EXISTS gafanhotos (teste int);

-- Adicionando chave primária caso já tiver feito a tebela cursos sem ela

ALTER TABLE cursos
ADD PRIMARY KEY (idcurso);

-- ALTER TABLE e DROP TABLE são classificados como DDL



-- "Manipulando Registros || Linhas || Tuplas"

               -- C     A     M     P     O     S --
+---------------+---------------+------+-----+---------+----------------+
| Field         | Type          | Null | Key | Default | Extra          | -- L
+---------------+---------------+------+-----+---------+----------------+
| codigo        | int(11)       | YES  |     | NULL    |                | -- I
| id            | int(11)       | NO   | PRI | NULL    | auto_increment |
| nome          | varchar(30)   | NO   |     | NULL    |                | -- N
| nascimento    | date          | YES  |     | NULL    |                |
| sexo          | enum('M','F') | YES  |     | NULL    |                | -- H 
| peso          | decimal(5,2)  | YES  |     | NULL    |                |
| altura        | decimal(3,2)  | YES  |     | NULL    |                | -- A
| nacionalidade | varchar(20)   | YES  |     | Brasil  |                |
| prof          | varchar(20)   | YES  |     | NULL    |                | -- S
+---------------+---------------+------+-----+---------+----------------+


-- Adicionando registros em cursos com erros propositais

INSERT INTO cursos 
  (idcurso, nome, descricao, carga, totaulas, ano) 
VALUES
  (1, 'HTML4', 'Curso de HTML5', 40, 37, 2014),
  (2, 'Algoritmos', 'Lógica de Programação', 20, 15, 2014),
  (3, 'Photoshop', 'Dicas de Photoshop CC', 10, 8, 2014),
  (4, 'PGP', 'Curso de PHP para iniciantes', 40, 20, 2010),
  (5, 'Jarva', 'Introdução à Linguagem Java', 10, 29, 2000),
  (6, 'MySQL', 'Bancos de Dados MySQL', 30, 15, 2016),
  (7, 'Word', 'Curso completo de Word', 40, 30, 2016),
  (8, 'Sapateado', 'Danças Rítmicas', 40, 30, 2018),
  (9, 'Cozinha Árabe', 'Aprenda a fazer Kibe', 40, 30, 2018),
  (10, 'YouTuber', 'Gerar polêmica e ganhar inscritos', 5, 2, 2018);

-- Percebe-se que tem erros como HTML4, PGP, Jarva, e datas erradas, para consertar...

-- Começando do html4, corrigir para HTML5

UPDATE cursos -- Atualize
SET nome = 'HTML5' -- Configure
WHERE idcurso = '1'; -- Onde

-- Consertando Curso de "PGP" pra PHP

UPDATE cursos
SET nome = 'PHP', ano = '2015'
WHERE idcurso = '4';

-- Consertando "Jarva" para Java

UPDATE cursos
SET nome = 'Java', carga = '40', ano = '2015'
WHERE idcurso = '5' LIMIT 1; -- Para modificar somente 1 linha caso mais uma em seguida supostamente tivesse o id 5 também

-- No caso de querer generalizar, por exemplo

UPDATE cursos
SET ano = '2050', carga = '800'
WHERE ano = '2018'; -- Cursos onde o ano é 2018, todos cursos de 2018 receberiam essas características absurdas sem o limit 1; 

-- Agora para apagar registros

DELETE FROM cursos -- Delete da tabela cursos...
WHERE idcurso = '8';

-- Para apagar os 2 cursos indesejados restantes

DELETE FROM cursos
WHERE ano = '2018';

-- Para apagar todos os registros da tabela

TRUNCATE TABLE cursos; -- Ou só truncate cursos


UPDATE, DELETE, TRUNCATE -> DML


---------------------------------
--Gerenciar Cópias de segurança--
---------------------------------

-- Depois de já ter salvo o banco de dados em um arquivo sql que é um passo a passo para criar o mesmo que já existia

-- Apague o banco de dados dessa forma

DROP DATABASE cadastro;

-- Alguns comandos, SHOW DATABSE; SHOW TABLES; STATUS;


-- Para ver o comando que foi usado para criar a tabela no phpmyadmin use:

SHOW CREATE TABLE amigos;

-- Obtendo dados da tabela com SELECT

SELECT * FROM cursos; -- Selecione todas as colunas de cursos

SELECT * FROM cursos
ORDER BY nome; -- Ele vai ordenar baseado nas letras do alfabeto

ORDER BY nome DESC -- Com desc de descendente ele vai ordenar reversamente
ORDER BY nome ASC; -- Mesma coisa que deixar sem nada


-- Se quiser apenas algumas colunas específicas é possível filtrar

SELECT nome, carga, ano FROM cursos
ORDER BY nome;

-- Se quiser filtrar as linhas use

SELECT * FROM cursos
WHERE ano = '2016'
ORDER BY nome;

-- Dá pra filtrar um pouco mais dessa forma

SELECT nome, descricao FROM cursos
WHERE ano <= '2015'
ORDER BY nome;

-- Tem todos os operadores de maior, menor e etc, detalhe novo: símbolo de diferente pode ser != ou <>

SELECT * FROM cursos
WHERE totaulas BETWEEN '20' AND '30' -- totaulas que esteja entre 20 e 30
ORDER BY nome;

-- Usando BETWEEN

SELECT nome, ano FROM cursos
WHERE ano BETWEEN '2014' AND '2016' 
ORDER BY ano DESC, nome ASC; -- Ordenar ano descendente e nome ascendente

-- Outro operador

SELECT nome, ano FROM cursos
WHERE ano IN ('2014', '2016', '2018') -- Onde ano seja... para valores específicos
ORDER BY nome;

-- Usando mais

SELECT nome, carga, totaulas FROM cursos
WHERE carga > '35' AND totaulas < '30'
ORDER BY nome; 

-- Usando OR

SELECT nome, carga, totaulas FROM cursos
WHERE carga > '35' OR totaulas < '30' -- Tendo carga maior que 35 OU tendo menos de 30 aulas, ja aparece
ORDER BY nome;

-- Select pode ser classificado como DQL

-- Parte 2

SELECT * FROM cursos
WHERE nome = 'PHP';

-- Operador LIKE, que funciona com letra minúscula também

SELECT * FROM cursos
WHERE nome LIKE 'P%'; -- Like seria parecido, toda curso que tiver nome que começa com P vai aparecer

SELECT * FROM cursos
WHERE nome LIKE '%a'; -- Que termine com a letra A

SELECT * FROM cursos
WHERE nome LIKE '%a%'; -- Todos os registros que tenha A em qualquer lugar

SELECT * FROM cursos
WHERE nome NOT LIKE '%a%'; -- Dai vai procurar os que não tem A

SELECT * FROM cursos
WHERE nome LIKE 'PH%P'; -- Comece com PH e termine com P, como Photoshop ou PHP

SELECT * FROM cursos
WHERE nome LIKE 'PH%P_'; -- Cursos que comecem com ph, terminem com p e tenha um caractere depois disso

SELECT * FROM cursos
WHERE nome LIKE 'P_P%'; -- Tenha P no inicio, algo no meio, p no terceira letra e qualquer outra coisa a frente

SELECT DISTINCT nacionalidade FROM gafanhotos -- Se quiser ver apenas uma vez sem as repetições
ORDER BY nacionalidade;

SELECT COUNT(*) FROM cursos; -- Vai dizer o número de cursos que tem

SELECT COUNT(*) FROM cursos WHERE carga > 40; -- Vai contar o número de cursos que tem mais de 40 horas

SELECT MAX(carga) FROM cursos; -- Fala qual é a maior carga

-- Aplicando no Banco de dados

SELECT MAX(totaulas) FROM cursos WHERE ano = '2016';

SELECT MIN(totaulas) FROM cursos WHERE ano = '2016'; -- Pega o curso com menor quantidade de aulas em 2016

SELECT SUM(totaulas) FROM cursos; -- Vai somar a quantidade de aulas de todos os cursos

SELECT AVG(totaulas) FROM cursos WHERE ano = '2016'; -- Pegar a média de aulas em 2016

-- Exercícios

-- 1
SELECT * FROM gafanhotos
WHERE sexo = 'F'
ORDER BY nome;

-- 2
SELECT * FROM gafanhotos
WHERE nascimento BETWEEN '2000-01-01' AND '2015-12-31'
ORDER BY nome;

-- 3
SELECT * FROM gafanhotos
WHERE profissao = 'Programador' AND sexo = 'M'
ORDER BY nome;

-- 4
SELECT * FROM gafanhotos
WHERE nacionalidade = 'Brasil' AND sexo = 'F' AND nome LIKE 'J%'
ORDER BY nome;

-- 5
SELECT nome, nacionalidade FROM gafanhotos
WHERE nome LIKE '%SILVA%' AND nacionalidade != 'Brasil' AND peso <= '100'
ORDER BY nome;

-- 6
SELECT MAX(altura) FROM gafanhotos WHERE sexo = 'M';

-- 7
SELECT AVG(peso) FROM gafanhotos;

-- 8
SELECT MIN(peso) FROM gafanhotos WHERE sexo = 'F' AND nacionalidade != 'Brasil' AND nascimento BETWEEN '1990-01-01' AND '2000-12-31';

-- 9
SELECT * FROM gafanhotos WHERE sexo = 'F' AND altura > '1.90';

-- Parte 3

-- Agrupando invés de distinguir

SELECT carga, COUNT(*) FROM cursos
GROUP BY carga; -- Agrupado por...

-- Resultado, agora contando quantos cursos tem carga de 10, 15, 20 e etc...

SELECT carga, COUNT(*) FROM cursos
GROUP BY carga;

+-------+----------+
| carga | COUNT(*) |
+-------+----------+
|    10 |        1 |
|    15 |        1 |
|    20 |        4 |
|    30 |        8 |
|    35 |        1 |
|    40 |        9 |
|    50 |        1 |
|    60 |        5 |
+-------+----------+

SELECT carga, COUNT(nome) FROM cursos
GROUP BY carga
HAVING COUNT(nome) > 3; -- Pegar apenas os valores que tem contagem maior que 3

+-------+-------------+
| carga | COUNT(nome) |
+-------+-------------+
|    20 |           4 |
|    30 |           8 |
|    40 |           9 |
|    60 |           5 |
+-------+-------------+

-- Usando

SELECT ano, COUNT(*) FROM cursos
GROUP BY ano
HAVING COUNT(*) > 3 -- O HAVING aceita colunas do GROUP BY ou QUALQUER função agregada (SUM, AVG, etc).
ORDER BY COUNT(*);

use cadastro;

SELECT ano, COUNT(*) FROM cursos
GROUP BY ano
HAVING ano > 2013
ORDER BY COUNT(*) DESC;

SELECT AVG(carga) FROM cursos;

SELECT carga, COUNT(*) FROM cursos
WHERE ano > 2015
GROUP BY carga
HAVING carga > (SELECT AVG(carga) FROM cursos); -- Listar apenas as cargas que são maiores que a média

-- Exercício

-- 1
SELECT profissao, COUNT(*) FROM gafanhotos
GROUP BY profissao
ORDER BY COUNT(*);

-- 2
SELECT sexo, COUNT(*) FROM gafanhotos
WHERE nascimento > '2005-01-1'
GROUP BY sexo;

-- 3
SELECT nacionalidade, COUNT(*) FROM gafanhotos
WHERE nacionalidade != 'Brasil'
GROUP BY nacionalidade
HAVING COUNT(*) > 3
ORDER BY COUNT(*);

-- 4
SELECT altura, peso, count(altura) FROM gafanhotos
WHERE peso > '100'
GROUP BY altura
HAVING altura > (SELECT avg(altura) FROM gafanhotos)
ORDER BY altura;

/*
Relacionando Tabelas

Nome de Tabela = Entidade
Nome das Dados = Atributos   |   ex: idade, peso...

Diagrama E-R (ENTIDADE, RELACIONAMENTO)
(DER)

Cardinalidade, Simples ou Múltipla

No momento temos duas entidades, gafanhotos e cursos

Gafanhotos e Cursos
1 gafanhoto pra n cursos e n cursos pra n gafanhotos, n para n, muitos para muitos

Também tem o 1 para 1, uma entidade marido e outra entidade mulher, cada um só pode ter 1, o marido tendo 1 mulher e 1 mulher tendo 1 marido

Funcionário e Dependente, um funcionário pode ter n dependentes ou nem 1, um dependente não pode ter mais de 1 funcionário, um para muitos

Existem as chaves primárias e as chaves estrangeiras, uma entidade vai mandar a chave primária para outra e essa chave se torna estrangeira
*/


-- Começando a relacionar tabelas efetivamente

-- Usando InnoDB como máquina para criar registros Aula 15 | 8m

-- Relacionar gafanhotos e cursos, com 3 ligações, as duas entidades e o relacionamento "prefere"

-- Vamos adicionar o "cursopreferido" dentro da tabela gafanhotos

ALTER TABLE gafanhotos
ADD COLUMN cursopreferido int;

-- Tendo adicionado agora falta colocar a chave estrangeira nele

ALTER TABLE gafanhotos
ADD FOREIGN KEY (cursopreferido)
REFERENCES cursos(idcurso);

-- Colocar um aluno específico pra preferir um curso

UPDATE gafanhotos SET cursopreferido = '6' WHERE id = '1';

-- Fiz mais alguns gafanhotos preferirem algum curso, agora se eu tentar apagar o curso em que estão conectados eu não vou conseguir

DELETE FROM cursos WHERE idcurso = '6'; -- Não vai funcionar, pelo menos eu espero se tudo der certo

-- Usando JOIN para ver o nome e ano dos cursos juntamente com o nome dos gafanhotos, porém vai dizer que o gafanhoto ta em todos

SELECT gafanhotos.nome, gafanhotos.cursopreferido, cursos.nome, cursos.ano FROM gafanhotos INNER JOIN cursos;

-- O certo pra filtrar apenas o curso que o gafanhoto ta preferindo fazer

SELECT gafanhotos.nome, gafanhotos.cursopreferido, cursos.nome, cursos.ano FROM gafanhotos INNER JOIN cursos
ON cursos.idcurso = gafanhotos.cursopreferido -- Onde a chave primária idcurso é igual a chave estrangeira
ORDER BY gafanhotos.nome;

-- É possível dar apelidos para diminuir o tamanho do comando usando AS

SELECT g.nome, g.cursopreferido, c.nome, c.ano FROM gafanhotos AS g INNER JOIN cursos AS c
ON c.idcurso = g.cursopreferido -- Onde a chave primária idcurso é igual a chave estrangeira
ORDER BY g.nome;

-- Como existem gafanhotos que não preferem nenhum curso eles acabam ficando de fora, para incluir eles o comando é:

SELECT g.nome, g.cursopreferido, c.nome, c.ano FROM gafanhotos AS g LEFT OUTER JOIN cursos AS c -- Ou apenas join
ON c.idcurso = g.cursopreferido -- Onde a chave primária idcurso é igual a chave estrangeira
ORDER BY g.nome;

-- Agora se eu usar RIGHT JOIN ele vai dar foco nos cursos, mesmo que nenhum gafanhoto faça algum deles

SELECT g.nome, g.cursopreferido, c.nome, c.ano FROM gafanhotos AS g RIGHT OUTER JOIN cursos AS c -- Ou apenas join
ON c.idcurso = g.cursopreferido -- Onde a chave primária idcurso é igual a chave estrangeira
ORDER BY g.nome;

-- Ultima aula ainda relacionando tabelas, nas anotações interiores era de um pra muitos, agora vai ser muitos pra muitos

-- Onde jogamos a chave do gafanhoto pra "assiste" e jogamos a chave do curso também pra "assiste", ambas como estrangeiras

CREATE TABLE gafanhoto_assiste_curso (
   id int NOT NULL AUTO_INCREMENT,
   data date,
   idgafanhoto int,
   idcurso int,
   PRIMARY KEY (id),
   FOREIGN KEY (idgafanhoto) REFERENCES gafanhotos(id),
   FOREIGN KEY (idcurso) REFERENCES cursos(idcurso)
) DEFAULT CHARSET = utf8mb4;

-- Agora para colocar dados dentro do g_a_c

INSERT INTO gafanhoto_assiste_curso 
VALUES 
(DEFAULT, '2014-03-01', '1', '2'); -- Um determinado gafanhoto, que é o 1, começou a assistir o curso 2 nada data 2014-03-01

-- Para poder relacionar as tabelas vai ser desse jeito

SELECT * FROM gafanhotos g 
JOIN gafanhoto_assiste_curso a
ON g.id = a.idgafanhoto;

-- Dar uma filtrada

SELECT g.id, g.nome, a.idgafanhoto, idcurso FROM gafanhotos g 
JOIN gafanhoto_assiste_curso a
ON g.id = a.idgafanhoto
ORDER BY g.nome;

-- Agora vamos pegar os dados da tabela cursos

SELECT g.nome, c.nome FROM gafanhotos g 
JOIN gafanhoto_assiste_curso a
ON g.id = a.idgafanhoto
JOIN cursos c
ON c.idcurso = a.idcurso;

-- Pronto, acabou o curso de SQL do mestre Guanabara, uma hora irei corrigir possíveis erros
