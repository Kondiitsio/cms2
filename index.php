<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<div class="header">
  <h1>Header</h1>
  <p>Resize the browser window to see the responsive effect.</p>
</div>

<?php $per_page = 5; ?>
<?php include "includes/top_pager.php"; ?>

<?php $pageName = basename($_SERVER['PHP_SELF']); ?>

<?php

$pageName .= "?";

$query = "SELECT * FROM posts";

$select_all_posts = mysqli_query($connection, $query);
$counter = mysqli_num_rows($select_all_posts);
$counter = ceil($counter/$per_page);

$query = "SELECT * FROM posts ORDER BY post_date DESC LIMIT $page_1,$per_page";

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

<div class="row">
    <div class="column side">
    </div>
    <div class="column middle">
        <h2><?php echo $post_title ?></h2>
        <p><?php echo $post_content ?></p>
        <p><?php echo $post_tags ?> | <?php echo $post_date ?> | <?php echo $post_user ?></p> 
    </div>
    <div class="column side">
    </div>
</div>

<?php } if($counter == 0) echo "<h1>Sorry, no post available in this page.</h1>";  ?>

<div class="row">
    <div class="column side">
    </div>
    <div class="column middle">
        <?php include "includes/pager.php"; ?>
    </div>
    <div class="column side">
    </div>
</div>


<?php include "includes/footer.php"; ?>
