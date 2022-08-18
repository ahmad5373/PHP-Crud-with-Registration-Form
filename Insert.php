<!DOCTYPE html>

<head>
    <title> Store Data</title>
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->

</head>

<body class="body-style">
    <?php
    //Include database connection here
    require_once "Connection.php";

    // define variables and set to empty values
    $first_nameErr = $last_nameErr = $gmailErr = $genderErr = $phoneErr = $addressErr = $educationErr = "";
    $first_name = $last_name = $email = $gender = $phone_no = $address = $education = "";

    if ("POST") {
        // Taking all 5 values from the form data(input)
        if (empty($_POST["first_name"])) {
            $first_nameErr = "First Name is Required";
        } else {
            $first_name = test_input($_POST['first_name']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-']*$/ ", $first_name)) {
                $first_nameErr = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["last_name"])) {
            $last_nameErr = "Last Name is Required";
        } else {
            $last_name = test_input($_POST['last_name']);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z-']*$/ ", $last_nameErr)) {
                $last_nameErr = "Only letters and white space allowed";
            }
        }
        if (empty($_POST["email"])) {
            $gmailErr = "Gmail is Required";
        } else {
            $email = test_input($_POST['email']);
            // check if e-mail address is well-formed
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $gmailErr = "Invalid email Format";
            }
        }
        if (empty($_POST["gender"])) {
            $genderErr = "Gender Is Required";
        } else {
            $gender = test_input($_POST['gender']);
        }
        if (empty($_POST["phone_no"])) {
            $phoneErr = "Phone Number is required";
        } else {
            $phone_no = test_input($_POST['phone_no']);
        }

        if (empty($_POST["address"])) {
            $addressErr = "address is required";
        } else {
            $address = test_input($_POST['address']);
        }
        if (!empty($_POST["education"])) {
            $education = ($_POST['education']);
        }
    }
    function test_input($data)
    {
        $data = htmlspecialchars(stripslashes(trim($data)));
        return $data;
    }
    ob_start();

    ?>
        <form action="Insert.php" method="POST">
            <div class="container py-5 h-100">
                <div class="">
                    <div class="pg-margin pg-padding">
                        <div class="pg-hd-box">
                            <div class="pg-subhd-box">Registration form</div>
                            <div class="pg-sbhd-box"> <span class="error">* Required field</span></div>
                        </div>
                        <div class=" pg-box">
                            <div class="form-row">
                                <div class="form-wrapper">
                                    First Name:<span class="error">* </span>
                                    <input type="text" name="first_name" placeholder="First Name" class="form-control" required>
                                </div>
                                <div class="form-wrapper">
                                    Last Name: <span class="error">* </span>
                                    <input type="text" name="last_name" id="lastName" placeholder="Last Name" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-wrapper">
                                    G mail:<span class="error">*</span>
                                    <input type="email" name="email" id="GMail" placeholder="Email" class="form-control" required>
                                </div>
                                <div class="form-wrapper">
                                    phone No:<span class="error">*</span>
                                    <input type="number" name="phone_no" id="phone no" placeholder="Phone No" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-wrapper">
                                    Address:<span class="error">*</span>
                                    <input type="text" name="address" id="Address" placeholder="Address" class="form-control" required>
                                </div>
                                <div class="form-wrapper ">
                                    Education:
                                    <select name="education" class="form-control">
                                        <option value="Primary">Primary</option>
                                        <option value="Middle">Middle</option>
                                        <option value="Matric">Matric</option>
                                        <option value="FSC">ICS</option>
                                        <option value="FSC">FSC</option>
                                        <option value="BA ">BA</option>
                                        <option value="ICS">BBA</option>
                                        <option value="BSCS ">BS CS </option>
                                        <option value="BS IT">BS IT</option>
                                        <option value="MSc">MSc</option>
                                        <option value="MBA">MBA</option>
                                        <option value="MBBS">MBBS</option>
                                        <option value="PHD">PHD</option>
                                    </select>
                                </div>
                            </div>
                            Gender: <span class="error">*</span>
                            <div class="gndr-wrapper">
                                <div class="gnd-ds">
                                    <input type="radio" name="gender" class="gnd-sb-ds" value="Male"/> Male
                                </div>
                                <div class="gnd-ds">
                                    <input type="radio" name="gender" class="gnd-sb-ds" value="Female"/> Female
                                </div>
                                <div class="gnd-ds">
                                    <input type="radio" name="gender" class="gnd-sb-ds" value="Other"/> Other
                                </div>
                            </div>
                            <div class="btn-cntr">
                                <div class="btn-padding">
                                    <input type="submit" name="submit" value="Submit" class="btn btn-success btn-lg">
                                </div>
                                <div class="btn-padding">
                                    <a href="index.php" class="btn btn-primary">Go to List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </form>
    <div id="#globalContainer">
        <?php
        if (isset($_POST["submit"])) {

            if ($first_nameErr == "" && $last_nameErr == "" && $gmailErr == "" && $phoneErr == "" && $addressErr == "" && $educationErr == "" && $genderErr == "") {

                // // Show output of user inserted data
                // echo "<h3 color = #FF0001> <b> You Have Successfully Registered. </b> </h3>";
                // echo "<h2> Your Input: </h2>";
                // echo "First Name:" . $first_name;
                // echo "<br>";
                // echo "Last Name:" . $last_name;
                // echo "<br>";
                // echo "Gmail:" . $email;
                // echo "<br>";
                // echo "Gender:" . $gender;
                // echo "<br>";
                // echo "Education:" . $education;


                // Performing insert query execution
                // here our table name is registration
                $sql = "INSERT INTO `registration`(`first_name`, `last_name`, `email`, `phone_no`,`address`,`education`,`gender` ) VALUES 
                ('$first_name','$last_name','$email','$phone_no' , '$address' , '$education' , '$gender')";
                $result = mysqli_query($conn, $sql);

                // set location for redirect to index page
                echo  header("location: index.php");
            } else {
                echo "<h3> <b> You didn't filled up the form correctly. </b> </h3>" . mysqli_error($conn);
            }
        }
        ob_end_flush();
        ?>
    </div>
</body>

</html>