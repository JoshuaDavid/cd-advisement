<?
$pdo = new PDO('sqlite:db/courses.sqlite3');
$pdo->exec("DROP TABLE courses");
?>
