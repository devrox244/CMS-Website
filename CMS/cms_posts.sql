-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cms
-- ------------------------------------------------------
-- Server version	8.0.35

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `image` varchar(50) DEFAULT NULL,
  `post` varchar(1000) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'My first post','Politics','F-22.jpg','This is my first post ever. This is my first post to be updated','Dev'),(5,'First True Post','Politics','download.jpeg','Meloni is the PM of Italy, one of the successors of the brutal dictator Benito Mussolini. PM Modi of India is on his way to be one of the most successful PMs the country has ever had. The fact that his cabinet handled external affairs to the satisfaction of both the people and government is remarkable. Together they are called Melodi, a meme which shipped the two world leaders together.','Dev'),(8,'Test Post 1','Miscellaneous','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit odio et erat feugiat lacinia in sed nunc. Nullam ac convallis magna, nec vulputate purus. Nulla ac dignissim sem. Proin eget magna efficitur, gravida est ac, laoreet odio. Aenean lectus eros, scelerisque quis vestibulum eget, hendrerit a nibh. Curabitur vulputate volutpat cursus. Aliquam aliquam placerat sapien vitae maximus. Praesent ultricies volutpat elementum. Donec nec consectetur tellus. Phasellus eget condimentum lorem, condimentum viverra orci. Mauris malesuada eu quam sit amet dignissim. Suspendisse potenti. Cras eget finibus sapien. Maecenas vitae nisl tellus.','SomaticDuke'),(9,'Test Post 2','Miscellaneous','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit odio et erat feugiat lacinia in sed nunc. Nullam ac convallis magna, nec vulputate purus. Nulla ac dignissim sem. Proin eget magna efficitur, gravida est ac, laoreet odio. Aenean lectus eros, scelerisque quis vestibulum eget, hendrerit a nibh. Curabitur vulputate volutpat cursus. Aliquam aliquam placerat sapien vitae maximus. Praesent ultricies volutpat elementum. Donec nec consectetur tellus. Phasellus eget condimentum lorem, condimentum viverra orci. Mauris malesuada eu quam sit amet dignissim. Suspendisse potenti. Cras eget finibus sapien. Maecenas vitae nisl tellus.','SomaticDuke'),(10,'Test Post 3','Politics','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum blandit odio et erat feugiat lacinia in sed nunc. Nullam ac convallis magna, nec vulputate purus. Nulla ac dignissim sem. Proin eget magna efficitur, gravida est ac, laoreet odio. Aenean lectus eros, scelerisque quis vestibulum eget, hendrerit a nibh. Curabitur vulputate volutpat cursus. Aliquam aliquam placerat sapien vitae maximus. Praesent ultricies volutpat elementum. Donec nec consectetur tellus. Phasellus eget condimentum lorem, condimentum viverra orci. Mauris malesuada eu quam sit amet dignissim. Suspendisse potenti. Cras eget finibus sapien. Maecenas vitae nisl tellus.','SomaticDuke'),(11,'Test Post 4','Politics','','Lorm Ipsumhfsdkkfjdflgvuidhbkbfvjy','Gashed@12'),(12,'Test Post 5','Miscellaneous','','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla condimentum ligula et urna fermentum, sit amet lacinia ante tempor. Suspendisse lacus mi, ullamcorper vitae egestas eget, luctus vitae tortor. Aenean eu urna mauris. Proin sed dui lectus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Nam sed justo non eros convallis semper. Aenean nec placerat magna. Quisque blandit, velit at mattis dictum, libero enim pulvinar mi, quis tempus lectus nunc a neque. Nam tempor, enim dignissim sollicitudin mollis, risus sapien lobortis velit, id accumsan magna dolor quis dolor. Proin mollis purus sed cursus bibendum. Nunc lacinia purus eget nisl maximus, sit amet convallis orci ornare. Morbi ac risus quis enim porta gravida et ultrices dui. Nulla tincidunt dui non nisl posuere, non viverra arcu fermentum.','Gashed@12');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-06-24 20:28:57
