<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>EvaluTest | Login</title>
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
                                    
                                    session_start(); // When form submitted, check and create user session.
                                    
                                    if (isset($_POST['username'])) {
                                        $username = stripslashes($_REQUEST['username']);// removes backslashes
                                        $username = mysqli_real_escape_string($con, $username);
                                        $password = stripslashes($_REQUEST['password']);
                                        $password = mysqli_real_escape_string($con, $password);
                                        
                                        $query = "SELECT * FROM `users` WHERE username='$username' AND password='" . md5($password) . "'"; // Check user is exist in the database
                                        $result = mysqli_query($con, $query);
                                        if (mysqli_num_rows($result) > 0) {
                                            $row = mysqli_fetch_array($result);
                                            
                                            if ($row['role'] == 'admin') {
                                                $_SESSION['admin_name'] = $row['username'];
                                                $_SESSION['name'] = $row['name'];
                                                header("Location: users/admin/index.php");// Redirect to user dashboard page
                                            } else {
                                                $_SESSION['student_name'] = $row['username'];
                                                $_SESSION['name'] = $row['name'];
                                                header("Location: users/student/index.php");// Redirect to user dashboard page
                                            }
                                            
                                        } else {
                                            echo "<div class='form'>
                                                <h3>Incorrect Username/password.</h3><br/>
                                                <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                                                </div>";
                                        }
                                    } else {
                                ?>
                                <form class="form" method="post" name="login">
                                    <div class="d-flex justify-content-center align-items-center">
                                        <img src="assets/images/logo.png" alt="EvaluTest Logo" class="logo-img mr-3">
                                        <h1 class="title-logo mb-0">EvaluTest</h1>
                                    </div>
                                    <hr class="my-4">

                                    <h3 class="heading mb-5">Login Form</h3>

                                    <div class="form-outline mb-4">
                                        <input type="text" name="username" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Username" required />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" id="typePasswordX-2" class="form-control form-control-lg" placeholder="Password" required />
                                    </div>

                                    <button class="btn btn-lg btn-block" type="submit" name="submit" style="background-color: #F89F5B; border-radius: 100px;">Login</button>

                                </form>
                                <?php
                                    }
                                ?>
                                <p class="go-to">Don't have an account? <a href="register.php">Register</a> here!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    </body>
</html>