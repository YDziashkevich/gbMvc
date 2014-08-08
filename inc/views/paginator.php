<?php

$size=count($messages);
$page=VIEW_DEFAULT_NUM_MESSAGES;
$numPage=$size/$page;
$numPage=((int)$numPage==$numPage)?$numPage:(int)$numPage+1;

$curPageNum = isset($_GET['page']) ? (int)$_GET['page']: 1;

echo "<div class='row'><div class='span12'><ul class='pagination'>";
for($i = 1; $i <= $numPage; $i++){
    if($i == $curPageNum){
        echo "<li class='active'><span class='sr-only'>$i</span></li>";
    } else {
        echo "<li class='active'><a href='#'>$i</a></li>";
    }
}
echo "</ul></div></div>";
