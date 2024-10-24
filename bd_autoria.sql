-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/10/2024 às 02:26
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
--

CREATE DATABASE `bd_autoria`;
USE `bd_autoria`;

-- --------------------------------------------------------

--
-- Estrutura para tabela `autor`
--

CREATE TABLE `autor` (
  `Cod_Autor` int(11) NOT NULL,
  `NomeAutor` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autor`
--

INSERT INTO `autor` (`Cod_Autor`, `NomeAutor`, `Sobrenome`, `Email`, `Nasc`) VALUES
(1, 'Arlos', 'Olivei', 'carlos.oliveira@gmail.com', '1980-12-10'),
(2, 'João', 'Silva', 'joao.silva@gmail.com', '1985-07-15'),
(3, 'Maria', 'Santos', 'maria.santos@gmail.com', '1990-04-25'),
(4, 'Camila', 'Ribeiro', 'camila.ribeiro@gmail.com', '1994-01-02'),
(5, 'Lucas', 'Almeida', 'lucas.almeida@gmail.com', '1983-11-12'),
(6, 'Ana ', 'Costa', 'ana.costa@gmail.com', '1991-12-01'),
(7, 'Pedro ', 'Ferreira', 'pedro.ferreira@gmail.com', '1995-06-30'),
(8, '1321312', '1323123', 'a@a', '2024-10-01'),
(9, '1321312', '1323123', '13231@odmwod', '2024-10-24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `autoria`
--

CREATE TABLE `autoria` (
  `Cod_Autor` int(11) NOT NULL,
  `Cod_Livro` int(11) NOT NULL,
  `DataLancamento` date NOT NULL,
  `Editora` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `autoria`
--

INSERT INTO `autoria` (`Cod_Autor`, `Cod_Livro`, `DataLancamento`, `Editora`) VALUES
(6, 3, '2024-06-05', 'Editora Marquinhos'),
(4, 5, '2023-05-02', 'Editora Francisco'),
(1, 4, '2024-01-02', 'Editora Dois Irmãos'),
(2, 2, '0000-00-00', 'awdacarlos'),
(5, 1, '2024-07-03', 'Editora Gêmeos'),
(3, 4, '2023-05-02', 'Editora Cisco'),
(4, 4, '2024-10-02', 'Editora Kids'),
(3, 3, '2023-08-03', 'Editora ABC'),
(1, 2, '2024-11-09', 'Flamengo CARLOS');

-- --------------------------------------------------------

--
-- Estrutura para tabela `livro`
--

CREATE TABLE `livro` (
  `Cod_Livro` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `Idioma` varchar(50) NOT NULL,
  `QtdePag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `livro`
--

INSERT INTO `livro` (`Cod_Livro`, `Titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdePag`) VALUES
(1, 'O Senhor ', 'Fan', '978-06-186-1515-7', 'Português', 1178),
(2, 'Orgulho e Preconceito', 'Romance', '978-3-16-148410-0', 'Francês', 432),
(3, 'Dom Casmurro ', 'Romance', '978-85-254-2781-4', 'Português', 256),
(4, 'O Pequeno Príncipe ', 'Fábula', '978-85-254-1438-9', 'Português', 96),
(5, 'Harry Potter e a Pedra Filosofal', 'Fantasia', '978-85-325-0944-4', 'Português', 254),
(6, '213', 'Fiçcão', '123-1', '312', 312),
(7, 'dwa', 'Fiçcão', '312', '312', 312);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(100) NOT NULL,
  `senha` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`usuario`, `senha`) VALUES
('a', 123),
('b', 456);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Cod_Autor`);

--
-- Índices de tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_Livro`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `Cod_Autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cod_Livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
