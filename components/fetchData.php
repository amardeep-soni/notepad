<?php
include 'components/connectdb.php';
$selectSql = "SELECT * FROM `$userTable` ORDER BY `imp` DESC, `timestamp` DESC";

$selectResult = mysqli_query($conn, $selectSql);
//calculate numbers of rows
$num = mysqli_num_rows($selectResult);
if ($num > 0) {
    $count = 1;
    while ($row = mysqli_fetch_assoc($selectResult)) {
        echo "
        <div class='card text-white'>
            <div class='card-header'>{$row['title']}</div>
            <div class='card-body'>{$row['description']}</div>
            <div class='card-footer'>
                <div class='timestamp'>{$row['timestamp']}</div>
                <div>
                    <i class='fa fa-star star-icon " . ($row['imp'] == 1 ? 'active' : '') . "' onclick='updateImp({$row['sno']}, {$row['imp']})'></i>
                    <i class='fa-solid fa-pen edit-icon' data-toggle='modal' data-target='#addNote' data-id='{$row['sno']}' data-title='{$row['title']}' data-desc='{$row['description']}' data-imp='{$row['imp']}'></i>
                    <i class='fa-solid fa-trash delete-icon' data-id='{$row['sno']}' data-toggle='modal' data-target='#deleteNote'></i>
                </div>
            </div>
        </div>";
        $count++;
    }
} else {
    echo "<h2 class='text-white text-center'>Insert the notes to display</h2>";
}
