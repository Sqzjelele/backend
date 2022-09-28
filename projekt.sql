-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 21 Lut 2019, 19:29
-- Wersja serwera: 10.1.35-MariaDB
-- Wersja PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `email` text NOT NULL,
  `marka` text NOT NULL,
  `model` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinie`
--

CREATE TABLE `opinie` (
  `id` int(11) NOT NULL,
  `imie` varchar(30) NOT NULL,
  `nazwisko` varchar(30) NOT NULL,
  `opinia` longtext CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `opinie`
--

INSERT INTO `opinie` (`id`, `imie`, `nazwisko`, `opinia`) VALUES
(1, 'Adam', 'K.', 'Bardzo milo polecam. Oddalem S8+ , telefon wrocil w dwa tygodnie . Oddany byl do serwisu Samsung Polska . Na koniec cala rozpiska co bylo naprawiane i wymieniane . Ja akurat dostalem NOWY TEL :) , po wymianie plyty . Super kontakt oraz podejscie do klienta . Polecam !!!!!.'),
(2, 'Edward', 'B.', 'Zarowno zakup (niemal dwa lata temu) jak i naprawa gwarancyjna przebiegly sprawnie i pomyslnie. Polecam'),
(3, 'Marian', 'P.', 'Szybka diagnoza, bardzo szybka naprawa i przystepne ceny a do tego mile podejscie do Klienta. W razie problemow ze sprzetem gsm na pewno polecam to miejsce. Pozdrawiam'),
(4, 'Ferdynand ', 'K.', 'Bardzo mila obsluga klienta.Znakomity kontakt.Naprawa zrealizowana w wyznaczonym terminie.Polecam.'),
(5, 'Przemyslaw', 'K.', 'Rewelacja! Dobra cena uslugi, sprawny, mily serwis ze stala informacja na kazdym poziomie realizacji uslugi. Szybko, sprawnie, dobrze. Polecam!');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `nazwa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`nazwa`) VALUES
('Huawei Mate 10 lite'),
('Huawei P20'),
('Xiaomi Redmi Note 5'),
('Xiaomi Mi A2'),
('Samsung Galaxy S8'),
('Samsung Galaxy S9+'),
('Xiaomi Mi Mix 3'),
('Xiaomi Mi 8'),
('Xiaomi Redmi Note 6 PRO'),
('Xiaomi MI A2 Lite'),
('Xiaomi Redmi 6'),
('Xiaomi Redmi 6A'),
('Huawei P20 Lite'),
('Huawei P Smart 2019'),
('Huawei Y5 2018'),
('Huawei Y7 Prime 2018'),
('Samsung Galaxy A7 2018'),
('Samsung Galaxy J6 Plus '),
('Samsung Galaxy A6 Plus 2018'),
('Samsung Galaxy S10+ ');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `opinie`
--
ALTER TABLE `opinie`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `opinie`
--
ALTER TABLE `opinie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
