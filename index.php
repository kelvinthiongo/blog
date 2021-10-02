<?php 
include("path.php");
include(ROOT_PATH."/app/controllers/topics.php");

$posts = array();
$postsTitle = 'Recent Posts';

if(isset($_GET['t_id'])){
    $posts = getPostsByTopicId($_GET['t_id']);
    $postsTitle = "You searched for posts under '".$_GET['name']."'";
} else if (isset($_POST['search-term'])){
    $postsTitle = "You searched for '".$_POST['search-term']."'";
    $posts = searchPosts($_POST['search-term']);
} else {
    $posts = getPublishedPosts();
}


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


    <title>Blog</title>
</head>
<body>
    
    <?php include(ROOT_PATH."/app/includes/header.php"); ?>
    
    <?php include(ROOT_PATH."/app/includes/messages.php"); ?>

    <!--page wrapper-->
    <div class="page-wrapper">
        <!--post slider-->
        <div class="post-slider">
            <h1 class="slider-title">Trending Posts</h1>

            <i class="fas fa-chevron-left prev"></i>
            <i class="fas fa-chevron-right next"></i>
                        
            <div class="post-wrapper">
                <?php foreach($posts as $post): ?>
                    <div class="post">
                        <img src="<?php echo BASE_URL.'/assets/images/'.$post['image']; ?>" alt="" class="slider-image">
                        <div class="post-info">
                            <h4><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
                            <i class="far fa-user"> <?php echo $post['username']; ?></i>
                            &nbsp;
                            <i class="far fa-calendar"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                        </div>
                    </div>
                <?php endforeach; ?>
                
            </div>
        </div>
        <!--//post slider-->
        <!--content-->
        <div class="content clearfix">
            <!--main content-->
            <div class="main-content">
                <h1 class="recent-post-title"><?php echo $postsTitle; ?></h1>

                <?php foreach($posts as $post): ?>
                    <div class="post clearfix">
                        <img src="<?php echo BASE_URL.'/assets/images/'.$post['image']; ?>" alt="" class="post-image">
                        <div class="post-preview">
                            <h2><a href="single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h2>
                            <i class="far fa-user"> <?php echo $post['username']; ?></i>
                            &nbsp;
                            <i class="far calendar"> <?php echo date('F j, Y', strtotime($post['created_at'])); ?></i>
                            <p class="preview-text">
                                <?php echo html_entity_decode(substr($post['body'], 0, 150).'...'); ?>
                            </p>
                            <a href="single.php?id=<?php echo $post['id']; ?>" class="btn read-more">Read More</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
            <!--//main content-->
            <div class="sidebar">

                <div class="section search">
                    <h2 class="section-title">Search</h2>
                    <form action="index.php" method="post">
                        <input type="text" name="search-term" placeholder="Search..." class="text-input">
                    </form>
                </div>

                <div class="section topics">
                    <h2 class="section-title">Topics</h2>
                    <ul>
                        <?php foreach($topics as $key=>$topic): ?>
                            <li><a href="<?php echo BASE_URL.'/index.php?t_id='.$topic['id'].'&name='.$topic['name'];?>"><?php echo $topic['name']; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </div>
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