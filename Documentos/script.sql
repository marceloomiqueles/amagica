CREATE DATABASE  IF NOT EXISTS `amagica` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `amagica`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: amagica
-- ------------------------------------------------------
-- Server version	5.5.24-log

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colegio`
--

LOCK TABLES `colegio` WRITE;
/*!40000 ALTER TABLE `colegio` DISABLE KEYS */;
INSERT INTO `colegio` VALUES (1,672,'Antártica Chilena',2,0,'Las hualtatas',1140,'+56954123456',1),(2,672,'Antártica Chilena',3,1,'Las hualtatas',1140,'+56954123456',1),(3,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(4,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(5,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(6,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(7,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(8,351,'asdlandkl',4,0,'asdaas',123123,'asdasdasd',1),(9,392,'juanito perez',2,0,'principal',354321,'+56224564568',1),(10,351,'asdasdasdasd',5,0,'123wdasd',23234234,'345345345',1),(11,351,'asdasdasdasd',5,0,'123wdasd',23234234,'345345345',1),(12,351,'asdasdasdasd',5,0,'123wdasd',23234234,'345345345',1),(13,351,'asdasdasdasd',5,0,'123wdasd',23234234,'345345345',1),(14,351,'',1,0,'',0,'',1),(15,351,'sadadasd',5,0,'sdfsdfsdf',123123,'3445645456',1),(16,351,'sadadasd',5,0,'sdfsdfsdf',123123,'3445645456',1),(17,654,'Liceo Rafael Soto Mayor',4,1,'Las tranqueras',1254,'1829391823',1),(18,351,'Ajsdasdlkjnas',4,2,'oijlaskd',12839,'912839123',5),(19,351,'asdasdasd',5,2,'asdasd',23123132,'345345',1),(20,672,'Sin Colegio',0,0,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `colegio` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `credito`
--

LOCK TABLES `credito` WRITE;
/*!40000 ALTER TABLE `credito` DISABLE KEYS */;
INSERT INTO `credito` VALUES (1,15,0,'2014-10-13 17:14:17'),(2,2,0,'2014-10-13 15:29:36'),(3,5,0,'2014-10-13 15:29:36'),(4,6,0,'2014-10-13 15:29:36'),(5,7,0,'2014-10-13 15:29:36'),(6,8,0,'2014-10-13 15:29:36');
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
  PRIMARY KEY (`id`),
  KEY `fk_curso_colegio2_idx` (`colegio_id`),
  CONSTRAINT `fk_curso_colegio2` FOREIGN KEY (`colegio_id`) REFERENCES `colegio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,19,1),(2,19,2),(3,19,3),(4,19,4);
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion` (
  `id` int(11) NOT NULL,
  `descr` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
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
  `id` int(11) NOT NULL,
  `n_solicitud` varchar(45) DEFAULT NULL,
  `producto_id` int(11) NOT NULL,
  `n_cliente` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `tiempo_duracion` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `token` varchar(500) DEFAULT NULL,
  `random` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_licencia_producto1_idx` (`producto_id`),
  CONSTRAINT `fk_licencia_producto1` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licencia`
--

LOCK TABLES `licencia` WRITE;
/*!40000 ALTER TABLE `licencia` DISABLE KEYS */;
/*!40000 ALTER TABLE `licencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `licencia_curso`
--

DROP TABLE IF EXISTS `licencia_curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `licencia_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `curso_id` int(11) NOT NULL,
  `licencia_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_table1_curso1_idx` (`curso_id`),
  KEY `fk_table1_licencia1_idx` (`licencia_id`),
  CONSTRAINT `fk_table1_curso1` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_table1_licencia1` FOREIGN KEY (`licencia_id`) REFERENCES `licencia` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `licencia_curso`
--

LOCK TABLES `licencia_curso` WRITE;
/*!40000 ALTER TABLE `licencia_curso` DISABLE KEYS */;
/*!40000 ALTER TABLE `licencia_curso` ENABLE KEYS */;
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
  `ruta` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_prducto_categoria1_idx` (`categoria_id`),
  KEY `fk_producto_idioma1_idx` (`idioma_id`),
  CONSTRAINT `fk_prducto_categoria1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_idioma1` FOREIGN KEY (`idioma_id`) REFERENCES `idioma` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,1,'AML3I','Licencia 3ro básico inglés',3,2,1,''),(4,2,'1823egidas','asklndkasd',4,1,0,'');
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
  `descr` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idresultado`),
  KEY `fk_resultado_evaluacion1_idx` (`evaluacion_id`),
  CONSTRAINT `fk_resultado_evaluacion1` FOREIGN KEY (`evaluacion_id`) REFERENCES `evaluacion` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `creado_por` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `tipo` (`tipo`),
  KEY `fk_usuario_colegio1_idx` (`colegio_id`),
  KEY `fk_usuario_usuario1_idx` (`creado_por`),
  CONSTRAINT `fk_usuario_colegio1` FOREIGN KEY (`colegio_id`) REFERENCES `colegio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_usuario_usuario1` FOREIGN KEY (`creado_por`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tipo_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1,'Marcelo','Miqueles','marcelomiqueles@hotmail.com','92c04606773f5fdf80fdd267c52a3fac',1,'+56953335336',1,1,NULL,1),(2,'Andrés','Calamaro','dana@cli.cl','81dc9bdb52d04dc20036dbd8313ed055',2,'+56954123456',2,0,NULL,1),(5,'Prueba','Vendedor','vendedor@prueba.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'756785',2,1,NULL,1),(6,'Prueba','Vendedor','vendedor@prueba.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'213123123',2,0,NULL,1),(7,'Prueba','Vendedor','vendedor@prueba.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'asdasd',2,0,NULL,1),(8,'Prueba','Vendedor','vendedor@prueba.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'asdasd',2,0,NULL,1),(9,'Prueba','Administrador Colegio','admincolegio@prueba.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'35354546',3,1,NULL,1),(10,'Prueba','profesor','profesor@prueba.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'6546516',5,0,NULL,1),(11,'Prueba','Capacitador','capacitador@prueba.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'75785758',3,1,NULL,1),(12,'2werwerwer','casxasx','asdasdxa','81dc9bdb52d04dc20036dbd8313ed055',1,'74574545',4,0,NULL,1),(13,'sadasdasd','123123','asdasd','81dc9bdb52d04dc20036dbd8313ed055',2,'123123123',3,0,NULL,5),(14,'asdasdasd','213123','asdasdasd','81dc9bdb52d04dc20036dbd8313ed055',1,'234234234',3,0,NULL,5),(15,'juanito 3','cotapos','cuanito@cotapos.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'12123123123',2,0,NULL,1),(16,'Camilo','Ibañez','camilo@colegio.cl','81dc9bdb52d04dc20036dbd8313ed055',1,'+56955555555',5,0,NULL,9),(17,'juanito perez','askjdbkasjd','hola@colegio.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'65465',3,0,NULL,5),(18,'makajnsdkansd','lansdlkan','a@a.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'684654',4,0,NULL,17),(19,'prueba vendedor','Administrador Encargado','administrador@encargado.cl','d8578edf8458ce06fbc5bb76a58c5ca4',1,'+56664613213',3,1,2,5),(20,'eugenio','miqueles','queno@miqueles.com','d8578edf8458ce06fbc5bb76a58c5ca4',1,'+56977370352',4,1,2,19);
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
  PRIMARY KEY (`id`),
  KEY `fk_venta_licencia_credito1_idx` (`credito_id`),
  KEY `fk_venta_colegio1_idx` (`colegio_id`),
  CONSTRAINT `fk_venta_colegio1` FOREIGN KEY (`colegio_id`) REFERENCES `colegio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_venta_licencia_credito1` FOREIGN KEY (`credito_id`) REFERENCES `credito` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_credito`
--

LOCK TABLES `venta_credito` WRITE;
/*!40000 ALTER TABLE `venta_credito` DISABLE KEYS */;
INSERT INTO `venta_credito` VALUES (1,1,1,'0000-00-00 00:00:00',1,1),(2,1,1,'0000-00-00 00:00:00',1,1),(3,1,1,'0000-00-00 00:00:00',1,1),(4,1,1,'0000-00-00 00:00:00',1,1),(5,1,1,'2014-10-13 17:07:30',1,1),(6,1,1,'2014-10-13 17:10:47',1,1),(7,1,1,'2014-10-13 17:12:54',1,1),(8,1,1,'2014-10-13 17:12:57',2,1),(9,1,1,'2014-10-13 17:13:00',2,1),(10,1,1,'2014-10-13 17:13:54',2,1),(11,1,1,'2014-10-13 17:14:00',2,1),(12,1,1,'2014-10-13 17:14:13',2,1),(13,1,1,'2014-10-13 17:14:15',1,1),(14,1,1,'2014-10-13 17:14:16',1,1),(15,1,1,'2014-10-13 17:14:17',1,1);
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta_licencia`
--

LOCK TABLES `venta_licencia` WRITE;
/*!40000 ALTER TABLE `venta_licencia` DISABLE KEYS */;
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

-- Dump completed on 2014-10-14 23:48:36
