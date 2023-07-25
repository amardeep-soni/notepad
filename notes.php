<?php
$loginStatus = true;
$currentPage = "notes";

session_start();

if (!isset($_SESSION['id'])) {
    header("location:account.php");
    exit;
} else {
    $id = $_SESSION['id'];
    $userTable = "user_${id}";
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Amardeep Notes App</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

</head>

<body>
    <?php
    include 'components/nav.php';
    include 'components/insertUpdateDelete.php';
    ?>


    <!-- insert success alert -->
    <div class="container d-flex justify-content-center align-items-center flex-column my-4">
        <h1>Amardeep Notes App</h1>
        <form style="width: 50%;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="mb-3">
                <label for="inputTitle" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="inputTitle">
            </div>
            <div class="mb-3">
                <label for="inputDescription" class="form-label">Description</label>
                <textarea name="description" id="inputDescription" class="form-control" cols="30" rows="2"></textarea>
            </div>
            <input type="submit" class="btn btn-danger" name="insertData" value="Submit">
        </form>
    </div>
    <div class="container">
        <div class="row">
            <?php
            include 'components/fetchData.php';
            ?>
        </div>
    </div>

    <!-- update Modal -->
    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModal">Update the note</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="updateForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="mb-3">
                            <input type="hidden" name="updateSno" class="form-control" id="updateSno">
                        </div>
                        <div class="mb-3">
                            <label for="updateInputTitle" class="form-label">Title</label>
                            <input type="text" name="updateTitle" class="form-control" id="updateInputTitle">
                        </div>
                        <div class="mb-3">
                            <label for="updateInputDescription" class="form-label">Description</label>
                            <textarea name="updateDescription" id="updateInputDescription" class="form-control" rows="2"></textarea>
                        </div>
                        <input type="submit" class="btn btn-danger" name="updateData" id="updateSubmitBtn" value="Update">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- delte modal -->

    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModal">Are you sure! You want to delete the Note?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" id="deleteForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <div class="mb-3">
                            <input type="hidden" name="deleteSno" class="form-control" id="deleteSno">
                        </div>
                        <input type="submit" class="btn btn-danger" name="deleteData" id="deleteYesBtn" value="Yes">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script src="updateDelete.js"></script>

</body>

</html>