-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 23 Oca 2023, 13:58:53
-- Sunucu sürümü: 10.4.27-MariaDB
-- PHP Sürümü: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `ileri`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenci`
--

CREATE TABLE `ogrenci` (
  `id` int(11) NOT NULL,
  `ogrenci_no` bigint(11) NOT NULL,
  `ogrenci_adsoyad` varchar(255) NOT NULL,
  `eklenme_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `ogrenci`
--

INSERT INTO `ogrenci` (`id`, `ogrenci_no`, `ogrenci_adsoyad`, `eklenme_tarih`) VALUES
(630, 1160505011, ' MERT KABAKÇI', '2023-01-22 22:24:39'),
(631, 1160505042, ' İBRAHİM KELEŞ', '2023-01-22 22:24:39'),
(632, 1170505002, ' HAVVA NERGİZ', '2023-01-22 22:24:39'),
(633, 1170505018, ' YASİN ÖZMEN', '2023-01-22 22:24:39'),
(634, 1170505052, ' OĞUZHAN UĞUR', '2023-01-22 22:24:39'),
(635, 1170505054, ' BATUHAN BERK KARADERE', '2023-01-22 22:24:39'),
(636, 1170505603, ' MUHAMMAD GAJENDRA ADHIRAJASA', '2023-01-22 22:24:39'),
(637, 1180505002, ' BERAT BİRGİN', '2023-01-22 22:24:39'),
(638, 1180505020, ' ECE DALPOLAT', '2023-01-22 22:24:39'),
(639, 1180505022, ' MUSTAFA VEYSEL KANDIRA', '2023-01-22 22:24:39'),
(640, 1180505025, ' MUSTAFA BİLAL VAROL', '2023-01-22 22:24:39'),
(641, 1180505037, ' CİHAN CİHAT GÜNHAN', '2023-01-22 22:24:39'),
(642, 1180505038, ' UMUT BERKAY KARACA', '2023-01-22 22:24:39'),
(643, 1180505045, ' EGE POLAT', '2023-01-22 22:24:39'),
(644, 1180505048, ' ZEYNEP AVKAROĞLU', '2023-01-22 22:24:39'),
(645, 1180505620, ' KÜBRA SELÇUK', '2023-01-22 22:24:39'),
(646, 1180505624, ' FANNISA  FIRDAUS', '2023-01-22 22:24:39'),
(647, 1180505801, ' İBRAHİM BURAK YAKAR', '2023-01-22 22:24:39'),
(648, 1180505803, ' FURKAN ASLAN', '2023-01-22 22:24:39'),
(649, 1180505902, ' İBRAHİM İNAL', '2023-01-22 22:24:39'),
(650, 1180505903, ' EDANUR HAMURCU', '2023-01-22 22:24:39'),
(651, 1190505001, ' ECENUR ÖZKAN', '2023-01-22 22:24:39'),
(652, 1190505003, ' BEYZANUR ÇETİN', '2023-01-22 22:24:39'),
(653, 1190505004, ' ORHAN AKARSU', '2023-01-22 22:24:39'),
(654, 1190505005, ' HATİCE ZEHRA ORHAN', '2023-01-22 22:24:39'),
(655, 1190505006, ' ERVA NUR SULTAN YALÇIN', '2023-01-22 22:24:39'),
(656, 1190505007, ' ERAY ALTUN', '2023-01-22 22:24:39'),
(657, 1190505008, ' TİMUR DÜŞÜNÜKLÜ', '2023-01-22 22:24:39'),
(658, 1190505010, ' HATİCE TEKİN', '2023-01-22 22:24:39'),
(659, 1190505011, ' FURKAN EMİRCAN DURSUN', '2023-01-22 22:24:39'),
(660, 1190505012, ' AHMET ŞİŞMAN', '2023-01-22 22:24:39'),
(661, 1190505014, ' ALAETTİN USLU', '2023-01-22 22:24:39'),
(662, 1190505015, ' RAHİM TÜRKMEN', '2023-01-22 22:24:39'),
(663, 1190505016, ' EMİR GAZİ KOPAR', '2023-01-22 22:24:39'),
(664, 1190505018, ' BERKE KARAALİ', '2023-01-22 22:24:39'),
(665, 1190505019, ' MELİKE SAĞIR', '2023-01-22 22:24:39'),
(666, 1190505021, ' METİN BİRİKİM KARAÇAY', '2023-01-22 22:24:39'),
(667, 1190505022, ' UMUT ÇAKMAK', '2023-01-22 22:24:39'),
(668, 1190505023, ' FURKAN KABAK', '2023-01-22 22:24:39'),
(669, 1190505024, ' EMİRCAN AKIN', '2023-01-22 22:24:39'),
(670, 1190505025, ' ÇAĞLA ÖZAY', '2023-01-22 22:24:39'),
(671, 1190505026, ' TUANNA BURÇAK YAVUZ', '2023-01-22 22:24:39'),
(672, 1190505027, ' MUSTAFA UÇAR', '2023-01-22 22:24:39'),
(673, 1190505028, ' ENSAR YASİN KARAKÖSE', '2023-01-22 22:24:39'),
(674, 1190505029, ' MUSA GÜNEY', '2023-01-22 22:24:39'),
(675, 1190505030, ' MUHAMMED CEYLAN', '2023-01-22 22:24:39'),
(676, 1190505031, ' BARIŞ ÇINAR', '2023-01-22 22:24:39'),
(677, 1190505032, ' HAYDAR ALÇİN', '2023-01-22 22:24:39'),
(678, 1190505033, ' ÖMER FARUK ERCİVAN', '2023-01-22 22:24:39'),
(679, 1190505035, ' ÜMMÜGÜLSÜM ALTINTAŞ', '2023-01-22 22:24:39'),
(680, 1190505036, ' KADİR ŞAHİN', '2023-01-22 22:24:39'),
(681, 1190505037, ' AHMET TURAN KARAKUŞ', '2023-01-22 22:24:39'),
(682, 1190505038, ' SERGEN AYTUĞ CAN', '2023-01-22 22:24:39'),
(683, 1190505040, ' HATTAP EMRE TANIŞ', '2023-01-22 22:24:39'),
(684, 1190505041, ' ÖMER FARUK TAŞ', '2023-01-22 22:24:39'),
(685, 1190505044, ' TAYYAR BERK ÇOBANOĞLU', '2023-01-22 22:24:39'),
(686, 1190505045, ' FURKAN HALİL ER', '2023-01-22 22:24:39'),
(687, 1190505046, ' MUSTAFA AKSAK', '2023-01-22 22:24:39'),
(688, 1190505048, ' AHMETCAN ÇETİN', '2023-01-22 22:24:39'),
(689, 1190505049, ' BAŞAK ŞİMŞEK', '2023-01-22 22:24:39'),
(690, 1190505050, ' MERT EROĞLU', '2023-01-22 22:24:39'),
(691, 1190505051, ' AHMET ENES YILDIRIM', '2023-01-22 22:24:39'),
(692, 1190505052, ' BATUHAN KÜÇÜKARSLAN', '2023-01-22 22:24:39'),
(693, 1190505054, ' DEVRİM FURKAN GÜNER', '2023-01-22 22:24:39'),
(694, 1190505055, ' BERK TAHA DEMİR', '2023-01-22 22:24:39'),
(695, 1190505056, ' ENES AY', '2023-01-22 22:24:39'),
(696, 1190505058, ' İBRAHİM SERHAT DEMİRCİOĞLU', '2023-01-22 22:24:39'),
(697, 1190505060, ' AMİNE HATUN ERGİN', '2023-01-22 22:24:39'),
(698, 1190505061, ' ALİ KAAN YAYLA', '2023-01-22 22:24:39'),
(699, 1190505062, ' ALİCAN BEKMEZ', '2023-01-22 22:24:39'),
(700, 1190505066, ' SİNAN TANRIKUT', '2023-01-22 22:24:39'),
(701, 1190505068, ' DOĞA NUR KARTAL', '2023-01-22 22:24:39'),
(702, 1190505069, ' ZEHRA AKGÜL', '2023-01-22 22:24:39'),
(703, 1190505070, ' İSMAİL KOÇ', '2023-01-22 22:24:39'),
(704, 1190505071, ' MUHAMMET ÜNVEREN', '2023-01-22 22:24:39'),
(705, 1190505072, ' SİMGE TERZİOĞLU', '2023-01-22 22:24:39'),
(706, 1190505624, ' DUYGU BAHAR', '2023-01-22 22:24:39'),
(707, 1190505804, ' BARIŞ ÜSTÜN', '2023-01-22 22:24:39'),
(708, 1190505902, ' MERT AVCI', '2023-01-22 22:24:39'),
(709, 1190505903, ' EMRAH ÇELİK', '2023-01-22 22:24:39'),
(710, 1200505001, ' ÖMER FARUK CENİK', '2023-01-22 22:24:39'),
(711, 1200505901, ' ABDUSSAMET MUHAMMED TOPAL', '2023-01-22 22:24:39'),
(712, 1200505904, ' YUNUS EMRE SARIDOĞAN', '2023-01-22 22:24:39'),
(713, 5190505044, ' AYLİN IŞIK', '2023-01-22 22:24:39'),
(714, 5190505046, ' ECE GÜNEŞ', '2023-01-22 22:24:39'),
(715, 5190505047, ' CANER KENANOĞLU', '2023-01-22 22:24:39'),
(716, 5190505050, ' SERHAT YILDIZ', '2023-01-22 22:24:39'),
(717, 5190505086, ' TİMUR ÖZTÜRK', '2023-01-22 22:24:39');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinav`
--

CREATE TABLE `sinav` (
  `id` int(11) NOT NULL,
  `ders_ad` varchar(255) NOT NULL,
  `sinav_tipi` varchar(255) NOT NULL,
  `sinav_tarih` datetime NOT NULL,
  `akademisyen` varchar(255) NOT NULL,
  `eklenme_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sinav`
--

INSERT INTO `sinav` (`id`, `ders_ad`, `sinav_tipi`, `sinav_tarih`, `akademisyen`, `eklenme_tarih`) VALUES
(1, 'İleri Web Programlama', 'Final Sınavı', '2023-01-13 10:00:00', 'Dr.Öğr.Üyesi Bora ASLAN', '2023-01-22 22:55:56');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinav_dagitim`
--

CREATE TABLE `sinav_dagitim` (
  `id` int(11) NOT NULL,
  `sinav_id` int(11) NOT NULL,
  `ogrenci_id` int(11) NOT NULL,
  `sinif_id` int(11) NOT NULL,
  `eklenme_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sinav_dagitim`
--

INSERT INTO `sinav_dagitim` (`id`, `sinav_id`, `ogrenci_id`, `sinif_id`, `eklenme_tarih`) VALUES
(1, 1, 692, 11, '2023-01-23 01:22:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sinif`
--

CREATE TABLE `sinif` (
  `id` int(11) NOT NULL,
  `sinif_no` int(11) NOT NULL,
  `sinif_kapasite` int(11) NOT NULL,
  `eklenme_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `sinif`
--

INSERT INTO `sinif` (`id`, `sinif_no`, `sinif_kapasite`, `eklenme_tarih`) VALUES
(1, 101, 38, '2023-01-23 01:14:45'),
(2, 102, 40, '2023-01-23 01:14:45'),
(3, 103, 34, '2023-01-23 01:14:45'),
(4, 104, 30, '2023-01-23 01:14:45'),
(5, 105, 40, '2023-01-23 01:14:45'),
(6, 106, 24, '2023-01-23 01:14:45'),
(7, 107, 24, '2023-01-23 01:14:45'),
(8, 108, 30, '2023-01-23 01:14:45'),
(9, 109, 34, '2023-01-23 01:14:45'),
(10, 201, 38, '2023-01-23 01:14:45'),
(11, 202, 40, '2023-01-23 01:14:45'),
(12, 203, 34, '2023-01-23 01:14:45'),
(13, 204, 20, '2023-01-23 01:14:45'),
(14, 205, 20, '2023-01-23 01:14:45'),
(15, 206, 50, '2023-01-23 01:14:45'),
(16, 207, 44, '2023-01-23 01:14:45'),
(17, 208, 22, '2023-01-23 01:14:45'),
(19, 209, 20, '2023-01-23 01:15:06');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yonetici`
--

CREATE TABLE `yonetici` (
  `id` int(11) NOT NULL,
  `kullanici_ad` varchar(255) NOT NULL,
  `kullanici_sifre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yonetici`
--

INSERT INTO `yonetici` (`id`, `kullanici_ad`, `kullanici_sifre`) VALUES
(1, 'admin', '$6$ileri3c9909afec2$MmwDbgCWKlBGQUB38NRakACbAbiF5WraVkwStKENyIcoJEUpgHmiJxjRF6ptiWkHdsB0eGoKO2EIrBsgO5FYa/');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ogrenci`
--
ALTER TABLE `ogrenci`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sinav`
--
ALTER TABLE `sinav`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sinav_dagitim`
--
ALTER TABLE `sinav_dagitim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `sinif`
--
ALTER TABLE `sinif`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yonetici`
--
ALTER TABLE `yonetici`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ogrenci`
--
ALTER TABLE `ogrenci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=718;

--
-- Tablo için AUTO_INCREMENT değeri `sinav`
--
ALTER TABLE `sinav`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sinav_dagitim`
--
ALTER TABLE `sinav_dagitim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `sinif`
--
ALTER TABLE `sinif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `yonetici`
--
ALTER TABLE `yonetici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
