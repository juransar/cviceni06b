-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Úte 16. kvě 2017, 23:11
-- Verze serveru: 10.1.21-MariaDB
-- Verze PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `juransar`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `artist`
--

CREATE TABLE `artist` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `chord`
--

CREATE TABLE `chord` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notation` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `one_line`
--

CREATE TABLE `one_line` (
  `id` int(11) NOT NULL,
  `song_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `one_part`
--

CREATE TABLE `one_part` (
  `id` int(11) NOT NULL,
  `line_id` int(11) DEFAULT NULL,
  `chord_id` int(11) DEFAULT NULL,
  `lyric` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `song`
--

CREATE TABLE `song` (
  `id` int(11) NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktura tabulky `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `artist`
--
ALTER TABLE `artist`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `chord`
--
ALTER TABLE `chord`
  ADD PRIMARY KEY (`id`);

--
-- Klíče pro tabulku `one_line`
--
ALTER TABLE `one_line`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_A54AF7DFA0BDB2F3` (`song_id`);

--
-- Klíče pro tabulku `one_part`
--
ALTER TABLE `one_part`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3D5133EFD4EB08E5` (`chord_id`),
  ADD KEY `IDX_3D5133EF4D7B7542` (`line_id`);

--
-- Klíče pro tabulku `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_33EDEEA1B7970CF8` (`artist_id`);

--
-- Klíče pro tabulku `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D64935C246D5` (`password`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `artist`
--
ALTER TABLE `artist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `chord`
--
ALTER TABLE `chord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `one_line`
--
ALTER TABLE `one_line`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `one_part`
--
ALTER TABLE `one_part`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pro tabulku `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Omezení pro exportované tabulky
--

--
-- Omezení pro tabulku `one_line`
--
ALTER TABLE `one_line`
  ADD CONSTRAINT `FK_A54AF7DFA0BDB2F3` FOREIGN KEY (`song_id`) REFERENCES `song` (`id`);

--
-- Omezení pro tabulku `one_part`
--
ALTER TABLE `one_part`
  ADD CONSTRAINT `FK_3D5133EF4D7B7542` FOREIGN KEY (`line_id`) REFERENCES `one_line` (`id`),
  ADD CONSTRAINT `FK_3D5133EFD4EB08E5` FOREIGN KEY (`chord_id`) REFERENCES `chord` (`id`);

--
-- Omezení pro tabulku `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `FK_33EDEEA1B7970CF8` FOREIGN KEY (`artist_id`) REFERENCES `artist` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
