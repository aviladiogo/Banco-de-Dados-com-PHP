--- Criação das tabelas
CREATE TABLE users (
    CPF VARCHAR(11) NOT NULL PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    ordered INT(3),
    FOREIGN KEY (ordered) REFERENCES pedido(id),
    deliveryid INT(3)
);
CREATE TABLE usersEndereco (
    CPF VARCHAR(11) NOT NULL PRIMARY KEY,
    FOREIGN KEY (CPF) REFERENCES users(CPF),
    logradouro VARCHAR(50) NOT NULL,
    complemento VARCHAR(50) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado VARCHAR(50) NOT NULL
);
CREATE TABLE entregador (
    ID SERIAL PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    nota INT(3),
    localizacao VARCHAR(50),
    idpedido INT(3),
    FOREIGN KEY (idpedido) REFERENCES pedido(id)
);
CREATE TABLE restaurantes (
    id SERIAL PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    openhour TIME,
    closehour TIME,
    nota INT(3),
    adress VARCHAR(50) NOT NULL,
    responsavel VARCHAR(50) NOT NULL
);
CREATE TABLE restauranteEndereco (
    idrestaurante INT(3),
    FOREIGN KEY (idrestaurante) REFERENCES restaurantes(id),
    logradouro VARCHAR(50) NOT NULL,
    complemento VARCHAR(50) NOT NULL,
    bairro VARCHAR(50) NOT NULL,
    cidade VARCHAR(50) NOT NULL,
    estado VARCHAR(50) NOT NULL
);

CREATE TABLE pedido (
    id SERIAL PRIMARY KEY,
    payment VARCHAR(50) NOT NULL,
    timeouti TIME,
    timein TIME,
    agendamento BOOLEAN,
    dia DATE,
    prato VARCHAR(50) NOT NULL,
    iduser INT(3),
    FOREIGN KEY (iduser) REFERENCES users(id),
    idrestaurante INT(3),
    FOREIGN KEY (idrestaurante) REFERENCES restaurantes(id)
);
CREATE TABLE prato (
    nome VARCHAR(50) NOT NULL PRIMARY KEY,
    tipo VARCHAR(50) NOT NULL,
    obs TEXT,
    acompanhamentos VARCHAR(50) NOT NULL,
    descricao VARCHAR(50) NOT NULL,
    idrestaurante INT(3),
    FOREIGN KEY (idrestaurante) REFERENCES restaurantes(id)
);
CREATE TABLE avaliar (
    id SERIAL PRIMARY KEY,
    notaRestaurante INT(5) NOT NULL,
    notaEntrega INT(5) NOT NULL,
    motivo TEXT,
    idrestaurante INT(3),
    FOREIGN KEY (idrestaurante) REFERENCES restaurantes(id),
    identregador INT(3),
    FOREIGN KEY (identregador) REFERENCES entregador(ID)
);
--Clientes:
INSERT INTO users (CPF, firstname, lastname)
VALUES ('99466','henry','luquinha');
INSERT INTO users (CPF, firstname, lastname)
VALUES ('98119','dioguinho','avila');
INSERT INTO users (CPF, firstname, lastname)
VALUES ('99866','tlbeto','alburqueque');
INSERT INTO users (CPF, firstname, lastname)
VALUES ('98105','ronney','lima');
--ClientesEndereço
---pegamos os CPFS dos usuarios a serem alterados
SELECT CPF FROM users;
---inserimos
INSERT INTO usersEndereco(CPF, logradouro, complemento, bairro, cidade, estado)
VALUES ('99466','olinda','olinda','olinda','olinda','olinda');
INSERT INTO usersEndereco(CPF, logradouro, complemento, bairro, cidade, estado)
VALUES ('98119','paiva','paiva','paiva','paiva','paiva');
INSERT INTO usersEndereco(CPF, logradouro, complemento, bairro, cidade, estado)
VALUES ('99866','areias','areias','areias','areias','areias');
INSERT INTO usersEndereco(CPF, logradouro, complemento, bairro, cidade, estado)
VALUES ('98105','santo amaro','santo amaro','santo amaro','santo amaro','santo amaro');

--Entregadores
INSERT INTO entregador(firstname, lastname)
VALUES ('luffy','monkey d.');
INSERT INTO entregador(firstname, lastname)
VALUES ('naruto','uzumaki');
INSERT INTO entregador(firstname, lastname)
VALUES ('son','goku');
INSERT INTO entregador(firstname, lastname)
VALUES ('sherlock','holmes');
INSERT INTO entregador(firstname, lastname)
VALUES ('dioguinho','holmes');
INSERT INTO entregador(firstname, lastname)
VALUES ('ronney','ruivo');

--Restaurantes
INSERT INTO restaurantes (firstname, openhour, closehour, responsavel)
VALUES ('donaldKing','09:00', '18:00', 'ryan');
INSERT INTO restaurantes (firstname, openhour, closehour, responsavel)
VALUES ('mcburguer','09:00', '18:00', 'djalma');
INSERT INTO restaurantes (firstname, openhour, closehour, responsavel)
VALUES ('habouaibs','09:00', '18:00', 'luquinhas');
INSERT INTO restaurantes (firstname, openhour, closehour, responsavel)
VALUES ('atrantico','09:00', '18:00', 'marcos');

--RestaurantesEndereço
INSERT INTO restaurantesEndereco(idrestaurante, logradouro, complemento, bairro, cidade, estado)
VALUES ('1','candeias','candeias','candeias','candeias','candeias');
INSERT INTO usersEndereco(CPF, logradouro, complemento, bairro, cidade, estado)
VALUES ('2','dom helder','dom helder','dom helder','dom helder','dom helder');
INSERT INTO usersEndereco(CPF, logradouro, complemento, bairro, cidade, estado)
VALUES ('3','boa viagem','boa viagem','boa viagem','boa viagem','boa viagem');
INSERT INTO usersEndereco(CPF, logradouro, complemento, bairro, cidade, estado)
VALUES ('4','sucupira','sucupira','sucupira','sucupira','sucupira');

--prato
SELECT ID FROM restaurantes WHERE firstname = 'donaldKing'
--primeiro pescamos o ID do restaurante para podermos usarlos (comando a cima retorna 1) 
INSERT INTO prato (nome, tipo, obs, acompanhamento, descricao, idrestaurante)
VALUES ('lanche alegre','hamburguer','Cuidado possui lactose','fritas e refri','Hamburgão top', '1');
INSERT INTO prato (nome, tipo, obs, acompanhamento, descricao, idrestaurante)
VALUES ('bigkingfeliz','hamburguer','Delicioso','fritas e refri','Muito bom mano', '1');

SELECT ID FROM restaurantes WHERE firstname = 'mcburguer'
--primeiro pescamos o ID do restaurante para podermos usarlos (comando a cima retorna 2) 
INSERT INTO prato (nome, tipo, obs, acompanhamento, descricao, idrestaurante)
VALUES ('hoper','hamburguer','melhor que o do concorrente','fritas e refri','Hamburgão superior', '2');

SELECT ID FROM restaurantes WHERE firstname = 'habouaibs'
--primeiro pescamos o ID do restaurante para podermos usarlos (comando a cima retorna 3) 
INSERT INTO prato (nome, tipo, obs, acompanhamento, descricao, idrestaurante)
VALUES ('minipizza','esfirra','contem leite e derivados','refri','melhor esfirra da região', '3');

SELECT ID FROM restaurantes WHERE firstname = 'atrantico'
--primeiro pescamos o ID do restaurante para podermos usarlos (comando a cima retorna 4) 
INSERT INTO prato (nome, tipo, obs, acompanhamento, descricao, idrestaurante)
VALUES ('pizza de calabresa','pizza','contem calabresa','n/a','Pizza feliz', '4');

--- Agora que o Pratos foi iniciado podemos utilizamos como cardapio podendo pegar todos os pratos de um restaurante apenas usando o ID dele:
SELECT * FROM `prato` WHERE idrestaurante = '1';
--- Podendo ate mesmo alterar a vizualização utiizando o AS
SELECT nome AS cardapio FROM `prato` WHERE idrestaurante = '1' ;

--- Podemos filtrar os resultado se quisermos buscar algo semelhante usando o LIKE
SELECT * FROM `prato` WHERE tipo LIKE 'hamburguer';

--avaliar
--- assim como anteriormente no prato podemos usar o SELECT FROM WHERE para podermos pegar o id do restaurante via o seu name
INSERT INTO avaliar(notaRestaurante, notaEntrega, motivo, idrestaurante, identregador)
VALUES ('5','5','Perfeito', '1', '1');
INSERT INTO avaliar(notaRestaurante, notaEntrega, motivo, idrestaurante, identregador)
VALUES ('5','2','Perfeito', '1', '1');
INSERT INTO avaliar(notaRestaurante, notaEntrega, motivo, idrestaurante, identregador)
VALUES ('5','5','Perfeito', '1', '1');
INSERT INTO avaliar(notaRestaurante, notaEntrega, motivo, idrestaurante, identregador)
VALUES ('4','4','muito bom', '2', '2');
INSERT INTO avaliar(notaRestaurante, notaEntrega, motivo, idrestaurante, identregador)
VALUES ('3','5','mediano', '3', '3');
INSERT INTO avaliar(notaRestaurante, notaEntrega, motivo, idrestaurante, identregador)
VALUES ('2','2','Horrivel', '4', '4');

--- apos dar as notas iremos utlizar AGREGAÇÃO para pegar a media do entregador somando todas suas notas e dividindo pela quantidade de notas
SELECT SUM(notaEntrega)/COUNT(notaEntrega) FROM avaliar WHERE identregador = '1' 
--- o resultado sera 12/3, ou seja 4 apos isso iremos atualizar a nota do entregador
UPDATE entregador SET Nota = '4' WHERE ID = '1'

--- Pedido
INSERT INTO pedido(payment,prato, iduser, idrestaurante)
VALUES ('cartão','hoper','1', '2');
INSERT INTO pedido(payment,prato, iduser, idrestaurante)
VALUES ('pix','bigkingfeliz', '2', '1');
INSERT INTO pedido(payment,prato, iduser, idrestaurante)
VALUES ('dinheiro','pizza de calabresa','3', '4');
INSERT INTO pedido(payment,prato, iduser, idrestaurante)
VALUES ('fiado','minipizza','4', '3');

-- neste momento deveriamos enviar o ID do pedido para um entregador realizar a entrega, porem iriamos apenas mostrar mais do mesmo entao iremos continuar mostrar mais meotodos do SQL
-- Vamos ver um pouco de ordenação, se demos SELECT * FROM users nos receberemos uma lista completamente desorganizada porem podemos usar o orderBY para resolver isso
SELECT * FROM users ORDER BY firstname; 
SELECT * FROM users ORDER BY CPF;
-- assim teremos uma lista me ordem crescente da lista tendo em base o parametro pedido

INSERT INTO users (CPF, firstname, lastname)
VALUES ('00000','henry','bloons');
INSERT INTO users (CPF, firstname, lastname)
VALUES ('00001','henry','luke');
INSERT INTO users (CPF, firstname, lastname)
VALUES ('00002','henry','pilates');
-- caso desejarmos usar algo como o WHERE dentro do order by temos que usar o HAVING
SELECT * FROM users HAVING firstname = 'henry' ORDER BY lastname ;
-- assim todas as pessoas como nome henry serão exibidas ordenadas pelo seu sobrenome 

-- Agora iremos testar o UNION, ele nada mais é que um SELECT FROM onde se pode juntar dados dois indices de uma tabela, eliminando valores repetidos 
INSERT INTO users (CPF, firstname, lastname)
VALUES ('00003','tlbeto','gatos');
INSERT INTO users (CPF, firstname, lastname)
VALUES ('00004','tlbeto','CNH');
INSERT INTO users (CPF, firstname, lastname)
VALUES ('00005','tlbeto','Thor');
SELECT firstname, lastname from users WHERE firstname ="henry" UNION SELECT firstname, lastname from users WHERE firstname ="tlbeto"

-- Para testar o JOIN iremos ver a tabela de restaurantes e a tabela de prato, usaremos ele para ver os que possuiem o mesmo iD ou seja, o cardapio do restaurante
SELECT a.id, b.idrestaurante
FROM restaurantes as A
INNER JOIN prato as B
                on a.id = b.idrestaurante 
-- com o resultado dessa consulta agora sabemos quais restaurantes ja cadastraram o seu cardapio

-- Left Join, tem como resultado todos os registros que estão na tabela A (mesmo que não estejam na tabela B) e os registros da tabela B que são comuns à tabela A.
-- iremos testar com o entregador e o users, assim teremos uma lista dos entregadores e uma lista dos users apenas com os nomes que se repetirem dos entregadores
SELECT a.firstname, b.firstname
FROM entregador as A
LEFT JOIN users as B
                on a.firstname = b.firstname

-- right join é a mesm acoisa so que ao contrario

-- e para finalizar comandos de deletar, no exemplo abaixo podemos deletar toda uma tabela
DELETE * FROM users
--o exemplo abaixo deleta apenas as linhas que possui um parametro mandado
DELETE FROM restaurantes WHERE restaurantes.id = '1'

-- e para fechar temos o  DROP onde podemos apagar ou uma tabela inteira
DROP TABLE restaurantes
-- ou podems...
DROP TABLE avaliar,entregador,pedido,prato,restauranteendereco,users,usersendereco