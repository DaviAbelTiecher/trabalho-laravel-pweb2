-- ========================================================
-- SCRIPT SQL DO BANCO DE DADOS - CENTRO DE TREINAMENTO (SIG-CT)
-- ========================================================

CREATE DATABASE IF NOT EXISTS `db_centro_treinamento` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_centro_treinamento`;

-- --------------------------------------------------------
-- Tabela: users
-- --------------------------------------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Administrador CT', 'admin@ct.com', '$2y$12$K1Q2y8G.Yn2E2X3Uv4W5O.H6J7K8L9M0N1O2P3Q4R5S6T7U8V9W0X', NOW(), NOW());

-- --------------------------------------------------------
-- Tabela: alunos
-- --------------------------------------------------------
DROP TABLE IF EXISTS `alunos`;
CREATE TABLE `alunos` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL UNIQUE,
  `cpf` varchar(16) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `alunos` (`id`, `nome`, `email`, `cpf`, `telefone`, `created_at`, `updated_at`) VALUES
(1, 'Carlos Eduardo Silva', 'carlos.silva@email.com', '123.456.789-00', '(48) 99988-7766', NOW(), NOW()),
(2, 'Mariana Oliveira', 'mariana.oliveira@email.com', '234.567.890-11', '(48) 98877-6655', NOW(), NOW()),
(3, 'Fernanda Costa', 'fernanda.costa@email.com', '345.678.901-22', '(48) 97766-5544', NOW(), NOW()),
(4, 'Lucas Martins', 'lucas.martins@email.com', '456.789.012-33', '(48) 96655-4433', NOW(), NOW()),
(5, 'Beatriz Souza', 'beatriz.souza@email.com', '567.890.123-44', '(48) 95544-3322', NOW(), NOW());

-- --------------------------------------------------------
-- Tabela: modalidades
-- --------------------------------------------------------
DROP TABLE IF EXISTS `modalidades`;
CREATE TABLE `modalidades` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome_modalidade` varchar(150) NOT NULL,
  `descricao` text NOT NULL,
  `valor_mensal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `modalidades` (`id`, `nome_modalidade`, `descricao`, `valor_mensal`, `created_at`, `updated_at`) VALUES
(1, 'Musculação', 'Treinamento resistido para ganho de força e massa muscular.', 120.00, NOW(), NOW()),
(2, 'Crossfit', 'Treinamento funcional de alta intensidade.', 180.00, NOW(), NOW()),
(3, 'Pilates', 'Exercícios focados em flexibilidade, postura e controle corporal.', 150.00, NOW(), NOW()),
(4, 'Natação', 'Aulas de natação para todos os níveis.', 160.00, NOW(), NOW()),
(5, 'Spinning', 'Ciclismo indoor de alta queima calórica.', 110.00, NOW(), NOW());

-- --------------------------------------------------------
-- Tabela: avaliacao_fisicas (Relacionamento 1:1 com alunos)
-- --------------------------------------------------------
DROP TABLE IF EXISTS `avaliacao_fisicas`;
CREATE TABLE `avaliacao_fisicas` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `aluno_id` bigint(20) UNSIGNED NOT NULL UNIQUE,
  `peso` decimal(5,2) NOT NULL,
  `altura` decimal(3,2) NOT NULL,
  `objetivo_treino` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_avaliacao_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `avaliacao_fisicas` (`id`, `aluno_id`, `peso`, `altura`, `objetivo_treino`, `created_at`, `updated_at`) VALUES
(1, 1, 78.50, 1.75, 'Hipertrofia', NOW(), NOW()),
(2, 2, 62.00, 1.65, 'Emagrecimento', NOW(), NOW()),
(3, 3, 58.30, 1.62, 'Condicionamento Físico', NOW(), NOW()),
(4, 4, 85.10, 1.82, 'Ganho de Força', NOW(), NOW()),
(5, 5, 69.40, 1.70, 'Reabilitação', NOW(), NOW());
