CREATE DATABASE  IF NOT EXISTS `amagica` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `amagica`;
-- MySQL dump 10.13  Distrib 5.6.19, for osx10.7 (i386)
--
-- Host: 127.0.0.1    Database: amagica
-- ------------------------------------------------------
-- Server version	5.6.21

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
-- Table structure for table `categoria`
--

DROP TABLE IF EXISTS `categoria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria`
--

LOCK TABLES `categoria` WRITE;
/*!40000 ALTER TABLE `categoria` DISABLE KEYS */;
INSERT INTO `categoria` VALUES (1,'Licencia',1),(2,'Actualización',1),(3,'Capacitación',1);
/*!40000 ALTER TABLE `categoria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colegio`
--

DROP TABLE IF EXISTS `colegio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colegio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comuna_id` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `n_cursos` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `calle` varchar(45) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `fono` varchar(45) DEFAULT NULL,
  `creado_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_colegio_comuna1_idx` (`comuna_id`),
  CONSTRAINT `fk_colegio_comuna1` FOREIGN KEY (`comuna_id`) REFERENCES `comuna` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colegio`
--

LOCK TABLES `colegio` WRITE;
/*!40000 ALTER TABLE `colegio` DISABLE KEYS */;
INSERT INTO `colegio` VALUES (1,672,'Colegio vacio',2,0,'Las hualtatas',1140,'+56954123456',1),(2,672,'Antártica Chilena',3,1,'Las hualtatas',1140,'+56954123456',1),(3,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(4,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(5,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(6,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(7,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(8,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(9,392,'juanito perez',2,0,'principal',354321,'+56224564568',1),(10,351,'asdasdasdasd',5,0,'123wdasd',23234234,'345345345',1),(11,351,'asdasdasdasd',5,0,'123wdasd',23234234,'345345345',1),(12,351,'asdasdasdasd',5,0,'123wdasd',23234234,'345345345',1),(13,351,'asdasdasdasd',5,0,'123wdasd',23234234,'345345345',1),(14,351,'',1,0,'',0,'',1),(15,351,'sadadasd',5,0,'sdfsdfsdf',123123,'3445645456',1),(16,351,'sadadasd',5,0,'sdfsdfsdf',123123,'3445645456',1),(17,654,'Liceo Rafael Soto Mayor',4,1,'Las tranqueras',1254,'1829391823',1),(18,351,'Ajsdasdlkjnas',4,0,'oijlaskd',12839,'912839123',5),(19,351,'Álvaro',5,0,'asdasd',23123132,'345345',1),(20,672,'Sin Colegio',0,0,NULL,NULL,NULL,1),(21,351,'asdasdasd',7,0,'asdasdasd',0,'123123123123',1),(22,672,'Antártica Chilena',2,0,'Las hualtatas',1140,'+56954123456',1),(23,674,'Colegio magico',6,1,'dsad',1230,'ss',45),(24,654,'Instituto hebreo',2,2,'avenida las condes',13400,'223563904',45),(25,351,'',1,0,'',0,'',45),(26,351,'asdasd',1,0,'',0,'',1);
/*!40000 ALTER TABLE `colegio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compra_credito`
--

DROP TABLE IF EXISTS `compra_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compra_credito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `credito_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_solicitud` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `numero_aprovacion` varchar(200) DEFAULT NULL,
  `aprovado_por` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compra_credito_usuario1_idx` (`usuario_id`),
  KEY `fk_compra_credito_credito1_idx` (`credito_id`),
  CONSTRAINT `fk_compra_credito_credito1` FOREIGN KEY (`credito_id`) REFERENCES `credito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_credito_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compra_credito`
--

LOCK TABLES `compra_credito` WRITE;
/*!40000 ALTER TABLE `compra_credito` DISABLE KEYS */;
/*!40000 ALTER TABLE `compra_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comuna`
--

DROP TABLE IF EXISTS `comuna`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comuna` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `provincia_id` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_comuna_provincia1_idx` (`provincia_id`),
  CONSTRAINT `fk_comuna_provincia1` FOREIGN KEY (`provincia_id`) REFERENCES `provincia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=693 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comuna`
--

LOCK TABLES `comuna` WRITE;
/*!40000 ALTER TABLE `comuna` DISABLE KEYS */;
INSERT INTO `comuna` VALUES (347,1,'15101','Arica'),(348,1,'15102','Camarones'),(349,2,'15201','Putre'),(350,2,'15202','General Lagos'),(351,3,'01101','Iquique'),(352,3,'01107','Alto Hospicio'),(353,4,'01401','Pozo Almonte'),(354,4,'01402','Camiña'),(355,4,'01403','Colchane'),(356,4,'01404','Huara'),(357,4,'01405','Pica'),(358,5,'02101','Antofagasta'),(359,5,'02102','Mejillones'),(360,5,'02103','Sierra Gorda'),(361,5,'02104','Taltal'),(362,6,'02201','Calama'),(363,6,'02202','Ollagüe'),(364,6,'02203','San Pedro de Atacama'),(365,7,'02301','Tocopilla'),(366,7,'02302','María Elena'),(367,8,'03101','Copiapó'),(368,8,'03102','Caldera'),(369,8,'03103','Tierra Amarilla'),(370,9,'03201','Chañaral'),(371,9,'03202','Diego de Almagro.0'),(372,10,'03301','Vallenar'),(373,10,'03302','Alto del Carmen'),(374,10,'03303','Freirina'),(375,10,'03304','Huasco'),(376,11,'04101','La Serena'),(377,11,'04102','Coquimbo'),(378,11,'04103','Andacollo'),(379,11,'04104','La Higuera'),(380,11,'04105','Paiguano'),(381,11,'04106','Vicuña'),(382,12,'04201','Illapel'),(383,12,'04202','Canela'),(384,12,'04203','Los Vilos'),(385,12,'04204','Salamanca'),(386,13,'04301','Ovalle'),(387,13,'04302','Combarbalá'),(388,13,'04303','Monte Patria'),(389,13,'04304','Punitaqui'),(390,13,'04305','Río Hurtado'),(391,14,'05101','Valparaíso'),(392,14,'05102','Casablanca'),(393,14,'05103','Concón'),(394,14,'05104','Juan Fernández'),(395,14,'05105','Puchuncaví'),(396,14,'05107','Quintero'),(397,14,'05109','Viña del Mar'),(398,15,'05201','Isla de Pascua'),(399,16,'05301','Los Andes'),(400,16,'05302','Calle Larga'),(401,16,'05303','Rinconada'),(402,16,'05304','San Esteban'),(403,17,'05401','La Ligua'),(404,17,'05402','Cabildo'),(405,17,'05403','Papudo'),(406,17,'05404','Petorca'),(407,17,'05405','Zapallar'),(408,18,'05501','Quillota'),(409,18,'05502','Calera'),(410,18,'05503','Hijuelas'),(411,18,'05504','La Cruz'),(412,18,'05506','Nogales'),(413,19,'05601','San Antonio'),(414,19,'05602','Algarrobo'),(415,19,'05603','Cartagena'),(416,19,'05604','El Quisco'),(417,19,'05605','El Tabo'),(418,19,'05606','Santo Domingo'),(419,20,'05701','San Felipe'),(420,20,'05702','Catemu'),(421,20,'05703','Llaillay'),(422,20,'05704','Panquehue'),(423,20,'05705','Putaendo'),(424,20,'05706','Santa María'),(425,21,'05801','Quilpué'),(426,21,'05802','Limache'),(427,21,'05803','Olmué'),(428,21,'05804','Villa Alemana'),(429,22,'06101','Rancagua'),(430,22,'06102','Codegua'),(431,22,'06103','Coinco'),(432,22,'06104','Coltauco'),(433,22,'06105','Doñihue'),(434,22,'06106','Graneros'),(435,22,'06107','Las Cabras'),(436,22,'06108','Machalí'),(437,22,'06109','Malloa'),(438,22,'06110','Mostazal'),(439,22,'06111','Olivar'),(440,22,'06112','Peumo'),(441,22,'06113','Pichidegua'),(442,22,'06114','Quinta de Tilcoco'),(443,22,'06115','Rengo'),(444,22,'06116','Requínoa'),(445,22,'06117','San Vicente'),(446,23,'06201','Pichilemu'),(447,23,'06202','La Estrella'),(448,23,'06203','Litueche'),(449,23,'06204','Marchihue'),(450,23,'06205','Navidad'),(451,23,'06206','Paredones'),(452,24,'06301','San Fernando'),(453,24,'06302','Chépica'),(454,24,'06303','Chimbarongo'),(455,24,'06304','Lolol'),(456,24,'06305','Nancagua'),(457,24,'06306','Palmilla'),(458,24,'06307','Peralillo'),(459,24,'06308','Placilla'),(460,24,'06309','Pumanque'),(461,24,'06310','Santa Cruz'),(462,25,'07101','Talca'),(463,25,'07102','Constitución'),(464,25,'07103','Curepto'),(465,25,'07104','Empedrado'),(466,25,'07105','Maule'),(467,25,'07106','Pelarco'),(468,25,'07107','Pencahue'),(469,25,'07108','Río Claro'),(470,25,'07109','San Clemente'),(471,25,'07110','San Rafael'),(472,26,'07201','Cauquenes'),(473,26,'07202','Chanco'),(474,26,'07203','Pelluhue'),(475,27,'07301','Curicó'),(476,27,'07302','Hualañé'),(477,27,'07303','Licantén'),(478,27,'07304','Molina'),(479,27,'07305','Rauco'),(480,27,'07306','Romeral'),(481,27,'07307','Sagrada Familia'),(482,27,'07308','Teno'),(483,27,'07309','Vichuquén'),(484,28,'07401','Linares'),(485,28,'07402','Colbún'),(486,28,'07403','Longaví'),(487,28,'07404','Parral'),(488,28,'07405','Retiro'),(489,28,'07406','San Javier'),(490,28,'07407','Villa Alegre'),(491,28,'07408','Yerbas Buenas'),(492,29,'08101','Concepción'),(493,29,'08102','Coronel'),(494,29,'08103','Chiguayante'),(495,29,'08104','Florida'),(496,29,'08105','Hualqui'),(497,29,'08106','Lota'),(498,29,'08107','Penco'),(499,29,'08108','San Pedro de la Paz'),(500,29,'08109','Santa Juana'),(501,29,'08110','Talcahuano'),(502,29,'08111','Tomé'),(503,29,'08112','Hualpén'),(504,30,'08201','Lebu'),(505,30,'08202','Arauco'),(506,30,'08203','Cañete'),(507,30,'08204','Contulmo'),(508,30,'08205','Curanilahue'),(509,30,'08206','Los Álamos'),(510,30,'08207','Tirúa'),(511,31,'08301','Los Ángeles'),(512,31,'08302','Antuco'),(513,31,'08303','Cabrero'),(514,31,'08304','Laja'),(515,31,'08305','Mulchén'),(516,31,'08306','Nacimiento'),(517,31,'08307','Negrete'),(518,31,'08308','Quilaco'),(519,31,'08309','Quilleco'),(520,31,'08310','San Rosendo'),(521,31,'08311','Santa Bárbara'),(522,31,'08312','Tucapel'),(523,31,'08313','Yumbel'),(524,31,'08314','Alto Biobío'),(525,32,'08401','Chillán'),(526,32,'08402','Bulnes'),(527,32,'08403','Cobquecura'),(528,32,'08404','Coelemu'),(529,32,'08405','Coihueco'),(530,32,'08406','Chillán Viejo'),(531,32,'08407','El Carmen'),(532,32,'08408','Ninhue'),(533,32,'08409','Ñiquén'),(534,32,'08410','Pemuco'),(535,32,'08411','Pinto'),(536,32,'08412','Portezuelo'),(537,32,'08413','Quillón'),(538,32,'08414','Quirihue'),(539,32,'08415','Ránquil'),(540,32,'08416','San Carlos'),(541,32,'08417','San Fabián'),(542,32,'08418','San Ignacio'),(543,32,'08419','San Nicolás'),(544,32,'08420','Treguaco'),(545,32,'08421','Yungay'),(546,33,'09101','Temuco'),(547,33,'09102','Carahue'),(548,33,'09103','Cunco'),(549,33,'09104','Curarrehue'),(550,33,'09105','Freire'),(551,33,'09106','Galvarino'),(552,33,'09107','Gorbea'),(553,33,'09108','Lautaro'),(554,33,'09109','Loncoche'),(555,33,'09110','Melipeuco'),(556,33,'09111','Nueva Imperial'),(557,33,'09112','Padre las Casas'),(558,33,'09113','Perquenco'),(559,33,'09114','Pitrufquén'),(560,33,'09115','Pucón'),(561,33,'09116','Saavedra'),(562,33,'09117','Teodoro Schmidt'),(563,33,'09118','Toltén'),(564,33,'09119','Vilcún'),(565,33,'09120','Villarrica'),(566,33,'09121','Cholchol'),(567,34,'09201','Angol'),(568,34,'09202','Collipulli'),(569,34,'09203','Curacautín'),(570,34,'09204','Ercilla'),(571,34,'09205','Lonquimay'),(572,34,'09206','Los Sauces'),(573,34,'09207','Lumaco'),(574,34,'09208','Purén'),(575,34,'09209','Renaico'),(576,34,'09210','Traiguén'),(577,34,'09211','Victoria'),(578,35,'14101','Valdivia'),(579,35,'14102','Corral'),(580,35,'14103','Lanco'),(581,35,'14104','Los Lagos'),(582,35,'14105','Máfil'),(583,35,'14106','Mariquina'),(584,35,'14107','Paillaco'),(585,35,'14108','Panguipulli'),(586,36,'14201','La Unión'),(587,36,'14202','Futrono'),(588,36,'14203','Lago Ranco'),(589,36,'14204','Río Bueno'),(590,37,'10101','Puerto Montt'),(591,37,'10102','Calbuco'),(592,37,'10103','Cochamó'),(593,37,'10104','Fresia'),(594,37,'10105','Frutillar'),(595,37,'10106','Los Muermos'),(596,37,'10107','Llanquihue'),(597,37,'10108','Maullín'),(598,37,'10109','Puerto Varas'),(599,38,'10201','Castro'),(600,38,'10202','Ancud'),(601,38,'10203','Chonchi'),(602,38,'10204','Curaco de Vélez'),(603,38,'10205','Dalcahue'),(604,38,'10206','Puqueldón'),(605,38,'10207','Queilén'),(606,38,'10208','Quellón'),(607,38,'10209','Quemchi'),(608,38,'10210','Quinchao'),(609,39,'10301','Osorno'),(610,39,'10302','Puerto Octay'),(611,39,'10303','Purranque'),(612,39,'10304','Puyehue'),(613,39,'10305','Río Negro'),(614,39,'10306','San Juan de la Costa'),(615,39,'10307','San Pablo'),(616,40,'10401','Chaitén'),(617,40,'10402','Futaleufú'),(618,40,'10403','Hualaihué'),(619,40,'10404','Palena'),(620,41,'11101','Coihaique'),(621,41,'11102','Lago Verde'),(622,42,'11201','Aisén'),(623,42,'11202','Cisnes'),(624,42,'11203','Guaitecas'),(625,43,'11301','Cochrane'),(626,43,'11302','O’Higgins'),(627,43,'11303','Tortel'),(628,44,'11401','Chile Chico'),(629,44,'11402','Río Ibáñez'),(630,45,'12101','Punta Arenas'),(631,45,'12102','Laguna Blanca'),(632,45,'12103','Río Verde'),(633,45,'12104','San Gregorio'),(634,46,'12201','Cabo de Hornos (Ex Navarino)'),(635,46,'12202','Antártica'),(636,47,'12301','Porvenir'),(637,47,'12302','Primavera'),(638,47,'12303','Timaukel'),(639,48,'12401','Natales'),(640,48,'12402','Torres del Paine'),(641,49,'13101','Santiago'),(642,49,'13102','Cerrillos'),(643,49,'13103','Cerro Navia'),(644,49,'13104','Conchalí'),(645,49,'13105','El Bosque'),(646,49,'13106','Estación Central'),(647,49,'13107','Huechuraba'),(648,49,'13108','Independencia'),(649,49,'13109','La Cisterna'),(650,49,'13110','La Florida'),(651,49,'13111','La Granja'),(652,49,'13112','La Pintana'),(653,49,'13113','La Reina'),(654,49,'13114','Las Condes'),(655,49,'13115','Lo Barnechea'),(656,49,'13116','Lo Espejo'),(657,49,'13117','Lo Prado'),(658,49,'13118','Macul'),(659,49,'13119','Maipú'),(660,49,'13120','Ñuñoa'),(661,49,'13121','Pedro Aguirre Cerda'),(662,49,'13122','Peñalolén'),(663,49,'13123','Providencia'),(664,49,'13124','Pudahuel'),(665,49,'13125','Quilicura'),(666,49,'13126','Quinta Normal'),(667,49,'13127','Recoleta'),(668,49,'13128','Renca'),(669,49,'13129','San Joaquín'),(670,49,'13130','San Miguel'),(671,49,'13131','San Ramón'),(672,49,'13132','Vitacura'),(673,50,'13201','Puente Alto'),(674,50,'13202','Pirque'),(675,50,'13203','San José de Maipo'),(676,51,'13301','Colina'),(677,51,'13302','Lampa'),(678,51,'13303','Tiltil'),(679,52,'13401','San Bernardo'),(680,52,'13402','Buin'),(681,52,'13403','Calera de Tango'),(682,52,'13404','Paine'),(683,53,'13501','Melipilla'),(684,53,'13502','Alhué'),(685,53,'13503','Curacaví'),(686,53,'13504','María Pinto'),(687,53,'13505','San Pedro'),(688,54,'13601','Talagante'),(689,54,'13602','El Monte'),(690,54,'13603','Isla de Maipo'),(691,54,'13604','Padre Hurtado'),(692,54,'13605','Peñaflor');
/*!40000 ALTER TABLE `comuna` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `credito`
--

DROP TABLE IF EXISTS `credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `credito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_credito_usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_credito_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credito`
--

LOCK TABLES `credito` WRITE;
/*!40000 ALTER TABLE `credito` DISABLE KEYS */;
INSERT INTO `credito` VALUES (1,15,0,'2014-10-13 17:14:17'),(2,2,1,'2014-12-16 04:25:32'),(3,5,0,'2014-10-13 15:29:36'),(4,6,0,'2014-10-13 15:29:36'),(5,7,0,'2014-10-13 15:29:36'),(6,8,0,'2014-10-13 15:29:36'),(7,62,0,'2014-10-16 10:36:46'),(8,65,0,'2014-10-16 12:58:28'),(9,66,-2,'2014-10-16 23:27:40'),(10,71,0,'2014-10-17 09:14:41');
/*!40000 ALTER TABLE `credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colegio_id` int(11) NOT NULL,
  `nivel` int(11) DEFAULT NULL,
  `curso` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_curso_colegio2_idx` (`colegio_id`),
  CONSTRAINT `fk_curso_colegio2` FOREIGN KEY (`colegio_id`) REFERENCES `colegio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,19,1,0),(2,19,2,0),(3,19,3,0),(4,19,4,0),(5,21,1,0),(6,21,2,0),(7,21,3,0),(8,21,4,0),(9,23,1,0),(10,23,2,0),(11,23,3,0),(12,23,4,0),(13,2,1,1),(14,2,1,2),(15,2,1,3),(16,2,2,1),(17,2,2,2),(18,2,2,3),(19,2,3,1),(20,2,3,2),(21,2,3,3),(22,2,4,1),(23,2,4,2),(24,2,4,3),(25,24,1,1),(26,24,1,2),(27,24,2,1),(28,24,2,2),(29,24,3,1),(30,24,3,2),(31,24,4,1),(32,24,4,2),(33,25,1,1),(34,25,2,1),(35,25,3,1),(36,25,4,1),(37,26,1,1),(38,26,2,1),(39,26,3,1),(40,26,4,1),(41,17,3,1),(42,17,3,2),(43,17,3,3),(44,17,3,0);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento`
--

DROP TABLE IF EXISTS `documento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `descr` varchar(45) DEFAULT NULL,
  `ruta` varchar(200) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_documento_producto1_idx` (`producto_id`),
  CONSTRAINT `fk_documento_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento`
--

LOCK TABLES `documento` WRITE;
/*!40000 ALTER TABLE `documento` DISABLE KEYS */;
INSERT INTO `documento` VALUES (1,5,'Manual Licencia 3ro basico español','/CLIENTES/Descargas/13.JPG',1);
/*!40000 ALTER TABLE `documento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_orden` int(11) DEFAULT NULL,
  `pregunta` varchar(500) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `evaluacion_id` int(11) NOT NULL,
  `invertido` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evaluacion_desarrollo_evaluacion1_idx` (`evaluacion_id`),
  CONSTRAINT `fk_evaluacion_desarrollo_evaluacion1` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacion_enc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=180 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
INSERT INTO `evaluacion` VALUES (1,0,'h',1,2,0),(2,0,'pregunta 1',2,3,0),(3,0,'pregunta2',1,3,0),(4,0,'prueba 1',1,4,0),(5,0,'¿prueba prueba?',1,5,0),(6,0,'prueba prueba3',1,5,0),(7,0,'prueba invertida',1,5,0),(8,1,'Sé lo que me gusta de mí',1,6,0),(9,2,'Sé las cosas que hago bien',1,6,0),(10,3,'Sé las cosas que me gusta hacer',1,6,0),(11,4,'Me siento valioso',1,6,1),(12,5,'Me gusta como soy',1,6,0),(13,6,'Me siento querido(a) por los adultos que tengo cerca',1,6,0),(14,7,'Agradezco a las personas cuando me ayudan',1,6,0),(15,8,'Pido disculpas cuando hago sentir mal a alguien',1,6,0),(16,9,'Me preocupo cuando un compañero(a) tiene algún problema',1,6,0),(17,10,'En mi curso nos llevamos bien',1,6,0),(18,11,'Mis compañeros(as) molestan a otros compañeros(as)',1,6,1),(19,12,'Mis compañeros(as) se pegan cuando se enojan',1,6,1),(20,13,'Me gusta estar en mi curso',1,6,0),(21,14,'Mis compañeros(as) me ayudan cuando lo necesito',1,6,0),(22,15,'Mis compañeros(as) comparten con los demás',1,6,0),(23,16,'Mis profesores(as) me ayudan cuando tengo problemas',1,6,0),(24,17,'Mis profesores(as) se preocupan por mí',1,6,0),(25,18,'Mis profesores(as) nos cuidan',1,6,0),(26,19,'Cuando mis compañeros pelean, mis profesores ayudan a solucionarlo',1,6,0),(27,20,'Mis profesores(as) se preocupan de que nos tratemos bien',1,6,0),(28,21,'En mi curso cumplimos las reglas',1,6,0),(29,1,'Sé lo que me gusta de mí',1,7,0),(30,2,'Sé las cosas que hago bien',1,7,0),(31,3,'Sé las cosas que me gusta hacer',1,7,0),(32,4,'Me siento valioso',1,7,1),(33,5,'Me gusta como soy',1,7,0),(34,6,'Me siento querido(a) por los adultos que tengo cerca',1,7,0),(35,7,'Agradezco a las personas cuando me ayudan',1,7,0),(36,8,'Pido disculpas cuando hago sentir mal a alguien',1,7,0),(37,9,'Me preocupo cuando un compañero(a) tiene algún problema',1,7,0),(38,10,'En mi curso nos llevamos bien',1,7,0),(39,11,'Mis compañeros(as) molestan a otros compañeros(as)',1,7,1),(40,12,'Mis compañeros(as) se pegan cuando se enojan',1,7,1),(41,13,'Me gusta estar en mi curso',1,7,0),(42,14,'Mis compañeros(as) me ayudan cuando lo necesito',1,7,0),(43,15,'Mis compañeros(as) comparten con los demás',1,7,0),(44,16,'Mis profesores(as) me ayudan cuando tengo problemas',1,7,0),(45,17,'Mis profesores(as) se preocupan por mí',1,7,0),(46,18,'Mis profesores(as) nos cuidan',1,7,0),(47,19,'Cuando mis compañeros pelean, mis profesores ayudan a solucionarlo',1,7,0),(48,20,'Mis profesores(as) se preocupan de que nos tratemos bien',1,7,0),(49,21,'En mi curso cumplimos las reglas',1,7,0),(50,1,'Sé lo que me gusta de mí',1,8,0),(51,2,'Sé las cosas que hago bien',1,8,0),(52,3,'Sé las cosas que me gusta hacer',1,8,0),(53,4,'Me siento valioso',1,8,1),(54,5,'Me gusta como soy',1,8,0),(55,6,'Me siento querido(a) por los adultos que tengo cerca',1,8,0),(56,7,'Agradezco a las personas cuando me ayudan',1,8,0),(57,8,'Pido disculpas cuando hago sentir mal a alguien',1,8,0),(58,9,'Me preocupo cuando un compañero(a) tiene algún problema',1,8,0),(59,10,'En mi curso nos llevamos bien',1,8,0),(60,11,'Mis compañeros(as) molestan a otros compañeros(as)',1,8,1),(61,12,'Mis compañeros(as) se pegan cuando se enojan',1,8,1),(62,13,'Me gusta estar en mi curso',1,8,0),(63,14,'Mis compañeros(as) me ayudan cuando lo necesito',1,8,0),(64,15,'Mis compañeros(as) comparten con los demás',1,8,0),(65,16,'Mis profesores(as) me ayudan cuando tengo problemas',1,8,0),(66,17,'Mis profesores(as) se preocupan por mí',1,8,0),(67,18,'Mis profesores(as) nos cuidan',1,8,0),(68,19,'Cuando mis compañeros pelean, mis profesores ayudan a solucionarlo',1,8,0),(69,20,'Mis profesores(as) se preocupan de que nos tratemos bien',1,8,0),(70,21,'En mi curso cumplimos las reglas',1,8,0),(71,1,'Sé lo que me gusta de mí',1,9,0),(72,2,'Sé las cosas que hago bien',1,9,0),(73,3,'Sé las cosas que me gusta hacer',1,9,0),(74,4,'Me siento valioso',1,9,1),(75,5,'Me gusta como soy',1,9,0),(76,6,'Me siento querido(a) por los adultos que tengo cerca',1,9,0),(77,7,'Agradezco a las personas cuando me ayudan',1,9,0),(78,8,'Pido disculpas cuando hago sentir mal a alguien',1,9,0),(79,9,'Me preocupo cuando un compañero(a) tiene algún problema',1,9,0),(80,10,'En mi curso nos llevamos bien',1,9,0),(81,11,'Mis compañeros(as) molestan a otros compañeros(as)',1,9,1),(82,12,'Mis compañeros(as) se pegan cuando se enojan',1,9,1),(83,13,'Me gusta estar en mi curso',1,9,0),(84,14,'Mis compañeros(as) me ayudan cuando lo necesito',1,9,0),(85,15,'Mis compañeros(as) comparten con los demás',1,9,0),(86,16,'Mis profesores(as) me ayudan cuando tengo problemas',1,9,0),(87,17,'Mis profesores(as) se preocupan por mí',1,9,0),(88,18,'Mis profesores(as) nos cuidan',1,9,0),(89,19,'Cuando mis compañeros pelean, mis profesores ayudan a solucionarlo',1,9,0),(90,20,'Mis profesores(as) se preocupan de que nos tratemos bien',1,9,0),(91,21,'En mi curso cumplimos las reglas',1,9,0),(92,1,'Sé lo que me gusta de mí',1,10,0),(93,2,'Sé las cosas que hago bien',1,10,0),(94,3,'Sé las cosas que me gusta hacer',1,10,0),(95,4,'Me siento valioso',1,10,1),(96,5,'Me gusta como soy',1,10,0),(97,6,'Me siento querido(a) por los adultos que tengo cerca',1,10,0),(98,7,'Agradezco a las personas cuando me ayudan',1,10,0),(99,8,'Pido disculpas cuando hago sentir mal a alguien',1,10,0),(100,9,'Me preocupo cuando un compañero(a) tiene algún problema',1,10,0),(101,10,'En mi curso nos llevamos bien',1,10,0),(102,11,'Mis compañeros(as) molestan a otros compañeros(as)',1,10,1),(103,12,'Mis compañeros(as) se pegan cuando se enojan',1,10,1),(104,13,'Me gusta estar en mi curso',1,10,0),(105,14,'Mis compañeros(as) me ayudan cuando lo necesito',1,10,0),(106,15,'Mis compañeros(as) comparten con los demás',1,10,0),(107,16,'Mis profesores(as) me ayudan cuando tengo problemas',1,10,0),(108,17,'Mis profesores(as) se preocupan por mí',1,10,0),(109,18,'Mis profesores(as) nos cuidan',1,10,0),(110,19,'Cuando mis compañeros pelean, mis profesores ayudan a solucionarlo',1,10,0),(111,20,'Mis profesores(as) se preocupan de que nos tratemos bien',1,10,0),(112,21,'En mi curso cumplimos las reglas',1,10,0),(113,1,'Sé lo que me gusta de mí',1,11,0),(114,2,'Sé las cosas que hago bien',1,11,0),(115,3,'Sé las cosas que me gusta hacer',1,11,0),(116,4,'Me siento valioso',1,11,1),(117,5,'Me gusta como soy',1,11,0),(118,6,'Me siento querido(a) por los adultos que tengo cerca',1,11,0),(119,7,'Agradezco a las personas cuando me ayudan',1,11,0),(120,8,'Pido disculpas cuando hago sentir mal a alguien',1,11,0),(121,9,'Me preocupo cuando un compañero(a) tiene algún problema',1,11,0),(122,10,'En mi curso nos llevamos bien',1,11,0),(123,11,'Mis compañeros(as) molestan a otros compañeros(as)',1,11,1),(124,12,'Mis compañeros(as) se pegan cuando se enojan',1,11,1),(125,13,'Me gusta estar en mi curso',1,11,0),(126,14,'Mis compañeros(as) me ayudan cuando lo necesito',1,11,0),(127,15,'Mis compañeros(as) comparten con los demás',1,11,0),(128,16,'Mis profesores(as) me ayudan cuando tengo problemas',1,11,0),(129,17,'Mis profesores(as) se preocupan por mí',1,11,0),(130,18,'Mis profesores(as) nos cuidan',1,11,0),(131,19,'Cuando mis compañeros pelean, mis profesores ayudan a solucionarlo',1,11,0),(132,20,'Mis profesores(as) se preocupan de que nos tratemos bien',1,11,0),(133,21,'En mi curso cumplimos las reglas',1,11,0),(134,1,'Sé lo que me gusta de mí',1,12,0),(135,2,'Sé las cosas que hago bien',1,12,0),(136,3,'Sé las cosas que me gusta hacer',1,12,0),(137,4,'Me siento valioso',1,12,1),(138,5,'Me gusta como soy',1,12,0),(139,6,'Me siento querido(a) por los adultos que tengo cerca',1,12,0),(140,7,'Agradezco a las personas cuando me ayudan',1,12,0),(141,8,'Pido disculpas cuando hago sentir mal a alguien',1,12,0),(142,9,'Me preocupo cuando un compañero(a) tiene algún problema',1,12,0),(143,10,'En mi curso nos llevamos bien',1,12,0),(144,11,'Mis compañeros(as) molestan a otros compañeros(as)',1,12,1),(145,12,'Mis compañeros(as) se pegan cuando se enojan',1,12,1),(146,13,'Me gusta estar en mi curso',1,12,0),(147,14,'Mis compañeros(as) me ayudan cuando lo necesito',1,12,0),(148,15,'Mis compañeros(as) comparten con los demás',1,12,0),(149,16,'Mis profesores(as) me ayudan cuando tengo problemas',1,12,0),(150,17,'Mis profesores(as) se preocupan por mí',1,12,0),(151,18,'Mis profesores(as) nos cuidan',1,12,0),(152,19,'Cuando mis compañeros pelean, mis profesores ayudan a solucionarlo',1,12,0),(153,20,'Mis profesores(as) se preocupan de que nos tratemos bien',1,12,0),(154,21,'En mi curso cumplimos las reglas',1,12,0),(155,1,'Sé lo que me gusta de mí',1,13,0),(156,2,'Sé las cosas que hago bien',1,13,0),(157,3,'Sé las cosas que me gusta hacer',1,13,0),(158,4,'Me siento valioso',1,13,1),(159,5,'Me gusta como soy',1,13,0),(160,6,'Me siento querido(a) por los adultos que tengo cerca',1,13,0),(161,7,'Agradezco a las personas cuando me ayudan',1,13,0),(162,8,'Pido disculpas cuando hago sentir mal a alguien',1,13,0),(163,9,'Me preocupo cuando un compañero(a) tiene algún problema',1,13,0),(164,10,'En mi curso nos llevamos bien',1,13,0),(165,11,'Mis compañeros(as) molestan a otros compañeros(as)',1,13,1),(166,12,'Mis compañeros(as) se pegan cuando se enojan',1,13,1),(167,13,'Me gusta estar en mi curso',1,13,0),(168,14,'Mis compañeros(as) me ayudan cuando lo necesito',1,13,0),(169,15,'Mis compañeros(as) comparten con los demás',1,13,0),(170,16,'Mis profesores(as) me ayudan cuando tengo problemas',1,13,0),(171,17,'Mis profesores(as) se preocupan por mí',1,13,0),(172,18,'Mis profesores(as) nos cuidan',1,13,0),(173,19,'Cuando mis compañeros pelean, mis profesores ayudan a solucionarlo',1,13,0),(174,20,'Mis profesores(as) se preocupan de que nos tratemos bien',1,13,0),(175,21,'En mi curso cumplimos las reglas',1,13,0),(176,0,'lqmwlkemqlkwme',1,5,1),(177,0,'lkamsdlkm',1,5,1),(178,0,'prueba',1,1,0),(179,0,'pregunta 2',1,1,0);
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion_curso`
--

DROP TABLE IF EXISTS `evaluacion_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `respuesta` varchar(45) DEFAULT NULL,
  `fecha_evaluacion` datetime DEFAULT NULL,
  `evaluacion_curso_enc_id` int(11) NOT NULL,
  `evaluacion_id` int(11) NOT NULL,
  `n_alumno` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evaluacion_curso_evaluacion_curso_enc1_idx` (`evaluacion_curso_enc_id`),
  KEY `fk_evaluacion_curso_evaluacion1_idx` (`evaluacion_id`),
  CONSTRAINT `fk_evaluacion_curso_evaluacion1` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluacion_curso_evaluacion_curso_enc1` FOREIGN KEY (`evaluacion_curso_enc_id`) REFERENCES `evaluacion_curso_enc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=597 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion_curso`
--

LOCK TABLES `evaluacion_curso` WRITE;
/*!40000 ALTER TABLE `evaluacion_curso` DISABLE KEYS */;
INSERT INTO `evaluacion_curso` VALUES (8,'1','2014-11-28 02:04:04',3,92,1,1),(9,'1','2014-11-28 02:06:04',3,93,1,1),(10,'0','2014-11-28 02:06:07',3,94,1,1),(11,'1','2014-11-28 02:06:09',3,95,1,1),(12,'0','2014-11-28 02:06:12',3,96,1,1),(13,'0','2014-11-28 02:06:15',3,97,1,1),(14,'1','2014-11-28 02:06:17',3,98,1,1),(15,'1','2014-11-28 02:06:19',3,99,1,1),(16,'1','2014-11-28 02:06:21',3,100,1,1),(17,'1','2014-11-28 02:06:27',3,101,1,1),(18,'1','2014-11-28 02:06:32',3,102,1,1),(19,'1','2014-11-28 02:06:41',3,103,1,1),(20,'1','2014-11-28 02:06:44',3,104,1,1),(21,'0','2014-11-28 02:06:48',3,105,1,1),(22,'1','2014-11-28 02:06:52',3,106,1,1),(23,'0','2014-11-28 02:06:54',3,107,1,1),(24,'0','2014-11-28 02:06:56',3,108,1,1),(25,'0','2014-11-28 02:06:59',3,109,1,1),(26,'1','2014-11-28 02:07:08',3,110,1,1),(27,'1','2014-11-28 02:07:09',3,111,1,1),(28,'1','2014-11-28 02:08:20',3,92,2,1),(29,'1','2014-11-28 02:08:21',3,93,2,1),(30,'1','2014-11-28 02:08:22',3,94,2,1),(31,'1','2014-11-28 02:08:22',3,95,2,1),(32,'1','2014-11-28 02:08:24',3,96,2,1),(33,'1','2014-11-28 02:08:34',3,97,2,1),(34,'1','2014-11-28 02:08:34',3,98,2,1),(35,'1','2014-11-28 02:08:34',3,99,2,1),(36,'1','2014-11-28 02:08:35',3,100,2,1),(37,'1','2014-11-28 02:08:35',3,101,2,1),(38,'1','2014-11-28 02:08:35',3,102,2,1),(39,'1','2014-11-28 02:08:35',3,103,2,1),(40,'1','2014-11-28 02:08:36',3,104,2,1),(41,'1','2014-11-28 02:08:36',3,105,2,1),(42,'1','2014-11-28 02:08:36',3,106,2,1),(43,'1','2014-11-28 02:08:36',3,107,2,1),(44,'1','2014-11-28 02:08:37',3,108,2,1),(45,'1','2014-11-28 02:08:37',3,109,2,1),(46,'1','2014-11-28 02:08:38',3,110,2,1),(47,'1','2014-11-28 02:08:38',3,111,2,1),(48,'1','2014-11-28 02:09:26',3,92,12,1),(49,'1','2014-11-28 02:09:29',3,93,12,1),(50,'1','2014-11-28 02:09:33',3,94,12,1),(51,'1','2014-11-28 02:09:36',3,95,12,1),(52,'1','2014-11-28 02:09:37',3,96,12,1),(53,'1','2014-11-28 02:09:39',3,97,12,1),(54,'1','2014-11-28 02:09:41',3,98,12,1),(55,'1','2014-11-28 02:09:43',3,99,12,1),(56,'1','2014-11-28 02:09:45',3,100,12,1),(57,'1','2014-11-28 02:09:46',3,101,12,1),(58,'1','2014-11-28 02:09:47',3,102,12,1),(59,'1','2014-11-28 02:09:49',3,103,12,1),(60,'1','2014-11-28 02:09:50',3,104,12,1),(61,'1','2014-11-28 02:09:51',3,105,12,1),(62,'1','2014-11-28 02:09:52',3,106,12,1),(63,'1','2014-11-28 02:09:59',3,107,12,1),(64,'1','2014-11-28 02:10:06',3,108,12,1),(65,'1','2014-11-28 02:10:08',3,109,12,1),(66,'1','2014-11-28 02:10:09',3,110,12,1),(67,'1','2014-11-28 02:10:11',3,111,12,1),(68,'1','2014-11-28 02:11:27',3,92,4,1),(69,'1','2014-11-28 02:11:28',3,93,4,1),(70,'1','2014-11-28 02:11:28',3,94,4,1),(71,'1','2014-11-28 02:11:28',3,95,4,1),(72,'1','2014-11-28 02:11:29',3,96,4,1),(73,'1','2014-11-28 02:11:30',3,97,4,1),(74,'1','2014-11-28 02:11:30',3,98,4,1),(75,'1','2014-11-28 02:11:31',3,99,4,1),(76,'1','2014-11-28 02:11:31',3,100,4,1),(77,'1','2014-11-28 02:11:31',3,101,4,1),(78,'1','2014-11-28 02:11:32',3,102,4,1),(79,'1','2014-11-28 02:11:32',3,103,4,1),(80,'1','2014-11-28 02:11:33',3,104,4,1),(81,'1','2014-11-28 02:11:33',3,105,4,1),(82,'1','2014-11-28 02:11:34',3,106,4,1),(83,'1','2014-11-28 02:11:34',3,107,4,1),(84,'1','2014-11-28 02:11:34',3,108,4,1),(85,'1','2014-11-28 02:11:36',3,109,4,1),(86,'1','2014-11-28 02:11:36',3,110,4,1),(87,'1','2014-11-28 02:11:36',3,111,4,1),(88,'1','2014-11-28 02:11:37',3,112,4,1),(89,'1','2014-11-28 02:13:58',3,92,5,0),(90,'0','2014-11-28 02:14:05',3,92,5,0),(91,'1','2014-11-28 02:14:11',3,92,5,0),(92,'1','2014-11-28 02:14:23',3,92,5,0),(93,'1','2014-11-28 02:14:24',3,92,5,0),(94,'1','2014-11-28 02:14:25',3,92,5,0),(95,'1','2014-11-28 02:14:25',3,92,5,0),(96,'1','2014-11-28 02:14:25',3,92,5,0),(97,'1','2014-11-28 02:14:26',3,92,5,0),(98,'1','2014-11-28 02:14:38',3,92,5,0),(99,'1','2014-11-28 02:15:14',3,92,5,1),(100,'1','2014-11-28 02:16:59',3,92,5,1),(101,'1','2014-11-28 02:17:01',3,93,5,1),(102,'1','2014-11-28 02:17:02',3,94,5,1),(103,'1','2014-11-28 02:17:04',3,95,5,1),(104,'1','2014-11-28 02:17:05',3,96,5,1),(105,'1','2014-11-28 02:17:07',3,97,5,1),(106,'1','2014-11-28 02:17:08',3,98,5,1),(107,'1','2014-11-28 02:17:09',3,99,5,1),(108,'1','2014-11-28 02:17:10',3,100,5,1),(109,'1','2014-11-28 02:17:11',3,101,5,1),(110,'1','2014-11-28 02:17:12',3,102,5,1),(111,'1','2014-11-28 02:17:13',3,103,5,1),(112,'1','2014-11-28 02:17:14',3,104,5,1),(113,'1','2014-11-28 02:17:15',3,105,5,1),(114,'1','2014-11-28 02:17:16',3,106,5,1),(115,'1','2014-11-28 02:17:17',3,107,5,1),(116,'1','2014-11-28 02:17:18',3,108,5,1),(117,'1','2014-11-28 02:17:19',3,109,5,1),(118,'1','2014-11-28 02:17:19',3,110,5,1),(119,'1','2014-11-28 02:17:20',3,111,5,1),(120,'1','2014-11-28 02:17:22',3,112,5,1),(121,'1','2014-11-28 02:18:18',3,92,5,1),(122,'0','2014-11-28 02:18:19',3,93,5,1),(123,'1','2014-11-28 02:18:20',3,94,5,1),(124,'0','2014-11-28 02:18:21',3,95,5,1),(125,'1','2014-11-28 02:18:22',3,96,5,1),(126,'0','2014-11-28 02:18:22',3,97,5,1),(127,'1','2014-11-28 02:18:23',3,98,5,1),(128,'0','2014-11-28 02:18:24',3,99,5,1),(129,'1','2014-11-28 02:18:25',3,100,5,1),(130,'0','2014-11-28 02:18:26',3,101,5,1),(131,'1','2014-11-28 02:18:26',3,102,5,1),(132,'0','2014-11-28 02:18:27',3,103,5,1),(133,'1','2014-11-28 02:18:28',3,104,5,1),(134,'0','2014-11-28 02:18:29',3,105,5,1),(135,'1','2014-11-28 02:18:30',3,106,5,1),(136,'0','2014-11-28 02:18:31',3,107,5,1),(137,'1','2014-11-28 02:18:32',3,108,5,1),(138,'0','2014-11-28 02:18:33',3,109,5,1),(139,'1','2014-11-28 02:18:33',3,110,5,1),(140,'0','2014-11-28 02:18:34',3,111,5,1),(141,'1','2014-11-28 02:19:29',3,92,5,1),(142,'1','2014-11-28 02:19:31',3,93,5,1),(143,'0','2014-11-28 02:19:32',3,94,5,1),(144,'1','2014-11-28 02:19:32',3,95,5,1),(145,'0','2014-11-28 02:19:33',3,96,5,1),(146,'1','2014-11-28 02:19:34',3,97,5,1),(147,'1','2014-11-28 02:19:35',3,98,5,1),(148,'1','2014-11-28 02:19:35',3,99,5,1),(149,'0','2014-11-28 02:19:36',3,100,5,1),(150,'1','2014-11-28 02:19:37',3,101,5,1),(151,'0','2014-11-28 02:19:38',3,102,5,1),(152,'1','2014-11-28 02:19:38',3,103,5,1),(153,'1','2014-11-28 02:19:39',3,104,5,1),(154,'0','2014-11-28 02:19:40',3,105,5,1),(155,'1','2014-11-28 02:19:40',3,106,5,1),(156,'1','2014-11-28 02:19:41',3,107,5,1),(157,'0','2014-11-28 02:19:42',3,108,5,1),(158,'1','2014-11-28 02:19:42',3,109,5,1),(159,'0','2014-11-28 02:19:44',3,110,5,1),(160,'1','2014-11-28 02:19:44',3,111,5,1),(161,'1','2014-11-28 02:19:46',3,112,5,1),(162,'1','2014-11-28 02:20:07',3,92,5,1),(163,'0','2014-11-28 02:20:09',3,93,5,1),(164,'1','2014-11-28 02:20:10',3,94,5,1),(165,'0','2014-11-28 02:20:11',3,95,5,1),(166,'1','2014-11-28 02:20:12',3,96,5,1),(167,'0','2014-11-28 02:20:15',3,97,5,1),(168,'1','2014-11-28 02:20:17',3,98,5,1),(169,'0','2014-11-28 02:20:19',3,99,5,1),(170,'1','2014-11-28 02:20:20',3,100,5,1),(171,'0','2014-11-28 02:20:21',3,101,5,1),(172,'1','2014-11-28 02:20:22',3,102,5,1),(173,'0','2014-11-28 02:20:23',3,103,5,1),(174,'1','2014-11-28 02:20:24',3,104,5,1),(175,'0','2014-11-28 02:20:26',3,105,5,1),(176,'1','2014-11-28 02:20:27',3,106,5,1),(177,'0','2014-11-28 02:20:28',3,107,5,1),(178,'1','2014-11-28 02:20:29',3,108,5,1),(179,'0','2014-11-28 02:20:30',3,109,5,1),(180,'1','2014-11-28 02:20:31',3,110,5,1),(181,'1','2014-11-28 02:20:35',3,111,5,1),(182,'1','2014-11-28 02:20:40',3,112,5,1),(183,'1','2014-11-28 02:21:12',3,92,5,1),(184,'1','2014-11-28 02:21:21',3,93,5,1),(185,'0','2014-11-28 02:21:23',3,94,5,1),(186,'0','2014-11-28 02:21:25',3,95,5,1),(187,'1','2014-11-28 02:21:26',3,96,5,1),(188,'1','2014-11-28 02:21:28',3,97,5,1),(189,'1','2014-11-28 02:21:30',3,98,5,1),(190,'1','2014-11-28 02:21:31',3,99,5,1),(191,'1','2014-11-28 02:21:32',3,100,5,1),(192,'0','2014-11-28 02:21:34',3,101,5,1),(193,'1','2014-11-28 02:21:35',3,102,5,1),(194,'1','2014-11-28 02:21:36',3,103,5,1),(195,'1','2014-11-28 02:21:37',3,104,5,1),(196,'0','2014-11-28 02:21:40',3,105,5,1),(197,'1','2014-11-28 02:21:41',3,106,5,1),(198,'0','2014-11-28 02:21:43',3,107,5,1),(199,'1','2014-11-28 02:21:45',3,108,5,1),(200,'0','2014-11-28 02:21:46',3,109,5,1),(201,'1','2014-11-28 02:21:50',3,110,5,1),(202,'1','2014-11-28 02:21:54',3,111,5,1),(203,'0','2014-11-28 02:21:58',3,112,5,1),(204,'1','2014-11-28 02:22:42',3,92,5,1),(205,'0','2014-11-28 02:22:43',3,93,5,1),(206,'1','2014-11-28 02:22:44',3,94,5,1),(207,'1','2014-11-28 02:22:45',3,95,5,1),(208,'0','2014-11-28 02:22:46',3,96,5,1),(209,'1','2014-11-28 02:22:50',3,97,5,1),(210,'0','2014-11-28 02:22:51',3,98,5,1),(211,'1','2014-11-28 02:22:52',3,99,5,1),(212,'0','2014-11-28 02:22:53',3,100,5,1),(213,'1','2014-11-28 02:22:54',3,101,5,1),(214,'1','2014-11-28 02:22:55',3,102,5,1),(215,'1','2014-11-28 02:22:56',3,103,5,1),(216,'1','2014-11-28 02:22:57',3,104,5,1),(217,'1','2014-11-28 02:22:57',3,105,5,1),(218,'1','2014-11-28 02:22:58',3,106,5,1),(219,'1','2014-11-28 02:22:59',3,107,5,1),(220,'1','2014-11-28 02:23:00',3,108,5,1),(221,'0','2014-11-28 02:23:01',3,109,5,1),(222,'1','2014-11-28 02:23:03',3,110,5,1),(223,'1','2014-11-28 02:23:04',3,111,5,1),(224,'1','2014-11-28 02:23:05',3,112,5,1),(225,'1','2014-11-28 02:24:32',3,92,6,1),(226,'0','2014-11-28 02:24:33',3,93,6,1),(227,'1','2014-11-28 02:24:34',3,94,6,1),(228,'0','2014-11-28 02:24:35',3,95,6,1),(229,'1','2014-11-28 02:24:36',3,96,6,1),(230,'0','2014-11-28 02:24:37',3,97,6,1),(231,'1','2014-11-28 02:24:38',3,98,6,1),(232,'0','2014-11-28 02:24:39',3,99,6,1),(233,'1','2014-11-28 02:24:40',3,100,6,1),(234,'0','2014-11-28 02:24:41',3,101,6,1),(235,'1','2014-11-28 02:24:42',3,102,6,1),(236,'0','2014-11-28 02:24:43',3,103,6,1),(237,'1','2014-11-28 02:24:43',3,104,6,1),(238,'0','2014-11-28 02:24:44',3,105,6,1),(239,'1','2014-11-28 02:24:45',3,106,6,1),(240,'1','2014-11-28 02:24:49',3,107,6,1),(241,'0','2014-11-28 02:24:50',3,108,6,1),(242,'1','2014-11-28 02:24:51',3,109,6,1),(243,'0','2014-11-28 02:24:52',3,110,6,1),(244,'1','2014-11-28 02:24:53',3,111,6,1),(245,'1','2014-11-28 02:24:55',3,112,6,1),(246,'1','2014-11-28 02:25:12',3,92,7,1),(247,'0','2014-11-28 02:25:13',3,93,7,1),(248,'0','2014-11-28 02:25:13',3,94,7,1),(249,'0','2014-11-28 02:25:14',3,95,7,1),(250,'0','2014-11-28 02:25:15',3,96,7,1),(251,'0','2014-11-28 02:25:16',3,97,7,1),(252,'0','2014-11-28 02:25:17',3,98,7,1),(253,'0','2014-11-28 02:25:18',3,99,7,1),(254,'0','2014-11-28 02:25:19',3,100,7,1),(255,'0','2014-11-28 02:25:20',3,101,7,1),(256,'1','2014-11-28 02:25:23',3,102,7,1),(257,'1','2014-11-28 02:25:24',3,103,7,1),(258,'1','2014-11-28 02:25:25',3,104,7,1),(259,'0','2014-11-28 02:25:26',3,105,7,1),(260,'1','2014-11-28 02:25:27',3,106,7,1),(261,'1','2014-11-28 02:25:27',3,107,7,1),(262,'1','2014-11-28 02:25:28',3,108,7,1),(263,'1','2014-11-28 02:25:29',3,109,7,1),(264,'1','2014-11-28 02:25:30',3,110,7,1),(265,'1','2014-11-28 02:25:31',3,111,7,1),(266,'1','2014-11-28 02:25:32',3,112,7,1),(267,'1','2014-11-28 02:25:49',3,92,8,1),(268,'1','2014-11-28 02:25:54',3,93,8,1),(269,'1','2014-11-28 02:25:57',3,94,8,1),(270,'0','2014-11-28 02:25:59',3,95,8,1),(271,'1','2014-11-28 02:26:00',3,96,8,1),(272,'0','2014-11-28 02:26:01',3,97,8,1),(273,'1','2014-11-28 02:26:03',3,98,8,1),(274,'1','2014-11-28 02:26:05',3,99,8,1),(275,'1','2014-11-28 02:26:10',3,100,8,1),(276,'1','2014-11-28 02:26:12',3,101,8,1),(277,'1','2014-11-28 02:26:14',3,102,8,1),(278,'1','2014-11-28 02:26:15',3,103,8,1),(279,'1','2014-11-28 02:26:17',3,104,8,1),(280,'1','2014-11-28 02:26:18',3,105,8,1),(281,'1','2014-11-28 02:26:19',3,106,8,1),(282,'1','2014-11-28 02:26:20',3,107,8,1),(283,'1','2014-11-28 02:26:21',3,108,8,1),(284,'1','2014-11-28 02:26:25',3,109,8,1),(285,'1','2014-11-28 02:26:44',3,110,8,1),(286,'1','2014-11-28 02:26:46',3,111,8,1),(287,'1','2014-11-28 02:27:02',3,112,8,1),(288,'1','2014-11-28 02:28:38',3,92,10,1),(289,'1','2014-11-28 02:29:19',3,92,10,1),(290,'1','2014-11-28 02:29:22',3,93,10,1),(291,'1','2014-11-28 02:30:12',3,92,10,1),(292,'1','2014-11-28 02:30:33',3,93,10,1),(293,'1','2014-11-28 02:30:35',3,94,10,1),(294,'1','2014-11-28 02:30:50',3,95,10,1),(295,'1','2014-11-28 02:30:53',3,96,10,1),(296,'1','2014-11-28 02:30:54',3,97,10,1),(297,'1','2014-11-28 02:30:55',3,98,10,1),(298,'1','2014-11-28 02:30:57',3,99,10,1),(299,'1','2014-11-28 02:31:02',3,100,10,1),(300,'1','2014-11-28 02:31:04',3,101,10,1),(301,'1','2014-11-28 02:31:05',3,102,10,1),(302,'1','2014-11-28 02:31:06',3,103,10,1),(303,'1','2014-11-28 02:31:09',3,104,10,1),(304,'1','2014-11-28 02:31:11',3,105,10,1),(305,'1','2014-11-28 02:31:18',3,106,10,1),(306,'1','2014-11-28 02:31:21',3,107,10,1),(307,'1','2014-11-28 02:31:25',3,108,10,1),(308,'1','2014-11-28 02:31:26',3,109,10,1),(309,'1','2014-11-28 02:31:27',3,110,10,1),(310,'1','2014-11-28 02:31:29',3,111,10,1),(311,'1','2014-11-28 02:32:14',3,112,10,1),(312,'1','2014-11-28 02:33:04',3,92,13,1),(313,'1','2014-11-28 02:33:06',3,93,13,1),(314,'1','2014-11-28 02:33:08',3,94,13,1),(315,'1','2014-11-28 02:33:09',3,95,13,1),(316,'1','2014-11-28 02:33:09',3,96,13,1),(317,'1','2014-11-28 02:33:11',3,97,13,1),(318,'1','2014-11-28 02:33:12',3,98,13,1),(319,'1','2014-11-28 02:33:13',3,99,13,1),(320,'1','2014-11-28 02:33:14',3,100,13,1),(321,'1','2014-11-28 02:33:15',3,101,13,1),(322,'1','2014-11-28 02:33:16',3,102,13,1),(323,'1','2014-11-28 02:33:17',3,103,13,1),(324,'1','2014-11-28 02:33:18',3,104,13,1),(325,'1','2014-11-28 02:33:19',3,105,13,1),(326,'1','2014-11-28 02:33:20',3,106,13,1),(327,'1','2014-11-28 02:33:21',3,107,13,1),(328,'1','2014-11-28 02:33:22',3,108,13,1),(329,'1','2014-11-28 02:33:24',3,109,13,1),(330,'1','2014-11-28 02:33:25',3,110,13,1),(331,'1','2014-11-28 02:33:26',3,111,13,1),(332,'1','2014-11-28 02:33:29',3,112,13,1),(333,'1','2014-11-28 02:34:45',3,92,20,1),(334,'1','2014-11-28 02:34:49',3,93,20,1),(335,'1','2014-11-28 02:34:51',3,94,20,1),(336,'1','2014-11-28 02:34:53',3,95,20,1),(337,'1','2014-11-28 02:34:54',3,96,20,1),(338,'1','2014-11-28 02:34:55',3,97,20,1),(339,'1','2014-11-28 02:34:56',3,98,20,1),(340,'1','2014-11-28 02:34:57',3,99,20,1),(341,'1','2014-11-28 02:34:58',3,100,20,1),(342,'1','2014-11-28 02:34:59',3,101,20,1),(343,'1','2014-11-28 02:35:00',3,102,20,1),(344,'1','2014-11-28 02:35:02',3,103,20,1),(345,'1','2014-11-28 02:35:03',3,104,20,1),(346,'1','2014-11-28 02:35:03',3,105,20,1),(347,'1','2014-11-28 02:35:04',3,106,20,1),(348,'1','2014-11-28 02:35:05',3,107,20,1),(349,'1','2014-11-28 02:35:06',3,108,20,1),(350,'1','2014-11-28 02:35:07',3,109,20,1),(351,'1','2014-11-28 02:35:08',3,110,20,1),(352,'1','2014-11-28 02:35:09',3,111,20,1),(353,'1','2014-11-28 02:35:11',3,112,20,1),(354,'1','2014-11-28 02:37:23',3,92,23,1),(355,'1','2014-11-28 02:37:24',3,93,23,1),(356,'1','2014-11-28 02:37:25',3,94,23,1),(357,'1','2014-11-28 02:37:26',3,95,23,1),(358,'0','2014-11-28 02:37:28',3,96,23,1),(359,'1','2014-11-28 02:37:31',3,97,23,1),(360,'1','2014-11-28 02:37:32',3,98,23,1),(361,'1','2014-11-28 02:37:32',3,99,23,1),(362,'1','2014-11-28 02:37:33',3,100,23,1),(363,'0','2014-11-28 02:37:35',3,101,23,1),(364,'1','2014-11-28 02:37:36',3,102,23,1),(365,'0','2014-11-28 02:37:38',3,103,23,1),(366,'1','2014-11-28 02:37:39',3,104,23,1),(367,'1','2014-11-28 02:37:39',3,105,23,1),(368,'1','2014-11-28 02:37:41',3,106,23,1),(369,'1','2014-11-28 02:37:42',3,107,23,1),(370,'1','2014-11-28 02:37:44',3,108,23,1),(371,'1','2014-11-28 02:37:45',3,109,23,1),(372,'0','2014-11-28 02:37:46',3,110,23,1),(373,'1','2014-11-28 02:37:49',3,111,23,1),(374,'1','2014-11-28 02:39:35',3,92,18,1),(375,'1','2014-11-28 02:39:37',3,93,18,1),(376,'0','2014-11-28 02:39:38',3,94,18,1),(377,'1','2014-11-28 02:39:39',3,95,18,1),(378,'1','2014-11-28 02:39:41',3,96,18,1),(379,'1','2014-11-28 02:39:42',3,97,18,1),(380,'1','2014-11-28 02:39:43',3,98,18,1),(381,'1','2014-11-28 02:39:44',3,99,18,1),(382,'1','2014-11-28 02:39:45',3,100,18,1),(383,'0','2014-11-28 02:39:46',3,101,18,1),(384,'1','2014-11-28 02:39:47',3,102,18,1),(385,'0','2014-11-28 02:39:48',3,103,18,1),(386,'1','2014-11-28 02:39:49',3,104,18,1),(387,'1','2014-11-28 02:39:50',3,105,18,1),(388,'1','2014-11-28 02:39:51',3,106,18,1),(389,'1','2014-11-28 02:39:52',3,107,18,1),(390,'1','2014-11-28 02:39:53',3,108,18,1),(391,'1','2014-11-28 02:39:54',3,109,18,1),(392,'1','2014-11-28 02:39:56',3,110,18,1),(393,'1','2014-11-28 02:39:57',3,111,18,1),(394,'1','2014-11-28 02:41:12',3,92,20,1),(395,'1','2014-11-28 02:41:14',3,93,20,1),(396,'1','2014-11-28 02:41:15',3,94,20,1),(397,'0','2014-11-28 02:41:17',3,95,20,1),(398,'1','2014-11-28 02:41:17',3,96,20,1),(399,'0','2014-11-28 02:41:18',3,97,20,1),(400,'1','2014-11-28 02:41:19',3,98,20,1),(401,'0','2014-11-28 02:41:20',3,99,20,1),(402,'1','2014-11-28 02:41:21',3,100,20,1),(403,'0','2014-11-28 02:41:21',3,101,20,1),(404,'1','2014-11-28 02:41:22',3,102,20,1),(405,'0','2014-11-28 02:41:23',3,103,20,1),(406,'1','2014-11-28 02:41:24',3,104,20,1),(407,'0','2014-11-28 02:41:25',3,105,20,1),(408,'1','2014-11-28 02:41:26',3,106,20,1),(409,'1','2014-11-28 02:41:28',3,107,20,1),(410,'1','2014-11-28 02:41:29',3,108,20,1),(411,'1','2014-11-28 02:41:31',3,109,20,1),(412,'1','2014-11-28 02:41:39',3,110,20,1),(413,'1','2014-11-28 02:41:41',3,111,20,1),(414,'1','2014-11-28 02:42:50',3,92,16,1),(415,'1','2014-11-28 02:42:51',3,93,16,1),(416,'0','2014-11-28 02:42:52',3,94,16,1),(417,'1','2014-11-28 02:42:53',3,95,16,1),(418,'0','2014-11-28 02:42:53',3,96,16,1),(419,'1','2014-11-28 02:42:54',3,97,16,1),(420,'1','2014-11-28 02:42:55',3,98,16,1),(421,'1','2014-11-28 02:42:56',3,99,16,1),(422,'0','2014-11-28 02:42:57',3,100,16,1),(423,'1','2014-11-28 02:42:58',3,101,16,1),(424,'1','2014-11-28 02:42:59',3,102,16,1),(425,'0','2014-11-28 02:43:00',3,103,16,1),(426,'1','2014-11-28 02:43:01',3,104,16,1),(427,'0','2014-11-28 02:43:02',3,105,16,1),(428,'1','2014-11-28 02:43:03',3,106,16,1),(429,'0','2014-11-28 02:43:04',3,107,16,1),(430,'1','2014-11-28 02:43:05',3,108,16,1),(431,'0','2014-11-28 02:43:06',3,109,16,1),(432,'1','2014-11-28 02:43:08',3,110,16,1),(433,'1','2014-11-28 02:43:09',3,111,16,1),(434,'1','2014-11-28 02:44:10',3,92,60,1),(435,'1','2014-11-28 02:44:11',3,93,60,1),(436,'0','2014-11-28 02:44:12',3,94,60,1),(437,'1','2014-11-28 02:44:13',3,95,60,1),(438,'0','2014-11-28 02:44:14',3,96,60,1),(439,'1','2014-11-28 02:44:15',3,97,60,1),(440,'1','2014-11-28 02:44:15',3,98,60,1),(441,'1','2014-11-28 02:44:16',3,99,60,1),(442,'0','2014-11-28 02:44:17',3,100,60,1),(443,'1','2014-11-28 02:44:18',3,101,60,1),(444,'0','2014-11-28 02:44:19',3,102,60,1),(445,'1','2014-11-28 02:44:20',3,103,60,1),(446,'1','2014-11-28 02:44:22',3,104,60,1),(447,'1','2014-11-28 02:44:23',3,105,60,1),(448,'1','2014-11-28 02:44:24',3,106,60,1),(449,'1','2014-11-28 02:44:25',3,107,60,1),(450,'1','2014-11-28 02:44:26',3,108,60,1),(451,'1','2014-11-28 02:44:27',3,109,60,1),(452,'1','2014-11-28 02:44:29',3,110,60,1),(453,'1','2014-11-28 02:44:31',3,111,60,1),(454,'1','2014-11-28 02:48:41',3,92,59,1),(455,'1','2014-11-28 02:48:43',3,93,59,1),(456,'1','2014-11-28 02:48:44',3,94,59,1),(457,'1','2014-11-28 02:48:45',3,95,59,1),(458,'1','2014-11-28 02:48:46',3,96,59,1),(459,'1','2014-11-28 02:48:47',3,97,59,1),(460,'1','2014-11-28 02:48:48',3,98,59,1),(461,'1','2014-11-28 02:48:49',3,99,59,1),(462,'0','2014-11-28 02:48:50',3,100,59,1),(463,'1','2014-11-28 02:48:51',3,101,59,1),(464,'0','2014-11-28 02:48:52',3,102,59,1),(465,'1','2014-11-28 02:48:54',3,103,59,1),(466,'1','2014-11-28 02:48:55',3,104,59,1),(467,'1','2014-11-28 02:48:57',3,105,59,1),(468,'1','2014-11-28 02:48:58',3,106,59,1),(469,'1','2014-11-28 02:48:59',3,107,59,1),(470,'1','2014-11-28 02:49:01',3,108,59,1),(471,'1','2014-11-28 02:49:02',3,109,59,1),(472,'1','2014-11-28 02:49:04',3,110,59,1),(473,'1','2014-11-28 02:49:05',3,111,59,1),(474,'1','2014-11-28 02:51:08',3,92,58,1),(475,'0','2014-11-28 02:51:10',3,93,58,1),(476,'0','2014-11-28 02:51:10',3,94,58,1),(477,'0','2014-11-28 02:51:11',3,95,58,1),(478,'0','2014-11-28 02:51:12',3,96,58,1),(479,'0','2014-11-28 02:51:13',3,97,58,1),(480,'0','2014-11-28 02:51:14',3,98,58,1),(481,'0','2014-11-28 02:51:14',3,99,58,1),(482,'1','2014-11-28 02:51:15',3,100,58,1),(483,'1','2014-11-28 02:51:16',3,101,58,1),(484,'1','2014-11-28 02:51:17',3,102,58,1),(485,'1','2014-11-28 02:51:18',3,103,58,1),(486,'1','2014-11-28 02:51:19',3,104,58,1),(487,'1','2014-11-28 02:51:19',3,105,58,1),(488,'0','2014-11-28 02:51:20',3,106,58,1),(489,'1','2014-11-28 02:51:22',3,107,58,1),(490,'0','2014-11-28 02:51:25',3,108,58,1),(491,'1','2014-11-28 02:51:30',3,109,58,1),(492,'1','2014-11-28 02:51:32',3,110,58,1),(493,'1','2014-11-28 02:51:33',3,111,58,1),(494,'1','2014-11-28 02:51:39',3,112,58,1),(495,'0','2014-12-01 10:21:05',3,92,5,1),(496,'1','2014-12-01 10:21:09',3,93,5,1),(497,'1','2014-12-01 10:21:10',3,94,5,1),(498,'1','2014-12-01 10:21:12',3,95,5,1),(499,'0','2014-12-01 10:21:13',3,96,5,1),(500,'0','2014-12-01 10:21:17',3,97,5,1),(501,'1','2014-12-01 10:21:19',3,98,5,1),(502,'1','2014-12-01 10:21:20',3,99,5,1),(503,'1','2014-12-01 10:21:25',3,100,5,1),(504,'1','2014-12-01 10:21:26',3,101,5,1),(505,'1','2014-12-01 10:21:29',3,102,5,1),(506,'1','2014-12-01 10:21:31',3,103,5,1),(507,'0','2014-12-01 10:21:33',3,104,5,1),(508,'1','2014-12-01 10:21:36',3,105,5,1),(509,'0','2014-12-01 10:21:37',3,106,5,1),(510,'1','2014-12-01 10:21:38',3,107,5,1),(511,'1','2014-12-01 10:21:40',3,108,5,1),(512,'0','2014-12-01 10:21:42',3,109,5,1),(513,'1','2014-12-01 10:21:44',3,110,5,1),(514,'1','2014-12-01 10:21:46',3,111,5,1),(515,'1','2014-12-01 10:21:48',3,112,5,1),(516,'1','2014-12-01 10:25:54',3,92,6,1),(517,'1','2014-12-01 10:25:55',3,93,6,1),(518,'1','2014-12-01 10:25:55',3,94,6,1),(519,'1','2014-12-01 10:25:55',3,95,6,1),(520,'1','2014-12-01 10:25:56',3,96,6,1),(521,'1','2014-12-01 10:25:56',3,97,6,1),(522,'1','2014-12-01 10:25:57',3,98,6,1),(523,'1','2014-12-01 10:25:57',3,99,6,1),(524,'1','2014-12-01 10:25:58',3,100,6,1),(525,'1','2014-12-01 10:25:58',3,101,6,1),(526,'1','2014-12-01 10:25:58',3,102,6,1),(527,'1','2014-12-01 10:25:59',3,103,6,1),(528,'1','2014-12-01 10:25:59',3,104,6,1),(529,'1','2014-12-01 10:25:59',3,105,6,1),(530,'1','2014-12-01 10:26:00',3,106,6,1),(531,'1','2014-12-01 10:26:00',3,107,6,1),(532,'1','2014-12-01 10:26:00',3,108,6,1),(533,'1','2014-12-01 10:26:01',3,109,6,1),(534,'1','2014-12-01 10:26:01',3,110,6,1),(535,'1','2014-12-01 10:26:02',3,111,6,1),(536,'1','2014-12-01 10:26:02',3,112,6,1),(537,'1','2014-12-16 03:33:01',4,92,1,1),(538,'1','2014-12-16 03:33:02',4,93,1,1),(539,'1','2014-12-16 03:33:09',4,94,1,1),(540,'1','2014-12-16 03:33:10',4,95,1,1),(541,'1','2014-12-16 03:33:11',4,96,1,1),(542,'1','2014-12-16 03:33:12',4,97,1,1),(543,'1','2014-12-16 03:33:14',4,98,1,1),(544,'1','2014-12-16 03:33:15',4,99,1,1),(545,'1','2014-12-16 03:33:16',4,100,1,1),(546,'1','2014-12-16 03:33:17',4,101,1,1),(547,'1','2014-12-16 03:33:18',4,102,1,1),(548,'1','2014-12-16 03:33:19',4,103,1,1),(549,'1','2014-12-16 03:33:20',4,104,1,1),(550,'1','2014-12-16 03:33:21',4,105,1,1),(551,'1','2014-12-16 03:33:21',4,106,1,1),(552,'1','2014-12-16 03:33:22',4,107,1,1),(553,'1','2014-12-16 03:33:23',4,108,1,1),(554,'1','2014-12-16 03:33:24',4,109,1,1),(555,'1','2014-12-16 03:33:30',4,110,1,1),(556,'1','2014-12-16 03:33:31',4,111,1,1),(557,'1','2014-12-16 03:34:30',4,92,1,1),(558,'0','2014-12-16 03:34:31',4,93,1,1),(559,'1','2014-12-16 03:34:32',4,94,1,1),(560,'1','2014-12-16 03:34:33',4,95,1,1),(561,'1','2014-12-16 03:34:33',4,96,1,1),(562,'1','2014-12-16 03:34:34',4,97,1,1),(563,'1','2014-12-16 03:34:35',4,98,1,1),(564,'1','2014-12-16 03:34:35',4,99,1,1),(565,'1','2014-12-16 03:34:37',4,100,1,1),(566,'1','2014-12-16 03:34:37',4,101,1,1),(567,'0','2014-12-16 03:35:25',4,102,1,1),(568,'1','2014-12-16 03:35:26',4,103,1,1),(569,'1','2014-12-16 03:35:26',4,104,1,1),(570,'1','2014-12-16 03:35:27',4,105,1,1),(571,'0','2014-12-16 03:35:28',4,106,1,1),(572,'1','2014-12-16 03:35:59',4,107,1,1),(573,'1','2014-12-16 03:36:23',4,92,1,1),(574,'1','2014-12-16 03:36:43',4,92,1,1),(575,'0','2014-12-16 03:36:45',4,93,1,1),(576,'1','2014-12-16 03:38:15',4,92,1,1),(577,'0','2014-12-16 03:38:16',4,93,1,1),(578,'1','2014-12-16 03:38:17',4,94,1,1),(579,'1','2014-12-16 03:38:18',4,95,1,1),(580,'1','2014-12-16 03:38:24',4,96,1,1),(581,'1','2014-12-16 03:38:24',4,97,1,1),(582,'1','2014-12-16 03:38:25',4,98,1,1),(583,'1','2014-12-16 03:38:25',4,99,1,1),(584,'1','2014-12-16 03:38:26',4,100,1,1),(585,'1','2014-12-16 03:38:27',4,101,1,1),(586,'1','2014-12-16 03:38:29',4,102,1,1),(587,'1','2014-12-16 03:38:29',4,103,1,1),(588,'1','2014-12-16 03:38:30',4,104,1,1),(589,'1','2014-12-16 03:38:30',4,105,1,1),(590,'0','2014-12-16 03:38:31',4,106,1,1),(591,'1','2014-12-16 03:38:32',4,107,1,1),(592,'1','2014-12-16 03:38:32',4,108,1,1),(593,'1','2014-12-16 03:38:33',4,109,1,1),(594,'1','2014-12-16 03:38:34',4,110,1,1),(595,'1','2014-12-16 03:38:34',4,111,1,1),(596,'1','2014-12-16 03:38:35',4,112,1,1);
/*!40000 ALTER TABLE `evaluacion_curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion_curso_enc`
--

DROP TABLE IF EXISTS `evaluacion_curso_enc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion_curso_enc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `tiempo` int(11) DEFAULT NULL,
  `curso_id` int(11) NOT NULL,
  `evaluacion_enc_id` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_evaluacion_curso_enc_curso1_idx` (`curso_id`),
  KEY `fk_evaluacion_curso_enc_evaluacion_enc1_idx` (`evaluacion_enc_id`),
  CONSTRAINT `fk_evaluacion_curso_enc_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_evaluacion_curso_enc_evaluacion_enc1` FOREIGN KEY (`evaluacion_enc_id`) REFERENCES `evaluacion_enc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion_curso_enc`
--

LOCK TABLES `evaluacion_curso_enc` WRITE;
/*!40000 ALTER TABLE `evaluacion_curso_enc` DISABLE KEYS */;
INSERT INTO `evaluacion_curso_enc` VALUES (3,1,'2014-11-27 18:36:38',7,21,10,1),(4,1,'2014-12-16 03:09:13',7,21,10,1),(9,1,'2014-12-16 04:51:18',7,43,10,1);
/*!40000 ALTER TABLE `evaluacion_curso_enc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion_enc`
--

DROP TABLE IF EXISTS `evaluacion_enc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion_enc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descr` varchar(45) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `idioma_id` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `tiempo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion_enc`
--

LOCK TABLES `evaluacion_enc` WRITE;
/*!40000 ALTER TABLE `evaluacion_enc` DISABLE KEYS */;
INSERT INTO `evaluacion_enc` VALUES (1,'Evaluación 1ro básico español',1,2,0,1,0),(2,'Evaluacion',2,1,0,2,0),(3,'Evaluación inicial',3,1,0,2,0),(4,'Evaluación inicial',1,1,0,1,0),(5,'prueba viernes',2,1,0,1,0),(6,'Evaluación 1ro Básico Español Alumno',1,1,1,1,7),(7,'Evaluación 1ro Básico Ingles Alumno',1,2,1,1,7),(8,'Evaluación 2ro Básico Español Alumno',2,1,1,1,7),(9,'Evaluación 2ro Básico Ingles Alumno',2,2,1,1,7),(10,'Evaluación 3ro Básico Español Alumno',3,1,1,1,7),(11,'Evaluación 3ro Básico Ingles Alumno',3,2,1,1,7),(12,'Evaluación 4ro Básico Español Alumno',4,1,1,1,7),(13,'Evaluación 4ro Básico Ingles Alumno',4,2,1,1,7),(14,'Evaluación 1ro Básico Español Profesor',1,1,1,2,7),(15,'Evaluación 1ro Básico Ingles Profesor',1,2,1,2,7),(16,'Evaluación 2ro Básico Español Profesor',2,1,1,2,7),(17,'Evaluación 2ro Básico Ingles Profesor',2,2,1,2,7),(18,'Evaluación 3ro Básico Español Profesor',3,1,1,2,7),(19,'Evaluación 3ro Básico Ingles Profesor',3,2,1,2,7),(20,'Evaluación 4ro Básico Español Profesor',4,1,1,2,7),(21,'Evaluación 4ro Básico Ingles Profesor',4,2,1,2,7);
/*!40000 ALTER TABLE `evaluacion_enc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `idioma`
--

DROP TABLE IF EXISTS `idioma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `idioma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descr` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `idioma`
--

LOCK TABLES `idioma` WRITE;
/*!40000 ALTER TABLE `idioma` DISABLE KEYS */;
INSERT INTO `idioma` VALUES (1,'Español',1),(2,'Inglés',1);
/*!40000 ALTER TABLE `idioma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licencia`
--

DROP TABLE IF EXISTS `licencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `n_solicitud` varchar(100) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `n_cliente` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `tiempo_duracion` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `random` varchar(100) DEFAULT NULL,
  `nivel` int(11) NOT NULL,
  `curso` int(11) NOT NULL,
  `idioma` int(11) DEFAULT NULL,
  `colegio_id` int(11) DEFAULT NULL,
  `link_d` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `colegio_id` (`colegio_id`),
  CONSTRAINT `colegio_id` FOREIGN KEY (`colegio_id`) REFERENCES `colegio` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licencia`
--

LOCK TABLES `licencia` WRITE;
/*!40000 ALTER TABLE `licencia` DISABLE KEYS */;
INSERT INTO `licencia` VALUES (1,'c4ca4238a0b923820dcc509a6f75849b',1,1,'2014-09-23 00:00:00',12,1,'c8057dc1ffd13e1e8b5264a614db6aa6','0SUJ1zQ7mz0G5xqr42MbUM65a22nGTbB',1,1,1,2,NULL),(2,'c81e728d9d4c2f636f067f89cc14862c',5,NULL,'2014-10-28 00:00:00',0,1,NULL,NULL,3,1,1,2,NULL),(3,'eccbc87e4b5ce2fe28308fd9f2a7baf3',5,NULL,'2014-10-28 00:00:00',0,1,'8eca9aa4abd4d312a43f457621be7537','2E169y55W7F97MpA5YkcQfkv08H82LZA',3,2,1,2,NULL),(4,'a87ff679a2f3e71d9181a67b7542122c',5,NULL,'2014-10-28 00:00:00',0,1,'feef5ba23e3562d30e8d794d96cc07e2','44q9de5j77NQH6dL5rFrb4A3320D0E20',3,3,1,2,NULL),(5,'e4da3b7fbbce2345d7772b0674a318d5',6,NULL,'2014-10-28 00:00:00',0,1,NULL,NULL,2,1,1,2,NULL),(6,'1679091c5a880faf6fb5e6087eb1b2dc',6,NULL,'2014-10-28 00:00:00',0,1,NULL,NULL,2,2,1,2,NULL),(7,'8f14e45fceea167a5a36dedd4bea2543',6,NULL,'2014-10-28 00:00:00',0,1,NULL,NULL,2,3,1,2,NULL),(8,'c9f0f895fb98ab9159f51fd0297e236d',1,NULL,'2014-10-29 10:50:41',0,1,NULL,NULL,3,1,2,2,NULL),(9,'45c48cce2e2d7fbdea1afc51c7c6ad26',1,NULL,'2014-10-29 10:50:43',0,1,NULL,NULL,3,2,2,2,NULL),(10,'d3d9446802a44259755d38e6d163e820',1,NULL,'2014-10-29 10:50:43',0,1,NULL,NULL,3,3,2,2,NULL),(11,'6512bd43d9caa6e02c990b0a82652dca',1,NULL,'2014-10-29 11:00:09',0,1,NULL,NULL,3,1,2,2,NULL),(12,'c20ad4d76fe97759aa27a0c99bff6710',1,NULL,'2014-10-29 11:03:08',0,1,NULL,NULL,3,1,2,2,NULL),(13,'c51ce410c124a10e0db5e4b97fc2af39',1,NULL,'2014-10-29 11:06:08',0,1,NULL,NULL,3,1,2,2,NULL),(14,'aab3238922bcc25a6f606eb525ffdc56',1,NULL,'2014-10-29 11:07:05',0,1,NULL,NULL,3,1,2,2,NULL),(15,'9bf31c7ff062936a96d3c8bd1f8f2ff3',1,NULL,'2014-10-29 11:08:20',0,1,NULL,NULL,3,1,2,2,NULL),(16,'c74d97b01eae257e44aa9d5bade97baf',1,NULL,'2014-10-29 11:14:23',0,1,NULL,NULL,3,1,2,2,NULL),(17,'70efdf2ec9b086079795c442636b55fb',1,NULL,'2014-10-29 11:14:24',0,1,NULL,NULL,3,2,2,2,NULL),(18,'6f4922f45568161a8cdf4ad2299f6d23',1,NULL,'2014-10-29 11:14:24',0,1,NULL,NULL,3,3,2,2,NULL),(19,'1f0e3dad99908345f7439f8ffabdffc4',1,NULL,'2014-10-29 11:24:56',0,1,NULL,NULL,3,1,2,2,NULL),(20,'98f13708210194c475687be6106a3b84',1,NULL,'2014-10-29 11:24:56',0,1,NULL,NULL,3,2,2,2,NULL),(21,'3c59dc048e8850243be8079a5c74d079',1,NULL,'2014-10-29 11:24:56',0,1,NULL,NULL,3,3,2,2,NULL),(22,'b6d767d2f8ed5d21a44b0e5886680cb9',1,NULL,'2014-10-29 11:30:19',0,1,NULL,NULL,3,1,2,2,NULL),(23,'37693cfc748049e45d87b8c7d8b9aacd',1,NULL,'2014-10-29 11:31:18',0,1,NULL,NULL,3,1,2,2,NULL),(24,'1ff1de774005f8da13f42943881c655f',1,NULL,'2014-10-29 11:32:09',0,1,NULL,NULL,3,1,2,2,NULL),(25,'8e296a067a37563370ded05f5a3bf3ec',1,NULL,'2014-10-29 11:33:36',0,1,NULL,NULL,3,1,2,2,''),(26,'4e732ced3463d06de0ca9a15b6153677',1,NULL,'2014-10-29 11:33:37',0,1,NULL,NULL,3,2,2,2,''),(27,'02e74f10e0327ad868d138f2b4fdd6f0',1,NULL,'2014-10-29 11:33:37',0,1,NULL,NULL,3,3,2,2,''),(28,'33e75ff09dd601bbe69f351039152189',1,NULL,'2014-10-29 11:41:34',0,1,NULL,NULL,3,1,2,2,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_6031533.zip'),(29,'6ea9ab1baa0efb9e19094440c317e21b',5,NULL,'2014-10-29 11:48:44',0,1,NULL,NULL,3,1,1,2,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_74adedb.zip'),(30,'34173cb38f07f89ddbebc2ac9128303f',1,NULL,'2014-10-29 11:54:44',0,1,NULL,NULL,3,1,2,2,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_1327cd3.zip'),(31,'c16a5320fa475530d9583c34fd356ef5',1,NULL,'2014-10-29 11:54:45',0,1,NULL,NULL,3,2,2,2,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_79ef0b1.zip'),(32,'6364d3f0f495b6ab9dcf8d3b5c6e0b01',1,NULL,'2014-10-29 11:54:45',0,1,NULL,NULL,3,3,2,2,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_bc08ce9.zip'),(33,'182be0c5cdcd5072bb1864cdee4d3d6e',5,NULL,'2014-10-29 17:23:02',0,1,NULL,NULL,3,1,1,17,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_9426fb6.zip'),(34,'e369853df766fa44e1ed0ff613f563bd',5,NULL,'2014-10-29 17:23:03',0,1,NULL,NULL,3,2,1,17,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_5a45fa9.zip'),(35,'1c383cd30b7c298ab50293adfecb7b18',5,NULL,'2014-10-29 17:23:03',0,1,NULL,NULL,3,3,1,17,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_60283c0.zip'),(36,'19ca14e7ea6328a42e0eb13d585e4c22',5,NULL,'2014-10-29 17:23:03',0,1,NULL,NULL,3,4,1,17,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_c89705a.zip'),(37,'a5bfc9e07964f8dddeb95fc584cd965d',5,NULL,'2014-10-29 17:35:35',0,1,NULL,NULL,3,1,1,17,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_5ecef47.zip'),(38,'a5771bce93e200c36f7cd9dfd0e5deaa',5,NULL,'2014-10-29 17:35:36',0,1,NULL,NULL,3,2,1,17,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_c6185ec.zip'),(39,'d67d8ab4f4c10bf22aa353e27879133c',5,NULL,'2014-10-29 17:35:36',0,1,NULL,NULL,3,3,1,17,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_cb18736.zip'),(40,'d645920e395fedad7bbbed0eca3fe2e0',5,NULL,'2014-10-29 17:35:37',0,1,NULL,NULL,3,4,1,17,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_5acd938.zip'),(41,'3416a75f4cea9109507cacd8e2f2aefc',6,NULL,'2014-10-29 17:45:06',0,1,NULL,NULL,2,1,1,17,NULL),(42,'a1d0c6e83f027327d8461063f4ac58a6',6,NULL,'2014-10-29 17:45:06',0,1,NULL,NULL,2,2,1,17,NULL),(43,'17e62166fc8586dfa4d1bc0e1742c08b',6,NULL,'2014-10-29 17:45:06',0,1,NULL,NULL,2,3,1,17,NULL),(44,'f7177163c833dff4b38fc8d2872f1ec6',6,NULL,'2014-10-29 17:45:07',0,1,NULL,NULL,2,4,1,17,NULL),(45,'6c8349cc7260ae62e3b1396831a8398f',1,NULL,'2014-10-29 23:10:44',0,1,NULL,NULL,3,1,2,23,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_bf64473.zip'),(46,'d9d4f495e875a2e075a1a4a6e1b9770f',1,NULL,'2014-10-29 23:10:44',0,1,NULL,NULL,3,2,2,23,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_64e0de1.zip'),(47,'67c6a1e7ce56d3d6fa748ab6d9af3fd7',1,NULL,'2014-10-29 23:10:44',0,1,NULL,NULL,3,3,2,23,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_c39866f.zip'),(48,'642e92efb79421734881b53e1e1b18b6',1,NULL,'2014-10-29 23:10:44',0,1,NULL,NULL,3,4,2,23,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_f103d0d.zip'),(49,'f457c545a9ded88f18ecee47145a72c0',1,NULL,'2014-10-29 23:10:44',0,1,NULL,NULL,3,5,2,23,'http://www.descargamagica.cl/acciones/gestor.php?archivo=Alfombra_Magica_3robasico_03f5820.zip'),(50,'c0c7c76d30bd3dcaefc96f40275bdc0a',1,NULL,'2014-10-29 23:10:45',0,1,NULL,NULL,3,6,2,23,NULL),(51,'2838023a778dfaecdc212708f721b788',10,NULL,'2014-12-16 04:25:31',0,1,NULL,NULL,4,1,1,2,NULL),(52,'9a1158154dfa42caddbd0694a4e9bdc8',10,NULL,'2014-12-16 04:25:31',0,1,NULL,NULL,4,2,1,2,NULL),(53,'d82c8d1619ad8176d665453cfb2e55f0',10,NULL,'2014-12-16 04:25:32',0,1,NULL,NULL,4,3,1,2,NULL);
/*!40000 ALTER TABLE `licencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `nota_colegio`
--

DROP TABLE IF EXISTS `nota_colegio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `nota_colegio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descr` varchar(3000) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `colegio_id` int(11) NOT NULL,
  `creado` datetime DEFAULT NULL,
  `editado` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mensaje_colegio1_idx` (`colegio_id`),
  CONSTRAINT `fk_mensaje_colegio1` FOREIGN KEY (`colegio_id`) REFERENCES `colegio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `nota_colegio`
--

LOCK TABLES `nota_colegio` WRITE;
/*!40000 ALTER TABLE `nota_colegio` DISABLE KEYS */;
INSERT INTO `nota_colegio` VALUES (1,'hola mundo',2,2,'2014-12-16 01:13:18','2014-12-16 01:43:16');
/*!40000 ALTER TABLE `nota_colegio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria_id` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `descr` varchar(45) DEFAULT NULL,
  `curso` int(11) DEFAULT NULL,
  `idioma_id` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `n_licencia` int(11) NOT NULL DEFAULT '4',
  `valor` int(11) NOT NULL,
  `con_evaluacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prducto_categoria1_idx` (`categoria_id`),
  KEY `fk_producto_idioma1_idx` (`idioma_id`),
  CONSTRAINT `fk_prducto_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_idioma1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,1,'AML3BI4','Licencia 3ro básico inglés',3,2,1,4,2,NULL),(4,2,'1823egidas','asklndkasd',4,1,0,4,2,NULL),(5,1,'AML3BE4','Licencia 3ro básico español',3,1,1,4,2,NULL),(6,1,'AML2BE4','Licencia 2do básico español',2,1,1,4,2,NULL),(7,3,'kjh44','sdgsjgjsiod',3,1,1,1,1,NULL),(8,1,'alskmdlaksd','lkamsdlka',3,1,1,3,1,1),(9,2,',asda,msd',',masnd,as',3,1,1,4,1,1),(10,1,'AML3BE4','Licencia 4to básico español 4 niveles',4,1,1,4,1,1);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provincia`
--

DROP TABLE IF EXISTS `provincia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provincia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `codigo` varchar(45) DEFAULT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reg_id` (`reg_id`),
  CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`reg_id`) REFERENCES `region` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provincia`
--

LOCK TABLES `provincia` WRITE;
/*!40000 ALTER TABLE `provincia` DISABLE KEYS */;
INSERT INTO `provincia` VALUES (1,15,'151','Arica'),(2,15,'152','Parinacota'),(3,1,'011','Iquique'),(4,1,'014','Tamarugal'),(5,2,'021','Antofagasta'),(6,2,'022','El Loa'),(7,2,'023','Tocopilla'),(8,3,'031','Copiapó'),(9,3,'032','Chañaral'),(10,3,'033','Huasco'),(11,4,'041','Elqui'),(12,4,'042','Choapa'),(13,4,'043','Limarí'),(14,5,'051','Valparaíso'),(15,5,'052','Isla de Pascua'),(16,5,'053','Los Andes'),(17,5,'054','Petorca'),(18,5,'055','Quillota'),(19,5,'056','San Antonio'),(20,5,'057','San Felipe de Aconcagua'),(21,5,'058','Marga Marga'),(22,6,'061','Cachapoal'),(23,6,'062','Cardenal Caro'),(24,6,'063','Colchagua'),(25,7,'071','Talca'),(26,7,'072','Cauquenes'),(27,7,'073','Curicó'),(28,7,'074','Linares'),(29,8,'081','Concepción'),(30,8,'082','Arauco'),(31,8,'083','Biobío'),(32,8,'084','Ñuble'),(33,9,'091','Cautín'),(34,9,'092','Malleco'),(35,14,'141','Valdivia'),(36,14,'142','Ranco'),(37,10,'101','Llanquihue'),(38,10,'102','Chiloé'),(39,10,'103','Osorno'),(40,10,'104','Palena'),(41,11,'111','Coihaique'),(42,11,'112','Aisén'),(43,11,'113','Capitán Prat'),(44,11,'114','General Carrera'),(45,12,'121','Magallanes'),(46,12,'122','Antártica Chilena'),(47,12,'123','Tierra del Fuego'),(48,12,'124','Última Esperanza'),(49,13,'131','Santiago'),(50,13,'132','Cordillera'),(51,13,'133','Chacabuco'),(52,13,'134','Maipo'),(53,13,'135','Melipilla'),(54,13,'136','Talagante');
/*!40000 ALTER TABLE `provincia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `region`
--

DROP TABLE IF EXISTS `region`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `region` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `region`
--

LOCK TABLES `region` WRITE;
/*!40000 ALTER TABLE `region` DISABLE KEYS */;
INSERT INTO `region` VALUES (1,1,'Tarapacá'),(2,2,'Antofagasta'),(3,3,'Atacama'),(4,4,'Coquimbo'),(5,5,'Valparaíso'),(6,6,'Región del Libertador Gral. Bernardo O’Higgins'),(7,7,'Región del Maule'),(8,8,'Región del Biobío'),(9,9,'Región de la Araucanía'),(10,10,'Región de Los Lagos'),(11,11,'Región Aisén del Gral. Carlos Ibáñez del Campo'),(12,12,'Región de Magallanes y de la Antártica Chilena'),(13,13,'Región Metropolitana de Santiago'),(14,14,'Región de Los Ríos'),(15,15,'Arica y Parinacota');
/*!40000 ALTER TABLE `region` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultado`
--

DROP TABLE IF EXISTS `resultado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultado` (
  `idresultado` int(11) NOT NULL AUTO_INCREMENT,
  `evaluacion_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  `descr` varchar(45) DEFAULT NULL,
  `fecha_resultado` datetime DEFAULT NULL,
  PRIMARY KEY (`idresultado`),
  KEY `fk_resultado_evaluacion1_idx` (`evaluacion_id`),
  KEY `fk_resultado_curso1_idx` (`curso_id`),
  CONSTRAINT `fk_resultado_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_resultado_evaluacion1` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacion_enc` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultado`
--

LOCK TABLES `resultado` WRITE;
/*!40000 ALTER TABLE `resultado` DISABLE KEYS */;
/*!40000 ALTER TABLE `resultado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_usuario`
--

DROP TABLE IF EXISTS `tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_usuario`
--

LOCK TABLES `tipo_usuario` WRITE;
/*!40000 ALTER TABLE `tipo_usuario` DISABLE KEYS */;
INSERT INTO `tipo_usuario` VALUES (1,'Administrador Sistema'),(2,'Vendedor Licencias'),(3,'Administrador Colegio'),(4,'Profesor Encargado'),(5,'Capacitador');
/*!40000 ALTER TABLE `tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `mail` varchar(45) DEFAULT NULL,
  `pass` varchar(45) DEFAULT NULL,
  `sexo` int(11) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  `estado` int(11) DEFAULT NULL,
  `colegio_id` int(11) DEFAULT NULL,
  `nivel` int(11) NOT NULL DEFAULT '0',
  `curso` int(11) NOT NULL DEFAULT '0',
  `creado_por` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo` (`tipo`),
  KEY `fk_usuario_colegio1_idx` (`colegio_id`),
  KEY `fk_usuario_usuario1_idx` (`creado_por`),
  CONSTRAINT `fk_usuario_colegio1` FOREIGN KEY (`colegio_id`) REFERENCES `colegio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_usuario1` FOREIGN KEY (`creado_por`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Marcelo','Miqueles','marcelomiqueles@hotmail.com','92c04606773f5fdf80fdd267c52a3fac',1,'+56953335336',1,1,NULL,0,0,1),(2,'Andrés','Calamaro','calamaro@cli.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'+56954123456',2,1,1,0,0,1),(5,'Prueba','Vendedor','vendedor@prueba.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'756785',2,2,NULL,0,0,1),(6,'Prueba','Vendedor','vendedor@prueba.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'213123123',2,2,NULL,0,0,1),(7,'Prueba','Vendedor','vendedor@prueba.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'asdasd',2,2,NULL,0,0,1),(8,'Prueba','Vendedor','vendedor@prueba.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'asdasd',2,2,NULL,0,0,1),(9,'Prueba','Administrador Colegio','admincolegio@prueba.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'35354546',3,0,NULL,0,0,1),(10,'Prueba','profesor','profesor@prueba.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'6546516',5,0,NULL,0,0,1),(11,'Prueba','Capacitador','capacitador@prueba.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'75785758',3,0,NULL,0,0,1),(12,'2werwerwer','casxasx','asdasdxa','81dc9bdb52d04dc20036dbd8313ed055',1,'74574545',4,0,2,1,1,1),(13,'sadasdasd','123123','asdasd','81dc9bdb52d04dc20036dbd8313ed055',2,'123123123',3,0,NULL,0,0,5),(14,'asdasdasd','213123','asdasdasd','81dc9bdb52d04dc20036dbd8313ed055',1,'234234234',3,0,NULL,0,0,5),(15,'juanito 3','cotapos','cuanito@cotapos.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'12123123123',2,2,NULL,0,0,1),(16,'Camilo','Ibañez','camilo@colegio.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'+56955555555',5,1,NULL,0,0,9),(17,'juanito perez','askjdbkasjd','hola@colegio.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'65465',3,0,2,0,0,5),(18,'makajnsdkansd','lansdlkan','a@a.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'684654',4,0,2,1,1,17),(19,'prueba vendedor','Administrador Encargado','administrador@encargado.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'+56664613213',3,0,2,0,0,5),(20,'eugenio','miqueles','queno@miqueles.com','d8578edf8458ce06fbc5bb76a58c5ca4',1,'+56977370352',4,0,2,1,1,19),(44,'','','','81dc9bdb52d04dc20036dbd8313ed055',1,'',4,0,2,1,1,1),(45,'Dana','Kaufmann','dana@admin.cl','21cb4e4be93c09542ffa73b2b5cb95ea',2,'+56965487548',1,1,1,0,0,1),(46,'Dana','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',1,0,1,0,0,1),(47,'Dana','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',1,0,1,0,0,1),(48,'Dana','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',1,0,1,0,0,1),(54,'Dana 2','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',1,0,1,0,0,1),(55,'Dana 2','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',1,0,1,0,0,1),(56,'Dana 2','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'+56965487548',1,0,1,0,0,1),(57,'Dana 3','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',1,0,1,0,0,1),(58,'Dana 6','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'+56965487548',1,0,1,0,0,1),(59,'Dana','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'+56965487548',2,0,1,0,0,1),(60,'Dana','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'+56965487548',2,0,1,0,0,1),(61,'Dana 5','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',2,0,1,0,0,1),(62,'Dana','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',2,0,1,0,0,1),(63,'Dana Colegio','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',3,0,17,0,0,1),(64,'Dana profesor','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',4,0,2,3,3,1),(65,'dana vendedor','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',2,0,1,0,0,1),(66,'dana vendedor','Kaufmann','dana@ventas.cl','d8578edf8458ce06fbc5bb76a58c5ca4',2,'+56965487548',2,0,1,0,0,1),(67,'Dana administrador','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',1,0,1,0,0,1),(68,'Dana Administrador','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',1,0,1,0,0,1),(69,'Dana Capacitador','Kaufmann','dana@admin.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56965487548',5,0,1,0,0,1),(70,'prueba1','prueba2','danilis@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055',2,'2555555555555',1,2,1,0,0,45),(71,'Vendedor prueba1','prueba2','danilis@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055',1,'55',2,2,1,0,0,45),(72,'prueba1','prueba2','danilis@hotmail.com','d8578edf8458ce06fbc5bb76a58c5ca4',2,'333333333333',3,1,23,0,0,45),(73,'prueba3','sdfsdf','danilis@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055',1,'4444',3,2,23,0,0,45),(74,'prueba3','sdfsdf','danilis@hotmail.com','d8578edf8458ce06fbc5bb76a58c5ca4',1,'4444',3,1,23,0,0,45),(75,'','','','81dc9bdb52d04dc20036dbd8313ed055',1,'',1,0,1,0,0,1),(76,'eduardo','melendez','emelendez@admin.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'',3,1,2,0,0,2),(77,'mauricio','fuentes','mfuentes@profe.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'',4,1,17,3,3,76),(78,'Luis','Oyarzún','luis@oyarzun.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'',4,1,2,2,2,76),(79,'raul','celery','raul@profe.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'',4,1,2,2,1,76),(80,'prueba3','prueba','danilis@hotmail.com','81dc9bdb52d04dc20036dbd8313ed055',2,'444444',5,1,1,0,0,45),(81,'GADIEL','STERN','GADIELSTERN@GMAIL.COM','81dc9bdb52d04dc20036dbd8313ed055',1,'+56992388779',1,2,1,0,0,45),(82,'GADIEL ','APELLIDO','GADIELSTERN@GMAIL.COM','81dc9bdb52d04dc20036dbd8313ed055',1,'92388779',3,1,23,0,0,45),(83,'ariel','fried','GADIELSTERN@GMAIL.COM','81dc9bdb52d04dc20036dbd8313ed055',1,'992388779',4,1,23,1,9,45),(84,'matias','fried','GADIELSTERN@GMAIL.COM','81dc9bdb52d04dc20036dbd8313ed055',1,'992388779',4,1,23,2,1,45);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_venta` datetime DEFAULT NULL,
  `credito_id` int(11) NOT NULL,
  `colegio_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venta_licencia_credito1_idx` (`credito_id`),
  KEY `fk_venta_colegio1_idx` (`colegio_id`),
  KEY `fk_venProd` (`producto_id`),
  CONSTRAINT `fk_venProd` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`),
  CONSTRAINT `fk_venta_colegio1` FOREIGN KEY (`colegio_id`) REFERENCES `colegio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_licencia_credito1` FOREIGN KEY (`credito_id`) REFERENCES `credito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (2,'2014-10-16 23:11:58',9,17,5,0),(3,'2014-10-16 23:12:30',9,17,5,0),(4,'2014-10-16 23:19:40',9,2,1,0),(5,'2014-10-16 23:20:58',9,2,1,0),(6,'2014-10-16 23:23:00',9,2,1,0),(7,'2014-10-16 23:23:56',9,2,1,0),(8,'2014-10-16 23:24:05',9,2,1,0),(9,'2014-10-16 23:26:47',9,2,1,0),(10,'2014-10-16 23:27:25',9,2,1,0),(11,'2014-10-16 23:27:39',9,2,1,0),(13,'2014-10-20 00:43:32',2,23,5,0),(14,'2014-10-20 00:49:31',2,23,5,0),(15,'2014-10-20 00:53:45',2,2,5,0),(16,'2014-10-20 00:54:03',2,23,5,0),(17,'2014-10-20 10:05:19',2,2,1,0),(18,'2014-10-21 22:40:41',2,2,6,0),(19,'2014-10-27 11:56:36',2,17,1,0),(20,'2014-10-27 11:57:39',2,17,6,0),(21,'2014-10-27 16:07:35',2,2,5,0),(22,'2014-10-27 16:08:15',2,2,5,0),(23,'2014-10-27 16:08:31',2,2,5,0),(24,'2014-10-28 20:38:54',2,2,5,0),(25,'2014-10-28 20:40:12',2,2,6,1),(26,'2014-10-29 10:50:40',2,2,1,0),(27,'2014-10-29 11:00:09',2,2,1,0),(28,'2014-10-29 11:03:08',2,2,1,0),(29,'2014-10-29 11:06:08',2,2,1,0),(30,'2014-10-29 11:07:05',2,2,1,0),(31,'2014-10-29 11:08:20',2,2,1,0),(32,'2014-10-29 11:14:23',2,2,1,0),(33,'2014-10-29 11:24:56',2,2,1,0),(34,'2014-10-29 11:30:19',2,2,1,0),(35,'2014-10-29 11:31:18',2,2,1,0),(36,'2014-10-29 11:32:09',2,2,1,0),(37,'2014-10-29 11:33:36',2,2,1,0),(38,'2014-10-29 11:41:34',2,2,1,0),(39,'2014-10-29 11:48:44',2,2,5,1),(40,'2014-10-29 11:54:44',2,2,1,1),(41,'2014-10-29 17:23:02',2,17,5,0),(42,'2014-10-29 17:35:35',2,17,5,1),(43,'2014-10-29 17:45:06',2,17,6,1),(44,'2014-10-29 23:10:44',2,23,1,1),(45,'2014-12-16 04:25:31',2,2,10,1);
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta_credito`
--

DROP TABLE IF EXISTS `venta_credito`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta_credito` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) NOT NULL,
  `credito_id` int(11) NOT NULL,
  `fecha_venta` datetime DEFAULT NULL,
  `sentido` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compra_usuario1_idx` (`usuario_id`),
  KEY `fk_compra_credito1_idx` (`credito_id`),
  CONSTRAINT `fk_compra_credito1` FOREIGN KEY (`credito_id`) REFERENCES `credito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_compra_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_credito`
--

LOCK TABLES `venta_credito` WRITE;
/*!40000 ALTER TABLE `venta_credito` DISABLE KEYS */;
INSERT INTO `venta_credito` VALUES (1,1,1,'0000-00-00 00:00:00',1,1),(2,1,1,'0000-00-00 00:00:00',1,1),(3,1,1,'0000-00-00 00:00:00',1,1),(4,1,1,'0000-00-00 00:00:00',1,1),(5,1,1,'2014-10-13 17:07:30',1,1),(6,1,1,'2014-10-13 17:10:47',1,1),(7,1,1,'2014-10-13 17:12:54',1,1),(8,1,1,'2014-10-13 17:12:57',2,1),(9,1,1,'2014-10-13 17:13:00',2,1),(10,1,1,'2014-10-13 17:13:54',2,1),(11,1,1,'2014-10-13 17:14:00',2,1),(12,1,1,'2014-10-13 17:14:13',2,1),(13,1,1,'2014-10-13 17:14:15',1,1),(14,1,1,'2014-10-13 17:14:16',1,1),(15,1,1,'2014-10-13 17:14:17',1,1),(16,1,9,'2014-10-16 13:28:43',1,1),(17,1,9,'2014-10-16 13:28:45',1,1),(18,1,2,'2014-10-20 00:43:52',1,1),(19,1,2,'2014-10-20 00:43:57',1,1),(20,1,2,'2014-10-20 00:53:19',1,1),(21,1,2,'2014-10-20 00:53:20',1,1),(22,1,2,'2014-10-20 00:53:21',1,1),(23,1,2,'2014-10-20 00:53:22',1,1),(24,1,2,'2014-10-20 09:55:00',2,1),(25,1,2,'2014-10-20 09:55:01',2,1),(26,1,2,'2014-10-20 10:05:13',1,1),(27,1,2,'2014-10-20 17:53:43',1,1),(28,1,2,'2014-10-21 22:08:21',1,1),(29,1,2,'2014-10-21 22:08:24',1,1),(30,1,2,'2014-10-21 22:08:25',1,1),(31,1,2,'2014-10-21 22:08:27',1,1),(32,1,2,'2014-10-21 22:08:28',1,1),(33,1,2,'2014-10-21 22:08:29',1,1),(34,1,2,'2014-10-21 22:08:30',1,1),(35,1,2,'2014-10-21 22:08:30',1,1),(36,1,2,'2014-10-21 22:08:31',1,1),(37,1,2,'2014-10-21 22:08:31',1,1),(38,1,2,'2014-10-21 22:08:32',1,1),(39,45,2,'2014-10-24 08:42:48',1,1),(40,45,2,'2014-10-24 08:42:50',1,1),(41,1,2,'2014-10-24 10:02:11',1,1),(42,1,2,'2014-10-24 10:02:12',2,1),(43,1,2,'2014-10-24 10:02:14',2,1),(44,1,2,'2014-10-29 11:01:55',1,1),(45,1,2,'2014-10-29 11:01:57',1,1),(46,1,2,'2014-10-29 11:45:59',1,1),(47,1,2,'2014-10-29 23:10:25',1,1),(48,45,2,'2014-12-01 09:47:09',1,1),(49,45,2,'2014-12-01 09:47:12',1,1);
/*!40000 ALTER TABLE `venta_credito` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta_licencia`
--

DROP TABLE IF EXISTS `venta_licencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta_licencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_mov` datetime DEFAULT NULL,
  `venta_id` int(11) NOT NULL,
  `licencia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venta_licencia_venta1_idx` (`venta_id`),
  KEY `fk_venta_licencia_licencia1_idx` (`licencia_id`),
  CONSTRAINT `fk_venta_licencia_licencia1` FOREIGN KEY (`licencia_id`) REFERENCES `licencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_licencia_venta1` FOREIGN KEY (`venta_id`) REFERENCES `venta` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_licencia`
--

LOCK TABLES `venta_licencia` WRITE;
/*!40000 ALTER TABLE `venta_licencia` DISABLE KEYS */;
INSERT INTO `venta_licencia` VALUES (1,'2014-10-28 20:38:58',24,2),(2,'2014-10-28 20:39:01',24,3),(3,'2014-10-28 20:39:04',24,4),(4,'2014-10-28 20:40:16',25,5),(5,'2014-10-28 20:40:18',25,6),(6,'2014-10-28 20:40:20',25,7),(7,'2014-10-29 10:50:42',26,8),(8,'2014-10-29 10:50:43',26,9),(9,'2014-10-29 10:50:43',26,10),(10,'2014-10-29 11:00:09',27,11),(11,'2014-10-29 11:03:08',28,12),(12,'2014-10-29 11:06:08',29,13),(13,'2014-10-29 11:07:05',30,14),(14,'2014-10-29 11:08:20',31,15),(15,'2014-10-29 11:14:24',32,16),(16,'2014-10-29 11:14:24',32,17),(17,'2014-10-29 11:14:24',32,18),(18,'2014-10-29 11:24:56',33,19),(19,'2014-10-29 11:24:56',33,20),(20,'2014-10-29 11:24:56',33,21),(21,'2014-10-29 11:30:20',34,22),(22,'2014-10-29 11:31:18',35,23),(23,'2014-10-29 11:32:09',36,24),(24,'2014-10-29 11:33:37',37,25),(25,'2014-10-29 11:33:37',37,26),(26,'2014-10-29 11:33:37',37,27),(27,'2014-10-29 11:41:34',38,28),(28,'2014-10-29 11:48:44',39,29),(29,'2014-10-29 11:54:45',40,30),(30,'2014-10-29 11:54:45',40,31),(31,'2014-10-29 11:54:45',40,32),(32,'2014-10-29 17:23:03',41,33),(33,'2014-10-29 17:23:03',41,34),(34,'2014-10-29 17:23:03',41,35),(35,'2014-10-29 17:23:03',41,36),(36,'2014-10-29 17:35:36',42,37),(37,'2014-10-29 17:35:36',42,38),(38,'2014-10-29 17:35:36',42,39),(39,'2014-10-29 17:35:42',42,40),(40,'2014-10-29 17:45:06',43,41),(41,'2014-10-29 17:45:06',43,42),(42,'2014-10-29 17:45:06',43,43),(43,'2014-10-29 17:45:07',43,44),(44,'2014-10-29 23:10:44',44,45),(45,'2014-10-29 23:10:44',44,46),(46,'2014-10-29 23:10:44',44,47),(47,'2014-10-29 23:10:44',44,48),(48,'2014-10-29 23:10:44',44,49),(49,'2014-10-29 23:10:45',44,50),(50,'2014-12-16 04:25:31',45,51),(51,'2014-12-16 04:25:31',45,52),(52,'2014-12-16 04:25:32',45,53);
/*!40000 ALTER TABLE `venta_licencia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-12-21 12:14:30
