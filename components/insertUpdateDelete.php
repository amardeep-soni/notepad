<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'components/connectdb.php';
    if (isset($_POST['insertData'])) {
        // insertData
        $insertTitle = $_POST["title"];
        $insertDescription = $_POST["description"];

        $sql = "INSERT INTO `$userTable` (`title`, `description`) VALUES ('$insertTitle', '$insertDescription')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            activeAlert("insert");
            header("refresh:1;url=#"); // reload the page after 2 second
        }
    } else if (isset($_POST['updateData'])) {
        // updateData
        $titleUpdate = $_POST['updateTitle'];
        $descriptionUpdate = $_POST['updateDescription'];
        $snoUpdate = $_POST['updateSno'];

        $updateSql = "UPDATE `$userTable` SET `title` = '$titleUpdate', `Description` = '$descriptionUpdate' WHERE `$userTable`.`sno` = $snoUpdate";
        $updateResult = mysqli_query($conn, $updateSql);
        if ($updateResult) {
            activeAlert("update");
            header("refresh:1;url=#");
        }
    } else {
        // delete data
        $snoDelete = $_POST['deleteSno'];
        $deleteSql = "DELETE FROM $userTable where `sno` = $snoDelete";
        $deleteResult = mysqli_query($conn, $deleteSql);
        if ($deleteResult) {
            activeAlert("delete");
            header("refresh:1;url=#");
        }
    }
}
function activeAlert($check)
{
    echo "
    <div class='alert alert-success mb-0 alert-dismissible fade show' role='alert' id='successAlert'>
        <strong>Success!</strong> Your Note is ${check}ed successfully.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
            <span aria-hidden='true'>&times;</span>
        </button>
    </div>";
}
