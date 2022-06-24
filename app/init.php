<?php
session_start();
require 'config/config.php';
require 'core/Database.php';
require 'core/App.php';
require 'core/Comics.php';
require 'core/Message.php';
require 'functions.php';

$app = new App();
$comics = new Comics();
