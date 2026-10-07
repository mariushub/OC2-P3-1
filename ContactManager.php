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

    public function findById(int $id): ?Contact
    {
        $request = $this->pdo->prepare('SELECT * FROM contact WHERE id = :id');
        $request->execute(['id' => $id]);
        $row = $request->fetch(PDO::FETCH_ASSOC);

        if ($row === false) {
            return null;
        }

        return $this->createContactFromRow($row);
    }

    public function create(Contact $contact): Contact
    {
        $request = $this->pdo->prepare(
            'INSERT INTO contact (name, email, phone) VALUES (:name, :email, :phone)'
        );
        $request->execute([
            'name' => $contact->getName(),
            'email' => $contact->getEmail(),
            'phone' => $contact->getPhone(),
        ]);

        $contact->setId((int) $this->pdo->lastInsertId());

        return $contact;
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

    public function delete(int $id): bool
    {
        $request = $this->pdo->prepare('DELETE FROM contact WHERE id = :id');
        $request->execute(['id' => $id]);

        return $request->rowCount() > 0;
    }
}
