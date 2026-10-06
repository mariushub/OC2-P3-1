<?php

require_once __DIR__ . '/DBConnect.php';
require_once __DIR__ . '/Contact.php';
require_once __DIR__ . '/ContactManager.php';
require_once __DIR__ . '/Command.php';

$command = new Command();

while (true) {
    $line = trim(readline("Enter command :"));

    if ($line === "list") {
        $command->list();
    } else {
        echo "Unknown command\n";
    }
}
