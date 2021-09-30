SET foreign_key_checks = off;

CREATE DATABASE IF NOT EXISTS db_wiki;

USE db_wiki;

-- Table Status
DROP TABLE IF EXISTS status;
CREATE TABLE IF NOT EXISTS status (
  id int AUTO_INCREMENT,
  status_name varchar(150),
  id_user_created int NOT NULL DEFAULT '1',
  id_user_updated int NOT NULL DEFAULT '0',
  id_user_deleted int NOT NULL DEFAULT '0',
  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO status (id, status_name, id_user_created, id_user_updated, id_user_deleted, created_at, updated_at, deleted_at) VALUES
(NULL, 'Ativo', 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Bloqueado', 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Excluído', 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- Table Roles (Permissões)
DROP TABLE IF EXISTS roles;
CREATE TABLE IF NOT EXISTS roles (
  id int AUTO_INCREMENT,
  role_name varchar(150),
  scope varchar(255),
  id_user_created int NOT NULL DEFAULT '1',
  id_user_updated int NOT NULL DEFAULT '0',
  id_user_deleted int NOT NULL DEFAULT '0',
  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO roles (id, role_name, scope, id_user_created, id_user_updated, id_user_deleted, created_at, updated_at, deleted_at) VALUES
(NULL, 'Administrador', 'users.created users.selected users.selected.all users.updated users.deleted', 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Consulta', 'users.selected users.selected.all', 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Centro de TI', 'users.selected users.selected.all users.updated', 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Coordenação', 'clients.selected clients.selected.all', 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Secretaria', 'professionals.selected professionals.selected.all', 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Central de Atendimento', 'professionals.selected professionals.selected.all', 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- Table Users Roles (Usuários e Permissões)
DROP TABLE IF EXISTS users_roles;
CREATE TABLE IF NOT EXISTS users_roles (
  id int AUTO_INCREMENT,
  id_user int NOT NULL DEFAULT '0',
  id_role int NOT NULL DEFAULT '0',
  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY(id),
  FOREIGN KEY(id_user) REFERENCES users(id) ON DELETE CASCADE,
  FOREIGN KEY(id_role) REFERENCES roles(id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users_roles (id, id_user, id_role, created_at, updated_at) VALUES
(NULL, 1, 1, now(), '0000-00-00 00:00:00'),
(NULL, 2, 2, now(), '0000-00-00 00:00:00'),
(NULL, 2, 3, now(), '0000-00-00 00:00:00');

-- Table Users (Usuários)
DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
  id int AUTO_INCREMENT,
  avatar varchar(100),
  first_name varchar(150),
  last_name varchar(150),
  gender char(1),
  email varchar(150),
  password varchar(100),
  id_status int NOT NULL DEFAULT '1',
  id_user_created int NOT NULL,
  id_user_updated int NOT NULL DEFAULT '0',
  id_user_deleted int NOT NULL DEFAULT '0',
  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id),
  FOREIGN KEY(id_status) REFERENCES status(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO users (id, avatar, first_name, last_name, gender, email, password, id_status, id_user_created, id_user_updated, id_user_deleted, created_at, updated_at, deleted_at) VALUES
(NULL, '', 'Administrador', 'Sistema', 'M', 'admin@admin.com.br', '$2y$10$9DBepfPaoYtFgVjgFl/xnup6i6OaHaothHGBxhHdLuBks84pRrklq', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '', 'Elisa', 'Almeida', 'F', 'ealmeida@colegiorealengo.br', '$2y$10$9DBepfPaoYtFgVjgFl/xnup6i6OaHaothHGBxhHdLuBks84pRrklq', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- Table Courses Modules (Cursos e Modulos)
DROP TABLE IF EXISTS courses_modules;
CREATE TABLE IF NOT EXISTS courses_modules (
  id int AUTO_INCREMENT,
  module_code varchar(8),
  module_name varchar(9),
  id_status int NOT NULL DEFAULT '1',
  id_user_created int NOT NULL,
  id_user_updated int NOT NULL DEFAULT '0',
  id_user_deleted int NOT NULL DEFAULT '0',
  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO courses_modules (id, module_code, module_name, id_status, id_user_created, id_user_updated, id_user_deleted, created_at, updated_at, deleted_at) VALUES
(NULL, 'Mod I', 'Módulo 1', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Mod II', 'Módulo 2', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Mod III', 'Módulo 3', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Mod IV', 'Módulo 4', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Mod V', 'Módulo 5', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Mod VI', 'Módulo 6', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Mod VII', 'Módulo 7', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Mod VIII', 'Módulo 8', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Mod IX', 'Módulo 9', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Mod X', 'Módulo 10', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- Table Courses (Cursos)
DROP TABLE IF EXISTS courses;
CREATE TABLE IF NOT EXISTS courses (
  id int AUTO_INCREMENT,
  course_code varchar(6),
  course_name varchar(150),
  course_title text,
  course_subtitle text,
  id_status int NOT NULL DEFAULT '1',
  id_user_created int NOT NULL,
  id_user_updated int NOT NULL DEFAULT '0',
  id_user_deleted int NOT NULL DEFAULT '0',
  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id),
  FOREIGN KEY(id_status) REFERENCES status(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO courses (id, course_code, course_name, course_title, course_subtitle, id_status, id_user_created, id_user_updated, id_user_deleted, created_at, updated_at, deleted_at) VALUES
-- Educação Infantial
(NULL, 'INF', 'Educação Infantil', 'Creche e Educação Infantil com equipe multiprofissional e ambientes que estimulam o aprendizado e a socialização.', 'No Colégio Realengo seus filhos têm segurança, carinho e muita diversão para desenvolver a vontade de aprender desde cedo.', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'FUN', 'Ensino Fundamental', 'Ensino Fundamental que encoraja o protagonismo, a investigação científica e a autonomia para os estudos.', 'No Colégio Realengo seus filhos têm segurança, carinho e muitos estímulos para desenvolver as habilidades necessárias para uma vida feliz e repleta de realizações.', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'MED', 'Ensino Médio Profissionalizante', 'Comece a trabalhar mais cedo na profissão que você escolheu.', 'Com o Ensino Médio Técnico do Colégio Realengo você acelera a sua entrada no mercado de trabalho, sendo reconhecido como um profissional técnico formado na melhor instituição de ensino da região.', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EJA', 'EJA', 'Complete seus estudos no Colégio Realengo.', 'Avance na sua escolaridade, adquira novos conhecimentos e conquiste novas oportunidades no mercado de trabalho.', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PMED', 'Pós-Médio Técnico (Subsequente)', 'Subsequente Técnico Profissionalizante (Pós Médio).', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- Table Courses Categories (Cursos e Modalidades)
DROP TABLE IF EXISTS courses_categories;
CREATE TABLE IF NOT EXISTS courses_categories (
  id int AUTO_INCREMENT,
  course_categorie_code varchar(6),
  course_categorie_name varchar(150),
  id_course int NOT NULL,
  id_status int NOT NULL DEFAULT '1',
  id_user_created int NOT NULL,
  id_user_updated int NOT NULL DEFAULT '0',
  id_user_deleted int NOT NULL DEFAULT '0',
  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id),
  FOREIGN KEY(id_course) REFERENCES courses(id),
  FOREIGN KEY(id_status) REFERENCES status(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO courses_categories (id, course_categorie_code, course_categorie_name, id_course, id_status, id_user_created, id_user_updated, id_user_deleted, created_at, updated_at, deleted_at) VALUES
-- Educação Infantial
(NULL, 'CSI', 'Creche Semi-Integral', 1, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'CI', 'Creche Integral', 1, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'MAT1', 'Maternal I', 1, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'MAT2', 'Maternal II', 1, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PE1', 'Pré-escola I', 1, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PE2', 'Pré-escola II', 1, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
-- Ensino Fundamental
(NULL, 'EF1', '1º Ano Ensino Fundamental', 2, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EF2', '2º Ano Ensino Fundamental', 2, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EF3', '3º Ano Ensino Fundamental', 2, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EF4', '4º Ano Ensino Fundamental', 2, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EF5', '5º Ano Ensino Fundamental', 2, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EF6', '6º Ano Ensino Fundamental', 2, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EF7', '7º Ano Ensino Fundamental', 2, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EF8', '8º Ano Ensino Fundamental', 2, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EF9', '9º Ano Ensino Fundamental', 2, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
-- Ensino Médio Profissionalizante
(NULL, 'EMENF1', '1ª Série Ensino Médio - Técnico em Enfermagem', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMENF2', '2ª Série Ensino Médio - Técnico em Enfermagem', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMENF3', '3ª Série Ensino Médio - Técnico em Enfermagem', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMINF1', '1ª Série Ensino Médio - Técnico em Informática', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMINF2', '2ª Série Ensino Médio - Técnico em Informática', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMINF3', '3ª Série Ensino Médio - Técnico em Informática', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMPET1', '1ª Série Ensino Médio - Técnico em Petróleo e Gás', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMPET2', '2ª Série Ensino Médio - Técnico em Petróleo e Gás', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMPET3', '3ª Série Ensino Médio - Técnico em Petróleo e Gás', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMADM1', '1ª Série Ensino Médio - Técnico em Administração', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMADM2', '2ª Série Ensino Médio - Técnico em Administração', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMADM3', '3ª Série Ensino Médio - Técnico em Administração', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMCON1', '1ª Série Ensino Médio - Técnico em Contabilidade', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMCON2', '2ª Série Ensino Médio - Técnico em Contabilidade', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMCON3', '3ª Série Ensino Médio - Técnico em Contabilidade', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMTUR1', '1ª Série Ensino Médio - Técnico em Turismo', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMTUR2', '2ª Série Ensino Médio - Técnico em Turismo', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMTUR3', '3ª Série Ensino Médio - Técnico em Turismo', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMSEG1', '1ª Série Ensino Médio - Técnico em Segurança do Trabalho', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMSEG2', '2ª Série Ensino Médio - Técnico em Segurança do Trabalho', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EMSEG3', '3ª Série Ensino Médio - Técnico em Segurança do Trabalho', 3, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
-- EJA
(NULL, 'EJA6EF', '6º Ano Ensino Fundamental', 4, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EJA7EF', '7º Ano Ensino Fundamental', 4, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EJA8EF', '8º Ano Ensino Fundamental', 4, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EJA9EF', '9º Ano Ensino Fundamental', 4, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EJA1EM', '1ª Série Ensino Médio', 4, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EJA2EM', '2ª Série Ensino Médio', 4, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'EJA3EM', '3ª Série Ensino Médio', 4, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
-- Subsequente Técnico Profissionalizante (Pós Médio)
-- Pós-Médio - Curso Técnico - Área de Saúde (Presencial)
(NULL, 'PMENF', 'Pós-Médio Técnico em Enfermagem (Curso Técnico - Presencial)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PMPRO', 'Pós-Médio Técnico em Prótese Dentária (Curso Técnico - Presencial)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PMRAD', 'Pós-Médio Técnico em Radiologia (Curso Técnico - Presencial)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PMSAU', 'Pós-Médio Técnico em Saúde Bucal (Curso Técnico - Presencial)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
-- Pós-Médio - Curso Normal (Presencial)
(NULL, 'PMFOR', 'Pós-médio Técnico em Formação de Professores (Curso Normal - Presencial)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
-- Pós-Médio - Curso Técnico (EAD)
(NULL, 'PMADM', 'Pós-Médio Técnico em Administração (Curso Técnico - EAD)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PMCON', 'Pós-Médio Técnico em Contabilidade (Curso Técnico - EAD)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PMINF', 'Pós-Médio Técnico em Informática (Curso Técnico - EAD)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PMTEL', 'Pós-Médio Técnico em Telecomunicações (Curso Técnico - EAD)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PMPET', 'Pós-Médio Técnico em Petróleo e Gás (Curso Técnico - EAD)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PMSEC', 'Pós-Médio Técnico em Secretaria Escolar (Curso Técnico - EAD)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PMSEG', 'Pós-Médio Técnico em Segurança do Trabalho (Curso Técnico - EAD)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'PMTUR', 'Pós-Médio Técnico em Turismo (Curso Técnico - EAD)', 5, 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- Table Students (Alunos)
DROP TABLE IF EXISTS students;
CREATE TABLE IF NOT EXISTS students (
  id int AUTO_INCREMENT,
  student_code varchar(14) COMMENT 'Matrícula do Aluno',
  student_name varchar(150),
  id_course_categorie int NOT NULL,
  id_course_module int NOT NULL DEFAULT '0',
  registration int NOT NULL DEFAULT '1' COMMENT '0 = Matrícula / 1 = Rematrícula',
  date_of_registration date COMMENT 'Data de Matrícula',
  date_in_flow date COMMENT 'Data no Fluxo',
  cellphone varchar(14),
  email varchar(150),
  cpf varchar(14),
  id_status int NOT NULL DEFAULT '1',
  id_user_created int NOT NULL,
  id_user_updated int NOT NULL DEFAULT '0',
  id_user_deleted int NOT NULL DEFAULT '0',
  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id),
  FOREIGN KEY(id_course_categorie) REFERENCES courses_categories(id),
  FOREIGN KEY(id_course_module) REFERENCES courses_modules(id),
  FOREIGN KEY(id_status) REFERENCES status(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO students (id, student_code, student_name, id_course_categorie, id_course_module, registration, date_of_registration, date_in_flow, cellphone, email, cpf, id_status, id_user_created, id_user_updated, id_user_deleted, created_at, updated_at, deleted_at) VALUES
-- EJA
(NULL, '05.2020.2.0163', 'Julianne Laís Amorim Pinheiro', 43, 0, 0, '2020-08-31', '0000-00-00', '', 'juliannexpinheiro@gmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0178', 'Gabriel de Araujo Vilarinho Santos', 41, 0, 0, '22020-09-02', '0000-00-00', '', 'araujo.gabrielos1999@gmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0186', 'Beatriz Pessôa de Oliveira', 41, 0, 0, '2020-09-10', '0000-00-00', '', 'adrianapessoa@yahoo.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0184', 'Giselli Ferreira Gomes', 42, 0, 0, '2020-09-09', '0000-00-00', '', 'giselli31gomes@gmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0182', 'Júlia da Silveira Almeida', 41, 0, 0, '2020-09-11', '0000-00-00', '', 'juliadasalmeida@gmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0191', 'Izabelle Ingrid Alves Pereira', 41, 0, 0, '2020-09-15', '0000-00-00', '', 'izabelleingridalvespereiraagui@gmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0183', 'Antonia Railha Alves dos Santos', 43, 0, 0, '2020-09-09', '0000-00-00', '', 'railhaleandro6@gmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0195', 'Luciano Salomão Teixeira Alves', 41, 0, 0, '2020-09-16', '0000-00-00', '', 'lucianosilva20@hotmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0200', 'Lucas Gouveia Soares', 43, 0, 0, '2020-09-21', '0000-00-00', '', 'luksscontato@gmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2019.1.1733', 'Ericka Estefane Silva de Albuquerque', 41, 0, 1, '0000-00-00', '0000-00-00', '', 'erickaalbuquerque.ea@gmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0197', 'Luis Fernando Fernandes Ferraço', 41, 0, 0, '2020-09-24', '0000-00-00', '', 'bcnandobc@gmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2015.1.1803', 'André Matheus Nery Pismel', 40, 0, 1, '0000-00-00', '0000-00-00', '', '', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2018.1.5677', 'José Roberto da Silva Miranda', 41, 0, 1, '2020-09-23', '0000-00-00', '', 'ze.roberto.miranda22@gmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.1.3116', 'Fábio Miranda de Carvalho', 43, 0, 1, '2020-09-22', '0000-00-00', '', 'fabiomiranda.eja@gmail.com', '', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
-- PÓS-MÉDIO (MÓDULO 1)
(NULL, '05.2020.2.0165', 'Caroline da Silva Cabral', 54, 1, 0, '2020-08-28', '0000-00-00', '(21)96817-8649', 'carolinecabral77@yahoo.com', '160.585.537-50', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0164', 'Tatiana Ribeiro Vinagre de Sousa', 54, 1, 0, '2020-08-28', '0000-00-00', '(21)99573-1803', 'tatyrvs@yahoo.com.br', '057.230.327-04', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0163', 'Julianne Laís Amorim Pinheiro', 43, 1, 0, '2020-08-31', '0000-00-00', '(21)99962-8497', 'juliannexpinheiro@gmail.com', '199.980.337-05', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2010.1.2335', 'Jaqueline do Nascimento Feitosa', 46, 1, 0, '2020-08-31', '0000-00-00', '(21)96587-1685', 'jaquelinefeitosa123@gmail.com', '169.428.887-02', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0152', 'Tatiana da Silva Page Machado', 55, 1, 0, '2020-08-25', '0000-00-00', '(21)97028-5859', 'tattyconsultoriamkt@gmail.com', '052.931.317-02', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2020.2.0166', 'Camila Lopes da Silva Ribeiro', 44, 1, 0, '2020-09-01', '0000-00-00', '(21)99151-1485', 'camilalopesribeiro21@gmail.com', '122.161.727-31', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0176', 'Cristiane Ribeiro da Silva Amaral', 51, 1, 0, '2020-09-01', '0000-00-00', '(21)97498-9292', 'cristianeama8899@gmail.com', '047.895.387-96', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2020.2.0167', 'Bruno da Silva Santos', 45, 1, 0, '2020-08-31', '0000-00-00', '(21)97163-3340', 'brenoferrazsantos@hotmail.com', '092.776.737-61', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0173', 'Vanda Nepomuceno de Andrade', 56, 1, 0, '2020-09-01', '0000-00-00', '(21)97042-1600', 'vandanepo@yahoo.com.br', '629.653.527-91', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0174', 'Vanessa Pompeu de Lima', 54, 1, 0, '2020-09-01', '0000-00-00', '(21)99011-7993', 'v.pompeu@hotmail.com', '115.978.387-05', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2020.2.0169', 'Vitória Cristine Martisn Marques Ferreira', 45, 1, 0, '2020-09-01', '0000-00-00', '(21)96490-5688', 'vitoriacristineferreira@gmail.com', '176.147.607-60', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0175', 'Chelly Gomes Perciliano Silva', 54, 1, 0, '2020-09-01', '0000-00-00', '(21)98018-4863', 'perciliano.gomes35@gmail.com', '055.276.777-81', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0171', 'Bruno Albano Monteiro', 51, 1, 0, '2020-09-01', '0000-00-00', '(21)97509-8062', 'brunodamonique@gmail.com', '087.569.087-41', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2020.2.0170', 'Thiago Bastos de Assumpcao', 46, 1, 0, '2020-09-01', '0000-00-00', '(21)97029-9735', 'tbassumpcao@hotmail.com', '145.946.517-20', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0178', 'Gabriel de Araujo Vilarinho Santos', 41, 1, 0, '2020-09-02', '0000-00-00', '(21)98170-8240', 'araujo.gabrielos1999@gmail.com', '174.958.537-51', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0172', 'Douglas de Moraes Moura', 51, 1, 0, '2020-09-02', '0000-00-00', '(21)97300-2506', 'douglasmorenotdb@gmail.com', '132.664.757-12', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2020.2.0177', 'Elias Albino da Costa', 45, 1, 0, '2020-09-02', '0000-00-00', '(21)98200-4368', 'eliascosta60@hotmail.com', '090.931.777-10', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2020.2.0179', 'Sergio Marcio de Oliveira Queiroz', 45, 1, 0, '2020-09-04', '0000-00-00', '(21)98747-4738', 'marcioqueiroz446@gmail.com', '162.552.117-03', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2020.2.0180', 'Brenda dos Santos da Silva', 47, 1, 0, '2020-09-10', '0000-00-00', '(48)99129-3973', 'brendagatahh@hotmail.com', '169.096.687-40', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0186', 'Beatriz Pessôa de Oliveira', 41, 1, 0, '2020-09-10', '0000-00-00', '(21)97590-4092', 'adrianapessoa@yahoo.com', '714.320.834-57', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0184', 'Giselli Ferreira Gomes', 42, 1, 0, '2020-09-09', '0000-00-00', '(21)99349-3822', 'giselli31gomes@gmail.com', '138.862.347-11', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2020.2.0188', 'Geruza do Nascimento', 45, 1, 0, '2020-09-10', '0000-00-00', '(21)97525-3509', 'geruza_n@yahoo.com.br', '036.494.877-99', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0182', 'Júlia da Silveira Almeida', 41, 1, 0, '2020-09-11', '0000-00-00', '(21)97509-8062', 'juliadasalmeida@gmail.com', '149.610.237-10', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0191', 'Izabelle Ingrid Alves Pereira', 41, 1, 0, '2020-09-15', '0000-00-00', '(21)99821-1593', 'Izabelleingridalvespereiraagui@gmail.com', '146.091.356-63', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0183', 'Antonia Railha Alves dos Santos', 43, 1, 0, '2020-09-09', '0000-00-00', '(21)96968-3309', 'railhaleandro6@gmail.com', '076.717.523-98', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2020.2.0187', 'Lucas Gaspar Meira Lima', 46, 1, 0, '2020-09-10', '0000-00-00', '(21)97466-6036', 'lucas.g.ml@hotmail.com', '151.178.237-45', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '05.2020.2.0195', 'Luciano Salomão Teixeira Alves', 41, 1, 0, '2020-09-16', '0000-00-00', '(21)97044-8185', 'lucianosilva20@hotmail.com', '154.921.667-86', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2020.2.0193', 'Renato Pereira de Souza', 46, 1, 0, '2020-09-15', '0000-00-00', '(21)97190-6845', 'biina_vips@hotmail.com', '097.787.127-43', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, '03.2020.2.0190', 'Noel José Machado Filho', 45, 1, 0, '2020-09-14', '0000-00-00', '(21)98298-5267', 'leonjmfilho@gmail.com', '021.748.467-05', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- Table Applications (Aplicações)
DROP TABLE IF EXISTS applications;
CREATE TABLE IF NOT EXISTS applications (
  id int AUTO_INCREMENT,
  application_name varchar(20),
  id_status int NOT NULL DEFAULT '1',
  id_user_created int NOT NULL,
  id_user_updated int NOT NULL DEFAULT '0',
  id_user_deleted int NOT NULL DEFAULT '0',
  created_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  updated_at timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  deleted_at datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY(id),
  FOREIGN KEY(id_status) REFERENCES status(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO applications (id, application_name, id_status, id_user_created, id_user_updated, id_user_deleted, created_at, updated_at, deleted_at) VALUES
(NULL, 'ClassApp', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Teams', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Portal', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Biblioteca Virtual', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Boas Vindas', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(NULL, 'Sala de Aula', 1, 1, 0, 0, now(), '0000-00-00 00:00:00', '0000-00-00 00:00:00');