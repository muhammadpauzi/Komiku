<?php
require 'app/init.php';
if (isset($_POST['delete'])) {
    $id = $_GET['id'];
    $Comics->delete('komik', $id);
} else {
    redirect('');
}
