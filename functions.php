<?
function showTable($assoc) {
    $values = array();
    foreach($assoc as $rowid => $row) {
        foreach($row as $colname => $value) {
            $values[$colname][] = $value;
        }
    }
    echo '<table>';
    echo    '<thead>';
    echo        '<tr>';
    foreach($values as $colname => $value) {
        echo        '<th>' . $colname . '</th>';
    }
    echo        '</tr>';
    echo    '</thead>';
    echo    '<tbody>';
    foreach($assoc as $rowid => $row) {
        echo    '<tr>';
        foreach($row as $colname => $value) {
            echo    '<td>' . $value . '</td>';
        }
        echo    '</tr>';
    }
    echo    '</tbody>';
}
?>
