<?php

namespace App\Model;

use App\Core\Database;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Funcionario
{
    #[Column, Id, GeneratedValue]
    private int $id;
    #[Column]
    private string $nome;
    #[Column]
    private string $cargo;
    #[Column]
    private string $email;
    #[Column]
    private float $salario;

    public function __construct(string $nome, string $cargo, string $email, float $salario)
    {
        $this->nome = $nome;
        $this->cargo = $cargo;
        $this->email = $email;
        $this->salario = $salario;
    }
    public function getIdFuncionario(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getCargo(): string
    {
        return $this->cargo;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSalario(): float
    {
        return $this->salario;
    }

    public function setIdFuncionario(int $id): void
    {
        $this->id = $id;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setCargo(string $cargo): void
    {
        $this->cargo = $cargo;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setSalario(float $salario): void
    {
        $this->salario = $salario;
    }
    public function save(): void
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }
    public static function getAllFuncionarios(): array
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(Funcionario::class);
        return $repository->findAll();
    }
}
