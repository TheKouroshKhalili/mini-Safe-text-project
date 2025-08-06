<?php
$allowed_includes = ['db.php' , 'secure.php'];
foreach ($allowed_includes as $inc) {
    require_once $inc;
}

$pdo = Database::create();
$cutoff = date('Y-m-d H:i:s', strtotime('-24 hours'));
$stmt = $pdo->prepare("DELETE FROM notes WHERE created_at < :cutoff");
$stmt->execute(['cutoff' => $cutoff]);