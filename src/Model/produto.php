<?php

namespace App\Model;

use App\Core\Database;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Produto
{
    #[Column, Id, GeneratedValue]
    private int $id;
    #[Column]
    private string $nome;
    #[Column]
    private string $descricao;
    #[Column]
    private float $preco;
    #[Column]
    private int $estoque;

    public function __construct(string $nome, string $descricao, float $preco, int $estoque)
    {
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }
    public function getIdProduto(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function getPreco(): float
    {
        return $this->preco;
    }

    public function getEstoque(): int
    {
        return $this->estoque;
    }
    public function setIdProduto(int $id): void
    {
        $this->id = $id;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function setPreco(float $preco): void
    {
        $this->preco = $preco;
    }

    public function setEstoque(int $estoque): void
    {
        $this->estoque = $estoque;
    }
    public function save(): void
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }

    public static function getAllProdutos(): array
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(Produto::class);
        return $repository->findAll();
    }
}