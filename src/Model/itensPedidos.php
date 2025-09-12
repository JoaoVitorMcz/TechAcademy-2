<?php

namespace App\Model;

use App\Core\Database;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class ItensPedidos
{
    #[Column, Id, GeneratedValue]
    private int $id;
    #[ManyToOne(targetEntity: pedidos::class, inversedBy: "itens")]
    #[JoinColumn(name: "idPedido", referencedColumnName: "id", nullable: false)]
    private pedidos $idPedido;
    #[ManyToOne(targetEntity: Produto::class)]
    #[JoinColumn(name:'idProduto', referencedColumnName:"id", nullable: false )]
    private Produto $idProduto;
    #[Column]
    private int $quantidade;
    #[Column]
    private float $precounitario;

    public function __construct(pedidos $idPedido, Produto $idProduto, int $quantidade, float $precounitario)
    {
        $this->idPedido = $idPedido;
        $this->idProduto = $idProduto;
        $this->quantidade = $quantidade;
        $this->precounitario = $precounitario;
    }
    public function getIdItem(): int
    {
        return $this->id;
    }

    public function getIdPedido(): pedidos
    {
        return $this->idPedido;
    }

    public function getIdProduto(): Produto
    {
        return $this->idProduto;
    }

    public function getQuantidade(): int
    {
        return $this->quantidade;
    }

    public function getPrecounitario(): float
    {
        return $this->precounitario;
    }

    public function setIdItem(int $id): void
    {
        $this->id = $id;
    }

    public function setIdPedido(pedidos $idPedido): void
    {
        $this->idPedido = $idPedido;
    }

    public function setIdProduto(Produto $idProduto): void
    {
        $this->idProduto = $idProduto;
    }

    public function setQuantidade(int $quantidade): void
    {
        $this->quantidade = $quantidade;
    }

    public function setPrecounitario(float $precounitario): void
    {
        $this->precounitario = $precounitario;
    }


    public function save(): void
    {
        $em = Database::getEntityManager();
        $em->persist($this);
        $em->flush();
    }

    public static function getAllItensPedidos(): array
    {
        $em = Database::getEntityManager();
        $repository = $em->getRepository(ItensPedidos::class);
        return $repository->findAll();
    }
}