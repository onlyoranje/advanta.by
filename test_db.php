<?php
try {
    new PDO('mysql:host=127.0.0.1;port=3306;dbname=mysql', 'root', '');
    echo 'OK: root no pass';
} catch(PDOException $e) {
    echo 'FAIL: ' . $e->getMessage();
}