-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-08-2023 a las 06:41:44
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `trijoli_v2`
--
create database trijoli_v2;

USE trijoli_v2;

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarArticulo` (IN `p_ID_ARTICULO` INT, IN `p_NOMBRE` VARCHAR(30), IN `p_ESTADO_ACTIVIDAD` VARCHAR(30), IN `p_TIPO_ARTICULO` VARCHAR(30), IN `p_ESTADO_CALIDAD` VARCHAR(30), IN `p_ID_EMPLEADO_FK_ARTICULO` INT)   BEGIN
    UPDATE ARTICULO
    SET NOMBRE = p_NOMBRE,
        ESTADO_ACTIVIDAD = p_ESTADO_ACTIVIDAD,
        TIPO_ARTICULO = p_TIPO_ARTICULO,
        ESTADO_CALIDAD = p_ESTADO_CALIDAD,
        ID_EMPLEADO_FK_ARTICULO = p_ID_EMPLEADO_FK_ARTICULO
    WHERE ID_ARTICULO = p_ID_ARTICULO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarDestino` (IN `p_ID_ENTREGA` INT, IN `p_FECHA_ENTREGA` DATE, IN `p_ARTICULO_ENTREGADO` VARCHAR(30))   BEGIN
    UPDATE DESTINO
    SET FECHA_ENTREGA = p_FECHA_ENTREGA,
        ARTICULO_ENTREGADO = p_ARTICULO_ENTREGADO
    WHERE ID_ENTREGA = p_ID_ENTREGA;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarDetalleDonacion` (IN `p_ID_ARTICULO_FK` INT, IN `p_ID_DONANTE_FK` INT, IN `p_CANTIDAD` INT, IN `p_FECHA_ENTRADA` DATE, IN `p_DESCRIPCION` VARCHAR(100))   BEGIN
    UPDATE DETALLE_DONACION
    SET ID_ARTICULO_FK = p_ID_ARTICULO_FK,
        ID_DONANTE_FK = p_ID_DONANTE_FK,
        CANTIDAD = p_CANTIDAD,
        FECHA_ENTRADA = p_FECHA_ENTRADA,
        DESCRIPCION = p_DESCRIPCION
    WHERE ID_ARTICULO_FK = p_ID_ARTICULO_FK AND ID_DONANTE_FK = p_ID_DONANTE_FK;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarDetalleEntrega` (IN `p_ID_ARTICULOFK` INT, IN `p_ID_ENTREGA_FK` INT, IN `p_CANTIDAD` INT, IN `p_DESCRIPCION` VARCHAR(100))   BEGIN
    UPDATE DETALLE_ENTREGA
    SET ID_ENTREGA_FK = p_ID_ENTREGA_FK,
        CANTIDAD = p_CANTIDAD,
        DESCRIPCION = p_DESCRIPCION
    WHERE ID_ARTICULOFK = p_ID_ARTICULOFK AND ID_ENTREGA_FK = p_ID_ENTREGA_FK;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarDetalleEvento` (IN `p_idarticulo_fk` INT, IN `p_id_evento_fk` INT, IN `p_ropa_evento` BOOLEAN, IN `p_cantidad_ropa` INT, IN `p_comida_evento` BOOLEAN, IN `p_cantidad_comida` INT, IN `p_tipo_comida` VARCHAR(30), IN `p_descripcion` VARCHAR(100))   BEGIN
    UPDATE DETALLE_EVENTO
    SET ROPA_EVENTO = p_ropa_evento, CANTIDAD_ROPA = p_cantidad_ropa, COMIDA_EVENTO = p_comida_evento,
        CANTIDAD_COMIDA = p_cantidad_comida, TIPO_COMIDA = p_tipo_comida, DESCRIPCION = p_descripcion
    WHERE IDARTICULO_FK = p_idarticulo_fk AND ID_EVENTO_FK = p_id_evento_fk;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarDonante` (IN `p_ID_DONANTE` INT, IN `p_NOMBRE` VARCHAR(50), IN `p_CORREO` VARCHAR(50), IN `p_ESTADO_D` VARCHAR(30))   BEGIN
    UPDATE DONANTE
    SET NOMBRE = p_NOMBRE,
        CORREO = p_CORREO,
        ESTADO_D = p_ESTADO_D
    WHERE ID_DONANTE = p_ID_DONANTE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarEmpleado` (IN `p_ID_EMPLEADO` INT, IN `p_NOMBRE` VARCHAR(30), IN `p_CARGO` VARCHAR(30), IN `p_ESTADO_E` VARCHAR(30))   BEGIN
    UPDATE EMPLEADO
    SET NOMBRE = p_NOMBRE,
        CARGO = p_CARGO,
        ESTADO_E = p_ESTADO_E
    WHERE ID_EMPLEADO = p_ID_EMPLEADO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarEvento` (IN `p_id_evento` INT, IN `p_ubicacion` VARCHAR(30), IN `p_fecha_evento` DATE, IN `p_id_patrocinador_fk_evento` INT)   BEGIN
    UPDATE EVENTO
    SET UBICACION = p_ubicacion, FECHA_EVENTO = p_fecha_evento, ID_PATROCINADOR_FK_EVENTO = p_id_patrocinador_fk_evento
    WHERE ID_EVENTO = p_id_evento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarPatrocinador` (IN `p_id_patrocinador` INT, IN `p_nombre_patrocinador` VARCHAR(30), IN `p_telefono_patrocinador` INT)   BEGIN
    UPDATE PATROCINADOR
    SET NOMBRE_PATROCINADOR = p_nombre_patrocinador, TELEFONO_PATROCINADOR = p_telefono_patrocinador
    WHERE ID_PATROCINADOR = p_id_patrocinador;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarArticulo` ()   BEGIN
    SELECT * FROM ARTICULO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDestino` ()   BEGIN
    SELECT * FROM DESTINO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDetalleDonacion` ()   BEGIN
    SELECT * FROM DETALLE_DONACION;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDetalleEntrega` ()   BEGIN
    SELECT * FROM DETALLE_ENTREGA;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDetallesEvento` ()   BEGIN
    SELECT * FROM DETALLE_EVENTO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDonante` ()   BEGIN
    SELECT * FROM DONANTE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEmpleado` ()   BEGIN
    SELECT * FROM EMPLEADO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEventos` ()   BEGIN
    SELECT * FROM EVENTO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPatrocinadores` ()   BEGIN
    SELECT * FROM PATROCINADOR;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarUsuario` ()   BEGIN
    SELECT * FROM USUARIO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarArticulo` (IN `p_ID_ARTICULO` INT)   BEGIN
    DELETE FROM ARTICULO
    WHERE ID_ARTICULO = p_ID_ARTICULO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarDestino` (IN `p_ID_ENTREGA` INT)   BEGIN
    DELETE FROM DESTINO
    WHERE ID_ENTREGA = p_ID_ENTREGA;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarDetalleDonacion` (IN `p_ID_ARTICULO_FK` INT, IN `p_ID_DONANTE_FK` INT)   BEGIN
    DELETE FROM DETALLE_DONACION
    WHERE ID_ARTICULO_FK = p_ID_ARTICULO_FK AND ID_DONANTE_FK = p_ID_DONANTE_FK;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarDetalleEntrega` (IN `p_ID_ARTICULOFK` INT, IN `p_ID_ENTREGA_FK` INT)   BEGIN
    DELETE FROM DETALLE_ENTREGA
    WHERE ID_ARTICULOFK = p_ID_ARTICULOFK AND ID_ENTREGA_FK = p_ID_ENTREGA_FK;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarDetalleEvento` (IN `p_idarticulo_fk` INT, IN `p_id_evento_fk` INT)   BEGIN
    DELETE FROM DETALLE_EVENTO
    WHERE IDARTICULO_FK = p_idarticulo_fk AND ID_EVENTO_FK = p_id_evento_fk;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarDonante` (IN `p_ID_DONANTE` INT)   BEGIN
    DELETE FROM DONANTE
    WHERE ID_DONANTE = p_ID_DONANTE;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarEmpleado` (IN `p_ID_EMPLEADO` INT)   BEGIN
    DELETE FROM EMPLEADO
    WHERE ID_EMPLEADO = p_ID_EMPLEADO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarEvento` (IN `p_id_evento` INT)   BEGIN
    DELETE FROM EVENTO
    WHERE ID_EVENTO = p_id_evento;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarPatrocinador` (IN `p_id_patrocinador` INT)   BEGIN
    DELETE FROM PATROCINADOR
    WHERE ID_PATROCINADOR = p_id_patrocinador;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `EliminarUsuario` (IN `p_NOMBRE_USUARIO` VARCHAR(30))   BEGIN
    DELETE FROM USUARIO
    WHERE NOMBRE_USUARIO = p_NOMBRE_USUARIO;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarArticulo` (IN `p_ID_ARTICULO` INT, IN `p_NOMBRE` VARCHAR(30), IN `p_ESTADO_ACTIVIDAD` VARCHAR(30), IN `p_TIPO_ARTICULO` VARCHAR(30), IN `p_ESTADO_CALIDAD` VARCHAR(30), IN `p_ID_EMPLEADO_FK_ARTICULO` INT)   BEGIN
    INSERT INTO ARTICULO (ID_ARTICULO, NOMBRE, ESTADO_ACTIVIDAD, TIPO_ARTICULO, ESTADO_CALIDAD, ID_EMPLEADO_FK_ARTICULO)
    VALUES (p_ID_ARTICULO, p_NOMBRE, p_ESTADO_ACTIVIDAD, p_TIPO_ARTICULO, p_ESTADO_CALIDAD, p_ID_EMPLEADO_FK_ARTICULO);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarDestino` (IN `p_ID_ENTREGA` INT, IN `p_FECHA_ENTREGA` DATE, IN `p_ARTICULO_ENTREGADO` VARCHAR(30))   BEGIN
    INSERT INTO DESTINO (ID_ENTREGA, FECHA_ENTREGA, ARTICULO_ENTREGADO)
    VALUES (p_ID_ENTREGA, p_FECHA_ENTREGA, p_ARTICULO_ENTREGADO);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarDetalleDonacion` (IN `p_ID_ARTICULO_FK` INT, IN `p_ID_DONANTE_FK` INT, IN `p_CANTIDAD` INT, IN `p_FECHA_ENTRADA` DATE, IN `p_DESCRIPCION` VARCHAR(100))   BEGIN
    INSERT INTO DETALLE_DONACION (ID_ARTICULO_FK, ID_DONANTE_FK, CANTIDAD, FECHA_ENTRADA, DESCRIPCION)
    VALUES (p_ID_ARTICULO_FK, p_ID_DONANTE_FK, p_CANTIDAD, p_FECHA_ENTRADA, p_DESCRIPCION);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarDetalleEntrega` (IN `p_ID_ARTICULOFK` INT, IN `p_ID_ENTREGA_FK` INT, IN `p_CANTIDAD` INT, IN `p_DESCRIPCION` VARCHAR(100))   BEGIN
    INSERT INTO DETALLE_ENTREGA (ID_ARTICULOFK, ID_ENTREGA_FK, CANTIDAD, DESCRIPCION)
    VALUES (p_ID_ARTICULOFK, p_ID_ENTREGA_FK, p_CANTIDAD, p_DESCRIPCION);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarDetalleEvento` (IN `p_idarticulo_fk` INT, IN `p_id_evento_fk` INT, IN `p_ropa_evento` BOOLEAN, IN `p_cantidad_ropa` INT, IN `p_comida_evento` BOOLEAN, IN `p_cantidad_comida` INT, IN `p_tipo_comida` VARCHAR(30), IN `p_descripcion` VARCHAR(100))   BEGIN
    INSERT INTO DETALLE_EVENTO (IDARTICULO_FK, ID_EVENTO_FK, ROPA_EVENTO, CANTIDAD_ROPA, COMIDA_EVENTO, CANTIDAD_COMIDA, TIPO_COMIDA, DESCRIPCION)
    VALUES (p_idarticulo_fk, p_id_evento_fk, p_ropa_evento, p_cantidad_ropa, p_comida_evento, p_cantidad_comida, p_tipo_comida, p_descripcion);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarDonante` (IN `p_ID_DONANTE` INT, IN `p_NOMBRE` VARCHAR(50), IN `p_CORREO` VARCHAR(50), IN `p_ESTADO_D` VARCHAR(30))   BEGIN
    INSERT INTO DONANTE (ID_DONANTE, NOMBRE, CORREO, ESTADO_D)
    VALUES (p_ID_DONANTE, p_NOMBRE, p_CORREO, p_ESTADO_D);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarEmpleado` (IN `p_ID_EMPLEADO` INT, IN `p_NOMBRE` VARCHAR(30), IN `p_CARGO` VARCHAR(30), IN `p_ESTADO_E` VARCHAR(30))   BEGIN
    INSERT INTO EMPLEADO (ID_EMPLEADO, NOMBRE, CARGO, ESTADO_E)
    VALUES (p_ID_EMPLEADO, p_NOMBRE, p_CARGO, p_ESTADO_E);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarEvento` (IN `p_ubicacion` VARCHAR(30), IN `p_fecha_evento` DATE, IN `p_id_patrocinador_fk_evento` INT)   BEGIN
    INSERT INTO EVENTO (UBICACION, FECHA_EVENTO, ID_PATROCINADOR_FK_EVENTO)
    VALUES (p_ubicacion, p_fecha_evento, p_id_patrocinador_fk_evento);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarPatrocinador` (IN `p_nombre_patrocinador` VARCHAR(30), IN `p_telefono_patrocinador` INT)   BEGIN
    INSERT INTO PATROCINADOR (NOMBRE_PATROCINADOR, TELEFONO_PATROCINADOR)
    VALUES (p_nombre_patrocinador, p_telefono_patrocinador);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `InsertarUsuario` (IN `p_NOMBRE_USUARIO` VARCHAR(30), IN `p_CONTRA` VARCHAR(30), IN `p_ESTADO_U` VARCHAR(30), IN `p_ID_EMPLEADO_FK_USUARIO` INT)   BEGIN
    INSERT INTO USUARIO (NOMBRE_USUARIO, CONTRA, ESTADO_U, ID_EMPLEADO_FK_USUARIO)
    VALUES (p_NOMBRE_USUARIO, p_CONTRA, p_ESTADO_U, p_ID_EMPLEADO_FK_USUARIO);
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `ID_ARTICULO` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `ESTADO_ACTIVIDAD` varchar(30) NOT NULL,
  `TIPO_ARTICULO` varchar(30) NOT NULL,
  `ESTADO_CALIDAD` varchar(30) NOT NULL,
  `ID_EMPLEADO_FK_ARTICULO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`ID_ARTICULO`, `NOMBRE`, `ESTADO_ACTIVIDAD`, `TIPO_ARTICULO`, `ESTADO_CALIDAD`, `ID_EMPLEADO_FK_ARTICULO`) VALUES
(15, 'Camisa', 'disponible', 'ropa', 'buen_estado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destino`
--

CREATE TABLE `destino` (
  `ID_ENTREGA` int(11) NOT NULL,
  `FECHA_ENTREGA` date NOT NULL,
  `ARTICULO_ENTREGADO` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_donacion`
--

CREATE TABLE `detalle_donacion` (
  `ID_ARTICULO_FK` int(11) NOT NULL,
  `ID_DONANTE_FK` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `FECHA_ENTRADA` date NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_donacion`
--

INSERT INTO `detalle_donacion` (`ID_ARTICULO_FK`, `ID_DONANTE_FK`, `CANTIDAD`, `FECHA_ENTRADA`, `DESCRIPCION`) VALUES
(15, 25, 0, '0000-00-00', 'Camisa Roja en Buen estado Talla L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_entrega`
--

CREATE TABLE `detalle_entrega` (
  `ID_ARTICULOFK` int(11) NOT NULL,
  `ID_ENTREGA_FK` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_evento`
--

CREATE TABLE `detalle_evento` (
  `IDARTICULO_FK` int(11) NOT NULL,
  `ID_EVENTO_FK` int(11) NOT NULL,
  `ROPA_EVENTO` tinyint(1) NOT NULL,
  `CANTIDAD_ROPA` int(11) DEFAULT NULL,
  `COMIDA_EVENTO` tinyint(1) NOT NULL,
  `CANTIDAD_COMIDA` int(11) DEFAULT NULL,
  `TIPO_COMIDA` varchar(30) DEFAULT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_evento`
--

INSERT INTO `detalle_evento` (`IDARTICULO_FK`, `ID_EVENTO_FK`, `ROPA_EVENTO`, `CANTIDAD_ROPA`, `COMIDA_EVENTO`, `CANTIDAD_COMIDA`, `TIPO_COMIDA`, `DESCRIPCION`) VALUES
(15, 5, 0, NULL, 0, NULL, NULL, 'Camisa Roja');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donante`
--

CREATE TABLE `donante` (
  `ID_DONANTE` int(11) NOT NULL,
  `NOMBRE` varchar(50) NOT NULL,
  `CORREO` varchar(50) NOT NULL,
  `ESTADO_D` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `donante`
--

INSERT INTO `donante` (`ID_DONANTE`, `NOMBRE`, `CORREO`, `ESTADO_D`) VALUES
(1, 'Edgar', 'Edgar@gmail.com', 'Activo'),
(25, 'Pablo', 'Pablo@gmail.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ID_EMPLEADO` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `CARGO` varchar(30) NOT NULL,
  `ESTADO_E` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ID_EMPLEADO`, `NOMBRE`, `CARGO`, `ESTADO_E`) VALUES
(1, 'Manuel', 'Scrum', 'Activo'),
(2, 'Emmanuel', 'Directivo', 'activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `ID_EVENTO` int(11) NOT NULL,
  `UBICACION` varchar(30) NOT NULL,
  `FECHA_EVENTO` date NOT NULL,
  `ID_PATROCINADOR_FK_EVENTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`ID_EVENTO`, `UBICACION`, `FECHA_EVENTO`, `ID_PATROCINADOR_FK_EVENTO`) VALUES
(5, 'Cra110', '2023-08-24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrocinador`
--

CREATE TABLE `patrocinador` (
  `ID_PATROCINADOR` int(11) NOT NULL,
  `NOMBRE_PATROCINADOR` varchar(30) NOT NULL,
  `TELEFONO_PATROCINADOR` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `patrocinador`
--

INSERT INTO `patrocinador` (`ID_PATROCINADOR`, `NOMBRE_PATROCINADOR`, `TELEFONO_PATROCINADOR`) VALUES
(1, 'Arnold', 302345355);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `NOMBRE_USUARIO` varchar(30) NOT NULL,
  `CONTRA` varchar(30) NOT NULL,
  `ESTADO_U` varchar(30) NOT NULL,
  `ID_EMPLEADO_FK_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`NOMBRE_USUARIO`, `CONTRA`, `ESTADO_U`, `ID_EMPLEADO_FK_USUARIO`) VALUES
('Manuel', 'Juan1909', 'Activo', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`ID_ARTICULO`),
  ADD KEY `ID_EMPLEADO_FK_ARTICULO` (`ID_EMPLEADO_FK_ARTICULO`);

--
-- Indices de la tabla `destino`
--
ALTER TABLE `destino`
  ADD PRIMARY KEY (`ID_ENTREGA`);

--
-- Indices de la tabla `detalle_donacion`
--
ALTER TABLE `detalle_donacion`
  ADD KEY `ID_ARTICULO_FK` (`ID_ARTICULO_FK`),
  ADD KEY `ID_DONANTE_FK` (`ID_DONANTE_FK`);

--
-- Indices de la tabla `detalle_entrega`
--
ALTER TABLE `detalle_entrega`
  ADD KEY `ID_ARTICULOFK` (`ID_ARTICULOFK`),
  ADD KEY `ID_ENTREGA_FK` (`ID_ENTREGA_FK`);

--
-- Indices de la tabla `detalle_evento`
--
ALTER TABLE `detalle_evento`
  ADD KEY `IDARTICULO_FK` (`IDARTICULO_FK`),
  ADD KEY `ID_EVENTO_FK` (`ID_EVENTO_FK`);

--
-- Indices de la tabla `donante`
--
ALTER TABLE `donante`
  ADD PRIMARY KEY (`ID_DONANTE`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ID_EMPLEADO`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`ID_EVENTO`),
  ADD KEY `ID_PATROCINADOR_FK_EVENTO` (`ID_PATROCINADOR_FK_EVENTO`);

--
-- Indices de la tabla `patrocinador`
--
ALTER TABLE `patrocinador`
  ADD PRIMARY KEY (`ID_PATROCINADOR`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`NOMBRE_USUARIO`),
  ADD KEY `ID_EMPLEADO_FK_USUARIO` (`ID_EMPLEADO_FK_USUARIO`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `ID_ARTICULO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `destino`
--
ALTER TABLE `destino`
  MODIFY `ID_ENTREGA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `donante`
--
ALTER TABLE `donante`
  MODIFY `ID_DONANTE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `ID_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `ID_EVENTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `patrocinador`
--
ALTER TABLE `patrocinador`
  MODIFY `ID_PATROCINADOR` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD CONSTRAINT `ID_EMPLEADO_FK_ARTICULO` FOREIGN KEY (`ID_EMPLEADO_FK_ARTICULO`) REFERENCES `empleado` (`ID_EMPLEADO`);

--
-- Filtros para la tabla `detalle_donacion`
--
ALTER TABLE `detalle_donacion`
  ADD CONSTRAINT `ID_ARTICULO_FK` FOREIGN KEY (`ID_ARTICULO_FK`) REFERENCES `articulo` (`ID_ARTICULO`),
  ADD CONSTRAINT `ID_DONANTE_FK` FOREIGN KEY (`ID_DONANTE_FK`) REFERENCES `donante` (`ID_DONANTE`);

--
-- Filtros para la tabla `detalle_entrega`
--
ALTER TABLE `detalle_entrega`
  ADD CONSTRAINT `ID_ARTICULOFK` FOREIGN KEY (`ID_ARTICULOFK`) REFERENCES `articulo` (`ID_ARTICULO`),
  ADD CONSTRAINT `ID_ENTREGA_FK` FOREIGN KEY (`ID_ENTREGA_FK`) REFERENCES `destino` (`ID_ENTREGA`);

--
-- Filtros para la tabla `detalle_evento`
--
ALTER TABLE `detalle_evento`
  ADD CONSTRAINT `IDARTICULO_FK` FOREIGN KEY (`IDARTICULO_FK`) REFERENCES `articulo` (`ID_ARTICULO`),
  ADD CONSTRAINT `ID_EVENTO_FK` FOREIGN KEY (`ID_EVENTO_FK`) REFERENCES `evento` (`ID_EVENTO`);

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `ID_PATROCINADOR_FK_EVENTO` FOREIGN KEY (`ID_PATROCINADOR_FK_EVENTO`) REFERENCES `patrocinador` (`ID_PATROCINADOR`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `ID_EMPLEADO_FK_USUARIO` FOREIGN KEY (`ID_EMPLEADO_FK_USUARIO`) REFERENCES `empleado` (`ID_EMPLEADO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
