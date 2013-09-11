<?
include "./init.php";
$name = $_POST["courseid"];
$description = $_POST["description"];
$units = $_POST["units"];
$difficulty = $_POST["difficulty"];
$courses = new CourseList();
$courses->addCourse($name, $description, $units, $difficulty);
?>
<html>
    <head>
        <meta charset="utf-8" />
    </head>
    <body>
        <form method="post">
            <table>
                <tr>
                    <td><label>Course Name (e.g. CD 101):</label></td>
                    <td><input type="text" name="courseid" value="<? echo $_POST['courseid']; ?>" /></td>
                </tr>
                <tr>
                    <td><label>Course Description:</label></td>
                    <td><input type="text" name="description" value="<? echo $_POST['description']; ?>" /></td>
                </tr>
                <tr>
                    <td><label>Units:</label></td>
                    <td><input type="number" name="units" value="<? echo $_POST['units']; ?>" /></td>
                </tr>
                <tr>
                    <td><label>Difficulty:</label></td>
                    <td><input type="number" name="difficulty" value="<? echo $_POST['difficulty']; ?>" /></td>
                </tr>
                <tr>
                    <td><input type="submit" /></td>
                </tr>
            </table>
        </form>
    </body>
</html>
