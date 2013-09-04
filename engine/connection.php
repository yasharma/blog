<?php

require 'engine/functions.php';

// Connect to daatbase
$conn = connect($config);
if ( !$conn ) die ('problem connecting to db.');