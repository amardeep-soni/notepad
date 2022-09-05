<?php
include 'components/connectdb.php';
$insertSql = "SELECT * FROM `$userTable`";
$insertResult = mysqli_query($conn, $insertSql);
//calculate numbers of rows
$num = mysqli_num_rows($insertResult);
if ($num > 0) {
    $count = 1;
    while ($row = mysqli_fetch_assoc($insertResult)) {
        echo "
        <div class='col-md-4'>
            <div class='card text-white bg-danger mb-3'>
                <div class='card-header d-flex justify-content-between'>
                    <span>Note #" . $count . "</span> 
                    <div class='iconCont'>
                        <i class='fa-solid fa-pen icon' id=" . $row['sno'] . " onclick='updateFunction(this)' data-toggle='modal' data-target='#updateModal'></i>
                        <i class='fa-solid fa-trash icon' id=" . $row['sno'] . " onclick='deleteFunc(this.id)' data-toggle='modal' data-target='#deleteModal'></i>
                    </div>
                </div>
                <div class='card-body'>
                    <h5 class='card-title'>" . $row['title'] . "</h5>
                    <p class='card-text'>" . $row['description'] . "</p>
                </div>
            </div>
        </div>";
        $count++;
    }
} else {
    echo "<h2>Insert the notes to display</h2>";
}
