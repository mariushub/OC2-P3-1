<?php

require_once __DIR__ . '/DBConnect.php';
require_once __DIR__ . '/Contact.php';
require_once __DIR__ . '/ContactManager.php';

while (true) {
    $line = trim(readline("Enter command :"));

    if ($line === "list") {
        $manager = new ContactManager();
        $contacts = $manager->findAll();

        echo "Liste des contacts :\n";
        echo "id, name, email, phone number\n";

        foreach ($contacts as $contact) {
            echo $contact->toString() . "\n";
        }
    } else {
        echo "Unknown command\n";
    }
}
