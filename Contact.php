<?php

/**
 * A contact kept in memory. This class never talks to the database.
 */
class Contact
{
    // Stays null until the contact is saved in the database
    private ?int $id = null;
    private ?string $name = null;
    private ?string $email = null;
    private ?string $phone = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    // Format used by the list and detail commands
    public function __toString(): string
    {
        return "$this->id, $this->name, $this->email, $this->phone";
    }
}
