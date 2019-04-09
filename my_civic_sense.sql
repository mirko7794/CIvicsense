-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 09, 2019 alle 14:12
-- Versione del server: 10.1.38-MariaDB
-- Versione PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_civic_sense`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `gruppo di risoluzione`
--

CREATE TABLE `gruppo di risoluzione` (
  `ID Gruppo` int(11) NOT NULL,
  `Citta` varchar(21) NOT NULL,
  `CAP` int(11) NOT NULL,
  `CodicediTracciamento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `gruppo di risoluzione`
--

INSERT INTO `gruppo di risoluzione` (`ID Gruppo`, `Citta`, `CAP`, `CodicediTracciamento`) VALUES
(2, 'Milano', 70121, 8),
(5, 'Bisceglie', 75145, 12),
(6, 'Bari', 76124, 12),
(8, 'Taranto', 78432, 0),
(9, 'Firenze', 87432, 0),
(10, 'Barletta', 5678, 0),
(11, 'knveknv', 76543, 86);

-- --------------------------------------------------------

--
-- Struttura della tabella `registrazione_cittadino`
--

CREATE TABLE `registrazione_cittadino` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `citta` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `registrazione_cittadino`
--

INSERT INTO `registrazione_cittadino` (`id`, `username`, `password`, `email`, `nome`, `cognome`, `citta`) VALUES
(1, 'pippo', '1234567', '', 'pippo', 'croce', 'rutigliano'),
(1, 'valerio', '12345678', '', 'piero', 'molo', 'mola di bari'),
(1, 'valerio', '12345678', '', 'piero', 'molo', 'mola di bari'),
(2, 'root', '', '', '', '', ''),
(3, 'ciccio', '1234567', '', 'andrea', 'billo', 'bari'),
(4, 'dino', 'fino@libero', '', 'tino', 'tano', 'domodorsola'),
(5, 'dino', 'fino@libero', '', 'tino', 'tano', 'domodorsola'),
(6, '', '', '', '', '', ''),
(7, '', '', '', '', '', ''),
(8, '', '', '', '', '', ''),
(9, 'root', '', '', '', '', ''),
(10, '', '', '', '', '', ''),
(11, '', '', '', '', '', ''),
(12, '', '', '', '', '', ''),
(13, '', '', '', '', '', ''),
(14, '', '', '', '', '', ''),
(15, 'luca', 'zxcvbnm', '', 'vito', 'cappucci', 'roma'),
(16, 'florio', '1234567', '', 'andrea', 'dibattista', 'roma'),
(17, 'pippo78', '1234567', '', '', '', 'roma'),
(18, 'pippo78', '1234567', '', '', '', 'roma'),
(19, 'ciccio', '1234567', '', '', '', 'bari'),
(20, 'francesco79', '1234567', '', '', '', 'rutigliano'),
(21, 'Walter', '123456', 'walter94-6@live.com', 'Walter', 'Dipace', 'Barletta'),
(22, 'Walter', '123456', 'walter94-6@live.com', 'Walter', 'Dipace', 'Barletta'),
(23, 'ciccio', '1234567', 'wdwd', 'ciccio', 'cic', 'Bari'),
(24, 'Walter', '1234567', 'fghjk', 'ghjk', 'ghjk', 'rtyuio'),
(25, 'Willy', '1234567', 'walter94-6@live.com', 'Domenico', 'Dicuonzo', 'Barletta'),
(26, 'Gigio', '1234567', 'kjhgfd', 'hjk', 'j', 'bnm'),
(27, 'Walter', '1234567', 'bnm', 'bnjkl', 'bnjk', 'njmk'),
(28, 'Walter', '1234567', 'asdfghjkl', 'sdfghj', 'fgh', 'dfgh'),
(29, 'Walter', '1234567', 'fghjk', 'fghjk', 'dfghjk', 'ghj'),
(30, 'stra', '1234567', 'ghjk', 'gvuijb', 'fghjk', 'dfgh'),
(31, 'stra', '123456', 'walter94-6@live.com', 'fghjk', 'fgbhm', 'fgnjm'),
(32, 'ert', '123456', 'fghjk', 'fghjk', 'ghj', 'fghj'),
(33, 'ert', 'fghj', 'fghj', 'fghj', 'frtgyhj', 'dertyh'),
(34, 'Walter128', '123456', 'mimi.94m@gmail.com', 'xxx', 'xxx', 'xxxx'),
(35, 'Walter128', '12345678', 'mimi.94m@gmail.com', 'zazaza', 'zzazaza', 'zazazaza'),
(36, 'wiko', '123456', 'wiko@gmail.com', 'wiko', 'dwidbw', 'dwjn'),
(37, 'Wikio', '1234567', 'wikio@gmail.com', 'jkb', 'jbjobob', 'bob'),
(38, 'Luigi', '123456', 'walter94-6@live.com', 'Luigi', 'wcvg', 'rgthy');

-- --------------------------------------------------------

--
-- Struttura della tabella `registrazione_ente`
--

CREATE TABLE `registrazione_ente` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `citta` varchar(50) NOT NULL,
  `cognome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `registrazione_ente`
--

INSERT INTO `registrazione_ente` (`id`, `username`, `password`, `email`, `nome`, `citta`, `cognome`) VALUES
(1, 'virus', 'prova', 'prova@libero.it', 'stradale', 'bari', NULL),
(3, 'prova_ciccio', 'ciccio', 'proca@libero.it', 'aquedotto_pugliese', 'bisceglie', NULL),
(4, 'prova', '1234567', 'stradale@libero.it', 'autostrade', 'barletta', NULL),
(5, 'Walter', '123456', 'wal', 'Walter', 'Foggia', NULL),
(6, 'Walterino', '34567', 'vbnm', 'vbn', 'vbn', NULL),
(7, 'Walteruccio', '2345678', '', '', '', NULL),
(8, 'Ciro', '12345', 'walter94-6@live.com', 'cvebrny', 'ertnryt', NULL),
(9, '', '', '', '', '', NULL),
(10, 'Franco', '123457', 'dipacewalter@gmail.com', 'Franco', 'Barletta', 'Dipace');

-- --------------------------------------------------------

--
-- Struttura della tabella `ticket`
--

CREATE TABLE `ticket` (
  `CodicediTracciamento` int(11) NOT NULL,
  `latitudine` double DEFAULT NULL,
  `longitudine` double DEFAULT NULL,
  `descrizione` varchar(50) NOT NULL,
  `video` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `categoriabox` varchar(20) NOT NULL,
  `gravitabox` varchar(10) NOT NULL,
  `Stato` enum('Attiva','Conclusa') DEFAULT 'Attiva',
  `Username` varchar(21) NOT NULL,
  `Data` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ticket`
--

INSERT INTO `ticket` (`CodicediTracciamento`, `latitudine`, `longitudine`, `descrizione`, `video`, `foto`, `categoriabox`, `gravitabox`, `Stato`, `Username`, `Data`) VALUES
(8, 0, 0, 'tombino', '', 'tombino.png', 'autostrade', 'Bassa', 'Attiva', '', NULL),
(9, 0, 0, '', '', '', '', 'Bassa', 'Conclusa', '', NULL),
(11, 41, 16, 'rottura telefono', '', 'bg-cta.jpg', 'enel', 'Alta', 'Conclusa', '', NULL),
(13, 0, 0, '', '', '', '', '', 'Conclusa', '', NULL),
(83, 0, 0, 'xscdfghj', '', '', 'autostrade', 'Bassa', 'Conclusa', '', NULL),
(85, 0, 0, 'xdfghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(86, 0, 0, 'dfghjkdfg', '', '', 'autostrade', 'Intermedia', 'Attiva', '', NULL),
(88, 0, 0, 'dfghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(89, 0, 0, 'fcvbnm', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(91, 0, 0, 'dfghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(93, 0, 0, 'dfghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(94, 0, 0, 'sdfghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(95, 0, 0, 'dfghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(96, 0, 0, 'fghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(97, 0, 0, 'fghjkl', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(98, 0, 0, 'fghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(99, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(100, 0, 0, 'fghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(101, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(102, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(103, 0, 0, 'ghjk,', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(104, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(105, 0, 0, 'fghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(106, 0, 0, 'fghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(107, 0, 0, 'ertyj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(108, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(109, 0, 0, 'dfghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(110, 0, 0, 'dfghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(111, 0, 0, 'hjkl', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(112, 0, 0, 'fkfmek', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(113, 0, 0, 'fkfmdd,', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(114, 0, 0, 'asdfg', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(115, 0, 0, 'hjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(116, 0, 0, 'dfg', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(117, 0, 0, 'sdfg', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(118, 0, 0, 'sdf', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(119, 0, 0, 'sdfg', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(121, 0, 0, 'fghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(122, 0, 0, 'ghjnmk', '', '', 'autostrade', 'Intermedia', 'Attiva', '', NULL),
(124, 0, 0, 'gfhj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(125, 0, 0, 'fghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(126, 0, 0, 'vgbnm', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(127, 0, 0, 'dfghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(128, 0, 0, 'hjkl', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(129, 0, 0, 'vbnm', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(131, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(132, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(133, 0, 0, 'gvhjmk,', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(134, 0, 0, 'bvnm,', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(135, 0, 0, 'vgbhnjm,', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(136, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(137, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(138, 0, 0, 'dfghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(139, 0, 0, 'dfghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(140, 0, 0, 'dfghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(141, 0, 0, 'dfghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(142, 0, 0, 'fghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(143, 0, 0, 'gbhnm,', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(144, 0, 0, 'ghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(145, 0, 0, 'dfghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(146, 0, 0, 'dfghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(147, 0, 0, 'cfvgbhnjm', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(148, 0, 0, 'dfghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(149, 0, 0, 'dfghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(150, 0, 0, 'sdfgh', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(151, 0, 0, 'ertyui', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(152, 0, 0, 'dfghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(153, 0, 0, 'dfghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(154, 0, 0, 'xcvbnm', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(155, 0, 0, 'ifjfjdno', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(156, 0, 0, 'mjnhb', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(157, 0, 0, 'dfghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(158, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(159, 0, 0, 'dfghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(160, 0, 0, 'rdtfyguhi', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(161, 0, 0, 'gvhbjnkml', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(162, 0, 0, 'dxfcgvhbj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(163, 0, 0, 'sdfgh', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(164, 0, 0, '', '', '', '', '', 'Attiva', '', NULL),
(165, 0, 0, '', '', '', '', '', 'Attiva', '', NULL),
(166, 0, 0, '', '', '', '', '', 'Attiva', '', NULL),
(167, 0, 0, 'ghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(168, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(169, 0, 0, 'fghjk', '', 'img/cancellain.png', 'autostrade', 'Bassa', 'Attiva', 'Walter', NULL),
(170, 0, 0, 'd. Ã²fsÃ²', '', 'cancellain.png', 'autostrade', 'Bassa', 'Attiva', 'Walter', NULL),
(171, 0, 0, 'dfghj', '', 'cancellain.png', 'autostrade', 'Intermedia', 'Attiva', 'Walter', NULL),
(172, 0, 0, 'foebmetp', '', '', 'autostrade', 'Alta', 'Attiva', 'Francesco', NULL),
(173, 0, 0, 'sdvfbg', '', '', 'autostrade', 'Alta', 'Attiva', 'Francesco', NULL),
(174, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(175, 0, 0, 'sdfg', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(176, 0, 0, 'sdfgh', '', 'Array', 'autostrade', 'Alta', 'Attiva', '', NULL),
(177, 0, 0, 'dfg', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(178, 0, 0, 'dfg', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(179, 0, 0, 'rtygj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(180, 0, 0, 'xcvb', '', 'cancellain.png', 'autostrade', 'Alta', 'Attiva', '', NULL),
(181, 0, 0, 'sdf', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(182, 0, 0, 'fdgfb', '', 'Array', 'autostrade', 'Alta', 'Attiva', '', NULL),
(183, 0, 0, 'dfg', '', '1-Set-In-Acciaio-Inox-Pinzette-10-in-1-Unghie-artistiche-Tagliatore-di-Forbici-Pinzette-Coltello.jpg', 'autostrade', 'Alta', 'Attiva', '', NULL),
(184, 0, 0, 'erdty', '', 'cancellain.png', 'autostrade', 'Alta', 'Attiva', '', NULL),
(185, 0, 0, 'fghjk', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(186, 0, 0, 'fghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(187, 0, 0, 'fghj', '', '', 'autostrade', 'Alta', 'Attiva', '', NULL),
(188, 0, 0, 'rxctvyb', 'img/', 'img/', 'autostrade', 'Alta', 'Attiva', '', NULL),
(189, 0, 0, 'gvhbjn', 'img/', 'img/', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(190, 0, 0, 'ciao', 'img/', 'img/', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(191, 0, 0, 'dencwce', 'img/', 'img/', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(193, 0, 0, 'fgh j', 'img/', 'img/', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(194, 0, 0, 'cavalcavia rotto', 'img/', 'img/', 'ElettricitÃ ', 'Alta', 'Attiva', 'Walter', NULL),
(195, 0, 0, 'ceknc', 'img/', 'img/', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(196, 0, 0, 'wcevrb', 'img/', 'img/cancellain.png', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(197, 0, 0, 'wcevrb', 'img/', 'img/cancellain.png', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(198, 0, 0, 'rvtrvt', '', 'cancellain.png', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(199, 0, 0, 'erty', '', 'cancellain.png', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(200, 0, 0, 'ergthy', '', 'img/cancellain.png', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(201, 0, 0, 'sxcd', '', 'img/cancellain.png', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(202, 0, 0, 'rtvybuni', '', 'img/cancellain.png', 'autostrade', 'Alta', 'Attiva', 'Walter', NULL),
(203, 0, 0, 'cevbg', '', '', 'autostrade', 'Alta', 'Attiva', 'Domenico', NULL),
(204, 0, 0, 'ervtby', '', '', 'autostrade', 'Alta', 'Attiva', 'Walter', '2019-04-05'),
(205, 0, 0, 'xecr', '', '', 'autostrade', 'Alta', 'Attiva', '', '2019-03-12'),
(206, 0, 0, 'xecrv', '', '', 'acquedotto', 'Bassa', 'Attiva', '', '2018-09-10'),
(207, 0, 0, 'sdcvrt', '', '', 'enel', 'Intermedia', 'Attiva', '', '2019-01-16'),
(208, 0, 0, 'wecrvt', '', '', 'telefono', 'Alta', 'Attiva', '', '2019-02-14'),
(209, 0, 0, 'cgvhbjn', '', '', 'enel', 'Alta', 'Attiva', '', '2019-04-02'),
(210, 0, 0, 'cerv', '', '', 'enel', 'Alta', 'Attiva', '', '2019-04-01'),
(211, 0, 0, 'sdcvf', '', '', 'enelin', 'Alta', 'Attiva', '', '2019-04-04'),
(212, 0, 0, 'tcyubni', '', '', 'Autostrade', 'Alta', 'Attiva', '', '2019-04-01'),
(213, 0, 0, 'dfv', '', '', 'Autostrade', 'Alta', 'Attiva', '', '2019-03-12'),
(214, 0, 0, 'sdcfv', '', '', 'Acquedotto', 'Alta', 'Attiva', '', '2019-04-03'),
(215, 0, 0, 'rvtb', '', '', 'Acquedotto', 'Alta', 'Attiva', '', '2019-04-01'),
(216, 0, 0, 'wdefrt', '', '', 'Acquedotto', 'Alta', 'Attiva', '', '2019-02-06'),
(217, 0, 0, 'defrg', '', '', 'ElettricitÃ ', 'Alta', 'Attiva', '', '2018-12-11'),
(218, 0, 0, 'ecrvt', '', '', 'Telefonia', 'Alta', 'Attiva', '', '2018-11-13'),
(219, 0, 0, 'erty', '', '', 'Elettricita', 'Alta', 'Attiva', '', '2019-03-21'),
(221, 41.3065722, 16.2715893, 'aula in fiamme', '', '', 'Elettricita', 'Alta', 'Attiva', 'Luigi', '2019-04-07'),
(222, 41.306925899999996, 16.271920899999998, 'ciao Walter', '', '', 'Telefonia', 'Alta', 'Attiva', 'Walter', '2019-04-07');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `gruppo di risoluzione`
--
ALTER TABLE `gruppo di risoluzione`
  ADD PRIMARY KEY (`ID Gruppo`);

--
-- Indici per le tabelle `registrazione_cittadino`
--
ALTER TABLE `registrazione_cittadino`
  ADD KEY `id` (`id`);

--
-- Indici per le tabelle `registrazione_ente`
--
ALTER TABLE `registrazione_ente`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`CodicediTracciamento`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `gruppo di risoluzione`
--
ALTER TABLE `gruppo di risoluzione`
  MODIFY `ID Gruppo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT per la tabella `registrazione_cittadino`
--
ALTER TABLE `registrazione_cittadino`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT per la tabella `registrazione_ente`
--
ALTER TABLE `registrazione_ente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la tabella `ticket`
--
ALTER TABLE `ticket`
  MODIFY `CodicediTracciamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=223;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
