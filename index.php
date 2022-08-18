<!DOCTYPE html>

<head>
    <title>View Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
        .wrapper {
            width: 1200px;
            margin: auto;
        }
    </style>
</head>

<body>
    <?php
    require_once "Connection.php";

    //Query For Retrived Data from Database
    $sql = "SELECT * FROM registration WHERE deletedAt IS NULL ";

    $result = mysqli_query($conn, $sql);
    ?>

    <!-- Table That show on home screen -->
    <div class="container mt-2">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 m-auto">
                <div class="text-right">
                    <a href="insert.php">
                        <button type="button" style="margin: 4px 0px 10px 4px;" class="btn btn-primary ">Add New Record</button>
                    </a>
                </div>
                <table class="table table-bordered table-hovered table-striped" id="table_id">

                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>email</th>
                            <th>Phone No</th>
                            <th>Address</th>
                            <th>Education</th>
                            <th>Gender</th>
                            <th></th>
                            <th></th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        for ($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                        ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['first_name'] ?></td>
                                <td><?php echo $row['last_name'] ?></td>
                                <td><?php echo $row['email'] ?></td>
                                <td><?php echo $row['phone_no'] ?></td>
                                <td><?php echo $row['address'] ?></td>
                                <td><?php echo $row['education'] ?></td>
                                <td><?php echo $row['gender'] ?></td>
                                <td><a href="update.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm">Update</a></td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-sm deletebtn"> Delete </button>

                                    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
                                    <div class="modal fade" id="deletemodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h2 class="modal-title" id="exampleModalLabel">Delete User<h2 id="first_name"></h2>
                                                    </h2>
                                                </div>
                                                <form action="delete.php" method="POST">
                                                    <div class="modal-body">
                                                        <input type="hidden" name="id" id="id">
                                                        <h4 id="first_name"></h4>
                                                        <h4> Do you want to Delete this Record ??</h4>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel </button>
                                                        <button type="submit" name="deletedata" class="btn btn-danger"> Delete.</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php mysqli_close($conn);
    ?>
    <br>
    <!-- Script --->
    <script>
        $(document).ready(function() {
            $('.deletebtn').on('click', function() {
                $('#deletemodal').modal('show');
                $tr = $(this).closest('tr');
                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();
                $('#id').val(data[0]);
                $('#first_name').html(data[1]);
                $('#last_name').html(data[2]);
            });
        });
    </script>
    <!-- Script for Jquery datatable designing -->
    <script>
        $(document).ready(function() {
            $('#table_id').DataTable();
        });
    </script>
</body>

</html>