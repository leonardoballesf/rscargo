-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-01-2017 a las 19:56:02
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
-- Base de datos: `bookshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attributes`
--

DROP TABLE IF EXISTS `attributes`;
CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `description` varchar(254) NOT NULL COMMENT 'Descripción o denominación del atributo.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=> Inactivo(a), 1=> Activo(a)).',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del atributo.',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del atributo.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del atributo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los atributos asociados a los articulos dentro de la base de datos del sistema tales como marca, isbn, entre otros.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attributes_catalog`
--

DROP TABLE IF EXISTS `attributes_catalog`;
CREATE TABLE IF NOT EXISTS `attributes_catalog` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `attributes_id` int(10) unsigned NOT NULL COMMENT 'Identificador del atributo asociado al árticulo.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo.',
  `users_id` varchar(45) DEFAULT NULL COMMENT 'Identificador del usuario que asigna el atributo al atributo.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=> Inactivo(a), 1=> Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del atributo.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del atributo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los atributos asociados a los articulos dentro de la base de datos del sistema tales como marca, isbn, entre otros.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bookshop`
--

DROP TABLE IF EXISTS `bookshop`;
CREATE TABLE IF NOT EXISTS `bookshop` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la empresa.',
  `regions_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la ubicación regional de la sucursal o librería.',
  `location_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la ubicación geográfica de la sucursal o librería.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción de la sucursal o librería.',
  `address` text NOT NULL COMMENT 'Dirección de ubicación.',
  `phone` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Telefono de contacto.',
  `email` varchar(254) NOT NULL COMMENT 'Correo electrónico de contacto.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del registro.',
  `is_active` int(11) NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la sucursal o librería.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la sucursal o librería.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene la Sucursal o Librería activa para realizar operaciones en el sistema.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `business`
--

DROP TABLE IF EXISTS `business`;
CREATE TABLE IF NOT EXISTS `business` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `identity_card` varchar(45) NOT NULL COMMENT 'Documento de identificación (Cédula, Rif, etc...).',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción de la empresa.',
  `address` text NOT NULL COMMENT 'Dirección de ubicación.',
  `phone` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Teléfono de contacto.',
  `facsimile` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Teléfono fax de contacto.',
  `email` varchar(254) NOT NULL COMMENT 'Correo electrónico de contacto.',
  `website` varchar(254) NOT NULL COMMENT 'Página web de la empresa.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la empresa.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la empresa.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los datos de la empresa propietaria de las sucursales o librerías.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catalog`
--

DROP TABLE IF EXISTS `catalog`;
CREATE TABLE IF NOT EXISTS `catalog` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `category_id` int(10) unsigned NOT NULL DEFAULT '1',
  `code` varchar(254) NOT NULL COMMENT 'Código del árticulo.',
  `title` varchar(254) NOT NULL,
  `description` text NOT NULL COMMENT 'Denominación o descripción del árticulo.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del árticulo.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del árticulo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el listado de articulos registrados en el sistema.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `parent_id` int(10) unsigned DEFAULT NULL COMMENT 'Identificador padre de la categoria.',
  `description` varchar(254) NOT NULL COMMENT 'Descripción o denominación de la categoria.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=> Inactivo(a), 1=> Activo(a)).',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la categoria.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la categoria.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condition`
--

DROP TABLE IF EXISTS `condition`;
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla',
  `description` varchar(254) NOT NULL COMMENT 'Denominación de la condición.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene las condiciones asociados a los pedidos de mercancia dentro de la base de datos del sistema.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la Tabla',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificación del usuario creador del registro.',
  `customer_type_id` int(10) unsigned NOT NULL COMMENT 'Identificador del tipo de cliente (1=> Natural, 2=> Juridico, 3 => Extranjero).',
  `identity_card` varchar(20) NOT NULL COMMENT 'Identificación del Cliente (Cédula, Rif, Pasaporte)',
  `name` varchar(254) NOT NULL COMMENT 'Nombre del Cliente',
  `phone` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Teléfono de contacto del cliente.',
  `email` varchar(254) DEFAULT NULL COMMENT 'Correo electrónico de contacto del cliente.',
  `address` text COMMENT 'Direccion de ubicacion del cliente.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del cliente.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del cliente.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los datos de los clientes.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discounts`
--

DROP TABLE IF EXISTS `discounts`;
CREATE TABLE IF NOT EXISTS `discounts` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del tipo de descuento.',
  `rate` double NOT NULL DEFAULT '0' COMMENT 'Porcentaje de descuento.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'identificador del usuario creador del registro.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Etatus (0=> Inactivo(a), 1=> Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del descuento.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del descuento.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los tipo de descuentos disponibles para ser aplicado a la facturación.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `existence`
--

DROP TABLE IF EXISTS `existence`;
CREATE TABLE IF NOT EXISTS `existence` (
  `id` int(11) NOT NULL COMMENT 'Correlativo de la tabla.',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo en el catalogo.',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad en existencia.',
  `condition_id` int(10) unsigned NOT NULL COMMENT 'Identificador del tipo de condición en la existencia (1=> Firme, 20=> Consignado).'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene la existencia o disponibilidad de árticulos en la sucursal o librería.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory`
--

DROP TABLE IF EXISTS `inventory`;
CREATE TABLE IF NOT EXISTS `inventory` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador.',
  `counted_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad contada fisicamente.',
  `system_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad actual registrada el sistema.',
  `lost_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Diferencia de cantidad contada y sistema.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion del inventario de árticulos.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del inventario de árticulo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro maestro de los inventarios de mercancia hechos por la sucural o librería.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventory_item`
--

DROP TABLE IF EXISTS `inventory_item`;
CREATE TABLE IF NOT EXISTS `inventory_item` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `inventory_id` int(10) unsigned NOT NULL COMMENT 'Identificador del inventario.',
  `item_id` int(10) unsigned NOT NULL COMMENT 'Estatus de Actividad.',
  `counted_quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `system_quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `unit_cost` double NOT NULL DEFAULT '0',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro detalle de los inventarios de mercancia hechos por la sucural o librería.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices`
--

DROP TABLE IF EXISTS `invoices`;
CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `code` varchar(45) NOT NULL COMMENT 'Código de factura generado por el sistema.',
  `customers_id` int(10) unsigned NOT NULL COMMENT 'Identificador del cliente asociado a la factura.',
  `barcode` varchar(45) NOT NULL COMMENT 'Código de barras generado por el sistema.',
  `tax_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto total de impuesto.',
  `taxable_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto de base imponible de la factura.',
  `discount_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto total de descuento aplicable a la factura.',
  `invoices_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto total de la factura.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del registro.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la factura.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la factura.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro maestro de las facturas cargadas al sistema.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoices_items`
--

DROP TABLE IF EXISTS `invoices_items`;
CREATE TABLE IF NOT EXISTS `invoices_items` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `invoices_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la factura.',
  `invoices_code` varchar(45) NOT NULL COMMENT 'Código de factura generado por el sistema.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo registrado en la factura.',
  `unit_cost` double NOT NULL DEFAULT '0' COMMENT 'Costo o precio unitario.',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad ingresada.',
  `discount_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto de descuento',
  `tax_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto de impuesto.',
  `item_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto todal del registro.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro detalle de las facturas cargadas al sistema.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invoice_payment_method`
--

DROP TABLE IF EXISTS `invoice_payment_method`;
CREATE TABLE IF NOT EXISTS `invoice_payment_method` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla',
  `bookshop_id` int(10) unsigned NOT NULL,
  `invoice_id` int(10) unsigned NOT NULL COMMENT 'Código de factura generado por el sistema.',
  `payment_method_id` int(10) unsigned NOT NULL COMMENT 'Identificador del método de pago utilizado para cancelar la factura.',
  `issuing_entity_id` int(10) unsigned NOT NULL COMMENT 'Entidad emisora del instrumento de pago.',
  `account_code` varchar(254) NOT NULL DEFAULT '0' COMMENT 'Código de cuenta asociado al método de pago.',
  `amount` double NOT NULL DEFAULT '0' COMMENT 'Monto del importe.',
  `reference_number` varchar(254) NOT NULL DEFAULT '0' COMMENT 'Número de referencia asociado a la operacón con el método de pago.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro detalle de los métodos de pago utilizados en la cancelación de la factura.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `issuing_entity`
--

DROP TABLE IF EXISTS `issuing_entity`;
CREATE TABLE IF NOT EXISTS `issuing_entity` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `users_id` varchar(45) NOT NULL COMMENT 'Identificación del usuario creador.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción de la entidad.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=> Inactivo(a), 1=> Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la entidad emisora.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la entidad emisora.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene las entidades emisoras de los tipo de instrumentos de pago para ser aplicado a la facturación.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location`
--

DROP TABLE IF EXISTS `location`;
CREATE TABLE IF NOT EXISTS `location` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `regions_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la región asociada a la ubicación',
  `location` varchar(254) NOT NULL COMMENT 'Ubicación geográfica.',
  `address` text NOT NULL COMMENT 'Dirección de ubicación',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Distribución geográfica de las librerias o sucursales';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maker`
--

DROP TABLE IF EXISTS `maker`;
CREATE TABLE IF NOT EXISTS `maker` (
  `id` int(11) NOT NULL COMMENT 'Correlativo de la tabla.',
  `description` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el listado de las creadores o productores de los distintos articulos registrados en el cátalogo del sistema.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la empresa.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del pedido.',
  `suppliers_id` int(10) unsigned NOT NULL COMMENT 'Identificador del proveedor de mercancia.',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del pedido.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del pedido.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro maestro de los pedidos de mercancia hechos por la empresa para ser distribuidos entre las sucurales o librerías.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
CREATE TABLE IF NOT EXISTS `orders_items` (
  `id` int(11) NOT NULL COMMENT 'Correlatico de la tabla.',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería destino.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del articulo que será enviado a la una sucursal o librería en particular.',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad solicitada.',
  `unit_cost` double NOT NULL DEFAULT '0' COMMENT 'Costo unitario del árticulo.',
  `orders_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la orden o solicitud de mercancia.',
  `condition_id` int(10) unsigned NOT NULL COMMENT 'Identificador del tipo de condición con que será enviado el articulo.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a)).'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro detalle de los pedidos de mercancia hechos por la empresa para las sucurales o librerías.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del método de pago.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Etatus (0=> Inactivo(a), 1=> Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del método de pago.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del método de pago.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el listado de métodos de pagos disponibles para el sistema.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prices`
--

DROP TABLE IF EXISTS `prices`;
CREATE TABLE IF NOT EXISTS `prices` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo en el catalogo.',
  `catalog_code` varchar(20) NOT NULL COMMENT 'Código del articulo en catálogo.',
  `unit_cost` double NOT NULL DEFAULT '0' COMMENT 'Precio o costo unitario.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del precio del árticulo.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del precio del árticulo.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el listado de precios y cambios de precios asociados a los articulos registrados en el sistema.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción de la región.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene la división regional del país.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `replenishments`
--

DROP TABLE IF EXISTS `replenishments`;
CREATE TABLE IF NOT EXISTS `replenishments` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador de la solicitud de reposición.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la reposición.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la reposición.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el maestro de las solicitud de reposiciones de inventario de mercancia hechas por la  sucursal o librería.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `replenishments_items`
--

DROP TABLE IF EXISTS `replenishments_items`;
CREATE TABLE IF NOT EXISTS `replenishments_items` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `replenishments_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la reposición de mercancia.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo solicitado.',
  `system_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad en sistema.',
  `ordered_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad solicitada.',
  `approved_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad aprobada.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el detalle de las reposiciones de inventario de mercancia hechas por la  sucursal o librería.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sellers`
--

DROP TABLE IF EXISTS `sellers`;
CREATE TABLE IF NOT EXISTS `sellers` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la Tabla',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la empresa donde labora.',
  `identity_card` varchar(45) NOT NULL COMMENT 'Documento de Identificación (Cédula, Rif, etc...)',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del vendedor.',
  `address` varchar(254) NOT NULL DEFAULT 'NA' COMMENT 'Dirección de habitación del vendedor.',
  `phone` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Teléfono de contacto del vendedor.',
  `birthdate` date DEFAULT NULL COMMENT 'Fecha de nacimiento.',
  `is_active` int(10) unsigned NOT NULL COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del vendedor.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del vendedor.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene los vendedores o libreros registrados en la red de librerías.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla',
  `description` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los estatus asociados a los objetos dentro de la base de datos del sistema';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
CREATE TABLE IF NOT EXISTS `suppliers` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la empresa.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario que registra el proveedor en el sistema.',
  `identity_card` varchar(45) NOT NULL COMMENT 'Documento de identificación (Cédula, Rif, etc...).',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del proveedor.',
  `phone` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Teléfono de contacto.',
  `facsimile` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Teléfono fax de contacto.',
  `address` text NOT NULL COMMENT 'Dirección de contacto.',
  `website` varchar(254) NOT NULL COMMENT 'Página web del proveedor.',
  `email` varchar(254) NOT NULL COMMENT 'Correo electrónico de contacto.',
  `issuing_bank` int(10) unsigned NOT NULL COMMENT 'Entidad emisora del instrumento de pago.',
  `bank_account` varchar(20) NOT NULL DEFAULT '00000000000000000000' COMMENT 'Cuenta bancaria asociada al proveedor.',
  `suppliers_type_id` int(10) unsigned NOT NULL COMMENT 'Tipo de proveedor (1=>Natural, 2=>Juridico, 3=>Extranjero).',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1 => Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del proveedor.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del proveedor.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el listado de los proveedores de mercancia.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `taxes`
--

DROP TABLE IF EXISTS `taxes`;
CREATE TABLE IF NOT EXISTS `taxes` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del impuesto.',
  `rate` double NOT NULL DEFAULT '0' COMMENT 'Porcentaje de impuesto.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del impuesto.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Etatus (0=> Inactivo(a), 1=> Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del impuesto.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del impuesto.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los tipo de impuestos disponibles para ser aplicado a la facturación.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla',
  `sellers_id` int(10) unsigned NOT NULL COMMENT 'Identificador del vendedor asociado al usuario que accede al sistema',
  `username` varchar(254) NOT NULL COMMENT 'Nombre de Usuario',
  `password` varchar(128) NOT NULL COMMENT 'Clave de accedo al sistema',
  `role` int(10) unsigned DEFAULT '1' COMMENT 'roles de usuario (1=>vendedor, 2=>usuario, 3=>administrador)',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1 => Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del usuario.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del usuario.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene los usuarios que acceden al sistema.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_session`
--

DROP TABLE IF EXISTS `user_session`;
CREATE TABLE IF NOT EXISTS `user_session` (
  `id` int(10) unsigned NOT NULL COMMENT 'Identificador de la Sesión',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario que inicia sesión',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1 => Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la sesión.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la sesión.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contien el registro de las sesiones iniciadas por los usuarios y su estatus.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
CREATE TABLE IF NOT EXISTS `warehouse` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la empresa.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del almacen.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del almacen.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del almacen.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del almacen.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los almacenes registrados para una empresa determinada.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warehouse_movement`
--

DROP TABLE IF EXISTS `warehouse_movement`;
CREATE TABLE IF NOT EXISTS `warehouse_movement` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `warehouse_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la almacen.',
  `movement_type_id` int(10) unsigned NOT NULL COMMENT 'Tipo de movimiento (1=> Entrada, 2 => Salida).',
  `users_id` int(10) unsigned NOT NULL,
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (0=>Inactivo(a), 1=>Activo(a)).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del movimiento.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Identificador del usuario creador del movimiento.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el maestro de los movimientos de mercancia realizados en el almacen de la empresa.';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `warehouse_movement_items`
--

DROP TABLE IF EXISTS `warehouse_movement_items`;
CREATE TABLE IF NOT EXISTS `warehouse_movement_items` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `warehouse_movement_id` int(10) unsigned NOT NULL COMMENT 'Identificador del movimiento de almacen.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo registrado en el movimiento.',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad de registrada en el movimiento.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el detalle de los movimientos de mercancia realizados en el almacen de la empresa.';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indices de la tabla `attributes_catalog`
--
ALTER TABLE `attributes_catalog`
  ADD PRIMARY KEY (`attributes_id`,`catalog_id`),
  ADD KEY `fk_attributes_catalog_id_idx` (`catalog_id`),
  ADD KEY `fk_attributes_id_idx` (`attributes_id`),
  ADD KEY `index` (`id`);

--
-- Indices de la tabla `bookshop`
--
ALTER TABLE `bookshop`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description_unique` (`description`),
  ADD KEY `fk_bookshop_business_id_idx` (`business_id`),
  ADD KEY `fk_bookshop_location_id_idx` (`location_id`),
  ADD KEY `fk_bookshop_regions_id_idx` (`regions_id`);

--
-- Indices de la tabla `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identity_card_unique` (`identity_card`);

--
-- Indices de la tabla `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code_UNIQUE` (`code`),
  ADD KEY `index_id` (`id`),
  ADD KEY `fk_categories_id_idx` (`category_id`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indices de la tabla `condition`
--
ALTER TABLE `condition`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `condition_UNIQUE` (`description`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`,`bookshop_id`),
  ADD UNIQUE KEY `identification_UNIQUE` (`identity_card`),
  ADD KEY `fk_customers_bookshop_id_idx` (`bookshop_id`);

--
-- Indices de la tabla `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indices de la tabla `existence`
--
ALTER TABLE `existence`
  ADD PRIMARY KEY (`bookshop_id`,`catalog_id`,`condition_id`),
  ADD KEY `index_id` (`id`);

--
-- Indices de la tabla `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inventory_bookshop_id_idx` (`bookshop_id`);

--
-- Indices de la tabla `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_inventory_item_inventory_id_idx` (`inventory_id`);

--
-- Indices de la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`bookshop_id`,`code`),
  ADD UNIQUE KEY `barcode_UNIQUE` (`barcode`),
  ADD KEY `index_id` (`id`),
  ADD KEY `fk_invoices_customers_id_idx` (`customers_id`);

--
-- Indices de la tabla `invoices_items`
--
ALTER TABLE `invoices_items`
  ADD PRIMARY KEY (`bookshop_id`,`invoices_id`,`catalog_id`,`invoices_code`),
  ADD KEY `index_id` (`id`),
  ADD KEY `fk_invoice_item_invoices_id` (`invoices_id`);

--
-- Indices de la tabla `invoice_payment_method`
--
ALTER TABLE `invoice_payment_method`
  ADD PRIMARY KEY (`bookshop_id`,`invoice_id`,`payment_method_id`),
  ADD KEY `fk_invoice_payment_method_issuing_id_idx` (`issuing_entity_id`),
  ADD KEY `fk_invoice_payment_method_id_idx` (`payment_method_id`),
  ADD KEY `index_id` (`id`),
  ADD KEY `fk_invoice_payment_method_invoices_id_idx` (`invoice_id`);

--
-- Indices de la tabla `issuing_entity`
--
ALTER TABLE `issuing_entity`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indices de la tabla `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maker`
--
ALTER TABLE `maker`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indices de la tabla `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_suppliers_id_idx` (`suppliers_id`),
  ADD KEY `fk_orders_business_id_idx` (`business_id`);

--
-- Indices de la tabla `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_items_orders_id_idx` (`orders_id`),
  ADD KEY `fk_orders_items_catalog_id_idx` (`catalog_id`),
  ADD KEY `fk_orders_items_bookshop_id_idx` (`bookshop_id`);

--
-- Indices de la tabla `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `method_UNIQUE` (`description`);

--
-- Indices de la tabla `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_prices_catalog_id_idx` (`catalog_id`);

--
-- Indices de la tabla `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indices de la tabla `replenishments`
--
ALTER TABLE `replenishments`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `replenishments_items`
--
ALTER TABLE `replenishments_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_replenishments_items_replenishments_id_idx` (`replenishments_id`);

--
-- Indices de la tabla `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identification_UNIQUE` (`identity_card`),
  ADD KEY `fk_sellers_business_id_idx` (`business_id`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `status_UNIQUE` (`description`);

--
-- Indices de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identity_card_UNIQUE` (`identity_card`),
  ADD KEY `fk_suppliers_business_id_idx` (`business_id`);

--
-- Indices de la tabla `taxes`
--
ALTER TABLE `taxes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `description_UNIQUE` (`description`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identification_unique` (`username`),
  ADD UNIQUE KEY `seller_id_unique` (`sellers_id`),
  ADD KEY `fk_user_seller_id_idx` (`sellers_id`);

--
-- Indices de la tabla `user_session`
--
ALTER TABLE `user_session`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_session_user_id` (`users_id`);

--
-- Indices de la tabla `warehouse`
--
ALTER TABLE `warehouse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_warehouse_bussines_id_idx` (`business_id`);

--
-- Indices de la tabla `warehouse_movement`
--
ALTER TABLE `warehouse_movement`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_warehouse_movement_warehouse_id_idx` (`warehouse_id`);

--
-- Indices de la tabla `warehouse_movement_items`
--
ALTER TABLE `warehouse_movement_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_warehouse_movement_id_idx` (`warehouse_movement_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `attributes_catalog`
--
ALTER TABLE `attributes_catalog`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `bookshop`
--
ALTER TABLE `bookshop`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `business`
--
ALTER TABLE `business`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `condition`
--
ALTER TABLE `condition`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla';
--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la Tabla';
--
-- AUTO_INCREMENT de la tabla `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `existence`
--
ALTER TABLE `existence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `inventory`
--
ALTER TABLE `inventory`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `inventory_item`
--
ALTER TABLE `inventory_item`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla';
--
-- AUTO_INCREMENT de la tabla `invoices_items`
--
ALTER TABLE `invoices_items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla';
--
-- AUTO_INCREMENT de la tabla `invoice_payment_method`
--
ALTER TABLE `invoice_payment_method`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla';
--
-- AUTO_INCREMENT de la tabla `issuing_entity`
--
ALTER TABLE `issuing_entity`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `location`
--
ALTER TABLE `location`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `maker`
--
ALTER TABLE `maker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `replenishments`
--
ALTER TABLE `replenishments`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `replenishments_items`
--
ALTER TABLE `replenishments_items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la Tabla';
--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla';
--
-- AUTO_INCREMENT de la tabla `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `taxes`
--
ALTER TABLE `taxes`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla';
--
-- AUTO_INCREMENT de la tabla `user_session`
--
ALTER TABLE `user_session`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Sesión';
--
-- AUTO_INCREMENT de la tabla `warehouse`
--
ALTER TABLE `warehouse`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `warehouse_movement`
--
ALTER TABLE `warehouse_movement`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- AUTO_INCREMENT de la tabla `warehouse_movement_items`
--
ALTER TABLE `warehouse_movement_items`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.';
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `attributes_catalog`
--
ALTER TABLE `attributes_catalog`
  ADD CONSTRAINT `fk_attributes_catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_attributes_id` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `bookshop`
--
ALTER TABLE `bookshop`
  ADD CONSTRAINT `fk_bookshop_business_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bookshop_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_bookshop_regions_id` FOREIGN KEY (`regions_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `catalog`
--
ALTER TABLE `catalog`
  ADD CONSTRAINT `fk_categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_customers_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `bookshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `existence`
--
ALTER TABLE `existence`
  ADD CONSTRAINT `fk_existence_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `bookshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventory`
--
ALTER TABLE `inventory`
  ADD CONSTRAINT `fk_inventory_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `bookshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `inventory_item`
--
ALTER TABLE `inventory_item`
  ADD CONSTRAINT `fk_inventory_item_inventory_id` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `fk_invoices_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `bookshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoices_customers_id` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `invoices_items`
--
ALTER TABLE `invoices_items`
  ADD CONSTRAINT `fk_invoice_item_invoices_id` FOREIGN KEY (`invoices_id`) REFERENCES `invoices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `invoice_payment_method`
--
ALTER TABLE `invoice_payment_method`
  ADD CONSTRAINT `fk_invoice_payment_method_id` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoice_payment_method_invoices_id` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoice_payment_method_issuing_id` FOREIGN KEY (`issuing_entity_id`) REFERENCES `issuing_entity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_business_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_suppliers_id` FOREIGN KEY (`suppliers_id`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `fk_orders_items_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `bookshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_items_catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_orders_items_orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `fk_prices_catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `replenishments_items`
--
ALTER TABLE `replenishments_items`
  ADD CONSTRAINT `fk_replenishments_items_replenishments_id` FOREIGN KEY (`replenishments_id`) REFERENCES `replenishments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sellers`
--
ALTER TABLE `sellers`
  ADD CONSTRAINT `fk_sellers_business_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `fk_suppliers_business_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_seller_id` FOREIGN KEY (`sellers_id`) REFERENCES `sellers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user_session`
--
ALTER TABLE `user_session`
  ADD CONSTRAINT `fk_user_session_user_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `warehouse`
--
ALTER TABLE `warehouse`
  ADD CONSTRAINT `fk_warehouse_bussines_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `warehouse_movement`
--
ALTER TABLE `warehouse_movement`
  ADD CONSTRAINT `fk_warehouse_movement_warehouse_id` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `warehouse_movement_items`
--
ALTER TABLE `warehouse_movement_items`
  ADD CONSTRAINT `fk_warehouse_movement_id` FOREIGN KEY (`warehouse_movement_id`) REFERENCES `warehouse_movement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
