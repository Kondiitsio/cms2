<?php include "includes/admin_header.php" ?>

<h1>Users</h1>
<a href="/cms2/admin/">Back to posts</a>

<?php
if (isset($_GET['source'])) {
    $source = $_GET['source'];

} else {
$source = '';

}

switch($source) {
    case 'add_user';
    include "includes/add_user.php";
    break;

    case 'edit_user';
    include "includes/edit_user.php";
    break;

    default:
    include "includes/view_all_users.php";
    break;
}
?>


<?php include "includes/admin_footer.php" ?>