<?php

require_once 'AspectKernelLoader.php';

$broker = new Broker('John', 45);

$broker->buy('GOOGL', 100, 5);
$broker->sell('YAHOO', 50, 10);
