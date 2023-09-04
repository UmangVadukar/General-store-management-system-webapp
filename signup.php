<?php
require_once 'conn.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Form Switch</title>
    <style>
        .hidden {
            display: none;
        }


        form {
            background-color: rgba(255, 255, 255, 0.8);
            background-blend-mode: multiply;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
            margin: 0 auto;
            margin-top: 50px;
        }
    </style>
    <link rel="stylesheet" href="bootstrap-5.3.0-dist\css\bootstrap.min.css">
</head>

<body>
    <div class="container" style="width:50%">
        <?php
        if (isset($_POST["signup"])) {
            $uname = $_POST["user"];
            $pass = $_POST["spass"];
            $cpass = $_POST["cpass"];
            $hash_pass = password_hash($pass, PASSWORD_DEFAULT);

            if ($pass === $cpass) {
                $qins = "INSERT INTO `customer` VALUES('$uname','$hash_pass')";
                mysqli_query($conn, $qins);
            } else {
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
        </svg>
        <div class="alert alert-warning my-3 alert-dismissible fade show" role="alert"  style="width: 100%; height: 7vh;">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
       <strong> Password Does not Match!!!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
    </div>
  
    ';
            }

        }
        if (isset($_POST["signin"])) {
            $luname = $_POST['louser'];
            $lpaswd = $_POST["lopass"];


            $querysel = "SELECT * FROM `customer` WHERE `user`='$luname'";
            $result = mysqli_query($conn, $querysel);


            $row = mysqli_fetch_assoc($result);

            if ($row) {
                $hash = $row["password"];

                if (password_verify($lpaswd, $hash)) {
                    $_SESSION["username"] = $luname;
                    header('location:hello.php');
                } else {
                    echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
        </svg>
        <div class="alert alert-warning my-3 alert-dismissible fade show" role="alert"  style="width: 100%; height: 7vh;">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
       <strong> Username and Password are invalid!!!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
    </div>';
                }
            } else {
                echo '<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
        </svg>
        <div class="alert alert-warning my-3 alert-dismissible fade show" role="alert"  style="width: 100%; height: 7vh;">
    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
       <strong> Username and Password are invalid!!!</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    </button>
    </div>';
            }

        }


        ?>
    </div>
    <div class="container" style="width: 450px;
    margin-top: 110px;">
        <!-- Pills navs -->
        <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link active" data-mdb-toggle="pill" id="loginLink" role="tab" href="#">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" data-mdb-toggle="pill" id="signupLink" role="tab" href="#"
                    aria-controls="pills-register" aria-selected="false">Signup</a>
            </li>
        </ul>
        <!-- Pills navs -->

        <!-- Pills content -->
        <div class="tab-content">
            <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                <form id="loginForm" method="post">
                    <div class="text-center mb-3" style="font-size: 30px;
                    font-family: sans-serif;">
                        <b>
                            <p>Sign in</p>
                        </b>
                    </div>


                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="text" name="louser" id="loginName" class="form-control"
                            placeholder="Email or Username" required />
                    </div>

                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="lopass" id="loginPassword" class="form-control"
                            placeholder="password" required />
                    </div>


                    <!-- Submit button -->
                    <button type="submit" name="signin" class="btn btn-primary btn-block mb-4">Sign in</button>
                </form>
                <?php

                ?>
            </div>
            <form id="signupForm" class="hidden" method="post">
                <div class="text-center mb-3" style="font-size: 30px;
                font-family: sans-serif;">
                    <b>
                        <p>Sign up</p>
                    </b>
                </div>

                <!-- Name input -->
                <div class="form-outline mb-4">
                    <input type="text" id="registerName" class="form-control" placeholder=" Your Name" required />
                </div>

                <!-- Username input -->
                <div class="form-outline mb-4">
                    <input type="text" name="user" id="registerUsername" class="form-control" placeholder="Username"
                        required />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="spass" id="registerPassword" class="form-control"
                        placeholder="Enter Password" required />
                </div>

                <!-- Repeat Password input -->
                <div class="form-outline mb-4">
                    <input type="password" name="cpass" id="registerRepeatPassword" class="form-control"
                        placeholder="Confrim Password" required />
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-center mb-4">
                    <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck"
                        aria-describedby="registerCheckHelpText" required />
                    <label class="form-check-label" for="registerCheck" style="    font-size: 20px;
                    font-family: sans-serif">
                        I have read and agree to the terms
                    </label>
                </div>

                <!-- Submit button -->
                <button type="submit" name="signup" class="btn btn-primary btn-block mb-3">Sign up</button>
            </form>
        </div>
    </div>
    <!-- Pills content -->
    <script>
        var loginLink = document.getElementById('loginLink');
        var signupLink = document.getElementById('signupLink');
        var loginForm = document.getElementById('loginForm');
        var signupForm = document.getElementById('signupForm');

        loginLink.addEventListener('click', function (event) {
            event.preventDefault();

            loginForm.classList.remove('hidden');
            signupForm.classList.add('hidden');

            loginLink.classList.add('active');
            signupLink.classList.remove('active');

            loginLink.textContent = 'Login';
            signupLink.textContent = 'Sign Up';
        });

        signupLink.addEventListener('click', function (event) {
            event.preventDefault();

            signupForm.classList.remove('hidden');
            loginForm.classList.add('hidden');

            signupLink.classList.add('active');
            loginLink.classList.remove('active');

            signupLink.textContent = 'Sign Up';
            loginLink.textContent = 'Login';
        });

    </script>
    <script src="bootstrap-5.3.0-dist\js\bootstrap.min.js"></script>
    <script src="bootstrap-5.3.0-dist\js\jquery.min.js"></script>


    <?php

    ?>
</body>

</html>