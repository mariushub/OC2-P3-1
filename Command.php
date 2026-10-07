<?php

/**
 * Runs each command and prints the result in the terminal.
 */
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
            echo $contact . "\n";
        }
    }

    public function detail(int $id): void
    {
        $contact = $this->manager->findById($id);

        if ($contact === null) {
            echo "Aucun contact avec l'id $id\n";
            return;
        }

        echo $contact->toString() . "\n";
    }

    public function create(string $name, string $email, string $phone): void
    {
        $contact = new Contact();
        $contact->setName($name);
        $contact->setEmail($email);
        $contact->setPhone($phone);

        $this->manager->create($contact);

        echo "Contact created : " . $contact->toString() . "\n";
    }

    public function delete(int $id): void
    {
        if ($this->manager->delete($id)) {
            echo "Contact $id supprimé\n";
            return;
        }
        
        echo "Aucun contact avec l'id $id\n";
    }
}
