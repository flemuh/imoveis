-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 11-Mar-2020 às 17:42
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `imoveis`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `foto`
--

CREATE TABLE `foto` (
  `IDFOTO` int(11) NOT NULL,
  `FOTONOME` varchar(255) NOT NULL,
  `IDIMOVEL` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `foto`
--

INSERT INTO `foto` (`IDFOTO`, `FOTONOME`, `IDIMOVEL`, `status`) VALUES
(52, '4fe3b07ea3041cb04c1109dc43306674.jpg', 155, 0),
(53, '62eb65021f7415c1660829ea7c6366de.jpg', 155, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `imovel`
--

CREATE TABLE `imovel` (
  `IDIMOVEL` int(11) NOT NULL,
  `IMOVELTITULO` varchar(255) NOT NULL,
  `IMOVELNOME` varchar(255) NOT NULL,
  `IMOVELCATEGORIA` varchar(255) NOT NULL,
  `IMOVELVALOR` decimal(10,2) DEFAULT NULL,
  `IMOVELDESCRICAO` varchar(255) DEFAULT NULL,
  `IMOVELCOMODOS` varchar(255) DEFAULT NULL,
  `IMOVELSUITES` varchar(255) DEFAULT NULL,
  `IMOVELBANHEIROS` varchar(255) DEFAULT NULL,
  `IMOVELSALAS` varchar(255) DEFAULT NULL,
  `IMOVELCHURRASQUEIRA` varchar(255) DEFAULT NULL,
  `IMOVELGARAGEM` varchar(255) DEFAULT NULL,
  `IMOVELSERVICO` varchar(255) DEFAULT NULL,
  `IMOVELPISCINA` varchar(255) DEFAULT NULL,
  `NOVIDADES` varchar(255) DEFAULT NULL,
  `IMOVELRUA` varchar(255) DEFAULT NULL,
  `IMOVELBAIRRO` varchar(255) DEFAULT NULL,
  `IMOVELCIDADE` varchar(255) DEFAULT NULL,
  `STATUS` varchar(10) NOT NULL,
  `IMOVELCODIGO` varchar(15) NOT NULL,
  `IMOVELCEP` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `imovel`
--

INSERT INTO `imovel` (`IDIMOVEL`, `IMOVELTITULO`, `IMOVELNOME`, `IMOVELCATEGORIA`, `IMOVELVALOR`, `IMOVELDESCRICAO`, `IMOVELCOMODOS`, `IMOVELSUITES`, `IMOVELBANHEIROS`, `IMOVELSALAS`, `IMOVELCHURRASQUEIRA`, `IMOVELGARAGEM`, `IMOVELSERVICO`, `IMOVELPISCINA`, `NOVIDADES`, `IMOVELRUA`, `IMOVELBAIRRO`, `IMOVELCIDADE`, `STATUS`, `IMOVELCODIGO`, `IMOVELCEP`) VALUES
(155, 'imovel titulo teste 1', 'ec5573dbe4355526d3a5af648d96cf11.jpg', 'casa', '500.00', 'Descrição do imovel teste 1, 2 wc, 4 banheiros, piscina, campo de futebol. Sacadas de vista para campo de golfe.', '1', '1', '1', '1', '1', '0', '1', '0', 'Otima localização de perto ao supermercado.', NULL, NULL, NULL, 'TRUE', 'CA-2018.00', '13253582');

-- --------------------------------------------------------

--
-- Estrutura da tabela `mensagem`
--

CREATE TABLE `mensagem` (
  `IDMENSAGEM` int(11) NOT NULL,
  `NOME` varchar(255) NOT NULL,
  `TELEFONE` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `MENSAGEM` varchar(255) NOT NULL,
  `DATA` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `STATUS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `mensagem`
--

INSERT INTO `mensagem` (`IDMENSAGEM`, `NOME`, `TELEFONE`, `EMAIL`, `MENSAGEM`, `DATA`, `STATUS`) VALUES
(1, 'Fernando Humel', '4487-0349', 'fhumel@hotmail.com', 'Como está a mensagem?', '2010-07-23 14:15:31', 'pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `IDUSUARIO` int(11) NOT NULL,
  `NOME` varchar(20) NOT NULL,
  `USUARIO` varchar(200) NOT NULL,
  `SENHA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`IDUSUARIO`, `NOME`, `USUARIO`, `SENHA`) VALUES
(1, 'Fernando Humel', 'fernando', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`IDFOTO`),
  ADD KEY `FK_IMOVEL` (`IDIMOVEL`);

--
-- Índices para tabela `imovel`
--
ALTER TABLE `imovel`
  ADD PRIMARY KEY (`IDIMOVEL`);

--
-- Índices para tabela `mensagem`
--
ALTER TABLE `mensagem`
  ADD PRIMARY KEY (`IDMENSAGEM`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IDUSUARIO`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `foto`
--
ALTER TABLE `foto`
  MODIFY `IDFOTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de tabela `imovel`
--
ALTER TABLE `imovel`
  MODIFY `IDIMOVEL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de tabela `mensagem`
--
ALTER TABLE `mensagem`
  MODIFY `IDMENSAGEM` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IDUSUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `FK_IMOVEL` FOREIGN KEY (`IDIMOVEL`) REFERENCES `imovel` (`IDIMOVEL`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
