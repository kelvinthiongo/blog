<?php include("path.php"); ?>
<?php include(ROOT_PATH."/app/controllers/posts.php"); 

if(isset($_GET['id'])){
    $post = selectOne('posts', ['id' => $_GET['id']]);
}

$posts = selectAll('posts', ['published' => 1]);

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
    <link rel="stylesheet" href="assets/css/style.css">


    <title><?php echo $post['title']; ?> | GreatInspirations</title>
</head>
<body>
    <?php include("app/includes/header.php"); ?>
    
    <!--page wrapper-->
    <div class="page-wrapper">
        
        <!--content-->
        <div class="content clearfix">
            <!--main content-->
            <div class="main-content-wrapper">
                <div class="main-content single">
                    <h1 class="post-title"><?php echo $post['title']; ?></h1>

                    <div class="post-content">
                        <?php echo html_entity_decode($post['body']); ?>
                        
                    </div>
                </div>
            </div>
            <!--//main content-->

            <!--sidebar-->
            <div class="sidebar single">
                <div class="section popular">
                    <h2 class="section-title">Popular</h2>

                    <?php foreach($posts as $pst): ?>
                        <div class="post clearfix">
                            <img src="<?php echo BASE_URL.'/assets/images/'.$pst['image']; ?>" alt="">
                            <a href="" class="title"><h4><?php echo $pst['title']; ?></h4></a>
                        </div>
                    <?php endforeach; ?>
                    
                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <?php foreach($topics as $topic): ?>
                            <li><a href="<?php echo BASE_URL.'/index.php?t_id='.$topic['id'].'&name='.$topic['name'];?>"><?php echo $topic['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
            <!--//sidebar-->
        </div>
        <!--//content-->
    </div>
    <!--page wrapper-->

    <?php include("app/includes/footer.php"); ?>

    <!--JQuery-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!--Custom Script-->
    <script src="assets/js/scripts.js"></script>

    <!--Slick Carousel-->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</body>
</html>