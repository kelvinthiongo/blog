<?php include("../../path.php"); ?>
<?php include(ROOT_PATH."/app/controllers/users.php"); 
adminOnly();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--font awesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Candal&family=Lora&display=swap" rel="stylesheet">

    <!--custom css-->
    <link rel="stylesheet" href="../../assets/css/style.css">

    <!--admin css-->
    <link rel="stylesheet" href="../../assets/css/admin.css">


    <title>Admin Section - Edit User</title>
</head>
<body>

    <?php include(ROOT_PATH."/app/includes/adminHeader.php"); ?>
    
    <!--admin page wrapper-->
    <div class="admin-wrapper">
        <!--left sidebar-->
        <?php include(ROOT_PATH."/app/includes/adminSidebar.php"); ?>
        <!--//left sidebar-->
        <!--admin content-->
        <div class="admin-content">
            <div class="button-group">
                <a href="create.php" class="btn">Add User</a>
                <a href="index.php" class="btn">Manage Users</a>
            </div>

            <div class="content">
                <h2 class="page-title">Edit User</h2>

                <?php include(ROOT_PATH."/app/helpers/formErrors.php"); ?>

                <form action="edit.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <div>
                        <label>Username</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="text-input">
                    </div>
                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" class="text-input">
                    </div>
                    <div>
                        <label>Password</label>
                        <input type="password" name="password" class="text-input">
                    </div>
                    <div>
                        <label>Password Confirmation</label>
                        <input type="password" name="passwordConf" class="text-input">
                    </div>
                    <div>
                        <?php if(isset($admin) && $admin == 1): ?>
                            <label>
                                <input type="checkbox" name="admin" checked>
                                Admin
                            </label>
                        <?php else: ?>
                            <label>
                                <input type="checkbox" name="admin">
                                Admin
                            </label>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-big" name="update-user">Update User</button>
                    </div>
                </form>
            </div>
        </div>
        <!--//admin content-->
        
    </div>
    <!--page wrapper-->

    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--CKeditor-->
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>

    <!--Custom Script-->
    <script src="../../assets/js/scripts.js"></script>

</body>
</html>