<?php include "includes/admin_header.php" ?>

<?php $per_page = 20; ?>
<div class="row">
    <div class="column side">
    </div>
    <div class="column middle">
<?php
if (isset($_GET['source'])) {
    $source = $_GET['source'];

} else {
$source = '';

}

switch($source) {
    case 'add_post';
    include "includes/add_post.php";
    break;

    case 'edit_post';
    include "includes/edit_post.php";
    break;

    default:
    include "../includes/top_pager.php";
    include "includes/view_all_posts.php";
    include "../includes/pager.php";
    break;

}
?>

</div>
    <div class="column side">
    </div>
<?php include "includes/admin_footer.php" ?>