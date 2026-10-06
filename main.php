<?php

while (true) {
    $line = trim(readline("Enter command :"));

    if ($line === "list") {
        echo "show list\n";
    } else {
        echo "Unknown command\n";
    }
}
