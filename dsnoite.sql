create database dsnoite;

use dsnoite;

CREATE TABLE dsnoite.tb_usuario (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf VARCHAR(14),
    tel INT,
    email VARCHAR(150),
    senha VARCHAR(150),
    ativo VARCHAR(3)
);
insert into dsnoite.tb_usuario 
(nome,cpf,tel,email,senha,ativo) 
values 
('Administrador','111.111.111-00',1139776540,'admin@sistema.com','1234567890','sim');

create table dsnoite.tb_Produto (
	codigo varchar(100),
    descricao varchar (100),
    preco real,
    codbarras int (20),
    localimg varchar (200)
);
insert into dsnoite.tb_produto
(codigo,descricao,preco,codbarras,localimg)
values
('02','Teste de produto',10.10,123456789,'C:\Users\2bmod\Pictures');


select * from dsnoite.tb_usuario;
select * from dsnoite.tb_produto;
select * from dsnoite.tb_produto where codigo = '01';
delete from dsnoite.tb_produto where codigo = "03";

update dsnoite.tb_usuario set senha = '874961' where email = 'admin@sistema.com';















