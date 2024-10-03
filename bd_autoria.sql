-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 28-Maio-2024 às 19:37
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
CREATE DATABASE `bd_autoria`;
USE `bd_autoria`;
--
-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `Cod_Autor` int(11) NOT NULL,
  `NomeAutor` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`Cod_Autor`, `NomeAutor`, `Sobrenome`, `Email`, `Nasc`) VALUES
(1, 'Carlos', 'Oliveira', 'carlos.oliveira@gmail.com\r\n', '1980-12-10'),
(2, 'João', 'Silva', 'joao.silva@gmail.com', '1985-07-15'),
(3, 'Maria', 'Santos', 'maria.santos@gmail.com', '1990-04-25'),
(4, 'Camila', 'Ribeiro', 'camila.ribeiro@gmail.com', '1994-01-02'),
(5, 'Lucas', 'Almeida', 'lucas.almeida@gmail.com', '1983-11-12'),
(6, 'Ana ', 'Costa', 'ana.costa@gmail.com', '1991-12-01'),
(7, 'Pedro ', 'Ferreira', 'pedro.ferreira@gmail.com', '1995-06-30');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autoria`
--

CREATE TABLE `autoria` (
  `Cod_Autor` int(11) NOT NULL,
  `Cod_Livro` int(11) NOT NULL,
  `DataLancamento` date NOT NULL,
  `Editora` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `autoria`
--

INSERT INTO `autoria` (`Cod_Autor`, `Cod_Livro`, `DataLancamento`, `Editora`) VALUES
(6, 3, '2024-06-05', 'Editora Marquinhos'),
(4, 5, '2023-05-02', 'Editora Francisco'),
(1, 4, '2024-01-02', 'Editora Dois Irmãos'),
(2, 2, '2023-01-01', 'Editora Ronaldin'),
(5, 1, '2024-07-03', 'Editora Gêmeos'),
(3, 4, '2023-05-02', 'Editora Cisco'),
(4, 4, '2024-10-02', 'Editora Kids'),
(3, 3, '2023-08-03', 'Editora ABC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `Cod_Livro` int(11) NOT NULL,
  `Titulo` varchar(100) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `ISBN` varchar(20) NOT NULL,
  `Idioma` varchar(50) NOT NULL,
  `QtdePag` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`Cod_Livro`, `Titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdePag`) VALUES
(1, 'O Senhor dos Anéis ', 'Fantasia', '978-0-618-61515-7', 'Português', 1178),
(2, 'Orgulho e Preconceito', 'Romance', '978-3-16-148410-0', 'Francês', 432),
(3, 'Dom Casmurro ', 'Romance', '978-85-254-2781-4', 'Português', 256),
(4, 'O Pequeno Príncipe ', 'Fábula', '978-85-254-1438-9', 'Português', 96),
(5, 'Harry Potter e a Pedra Filosofal', 'Fantasia', '978-85-325-0944-4', 'Português', 254);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Cod_Autor`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_Livro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `Cod_Autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cod_Livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
