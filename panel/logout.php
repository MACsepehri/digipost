<?php

    session_start();
    session_unset();
    session_destroy();

    echo "<script>alert('با موفقیت خارج شدید!');</script>";
    echo "<script>window.location.href='/panel/auth.php'</script>";

?>