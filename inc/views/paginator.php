<?php


$numPage = $sizeStorage/VIEW_DEFAULT_NUM_MESSAGES;

$numPage = ((int)$numPage==$numPage)?$numPage:(int)$numPage+1;

echo "<div class='row'><div class='span12'><ul class='pagination'>";
for($i = 1; $i <= $numPage; $i++){
    if($i == $page){
        echo "<li class='active'><span class='sr-only'>$i</span></li>";
    } else {
        echo "<li class='active'><a href='index.php?url=main/index/$i'>$i</a></li>";
    }
}
echo "</ul></div></div>";
