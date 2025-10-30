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

select * from dsnoite.tb_usuario;

update dsnoite.tb_usuario set senha = '874961' where email = 'admin@sistema.com';











