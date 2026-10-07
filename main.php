<?php

require_once __DIR__ . '/DBConnect.php';
require_once __DIR__ . '/Contact.php';
require_once __DIR__ . '/ContactManager.php';
require_once __DIR__ . '/Command.php';

$command = new Command();

while (true) {
    $line = readline("Enter command :");

    // prevent infinite loop
    if ($line === false) {
        break;
    }

    $line = trim($line);

    if ($line === "quit") {
        break;
    } elseif ($line === "list") {
        $command->list();
    } elseif (preg_match('/^detail (\d+)$/', $line, $matches)) {
        $command->detail((int) $matches[1]);
    } elseif (preg_match('/^create ([^,]+), ([^,]+), ([^,]+)$/', $line, $matches)) {
        $command->create($matches[1], $matches[2], $matches[3]);
    } elseif (preg_match('/^delete (\d+)$/', $line, $matches)) {
        $command->delete((int) $matches[1]);
    } else {
        echo "Unknown command\n";
    }
}
