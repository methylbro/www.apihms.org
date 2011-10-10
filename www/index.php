<?php

/* prepare system environment */
session_save_path('../tmp/sessions/');

require '../library/prepend.php';

/* booting system and derivate modules */
$Core->bootstrap();
$Core->start();

#require '../library/append.php';

?>