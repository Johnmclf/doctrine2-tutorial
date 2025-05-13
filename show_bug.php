<?php
// show_bug.php <id>
require_once "bootstrap.php";

$id = $argv[1];
$bug = $entityManager->find('Bug', $id);

if ($bug === null) {
    echo "No bug found.\n";
    exit(1);
}

echo sprintf("Bug : %s\n", $bug->getDescription());

$engineer = $bug->getEngineer();
if ($engineer !== null) {
    echo sprintf("Engineer : %s\n", $engineer->getName()); 
} else {
    echo "Engineer : Aucun ingénieur assigné.\n";
}
