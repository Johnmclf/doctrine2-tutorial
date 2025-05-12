 <?php
 //bootstrap.php
 use Doctrine\DBAL\DriverManager;
 use Doctrine\ORM\EntityManager;
 use Doctrine\ORM\ORMSetup;
 require_once "vendor/autoload.php";
 //Createasimple "default"DoctrineORMconfigurationfor Attributes
 $config = ORMSetup::createAttributeMetadataConfiguration(
 paths:array(__DIR__."/src"),
 isDevMode: true,
 );
 //or ifyou preferXML
 //$config=ORMSetup::createXMLMetadataConfiguration(
 // paths:array(__DIR__."/config/xml"),
 // isDevMode:true,
 //);
 //configuringthe databaseconnection
 $connection =DriverManager::getConnection([
 'driver' => 'pdo_sqlite',
 'path' =>__DIR__. '/db.sqlite',
 ],$config);
 //obtainingtheentitymanager
 $entityManager =new EntityManager($connection,$config);