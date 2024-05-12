-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-12-2022 a las 13:54:40
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `Rol_Id` int(6) NOT NULL AUTO_INCREMENT,
  `Nombre_Rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Rol_Id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Rol_Id`, `Nombre_Rol`) VALUES
(1, 'Administrador'),
(2, 'Usuario Normal'),
(3, 'Soporte Tecnico'),
(4, 'Analista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE IF NOT EXISTS `solicitud` (
  `Id_solicitud` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `IdUsuario` int(6) NOT NULL,
  `Fecha_Entrega` date NOT NULL,
  `IdTipo_Solicitud` int(6) NOT NULL,
  `Fecha_Resolucion` date NOT NULL,
  PRIMARY KEY (`Id_solicitud`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`Id_solicitud`, `Titulo`, `Descripcion`, `IdUsuario`, `Fecha_Entrega`, `IdTipo_Solicitud`, `Fecha_Resolucion`) VALUES
(1, 'ALTA de nuevo usuario de Administración', 'ALTA de nuevo usuario de Administración', 4, '2022-12-07', 2, '2022-12-08'),
(2, 'ALTA de nuevo usuario', 'ALTA de nuevo usuario de ventas', 1, '2022-12-07', 1, '2022-12-15'),
(3, 'Alta nuevo usuario', 'Alta nuevo usuario , nuevo empleado', 2, '2022-12-09', 1, '2022-12-16'),
(4, 'Prueba alta tipo 2', 'Prueba alta tipo 2', 3, '2022-12-09', 2, '2022-12-12'),
(5, 'PRUEBA TIPO 2', 'PRUEBA TIPO 2', 2, '2022-12-09', 1, '2022-12-12'),
(6, 'PRUEBA TIPO 2', 'PRUEBA TIPO 2', 2, '2022-12-09', 2, '2022-12-16'),
(7, 'Solicitud de suministros NUEVO', 'Solicitud de suministros NUEVO', 2, '2022-12-09', 3, '2022-12-12'),
(8, 'Solicitud de suministros NUEVO', 'Solicitud de suministros NUEVO', 2, '2022-12-09', 2, '2022-12-12'),
(9, 'PRUEBA TIPO SOPORTE TECNICO', 'PRUEBA TIPO SOPORTE TECNICO', 3, '2022-12-09', 3, '2022-12-12'),
(10, 'ALTA de nuevo usuario de Administracion', 'ALTA de nuevo usuario de Administracion', 3, '2022-12-09', 1, '2022-12-12'),
(11, 'Error en impresora de la sala de computos', 'Error en impresora de la sala de computos', 5, '2022-12-09', 2, '2022-12-11'),
(12, 'PRUEBA TIPO 888', 'PRUEBA TIPO 888', 5, '2022-12-09', 3, '2022-12-16'),
(13, 'ALTA de nuevo usuario de Administracion123456', 'ALTA de nuevo usuario de Administracion123456', 5, '2022-12-09', 2, '2022-12-16'),
(14, 'ALTA de nuevo usuario de Administracion123456', 'ALTA de nuevo usuario de Administracion123456', 5, '2022-12-09', 3, '2022-12-16'),
(15, 'ALTA de nuevo usuario de Administracion123456', 'ALTA de nuevo usuario de Administracion123456', 5, '2022-12-09', 1, '2022-12-16'),
(16, 'ALTA de nuevo usuario de Administracion999999', 'ALTA de nuevo usuario de Administracion999999', 5, '2022-12-09', 1, '2022-12-16'),
(17, 'BAJA de nuevo usuario de Administracion', 'BAJA de nuevo usuario de Administracion', 5, '2022-12-09', 2, '2022-12-12'),
(18, 'ALTA de nuevo usuario tecnico', 'ALTA de nuevo usuario tecnico', 4, '2022-12-09', 1, '2022-12-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_solicitud`
--

CREATE TABLE IF NOT EXISTS `tipo_solicitud` (
  `Id_TSolicitud` int(6) NOT NULL AUTO_INCREMENT,
  `Descripcion_Tipo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Id_TSolicitud`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_solicitud`
--

INSERT INTO `tipo_solicitud` (`Id_TSolicitud`, `Descripcion_Tipo`) VALUES
(1, 'Desarrollo de nuevas funcionalidades'),
(2, 'Soporte tecnico'),
(3, 'Reporte de errores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `Id_usuario` int(6) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `Clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Rol` int(16) NOT NULL,
  `Fecha_Acceso` date NOT NULL,
  `Estado` int(15) NOT NULL,
  PRIMARY KEY (`Id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_usuario`, `Nombre`, `Apellido`, `Imagen`, `Email`, `Clave`, `Id_Rol`, `Fecha_Acceso`, `Estado`) VALUES
(1, 'Marianela ', 'Paez', 'sue.png', 'maru_87@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2022-12-06', 0),
(2, 'Santiago', 'Rodriguez', 'team-1.png', 'RodriguezS@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '2022-12-10', 1),
(3, 'Tomas', 'Rodriguez', 'team-1.png', 'RodriguezT@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 3, '2022-12-10', 1),
(4, 'Laura', 'Rodriguez', 'team-2.png', 'RodriguezL@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 4, '2022-12-09', 1),
(5, 'Cecilia', 'Lujan', 'team-3.png', 'LujanC@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '2022-12-09', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
