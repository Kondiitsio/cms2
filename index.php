<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "includes/top_pager.php"; ?>

<?php

$pageName .= "?";

$query = "SELECT * FROM posts";

$select_all_posts = mysqli_query($connection, $query);
$counter = mysqli_num_rows($select_all_posts);
$counter = ceil($counter/$per_page);

$query = "SELECT * FROM posts ORDER BY post_time DESC LIMIT $page_1,$per_page";

$select_all_posts_query = mysqli_query($connection, $query);
    while($row = mysqli_fetch_assoc($select_all_posts_query)) {
        $post_id = $row['post_id'];
        $post_tags = $row['post_tags'];
        $post_title = $row['post_title'];
        $post_content = $row['post_content'];
        $post_user = $row['post_user'];

        $post_date = $row['post_date'];
        $post_date = strtotime($post_date);
        $post_date = date('d.m.y', $post_date);

?>

<h1><?php echo $post_title ?></h1><br>
<p><?php echo $post_content ?></p><br>
<p><?php echo $post_tags ?> | <?php echo $post_date ?> | <?php echo $post_user ?></p><br><br>

<?php } if($counter == 0) echo "<h1>Sorry, no post available in this page.</h1>";  ?>

<?php include "includes/pager.php"; ?>
<?php include "includes/footer.php"; ?>
