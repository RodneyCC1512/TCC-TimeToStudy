CREATE DATABASE tccbd;
USE tccbd;


CREATE TABLE usuario (
  usuario_id int AUTO_INCREMENT PRIMARY KEY,
  usuario varchar(200) NOT NULL,
  email varchar(200) NOT NULL,
  senha varchar(50) NOT NULL,
  chave varchar(220) DEFAULT NULL,
  sits_usuario_id int NOT NULL DEFAULT 3
);


CREATE TABLE sits_usuario (
  sit_id int AUTO_INCREMENT PRIMARY KEY,
  nome_sit varchar(45) NOT NULL
);

INSERT INTO sits_usuario (`sit_id`, `nome_sit`) VALUES
(1, 'Ativo'),
(2, 'Inativo'),
(3, 'Aguardando');



CREATE TABLE trabalhos (
  trabalho_id int AUTO_INCREMENT PRIMARY KEY,
  Titulo varchar(50) NOT NULL,
  DataEntrega date NOT NULL,
  Materia varchar(200) NOT NULL,
  usuario_id int NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);


CREATE TABLE lembretes (
  lembrete_id int AUTO_INCREMENT PRIMARY KEY,
  usuario_id int NOT NULL,
  Titulo varchar(220) NOT NULL,
  Conteudo varchar(220) NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);


CREATE TABLE horario_escolar (
  id int AUTO_INCREMENT PRIMARY KEY,
  usuario_id int NOT NULL,
  dia_da_semana varchar(20) NOT NULL,
  horario_inicio time NOT NULL,
  horario_fim time NOT NULL,
  materia varchar(220) NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES usuario(usuario_id)
);

