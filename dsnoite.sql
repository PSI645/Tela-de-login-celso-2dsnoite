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

create table dsnoite.tb_produto (
	id int auto_increment primary key,
	codigo  varchar(100),
    descricao varchar (100),
    preco real,
    codbarras int (20),
    img_local varchar (200)
);
insert into dsnoite.tb_produto
(codigo,descricao,preco,codbarras,img_local)
values
('02','Teste de produto',10.10,123456789,'C:\Users\2bmod\Pictures');


select * from dsnoite.tb_usuario;
select * from dsnoite.tb_produto;
select * from dsnoite.tb_black_friday;
select * from dsnoite.tb_produto where codigo = '6';
delete from dsnoite.tb_produto where codigo = "6";
drop table dsnoite.tb_produto;

update dsnoite.tb_usuario set senha = '874961' where email = 'admin@sistema.com';

insert into dsnoite.tb_black_friday (codigo,dt_inicio,dt_fim)
values 
('codigo',dt_inicio,dt_fim);



CREATE TABLE dsnoite.tb_black_friday (
    codigobl VARCHAR(30) PRIMARY KEY,
    dt_inicio datetime,
    dt_fim datetime
);

insert into dsnoite.tb_black_friday (codigobl,dt_inicio,dt_fim)
    values('codigobl','01-01-2025 00:00:00' ,'02-01-2025 00:00:01');
    
    insert into dsnoite.tb_produto(codigo,descricao,preco,codbarras,img_local) values('01','Dinossauro Louco com Copo ',119.26,'12345678910','Toys.jpg')



















