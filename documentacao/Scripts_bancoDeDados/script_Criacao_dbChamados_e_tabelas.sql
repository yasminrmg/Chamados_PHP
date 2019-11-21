CREATE DATABASE chamado_rapido;

CREATE TABLE condominio
(
	id_condominio int primary key auto_increment not null,
    nome_condominio varchar(200),
	endereco varchar(200),
	cidade varchar(100),
	uf char(2),
	data_cadastro datetime default current_timestamp,
    id_operador int-- , 
    -- primary key(id_condominio),
    -- foreign key (id_operador) references usuario(id_usuario)
);

CREATE TABLE apartamento (
	id_apartamento int primary key auto_increment not null,
    id_condominio int,
    bloco varchar(20),
    n_apartamento int,
    n_vaga int,
    data_cadastro datetime default current_timestamp,
    id_operador int,
    -- primary key(id_apartamento),
    foreign key (id_condominio) references condominio(id_condominio)-- ,
    -- foreign key (id_operador) references usuario(id_usuario)
);

CREATE TABLE tipo_usuario(
	id_tipo_usuario int primary key auto_increment not null,
    nome_tipo varchar(50),
    id_operador int,
    ativo bit,
    data_cadastro datetime default current_timestamp
);

CREATE TABLE usuario (
	id_usuario int primary key auto_increment not null,
    id_tipo_usuario int,
    cpf varchar(15),
    data_nascimento datetime,
    nome_usuario varchar(100),
    email varchar(200),
    login varchar(30) not null,
    senha varchar(15) not null,
	id_apartamento int ,
    id_operador int ,
    aprovado bit,
    data_aprovacao datetime default current_timestamp,
    foreign key (id_tipo_usuario) references tipo_usuario(id_tipo_usuario),
    foreign key (id_apartamento) references apartamento(id_apartamento),
    foreign key (id_operador) references usuario(id_usuario)
);

create table tipo_solicitacao
(
	id_tipo_solicitacao int primary key auto_increment not null,
    titulo_tipo_solicitacao varchar(30),
    data_cadastro datetime default current_timestamp,
    id_operador int,
    ativo bit default 1,
    foreign key (id_operador) references usuario(id_usuario)
);

create table solicitacao(
	id_solicitacao int primary key auto_increment not null,
    id_tipo_solicitacao int,
    titulo_solicitacao varchar(50),
    descricao_solicitacao text,
    id_solicitante int,
    id_atendente int,
    data_solicitacao datetime default current_timestamp,
    data_evento datetime,
    duracao_evento datetime,
    status int,
	foreign key (id_tipo_solicitacao) references tipo_solicitacao(id_tipo_solicitacao),
    foreign key (id_solicitante) references usuario(id_usuario),
    foreign key (id_atendente) references usuario(id_usuario),
    data_atendimento datetime
);