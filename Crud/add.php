
<?php
include ("../init.php");
use Control\student;

$template = $mustache->loadTemplate('add.mustache');
echo $template->render();

try {
    if(isset($_POST['studentId'])){

        $student= new Student($_POST['studentId'],$_POST['firstName'], $_POST['lastName'], $_POST['birthdate'], $_POST['address'], $_POST['program'], $_POST['contactNumber'], $_POST['emergencyContact']);
        $student->setConnection($connection);
        $add_student = $student->addStudent();
        echo "<script>window.location.href='index.php?message=1';</script>";
        exit();
    }
} catch (Exception $e) {
    echo "<script>window.location.href='index.php?error='" . $e->getMessage() . ";</script>";
    exit();
}
?>