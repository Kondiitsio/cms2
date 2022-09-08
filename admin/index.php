<?php include "includes/admin_header.php" ?>
<!--- POST LIST  -->
<table id="post_list">
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Tags</th>
            <th>User</th>
            <th>Date</th>
        </tr>

<?php

$query = "SELECT * FROM posts ORDER BY post_time DESC";

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
        echo "</tr>";

    }
?>

    </thead>
</table>
<!--- END POST LIST  -->
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

    echo "<p>Post Created. <a href='/cms2/'>Home page</a> or <a href='/cms2/admin/'>Post list</a></p>";
}

?>

<form action="" method="post" enctype="multipart/form-data">
    <label for="post_title">Post title</label>
        <input type="text" name="post_title"><br>
    <label for="summernote">Post Content</label>
        <textarea name="post_content" id="summernote"></textarea><br>
    <label for="post_tags">Tags</label>
        <input type="text" name="post_tags"><br>
    <label for="post_user">User</label>
        <input type="text" name="post_user"><br>
    <button type="submit" name="create_post" value="Publish Post">Submit</button>
</form>
<!-- END CREATE POST -->

<?php include "includes/admin_footer.php" ?>