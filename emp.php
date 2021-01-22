<?php
require_once "bootstrap.php";
 
use Models\Employer;
 
if (isset($_POST['experience']) && isset($_POST['name'])) {
    $name = $_POST['name'];
    $experience = $_POST['experience'];
    if ($experience) {
        $e = new Employer();
        $e->setName($name);
        $e->setExperience($experience);
        $entityManager->persist($e);
        $entityManager->flush();
    } else {
        $contents = file_get_contents("text.txt", $use_include_path = true);
        $myfile = fopen("text.txt", "w") or die("Unable to open file!");
        $txt = $contents. " " . $name;
        fwrite($myfile, $txt);
        fclose($myfile);
    }
 
}
;