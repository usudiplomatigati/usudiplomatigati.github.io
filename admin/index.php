<?php
  session_start();
  include '../db/connection.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin</title>

    <!-- MY CSS -->
    <link rel="stylesheet" href="../assets/styles.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
</head>

<body>

    <?php 
    	if (isset($_GET['message'])) {
    		if ($_GET['message'] == 1){
    			echo "
    			<div class='alert alert-danger text-center' role='alert' >
    					Username atau Password Anda salah !
    			</div>
    		";
    		}
    	}
    ?>

    <div class="container col-lg-6 col-sm-12 col-md-12" style="margin-top: 150px; margin-bottom: 150px;">
        <div class="shadow card m-3">
            <div class="row g-0 justify-content-center align-item-center align-middle ">
                <div class="col-md-4 bg-success p-3">
                    <img src="../assets/image/undraw_access_account_re_8spm.svg" class="img-fluid h-100" alt="..." />
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h1 class="card-title text-center py-4 fw-bold">Admin Login</h1>
                        <form action="./auth/login-admin.php" class="mx-4 my-4" method="POST"
                            enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control"
                                    id="exampleInputPassword1" />
                            </div>

                            <button type="submit" name="login" class="btn btn-success py-2 px-4 fs-6 container">LOGIN <i
                                    class="bi bi-box-arrow-in-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>

</body>

</html>