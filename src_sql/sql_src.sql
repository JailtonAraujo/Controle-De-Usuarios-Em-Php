create database if not exists `sistema-php`;


USE `sistema-php`;

-- TABLE DE USUARIO --
create table if not exists `usuario`(
	idusuario int(11) not null auto_increment,
    nome varchar(60) not null,
    login varchar (40) not null,
	email varchar (120) not null,
    senha varchar (30) not null,
    primary key(idusuario),
    unique index `login_UNIQUE` (`login` asc) visible,
    unique index `senha_UNIQUE` (`senha` asc) visible
)engine = InnoDB
default character set = utf8;

-- QUERY DE INSERT NO BANCO --
insert into usuario (nome, login, senha, email) values ('?', '?', '?', '?');

--  QUERY DE CONSULTA NO BANCO --
select * from usuario;

-- QUERY DE LOGIN --
select login, idusuario from usuario where senha = '?' and login = '?';

-- QUERY DE DELETE --
delete from usuario where idusuario = ?;

-- QUERY DE BUSCA POR NOME --
select * from usuario where nome like upper('?');

-- QUERY DE UPDATE --
update usuario set nome = '?', login = '?', email = '?', senha = '?' where idusuario = ?;

-- QUERY DE BUSCAR PO ID -- 
select * from usuario where idusuario = ?;

-- QUERY DE CONTAGEM --
select count(*) from usuario;  