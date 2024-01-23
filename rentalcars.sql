-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 23, 2024 at 01:45 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentalcars`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klienci`
--

CREATE TABLE `klienci` (
  `ID_klienta` int(11) NOT NULL,
  `imie_klienta` varchar(255) DEFAULT NULL,
  `nazwisko_klienta` varchar(255) DEFAULT NULL,
  `PESEL` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klienci`
--

INSERT INTO `klienci` (`ID_klienta`, `imie_klienta`, `nazwisko_klienta`, `PESEL`) VALUES
(1, 'Robert', 'Synowiec', '88112726452'),
(2, 'Mikołaj', 'Folga', '88040814654'),
(3, 'Lucjan', 'Grygorowicz', '70081631958'),
(4, 'Marcel', 'Deska', '70031714711'),
(5, 'Wiktor', 'Zdziebłowski', '56123081158'),
(6, 'Eryk', 'Prusik', '71010124596'),
(7, 'Józef', 'Śledziewski', '55080137575'),
(8, 'Kacper', 'Kornatowski', '04212386752'),
(9, 'Ludwik', 'Łojewski', '67102228552'),
(10, 'Tomasz', 'Moskalik', '65013041697'),
(11, 'Julita', 'Materek', '83073073346'),
(12, 'Halina', 'Węgrzyniak', '84072295445'),
(13, 'Klaudia', 'Grabowiecka', '59100521782'),
(14, 'Apolonia', 'Grobelna', '71120586642'),
(15, 'Kaja', 'Blacha', '60030514382'),
(16, 'Żaneta', 'Gałecka', '99011096663'),
(17, 'Genowefa', 'Szczerba', '03291856187'),
(18, 'Sara', 'Skrzecz', '86080611749'),
(19, 'Karina', 'Paluszek', '85102887661'),
(20, 'Bogusława', 'Zajdel', '67112637942');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `samochody`
--

CREATE TABLE `samochody` (
  `ID_samochody` int(11) NOT NULL,
  `marka` varchar(255) DEFAULT NULL,
  `kolor` varchar(255) DEFAULT NULL,
  `numer_rejestracyjny` varchar(20) DEFAULT NULL,
  `rok_produkcji` int(11) DEFAULT NULL,
  `cena_wynajmu_dzien` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `samochody`
--

INSERT INTO `samochody` (`ID_samochody`, `marka`, `kolor`, `numer_rejestracyjny`, `rok_produkcji`, `cena_wynajmu_dzien`) VALUES
(1, 'Mazda', 'Niebieski', 'NEB6397', 2014, 50.00),
(2, 'Mercedes', 'Biały', 'PMI9560', 2010, 100.00),
(3, 'Dacia', 'Zielony', 'CTU4035', 2018, 100.00),
(4, 'Renault', 'Żółty', 'OGL2088', 2020, 50.00),
(5, 'Hyundai', 'Biały', 'WPN2606', 2019, 100.00),
(6, 'Jeep', 'Czarny', 'WOT3701', 2014, 50.00),
(7, 'Porsche', 'Szary', 'DZG7085', 2018, 50.00),
(8, 'Skoda', 'Biały', 'NO57948', 2018, 50.00),
(9, 'Volkswagen', 'Złoty', 'BBI8834', 2020, 100.00),
(10, 'Toyota', 'Niebieski', 'ZST4084', 2018, 150.00);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stanowiska`
--

CREATE TABLE `stanowiska` (
  `ID_stanowiska` int(11) NOT NULL,
  `nazwa_stanowiska` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stanowiska`
--

INSERT INTO `stanowiska` (`ID_stanowiska`, `nazwa_stanowiska`) VALUES
(2, 'Administrator'),
(1, 'Kierownik'),
(3, 'Pracownik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `ID_uzytkownika` int(11) NOT NULL,
  `imie_uzytkownika` varchar(255) DEFAULT NULL,
  `nazwisko_uzytkownika` varchar(255) DEFAULT NULL,
  `login_NEP` varchar(20) DEFAULT NULL,
  `haslo` varchar(255) DEFAULT NULL,
  `stanowisko_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_uzytkownika`, `imie_uzytkownika`, `nazwisko_uzytkownika`, `login_NEP`, `haslo`, `stanowisko_ID`) VALUES
(0, 'Łukasz', 'Żebrowski', 'admin', '$2y$10$dySayDOQIFV91Z9.As0GLey15Q5MixVh14zSPu49m69vYuwDyV2cm', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wypozyczenia`
--

CREATE TABLE `wypozyczenia` (
  `ID_wypozyczenia` int(11) NOT NULL,
  `Klienci_ID` int(11) DEFAULT NULL,
  `Samochody_ID` int(11) DEFAULT NULL,
  `Data_wypozyczenia` date DEFAULT NULL,
  `Planowany_zwrot` date DEFAULT NULL,
  `Opozniony_zwrot` tinyint(1) DEFAULT NULL,
  `Notatki` text DEFAULT NULL,
  `Pracownik_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klienci`
--
ALTER TABLE `klienci`
  ADD PRIMARY KEY (`ID_klienta`),
  ADD UNIQUE KEY `PESEL` (`PESEL`);

--
-- Indeksy dla tabeli `samochody`
--
ALTER TABLE `samochody`
  ADD PRIMARY KEY (`ID_samochody`),
  ADD UNIQUE KEY `Numer_rejestracyjny` (`numer_rejestracyjny`);

--
-- Indeksy dla tabeli `stanowiska`
--
ALTER TABLE `stanowiska`
  ADD PRIMARY KEY (`ID_stanowiska`),
  ADD UNIQUE KEY `nazwa_stanowiska` (`nazwa_stanowiska`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID_uzytkownika`),
  ADD UNIQUE KEY `Nazwa_uzytkownika_NEP` (`login_NEP`),
  ADD UNIQUE KEY `unique_haslo` (`haslo`),
  ADD KEY `Stanowisko_ID` (`stanowisko_ID`);

--
-- Indeksy dla tabeli `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD PRIMARY KEY (`ID_wypozyczenia`),
  ADD KEY `Klienci_ID` (`Klienci_ID`),
  ADD KEY `Samochody_ID` (`Samochody_ID`),
  ADD KEY `Pracownik_ID` (`Pracownik_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`stanowisko_ID`) REFERENCES `stanowiska` (`ID_stanowiska`);

--
-- Constraints for table `wypozyczenia`
--
ALTER TABLE `wypozyczenia`
  ADD CONSTRAINT `wypozyczenia_ibfk_1` FOREIGN KEY (`Klienci_ID`) REFERENCES `klienci` (`ID_klienta`),
  ADD CONSTRAINT `wypozyczenia_ibfk_2` FOREIGN KEY (`Samochody_ID`) REFERENCES `samochody` (`ID_samochody`),
  ADD CONSTRAINT `wypozyczenia_ibfk_3` FOREIGN KEY (`Pracownik_ID`) REFERENCES `users` (`ID_uzytkownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
