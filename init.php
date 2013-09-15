<?
$pdo = new PDO('sqlite:db/courses.sqlite3');
$query = "CREATE TABLE IF NOT EXISTS courses (id int autoincrement, courseid text, description text, units int, difficulty float)";
$pdo->exec($query);
include "./functions.php";
include "./CourseList.php";
?>
<form action="./"><button>Back</button></form>
