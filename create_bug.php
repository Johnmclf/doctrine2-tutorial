<?php
//create_bug.php<reporter-id> <engineer-id><product-ids>
require_once "bootstrap.php";
$reporterId =$argv[1];
$engineerId =$argv[2];
$productIds =explode(",", $argv[3]);
$reporter =$entityManager->find("User", $reporterId);
$engineer =$entityManager->find("User", $engineerId);
if(!$reporter||!$engineer){
    echo "Noreporter and/orengineer foundfor thegivenid(s).\n";
    exit(1);
}
$bug = new Bug();
$bug->setDescription("Something doesnot work!");
$bug->setCreated(new DateTime("now"));
$bug->setStatus("OPEN");
foreach($productIds as $productId){
    $product =$entityManager->find("Product", $productId);
    $bug->assignToProduct($product);
}
$bug->setReporter($reporter);
$bug->setEngineer($engineer);
$entityManager->persist($bug);
$entityManager->flush();
echo"Your newBug Id:".$bug->getId()."\n";