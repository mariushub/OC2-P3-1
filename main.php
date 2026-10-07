<?php

require_once __DIR__ . '/DBConnect.php';
require_once __DIR__ . '/Contact.php';
require_once __DIR__ . '/ContactManager.php';
require_once __DIR__ . '/Command.php';

$command = new Command();

// Reads a command, runs it, and starts again until the user types "quit"
while (true) {
    $line = readline("Enter command :");

    // Ctrl+D / Ctrl+Z: readline returns false, so we stop instead of looping forever
    if ($line === false) {
        break;
    }

    $line = trim($line);

    if ($line === "quit") {
        break;
    } elseif ($line === "list") {
        $command->list();
    } elseif (preg_match('/^detail (\d+)$/', $line, $matches)) {
        // e.g. detail 3
        $command->detail((int) $matches[1]);
    } elseif (preg_match('/^create ([^,]+), ([^,]+), ([^,]+)$/', $line, $matches)) {
        // e.g. create Frodo Baggins, frodo@shire.com, 0612345678
        $command->create($matches[1], $matches[2], $matches[3]);
    } elseif (preg_match('/^delete (\d+)$/', $line, $matches)) {
        // e.g. delete 3
        $command->delete((int) $matches[1]);
    } else {
        echo "Unknown command\n";
    }
}
