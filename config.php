<?php

define("PATH",dirname(__FILE__));

include (PATH.'/core/db.class.php');
$db = new db();//实例化

include (PATH.'/core/input.class.php');
$input = new input();