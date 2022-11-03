-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Nov-2022 às 20:17
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `treinamento_inicial`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `nome_cliente` varchar(200) NOT NULL,
  `email_cliente` varchar(200) NOT NULL,
  `telefone_cliente` varchar(20) NOT NULL,
  `rua_cliente` varchar(256) NOT NULL,
  `numero_cliente` varchar(30) NOT NULL,
  `bairro_cliente` varchar(50) NOT NULL,
  `cidade_cliente` varchar(100) NOT NULL,
  `estado_cliente` varchar(50) NOT NULL,
  `complemento_cliente` varchar(150) NOT NULL,
  `cpf_cliente` varchar(50) NOT NULL,
  `status_cliente` int(11) NOT NULL,
  `foto_cliente` varchar(500) DEFAULT NULL,
  `data_cadastro_cliente` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `nome_cliente`, `email_cliente`, `telefone_cliente`, `rua_cliente`, `numero_cliente`, `bairro_cliente`, `cidade_cliente`, `estado_cliente`, `complemento_cliente`, `cpf_cliente`, `status_cliente`, `foto_cliente`, `data_cadastro_cliente`) VALUES
(1, 'João Vítor', 'joao.jvm.marcelino@gmail.com', '47992673757', 'Rua Alfredo Hanemann', '106', 'Barra do Rio Cerro', 'Jaraguá do Sul', 'Santa Catarina', 'casa', '131.780.369-89', 1, 'fotos_usuarios/1_foto.png', '2022-10-20'),
(2, 'Paulo Marcelo', 'paulo.pm.marcelo@gmail.com', '47992673757', 'Rua Alfredo Hanemann', '123', 'Barra do Rio Cerro', 'Jaraguá do Sul', 'Santa Catarina', 'Apartamento n°3 ', '750.580.599-11', 1, 'fotos_usuarios/2_foto.png', '2022-09-20'),
(3, 'Mateus', 'mateus.souza@gmail.com', '(48) 15484-8488', 'Rua João Plankscek', '106', 'Centro', 'Jaraguá do Sul', 'Santa Catarina', 'Apartamento n°2', '917.197.220-05', 0, NULL, '2022-08-20'),
(4, 'Jessica', 'jessica_martins@gmail.com', '(47) 91548-7542', 'João Tozini', '140', 'Centro', 'Corupá', 'Santa Catarina', 'casa', '059.374.850-68', 1, NULL, '2022-07-20'),
(5, 'Moacir Marcelino', 'moacir@gmail.com', '(47) 99267-3757', 'Rua Alfredo Hanemann', '106', 'Barra do Rio Cerro', 'Jaraguá do Sul', 'Santa Catarina', 'casa', '750.580.579-72', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `keys_amazon`
--

CREATE TABLE `keys_amazon` (
  `access_key` varchar(300) NOT NULL,
  `secret_key` varchar(300) NOT NULL,
  `bucket_amazon` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `keys_amazon`
--

INSERT INTO `keys_amazon` (`access_key`, `secret_key`, `bucket_amazon`) VALUES
('AKIAQ5Y35CJGIATZPHMG', 'WjHfjWEE4OIlTxrCBhcUdBwDWelpXzd/KjndTP+t', 'bucketjoao');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfis`
--

CREATE TABLE `perfis` (
  `id_perfil` int(11) NOT NULL,
  `nome_perfil` varchar(300) NOT NULL,
  `status_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfis`
--

INSERT INTO `perfis` (`id_perfil`, `nome_perfil`, `status_perfil`) VALUES
(1, 'Administrador', 1),
(2, 'Vendedor', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `suporte_emails`
--

CREATE TABLE `suporte_emails` (
  `id` int(11) NOT NULL,
  `name` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(220) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `suporte_emails`
--

INSERT INTO `suporte_emails` (`id`, `name`, `email`, `subject`, `content`, `created`, `modified`) VALUES
(1, 'João', 'joao.jvm.marcelino@gmail.com', 'Escrever 1', 'Escrever 1', '2022-10-13 12:15:00', NULL),
(7, 'Joao Vitor', 'joao.jvm.marcelino@gmail.com', 'isso é um teste', 'teste', '2022-10-26 19:37:59', NULL),
(8, 'Joao Vitor', 'joao.jvm.marcelino@gmail.com', 'isso é um teste', 'teste', '2022-10-26 19:38:59', NULL),
(9, 'Joao Vitor', 'joao.jvm.marcelino@gmail.com', 'isso é um teste', 'sssss', '2022-10-26 19:39:04', NULL),
(10, 'Joao Vitor', 'joao.jvm.marcelino@gmail.com', 'isso é um teste', 'testess', '2022-10-26 19:39:12', NULL),
(11, 'Joao Vitor', 'joao.jvm.marcelino@gmail.com', 'isso é um teste', 'testess', '2022-10-26 19:40:36', NULL),
(12, 'joao', 'joao.jvm.marcelino@gmail.com', 'asds', 'asdasd', '2022-10-26 19:40:50', NULL),
(13, 'joao', 'joao_marcelino@estudante.sc.senai.br', 'asdasdasdasdasdasdasvfsgvsBF', 'asdasdasdasdasdsdasdasBFGDBHN', '2022-10-26 19:41:34', NULL),
(14, 'joao', 'joao_marcelino@estudante.sc.senai.br', 'asdasdasdasdasdasdasvfsgvsBF', 'asdasdasdasdasdsdasdasBFGDBHN', '2022-10-26 19:45:35', NULL),
(15, 'jao', 'joao.jvm.marcelino@gmail.com', 'ccccccccccc', 'asdfsfcwved', '2022-10-26 19:45:51', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(200) NOT NULL,
  `perfil_usuario` int(11) NOT NULL,
  `login_usuario` varchar(200) NOT NULL,
  `senha_usuario` varchar(200) NOT NULL,
  `email_usuario` varchar(200) NOT NULL,
  `telefone_usuario` varchar(20) NOT NULL,
  `rua_usuario` varchar(256) NOT NULL,
  `numero_usuario` varchar(30) NOT NULL,
  `bairro_usuario` varchar(50) NOT NULL,
  `cidade_usuario` varchar(100) NOT NULL,
  `estado_usuario` varchar(50) NOT NULL,
  `complemento_usuario` varchar(150) NOT NULL,
  `nasc_usuario` date DEFAULT NULL,
  `cpf_usuario` varchar(50) NOT NULL,
  `status_usuario` int(11) NOT NULL,
  `foto_usuario` varchar(500) DEFAULT NULL,
  `data_cadastro_usuario` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `perfil_usuario`, `login_usuario`, `senha_usuario`, `email_usuario`, `telefone_usuario`, `rua_usuario`, `numero_usuario`, `bairro_usuario`, `cidade_usuario`, `estado_usuario`, `complemento_usuario`, `nasc_usuario`, `cpf_usuario`, `status_usuario`, `foto_usuario`, `data_cadastro_usuario`) VALUES
(1, 'João Vítor Marcelino', 1, 'joao vitor', '7b7ac1234c7481087a080c9af1438a99', 'joao.jvm.marcelino@gmail.com', '47992673757', 'Rua Alfredo Hanemann', '106', 'Barra do Rio Cerro', 'Jaraguá do Sul', 'Santa Catarina', 'casa', '2003-12-28', '131.780.369-89', 0, 'fotos_usuarios/1_foto.png', '2022-10-20'),
(2, 'Paulo Marcelo', 2, 'paulo marcelo', '7b7ac1234c7481087a080c9af1438a99', 'paulo.pm.marcelo@gmail.com', '47992673757', 'Rua Alfredo Hanemann', '123', 'Barra do Rio Cerro', 'Jaraguá do Sul', 'Santa Catarina', 'Apartamento n°3 ', '1998-04-07', '750.580.579-72', 0, 'fotos_usuarios/2_foto.png', '2022-09-20'),
(3, 'Mateus', 1, 'mateus', '7b7ac1234c7481087a080c9af1438a99', 'mateus.souza@gmail.com', '(48) 15484-8488', 'Rua João Plankscek', '106', 'Centro', 'Jaraguá do Sul', 'Santa Catarina', 'Apartamento n°2', '1998-01-12', '917.197.220-05', 1, 'fotos_usuarios/3_foto.png', '2022-08-20'),
(4, 'Jessica', 2, 'jessica', '7b7ac1234c7481087a080c9af1438a99', 'jessica_martins@gmail.com', '(47) 91548-7542', 'João Tozini', '140', 'Centro', 'Corupá', 'Santa Catarina', 'casa', '1997-12-13', '059.374.850-68', 0, NULL, '2022-07-20');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Índices para tabela `perfis`
--
ALTER TABLE `perfis`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices para tabela `suporte_emails`
--
ALTER TABLE `suporte_emails`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `perfis`
--
ALTER TABLE `perfis`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `suporte_emails`
--
ALTER TABLE `suporte_emails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
