<?php
require 'app/init.php';
if (isset($_POST['delete'])) {
    $id = $_GET['id'];
    $comics->delete('komik', $id);
} else {
    redirect('');
}
