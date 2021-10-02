<?php include("../../path.php"); ?>
<?php include(ROOT_PATH."/app/controllers/posts.php"); 
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


    <title>Admin Section - Edit Post</title>
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
                <a href="create.php" class="btn">Add Post</a>
                <a href="index.php" class="btn">Manage Posts</a>
            </div>
            <div class="content">
                <h2 class="page-title">Edit Post</h2>

                <?php include(ROOT_PATH."/app/helpers/formErrors.php"); ?>

                <form action="edit.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $id ?>" >
                    <div>
                        <label>Title</label>
                        <input type="text" name="title" class="text-input" value="<?php echo $title; ?>">
                    </div>
                    <div>
                        <label>Body</label>
                        <textarea name="body" id="body"><?php echo $body; ?></textarea>
                    </div>
                    <div>
                        <label>Image</label>
                        <input type="file" name="image" class="text-input">
                    </div>
                    <div>
                        <label>Topic</label>
                        <select name="topic_id" class="text-input">
                            <option value=""></option>
                            <?php foreach ($topics as $key => $topic): ?>
                                <?php if(!empty($topic_id) && $topic_id == $topic['id']): ?>
                                    <option selected value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                                <?php else: ?>
                                    <option value="<?php echo $topic['id']; ?>"><?php echo $topic['name']; ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>    
                        </select>
                    </div>
                    <div>
                        <?php if(empty($published) && $published == 0): ?>
                            <label>
                                <input type="checkbox" name="published">
                                Publish
                            </label>
                        <?php else: ?>
                            <label>
                                <input type="checkbox" name="published" checked>
                                Publish
                            </label>
                        <?php endif; ?>
                    </div>
                    <div>
                        <button type="submit" name="update-post" class="btn btn-big">Update Post</button>
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