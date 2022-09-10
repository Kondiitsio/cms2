<?php

    if(isset($_GET['p_id'])){
    
    $the_post_id =  escape($_GET['p_id']);

    }


    $query = "SELECT * FROM posts WHERE post_id = $the_post_id  ";
    $select_posts_by_id = mysqli_query($connection,$query);  

    while($row = mysqli_fetch_assoc($select_posts_by_id)) {
        $post_id            = $row['post_id'];
        $post_user          = $row['post_user'];
        $post_title         = $row['post_title'];
        $post_content       = $row['post_content'];
        $post_tags          = $row['post_tags'];
        $post_date          = $row['post_date'];
        
         }


    if(isset($_POST['update_post'])) {
        
        
        $post_user           =  escape($_POST['post_user']);
        $post_title          =  escape($_POST['post_title']);
        $post_content        =  escape($_POST['post_content']);
        $post_tags           =  escape($_POST['post_tags']);

        
        $post_title = escape($post_title);

        
          $query = "UPDATE posts SET ";
          $query .="post_title          = '{$post_title}', ";
  
          $query .="post_user           = '{$post_user}', ";
          $query .="post_tags           = '{$post_tags}', ";
          $query .="post_content        = '{$post_content}' ";
          $query .="WHERE post_id       =  {$the_post_id} ";
        
        $update_post = mysqli_query($connection,$query);
        
        confirmQuery($update_post);

        redirect("/cms2/admin");

}

?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="post_title">Post title</label>
        <input type="text" name="post_title" value="<?php echo $post_title ?>"><br>
    <label for="summernote">Post Content</label>
        <textarea name="post_content" id="summernote"><?php echo $post_content ?></textarea><br>
    <label for="post_tags">Tags</label>
        <input type="text" name="post_tags" value="<?php echo $post_tags ?>"><br>
    <label for="post_user">User</label>
        <input type="text" name="post_user" value="<?php echo $post_user ?>"><br>
    <button type="submit" name="update_post" value="Publish Post">Submit</button>
</form>