-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-03-2014 a las 17:52:14
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `monitor corporativo s_l`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devices`
--

CREATE TABLE IF NOT EXISTS `devices` (
  `de_id` int(11) NOT NULL,
  `de_us_id` int(11) NOT NULL,
  `de_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `lo_fecha` datetime NOT NULL,
  `lo_tp_id` int(11) NOT NULL,
  `lo_us_id` int(11) NOT NULL,
  `lo_de_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `targetpoint`
--

CREATE TABLE IF NOT EXISTS `targetpoint` (
  `tp_id` int(11) NOT NULL,
  `tp_url` varchar(1024) NOT NULL,
  `tp_type` int(11) NOT NULL,
  `tp_status` int(11) NOT NULL,
  `tp_last_request` datetime NOT NULL,
  `tp_last_result` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `us_id` varchar(128) NOT NULL,
  `us_f_name` varchar(512) NOT NULL,
  `us_s_name` varchar(512) NOT NULL,
  `us_f_lname` varchar(512) NOT NULL,
  `us_s_lname` varchar(512) NOT NULL,
  `us_type` int(11) NOT NULL,
  `us_pass` varchar(1024) NOT NULL,
  `us_status` int(11) NOT NULL,
  `tp_id` int(11) NOT NULL,
  `us_email` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
