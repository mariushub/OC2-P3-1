<?php

class ContactManager
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = (new DBConnect())->getPDO();
    }

    public function findAll(): array
    {
        $request = $this->pdo->query('SELECT * FROM contact');
        $rows = $request->fetchAll(PDO::FETCH_ASSOC);
        $contacts = [];

        foreach ($rows as $row) {
            $contacts[] = $this->createContactFromRow($row);
        }

        return $contacts;
    }

    private function createContactFromRow(array $row): Contact
    {
        $contact = new Contact();
        $contact->setId($row['id']);
        $contact->setName($row['name']);
        $contact->setEmail($row['email']);
        $contact->setPhone($row['phone']);

        return $contact;
    }
}
