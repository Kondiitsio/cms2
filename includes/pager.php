<ul>

<?php

for($i =1; $i <= $counter; $i++) {
    if($i == $page) {
        echo "<li><a href='/cms2/{$pageName}page={$i}'>{$i}</a></li>";
    } else {
        echo "<li><a href='/cms2/{$pageName}page={$i}'>{$i}</a></li>";
    }
    }

?>

</ul>