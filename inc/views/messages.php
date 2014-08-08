<?php

foreach($messages as $value){
    echo "<div class='row'><div class='span12'><p class='pMessage'>
    <span class='nameEmail'> $value[name] $value[email] </span></br>
    <span class='messages'> $value[message] </span></br>
    <span class='date'> $value[date] </span></p></div></div>";
}

