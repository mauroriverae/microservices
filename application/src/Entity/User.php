<?php

declare(strict_types=1);

namespace App\Entity;

use Symfony\Component\Uid\Uuid;

class User
{
    private string $id;
    private string $name;
    private string $email;
    private ?string $password;
    private \DateTime $createdOn;


    public function __construct(string $name, string $email)
    {
        $this->id = Uuid::v4()->toRfc4122();
        $this->name = $name;
        $this->email = $email;
        $this->password = null;
        $this->createdOn = new \DateTime();
    }

    /**
     * Get the value of id
     */ 
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * Get the value of createdOn
     */ 
    public function getCreatedOn(): \DateTime
    {
        return $this->createdOn;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'createdOn' => $this->createdOn->format(\DateTime::RFC3339),
        ];
    }
}
