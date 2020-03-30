<?php
    $conn = mysqli_connect(
        'localhost',
        'root',
        '',
        'ex4'
        );

    if(isset($conn)){
        echo 'DB is connected';
    }

    $key = 'qkwjdiw239&&jdafweihbrhnan&^%$ggdnawhd4njshjwuuO';
    $method = 'aes128';
?>