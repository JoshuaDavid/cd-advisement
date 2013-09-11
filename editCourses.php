<?
include "./init.php";
$courses = new CourseList();
if(!empty($_POST["delete"])) {
    $courses->deleteCourse($_POST["courseid"]);
}
echo $courses->editTable();
?>
