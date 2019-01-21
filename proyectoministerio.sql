-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.1.53-community-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for proyectoministerio
DROP DATABASE IF EXISTS `proyectoministerio`;
CREATE DATABASE IF NOT EXISTS `proyectoministerio` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `proyectoministerio`;

-- Dumping structure for table proyectoministerio.agendamiento
DROP TABLE IF EXISTS `agendamiento`;
CREATE TABLE IF NOT EXISTS `agendamiento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_id` int(11) NOT NULL,
  `fecha_cita` timestamp NULL DEFAULT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `paciente_id` (`paciente_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.agendamiento: ~3 rows (approximately)
/*!40000 ALTER TABLE `agendamiento` DISABLE KEYS */;
REPLACE INTO `agendamiento` (`id`, `paciente_id`, `fecha_cita`, `estado`) VALUES
	(1, 1, '2018-12-12 07:45:00', 'Completada'),
	(2, 1, '2018-12-20 10:40:00', 'Pendiente'),
	(3, 1, '2019-02-20 19:41:56', 'Agendada');
/*!40000 ALTER TABLE `agendamiento` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.campana
DROP TABLE IF EXISTS `campana`;
CREATE TABLE IF NOT EXISTS `campana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `edad` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `vacuna_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vacuna` (`vacuna_id`),
  CONSTRAINT `vacuna_id` FOREIGN KEY (`vacuna_id`) REFERENCES `vacuna` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.campana: ~19 rows (approximately)
/*!40000 ALTER TABLE `campana` DISABLE KEYS */;
REPLACE INTO `campana` (`id`, `nombre`, `fecha_inicio`, `fecha_fin`, `edad`, `estado`, `vacuna_id`) VALUES
	(1, 'BCG', '2019-01-02', '2019-01-30', 5, 1, 0),
	(2, 'HBO', '2019-01-18', '2019-01-18', 3, 1, 0),
	(3, 'Rotavirus 1', '2019-01-02', '2019-07-25', 2, 1, 0),
	(4, 'Rotavirus 2', '2019-01-01', '2019-05-11', 8, 1, 0),
	(5, 'Pentavalente 1', '2019-01-20', '2029-01-20', 2, 1, 0),
	(6, 'Pentavalente 2', '2019-01-20', '2029-01-20', 4, 1, 0),
	(7, 'Pentavalente 3', '2019-01-20', '2029-01-20', 6, 1, 0),
	(8, 'Poliomielitis 1', '2019-01-20', '2039-01-20', 3, 1, 0),
	(9, 'Poliomielitis 2', '2019-01-20', '2022-01-20', 4, 1, 0),
	(10, 'Poliomielitis 3', '2019-01-20', '2022-01-20', 5, 1, 0),
	(11, 'Neumococo 1', '2019-01-20', '2021-04-20', 5, 1, 0),
	(12, 'Neumococo 2', '2019-01-20', '2021-04-20', 6, 1, 0),
	(13, 'Neumococo 3', '2019-01-20', '2025-01-20', 7, 1, 0),
	(14, 'SR', '2019-01-20', '2021-01-20', 6, 1, 0),
	(15, 'SRP', '2019-01-20', '2022-01-20', 4, 1, 0),
	(16, 'Varicela', '2019-01-20', '2022-04-20', 3, 1, 0),
	(17, 'FA', '2019-01-20', '2022-06-25', 2, 1, 0),
	(18, 'OPV', '2019-01-20', '2023-07-02', 3, 1, 0),
	(19, 'Influenza', '2019-01-20', '2021-07-26', 1, 1, 0);
/*!40000 ALTER TABLE `campana` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.captacion
DROP TABLE IF EXISTS `captacion`;
CREATE TABLE IF NOT EXISTS `captacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.captacion: ~2 rows (approximately)
/*!40000 ALTER TABLE `captacion` DISABLE KEYS */;
REPLACE INTO `captacion` (`id`, `nombre`) VALUES
	(1, 'Temporal'),
	(2, 'Tardio');
/*!40000 ALTER TABLE `captacion` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.cargo
DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.cargo: ~2 rows (approximately)
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
REPLACE INTO `cargo` (`id`, `nombre`) VALUES
	(1, 'Administrador'),
	(2, 'Enfermera');
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.control
DROP TABLE IF EXISTS `control`;
CREATE TABLE IF NOT EXISTS `control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_id` int(11) NOT NULL,
  `BCG` date DEFAULT NULL,
  `HBO` date DEFAULT NULL,
  `rotavirus1` date DEFAULT NULL,
  `rotavirus2` date DEFAULT NULL,
  `pentavalente1` date DEFAULT NULL,
  `pentavalente2` date DEFAULT NULL,
  `pentavalente3` date DEFAULT NULL,
  `poliomielitis1` date DEFAULT NULL,
  `poliomielitis2` date DEFAULT NULL,
  `poliomielitis3` date DEFAULT NULL,
  `neumococo1` date DEFAULT NULL,
  `neumococo2` date DEFAULT NULL,
  `neumococo3` date DEFAULT NULL,
  `SR` date DEFAULT NULL,
  `SRP` date DEFAULT NULL,
  `varicela` date DEFAULT NULL,
  `FA` date DEFAULT NULL,
  `OPV` date DEFAULT NULL,
  `Influenza` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paciente_id` (`paciente_id`),
  CONSTRAINT `paciente_id` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.control: ~1 rows (approximately)
/*!40000 ALTER TABLE `control` DISABLE KEYS */;
REPLACE INTO `control` (`id`, `paciente_id`, `BCG`, `HBO`, `rotavirus1`, `rotavirus2`, `pentavalente1`, `pentavalente2`, `pentavalente3`, `poliomielitis1`, `poliomielitis2`, `poliomielitis3`, `neumococo1`, `neumococo2`, `neumococo3`, `SR`, `SRP`, `varicela`, `FA`, `OPV`, `Influenza`) VALUES
	(1, 3, '2019-01-21', '2019-01-21', '2019-01-21', '2019-01-21', '2019-01-21', '2019-01-21', NULL, '2019-01-21', NULL, NULL, NULL, NULL, NULL, '2019-01-21', NULL, NULL, NULL, NULL, NULL);
/*!40000 ALTER TABLE `control` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.controlcampana
DROP TABLE IF EXISTS `controlcampana`;
CREATE TABLE IF NOT EXISTS `controlcampana` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_id` int(11) NOT NULL,
  `campana_id` int(11) NOT NULL,
  `fecha_suministro` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `controlcampana_paciente_id` (`paciente_id`),
  KEY `controlcampana_campana_id` (`campana_id`),
  CONSTRAINT `controlcampana_campana_id` FOREIGN KEY (`campana_id`) REFERENCES `campana` (`id`),
  CONSTRAINT `controlcampana_paciente_id` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.controlcampana: ~1 rows (approximately)
/*!40000 ALTER TABLE `controlcampana` DISABLE KEYS */;
REPLACE INTO `controlcampana` (`id`, `paciente_id`, `campana_id`, `fecha_suministro`) VALUES
	(1, 3, 2, '2019-01-11');
/*!40000 ALTER TABLE `controlcampana` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.empleado
DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_persona` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `estado` varchar(30) NOT NULL DEFAULT '1',
  `cargo_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cargo_id` (`cargo_id`),
  KEY `cedula_persona_empleado` (`cedula_persona`),
  CONSTRAINT `cargo_id` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`id`),
  CONSTRAINT `cedula_persona_empleado` FOREIGN KEY (`cedula_persona`) REFERENCES `persona` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.empleado: ~7 rows (approximately)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
REPLACE INTO `empleado` (`id`, `cedula_persona`, `usuario`, `clave`, `estado`, `cargo_id`) VALUES
	(1, '0803106509', 'pcmacias', 'pcmacias123', '0', 2),
	(2, '0925048598', 'caalmoli', 'caalmoli123', '1', 1),
	(3, '0930442447', 'jimdgonz', 'jimdgonz123', '1', 2),
	(4, '1600470437', 'msanchez', 'marcelo123', '1', 1),
	(5, '1234567890', 'jpiguave', 'qwertyuiop', '1', 2),
	(11, '1600222437', 'ftrabubu', 'ftrabubu123', '1', 1),
	(12, '1293454394', 'jpastor', 'jpastor1233', '1', 2);
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.etnia
DROP TABLE IF EXISTS `etnia`;
CREATE TABLE IF NOT EXISTS `etnia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.etnia: ~8 rows (approximately)
/*!40000 ALTER TABLE `etnia` DISABLE KEYS */;
REPLACE INTO `etnia` (`id`, `nombre`) VALUES
	(1, 'Indigena'),
	(2, 'Afro'),
	(3, 'Negro'),
	(4, 'Mulato/a'),
	(5, 'Montubio/a'),
	(6, 'Mestizo/a'),
	(7, 'Blanco/a'),
	(8, 'Otro');
/*!40000 ALTER TABLE `etnia` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.historial
DROP TABLE IF EXISTS `historial`;
CREATE TABLE IF NOT EXISTS `historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paciente_id` int(11) NOT NULL,
  `empleado_id` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paciente_id` (`paciente_id`),
  KEY `empleado_id` (`empleado_id`),
  CONSTRAINT `empleado_id_historial` FOREIGN KEY (`empleado_id`) REFERENCES `empleado` (`id`),
  CONSTRAINT `paciente_id_historial` FOREIGN KEY (`paciente_id`) REFERENCES `paciente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.historial: ~0 rows (approximately)
/*!40000 ALTER TABLE `historial` DISABLE KEYS */;
REPLACE INTO `historial` (`id`, `paciente_id`, `empleado_id`, `fecha`) VALUES
	(1, 3, 4, '2019-01-21 11:40:54'),
	(2, 3, 4, '2019-01-21 11:59:02'),
	(3, 3, 4, '2019-01-21 12:07:09'),
	(4, 3, 4, '2019-01-21 12:07:18'),
	(5, 3, 4, '2019-01-21 12:07:26'),
	(6, 3, 4, '2019-01-21 12:09:30'),
	(7, 3, 4, '2019-01-21 12:09:40'),
	(8, 3, 4, '2019-01-21 12:11:50'),
	(9, 3, 4, '2019-01-21 12:13:33'),
	(10, 3, 4, '2019-01-21 12:15:29'),
	(11, 3, 4, '2019-01-21 12:16:29'),
	(12, 3, 4, '2019-01-21 12:16:35'),
	(13, 3, 4, '2019-01-21 12:28:18'),
	(14, 3, 4, '2019-01-21 12:30:02'),
	(15, 3, 4, '2019-01-21 12:33:35'),
	(16, 3, 4, '2019-01-21 12:39:14'),
	(17, 3, 4, '2019-01-21 12:39:14'),
	(18, 3, 4, '2019-01-21 12:41:55'),
	(19, 3, 4, '2019-01-21 12:41:55');
/*!40000 ALTER TABLE `historial` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.insumo
DROP TABLE IF EXISTS `insumo`;
CREATE TABLE IF NOT EXISTS `insumo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(255) NOT NULL,
  `calibre` int(11) NOT NULL,
  `estado` varchar(30) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.insumo: ~11 rows (approximately)
/*!40000 ALTER TABLE `insumo` DISABLE KEYS */;
REPLACE INTO `insumo` (`id`, `nombre`, `calibre`, `estado`) VALUES
	(1, '	Gallipot', 6, '1'),
	(2, 'Gallipot', 10, '1'),
	(3, 'Gallipot', 14, '1'),
	(4, 'Vaso', 5, '1'),
	(5, 'Vaso', 7, '1'),
	(6, 'Vaso', 12, '1'),
	(7, 'Jeringa Boneau', 100, '1'),
	(8, 'Jeringa Boneau', 60, '1'),
	(9, 'Jeringa CC', 1, '1'),
	(10, 'Jeringa CC', 10, '1'),
	(11, 'Jeringa CC', 20, '1');
/*!40000 ALTER TABLE `insumo` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.nacionalidad
DROP TABLE IF EXISTS `nacionalidad`;
CREATE TABLE IF NOT EXISTS `nacionalidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.nacionalidad: ~6 rows (approximately)
/*!40000 ALTER TABLE `nacionalidad` DISABLE KEYS */;
REPLACE INTO `nacionalidad` (`id`, `nombre`) VALUES
	(1, 'Ecuatoriano'),
	(2, 'Colombiano'),
	(3, 'Peruano'),
	(4, 'Cubano'),
	(5, 'Venezolano'),
	(6, 'Otro');
/*!40000 ALTER TABLE `nacionalidad` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.paciente
DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula_persona` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `sexo_id` int(11) NOT NULL,
  `cedula_padre` varchar(50) NOT NULL,
  `nombre_padre` varchar(50) NOT NULL,
  `cedula_madre` varchar(11) NOT NULL,
  `nombre_madre` varchar(50) NOT NULL,
  `etnia_id` int(11) NOT NULL,
  `nacionalidad_id` int(11) NOT NULL,
  `captacion_id` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `pertenencia_distrito` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_captacion` (`captacion_id`),
  KEY `id_sexo` (`sexo_id`),
  KEY `id_etnia` (`etnia_id`),
  KEY `id_nacionalidad` (`nacionalidad_id`),
  KEY `cedula_paciente` (`cedula_persona`),
  CONSTRAINT `captacion_id` FOREIGN KEY (`captacion_id`) REFERENCES `captacion` (`id`),
  CONSTRAINT `cedula_persona_paciente` FOREIGN KEY (`cedula_persona`) REFERENCES `persona` (`cedula`),
  CONSTRAINT `etnia_id` FOREIGN KEY (`etnia_id`) REFERENCES `etnia` (`id`),
  CONSTRAINT `nacionalidad_id` FOREIGN KEY (`nacionalidad_id`) REFERENCES `nacionalidad` (`id`),
  CONSTRAINT `sexo_id` FOREIGN KEY (`sexo_id`) REFERENCES `sexo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.paciente: ~3 rows (approximately)
/*!40000 ALTER TABLE `paciente` DISABLE KEYS */;
REPLACE INTO `paciente` (`id`, `cedula_persona`, `fecha_nacimiento`, `sexo_id`, `cedula_padre`, `nombre_padre`, `cedula_madre`, `nombre_madre`, `etnia_id`, `nacionalidad_id`, `captacion_id`, `estado`, `pertenencia_distrito`) VALUES
	(1, '0803106509', '2018-12-26', 2, '0299848567', 'Marco', '0923453232', 'Patricia', 6, 1, 1, '1', 1),
	(2, '0177327281', '1991-01-03', 1, '0459338292', 'Andres', '0739493812', 'Julia', 6, 4, 2, '1', 2),
	(3, '0185739911', '2015-01-03', 2, '0324285739', 'Francisco', '0924927131', 'Fatima', 5, 1, 1, '1', 1);
/*!40000 ALTER TABLE `paciente` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.persona
DROP TABLE IF EXISTS `persona`;
CREATE TABLE IF NOT EXISTS `persona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(50) NOT NULL,
  `nombre` char(255) NOT NULL,
  `apellido` char(255) NOT NULL,
  `correo` char(255) NOT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cedula` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.persona: ~10 rows (approximately)
/*!40000 ALTER TABLE `persona` DISABLE KEYS */;
REPLACE INTO `persona` (`id`, `cedula`, `nombre`, `apellido`, `correo`, `direccion`, `telefono`) VALUES
	(1, '0803106509', 'Patricia', 'Macias', 'patmac_19@hotmail.com', 'Via a la Costa Km 5 1/2', '0990058425'),
	(2, '0925048598', 'Carlos', 'Molina', 'carlos.molina@hotmail.com', 'Trinitaria', '0987865463'),
	(3, '0930442447', 'Jimmy', 'Gonzales', 'jimdgonz@hotmail.com', '26 y Febres Cordero', '042461915'),
	(4, '0930673645', 'Daniel', 'Torres', 'saul.torres@hotmail', 'D y la 26', '0992194333'),
	(5, '1600470437', 'Marcelo', 'Sanchez', 'msanchez@@maill.com', 'Urdesa Central', '0984347576'),
	(6, '1234567890', 'Juan', 'Piguave', 'jpiguave@maill.com', 'Vernaza', '0925436676'),
	(7, '1600222437', 'Frank', 'Trabubu', 'ftbb@maill.com', 'Kennedy Norte', '0984334567'),
	(10, '0177327281', 'Mario', 'Sanders', 'msanders@mail.com', 'Alborada V Etapa', '0984534504'),
	(11, '0185739911', 'Julia', 'Lajas', 'jlajas@mail.com', 'Samanes 1', '0982948298'),
	(12, '1293454394', 'Juan', 'Pastor', 'jpastor@mail.com', 'Urdenor', '0934323454');
/*!40000 ALTER TABLE `persona` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.sexo
DROP TABLE IF EXISTS `sexo`;
CREATE TABLE IF NOT EXISTS `sexo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.sexo: ~2 rows (approximately)
/*!40000 ALTER TABLE `sexo` DISABLE KEYS */;
REPLACE INTO `sexo` (`id`, `nombre`) VALUES
	(1, 'Masculino'),
	(2, 'Fenenino');
/*!40000 ALTER TABLE `sexo` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.stockinsumo
DROP TABLE IF EXISTS `stockinsumo`;
CREATE TABLE IF NOT EXISTS `stockinsumo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lote` int(11) NOT NULL,
  `cantidad` varchar(200) NOT NULL,
  `fecha_ingreso` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_expiracion` timestamp NULL DEFAULT NULL,
  `id_insumo` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_insumo` (`id_insumo`),
  CONSTRAINT `id_insumo` FOREIGN KEY (`id_insumo`) REFERENCES `insumo` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.stockinsumo: ~2 rows (approximately)
/*!40000 ALTER TABLE `stockinsumo` DISABLE KEYS */;
REPLACE INTO `stockinsumo` (`id`, `lote`, `cantidad`, `fecha_ingreso`, `fecha_expiracion`, `id_insumo`) VALUES
	(1, 2, '20', '2019-01-02 06:54:24', '2019-03-18 06:54:43', 1),
	(2, 3, '30', '2019-01-10 06:55:52', '2019-11-18 06:56:05', 8);
/*!40000 ALTER TABLE `stockinsumo` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.stockvacuna
DROP TABLE IF EXISTS `stockvacuna`;
CREATE TABLE IF NOT EXISTS `stockvacuna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lote` int(11) NOT NULL,
  `cantidad` varchar(200) NOT NULL,
  `fecha_ingreso` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_expiracion` timestamp NULL DEFAULT NULL,
  `id_vacuna` int(11) NOT NULL,
  `dosis` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_vacuna` (`id_vacuna`),
  CONSTRAINT `id_vacuna` FOREIGN KEY (`id_vacuna`) REFERENCES `vacuna` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.stockvacuna: ~1 rows (approximately)
/*!40000 ALTER TABLE `stockvacuna` DISABLE KEYS */;
REPLACE INTO `stockvacuna` (`id`, `lote`, `cantidad`, `fecha_ingreso`, `fecha_expiracion`, `id_vacuna`, `dosis`) VALUES
	(1, 3, '14', '2019-01-05 06:56:45', '2019-04-12 06:56:56', 6, 34);
/*!40000 ALTER TABLE `stockvacuna` ENABLE KEYS */;

-- Dumping structure for table proyectoministerio.vacuna
DROP TABLE IF EXISTS `vacuna`;
CREATE TABLE IF NOT EXISTS `vacuna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` char(255) NOT NULL,
  `tipo` char(255) NOT NULL,
  `estado` varchar(30) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table proyectoministerio.vacuna: ~7 rows (approximately)
/*!40000 ALTER TABLE `vacuna` DISABLE KEYS */;
REPLACE INTO `vacuna` (`id`, `nombre`, `tipo`, `estado`) VALUES
	(1, 'Hepatitis', 'A', '1'),
	(2, 'Rotavirus', 'A', '1'),
	(3, 'RV-1', 'A', '1'),
	(4, 'Difteria', 'A', '1'),
	(5, 'Tetanos', 'A', '1'),
	(6, 'Influenza', 'A', '1'),
	(7, 'Antineumotica', 'A', '1');
/*!40000 ALTER TABLE `vacuna` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
