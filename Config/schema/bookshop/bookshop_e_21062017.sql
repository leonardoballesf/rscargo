CREATE DATABASE  IF NOT EXISTS `bookshop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bookshop`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: localhost    Database: bookshop
-- ------------------------------------------------------
-- Server version	5.6.35-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accountancy`
--

DROP TABLE IF EXISTS `accountancy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accountancy` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la Tabla',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la Empresa',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `attributes`
--

DROP TABLE IF EXISTS `attributes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attributes` (
  `id` int(10) unsigned NOT NULL COMMENT 'Correlativo de la tabla.',
  `business_id` int(11) NOT NULL COMMENT 'Identificador de la empresa a la que pertenece.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del atributo.',
  `description` varchar(254) NOT NULL COMMENT 'Descripción o denominación del atributo.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del atributo.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del atributo.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los atributos asociados a los articulos dentro de la base de datos del sistema tales como marca, isbn, entre otros.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `attributes_hash_catalog`
--

DROP TABLE IF EXISTS `attributes_hash_catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `attributes_hash_catalog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `attributes_id` int(10) unsigned NOT NULL COMMENT 'Identificador del atributo asociado al árticulo.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario que asigna el atributo al atributo.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del atributo.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del atributo.',
  PRIMARY KEY (`attributes_id`,`catalog_id`),
  KEY `fk_attributes_catalog_id_idx` (`catalog_id`),
  KEY `fk_attributes_id_idx` (`attributes_id`),
  KEY `index` (`id`),
  CONSTRAINT `fk_attributes_catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_attributes_id` FOREIGN KEY (`attributes_id`) REFERENCES `attributes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los atributos asociados a los articulos dentro de la base de datos del sistema tales como marca, isbn, entre otros.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `bookshop`
--

DROP TABLE IF EXISTS `bookshop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bookshop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la empresa.',
  `regions_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la ubicación regional de la sucursal o librería.',
  `location_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la ubicación geográfica de la sucursal o librería.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción de la sucursal o librería.',
  `address` text NOT NULL COMMENT 'Dirección de ubicación.',
  `phone` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Telefono de contacto.',
  `email` varchar(254) NOT NULL COMMENT 'Correo electrónico de contacto.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del registro.',
  `is_current` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Determina si la sucursal o librería esta en actual uso o predeterminada. (0=> ''No'', 1 => ''Si'')',
  `is_active` int(11) NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la sucursal o librería.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la sucursal o librería.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description_unique` (`description`),
  KEY `fk_bookshop_business_id_idx` (`business_id`),
  KEY `fk_bookshop_location_id_idx` (`location_id`),
  KEY `fk_bookshop_regions_id_idx` (`regions_id`),
  CONSTRAINT `fk_bookshop_business_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bookshop_location_id` FOREIGN KEY (`location_id`) REFERENCES `location` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_bookshop_regions_id` FOREIGN KEY (`regions_id`) REFERENCES `regions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene la Sucursal o Librería activa para realizar operaciones en el sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `identity_card` varchar(45) NOT NULL COMMENT 'Documento de identificación (Cédula, Rif, etc...).',
  `owner_identity_card` varchar(45) NOT NULL DEFAULT '0',
  `owner_description` varchar(254) NOT NULL DEFAULT '0',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción de la empresa.',
  `address` text NOT NULL COMMENT 'Dirección de ubicación.',
  `phone` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Teléfono de contacto.',
  `facsimile` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Teléfono fax de contacto.',
  `email` varchar(254) NOT NULL COMMENT 'Correo electrónico de contacto.',
  `website` varchar(254) NOT NULL COMMENT 'Página web de la empresa.',
  `logo` longtext COMMENT 'Logo de la empresa',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la empresa.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la empresa.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `identity_card_unique` (`identity_card`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Contiene los datos de la empresa propietaria de las sucursales o librerías.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `catalog`
--

DROP TABLE IF EXISTS `catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `catalog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `business_id` int(10) unsigned NOT NULL DEFAULT '1',
  `users_id` int(10) unsigned NOT NULL DEFAULT '1',
  `category_id` int(10) unsigned NOT NULL DEFAULT '1',
  `code` varchar(254) NOT NULL COMMENT 'Código del árticulo.',
  `bardcode` varchar(254) NOT NULL DEFAULT '0',
  `image` longtext,
  `title` varchar(254) NOT NULL,
  `description` text NOT NULL COMMENT 'Denominación o descripción del árticulo.',
  `tax_exempt` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Exento de impuestos por defecto 1 => Activo',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del árticulo.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del árticulo.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  KEY `index_id` (`id`),
  KEY `fk_categories_id_idx` (`category_id`),
  KEY `fk_business_id_idx` (`business_id`),
  KEY `fk_users_users_id_idx` (`users_id`),
  CONSTRAINT `fk_business_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_categories_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_users_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34844 DEFAULT CHARSET=utf8 COMMENT='Contiene el listado de articulos registrados en el sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `parent_id` int(10) unsigned DEFAULT NULL COMMENT 'Identificador padre de la categoria.',
  `description` varchar(254) NOT NULL COMMENT 'Descripción o denominación de la categoria.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la categoria.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la categoria.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Contiene la lista de categorias usadas por los articulos para ser aplicado a la facturación.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `conditions_type`
--

DROP TABLE IF EXISTS `conditions_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `conditions_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla',
  `description` varchar(254) NOT NULL COMMENT 'Denominación de la condición.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `condition_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Contiene los tipo de condiciones asociados a los pedidos de mercancia dentro de la base de datos del sistema.\n1 => Firme, 2 => Consignado';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la Tabla',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificación del usuario creador del registro.',
  `nationality_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Identificador del tipo de nacionalidad del cliente (1=> Natural, 2=> Extranjera, 3 => Nacionalizada).',
  `type_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Identificador del tipo de cliente (1=> Personal, 2=> Juridico, 3 => Gubernamental).',
  `identity_card` varchar(20) NOT NULL COMMENT 'Identificación del Cliente (Cédula, Rif, Pasaporte)',
  `name` varchar(254) NOT NULL COMMENT 'Nombre del Cliente',
  `phone` varchar(45) DEFAULT '0' COMMENT 'Teléfono de contacto del cliente.',
  `cell_phone` varchar(45) DEFAULT '0' COMMENT 'Celular de contacto del cliente.',
  `email` varchar(254) DEFAULT NULL COMMENT 'Correo electrónico de contacto del cliente.',
  `address` text COMMENT 'Direccion de ubicacion del cliente.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del cliente.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del cliente.',
  PRIMARY KEY (`id`,`bookshop_id`),
  UNIQUE KEY `identification_UNIQUE` (`identity_card`),
  KEY `fk_customers_bookshop_id_idx` (`bookshop_id`),
  KEY `fk_customers_nationality_id_idx` (`nationality_id`),
  KEY `fk_customers_type_id_idx` (`type_id`),
  CONSTRAINT `fk_customers_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `bookshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_customers_nationality_id` FOREIGN KEY (`nationality_id`) REFERENCES `nationality_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_customers_type_id` FOREIGN KEY (`type_id`) REFERENCES `customers_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18930 DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los datos de los clientes.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `customers_type`
--

DROP TABLE IF EXISTS `customers_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla customers_type.',
  `description` varchar(254) NOT NULL COMMENT 'Descripción o denominación del customers_type.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del customers_type.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del customers_type.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Contiene los tipo de clientes. (1 => Personal, 2 => Juridico, 3 => Gubernamental)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `devolution`
--

DROP TABLE IF EXISTS `devolution`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devolution` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la Sucursal.',
  `invoice_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la factura',
  `invoices_code` varchar(45) NOT NULL COMMENT 'Codigo de la Factura.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del Usuario.',
  `customers_id` int(10) unsigned NOT NULL COMMENT 'Identificador del Cliente.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bookshop_id`,`invoice_id`,`invoices_code`),
  KEY `index_id` (`id`),
  KEY `fk_devolution_invoices_id_idx` (`invoice_id`),
  CONSTRAINT `fk_devolution_invoices_id` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene las devoluciones hechas por los clientes.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `devolution_items`
--

DROP TABLE IF EXISTS `devolution_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `devolution_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `devolution_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la devolución.',
  `invoices_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la factura.',
  `invoices_code` varchar(45) NOT NULL COMMENT 'Código de factura generado por el sistema.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo registrado en la factura.',
  `unit_cost` double NOT NULL DEFAULT '0' COMMENT 'Costo o precio unitario.',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad ingresada.',
  `discount_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto de descuento',
  `tax_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto de impuesto.',
  `item_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto todal del registro.',
  PRIMARY KEY (`bookshop_id`,`invoices_id`,`invoices_code`,`catalog_id`,`devolution_id`),
  KEY `index_id` (`id`),
  KEY `fk_devolution_items_devolution_id_idx` (`devolution_id`),
  CONSTRAINT `fk_devolution_items_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `devolution` (`bookshop_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_devolution_items_devolution_id` FOREIGN KEY (`devolution_id`) REFERENCES `devolution` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro detalle de las devoluciones cargadas al sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `discounts`
--

DROP TABLE IF EXISTS `discounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discounts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la Empresa',
  `users_id` int(10) unsigned NOT NULL COMMENT 'identificador del usuario creador del registro.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del tipo de descuento.',
  `rate` double NOT NULL DEFAULT '0' COMMENT 'Porcentaje de descuento.',
  `duration_days` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Tiempo de duración en días.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del descuento.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del descuento.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Contiene los tipo de descuentos disponibles para ser aplicado a la facturación.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `discounts_hash_catalog`
--

DROP TABLE IF EXISTS `discounts_hash_catalog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `discounts_hash_catalog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `discounts_id` int(10) unsigned NOT NULL COMMENT 'Identificador del descuento asociado al árticulo.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario que asigna el atributo al atributo.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del atributo.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del atributo.',
  PRIMARY KEY (`discounts_id`,`catalog_id`),
  KEY `fk_attributes_catalog_id_idx` (`catalog_id`),
  KEY `fk_attributes_id_idx` (`discounts_id`),
  KEY `index` (`id`),
  CONSTRAINT `fk_discounts_catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_discounts_id` FOREIGN KEY (`discounts_id`) REFERENCES `discounts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Contiene los descuentos asociados a los articulos dentro de la base de datos del sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `existence`
--

DROP TABLE IF EXISTS `existence`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `existence` (
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo en el catalogo.',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad en existencia.',
  `condition_id` int(10) unsigned NOT NULL COMMENT 'Identificador del tipo de condición en la existencia (1=> Firme, 20=> Consignado).',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bookshop_id`,`catalog_id`,`condition_id`),
  KEY `fk_existence_catalog_id_idx` (`catalog_id`),
  CONSTRAINT `fk_existence_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `bookshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_existence_catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene la existencia o disponibilidad de árticulos en la sucursal o librería.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `flows_type`
--

DROP TABLE IF EXISTS `flows_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flows_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla',
  `description` varchar(254) NOT NULL COMMENT 'Descripción o denominación del flujo.',
  `label` varchar(45) DEFAULT NULL,
  `initials` varchar(45) NOT NULL COMMENT 'Letra o inicial de la flujo de seguimiento.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `status_UNIQUE` (`description`),
  UNIQUE KEY `initials_UNIQUE` (`initials`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los flujos de seguimiento asociados a los objetos dentro de la base de datos del sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `inventory`
--

DROP TABLE IF EXISTS `inventory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador.',
  `counted_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad contada fisicamente.',
  `system_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad actual registrada el sistema.',
  `lost_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Diferencia de cantidad contada y sistema.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creacion del inventario de árticulos.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del inventario de árticulo.',
  PRIMARY KEY (`id`),
  KEY `fk_inventory_bookshop_id_idx` (`bookshop_id`),
  CONSTRAINT `fk_inventory_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `bookshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro maestro de los inventarios de mercancia hechos por la sucural o librería.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `inventory_item`
--

DROP TABLE IF EXISTS `inventory_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventory_item` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `inventory_id` int(10) unsigned NOT NULL COMMENT 'Identificador del inventario.',
  `item_id` int(10) unsigned NOT NULL COMMENT 'Estatus de Actividad.',
  `counted_quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `system_quantity` int(10) unsigned NOT NULL DEFAULT '0',
  `unit_cost` double NOT NULL DEFAULT '0',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_inventory_item_inventory_id_idx` (`inventory_id`),
  CONSTRAINT `fk_inventory_item_inventory_id` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro detalle de los inventarios de mercancia hechos por la sucural o librería.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoice_payment_method`
--

DROP TABLE IF EXISTS `invoice_payment_method`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice_payment_method` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla',
  `bookshop_id` int(10) unsigned NOT NULL,
  `invoice_id` int(10) unsigned NOT NULL COMMENT 'Código de factura generado por el sistema.',
  `payment_method_id` int(10) unsigned NOT NULL COMMENT 'Identificador del método de pago utilizado para cancelar la factura.',
  `issuing_entity_id` int(10) unsigned NOT NULL COMMENT 'Entidad emisora del instrumento de pago.',
  `account_code` varchar(254) NOT NULL DEFAULT '0' COMMENT 'Código de cuenta asociado al método de pago.',
  `amount` double NOT NULL DEFAULT '0' COMMENT 'Monto del importe.',
  `reference_number` varchar(254) NOT NULL DEFAULT '0' COMMENT 'Número de referencia asociado a la operacón con el método de pago.',
  PRIMARY KEY (`bookshop_id`,`invoice_id`,`payment_method_id`),
  KEY `fk_invoice_payment_method_issuing_id_idx` (`issuing_entity_id`),
  KEY `fk_invoice_payment_method_id_idx` (`payment_method_id`),
  KEY `index_id` (`id`),
  KEY `fk_invoice_payment_method_invoices_id_idx` (`invoice_id`),
  CONSTRAINT `fk_invoice_payment_method_id` FOREIGN KEY (`payment_method_id`) REFERENCES `payment_methods` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_payment_method_invoices_id` FOREIGN KEY (`invoice_id`) REFERENCES `invoices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoice_payment_method_issuing_id` FOREIGN KEY (`issuing_entity_id`) REFERENCES `issuing_entity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro detalle de los métodos de pago utilizados en la cancelación de la factura.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `code` varchar(45) NOT NULL COMMENT 'Código de factura generado por el sistema.',
  `customers_id` int(10) unsigned NOT NULL COMMENT 'Identificador del cliente asociado a la factura.',
  `barcode` varchar(45) NOT NULL COMMENT 'Código de barras generado por el sistema.',
  `tax_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto total de impuesto.',
  `taxable_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto de base imponible de la factura.',
  `discount_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto total de descuento aplicable a la factura.',
  `invoices_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto total de la factura.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del registro.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la factura.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la factura.',
  `flow_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Identificador del Flujo de Facturación',
  PRIMARY KEY (`bookshop_id`,`code`),
  UNIQUE KEY `barcode_UNIQUE` (`barcode`),
  KEY `index_id` (`id`),
  KEY `fk_invoices_customers_id_idx` (`customers_id`),
  CONSTRAINT `fk_invoices_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `bookshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_invoices_customers_id` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Contiene el registro maestro de las facturas cargadas al sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `invoices_items`
--

DROP TABLE IF EXISTS `invoices_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `invoices_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la factura.',
  `invoices_code` varchar(45) NOT NULL COMMENT 'Código de factura generado por el sistema.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo registrado en la factura.',
  `unit_cost` double NOT NULL DEFAULT '0' COMMENT 'Costo o precio unitario.',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad ingresada.',
  `discount_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto de descuento',
  `tax_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto de impuesto.',
  `item_amount` double NOT NULL DEFAULT '0' COMMENT 'Monto todal del registro.',
  PRIMARY KEY (`bookshop_id`,`invoices_id`,`catalog_id`,`invoices_code`),
  KEY `index_id` (`id`),
  KEY `fk_invoice_item_invoices_id` (`invoices_id`),
  CONSTRAINT `fk_invoice_item_invoices_id` FOREIGN KEY (`invoices_id`) REFERENCES `invoices` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Contiene el registro detalle de las facturas cargadas al sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `issuing_entity`
--

DROP TABLE IF EXISTS `issuing_entity`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `issuing_entity` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `users_id` varchar(45) NOT NULL COMMENT 'Identificación del usuario creador.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción de la entidad.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la entidad emisora.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la entidad emisora.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='Contiene las entidades emisoras de los tipo de instrumentos de pago para ser aplicado a la facturación.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `location`
--

DROP TABLE IF EXISTS `location`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `location` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `regions_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la región asociada a la ubicación',
  `location` varchar(254) NOT NULL COMMENT 'Ubicación geográfica.',
  `address` text NOT NULL COMMENT 'Dirección de ubicación',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COMMENT='Distribución geográfica de las librerias o sucursales';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `nationality_type`
--

DROP TABLE IF EXISTS `nationality_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nationality_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla nationality.',
  `description` varchar(254) NOT NULL COMMENT 'Descripción o denominación del nationality',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del nationality.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del nationality.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Contien los tipo de nacionalidad que se asignan a un cliente en particular. (1 => Natural, 2 => Extranjera, 3 => Nacionalizada)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la empresa.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del pedido.',
  `suppliers_id` int(10) unsigned NOT NULL COMMENT 'Identificador del proveedor de mercancia.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del pedido.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del pedido.',
  PRIMARY KEY (`id`),
  KEY `fk_orders_suppliers_id_idx` (`suppliers_id`),
  KEY `fk_orders_business_id_idx` (`business_id`),
  CONSTRAINT `fk_orders_business_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_suppliers_id` FOREIGN KEY (`suppliers_id`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Contiene el registro maestro de los pedidos de mercancia hechos por la empresa para ser distribuidos entre las sucurales o librerías.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Correlatico de la tabla.',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería destino.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del articulo que será enviado a la una sucursal o librería en particular.',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad solicitada.',
  `unit_cost` double NOT NULL DEFAULT '0' COMMENT 'Costo unitario del árticulo.',
  `orders_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la orden o solicitud de mercancia.',
  `condition_id` int(10) unsigned NOT NULL COMMENT 'Identificador del tipo de condición con que será enviado el articulo.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  PRIMARY KEY (`id`),
  KEY `fk_orders_items_orders_id_idx` (`orders_id`),
  KEY `fk_orders_items_catalog_id_idx` (`catalog_id`),
  KEY `fk_orders_items_bookshop_id_idx` (`bookshop_id`),
  CONSTRAINT `fk_orders_items_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `bookshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_items_catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_items_orders_id` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34844 DEFAULT CHARSET=utf8 COMMENT='Contiene el registro detalle de los pedidos de mercancia hechos por la empresa para las sucurales o librerías.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `payment_methods`
--

DROP TABLE IF EXISTS `payment_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payment_methods` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del método de pago.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del método de pago.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del método de pago.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `method_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Contiene el listado de métodos de pagos disponibles para el sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `prices`
--

DROP TABLE IF EXISTS `prices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `order_id` int(10) unsigned NOT NULL COMMENT 'identificador de la orden de compra de origen.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo en el catalogo.',
  `catalog_code` varchar(20) NOT NULL COMMENT 'Código del articulo en catálogo.',
  `unit_cost` double NOT NULL DEFAULT '0' COMMENT 'Precio o costo unitario.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del precio del árticulo.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del precio del árticulo.',
  PRIMARY KEY (`id`),
  KEY `fk_prices_catalog_id_idx` (`catalog_id`),
  CONSTRAINT `fk_prices_catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=34844 DEFAULT CHARSET=utf8 COMMENT='Contiene el listado de precios y cambios de precios asociados a los articulos registrados en el sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `regions`
--

DROP TABLE IF EXISTS `regions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción de la región.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Contiene la división regional del país.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `replenishments`
--

DROP TABLE IF EXISTS `replenishments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replenishments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal o librería.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador de la solicitud de reposición.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la reposición.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la reposición.',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el maestro de las solicitud de reposiciones de inventario de mercancia hechas por la  sucursal o librería.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `replenishments_items`
--

DROP TABLE IF EXISTS `replenishments_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `replenishments_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `replenishments_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la reposición de mercancia.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo solicitado.',
  `system_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad en sistema.',
  `ordered_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad solicitada.',
  `approved_quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad aprobada.',
  PRIMARY KEY (`id`),
  KEY `fk_replenishments_items_replenishments_id_idx` (`replenishments_id`),
  CONSTRAINT `fk_replenishments_items_replenishments_id` FOREIGN KEY (`replenishments_id`) REFERENCES `replenishments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el detalle de las reposiciones de inventario de mercancia hechas por la  sucursal o librería.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `roles_type`
--

DROP TABLE IF EXISTS `roles_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla roles.',
  `description` varchar(254) NOT NULL COMMENT 'Descripción o denominación del rol',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del rol.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del rol.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='Contien los distintos roles que se asignan a un usuario en particular. (1 => Vendedor, 2 => Encargado, 3 => Administrador)';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `sellers`
--

DROP TABLE IF EXISTS `sellers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sellers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la Tabla',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la empresa donde labora.',
  `identity_card` varchar(45) NOT NULL COMMENT 'Documento de Identificación (Cédula, Rif, etc...)',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del vendedor.',
  `birthdate` date NOT NULL COMMENT 'Fecha de nacimiento.',
  `address` varchar(254) NOT NULL DEFAULT 'NA' COMMENT 'Dirección de habitación del vendedor.',
  `phone` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Teléfono de contacto del vendedor.',
  `email` varchar(254) NOT NULL DEFAULT 'NA',
  `gender_id` int(10) unsigned NOT NULL DEFAULT '1',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificación del Usuario que registra al vendedor.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del vendedor.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del vendedor.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `identification_UNIQUE` (`identity_card`),
  KEY `fk_sellers_business_id_idx` (`business_id`),
  CONSTRAINT `fk_sellers_business_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene los vendedores o libreros registrados en la red de librerías.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `status_type`
--

DROP TABLE IF EXISTS `status_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status_type` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla',
  `description` varchar(254) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `status_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Contiene los estatus asociados a los objetos dentro de la base de datos del sistema';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la empresa.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario que registra el proveedor en el sistema.',
  `identity_card` varchar(45) NOT NULL COMMENT 'Documento de identificación (Cédula, Rif, etc...).',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del proveedor.',
  `phone` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Teléfono de contacto.',
  `facsimile` varchar(45) NOT NULL DEFAULT '0' COMMENT 'Teléfono fax de contacto.',
  `address` text COMMENT 'Dirección de contacto.',
  `website` varchar(254) DEFAULT NULL COMMENT 'Página web del proveedor.',
  `email` varchar(254) DEFAULT NULL COMMENT 'Correo electrónico de contacto.',
  `issuing_entity_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Entidad emisora del instrumento de pago.',
  `bank_account` varchar(20) NOT NULL DEFAULT '00000000000000000000' COMMENT 'Cuenta bancaria asociada al proveedor.',
  `type_id` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Tipo de proveedor (1=>Natural, 2=>Juridico, 3=>Extranjero).',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del proveedor.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del proveedor.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `identity_card_UNIQUE` (`identity_card`),
  UNIQUE KEY `description_UNIQUE` (`description`),
  KEY `fk_suppliers_business_id_idx` (`business_id`),
  KEY `fk_suppliers_issuing_entity_id_idx` (`issuing_entity_id`),
  CONSTRAINT `fk_suppliers_business_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_suppliers_issuing_entity_id` FOREIGN KEY (`issuing_entity_id`) REFERENCES `issuing_entity` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='Contiene el listado de los proveedores de mercancia.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `taxes`
--

DROP TABLE IF EXISTS `taxes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `taxes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del impuesto.',
  `rate` double NOT NULL DEFAULT '0' COMMENT 'Porcentaje de impuesto.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del impuesto.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del impuesto.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del impuesto.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los tipo de impuestos disponibles para ser aplicado a la facturación.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla',
  `sellers_id` int(10) unsigned NOT NULL COMMENT 'Identificador del vendedor asociado al usuario que accede al sistema',
  `username` varchar(254) NOT NULL COMMENT 'Nombre de Usuario',
  `password` varchar(128) NOT NULL COMMENT 'Clave de accedo al sistema',
  `role` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'roles de usuario (1=>vendedor, 2=>usuario, 3=>administrador)',
  `by_id` int(10) unsigned NOT NULL DEFAULT '1',
  `bookshop_id` int(10) unsigned NOT NULL DEFAULT '1',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del usuario.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del usuario.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `identification_unique` (`username`),
  UNIQUE KEY `seller_id_unique` (`sellers_id`),
  KEY `fk_users_roles_id_idx` (`role`),
  CONSTRAINT `fk_user_seller_id` FOREIGN KEY (`sellers_id`) REFERENCES `sellers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_roles_id` FOREIGN KEY (`role`) REFERENCES `roles_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=210 DEFAULT CHARSET=utf8 COMMENT='Tabla que contiene los usuarios que acceden al sistema.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_hash_bookshop`
--

DROP TABLE IF EXISTS `users_hash_bookshop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_hash_bookshop` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla',
  `bookshop_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la sucursal asignada.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario asociado a la sucursal.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del registro.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del registro.',
  PRIMARY KEY (`bookshop_id`,`users_id`),
  KEY `fk_user_session_user_id` (`users_id`),
  KEY `fk_users_hash_bookshop_bookshop_id_idx` (`bookshop_id`),
  KEY `users_hash_bookshop_id_idx` (`id`),
  CONSTRAINT `fk_users_hash_bookshop_bookshop_id` FOREIGN KEY (`bookshop_id`) REFERENCES `bookshop` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_hash_bookshop_user_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='Contiene el registro de las sucursales a las que tiene acceso un determinado usuario';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `users_session`
--

DROP TABLE IF EXISTS `users_session`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_session` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Identificador de la Sesión',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario que inicia sesión',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación de la sesión.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación de la sesión.',
  PRIMARY KEY (`id`),
  KEY `fk_user_session_user_id` (`users_id`),
  CONSTRAINT `fk_user_session_user_id` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contien el registro de las sesiones iniciadas por los usuarios y su estatus.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `warehouse`
--

DROP TABLE IF EXISTS `warehouse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `business_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la empresa.',
  `description` varchar(254) NOT NULL COMMENT 'Denominación o descripción del almacen.',
  `users_id` int(10) unsigned NOT NULL COMMENT 'Identificador del usuario creador del almacen.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del almacen.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del almacen.',
  PRIMARY KEY (`id`),
  KEY `fk_warehouse_bussines_id_idx` (`business_id`),
  CONSTRAINT `fk_warehouse_bussines_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los almacenes registrados para una empresa determinada.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `warehouse_movement`
--

DROP TABLE IF EXISTS `warehouse_movement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse_movement` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `warehouse_id` int(10) unsigned NOT NULL COMMENT 'Identificador de la almacen.',
  `movement_type_id` int(10) unsigned NOT NULL COMMENT 'Tipo de movimiento (1=> Entrada, 2 => Salida).',
  `users_id` int(10) unsigned NOT NULL,
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del movimiento.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Identificador del usuario creador del movimiento.',
  PRIMARY KEY (`id`),
  KEY `fk_warehouse_movement_warehouse_id_idx` (`warehouse_id`),
  CONSTRAINT `fk_warehouse_movement_warehouse_id` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el maestro de los movimientos de mercancia realizados en el almacen de la empresa.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `warehouse_movement_items`
--

DROP TABLE IF EXISTS `warehouse_movement_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `warehouse_movement_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla.',
  `warehouse_movement_id` int(10) unsigned NOT NULL COMMENT 'Identificador del movimiento de almacen.',
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo registrado en el movimiento.',
  `quantity` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Cantidad de registrada en el movimiento.',
  PRIMARY KEY (`id`),
  KEY `fk_warehouse_movement_id_idx` (`warehouse_movement_id`),
  CONSTRAINT `fk_warehouse_movement_id` FOREIGN KEY (`warehouse_movement_id`) REFERENCES `warehouse_movement` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el detalle de los movimientos de mercancia realizados en el almacen de la empresa.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'bookshop'
--

--
-- Dumping routines for database 'bookshop'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-06-21  3:15:14
