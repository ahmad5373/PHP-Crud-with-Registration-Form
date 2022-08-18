<!DOCTYPE html>
<html lang="en">

<head>
    <title>Delete data from Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script language="JavaScript" type="text/javascript">

    </script>

</head>

<body>
    <center>

        <?php
        include_once "Connection.php";
        $sql = "UPDATE registration set   deletedAt= CURRENT_TIMESTAMP   WHERE deletedAt IS NULL AND id ='" . $_POST['id'] . "'";
        if (mysqli_query($conn, $sql)) {
            echo " <h2> <b> Record Has Been Deleted Successfully.</b> </h2>";
            header("Location:index.php");
        } else {
            echo "Error Occured while deleted record:" . mysqli_error($conn);
        }
        mysqli_close($conn);

        ?>

        <br>
        <a href="inde.php">
            <button class="btn btn-primary btn-lg" type="submit">Go To List </button>
        </a>
    </center>
</body>

</html>