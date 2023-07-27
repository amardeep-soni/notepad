<?php
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>

<body id="notesBody">
    <p id="heading">Amardeep Notepad <a href="./components/logout.php" class="btn logout">Logout</a></p>
    <div class="cont">
        <div class="itemsCont">
            <div id="addNotesCard" class="card">
                <div class="cirlce" id="addNoteIcon" data-toggle='modal' data-target='#addNote'>
                    <i class="fa fa-plus"></i>
                </div>
                <p>Add New Note</p>
            </div>
            <?php
            include 'components/fetchData.php';
            ?>
        </div>
    </div>

    <div class="modal fade" id="addNote" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addNoteLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addNoteLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addOrEditProject" action="./components/addOrEdit.php" method="POST" autocomplete="off">
                        <input type="text" name="id" class="d-none" id="idInput">
                        <div class="form-check mb-2">
                            <input type="checkbox" class="form-check-input" id="impInput" name="imp">
                            <label class="form-check-label" for="impInput">Is Important</label>
                        </div>
                        <div class="form-group">
                            <label for="titleInput">Title</label>
                            <input type="text" required class="form-control" name="title" id="titleInput">
                        </div>
                        <div class="form-group">
                            <label for="descInput">Description</label>
                            <input type="text" required class="form-control" name="desc" id="descInput">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
                            <button type="submit" class="btn btn-primary" id="saveNote">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="deleteNote">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h3>Are you Sure You Want to Delete</h3>
                    <form id="deleteForm" action="./components/delete.php" method="POST" class="needs-validation" novalidate>
                        <input type="text" name="id" id="deleteId" class="d-none">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" aria-label="Close">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <script>
        $(document).on("click", "#addNoteIcon", function() {
            $("#addNote .modal-body #idInput").val('');
            $("#addNote .modal-body #titleInput").val('');
            $("#addNote .modal-body #descInput").val('');
            $("#addNote .modal-body #impInput").prop("checked", false);
            $("#addNoteLabel").text('Add Note');
        });
        $(document).on("click", ".edit-icon", function() {
            var id = $(this).data('id');
            var title = $(this).data('title');
            var desc = $(this).data('desc');
            var imp = $(this).data('imp');
            $("#addNote .modal-body #idInput").val(id);
            $("#addNote .modal-body #titleInput").val(title);
            $("#addNote .modal-body #descInput").val(desc);
            $("#addNoteLabel").text('Update Note');
            if (imp == 1) {
                $("#addNote .modal-body #impInput").prop("checked", true);
            } else {
                $("#addNote .modal-body #impInput").prop("checked", false);
            }
        });
        $(document).on("click", ".delete-icon", function() {
            var id = $(this).data('id');
            $("#deleteNote .modal-body #deleteId").val(id);
        });

        function updateImp(noteId, imp) {
            console.log(noteId, imp);
            let xhr = new XMLHttpRequest();
            xhr.open("POST", "./components/updateImp.php", true);
            xhr.onload = () => {
                if (xhr.readyState == XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        let data = xhr.response;
                        if (data == 'success') {
                            location.reload();
                        }
                    }
                }
            }
            let formData = new FormData();
            formData.append('noteId', noteId);
            formData.append('imp', imp);
            xhr.send(formData);
        }
    </script>
</body>

</html>