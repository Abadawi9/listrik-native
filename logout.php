<?php

session_start();
session_destroy();

echo "<script>
    alert('Terima Kasih');
    location.href='index.php';
    </script>";