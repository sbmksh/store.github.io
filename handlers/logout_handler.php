<?php

session_start();
echo "logging you out please wait";

session_destroy();
$alert="You have been logged out";
header("location: /store/index.php?alert=$alert");


?>