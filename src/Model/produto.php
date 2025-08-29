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
    private int $id_Produto;
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
        return $this->id_Produto;
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
    public function setIdProduto(int $id_Produto): void
    {
        $this->id_Produto = $id_Produto;
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


    public function getAllProdutos(): array
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(Produto::class);
        return $repository->findAll();
    }
    public function updateProduto($id, $nome, $descricao, $preco, $estoque)
    {
        $em = Database::getEntityManager();

        $produto = $em->find(Produto::class, $id);

        if (!$produto) {
            throw new \Exception("Produto não encontrado!");
        }

        
        $produto->setNome($nome);
        $produto->setDescricao($descricao);
        $produto->setPreco($preco);
        $produto->setEstoque($estoque);

        
        $em->persist($produto);
        $em->flush();

        return $produto;
    }
    public function deleteProduto($id)
    {
        $em = Database::getEntityManager();

        
        $produto = $em->find(Produto::class, $id);

        if (!$produto) {
            throw new \Exception("Produto não encontrado!");
        }

       
        $em->remove($produto);
        $em->flush();

        return true; 
    }
    public function getProdutoById($id): ?Produto
    {
        $em = Database::getEntityManager();

        
        $produto = $em->find(Produto::class, $id);

        
        return $produto;
    }
    // public function addProduto($nome, $descricao, $preco, $estoque): Produto
    // {
    //     $em = Database::getEntityManager();

    //    // $produto = new Produto();
    //     $produto->setNome($nome);
    //     $produto->setDescricao($descricao);
    //     $produto->setPreco($preco);
    //     $produto->setEstoque($estoque);

    
    //     $em->persist($produto);
    //     $em->flush();

    //     return $produto; // retorna o produto recém-criado
    // }
}
