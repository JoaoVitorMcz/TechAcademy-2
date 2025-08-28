<?php

namespace App\Model;

use App\Core\Database;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Cliente
{
    #[Column, Id, GeneratedValue]
    private int $id;
    #[Column]
    private string $name;
    #[Column(unique: true)]
    private string $email;
    #[Column]
    private string $telefone;
    #[Column]
    private string $senha;

    public function __construct(string $name, string $email, string $telefone, string $senha)
    {
        $this->name = $name;
        $this->email = $email;
        $this->telefone = $telefone;
        $this->senha = $senha;
    }
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getTelefone(): string
    {
        return $this->telefone;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setTelefone(string $telefone): void
    {
        $this->telefone = $telefone;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }
    public function save(): void
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }
}
