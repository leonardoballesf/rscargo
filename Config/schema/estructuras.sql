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
-- Current Database: `bookshop`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `bookshop` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `bookshop`;

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
-- Table structure for table `condition`
--

DROP TABLE IF EXISTS `condition`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `condition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la tabla',
  `description` varchar(254) NOT NULL COMMENT 'Denominación de la condición.',
  PRIMARY KEY (`id`),
  UNIQUE KEY `condition_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='Contiene las condiciones asociados a los pedidos de mercancia dentro de la base de datos del sistema.';
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los tipo de descuentos disponibles para ser aplicado a la facturación.';
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene los descuentos asociados a los articulos dentro de la base de datos del sistema.';
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
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del pedido.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del pedido.',
  PRIMARY KEY (`id`),
  KEY `fk_orders_suppliers_id_idx` (`suppliers_id`),
  KEY `fk_orders_business_id_idx` (`business_id`),
  CONSTRAINT `fk_orders_business_id` FOREIGN KEY (`business_id`) REFERENCES `business` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_orders_suppliers_id` FOREIGN KEY (`suppliers_id`) REFERENCES `suppliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro maestro de los pedidos de mercancia hechos por la empresa para ser distribuidos entre las sucurales o librerías.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `orders_items`
--

DROP TABLE IF EXISTS `orders_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders_items` (
  `id` int(11) NOT NULL COMMENT 'Correlatico de la tabla.',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el registro detalle de los pedidos de mercancia hechos por la empresa para las sucurales o librerías.';
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
  `catalog_id` int(10) unsigned NOT NULL COMMENT 'Identificador del árticulo en el catalogo.',
  `catalog_code` varchar(20) NOT NULL COMMENT 'Código del articulo en catálogo.',
  `unit_cost` double NOT NULL DEFAULT '0' COMMENT 'Precio o costo unitario.',
  `is_active` int(10) unsigned NOT NULL DEFAULT '1' COMMENT 'Estatus (1=>Activo(a), 2=>Inactivo(a))',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Fecha de creación del precio del árticulo.',
  `modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP COMMENT 'Fecha de última modificación del precio del árticulo.',
  PRIMARY KEY (`id`),
  KEY `fk_prices_catalog_id_idx` (`catalog_id`),
  CONSTRAINT `fk_prices_catalog_id` FOREIGN KEY (`catalog_id`) REFERENCES `catalog` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Contiene el listado de precios y cambios de precios asociados a los articulos registrados en el sistema.';
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

--
-- Current Database: `pglibreria`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `pglibreria` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `pglibreria`;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Correlativo de la Tabla',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tabla que almacena los datos de los clientes.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `log_sesiones`
--

DROP TABLE IF EXISTS `log_sesiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_sesiones` (
  `id_sesiones` int(11) NOT NULL AUTO_INCREMENT,
  `sesiones_us_nom` varchar(255) DEFAULT NULL,
  `sesiones_us_ha` datetime DEFAULT NULL,
  `sesiones_us_ex` datetime DEFAULT NULL,
  `id_user` int(10) unsigned NOT NULL,
  `expirada` int(10) unsigned NOT NULL DEFAULT '9',
  `id_sucursal` int(10) unsigned NOT NULL DEFAULT '45',
  `estatus` int(10) unsigned NOT NULL DEFAULT '9',
  PRIMARY KEY (`id_sesiones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_audinventario`
--

DROP TABLE IF EXISTS `tbl_audinventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_audinventario` (
  `id_audinventario` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_invent` varchar(100) NOT NULL,
  `f_inventario` datetime NOT NULL COMMENT 'Fecha de inicio de inventario',
  `responsable` varchar(50) NOT NULL COMMENT 'usuario responsable',
  `sucursal` int(11) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '6',
  `f_culminacion` datetime DEFAULT NULL,
  `correlativo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cod_invent`,`sucursal`),
  KEY `new_index` (`id_audinventario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 15360 kB';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_autor`
--

DROP TABLE IF EXISTS `tbl_autor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_autor` (
  `id_autor` int(11) NOT NULL DEFAULT '0',
  `aut_nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`id_autor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_bancos`
--

DROP TABLE IF EXISTS `tbl_bancos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bancos` (
  `id_tbl_bancos` int(10) unsigned NOT NULL,
  `banco` varchar(100) NOT NULL,
  PRIMARY KEY (`id_tbl_bancos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_bonolibro`
--

DROP TABLE IF EXISTS `tbl_bonolibro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bonolibro` (
  `cod_beneficiario` int(11) DEFAULT NULL,
  `ci_beneficiario` int(11) DEFAULT NULL,
  `nom_beneficiario` varchar(60) NOT NULL,
  `num_tarjeta` varchar(30) NOT NULL,
  `saldo_inicial` double(11,11) NOT NULL,
  `saldo_actual` double(11,11) NOT NULL,
  `entidad` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_chat`
--

DROP TABLE IF EXISTS `tbl_chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_chat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(100) NOT NULL,
  `mensaje` text NOT NULL,
  `sucursal` int(10) unsigned NOT NULL,
  `estatus` int(10) unsigned NOT NULL DEFAULT '1',
  `tipo` int(10) unsigned NOT NULL DEFAULT '1',
  `fecha` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `iduser` int(10) unsigned NOT NULL DEFAULT '1',
  `iduserd` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_cierre`
--

DROP TABLE IF EXISTS `tbl_cierre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cierre` (
  `id_cierrecaja` int(13) unsigned NOT NULL AUTO_INCREMENT,
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
  `fecha_cierre` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cierrecaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_cierremes`
--

DROP TABLE IF EXISTS `tbl_cierremes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cierremes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mes` int(10) unsigned NOT NULL DEFAULT '0',
  `anio` int(11) DEFAULT NULL,
  `estatus` int(10) unsigned NOT NULL DEFAULT '6',
  `fecha_cierre` datetime DEFAULT NULL,
  `cerrado_por` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_cliente`
--

DROP TABLE IF EXISTS `tbl_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cliente` (
  `id_cliente` int(11) NOT NULL AUTO_INCREMENT,
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
  `fecha_inclusion` datetime DEFAULT NULL,
  PRIMARY KEY (`id_cliente`),
  UNIQUE KEY `Index_2` (`cli_cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=23999 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_codigos`
--

DROP TABLE IF EXISTS `tbl_codigos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_codigos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `codigo` varchar(45) NOT NULL,
  `cantidad` int(10) unsigned NOT NULL DEFAULT '0',
  `precio` double unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `Index_2` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_coleccion`
--

DROP TABLE IF EXISTS `tbl_coleccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_coleccion` (
  `id_coleccion` int(11) NOT NULL AUTO_INCREMENT,
  `col_descripcion` varchar(150) NOT NULL,
  PRIMARY KEY (`id_coleccion`),
  UNIQUE KEY `col_descripcion` (`col_descripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_condicion`
--

DROP TABLE IF EXISTS `tbl_condicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_condicion` (
  `id_condicion` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cond_descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`id_condicion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_descuento`
--

DROP TABLE IF EXISTS `tbl_descuento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_descuento` (
  `id_descuento` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `des_porcentaje` float NOT NULL,
  `porcentaje` float NOT NULL,
  PRIMARY KEY (`id_descuento`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_detalleinventario`
--

DROP TABLE IF EXISTS `tbl_detalleinventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_detalleinventario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_invent` varchar(100) NOT NULL DEFAULT '',
  `cod_producto` varchar(100) NOT NULL DEFAULT '',
  `sucursal` int(10) unsigned NOT NULL DEFAULT '0',
  `condicion` int(10) unsigned NOT NULL DEFAULT '0',
  `cant_sist` int(10) unsigned NOT NULL DEFAULT '0',
  `cant_fisc` int(10) unsigned NOT NULL DEFAULT '0',
  `estatus` int(10) unsigned NOT NULL DEFAULT '6',
  PRIMARY KEY (`cod_invent`,`cod_producto`,`sucursal`,`condicion`),
  KEY `Index_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_devolucioncliente`
--

DROP TABLE IF EXISTS `tbl_devolucioncliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_devolucioncliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cod_cliente` int(11) DEFAULT NULL,
  `cod_factura` varchar(30) NOT NULL,
  `sucursal` int(11) NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `procesadopor` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_devolucionlibreria`
--

DROP TABLE IF EXISTS `tbl_devolucionlibreria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_devolucionlibreria` (
  `id_devolucion` int(11) NOT NULL AUTO_INCREMENT,
  `cod_dev` varchar(100) NOT NULL,
  `sucursal` int(11) NOT NULL,
  `responsable` int(11) NOT NULL COMMENT 'Usuario creador',
  `f_inclusion` date NOT NULL COMMENT 'Fecha de creacion',
  `estatus` int(11) NOT NULL COMMENT 'Estatus (pendiente,procesado)',
  `_modificacion` date NOT NULL COMMENT 'Fecha de modificacion',
  `mod_por` int(11) NOT NULL COMMENT 'Usuario modificador',
  `tld` int(11) NOT NULL COMMENT 'Total libros devueltos',
  PRIMARY KEY (`cod_dev`,`sucursal`),
  KEY `new_index` (`id_devolucion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_distinventario`
--

DROP TABLE IF EXISTS `tbl_distinventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_distinventario` (
  `cod_producto` varchar(100) NOT NULL,
  `descripcion` varchar(254) DEFAULT NULL,
  `autor` varchar(254) DEFAULT NULL,
  `isbn` varchar(130) DEFAULT NULL,
  `cod_barra` varchar(130) DEFAULT NULL,
  `sucursal` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000',
  `condicion` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000',
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `descuento` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`condicion`,`cod_producto`,`sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_edicion`
--

DROP TABLE IF EXISTS `tbl_edicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_edicion` (
  `edicion_id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`descripcion`),
  KEY `new_index` (`edicion_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_editorial`
--

DROP TABLE IF EXISTS `tbl_editorial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_editorial` (
  `id_editorial` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `origen` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '''Nacional o Extranjera''',
  PRIMARY KEY (`id_editorial`),
  UNIQUE KEY `Index_2` (`editorial`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_envios`
--

DROP TABLE IF EXISTS `tbl_envios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_envios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sucursal` int(11) NOT NULL,
  `archivo` varchar(100) NOT NULL,
  `fecha_envio` datetime NOT NULL,
  PRIMARY KEY (`sucursal`,`archivo`),
  KEY `new_index` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_estados`
--

DROP TABLE IF EXISTS `tbl_estados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estados` (
  `estados_id` int(10) unsigned NOT NULL,
  `estado` varchar(254) NOT NULL,
  `region_id` int(10) unsigned NOT NULL,
  `creado_por` int(11) NOT NULL COMMENT 'Usuario Creador',
  `f_modificacion` datetime NOT NULL COMMENT 'Fecha de Modificacion',
  `modificado_por` int(11) NOT NULL COMMENT 'Usuario Modificador'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_estatus`
--

DROP TABLE IF EXISTS `tbl_estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estatus` (
  `id_estatus` int(10) unsigned NOT NULL,
  `estatus` varchar(45) NOT NULL DEFAULT '',
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_expofacturas`
--

DROP TABLE IF EXISTS `tbl_expofacturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_expofacturas` (
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
  `tipofactura` int(10) unsigned zerofill NOT NULL DEFAULT '0000000003',
  PRIMARY KEY (`cod_factura`,`sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_facturas`
--

DROP TABLE IF EXISTS `tbl_facturas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_facturas` (
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
  `fec_facmanual` datetime DEFAULT NULL,
  PRIMARY KEY (`cod_factura`,`sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_formapago`
--

DROP TABLE IF EXISTS `tbl_formapago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_formapago` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `formapago` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_formato`
--

DROP TABLE IF EXISTS `tbl_formato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_formato` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_letra` char(1) NOT NULL DEFAULT '',
  `descripcion` varchar(254) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`descripcion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_horario`
--

DROP TABLE IF EXISTS `tbl_horario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_horario` (
  `id_horario` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_inventario`
--

DROP TABLE IF EXISTS `tbl_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_inventario` (
  `id_tbl_inventario` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `iva` int(10) unsigned DEFAULT '1' COMMENT 'Iva',
  PRIMARY KEY (`cod_producto`),
  KEY `Index_1` (`id_tbl_inventario`)
) ENGINE=InnoDB AUTO_INCREMENT=34842 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_itemdevolucion`
--

DROP TABLE IF EXISTS `tbl_itemdevolucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_itemdevolucion` (
  `id_item` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_devolucion` int(11) NOT NULL,
  `cod_libro` varchar(100) NOT NULL,
  `cant_devuelta` int(11) NOT NULL DEFAULT '0',
  `sucursal` int(11) NOT NULL,
  PRIMARY KEY (`cod_devolucion`,`cod_libro`,`sucursal`),
  KEY `new_index` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_itemexpofactura`
--

DROP TABLE IF EXISTS `tbl_itemexpofactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_itemexpofactura` (
  `id_itemfactura` int(11) NOT NULL AUTO_INCREMENT,
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
  `devuelto` int(10) unsigned NOT NULL DEFAULT '14',
  PRIMARY KEY (`id_itemfactura`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_itemfactura`
--

DROP TABLE IF EXISTS `tbl_itemfactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_itemfactura` (
  `id_itemfactura` int(11) NOT NULL AUTO_INCREMENT,
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
  `iva` double NOT NULL,
  PRIMARY KEY (`cod_factura`,`cod_producto`,`sucursal`,`vendedor`),
  KEY `new_index` (`id_itemfactura`)
) ENGINE=InnoDB AUTO_INCREMENT=14635 DEFAULT CHARSET=utf8 COMMENT='InnoDB free: 5120 kB';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_itemsolicitud`
--

DROP TABLE IF EXISTS `tbl_itemsolicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_itemsolicitud` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_sol` varchar(30) NOT NULL DEFAULT '0' COMMENT 'codigo de la solicitud de mercancia',
  `cod_libro` varchar(30) NOT NULL DEFAULT '0',
  `titulo` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '0',
  `costo` double NOT NULL DEFAULT '0',
  `total` double NOT NULL DEFAULT '0',
  `cantdist` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_sol`,`cod_libro`),
  KEY `Index_1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_itemtraslado`
--

DROP TABLE IF EXISTS `tbl_itemtraslado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_itemtraslado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `observacion` varchar(254) DEFAULT NULL,
  PRIMARY KEY (`sucursal`,`condicion`,`cod_t`,`cod_l`,`estatus`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_iva`
--

DROP TABLE IF EXISTS `tbl_iva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_iva` (
  `id_iva` int(11) NOT NULL DEFAULT '0',
  `valor` float NOT NULL DEFAULT '0',
  `porcentaje` double DEFAULT NULL,
  PRIMARY KEY (`id_iva`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_libreria`
--

DROP TABLE IF EXISTS `tbl_libreria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_libreria` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `libreria` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '',
  `encargado` varchar(70) NOT NULL DEFAULT '',
  `direccion` text,
  `horario` int(10) unsigned DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `correo` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  UNIQUE KEY `libreria` (`libreria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_mes`
--

DROP TABLE IF EXISTS `tbl_mes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_mes` (
  `id_mes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mes` varchar(30) NOT NULL,
  PRIMARY KEY (`id_mes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_minutos`
--

DROP TABLE IF EXISTS `tbl_minutos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_minutos` (
  `minutos` int(11) NOT NULL DEFAULT '0',
  `milisegundos` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_nivel`
--

DROP TABLE IF EXISTS `tbl_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_nivel` (
  `id_nivel` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nivel` varchar(45) NOT NULL,
  PRIMARY KEY (`id_nivel`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_notase`
--

DROP TABLE IF EXISTS `tbl_notase`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_notase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nota` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cod_libro` varchar(100) CHARACTER SET utf8 NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` double NOT NULL,
  `condicion` int(11) NOT NULL,
  `sucursal` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_pais`
--

DROP TABLE IF EXISTS `tbl_pais`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pais` (
  `id_pais` int(11) NOT NULL AUTO_INCREMENT,
  `pais` varchar(254) NOT NULL,
  PRIMARY KEY (`pais`),
  KEY `new_index` (`id_pais`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_portprint`
--

DROP TABLE IF EXISTS `tbl_portprint`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_portprint` (
  `portprint_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `puerto` varchar(50) NOT NULL,
  `dispositivo` varchar(50) NOT NULL COMMENT 'USB o Paralelo',
  PRIMARY KEY (`portprint_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_precierrecaja`
--

DROP TABLE IF EXISTS `tbl_precierrecaja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_precierrecaja` (
  `id_cierrecaja` int(13) unsigned NOT NULL AUTO_INCREMENT,
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
  `vendedor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_cierrecaja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_preferencias`
--

DROP TABLE IF EXISTS `tbl_preferencias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_preferencias` (
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
  `f_modificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`sucursal_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_proveedor`
--

DROP TABLE IF EXISTS `tbl_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_proveedor` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `proveedor` varchar(145) NOT NULL,
  `contacto` varchar(100) NOT NULL,
  `telf_oficina` varchar(15) NOT NULL DEFAULT '0',
  `telf_fax` varchar(15) NOT NULL DEFAULT '0',
  `telf_celular` varchar(15) NOT NULL DEFAULT '0',
  `direccion` varchar(250) NOT NULL,
  `tipo_proveedor` int(10) unsigned NOT NULL DEFAULT '1',
  `rif` varchar(60) DEFAULT '0',
  PRIMARY KEY (`proveedor`),
  KEY `Index_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_region`
--

DROP TABLE IF EXISTS `tbl_region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_region` (
  `id_region` int(11) NOT NULL AUTO_INCREMENT,
  `regionj` varchar(60) NOT NULL,
  PRIMARY KEY (`id_region`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_sesiones`
--

DROP TABLE IF EXISTS `tbl_sesiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sesiones` (
  `id_sesiones` int(11) NOT NULL AUTO_INCREMENT,
  `sesiones_us_nom` varchar(255) DEFAULT NULL,
  `sesiones_us_ha` datetime DEFAULT NULL,
  `sesiones_us_ex` datetime DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `id_sucursal` int(10) unsigned NOT NULL DEFAULT '45',
  `estatus` int(10) unsigned NOT NULL DEFAULT '9',
  PRIMARY KEY (`id_sesiones`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_solicitud`
--

DROP TABLE IF EXISTS `tbl_solicitud`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_solicitud` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  `correlativo` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codigo`),
  KEY `Index_2` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_subtema`
--

DROP TABLE IF EXISTS `tbl_subtema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_subtema` (
  `id_subtema` int(11) NOT NULL AUTO_INCREMENT,
  `id_tema` int(10) unsigned NOT NULL,
  `subtema` varchar(100) NOT NULL,
  PRIMARY KEY (`subtema`,`id_tema`),
  KEY `Index_2` (`id_subtema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_sucursal`
--

DROP TABLE IF EXISTS `tbl_sucursal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sucursal` (
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
  `estatus_id` int(10) unsigned DEFAULT '19',
  PRIMARY KEY (`id_sucursal`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_tema`
--

DROP TABLE IF EXISTS `tbl_tema`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tema` (
  `id_tema` int(11) NOT NULL AUTO_INCREMENT,
  `tema` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_tema`),
  UNIQUE KEY `Index_2` (`tema`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_tipocierre`
--

DROP TABLE IF EXISTS `tbl_tipocierre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipocierre` (
  `id_tipocierre` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tipocierre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_tipodelibro`
--

DROP TABLE IF EXISTS `tbl_tipodelibro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipodelibro` (
  `id_t_libro` int(11) NOT NULL AUTO_INCREMENT,
  `t_libro` varchar(100) NOT NULL,
  PRIMARY KEY (`t_libro`),
  KEY `new_index` (`id_t_libro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_tipofactura`
--

DROP TABLE IF EXISTS `tbl_tipofactura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipofactura` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipofactura` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_tipoproveedor`
--

DROP TABLE IF EXISTS `tbl_tipoproveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipoproveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipoproveedor` varchar(50) NOT NULL,
  PRIMARY KEY (`tipoproveedor`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_tomo`
--

DROP TABLE IF EXISTS `tbl_tomo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tomo` (
  `tomo_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`descripcion`),
  KEY `new_index` (`tomo_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_traslados`
--

DROP TABLE IF EXISTS `tbl_traslados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_traslados` (
  `id_traslado` int(11) NOT NULL AUTO_INCREMENT,
  `cod_traslado` varchar(30) NOT NULL,
  `estatus` int(11) NOT NULL DEFAULT '0',
  `incluidopor` int(10) unsigned DEFAULT NULL,
  `cargadopor` int(11) DEFAULT NULL,
  `fechacarga` datetime DEFAULT NULL,
  `fechainclusion` date DEFAULT NULL,
  `correlativo` int(10) unsigned NOT NULL DEFAULT '0',
  `observaciones` varchar(254) DEFAULT NULL,
  `sucursal_id` int(11) NOT NULL DEFAULT '108',
  PRIMARY KEY (`cod_traslado`),
  KEY `id_traslado` (`id_traslado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuario` (
  `id_usuario` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del Usuario',
  `us_login` varchar(60) NOT NULL COMMENT 'Login de inicio de sesion',
  `us_clave` varchar(130) NOT NULL,
  `us_nombre` varchar(30) NOT NULL,
  `us_apellido` varchar(30) NOT NULL,
  `us_sucursal` int(11) NOT NULL,
  `us_nivel` int(11) NOT NULL,
  `us_estatus` int(11) NOT NULL DEFAULT '1',
  `us_fechaingreso` date NOT NULL,
  `us_incluidopor` varchar(30) NOT NULL,
  `cedula` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `us_login` (`us_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 PACK_KEYS=0 ROW_FORMAT=COMPRESSED COMMENT='InnoDB free: 4096 kB; InnoDB free: 4096 kB';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `tbl_volumen`
--

DROP TABLE IF EXISTS `tbl_volumen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_volumen` (
  `volumen_id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`descripcion`),
  KEY `new_index` (`volumen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `wwwsqldesigner`
--

DROP TABLE IF EXISTS `wwwsqldesigner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wwwsqldesigner` (
  `keyword` varchar(30) NOT NULL DEFAULT '',
  `data` mediumtext,
  `dt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping events for database 'pglibreria'
--

--
-- Dumping routines for database 'pglibreria'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-23  7:51:47
