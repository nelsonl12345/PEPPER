-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-09-2018 a las 18:28:02
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pepper`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ataques`
--

CREATE TABLE `ataques` (
  `id` int(11) NOT NULL,
  `departamento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codigo` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `subindice` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `razonsocial` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombreevento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codevento` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fechanoti` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tipodoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numdoc` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombresp` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellidosp` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `telefonop` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `fechanacimientop` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `edadp` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `unidadmedida` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sexop` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `paiscaso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `departamentoocu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipioocu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `areacaso` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `localidadcaso` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `barriocaso` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `veredaozona` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ocupacionpaciente` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tiporegimen` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `nombreadmin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `codigoadmin` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `etnica` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `grupopoblacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hclinica` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `codmuni` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `departamentopac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `municipiopac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccionpac` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fechaconsulta` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fechasintoma` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `clasificacioncaso` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hospitalizacion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fechahospit` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `condfinal` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fechadefuncion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numdefuncion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `causasmuerte` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreprofesional` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `telefonoprofesional` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `agresion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tipoagresion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `agresionprov` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `tipolesion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `profundidad` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fechaagre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `especieagre` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `vacunado` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fechavacunacion` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nombreprop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `direccionprop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefonoprop` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `estadoanimal` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ubicacion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `exposicion` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `suero` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `fechasuero` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `vacuna` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ndosis` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fechaultdosis` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lavado` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `sutura` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ordenosuero` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `ordenovacuna` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `pruebadiag` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `resultado` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `identifcacionvar` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `varianteident` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `cual` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecharesultado` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `signosysintomas` varchar(800) COLLATE utf8_unicode_ci NOT NULL,
  `registrada` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `propietario` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ataques`
--

INSERT INTO `ataques` (`id`, `departamento`, `municipio`, `codigo`, `subindice`, `razonsocial`, `nombreevento`, `codevento`, `fechanoti`, `tipodoc`, `numdoc`, `nombresp`, `apellidosp`, `telefonop`, `fechanacimientop`, `edadp`, `unidadmedida`, `sexop`, `paiscaso`, `departamentoocu`, `municipioocu`, `areacaso`, `localidadcaso`, `barriocaso`, `veredaozona`, `ocupacionpaciente`, `tiporegimen`, `nombreadmin`, `codigoadmin`, `etnica`, `grupopoblacion`, `hclinica`, `codmuni`, `departamentopac`, `municipiopac`, `direccionpac`, `fechaconsulta`, `fechasintoma`, `clasificacioncaso`, `hospitalizacion`, `fechahospit`, `condfinal`, `fechadefuncion`, `numdefuncion`, `causasmuerte`, `nombreprofesional`, `telefonoprofesional`, `agresion`, `tipoagresion`, `agresionprov`, `tipolesion`, `profundidad`, `fechaagre`, `especieagre`, `vacunado`, `fechavacunacion`, `nombreprop`, `direccionprop`, `telefonoprop`, `estadoanimal`, `ubicacion`, `exposicion`, `suero`, `fechasuero`, `vacuna`, `ndosis`, `fechaultdosis`, `lavado`, `sutura`, `ordenosuero`, `ordenovacuna`, `pruebadiag`, `resultado`, `identifcacionvar`, `varianteident`, `cual`, `fecharesultado`, `signosysintomas`, `registrada`, `propietario`) VALUES
(1, 'sdfsdfsdf', 'dfdf', '45454', '4545', 'dfd', 'dfd', '4545', 'dfdfas', 'Cedula de ciudadania', '454545', 'sdasdasd', 'adadasd', '454545', 'dasdasd', '15', 'Meses', 'Masculino', 'Colombia', 'sdadad', 'adsasda', 'Cabecera municipal', 'sdasdasd', 'asdasd', 'dfdfa', 'sasfafa', 'Especial', 'sdasdasd', '454545', 'Rom gitano', 'Desmovilizados', '151825.pdf', 'dfdf', 'sssss', 'zxczxzx', 'dsdfsdf', 'sasdsds', 'dsadasd', 'Sospechoso', 'No', NULL, 'Vivo', NULL, NULL, NULL, 'dasdaa', 'sdadasda', 'Casos de agresion por una APTR', 'Mordedura', 'Si', 'Unica', 'Superficial', 'asdadad', 'Gato', 'No', NULL, 'saasdada', 'asdasdas', '454545', 'Con signos de rabia', 'Observable', 'No exposicion', 'No', NULL, 'No', NULL, NULL, 'Si', 'Si', 'Si', 'Si', 'IFD', 'Positivo', 'No', '3. Tres', NULL, NULL, 'a:24:{i:0;s:6:\"Fiebre\";i:1;s:23:\"Hiporexia / Inapetencia\";i:2;s:7:\"Cefalea\";i:3;s:6:\"Vomito\";i:4;s:29:\"Paresias / debilidad muscular\";i:5;s:11:\"Parestesias\";i:6;s:8:\"Disfagia\";i:7;s:10:\"Odinofagia\";i:8;s:26:\"Arreflexia / hiporreflexia\";i:9;s:38:\"Alucinaci', '', ''),
(2, 'sdfsdfsdf', 'dfdf', '45454', '4545', 'dfd', 'dfd', '4545', 'dfdfas', 'Cedula de ciudadania', '454545', 'sdasdasd', 'adadasd', '454545', 'dasdasd', '15', 'Meses', 'Masculino', 'Colombia', 'sdadad', 'adsasda', 'Cabecera municipal', 'sdasdasd', 'asdasd', 'dfdfa', 'sasfafa', 'Especial', 'sdasdasd', '454545', 'Rom gitano', 'Desmovilizados', '566284.pdf', 'dfdf', 'sssss', 'zxczxzx', 'dsdfsdf', 'sasdsds', 'dsadasd', 'Sospechoso', 'No', NULL, 'Vivo', NULL, NULL, NULL, 'dasdaa', 'sdadasda', 'Casos de agresion por una APTR', 'Mordedura', 'Si', 'Unica', 'Superficial', 'asdadad', 'Gato', 'No', NULL, 'saasdada', 'asdasdas', '454545', 'Con signos de rabia', 'Observable', 'No exposicion', 'No', NULL, 'No', NULL, NULL, 'Si', 'Si', 'Si', 'Si', 'IFD', 'Positivo', 'No', '3. Tres', NULL, NULL, 'a:24:{i:0;s:6:\"Fiebre\";i:1;s:23:\"Hiporexia / Inapetencia\";i:2;s:7:\"Cefalea\";i:3;s:6:\"Vomito\";i:4;s:29:\"Paresias / debilidad muscular\";i:5;s:11:\"Parestesias\";i:6;s:8:\"Disfagia\";i:7;s:10:\"Odinofagia\";i:8;s:26:\"Arreflexia / hiporreflexia\";i:9;s:38:\"Alucinaciones o delirio de persecucion\";i:10;s:19:\"Expresion de terror\";i:11;s:9:\"Sialorrea\";i:12;s:9:\"Aerofobia\";i:13;s:10:\"Hidrofobia\";i:14;s:34:\"Tranquilidad alterna con exitacion\";i:15;s:9:\"Depresion\";i:16;s:17:\"Hiperexitabilidad\";i:17;s:11:\"Agresividad\";i:18;s:19:\"Espasmos musculares\";i:19;s:12:\"Convulsiones\";i:20;s:9:\"Paralisis\";i:21;s:19:\"Crisis respiratoria\";i:22;s:4:\"Coma\";i:23;s:24:\"Paro cardio respiratorio\";}', '', ''),
(3, 'sdfsdfsdf', 'dfdf', '45454', '4545332', 'dfd', 'dfd', '4545', 'dfdfas', 'Cedula de ciudadania', '454545', 'sdasdasd', 'adadasd', '454545', 'dasdasd', '15', 'Meses', 'Masculino', 'Colombia', 'sdadad', 'adsasda', 'Cabecera municipal', 'sdasdasd', 'asdasd', 'dfdfa', 'sasfafa', 'Especial', 'sdasdasd', '454545', 'Rom gitano', 'Desmovilizados', '664215.pdf', 'dfdf', 'sssss', 'zxczxzx', 'dsdfsdf', 'sasdsds', 'dsadasd', 'Sospechoso', 'No', NULL, 'Vivo', NULL, NULL, NULL, 'dasdaa', 'sdadasda', 'Casos de agresion por una APTR', 'Mordedura', 'Si', 'Unica', 'Superficial', 'asdadad', 'Gato', 'No', NULL, 'saasdada', 'asdasdas', '454545', 'Con signos de rabia', 'Observable', 'No exposicion', 'No', NULL, 'No', NULL, NULL, 'Si', 'Si', 'Si', 'Si', 'IFD', 'Positivo', 'No', '3. Tres', NULL, NULL, 'a:24:{i:0;s:6:\"Fiebre\";i:1;s:23:\"Hiporexia / Inapetencia\";i:2;s:7:\"Cefalea\";i:3;s:6:\"Vomito\";i:4;s:29:\"Paresias / debilidad muscular\";i:5;s:11:\"Parestesias\";i:6;s:8:\"Disfagia\";i:7;s:10:\"Odinofagia\";i:8;s:26:\"Arreflexia / hiporreflexia\";i:9;s:38:\"Alucinaciones o delirio de persecucion\";i:10;s:19:\"Expresion de terror\";i:11;s:9:\"Sialorrea\";i:12;s:9:\"Aerofobia\";i:13;s:10:\"Hidrofobia\";i:14;s:34:\"Tranquilidad alterna con exitacion\";i:15;s:9:\"Depresion\";i:16;s:17:\"Hiperexitabilidad\";i:17;s:11:\"Agresividad\";i:18;s:19:\"Espasmos musculares\";i:19;s:12:\"Convulsiones\";i:20;s:9:\"Paralisis\";i:21;s:19:\"Crisis respiratoria\";i:22;s:4:\"Coma\";i:23;s:24:\"Paro cardio respiratorio\";}', '', ''),
(4, 'sdfsdfsdf', 'dfdf', '45454', '4545332', 'dfd', 'dfd', '4545', 'dfdfas', 'Cedula de ciudadania', '454545', 'sdasdasd', 'adadasd', '454545', 'dasdasd', '15', 'Meses', 'Masculino', 'Colombia', 'sdadad', 'adsasda', 'Cabecera municipal', 'sdasdasd', 'asdasd', 'dfdfa', 'sasfafa', 'Especial', 'sdasdasd', '454545', 'Rom gitano', 'Desmovilizados', '823059.pdf', 'dfdf', 'sssss', 'zxczxzx', 'dsdfsdf', 'sasdsds', 'dsadasd', 'Sospechoso', 'No', NULL, 'Vivo', NULL, NULL, NULL, 'dasdaa', 'sdadasda', 'Casos de agresion por una APTR', 'Mordedura', 'Si', 'Unica', 'Superficial', 'asdadad', 'Gato', 'No', NULL, 'saasdada', 'asdasdas', '454545', 'Con signos de rabia', 'Observable', 'No exposicion', 'No', NULL, 'No', NULL, NULL, 'Si', 'Si', 'Si', 'Si', 'IFD', 'Positivo', 'No', '3. Tres', NULL, NULL, 'a:21:{i:0;s:6:\"Fiebre\";i:1;s:23:\"Hiporexia / Inapetencia\";i:2;s:7:\"Cefalea\";i:3;s:6:\"Vomito\";i:4;s:29:\"Paresias / debilidad muscular\";i:5;s:11:\"Parestesias\";i:6;s:8:\"Disfagia\";i:7;s:10:\"Odinofagia\";i:8;s:26:\"Arreflexia / hiporreflexia\";i:9;s:38:\"Alucinaciones o delirio de persecucion\";i:10;s:19:\"Expresion de terror\";i:11;s:9:\"Sialorrea\";i:12;s:9:\"Aerofobia\";i:13;s:10:\"Hidrofobia\";i:14;s:34:\"Tranquilidad alterna con exitacion\";i:15;s:9:\"Depresion\";i:16;s:17:\"Hiperexitabilidad\";i:17;s:11:\"Agresividad\";i:18;s:19:\"Espasmos musculares\";i:19;s:12:\"Convulsiones\";i:20;s:9:\"Paralisis\";}', '', ''),
(5, 'sdfsdfsdf', 'dfdf', '45454', '4545332', 'dfd', 'dfd', '4545', 'dfdfas', 'Cedula de ciudadania', '454545', 'sdasdasd', 'adadasd', '454545', 'dasdasd', '15', 'Meses', 'Masculino', 'Colombia', 'sdadad', 'adsasda', 'Cabecera municipal', 'sdasdasd', 'asdasd', 'dfdfa', 'sasfafa', 'Especial', 'sdasdasd', '454545', 'Rom gitano', 'Desmovilizados', '933929.pdf', 'dfdf', 'sssss', 'zxczxzx', 'dsdfsdf', 'sasdsds', 'dsadasd', 'Sospechoso', 'No', NULL, 'Vivo', NULL, NULL, NULL, 'dasdaa', 'sdadasda', 'Casos de agresion por una APTR', 'Mordedura', 'Si', 'Unica', 'Superficial', 'asdadad', 'Gato', 'No', NULL, 'saasdada', 'asdasdas', '454545', 'Con signos de rabia', 'Observable', 'No exposicion', 'No', NULL, 'No', NULL, NULL, 'Si', 'Si', 'Si', 'Si', 'IFD', 'Positivo', 'No', '3. Tres', NULL, NULL, 'a:21:{i:0;s:6:\"Fiebre\";i:1;s:23:\"Hiporexia / Inapetencia\";i:2;s:7:\"Cefalea\";i:3;s:6:\"Vomito\";i:4;s:29:\"Paresias / debilidad muscular\";i:5;s:11:\"Parestesias\";i:6;s:8:\"Disfagia\";i:7;s:10:\"Odinofagia\";i:8;s:26:\"Arreflexia / hiporreflexia\";i:9;s:38:\"Alucinaciones o delirio de persecucion\";i:10;s:19:\"Expresion de terror\";i:11;s:9:\"Sialorrea\";i:12;s:9:\"Aerofobia\";i:13;s:10:\"Hidrofobia\";i:14;s:34:\"Tranquilidad alterna con exitacion\";i:15;s:9:\"Depresion\";i:16;s:17:\"Hiperexitabilidad\";i:17;s:11:\"Agresividad\";i:18;s:19:\"Espasmos musculares\";i:19;s:12:\"Convulsiones\";i:20;s:9:\"Paralisis\";}', '', ''),
(6, 'sdfsdfsdf', 'dfdf', '45454', '4545332', 'dfd', 'dfd', '4545', 'dfdfas', 'Cedula de ciudadania', '454545', 'sdasdasd', 'adadasd', '454545', 'dasdasd', '15', 'Meses', 'Masculino', 'Colombia', 'sdadad', 'adsasda', 'Cabecera municipal', 'sdasdasd', 'asdasd', 'dfdfa', 'sasfafa', 'Especial', 'sdasdasd', '454545', 'Rom gitano', 'Desmovilizados', '878173.pdf', 'dfdf', 'sssss', 'zxczxzx', 'dsdfsdf', 'sasdsds', 'dsadasd', 'Sospechoso', 'No', NULL, 'Vivo', NULL, NULL, NULL, 'dasdaa', 'sdadasda', 'Casos de agresion por una APTR', 'Mordedura', 'Si', 'Unica', 'Superficial', 'asdadad', 'Gato', 'No', NULL, 'saasdada', 'asdasdas', '454545', 'Con signos de rabia', 'Observable', 'No exposicion', 'No', NULL, 'No', NULL, NULL, 'Si', 'Si', 'Si', 'Si', 'IFD', 'Positivo', 'No', '3. Tres', NULL, NULL, 'a:3:{i:0;s:6:\"Fiebre\";i:1;s:23:\"Hiporexia / Inapetencia\";i:2;s:9:\"Paralisis\";}', '', ''),
(7, 'sdfsdfsdf', 'dfdf', '45454', '4545332', 'dfd', 'dfd', '4545', 'dfdfas', 'Cedula de ciudadania', '454545', 'sdasdasd', 'adadasd', '454545', 'dasdasd', '15', 'Meses', 'Masculino', 'Colombia', 'sdadad', 'adsasda', 'Cabecera municipal', 'sdasdasd', 'asdasd', 'dfdfa', 'sasfafa', 'Especial', 'sdasdasd', '454545', 'Rom gitano', 'Desmovilizados', '472687.pdf', 'dfdf', 'sssss', 'zxczxzx', 'dsdfsdf', 'sasdsds', 'dsadasd', 'Sospechoso', 'No', NULL, 'Vivo', NULL, NULL, NULL, 'dasdaa', 'sdadasda', 'Casos de agresion por una APTR', 'Mordedura', 'Si', 'Unica', 'Superficial', 'asdadad', 'Gato', 'No', NULL, 'saasdada', 'asdasdas', '454545', 'Con signos de rabia', 'Observable', 'No exposicion', 'No', NULL, 'No', NULL, NULL, 'Si', 'Si', 'Si', 'Si', 'IFD', 'Positivo', 'No', '3. Tres', NULL, NULL, 'a:3:{i:0;s:6:\"Fiebre\";i:1;s:23:\"Hiporexia / Inapetencia\";i:2;s:9:\"Paralisis\";}', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `checklists`
--

CREATE TABLE `checklists` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `radicado_id` int(11) DEFAULT NULL,
  `archivo1c` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `archivo2c` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `archivo3c` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `comentario` longtext COLLATE utf8_unicode_ci NOT NULL,
  `usuario1c_id` int(11) DEFAULT NULL,
  `usuario2c_id` int(11) DEFAULT NULL,
  `usuario3c_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `checklists`
--

INSERT INTO `checklists` (`id`, `usuario_id`, `radicado_id`, `archivo1c`, `archivo2c`, `archivo3c`, `comentario`, `usuario1c_id`, `usuario2c_id`, `usuario3c_id`) VALUES
(19, NULL, 43, 'Aprobado', 'Aprobado', 'Aprobado', 'Solicitud 43 Finalizada ok', 30, 30, 30),
(20, NULL, 42, 'Aprobado', 'Aprobado', 'Aprobado', 'Solicitud ok Finalizada', 30, 30, 30),
(21, NULL, 44, 'Rechazado', 'Aprobado', 'Aprobado', 'Tiene falla en el carnet de vacunacion', NULL, 30, 30),
(22, NULL, 46, 'Aprobado', 'Aprobado', 'Aprobado', 'jk', 31, 30, 31),
(23, NULL, 47, 'Rechazado', 'Aprobado', 'Aprobado', 'core', NULL, 30, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `raza_id` int(11) DEFAULT NULL,
  `nombresm` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `aniom` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `mesm` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `diam` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `oficiom` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descripcionm` longtext COLLATE utf8_unicode_ci NOT NULL,
  `generom` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `colorm` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `cual` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto1m` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto2m` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `foto3m` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_atm` datetime NOT NULL,
  `updated_atm` datetime NOT NULL,
  `estadom` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `usuario_id`, `raza_id`, `nombresm`, `aniom`, `mesm`, `diam`, `oficiom`, `descripcionm`, `generom`, `colorm`, `cual`, `foto1m`, `foto2m`, `foto3m`, `created_atm`, `updated_atm`, `estadom`) VALUES
(38, 28, 13, 'rocky', '2', '2', '1', 'Perro de busqueda y rescate', 'Muy juicioso', 'MACHO', 'Negro', NULL, '561127.jpeg', '117676.jpeg', '953399.jpeg', '2018-08-20 04:24:22', '2018-08-20 04:24:22', 'Vivo'),
(39, 28, 21, 'shaira', '2', '0', '0', 'Perro de hogar', 'loca loca loca', 'HEMBRA', 'Mixto', 'cafe con negro', '97626.jpeg', '408569.jpeg', '223297.jpeg', '2018-09-04 04:26:14', '2018-09-04 04:26:14', 'Vivo'),
(40, 28, 16, 'lula', '10', '2', '6', 'Perro guia', 'amorosa', 'HEMBRA', 'Blanco', NULL, '572021.jpeg', '852081.jpeg', '612976.jpeg', '2018-09-04 05:10:17', '2018-09-04 05:10:17', 'Vivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `radicados`
--

CREATE TABLE `radicados` (
  `id` int(11) NOT NULL,
  `mascota_id` int(11) DEFAULT NULL,
  `archivo1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `archivo2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `archivo3` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_atradi` datetime NOT NULL,
  `updated_atradi` datetime NOT NULL,
  `estado` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `radicados`
--

INSERT INTO `radicados` (`id`, `mascota_id`, `archivo1`, `archivo2`, `archivo3`, `created_atradi`, `updated_atradi`, `estado`) VALUES
(42, 38, '162354.jpeg', '948272.png', '847839.png', '2018-08-20 15:22:44', '2018-08-22 05:26:20', 'Aprobado'),
(43, 38, '179291.png', '997558.png', '360626.png', '2018-08-20 22:29:43', '2018-08-22 04:21:16', 'Aprobado'),
(44, 38, '363953.jpeg', '453827.png', '859497.png', '2018-08-22 04:45:05', '2018-08-22 05:23:53', 'Radicado'),
(45, 38, '40863.jpeg', '783935.png', '450714.png', '2018-08-22 05:15:52', '2018-08-22 05:15:52', 'Radicado'),
(46, 39, '513000.png', NULL, '887542.pdf', '2018-09-04 04:36:27', '2018-09-04 05:06:21', 'Aprobado'),
(47, 40, '97382.jpeg', NULL, '506958.jpeg', '2018-09-04 05:11:02', '2018-09-04 05:23:50', 'Rechazado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `id` int(11) NOT NULL,
  `dtalleraza` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`id`, `dtalleraza`) VALUES
(12, 'Akita Inu'),
(13, 'Doberman'),
(14, 'Dogo Argentino'),
(15, 'Fila braseileiro'),
(16, 'Rottweiler'),
(17, 'American Starffordshire Terrier'),
(18, 'Staffordshire bull terrier'),
(19, 'Pit bull terrier'),
(20, 'Dogo de Burdeos'),
(21, 'Bullmastiff'),
(22, 'Mastin Napolitano'),
(23, 'Bull Terrier'),
(24, 'American Pit Bull Terrier'),
(25, 'Tosa Japones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `identificacion` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `nombres` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `apellidos` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `correo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ocupacion` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `contrasena` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` enum('ROLE_JEFE_DEPARTAMENTO','ROLE_COORDINADOR','ROLE_ZOOTECNISTA','ROLE_PROPIETARIO') COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `direccion` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `barrio` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `foto` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imgcedula` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `identificacion`, `nombres`, `apellidos`, `correo`, `telefono`, `ocupacion`, `contrasena`, `role`, `is_active`, `created_at`, `updated_at`, `direccion`, `barrio`, `foto`, `imgcedula`) VALUES
(28, 'deisy', '1059494394', 'Deisy Ximena', 'Villalba Vera', 'deisyximenavv@gmail.com', '3183518312', 'Estudiante', '$2y$12$SJeQjPUCDncD6KPpg5se8u3nH3NcHfXlBMih4H.4O1a2IviDokidi', 'ROLE_PROPIETARIO', 1, '2018-07-21 00:39:07', '2018-07-21 00:39:07', 'Manzana a Casa 21', 'Villa kennedy', '142762.png', '593964.jpeg'),
(29, 'pedro', '79569493', 'Pedro Jose', 'Jimenez Bohorquez', 'proyectopepper@gmail.com', '3124598734', 'Director', '$2y$12$oP9QPtQiWuJ.syE6rR0KrOJ8cO8QBw0KAbYs8noYjf8YZaRqYYLy6', 'ROLE_JEFE_DEPARTAMENTO', 1, '2018-07-21 00:51:04', '2018-07-21 00:51:04', 'Calle 18 N 34-23', 'Acacias', '384400.jpeg', NULL),
(30, 'carlos', '78959493', 'Carlos Arturo', 'Gomez Pardo', 'proyectopepper@gmail.com', '3124506703', 'Docente', '$2y$12$wTi7wn3Qo3qNpOfcGahpreJor8TCwK31HEcXerkUx2BL9K8xwVjay', 'ROLE_COORDINADOR', 1, '2018-07-21 00:55:30', '2018-07-21 00:55:30', 'Carrera 12 N 45-43', 'Algarrobos etapa 4', '963775.jpeg', NULL),
(31, 'daniela', '1050695853', 'Daniela', 'Escobar', 'proyectopepper@gmail.com', '3112345698', 'Estudiante', '$2y$12$LJUgGr0apPaRXTn7ydGcLu3a76HtUPAeSRAFqNp5nKIYneF8mRLlq', 'ROLE_ZOOTECNISTA', 1, '2018-07-21 00:59:50', '2018-07-21 00:59:50', 'Manzana 2 Casa 5', 'Bavaria', '100159.jpeg', NULL),
(32, 'jorge', '1056945932', 'Jorge Andres', 'Cepeda Sepulveda', 'jorgeandres1@gmail.com', '3204569342', 'Estudiante', '$2y$12$uDVntH12CDB6icVeeP3D9O/EyqtCc9byUVN/dNjIiWVbIP/KcUXi2', 'ROLE_PROPIETARIO', 1, '2018-07-21 06:14:58', '2018-07-21 06:14:58', 'Calle 20 N 34-34', 'Aguablanca', '640289.jpeg', '465149.jpeg'),
(33, 'nelca', '1100315690', 'Nelson Camilo', 'Urruega', 'nelson1992@gmail.com', '3209874340', 'patrullero', '$2y$12$qYfngMWGJ/PeJiHccSo3IewhSZawdQlMVs/6lMWA.0H7yQmPj9y3S', 'ROLE_PROPIETARIO', 1, '2018-08-10 17:45:31', '2018-08-10 17:45:31', 'Calle 10 N°25A-14', 'Alicante', '644287.jpeg', NULL),
(34, 'fabito', '1100310690', 'Fabian Camilo', 'linares', 'fabitoli@gmail.com', '3125612234', 'guarda de seguridad', '$2y$12$Wn5z3QgsWIQdASS2D9W9bu/KhCIP8rHm8VOZSw9QZ0efogW97pK5e', 'ROLE_PROPIETARIO', 1, '2018-08-10 18:16:50', '2018-08-10 18:16:50', 'Calle 10 N°25A-14', 'Aguablanca', '177460.jpeg', '235474.jpeg'),
(35, 'jt', '1098765333', 'jorge Antonio', 'beltran vera', 'jorgito123@gmail.com', '8331122', 'Estudiante', '$2y$12$26OpnhvEwLWgYZ84sCORWuGCtrogex.Um4B8.N7Qu0vbzs/bPly3y', 'ROLE_PROPIETARIO', 1, '2018-08-10 18:38:25', '2018-08-10 18:38:25', 'Manzana a Casa 2134', 'Alcatraz', '107300.jpeg', '634918.jpeg'),
(36, 'majo', '1110087767', 'maria jose', 'conde marin', 'mariconde@gmail.com', '3003409333', 'docente', '$2y$12$OaQEqkUT0qZ2nMA5aKO.yeHdDuenW.DMZ9K55GGZVPsmxzW4aG/VC', 'ROLE_PROPIETARIO', 1, '2018-08-10 19:59:28', '2018-08-10 19:59:28', 'calle 20 N 12A-234', 'Alto del rosario', '216034.jpeg', '690063.jpeg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `ataques`
--
ALTER TABLE `ataques`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `checklists`
--
ALTER TABLE `checklists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_B0839B3FDB38439E` (`usuario_id`),
  ADD KEY `IDX_B0839B3FD2C6FED5` (`radicado_id`),
  ADD KEY `checklists_usuarios_FK` (`usuario1c_id`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D57E02198CCBB6A9` (`raza_id`),
  ADD KEY `FK_D57E0219DB38439E` (`usuario_id`);

--
-- Indices de la tabla `radicados`
--
ALTER TABLE `radicados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_4DA0C055FB60C59E` (`mascota_id`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `ataques`
--
ALTER TABLE `ataques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `checklists`
--
ALTER TABLE `checklists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT de la tabla `radicados`
--
ALTER TABLE `radicados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `checklists`
--
ALTER TABLE `checklists`
  ADD CONSTRAINT `FK_B0839B3FD2C6FED5` FOREIGN KEY (`radicado_id`) REFERENCES `radicados` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_B0839B3FDB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `checklists_usuarios_FK` FOREIGN KEY (`usuario1c_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `FK_D57E02198CCBB6A9` FOREIGN KEY (`raza_id`) REFERENCES `razas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_D57E0219DB38439E` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `radicados`
--
ALTER TABLE `radicados`
  ADD CONSTRAINT `FK_4DA0C055FB60C59E` FOREIGN KEY (`mascota_id`) REFERENCES `mascotas` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
