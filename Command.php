<?php

class Command
{
    private ContactManager $manager;

    public function __construct()
    {
        $this->manager = new ContactManager();
    }

    public function list(): void
    {
        $contacts = $this->manager->findAll();

        echo "Liste des contacts :\n";
        echo "id, name, email, phone number\n";

        foreach ($contacts as $contact) {
            echo $contact->toString() . "\n";
        }
    }
}
