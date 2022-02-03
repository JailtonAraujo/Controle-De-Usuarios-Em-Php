create database if not exists `sistema-php`;


USE `sistema-php`;

-- TABLE DE USUARIO --
create table if not exists `usuario`(
	idusuario int(11) not null auto_increment,
    nome varchar(120) not null,
    login varchar (255) not null,
    senha varchar (255) not null,
    primary key(idusuario),
    unique index `login_UNIQUE` (`login` asc) visible,
    unique index `senha_UNIQUE` (`senha` asc) visible
)engine = InnoDB
default character set = utf8;

-- QUERY DE INSERT NO BANCO --
insert into usuario (nome, login, senha) values ('admin', 'admin', 'admin');

--  QUERY DE CONSULTA NO BANCO --
select * from usuario;

-- QUERY DE LOGIN --
select login, idusuario from usuario where senha = md5('admin') and login = 'admin'

