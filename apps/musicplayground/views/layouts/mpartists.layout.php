<?php
Layout::extend('layouts/master');
Layout::input($title, 'string');
Layout::input($body, 'Block');

$title .= 'mpartists - ';

$navigation = Part::block('parts/navigation');
?>