<html>

<head>
    <title>Update Employee Data</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

<body class="body-style">


    <?php
    include_once 'Connection.php';
    $result = mysqli_query($conn, "SELECT * FROM registration WHERE id='" . $_GET['id'] . "'");
    $row = mysqli_fetch_array($result);
    
    ob_start();
    ?>

        <form method="post" action="">
                <div class="">
                    <div class="pg-margin pg-padding">
                        <div class="pg-hd-box">
                            <div class="pg-subhd-box">Update UserData</div>
                        </div>
                        <div class=" pg-box">
                            <div class="form-row">
                                <div class="form-wrapper">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    First Name:
                                    <input type="text" name="first_name" class="form-control" required value="<?php echo $row['first_name']; ?>">
                                </div>
                                <div class="form-wrapper">
                                    Last Name :
                                    <input type="text" name="last_name" class="form-control" required value="<?php echo $row['last_name']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-wrapper">
                                    email:
                                    <input type="email" name="email" class="form-control" required value="<?php echo $row['email']; ?>">
                                    <span></span>

                                </div>
                                <div class="form-wrapper">
                                    Phone No:
                                    <input type="number" name="phone_no" class="form-control" required value="<?php echo $row['phone_no']; ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-wrapper">
                                    Address:
                                    <input type="text" name="address" class="form-control" required value="<?php echo $row['address']; ?>">

                                </div>
                            <div class="form-wrapper ">
                                    Education:
                                    <select name="education" class="form-control">
                                    <option value="<?php echo $row['education']; ?>"> <?php echo $row['education']; ?> </option>
                                    <option value="Primary">Primary</option>
                                    <option value="Middle">Middle</option>
                                    <option value="Matric">Matric</option>
                                    <option value="FSC">ICS</option>
                                    <option value="FSC">FSC</option>
                                    <option value="BA ">BA</option>
                                    <option value="ICS">BBA</option>
                                    <option value="BSCS ">BS CS </option>
                                    <option value="BS IT">BS IT</option>
                                    <option value="MSc">MSC</option>
                                    <option value="MBA">MBA</option>
                                    <option value="MBBS">MBBS</option>
                                    <option value="PHD">PHD</option>
                                </select>
                                </div>
                            </div>
                            Gender: <span></span>
                            <div class="gndr-wrapper">
                                <div class="gnd-ds">
                                    <input type="radio" name="gender" class="gnd-sb-ds" value="Male" <?php if ($row['gender'] == "Male") {echo "checked";} ?> /> Male
                                </div>
                                <div class="gnd-ds">
                                    <input type="radio" name="gender" class="gnd-sb-ds"  value="Female" <?php if ($row['gender'] == "Female") { echo "checked";} ?> /> Female
                                </div>
                                <div class="gnd-ds">
                                    <input type="radio" name="gender" class="gnd-sb-ds"  value="Other" <?php if ($row['gender'] == 'Other') {echo "checked";}?> /> Other
                                </div>
                            </div>
                            <div class="btn-cntr">
                                <div class="btn-padding">
                                    <input type="submit" name="submit" value="Update" class="btn btn-success btn-lg">
                                </div>
                                <div class="btn-padding">
                                    <a href="index.php" class="btn btn-primary">Go To List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <?php
    if (count($_POST) > 0) {
        $sql = mysqli_query($conn, "UPDATE registration set
 first_name='" . $_POST['first_name'] . "',
 last_name  ='" . $_POST['last_name'] . "',
 email='" . $_POST['email'] . "',
 phone_no='" . $_POST['phone_no'] . "',
 address='" . $_POST['address'] . "',
 education='" . $_POST['education'] . "',
 gender='" . $_POST['gender'] . "'
 WHERE id='" . $_POST['id'] . "'");

        if ($sql) {
            echo "<h3>Updated data successfully.";
            // set location for redirect to index page
            echo  header("location: index.php");
        } else {
            echo "<h3> <b> You didn't filled up the form correctly. </b> </h3>" . mysqli_error($conn);
        }
    }
    ob_end_flush();
    ?>
    </form>
</body>

</html>