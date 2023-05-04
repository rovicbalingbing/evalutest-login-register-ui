<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EvaluTest | Register</title>
        
        <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
        <link rel="stylesheet" href="assets/css/login.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    </head>
    <body>
        <section class="bg vh-100">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <?php
                                    require('conn.php');

                                    // When form submitted, insert values into the database.
                                    if (isset($_REQUEST['username'])) {

                                        
                                        $username = stripslashes($_REQUEST['username']); // removes backslashes
                                        $username = mysqli_real_escape_string($con, $username); //escapes special characters in a string
                                        $name = stripslashes($_REQUEST['name']); // removes backslashes
                                        $name = mysqli_real_escape_string($con, $name); //escapes special characters in a string
                                        $email = stripslashes($_REQUEST['email']); // removes backslashes
                                        $email = mysqli_real_escape_string($con, $email); //escapes special characters in a string
                                        $password = stripslashes($_REQUEST['password']); // removes backslashes
                                        $password = mysqli_real_escape_string($con, $password); //escapes special characters in a string
                                        $role = 'student';
                                        $query = "INSERT into `users` (name, username, password, email, role) VALUES ('$name', '$username', '" . md5($password) . "', '$email', '$role')";
                                        $result = mysqli_query($con, $query);
                                        if ($result) {
                                            echo "<script>
                                                    alert('You are registered successfully.');
                                                    window.location.href = 'login.php';
                                                </script>";
                                        } else {
                                            echo "<div class='form'>
                                                    <h3>Required fields are missing.</h3><br/>
                                                <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
                                                </div>";
                                        }
                                    } else {
                                ?>
                                <form>  
                                    <h3 class="heading mb-5">Register Form</h3>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="name" id="typeNameX-2" class="form-control form-control-lg" placeholder="Name" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="username" id="typeUsernameX-2" class="form-control form-control-lg" placeholder="Username" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="email" name="email" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Email Address" required/>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Password" required/>
                                    </div>

                                    <button class="btn btn-lg btn-block" type="submit" style="background-color: #F89F5B; border-radius: 100px;">Submit</button>

                                </form>
                                <?php 
                                    }
                                ?>
                                <p class="go-to">Already have an account? <a href="login.php">Login</a> here!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>