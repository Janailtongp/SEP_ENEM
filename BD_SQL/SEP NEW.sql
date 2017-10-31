CREATE TABLE Alternativa (
  idAlternativa INT(10) NOT NULL AUTO_INCREMENT,
  Questao_idQuestao INT(10) NOT NULL,
  descricao TEXT NULL,
  correta INT(2) NULL,
  PRIMARY KEY(idAlternativa, Questao_idQuestao),
  INDEX Alternativa_FKIndex1(Questao_idQuestao)
);

CREATE TABLE Prova (
  idProva INT(10) NOT NULL AUTO_INCREMENT,
  Simulado_idSimulado INTEGER(10) UNSIGNED NOT NULL,
  usuario_idAdmin INT(10) NOT NULL,
  titulo VARCHAR(255) NULL,
  assunto VARCHAR(255) NULL,
  PRIMARY KEY(idProva, Simulado_idSimulado, usuario_idAdmin),
  INDEX Prova_FKIndex1(Simulado_idSimulado),
  INDEX Prova_FKIndex2(usuario_idAdmin)
);

CREATE TABLE Questao (
  idQuestao INT(10) NOT NULL AUTO_INCREMENT,
  enunciado TEXT NULL,
  disciplina VARCHAR(255) NULL,
  assunto VARCHAR(255) NULL,
  nivel VARCHAR(50) NULL,
  PRIMARY KEY(idQuestao)
);

CREATE TABLE Questao_Prova (
  Questao_idQuestao INT(10) NOT NULL,
  Prova_idProva INT(10) NOT NULL,
  Prova_Simulado_idSimulado INTEGER(10) UNSIGNED NOT NULL,
  Prova_usuario_idAdmin INT(10) NOT NULL,
  PRIMARY KEY(Questao_idQuestao, Prova_idProva, Prova_Simulado_idSimulado, Prova_usuario_idAdmin),
  INDEX Questao_has_Prova_FKIndex1(Questao_idQuestao),
  INDEX Questao_has_Prova_FKIndex2(Prova_idProva, Prova_Simulado_idSimulado, Prova_usuario_idAdmin)
);

CREATE TABLE Simulado (
  idSimulado INTEGER(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  titulo VARCHAR(255) NULL,
  data_ VARCHAR(12) NULL,
  descricao VARCHAR(255) NULL,
  PRIMARY KEY(idSimulado)
);

CREATE TABLE usuario (
  idAdmin INT(10) NOT NULL AUTO_INCREMENT,
  nome VARCHAR(255) NULL,
  email VARCHAR(255) NULL,
  senha VARCHAR(255) NULL,
  nivel INT(10) NULL,
  PRIMARY KEY(idAdmin)
);


