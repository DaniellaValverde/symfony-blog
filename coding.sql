-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jan 17, 2018 at 03:27 PM
-- Server version: 5.6.35
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `coding`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE DATABASE coding;

USE coding;

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `title`, `content`, `created`, `updated`) VALUES
(1, 6, '‘Game of Thrones’ receives nominations for visual effects, sound mixing', 'Nominations continue to roll in for Game of Thrones as the entertainment industry’s 2017-18 awards season ramps up, with the series garnering nominations for sound mixing and visual effects from the Cinema Audio Society (CAS) and the Visual Effects Society (VES).', '2018-01-17 14:55:07', NULL),
(2, 8, 'Maisie Williams Adds Tom Hanks to Kill List, Liam Cunningham Teases Season 1 Audition, And More', 'Game of Thrones season 8 might be barely visible on the (very distant) 2019 skyline, but the cast is making the rounds as animatedly as ever. In an interview with GQ, Liam Cunningham (Ser Davos Seaworth) teases a season 1 role for which he was originally considered, and amps up excitement for season 8. On the TV side of things, Maisie Williams (Arya Stark) recently appeared on Graham Norton, alongside national treasure Tom Hanks and world heavyweight champion Anthony Joshua, giving a typically hilarious interview. And lastly, ThreeZero is publishing an Arya Stark figurine for those collectors amongst us.', '2018-01-17 14:57:35', NULL),
(3, 7, 'No Game of Thrones Prequel Spinoff Until At Least 2020, Says HBO', 'The Television Critics Association press tour is always a juicy source of new information about the forthcoming season of Game of Thrones, and this year was no exception, with HBO programming president Casey Bloys repping the network yesterday and speaking about season 8 and the prequels to come.', '2018-01-17 14:58:48', NULL),
(4, 5, 'Liam Cunningham says the pressure is on to make Season 8 live up to expectations', 'Although it won’t be until 2019, we know that Game of Thrones is indeed coming to a close, and wrapping up the world’s most popular television series comes with its own set of challenges — not the least of which is bringing it to a satisfactory end for its fans around the globe. Liam Cunningham (Davos Seaworth) is just one of the actors feeling the pressure to live up to such high expectations, especially with only six episodes slated for Season 8.', '2018-01-17 14:59:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `salt` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roles` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '(DC2Type:array)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `salt`, `mail`, `roles`) VALUES
(5, 'admin', 'K0pDZhaBEJYHzSoS+zE4bCsXc624+DjbrFogGBiseAoaIHLCi52WGlXdAHF1hf7dxgqEQ0F/OVTfWxM8XtV5BA==', '1470', 'admin@admin.com', 'a:1:{i:0;s:10:\"ROLE_ADMIN\";}'),
(6, 'tata', 'iBBdcTRr2MiXx4R1Jg9qrWvqt0B6u1Qeis7mjJwT89Guhhona+RP/2f69+YL4OCUdWM969mfmSKPpQanzM6XJA==', '69', 'tata@tata.com', 'a:1:{i:0;s:12:\"ROLE_BLOGGER\";}'),
(7, 'titi', 'gQYbeJldPRmb1HxZmuGuIZzat4oTHYcf57BSVun4RTXFcBC1bEbSMgrzO0SOiJ5i+sdwfH7u2kayBroYuxQfTA==', '1368', 'titi@hotmail.com', 'a:1:{i:0;s:12:\"ROLE_BLOGGER\";}'),
(8, 'toto', 'LqpRkWYj8nUnjWuPzyEVxhV8f6wLpWA2mi2cfHv6CrkWvqWxvU6cmomojIwLzZgWmHdX1GN6ygyIfzwjnSTx1Q==', '196', 'toto@hotmail.com', 'a:1:{i:0;s:12:\"ROLE_BLOGGER\";}');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5A8A6C8DA76ED395` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `FK_5A8A6C8DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL;
