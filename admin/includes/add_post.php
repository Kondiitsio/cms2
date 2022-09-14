<!-- CREATE POST -->
<?php

if(isset($_POST['create_post'])) {
    $post_title        = escape($_POST['post_title']);
    $post_content      = escape($_POST['post_content']);
    $post_tags         = escape($_POST['post_tags']);
    $post_date         = escape(date('d-m-y'));
    $post_user         = escape($_POST['post_user']);

    $query = "INSERT INTO posts(post_title, post_content, post_tags, post_date, post_user) ";
    $query .= "VALUES('{$post_title}', '{$post_content}', '{$post_tags}', now(), '{$post_user}')";

    $create_post_query = mysqli_query($connection, $query);
    confirmQuery($create_post_query);

    $the_post_id = mysqli_insert_id($connection);
    redirect("/cms2/admin");
}
?>

    <form action="" method="post" enctype="multipart/form-data">
        <label for="post_title">Post title</label>
            <input type="text" name="post_title"><br><br>
            <textarea name="post_content" id="summernote"></textarea><br>
        <label for="post_tags">Tags</label>
            <input type="text" name="post_tags"> | 
        <label for="post_user">User:</label>
        <input name="post_user" value="<?php echo (getLoggedInUsername());?>"><br><br>
        <button type="submit" name="create_post" value="Publish Post">Create post</button>
        <a href="/cms2/admin/">Cancel go back to posts</a>
    </form>
<!-- END CREATE POST -->

