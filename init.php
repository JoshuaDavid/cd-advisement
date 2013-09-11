<?
$pdo = new PDO('sqlite:db/courses.sqlite3');
$query = "CREATE TABLE IF NOT EXISTS courses (courseid text, description text, units int, difficulty float)";
$pdo->exec($query);
include "./functions.php";
include "./Courses.php";
?>
<form action="./"><button>Back</button></form>
