<?php

function get($idx) {
    $path = sprintf("%s/post_%03d.txt", __dir__, $idx);
    
    return  file_get_contents($path);
}
