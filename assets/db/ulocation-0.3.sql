-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 06, 2018 at 12:46 AM
-- Server version: 5.5.59-0+deb8u1
-- PHP Version: 5.6.33-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ulocation`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `distancia_entre` (`lat1` DOUBLE, `lon1` DOUBLE, `lat2` DOUBLE, `lon2` DOUBLE) RETURNS DOUBLE RETURN ACOS( SIN(lat1*PI()/180)*SIN(lat2*PI()/180) + COS(lat1*PI()/180)*COS(lat2*PI()/180)*COS(lon2*PI()/180-lon1*PI()/180) ) * 6367$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id_place` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lat` double NOT NULL,
  `lng` double NOT NULL,
  `id_user` int(11) NOT NULL,
  `dt_modify` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id_place`, `name`, `url`, `description`, `address`, `lat`, `lng`, `id_user`, `dt_modify`) VALUES
(10, 'Parque de los ciervos', 'parque-de-los-ciervos', '<h1>Hello World!</h1>', 'Ave Parque de los Ciervos s/n, Chiluca Valle Escondido, Cd López Mateos, Méx.', 19.5721347, -99.28756870000001, 1, '2018-03-06 04:29:59'),
(11, 'Desierto de los Leones', 'desierto-de-los-leones', '', 'Parque Nacional Desierto de los Leones, Carretera México-Toluca s/n, Cuajimalpa de Morelos, La Venta, 05020 Ciudad de México, CDMX', 19.3131659, -99.31032829999998, 1, '2018-01-31 01:39:30'),
(12, 'Parque Nacional Iztaccíhuatl - Popocatépetl', 'parque-nacional-iztaccihuatl-popocatepetl', '<p>El <strong>parque nacional Iztacc&iacute;huatl&mdash;Popocat&eacute;petl</strong> es una de las primeras &aacute;reas naturales protegidas por el gobierno de M&eacute;xico. Est&aacute; asentado en las faldas y conos de la <a title="Eje Neovolc&aacute;nico" href="https://es.wikipedia.org/wiki/Eje_Neovolc%C3%A1nico">Sierra Nevada</a>, rodeado de bellos parajes y bosques de pino, encino y oyamel donde habitan venados de cola blanca, gallinas de monte, <a title="Romerolagus diazi" href="https://es.wikipedia.org/wiki/Romerolagus_diazi">teporingos</a> y <a title="Charas" href="https://es.wikipedia.org/wiki/Charas">charas</a>, entre otras muchas especies. En la cosmovisi&oacute;n de las viejas culturas ind&iacute;genas del M&eacute;xico prehisp&aacute;nico estos volcanes eran considerados seres vivos, con un pasado protag&oacute;nico divino y heroico. El nacimiento del Iztacc&iacute;huatl y el Popocat&eacute;petl ha dado origen a numerosas leyendas, incluyendo la del idilio de los volcanes, que se remonta a la &eacute;poca prehisp&aacute;nica.</p>', 'Calle Plaza de La Constitución 10-B Planta Alta Centro 56900 Amecameca de Juárez, Méx.', 19.1285088, -98.61606740000002, 1, '2018-03-06 05:35:18'),
(13, 'Parque nacional Grutas de Cacahuamilpa', 'parque-nacional-grutas-de-cacahuamilpa', '<p>El <strong>Parque Nacional Grutas de Cacahuamilpa</strong> es un <a class="mw-redirect" title="Area protegida" href="https://es.wikipedia.org/wiki/Area_protegida">&Aacute;rea Natural Protegida</a>, que de acuerdo con la Comisi&oacute;n Nacional de &Aacute;reas Naturales Protegidas de la <a class="mw-redirect" title="SEMARNAT" href="https://es.wikipedia.org/wiki/SEMARNAT">SEMARNAT</a> est&aacute; dentro de la categor&iacute;a de <a class="mw-redirect" title="Parque Nacional" href="https://es.wikipedia.org/wiki/Parque_Nacional">Parque Nacional</a>. Se encuentra localizada en la <a title="Sierra Madre del Sur" href="https://es.wikipedia.org/wiki/Sierra_Madre_del_Sur">Sierra Madre del Sur</a>, al norte del <a title="Estado de Guerrero" href="https://es.wikipedia.org/wiki/Estado_de_Guerrero">Estado de Guerrero</a> y comprende parte de los municipios de <a title="Municipio de Pilcaya" href="https://es.wikipedia.org/wiki/Municipio_de_Pilcaya">Pilcaya</a> y <a title="Taxco de Alarc&oacute;n" href="https://es.wikipedia.org/wiki/Taxco_de_Alarc%C3%B3n">Taxco de Alarc&oacute;n</a>.<sup id="cite_ref-1" class="reference separada"><a href="https://es.wikipedia.org/wiki/Parque_nacional_Grutas_de_Cacahuamilpa#cite_note-1">1</a></sup>​ Tiene una superficie total de 1598.26 ha.Y fue decretada como Parque Nacional el 23 de abril de 1936 por el entonces presidente de la Rep&uacute;blica, <a title="L&aacute;zaro C&aacute;rdenas del R&iacute;o" href="https://es.wikipedia.org/wiki/L%C3%A1zaro_C%C3%A1rdenas_del_R%C3%ADo">L&aacute;zaro C&aacute;rdenas del R&iacute;o</a>. Consideradas entre las m&aacute;s impresionantes del mundo, las Grutas de Cacahuamilpa guardan en su interior una interminable serie de caprichosas figuras que causan la admiraci&oacute;n de todos los visitantes.</p>', 'Está situada a unos 52 km de la ciudad de Taxco sobre la carretera nº 166', 18.6696653, -99.5098686, 1, '2018-03-06 05:49:59'),
(14, 'Parque nacional Nevado de Colima', 'parque-nacional-nevado-de-colima', '<p>El <strong>Parque Nacional El Nevado "El Colima"</strong> es un parque natural <a title="M&eacute;xico" href="https://es.wikipedia.org/wiki/M%C3%A9xico">mexicano</a>, se encuentra ubicado entre los l&iacute;mites de los estados de <a title="Jalisco" href="https://es.wikipedia.org/wiki/Jalisco">Jalisco</a> (83&nbsp;%) y <a title="Colima" href="https://es.wikipedia.org/wiki/Colima">Colima</a> (17&nbsp;%). El parque alberga al <a title="Volc&aacute;n de Colima" href="https://es.wikipedia.org/wiki/Volc%C3%A1n_de_Colima">Volc&aacute;n de Colima</a> y al <a title="Nevado de Colima" href="https://es.wikipedia.org/wiki/Nevado_de_Colima">Nevado de Colima</a>, del cual toma su nombre. Por decreto del gobierno mexicano fue declarado el <a title="5 de septiembre" href="https://es.wikipedia.org/wiki/5_de_septiembre">5 de septiembre</a> de <a title="1936" href="https://es.wikipedia.org/wiki/1936">1936</a>. Cubre una superficie total de 9,375 <a class="mw-redirect" title="Ha" href="https://es.wikipedia.org/wiki/Ha">hect&aacute;reas</a> y es administrado por la <a class="mw-redirect" title="Secretar&iacute;a de Medio Ambiente y Recursos Naturales" href="https://es.wikipedia.org/wiki/Secretar%C3%ADa_de_Medio_Ambiente_y_Recursos_Naturales">Secretar&iacute;a de Medio Ambiente y Recursos Naturales</a> del estado de <a title="Jalisco" href="https://es.wikipedia.org/wiki/Jalisco">Jalisco</a>. El parque cuenta con caseta de control, estacionamientos, caba&ntilde;as y un albergue.</p>', 'Colima Jalisco', 19.573398, -103.62758940000003, 1, '2018-03-06 05:52:12'),
(15, 'La marqueza', 'la-marqueza', '<p>El <strong>Parque Nacional Insurgente Miguel Hidalgo y Costilla</strong> conocido popularmente como <strong>La Marquesa</strong> se encuentra en la Delegaci&oacute;n <a title="Cuajimalpa de Morelos" href="https://es.wikipedia.org/wiki/Cuajimalpa_de_Morelos">Cuajimalpa de Morelos</a> en la <a title="Ciudad de M&eacute;xico" href="https://es.wikipedia.org/wiki/Ciudad_de_M%C3%A9xico">Ciudad de M&eacute;xico</a> y los municipios de <a title="Ocoyoacac" href="https://es.wikipedia.org/wiki/Ocoyoacac">Ocoyoacac</a> , <a title="Huixquilucan" href="https://es.wikipedia.org/wiki/Huixquilucan">Huixquilucan</a> y <a class="mw-redirect" title="Lerma (municipio)" href="https://es.wikipedia.org/wiki/Lerma_%28municipio%29">Lerma</a> en el <a title="Estado de M&eacute;xico" href="https://es.wikipedia.org/wiki/Estado_de_M%C3%A9xico">estado de M&eacute;xico</a>, establecido por Decreto Presidencial el 9 de septiembre de 1936, con una extensi&oacute;n de 1,760 <a class="mw-redirect" title="Hect&aacute;reas" href="https://es.wikipedia.org/wiki/Hect%C3%A1reas">hect&aacute;reas</a>, 1,602 de ellas en el <a title="Estado de M&eacute;xico" href="https://es.wikipedia.org/wiki/Estado_de_M%C3%A9xico">estado de M&eacute;xico</a>. Administrado bajo PROBOSQUE y el SINAP (Sistema Nacional de &Aacute;reas Naturales Protegidas). Este parque sirve como refugio y lugar de esparcimiento de fin de semana de los habitantes de las ciudades de <a class="mw-redirect" title="Toluca" href="https://es.wikipedia.org/wiki/Toluca">Toluca</a> y la de <a title="Ciudad de M&eacute;xico" href="https://es.wikipedia.org/wiki/Ciudad_de_M%C3%A9xico">M&eacute;xico</a>.<sup id="cite_ref-1" class="reference separada"><a href="https://es.wikipedia.org/wiki/Parque_nacional_Insurgente_Miguel_Hidalgo_y_Costilla#cite_note-1">1</a></sup>​</p>', 'Parque La Marqueza Parques Nacionales 50100 Toluca de Lerdo, MEX México', 19.3036537, -99.3711955, 1, '2018-03-06 05:53:47'),
(16, 'Parque Nacional Gogorrón', 'parque-nacional-gogorron', '<p>El <strong>Parque Nacional Gogorr&oacute;n</strong> es un <a title="Anexo:Parques nacionales de M&eacute;xico" href="https://es.wikipedia.org/wiki/Anexo:Parques_nacionales_de_M%C3%A9xico">parque nacional de M&eacute;xico</a> situado en el estado de <a title="San Luis Potos&iacute;" href="https://es.wikipedia.org/wiki/San_Luis_Potos%C3%AD">San Luis Potos&iacute;</a>. Esta &aacute;rea protegida de 250&nbsp;km&sup2; fue creada en 1936.</p>', 'Villa de Reyes, S.L.P. México', 21.9623126, -101.02828779999999, 1, '2018-03-06 05:56:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL COMMENT 'Indice Unico',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nombre',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Correo Electronico',
  `pasword` char(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Contraseña',
  `register_date` datetime NOT NULL COMMENT 'Fecha de registro'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='Usuarios';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pasword`, `register_date`) VALUES
(1, 'Admin Ulocation', 'ulocation@rebootproject.mx', '7a2a758847d62188d1cdf5cec36660c6', '2017-04-25 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id_place`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id_place` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Indice Unico', AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
