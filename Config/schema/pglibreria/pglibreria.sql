-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-01-2017 a las 04:14:47
-- Versión del servidor: 5.6.34
-- Versión de PHP: 5.5.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pglibreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la Tabla'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los datos de los clientes.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_sesiones`
--

DROP TABLE IF EXISTS `log_sesiones`;
CREATE TABLE IF NOT EXISTS `log_sesiones` (
  `id_sesiones` int(11) NOT NULL,
  `sesiones_us_nom` varchar(255) DEFAULT NULL,
  `sesiones_us_ha` datetime DEFAULT NULL,
  `sesiones_us_ex` datetime DEFAULT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `expirada` int(10) unsigned NOT NULL DEFAULT '9',
  `id_sucursal` int(10) unsigned NOT NULL DEFAULT '45',
  `estatus` int(10) unsigned NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_audinventario`
--

DROP TABLE IF EXISTS `tbl_audinventario`;
CREATE TABLE IF NOT EXISTS `tbl_audinventario` (
  `id_audinventario` int(10) unsigned NOT NULL,
  `cod_invent` varchar(100) NOT NULL,
  `f_inventario` datetime NOT NULL COMMENT 'Fecha de inicio de inventario',
  `responsable` varchar(50) NOT NULL COMMENT 'usuario responsable',
  `sucursal` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '6',
  `f_culminacion` datetime DEFAULT NULL,
  `correlativo` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 15360 kB';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_autor`
--

DROP TABLE IF EXISTS `tbl_autor`;
CREATE TABLE IF NOT EXISTS `tbl_autor` (
  `id_autor` int(11) NOT NULL DEFAULT '0',
  `aut_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bancos`
--

DROP TABLE IF EXISTS `tbl_bancos`;
CREATE TABLE IF NOT EXISTS `tbl_bancos` (
  `id_tbl_bancos` int(10) unsigned NOT NULL,
  `banco` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_bonolibro`
--

DROP TABLE IF EXISTS `tbl_bonolibro`;
CREATE TABLE IF NOT EXISTS `tbl_bonolibro` (
  `cod_beneficiario` int(11) DEFAULT NULL,
  `ci_beneficiario` int(11) DEFAULT NULL,
  `nom_beneficiario` varchar(60) NOT NULL,
  `num_tarjeta` varchar(30) NOT NULL,
  `saldo_inicial` double(11,11) NOT NULL,
  `saldo_actual` double(11,11) NOT NULL,
  `entidad` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_chat`
--

DROP TABLE IF EXISTS `tbl_chat`;
CREATE TABLE IF NOT EXISTS `tbl_chat` (
  `id` int(10) unsigned NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `sucursal` int(10) unsigned NOT NULL,
  `estatus` int(10) unsigned NOT NULL DEFAULT '1',
  `tipo` int(10) unsigned NOT NULL DEFAULT '1',
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `iduser` int(10) unsigned NOT NULL DEFAULT '1',
  `iduserd` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cierre`
--

DROP TABLE IF EXISTS `tbl_cierre`;
CREATE TABLE IF NOT EXISTS `tbl_cierre` (
  `id_cierrecaja` int(13) unsigned NOT NULL,
  `cod_sucursal` int(11) DEFAULT NULL,
  `total_clientes` int(11) NOT NULL DEFAULT '0',
  `total_ejemplares` int(11) NOT NULL DEFAULT '0',
  `total_credito` double NOT NULL DEFAULT '0',
  `total_debito` double NOT NULL DEFAULT '0',
  `total_efectivo` double NOT NULL DEFAULT '0',
  `total_bonolibro` double NOT NULL DEFAULT '0',
  `cant_cheques` int(11) NOT NULL DEFAULT '0',
  `total_cheques` double NOT NULL DEFAULT '0',
  `total_descuentos` double NOT NULL DEFAULT '0',
  `total_especiales` double NOT NULL DEFAULT '0',
  `total_cestatikets` double NOT NULL DEFAULT '0',
  `total_omoneda` double NOT NULL DEFAULT '0',
  `factura_inicial` varchar(60) NOT NULL DEFAULT '0',
  `factura_final` varchar(60) NOT NULL DEFAULT '0',
  `tipo_cierre` int(11) NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '0',
  `cerrado_por` int(11) NOT NULL DEFAULT '0',
  `fecha_cierre` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cierremes`
--

DROP TABLE IF EXISTS `tbl_cierremes`;
CREATE TABLE IF NOT EXISTS `tbl_cierremes` (
  `id` int(10) unsigned NOT NULL,
  `mes` int(10) unsigned NOT NULL DEFAULT '0',
  `anio` int(11) DEFAULT NULL,
  `estatus` int(10) unsigned NOT NULL DEFAULT '6',
  `fecha_cierre` datetime DEFAULT NULL,
  `cerrado_por` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cliente`
--

DROP TABLE IF EXISTS `tbl_cliente`;
CREATE TABLE IF NOT EXISTS `tbl_cliente` (
  `id_cliente` int(11) NOT NULL,
  `cli_cedula` varchar(30) NOT NULL DEFAULT '0',
  `cli_nombre` varchar(254) NOT NULL,
  `cli_direccion` text NOT NULL,
  `cli_telefonohab` varchar(13) NOT NULL DEFAULT '0',
  `cli_celular` varchar(13) NOT NULL DEFAULT '0',
  `cli_bonolibro` int(11) NOT NULL DEFAULT '0',
  `cli_correo` varchar(60) NOT NULL DEFAULT 'usuario@dominio.ext',
  `cli_tarjetabl` varchar(30) NOT NULL DEFAULT '0',
  `cli_empresa` varchar(254) NOT NULL DEFAULT 'Ninguna',
  `cli_sexo` char(1) DEFAULT NULL,
  `fecha_inclusion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_codigos`
--

DROP TABLE IF EXISTS `tbl_codigos`;
CREATE TABLE IF NOT EXISTS `tbl_codigos` (
  `id` int(10) unsigned NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `cantidad` int(10) unsigned NOT NULL DEFAULT '0',
  `precio` double unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_coleccion`
--

DROP TABLE IF EXISTS `tbl_coleccion`;
CREATE TABLE IF NOT EXISTS `tbl_coleccion` (
  `id_coleccion` int(11) NOT NULL,
  `col_descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_condicion`
--

DROP TABLE IF EXISTS `tbl_condicion`;
CREATE TABLE IF NOT EXISTS `tbl_condicion` (
  `id_condicion` int(10) unsigned NOT NULL,
  `cond_descripcion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_descuento`
--

DROP TABLE IF EXISTS `tbl_descuento`;
CREATE TABLE IF NOT EXISTS `tbl_descuento` (
  `id_descuento` int(10) unsigned NOT NULL,
  `des_porcentaje` float NOT NULL,
  `porcentaje` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_detalleinventario`
--

DROP TABLE IF EXISTS `tbl_detalleinventario`;
CREATE TABLE IF NOT EXISTS `tbl_detalleinventario` (
  `id` int(10) unsigned NOT NULL,
  `cod_invent` varchar(100) NOT NULL DEFAULT '',
  `cod_producto` varchar(100) NOT NULL DEFAULT '',
  `sucursal` int(10) unsigned NOT NULL DEFAULT '0',
  `condicion` int(10) unsigned NOT NULL DEFAULT '0',
  `cant_sist` int(10) unsigned NOT NULL DEFAULT '0',
  `cant_fisc` int(10) unsigned NOT NULL DEFAULT '0',
  `estatus` int(10) unsigned NOT NULL DEFAULT '6'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_devolucioncliente`
--

DROP TABLE IF EXISTS `tbl_devolucioncliente`;
CREATE TABLE IF NOT EXISTS `tbl_devolucioncliente` (
  `id` int(11) NOT NULL,
  `cod_cliente` int(11) DEFAULT NULL,
  `cod_factura` varchar(30) NOT NULL,
  `sucursal` int(11) NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `procesadopor` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_devolucionlibreria`
--

DROP TABLE IF EXISTS `tbl_devolucionlibreria`;
CREATE TABLE IF NOT EXISTS `tbl_devolucionlibreria` (
  `id_devolucion` int(11) NOT NULL,
  `cod_dev` varchar(100) NOT NULL,
  `sucursal` int(11) NOT NULL,
  `responsable` int(11) NOT NULL COMMENT 'Usuario creador',
  `f_inclusion` date NOT NULL COMMENT 'Fecha de creacion',
  `estatus` int(11) NOT NULL COMMENT 'Estatus (pendiente,procesado)',
  `_modificacion` date NOT NULL COMMENT 'Fecha de modificacion',
  `mod_por` int(11) NOT NULL COMMENT 'Usuario modificador',
  `tld` int(11) NOT NULL COMMENT 'Total libros devueltos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_distinventario`
--

DROP TABLE IF EXISTS `tbl_distinventario`;
CREATE TABLE IF NOT EXISTS `tbl_distinventario` (
  `cod_producto` varchar(100) NOT NULL,
  `descripcion` varchar(254) DEFAULT NULL,
  `autor` varchar(254) DEFAULT NULL,
  `isbn` varchar(130) DEFAULT NULL,
  `cod_barra` varchar(130) DEFAULT NULL,
  `sucursal` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000',
  `condicion` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000',
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `descuento` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_edicion`
--

DROP TABLE IF EXISTS `tbl_edicion`;
CREATE TABLE IF NOT EXISTS `tbl_edicion` (
  `edicion_id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_editorial`
--

DROP TABLE IF EXISTS `tbl_editorial`;
CREATE TABLE IF NOT EXISTS `tbl_editorial` (
  `id_editorial` int(10) unsigned NOT NULL,
  `editorial` varchar(250) NOT NULL,
  `contacto` varchar(254) NOT NULL DEFAULT 'S/N',
  `direccion` text,
  `pag_web` varchar(254) NOT NULL DEFAULT 'S/PW',
  `correo` varchar(254) NOT NULL DEFAULT 'S/C',
  `telf_oficina1` varchar(45) NOT NULL DEFAULT '0',
  `telf_oficina2` varchar(45) NOT NULL DEFAULT '0',
  `telf_fax` varchar(45) NOT NULL DEFAULT '0',
  `rif_nif` varchar(100) NOT NULL DEFAULT '0',
  `grupo` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '''Plataforma, Privados o Independiente''',
  `pais` int(10) unsigned NOT NULL DEFAULT '1',
  `origen` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '''Nacional o Extranjera'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_envios`
--

DROP TABLE IF EXISTS `tbl_envios`;
CREATE TABLE IF NOT EXISTS `tbl_envios` (
  `id` int(11) NOT NULL,
  `sucursal` int(11) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `fecha_envio` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estados`
--

DROP TABLE IF EXISTS `tbl_estados`;
CREATE TABLE IF NOT EXISTS `tbl_estados` (
  `estados_id` int(10) unsigned NOT NULL,
  `estado` varchar(254) NOT NULL,
  `region_id` int(10) unsigned NOT NULL,
  `creado_por` int(11) NOT NULL COMMENT 'Usuario Creador',
  `f_modificacion` datetime NOT NULL COMMENT 'Fecha de Modificacion',
  `modificado_por` int(11) NOT NULL COMMENT 'Usuario Modificador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estatus`
--

DROP TABLE IF EXISTS `tbl_estatus`;
CREATE TABLE IF NOT EXISTS `tbl_estatus` (
  `id_estatus` int(10) unsigned NOT NULL,
  `estatus` varchar(45) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_expofacturas`
--

DROP TABLE IF EXISTS `tbl_expofacturas`;
CREATE TABLE IF NOT EXISTS `tbl_expofacturas` (
  `cod_factura` varchar(30) NOT NULL,
  `fecha_factura` datetime DEFAULT NULL,
  `cod_cliente` int(11) NOT NULL DEFAULT '0',
  `vendedor` int(11) NOT NULL DEFAULT '0',
  `sucursal` int(11) NOT NULL DEFAULT '0',
  `efectivo` double NOT NULL DEFAULT '0',
  `cheque` double NOT NULL DEFAULT '0',
  `tdb` double NOT NULL DEFAULT '0',
  `tdc` double NOT NULL DEFAULT '0',
  `bl` double NOT NULL DEFAULT '0',
  `cesta_ticket` double NOT NULL DEFAULT '0',
  `cta_bancaria` varchar(30) NOT NULL DEFAULT '0',
  `num_cheque` varchar(30) NOT NULL DEFAULT '0',
  `banco` int(11) DEFAULT '0',
  `nro_conformacion` int(11) DEFAULT '0',
  `pago_especial` double NOT NULL DEFAULT '0',
  `otra_moneda` double NOT NULL DEFAULT '0',
  `iva` int(11) DEFAULT '0',
  `mto_iva` double NOT NULL DEFAULT '0',
  `sub_total` double NOT NULL DEFAULT '0',
  `mto_total` double NOT NULL DEFAULT '0',
  `cambio` double NOT NULL DEFAULT '0',
  `estatus_factura` int(11) NOT NULL DEFAULT '0',
  `correlativo` int(11) NOT NULL DEFAULT '0',
  `descuento` double unsigned zerofill NOT NULL DEFAULT '0000000000000000000000',
  `tipofactura` int(10) unsigned zerofill NOT NULL DEFAULT '0000000003'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_facturas`
--

DROP TABLE IF EXISTS `tbl_facturas`;
CREATE TABLE IF NOT EXISTS `tbl_facturas` (
  `cod_factura` varchar(30) NOT NULL,
  `fecha_factura` datetime NOT NULL,
  `cod_cliente` varchar(30) NOT NULL DEFAULT '0',
  `vendedor` int(11) NOT NULL DEFAULT '0',
  `sucursal` int(11) NOT NULL DEFAULT '0',
  `efectivo` double NOT NULL DEFAULT '0',
  `cheque` double NOT NULL DEFAULT '0',
  `tdb` double NOT NULL DEFAULT '0',
  `tdc` double NOT NULL DEFAULT '0',
  `bl` double NOT NULL DEFAULT '0',
  `cesta_ticket` double NOT NULL DEFAULT '0',
  `cta_bancaria` varchar(30) NOT NULL DEFAULT '0',
  `num_cheque` varchar(30) NOT NULL DEFAULT '0',
  `banco` int(11) DEFAULT '0',
  `nro_conformacion` int(11) DEFAULT '0',
  `pago_especial` double NOT NULL DEFAULT '0',
  `otra_moneda` double NOT NULL DEFAULT '0',
  `iva` int(11) DEFAULT '0',
  `mto_iva` double NOT NULL DEFAULT '0',
  `sub_total` double NOT NULL DEFAULT '0',
  `mto_total` double NOT NULL DEFAULT '0',
  `cambio` double NOT NULL DEFAULT '0',
  `estatus_factura` int(11) NOT NULL DEFAULT '0',
  `correlativo` int(11) NOT NULL DEFAULT '0',
  `descuento` double NOT NULL DEFAULT '0',
  `tipofactura` int(11) NOT NULL DEFAULT '1',
  `codfacturamanual` varchar(100) DEFAULT NULL,
  `numtalonario` varchar(254) DEFAULT NULL,
  `fec_facmanual` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_formapago`
--

DROP TABLE IF EXISTS `tbl_formapago`;
CREATE TABLE IF NOT EXISTS `tbl_formapago` (
  `id` int(10) NOT NULL,
  `formapago` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_formato`
--

DROP TABLE IF EXISTS `tbl_formato`;
CREATE TABLE IF NOT EXISTS `tbl_formato` (
  `id` int(10) unsigned NOT NULL,
  `id_letra` char(1) NOT NULL DEFAULT '',
  `descripcion` varchar(254) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_horario`
--

DROP TABLE IF EXISTS `tbl_horario`;
CREATE TABLE IF NOT EXISTS `tbl_horario` (
  `id_horario` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_inventario`
--

DROP TABLE IF EXISTS `tbl_inventario`;
CREATE TABLE IF NOT EXISTS `tbl_inventario` (
  `id_tbl_inventario` int(10) unsigned NOT NULL,
  `cod_producto` varchar(100) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `descripcion` varchar(254) CHARACTER SET utf8 NOT NULL,
  `autor` varchar(254) CHARACTER SET utf8 NOT NULL,
  `coleccion` int(11) NOT NULL DEFAULT '1',
  `editorial` int(11) NOT NULL DEFAULT '1',
  `precio` double NOT NULL DEFAULT '0',
  `isbn` varchar(130) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `descuento` float NOT NULL DEFAULT '0',
  `tema` int(11) NOT NULL DEFAULT '1',
  `subtema` int(11) NOT NULL DEFAULT '1',
  `cod_barra` varchar(130) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `proveedor` int(11) NOT NULL DEFAULT '1',
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `costo` double NOT NULL DEFAULT '0',
  `estatus` int(11) NOT NULL DEFAULT '1',
  `tomo` int(11) NOT NULL DEFAULT '11',
  `a_publicacion` int(11) NOT NULL DEFAULT '1900' COMMENT 'AÑO DE PUBLICACION DEL LIBRO',
  `f_publicacion` date NOT NULL DEFAULT '1900-01-01' COMMENT 'FECHA DE PUBLICACION DEL LIBRO',
  `n_paginas` int(11) NOT NULL DEFAULT '0' COMMENT 'NUMERO DE PAGINAS DEL LIBRO',
  `tipo` int(11) NOT NULL DEFAULT '1' COMMENT 'TIPO DE LIBRO (NACIONAL O IMPORTADO)',
  `n_edicion` int(11) NOT NULL DEFAULT '11' COMMENT 'NUMERO DE EDICION DEL LIBRO',
  `nd_legal` varchar(254) CHARACTER SET utf8 NOT NULL DEFAULT '0' COMMENT 'NUMERO DE DEPOSITO LEGAL DEL LIBRO',
  `origen` int(11) NOT NULL DEFAULT '1' COMMENT 'LUGAR DE IMPRESION DEL LIBRO',
  `formato` int(10) unsigned NOT NULL DEFAULT '1',
  `volumen` int(10) unsigned NOT NULL DEFAULT '11',
  `f_creacion` date DEFAULT NULL,
  `creado_por` int(10) unsigned DEFAULT '1',
  `f_ult_mod` datetime DEFAULT NULL COMMENT 'Fecha de ultima modificacion',
  `modificado_por` int(10) unsigned DEFAULT '1',
  `n_coleccion` int(10) unsigned DEFAULT '0',
  `iva` int(10) unsigned DEFAULT '1' COMMENT 'Iva'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_itemdevolucion`
--

DROP TABLE IF EXISTS `tbl_itemdevolucion`;
CREATE TABLE IF NOT EXISTS `tbl_itemdevolucion` (
  `id_item` int(10) unsigned NOT NULL,
  `cod_devolucion` int(11) NOT NULL,
  `cod_libro` varchar(100) NOT NULL,
  `cant_devuelta` int(11) NOT NULL DEFAULT '0',
  `sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_itemexpofactura`
--

DROP TABLE IF EXISTS `tbl_itemexpofactura`;
CREATE TABLE IF NOT EXISTS `tbl_itemexpofactura` (
  `id_itemfactura` int(11) NOT NULL,
  `cod_factura` varchar(100) NOT NULL DEFAULT '0',
  `cod_producto` varchar(100) NOT NULL DEFAULT '0' COMMENT 'Codigo Interno del Producto',
  `descripcion` varchar(200) DEFAULT NULL,
  `precio_unid` double NOT NULL DEFAULT '0',
  `cantidad` int(10) unsigned NOT NULL DEFAULT '0',
  `existencia` int(10) unsigned NOT NULL DEFAULT '0',
  `descuento` float NOT NULL DEFAULT '0',
  `estatus_cancelacion` int(11) NOT NULL DEFAULT '0',
  `sucursal` int(11) NOT NULL DEFAULT '0',
  `vendedor` int(11) NOT NULL DEFAULT '0',
  `isbn` varchar(100) NOT NULL DEFAULT '0',
  `cif` int(10) unsigned NOT NULL DEFAULT '0',
  `cic` int(10) unsigned NOT NULL DEFAULT '0',
  `cicdn` int(10) unsigned NOT NULL DEFAULT '0',
  `devuelto` int(10) unsigned NOT NULL DEFAULT '14'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_itemfactura`
--

DROP TABLE IF EXISTS `tbl_itemfactura`;
CREATE TABLE IF NOT EXISTS `tbl_itemfactura` (
  `id_itemfactura` int(11) NOT NULL,
  `cod_factura` varchar(100) NOT NULL DEFAULT '0',
  `cod_producto` varchar(100) NOT NULL DEFAULT '0' COMMENT 'Codigo Interno del Producto',
  `descripcion` varchar(254) DEFAULT NULL,
  `precio_unid` double NOT NULL DEFAULT '0',
  `cantidad` int(10) unsigned NOT NULL DEFAULT '0',
  `existencia` int(10) unsigned NOT NULL DEFAULT '0',
  `descuento` float NOT NULL DEFAULT '0',
  `estatus_cancelacion` int(11) NOT NULL DEFAULT '0',
  `sucursal` int(11) NOT NULL DEFAULT '0',
  `vendedor` int(11) NOT NULL DEFAULT '0',
  `isbn` varchar(100) DEFAULT '0',
  `cif` int(11) DEFAULT '0',
  `cic` int(11) DEFAULT '0',
  `cicdn` int(11) DEFAULT '0',
  `devuelto` int(10) unsigned NOT NULL DEFAULT '14',
  `precio_sd` double unsigned NOT NULL DEFAULT '0' COMMENT 'Precio Sin Descuento',
  `iva` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 5120 kB';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_itemsolicitud`
--

DROP TABLE IF EXISTS `tbl_itemsolicitud`;
CREATE TABLE IF NOT EXISTS `tbl_itemsolicitud` (
  `id` int(10) unsigned NOT NULL,
  `cod_sol` varchar(30) NOT NULL DEFAULT '0' COMMENT 'codigo de la solicitud de mercancia',
  `cod_libro` varchar(30) NOT NULL DEFAULT '0',
  `titulo` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `costo` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `cantdist` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_itemtraslado`
--

DROP TABLE IF EXISTS `tbl_itemtraslado`;
CREATE TABLE IF NOT EXISTS `tbl_itemtraslado` (
  `id` int(11) NOT NULL,
  `cod_t` varchar(30) NOT NULL,
  `cod_l` varchar(30) NOT NULL DEFAULT '0',
  `sucursal` int(11) NOT NULL DEFAULT '0',
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `condicion` int(11) NOT NULL DEFAULT '0',
  `titulo` varchar(254) NOT NULL,
  `autor` varchar(254) NOT NULL,
  `coleccion` varchar(100) DEFAULT '1',
  `editorial` varchar(150) NOT NULL DEFAULT '1',
  `tema` varchar(100) NOT NULL DEFAULT '1',
  `subtema` varchar(100) NOT NULL DEFAULT '1',
  `precio` double DEFAULT '0',
  `costo` double DEFAULT '0',
  `descuento` int(11) DEFAULT '0',
  `isbn` varchar(100) NOT NULL DEFAULT '0',
  `cod_barra` varchar(100) NOT NULL DEFAULT '0',
  `solicitud` varchar(60) DEFAULT '0',
  `estatus` int(11) NOT NULL DEFAULT '0',
  `idorigen` int(11) NOT NULL DEFAULT '0',
  `observacion` varchar(254) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_iva`
--

DROP TABLE IF EXISTS `tbl_iva`;
CREATE TABLE IF NOT EXISTS `tbl_iva` (
  `id_iva` int(11) NOT NULL DEFAULT '0',
  `valor` float NOT NULL DEFAULT '0',
  `porcentaje` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_libreria`
--

DROP TABLE IF EXISTS `tbl_libreria`;
CREATE TABLE IF NOT EXISTS `tbl_libreria` (
  `codigo` int(11) NOT NULL,
  `libreria` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `encargado` varchar(70) NOT NULL DEFAULT '',
  `direccion` text,
  `horario` int(10) unsigned DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mes`
--

DROP TABLE IF EXISTS `tbl_mes`;
CREATE TABLE IF NOT EXISTS `tbl_mes` (
  `id_mes` int(10) unsigned NOT NULL,
  `mes` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_minutos`
--

DROP TABLE IF EXISTS `tbl_minutos`;
CREATE TABLE IF NOT EXISTS `tbl_minutos` (
  `minutos` int(11) NOT NULL DEFAULT '0',
  `milisegundos` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_nivel`
--

DROP TABLE IF EXISTS `tbl_nivel`;
CREATE TABLE IF NOT EXISTS `tbl_nivel` (
  `id_nivel` int(10) unsigned NOT NULL,
  `nivel` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_notase`
--

DROP TABLE IF EXISTS `tbl_notase`;
CREATE TABLE IF NOT EXISTS `tbl_notase` (
  `id` int(11) NOT NULL,
  `nota` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cod_libro` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `condicion` int(11) NOT NULL,
  `sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pais`
--

DROP TABLE IF EXISTS `tbl_pais`;
CREATE TABLE IF NOT EXISTS `tbl_pais` (
  `id_pais` int(11) NOT NULL,
  `pais` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_portprint`
--

DROP TABLE IF EXISTS `tbl_portprint`;
CREATE TABLE IF NOT EXISTS `tbl_portprint` (
  `portprint_id` int(10) unsigned NOT NULL,
  `puerto` varchar(50) NOT NULL,
  `dispositivo` varchar(50) NOT NULL COMMENT 'USB o Paralelo'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_precierrecaja`
--

DROP TABLE IF EXISTS `tbl_precierrecaja`;
CREATE TABLE IF NOT EXISTS `tbl_precierrecaja` (
  `id_cierrecaja` int(13) unsigned NOT NULL,
  `cod_sucursal` int(11) NOT NULL,
  `total_clientes` int(11) NOT NULL DEFAULT '0',
  `total_ejemplares` int(11) NOT NULL DEFAULT '0',
  `total_credito` double NOT NULL DEFAULT '0',
  `total_debito` double NOT NULL DEFAULT '0',
  `total_efectivo` double NOT NULL DEFAULT '0',
  `total_bonolibro` double NOT NULL DEFAULT '0',
  `cant_cheques` int(11) NOT NULL DEFAULT '0',
  `total_cheques` double NOT NULL DEFAULT '0',
  `total_descuentos` double NOT NULL DEFAULT '0',
  `total_especiales` double NOT NULL DEFAULT '0',
  `total_cestatikets` double NOT NULL DEFAULT '0',
  `total_omoneda` double NOT NULL DEFAULT '0',
  `factura_inicial` varchar(60) DEFAULT NULL,
  `factura_final` varchar(60) DEFAULT NULL,
  `tipo_cierre` int(11) NOT NULL DEFAULT '1',
  `fecha` date DEFAULT NULL,
  `estatus` int(11) NOT NULL DEFAULT '6',
  `fecha_cierre` datetime DEFAULT NULL,
  `vendedor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_preferencias`
--

DROP TABLE IF EXISTS `tbl_preferencias`;
CREATE TABLE IF NOT EXISTS `tbl_preferencias` (
  `sucursal_id` int(10) unsigned NOT NULL COMMENT 'Sucursal',
  `ipservidor` varchar(20) NOT NULL COMMENT 'Servidor Remoto',
  `iplocal` varchar(20) NOT NULL COMMENT 'Servidor Local',
  `ptoimpresora` varchar(50) NOT NULL COMMENT 'Puerto de la Impresora',
  `tiemposincro` int(10) unsigned NOT NULL COMMENT 'tiempo de Sincronizacion',
  `version` varchar(50) NOT NULL COMMENT 'Version del Sistema Sigeslib',
  `libros_pf` int(11) NOT NULL COMMENT 'Libros por Factura',
  `libros_pfm` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Libros por Factura Manual',
  `cant_facturas` int(10) unsigned NOT NULL DEFAULT '2' COMMENT 'Cantidad de Facturas a Imprimir',
  `cant_facturasm` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Cantidad de Facturas manuales a Imprimir',
  `creada_por` int(11) DEFAULT '1',
  `f_creacion` datetime DEFAULT NULL,
  `mod_por` int(11) DEFAULT NULL,
  `f_modificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_proveedor`
--

DROP TABLE IF EXISTS `tbl_proveedor`;
CREATE TABLE IF NOT EXISTS `tbl_proveedor` (
  `id` int(10) unsigned NOT NULL,
  `proveedor` varchar(145) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `telf_oficina` varchar(15) NOT NULL DEFAULT '0',
  `telf_fax` varchar(15) NOT NULL DEFAULT '0',
  `telf_celular` varchar(15) NOT NULL DEFAULT '0',
  `direccion` varchar(250) NOT NULL,
  `tipo_proveedor` int(10) unsigned NOT NULL DEFAULT '1',
  `rif` varchar(60) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_region`
--

DROP TABLE IF EXISTS `tbl_region`;
CREATE TABLE IF NOT EXISTS `tbl_region` (
  `id_region` int(11) NOT NULL,
  `regionj` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sesiones`
--

DROP TABLE IF EXISTS `tbl_sesiones`;
CREATE TABLE IF NOT EXISTS `tbl_sesiones` (
  `id_sesiones` int(11) NOT NULL,
  `sesiones_us_nom` varchar(255) DEFAULT NULL,
  `sesiones_us_ha` datetime DEFAULT NULL,
  `sesiones_us_ex` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_sucursal` int(10) unsigned NOT NULL DEFAULT '45',
  `estatus` int(10) unsigned NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_solicitud`
--

DROP TABLE IF EXISTS `tbl_solicitud`;
CREATE TABLE IF NOT EXISTS `tbl_solicitud` (
  `id` int(10) unsigned NOT NULL,
  `codigo` varchar(45) NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `fecha_entrega` date DEFAULT NULL,
  `fecha_venc` date DEFAULT NULL,
  `fecha_vencconsig` date DEFAULT NULL,
  `proveedor` int(10) unsigned NOT NULL DEFAULT '0',
  `canttotal` int(10) unsigned NOT NULL DEFAULT '0',
  `totalcancelar` double NOT NULL DEFAULT '0',
  `condicion` int(10) unsigned NOT NULL DEFAULT '0',
  `formapago` int(10) unsigned NOT NULL DEFAULT '1',
  `incluidapor` int(10) unsigned NOT NULL DEFAULT '0',
  `estatus` int(10) unsigned NOT NULL DEFAULT '0',
  `correlativo` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_subtema`
--

DROP TABLE IF EXISTS `tbl_subtema`;
CREATE TABLE IF NOT EXISTS `tbl_subtema` (
  `id_subtema` int(11) NOT NULL,
  `id_tema` int(10) unsigned NOT NULL,
  `subtema` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sucursal`
--

DROP TABLE IF EXISTS `tbl_sucursal`;
CREATE TABLE IF NOT EXISTS `tbl_sucursal` (
  `id_sucursal` int(10) unsigned NOT NULL DEFAULT '0',
  `sucursal` varchar(100) NOT NULL DEFAULT '',
  `encargado` varchar(254) NOT NULL,
  `direccion` varchar(254) NOT NULL,
  `horario` int(11) NOT NULL DEFAULT '0',
  `telefono` varchar(60) DEFAULT '0',
  `correo` varchar(70) NOT NULL,
  `region` int(11) NOT NULL DEFAULT '1',
  `codigo_sucursal` varchar(100) DEFAULT '0',
  `clave_sucursal` varchar(30) DEFAULT '0',
  `estado` int(10) unsigned DEFAULT NULL COMMENT 'Estado de Ubicacion Geografica',
  `f_creacion` datetime DEFAULT NULL COMMENT 'Fecha de Creacion',
  `creada_por` int(10) unsigned DEFAULT '1' COMMENT 'Usuario Creador',
  `f_modificacion` datetime DEFAULT NULL COMMENT 'Fecha de Modificacion',
  `modificada_por` int(10) unsigned DEFAULT NULL COMMENT 'Usuario Modificador',
  `tipo_sucursal` int(10) unsigned DEFAULT '1' COMMENT 'Tipo de Sucursal(Feria o Libreria)',
  `estatus_id` int(10) unsigned DEFAULT '19'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tema`
--

DROP TABLE IF EXISTS `tbl_tema`;
CREATE TABLE IF NOT EXISTS `tbl_tema` (
  `id_tema` int(11) NOT NULL,
  `tema` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipocierre`
--

DROP TABLE IF EXISTS `tbl_tipocierre`;
CREATE TABLE IF NOT EXISTS `tbl_tipocierre` (
  `id_tipocierre` int(10) unsigned NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipodelibro`
--

DROP TABLE IF EXISTS `tbl_tipodelibro`;
CREATE TABLE IF NOT EXISTS `tbl_tipodelibro` (
  `id_t_libro` int(11) NOT NULL,
  `t_libro` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipofactura`
--

DROP TABLE IF EXISTS `tbl_tipofactura`;
CREATE TABLE IF NOT EXISTS `tbl_tipofactura` (
  `id` int(11) NOT NULL,
  `tipofactura` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipoproveedor`
--

DROP TABLE IF EXISTS `tbl_tipoproveedor`;
CREATE TABLE IF NOT EXISTS `tbl_tipoproveedor` (
  `id` int(11) NOT NULL,
  `tipoproveedor` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tomo`
--

DROP TABLE IF EXISTS `tbl_tomo`;
CREATE TABLE IF NOT EXISTS `tbl_tomo` (
  `tomo_id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_traslados`
--

DROP TABLE IF EXISTS `tbl_traslados`;
CREATE TABLE IF NOT EXISTS `tbl_traslados` (
  `id_traslado` int(11) NOT NULL,
  `cod_traslado` varchar(30) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '0',
  `incluidopor` int(10) unsigned DEFAULT NULL,
  `cargadopor` int(11) DEFAULT NULL,
  `fechacarga` datetime DEFAULT NULL,
  `fechainclusion` date DEFAULT NULL,
  `correlativo` int(10) unsigned NOT NULL DEFAULT '0',
  `observaciones` varchar(254) DEFAULT NULL,
  `sucursal_id` int(11) NOT NULL DEFAULT '108'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
CREATE TABLE IF NOT EXISTS `tbl_usuario` (
  `id_usuario` int(11) unsigned NOT NULL COMMENT 'Id del Usuario',
  `us_login` varchar(60) NOT NULL COMMENT 'Login de inicio de sesion',
  `us_clave` varchar(130) NOT NULL,
  `us_nombre` varchar(30) NOT NULL,
  `us_apellido` varchar(30) NOT NULL,
  `us_sucursal` int(11) NOT NULL,
  `us_nivel` int(11) NOT NULL,
  `us_estatus` int(11) NOT NULL DEFAULT '1',
  `us_fechaingreso` date NOT NULL,
  `us_incluidopor` varchar(30) NOT NULL,
  `cedula` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 ROW_FORMAT=COMPRESSED COMMENT='InnoDB free: 4096 kB; InnoDB free: 4096 kB';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_volumen`
--

DROP TABLE IF EXISTS `tbl_volumen`;
CREATE TABLE IF NOT EXISTS `tbl_volumen` (
  `volumen_id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `wwwsqldesigner`
--

DROP TABLE IF EXISTS `wwwsqldesigner`;
CREATE TABLE IF NOT EXISTS `wwwsqldesigner` (
  `keyword` varchar(30) NOT NULL DEFAULT '',
  `data` mediumtext,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `log_sesiones`
--
ALTER TABLE `log_sesiones`
  ADD PRIMARY KEY (`id_sesiones`);

--
-- Indices de la tabla `tbl_audinventario`
--
ALTER TABLE `tbl_audinventario`
  ADD PRIMARY KEY (`cod_invent`,`sucursal`),
  ADD KEY `new_index` (`id_audinventario`);

--
-- Indices de la tabla `tbl_autor`
--
ALTER TABLE `tbl_autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `tbl_bancos`
--
ALTER TABLE `tbl_bancos`
  ADD PRIMARY KEY (`id_tbl_bancos`);

--
-- Indices de la tabla `tbl_chat`
--
ALTER TABLE `tbl_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_cierre`
--
ALTER TABLE `tbl_cierre`
  ADD PRIMARY KEY (`id_cierrecaja`);

--
-- Indices de la tabla `tbl_cierremes`
--
ALTER TABLE `tbl_cierremes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `Index_2` (`cli_cedula`);

--
-- Indices de la tabla `tbl_codigos`
--
ALTER TABLE `tbl_codigos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Index_2` (`codigo`);

--
-- Indices de la tabla `tbl_coleccion`
--
ALTER TABLE `tbl_coleccion`
  ADD PRIMARY KEY (`id_coleccion`),
  ADD UNIQUE KEY `col_descripcion` (`col_descripcion`);

--
-- Indices de la tabla `tbl_condicion`
--
ALTER TABLE `tbl_condicion`
  ADD PRIMARY KEY (`id_condicion`);

--
-- Indices de la tabla `tbl_descuento`
--
ALTER TABLE `tbl_descuento`
  ADD PRIMARY KEY (`id_descuento`);

--
-- Indices de la tabla `tbl_detalleinventario`
--
ALTER TABLE `tbl_detalleinventario`
  ADD PRIMARY KEY (`cod_invent`,`cod_producto`,`sucursal`,`condicion`),
  ADD KEY `Index_2` (`id`);

--
-- Indices de la tabla `tbl_devolucioncliente`
--
ALTER TABLE `tbl_devolucioncliente`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_devolucionlibreria`
--
ALTER TABLE `tbl_devolucionlibreria`
  ADD PRIMARY KEY (`cod_dev`,`sucursal`),
  ADD KEY `new_index` (`id_devolucion`);

--
-- Indices de la tabla `tbl_distinventario`
--
ALTER TABLE `tbl_distinventario`
  ADD PRIMARY KEY (`condicion`,`cod_producto`,`sucursal`);

--
-- Indices de la tabla `tbl_edicion`
--
ALTER TABLE `tbl_edicion`
  ADD PRIMARY KEY (`descripcion`),
  ADD KEY `new_index` (`edicion_id`);

--
-- Indices de la tabla `tbl_editorial`
--
ALTER TABLE `tbl_editorial`
  ADD PRIMARY KEY (`id_editorial`),
  ADD UNIQUE KEY `Index_2` (`editorial`);

--
-- Indices de la tabla `tbl_envios`
--
ALTER TABLE `tbl_envios`
  ADD PRIMARY KEY (`sucursal`,`archivo`),
  ADD KEY `new_index` (`id`);

--
-- Indices de la tabla `tbl_estatus`
--
ALTER TABLE `tbl_estatus`
  ADD PRIMARY KEY (`id_estatus`);

--
-- Indices de la tabla `tbl_expofacturas`
--
ALTER TABLE `tbl_expofacturas`
  ADD PRIMARY KEY (`cod_factura`,`sucursal`);

--
-- Indices de la tabla `tbl_facturas`
--
ALTER TABLE `tbl_facturas`
  ADD PRIMARY KEY (`cod_factura`,`sucursal`);

--
-- Indices de la tabla `tbl_formapago`
--
ALTER TABLE `tbl_formapago`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_formato`
--
ALTER TABLE `tbl_formato`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Index_2` (`descripcion`);

--
-- Indices de la tabla `tbl_horario`
--
ALTER TABLE `tbl_horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  ADD PRIMARY KEY (`cod_producto`),
  ADD KEY `Index_1` (`id_tbl_inventario`);

--
-- Indices de la tabla `tbl_itemdevolucion`
--
ALTER TABLE `tbl_itemdevolucion`
  ADD PRIMARY KEY (`cod_devolucion`,`cod_libro`,`sucursal`),
  ADD KEY `new_index` (`id_item`);

--
-- Indices de la tabla `tbl_itemexpofactura`
--
ALTER TABLE `tbl_itemexpofactura`
  ADD PRIMARY KEY (`id_itemfactura`);

--
-- Indices de la tabla `tbl_itemfactura`
--
ALTER TABLE `tbl_itemfactura`
  ADD PRIMARY KEY (`cod_factura`,`cod_producto`,`sucursal`,`vendedor`),
  ADD KEY `new_index` (`id_itemfactura`);

--
-- Indices de la tabla `tbl_itemsolicitud`
--
ALTER TABLE `tbl_itemsolicitud`
  ADD PRIMARY KEY (`cod_sol`,`cod_libro`),
  ADD KEY `Index_1` (`id`);

--
-- Indices de la tabla `tbl_itemtraslado`
--
ALTER TABLE `tbl_itemtraslado`
  ADD PRIMARY KEY (`sucursal`,`condicion`,`cod_t`,`cod_l`,`estatus`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `tbl_iva`
--
ALTER TABLE `tbl_iva`
  ADD PRIMARY KEY (`id_iva`);

--
-- Indices de la tabla `tbl_libreria`
--
ALTER TABLE `tbl_libreria`
  ADD PRIMARY KEY (`codigo`),
  ADD UNIQUE KEY `libreria` (`libreria`);

--
-- Indices de la tabla `tbl_mes`
--
ALTER TABLE `tbl_mes`
  ADD PRIMARY KEY (`id_mes`);

--
-- Indices de la tabla `tbl_nivel`
--
ALTER TABLE `tbl_nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indices de la tabla `tbl_notase`
--
ALTER TABLE `tbl_notase`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_pais`
--
ALTER TABLE `tbl_pais`
  ADD PRIMARY KEY (`pais`),
  ADD KEY `new_index` (`id_pais`);

--
-- Indices de la tabla `tbl_portprint`
--
ALTER TABLE `tbl_portprint`
  ADD PRIMARY KEY (`portprint_id`);

--
-- Indices de la tabla `tbl_precierrecaja`
--
ALTER TABLE `tbl_precierrecaja`
  ADD PRIMARY KEY (`id_cierrecaja`);

--
-- Indices de la tabla `tbl_preferencias`
--
ALTER TABLE `tbl_preferencias`
  ADD PRIMARY KEY (`sucursal_id`);

--
-- Indices de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  ADD PRIMARY KEY (`proveedor`),
  ADD KEY `Index_2` (`id`);

--
-- Indices de la tabla `tbl_region`
--
ALTER TABLE `tbl_region`
  ADD PRIMARY KEY (`id_region`);

--
-- Indices de la tabla `tbl_sesiones`
--
ALTER TABLE `tbl_sesiones`
  ADD PRIMARY KEY (`id_sesiones`);

--
-- Indices de la tabla `tbl_solicitud`
--
ALTER TABLE `tbl_solicitud`
  ADD PRIMARY KEY (`codigo`),
  ADD KEY `Index_2` (`id`);

--
-- Indices de la tabla `tbl_subtema`
--
ALTER TABLE `tbl_subtema`
  ADD PRIMARY KEY (`subtema`,`id_tema`),
  ADD KEY `Index_2` (`id_subtema`);

--
-- Indices de la tabla `tbl_sucursal`
--
ALTER TABLE `tbl_sucursal`
  ADD PRIMARY KEY (`id_sucursal`);

--
-- Indices de la tabla `tbl_tema`
--
ALTER TABLE `tbl_tema`
  ADD PRIMARY KEY (`id_tema`),
  ADD UNIQUE KEY `Index_2` (`tema`);

--
-- Indices de la tabla `tbl_tipocierre`
--
ALTER TABLE `tbl_tipocierre`
  ADD PRIMARY KEY (`id_tipocierre`);

--
-- Indices de la tabla `tbl_tipodelibro`
--
ALTER TABLE `tbl_tipodelibro`
  ADD PRIMARY KEY (`t_libro`),
  ADD KEY `new_index` (`id_t_libro`);

--
-- Indices de la tabla `tbl_tipofactura`
--
ALTER TABLE `tbl_tipofactura`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tipoproveedor`
--
ALTER TABLE `tbl_tipoproveedor`
  ADD PRIMARY KEY (`tipoproveedor`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `tbl_tomo`
--
ALTER TABLE `tbl_tomo`
  ADD PRIMARY KEY (`descripcion`),
  ADD KEY `new_index` (`tomo_id`);

--
-- Indices de la tabla `tbl_traslados`
--
ALTER TABLE `tbl_traslados`
  ADD PRIMARY KEY (`cod_traslado`),
  ADD KEY `id_traslado` (`id_traslado`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `us_login` (`us_login`);

--
-- Indices de la tabla `tbl_volumen`
--
ALTER TABLE `tbl_volumen`
  ADD PRIMARY KEY (`descripcion`),
  ADD KEY `new_index` (`volumen_id`);

--
-- Indices de la tabla `wwwsqldesigner`
--
ALTER TABLE `wwwsqldesigner`
  ADD PRIMARY KEY (`keyword`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la Tabla';
--
-- AUTO_INCREMENT de la tabla `log_sesiones`
--
ALTER TABLE `log_sesiones`
  MODIFY `id_sesiones` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_audinventario`
--
ALTER TABLE `tbl_audinventario`
  MODIFY `id_audinventario` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_chat`
--
ALTER TABLE `tbl_chat`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_cierre`
--
ALTER TABLE `tbl_cierre`
  MODIFY `id_cierrecaja` int(13) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_cierremes`
--
ALTER TABLE `tbl_cierremes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_cliente`
--
ALTER TABLE `tbl_cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_codigos`
--
ALTER TABLE `tbl_codigos`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_coleccion`
--
ALTER TABLE `tbl_coleccion`
  MODIFY `id_coleccion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_condicion`
--
ALTER TABLE `tbl_condicion`
  MODIFY `id_condicion` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_descuento`
--
ALTER TABLE `tbl_descuento`
  MODIFY `id_descuento` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_detalleinventario`
--
ALTER TABLE `tbl_detalleinventario`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_devolucioncliente`
--
ALTER TABLE `tbl_devolucioncliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_devolucionlibreria`
--
ALTER TABLE `tbl_devolucionlibreria`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_editorial`
--
ALTER TABLE `tbl_editorial`
  MODIFY `id_editorial` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_envios`
--
ALTER TABLE `tbl_envios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_formapago`
--
ALTER TABLE `tbl_formapago`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_formato`
--
ALTER TABLE `tbl_formato`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_inventario`
--
ALTER TABLE `tbl_inventario`
  MODIFY `id_tbl_inventario` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_itemdevolucion`
--
ALTER TABLE `tbl_itemdevolucion`
  MODIFY `id_item` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_itemexpofactura`
--
ALTER TABLE `tbl_itemexpofactura`
  MODIFY `id_itemfactura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_itemfactura`
--
ALTER TABLE `tbl_itemfactura`
  MODIFY `id_itemfactura` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_itemsolicitud`
--
ALTER TABLE `tbl_itemsolicitud`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_itemtraslado`
--
ALTER TABLE `tbl_itemtraslado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_libreria`
--
ALTER TABLE `tbl_libreria`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_mes`
--
ALTER TABLE `tbl_mes`
  MODIFY `id_mes` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_nivel`
--
ALTER TABLE `tbl_nivel`
  MODIFY `id_nivel` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_notase`
--
ALTER TABLE `tbl_notase`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_pais`
--
ALTER TABLE `tbl_pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_portprint`
--
ALTER TABLE `tbl_portprint`
  MODIFY `portprint_id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_precierrecaja`
--
ALTER TABLE `tbl_precierrecaja`
  MODIFY `id_cierrecaja` int(13) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_proveedor`
--
ALTER TABLE `tbl_proveedor`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_region`
--
ALTER TABLE `tbl_region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_sesiones`
--
ALTER TABLE `tbl_sesiones`
  MODIFY `id_sesiones` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_solicitud`
--
ALTER TABLE `tbl_solicitud`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_subtema`
--
ALTER TABLE `tbl_subtema`
  MODIFY `id_subtema` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tema`
--
ALTER TABLE `tbl_tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tipocierre`
--
ALTER TABLE `tbl_tipocierre`
  MODIFY `id_tipocierre` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tipodelibro`
--
ALTER TABLE `tbl_tipodelibro`
  MODIFY `id_t_libro` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tipofactura`
--
ALTER TABLE `tbl_tipofactura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tipoproveedor`
--
ALTER TABLE `tbl_tipoproveedor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_tomo`
--
ALTER TABLE `tbl_tomo`
  MODIFY `tomo_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_traslados`
--
ALTER TABLE `tbl_traslados`
  MODIFY `id_traslado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `id_usuario` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del Usuario';
--
-- AUTO_INCREMENT de la tabla `tbl_volumen`
--
ALTER TABLE `tbl_volumen`
  MODIFY `volumen_id` int(11) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
