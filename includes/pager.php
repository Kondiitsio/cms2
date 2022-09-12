<div class="pagination">

<?php

for($i =1; $i <= $counter; $i++) {
    if($i == $page) {
        echo "<a class='active' href='/cms2/{$pageName}page={$i}'>{$i}</a>";
    } else {
        echo "<a href='/cms2/{$pageName}page={$i}'>{$i}</a>";
    }
    }

?>

</div>