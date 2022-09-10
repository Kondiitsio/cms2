<a href="../index.php">Home page</a>
<a href="?source=add_post">Add new Post</a>

<?php $pageName = basename('/cms2/admin'); ?>

<!--- POST LIST  -->
<table id="post_list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Tags</th>
            <th>User</th>
            <th>Date</th>
            <th>Edit</th>
            <th>DELETE</th>
        </tr>

<?php
if(isset($_POST['delete'])){
    $the_post_id = escape($_POST['post_id']);
    $query = "DELETE FROM posts WHERE post_id = {$the_post_id} ";
    $delete_query = mysqli_query($connection, $query);
    redirect("/cms2/admin");
    }

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

        echo "<tr>";
        echo "<td>$post_id</td>";
        echo "<td>$post_title</td>";
        echo "<td>$post_tags</td>";
        echo "<td>$post_user</td>";
        echo "<td>$post_date</td>";
        echo "<td><a href='?source=edit_post&p_id={$post_id}'>Edit</a></td>";
?>

<form method="post">
   <input type="hidden" name="post_id" value="<?php echo $post_id ?>">
   <?php echo '<td><input type="submit" name="delete" value="Delete"></td>' ?>
</form>

<?php echo"</tr>"; } ?>

    </thead>
</table>
<!--- END POST LIST  -->