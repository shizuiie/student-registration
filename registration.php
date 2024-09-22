<?php
include 'header.php';
?>
<body>
<div class="">
<script>

</script>
    <button><a href="#myModal" class="trigger-btn" data-toggle="modal">Register</a></button>
</div>

<div id="myModal" class="modal fade">
    <div class="modal-dialog modal-login">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Register</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <?php
            if (isset($_POST["submit"])) {
                $lname = $_POST["lname"];
                $fname = $_POST["fname"];
                $sid = $_POST["sid"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $repeatPassword = $_POST["repeatPassword"];

                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $errors = array();

                // if(empty($lname) OR empty($fname) OR empty($sid) OR empty($password) OR empty($repeatPassword) OR empty($email)){
                //     array_push($errors, "All fields are required");
                // }
                if(!preg_match('/^[A-Z][0-9]{2}-[0-9]{4}$/', $sid)){
                    array_push($errors, "Student ID must be in the format AXX-XXXX");
                }
                if(!preg_match('/^(0[1-9]|1[0-2])-(0[1-9]|1[0-9]|2[0-9]|3[0-1])-(19|20)\d\d$/', $password)){
                    array_push($errors, "Password must be in the format MM-DD-YYYY");
                }
                if($password!==$repeatPassword){
                    array_push($errors, "Password does not match");
                }

                // Check if email already exists
                require_once "dbconnect.php";
                $sql = "SELECT * FROM register WHERE email = '$email'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if($rowCount>0){
                    array_push($errors, "Email address is already in use.");
                }

                // Check if student ID already exists
                require_once "dbconnect.php";
                $sql = "SELECT * FROM register WHERE sid = '$sid'";
                $result = mysqli_query($conn, $sql);
                $rowCount = mysqli_num_rows($result);
                if($rowCount>0){
                    array_push($errors, "Student ID is already in use.");
                }

                if (count($errors)>0){
                    foreach($errors as $error){
                        echo "<div class=' alert alert-danger'>$error</div>";
                    }
                }else{
                    require_once "dbconnect.php";
                    $sql = "INSERT INTO register(sid, lname, fname, email, password) VALUES ( ?, ?, ?, ?, ?)";
                    $stmt = mysqli_stmt_init($conn);
                    $prepareStmt = mysqli_stmt_prepare($stmt, $sql);
                    if($prepareStmt){
                        mysqli_stmt_bind_param($stmt,"sssss",$sid, $lname, $fname, $email, $passwordHash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class = 'alert alert-success'>You registered successfully!</div>";
                    }else{
                        die("Something went wrong.");
                    }
                }
            }
            ?>
            <div class="modal-body">
          

                <form action="registration.php" method="POST">
                    <label for="student ID">Student ID(AXX-XXXX):</label>
                    <div class="form-group">
                        <input type="text" class="form-control" name = "sid"
                               placeholder="Enter Student ID" required="required">
                    </div>
                    <label for="name">Name:</label>
                    <div class="form-group form-inline">
                        <input type="text" class="form-control" name="fname" placeholder="First name" required="required" style="width: 49%;margin-right: 2%">
                        <input type="text" class="form-control" name="lname" placeholder="Last name" required="required" style="width: 49%">
                    </div>

                    <label for="email">Email:</label>
                    <div class="form-group">
                        <input type="email" class="form-control" name = "email" placeholder="Email" required="required">
                    </div>

                    <label for="Password">Birthday (MM-DD-YYYY) | (Set as your password)</label>
                    <div class="form-group">
                        <input type="password" name = "password" id="password" class="form-control" placeholder="Enter your password" required="required">
                        <input type="checkbox" id="show-password" onclick="showPassword('password')"> Show Password
                    </div>

                    <label for="Password">Repeat Password:</label>
                    <div class="form-group">
                        <input type="password" name = "repeatPassword" id="repeat-password" class="form-control" placeholder="Re-enter your password" required="required">
                        <input type="checkbox" id="show-repeat-password" onclick="showPassword('repeat-password')"> Show Password
                    </div>
                    <div class="form-group">
                        <input type="submit" name = "submit" class="btn btn-primary btn-block btn-lg" value="Register">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p>Already registered? <a href="#">Sign In Here</a></p>
            </div>
        </div>
    </div>
</div>
<script>
    function showPassword(id) {
    var passwordInput = document.getElementById(id);
    var showPasswordCheckbox = document.getElementById("show-" + id);
    if (showPasswordCheckbox.checked) {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}
</script>
</body>