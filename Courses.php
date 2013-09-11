<?
class CourseList {
    function __construct() {
        $this->pdo = new PDO('sqlite:db/courses.sqlite3');
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS courses (
            courseid text,
            description text,
            units int,
            difficulty float
        )");
    }

    function addCourse($courseid, $description, $units, $difficulty) {
        $query = "INSERT INTO courses
            (        courseid,  description,  units,  difficulty)
            VALUES (:courseid, :description, :units, :difficulty)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(":courseid", $courseid);
        $statement->bindParam(":description", $description);
        $statement->bindParam(":units", $units);
        $statement->bindParam(":difficulty", $difficulty);
        $statement->execute();
    }

    function getCourseList() {
        $query = "SELECT * FROM courses";
        $statement = $this->pdo->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $final = array();
        foreach($result as $rowid => $row) {
            if(strlen($row["courseid"])) {
                $final[$rowid] = $row;
            }
        }
        return $final;
    }

    function deleteCourse($courseid) {
        $query = "SELECT ROWID FROM courses WHERE courseid=:courseid";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(":courseid", $courseid);
        $statement->execute();
        $result = $statement->fetch();
        $rowid = $result["rowid"];
        $deletequery = "DELETE FROM courses WHERE ROWID=:rowid";
        $statement = $this->pdo->prepare($deletequery);
        $statement->bindParam(":rowid", $rowid);
        $statement->execute();
    }

    function viewTable() {
        $courseList = $this->getCourseList();
        $colnames = array_keys(reset($courseList));
        $html  = "";
        $html .= '<table>';
        $html .=    '<thead>';
        $html .=        '<tr>';
        foreach($colnames as $colname) {
            $html .=        '<th>' . $colname . '</th>';
        }
        $html .=        '</tr>';
        $html .=    '</thead>';
        $html .=    '<tbody>';
        foreach($courseList as $rowid => $row) {
            $html .=    '<tr>';
            foreach($row as $colname => $value) {
                $html .=    '<td>' . $value . '</td>';
            }
            $html .=    '</tr>';
        }
        $html .=    '</tbody>';
        $html .= '</table>';
        return $html;
    }

    function editTable() {
        $courseList = $this->getCourseList();
        $colnames = array_keys(reset($courseList));
        $html  = "";
        $html .= '<table>';
        $html .=    '<thead>';
        $html .=        '<tr>';
        foreach($colnames as $colname) {
            $html .=        '<th>' . $colname . '</th>';
        }
        $html .=            '<th></th>';
        $html .=        '</tr>';
        $html .=    '</thead>';
        $html .=    '<tbody>';
        foreach($courseList as $rowid => $row) {
            $html .=    '<tr>';
            $html .=        '<form method="post">';
            foreach($row as $colname => $value) {
                $html .=        '<td>';
                $html .=            "<input name='{$colname}' value='{$value}' />";
                $html .=        '</td>';
            }
            $html .=            '<td>';
            $html .=                '<input type="submit" name="save" value="save"/>';
            $html .=                '<input type="submit" name="delete" value="delete"/>';
            $html .=            '</td>';
            $html .=        '</form>';
            $html .=    '</tr>';
        }
        $html .=    '</tbody>';
        $html .= '</table>';
        return $html;
    }
}
?>
