<?php

namespace App\Model;

use App\Core\Database;
use DateTime;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class pedidos
{
    #[Column, Id, GeneratedValue]
    private int $id;
    #[ManyToOne(targetEntity: Cliente::class, inversedBy: "pedidos")]
    #[JoinColumn(name:"idCliente", referencedColumnName:"id", nullable:false)]
    private Cliente $idCliente;
    #[ManyToOne(targetEntity: Funcionario::class, inversedBy:"pedidos")]
    #[JoinColumn(name:"idFuncionario", referencedColumnName:"id", nullable:false)]
    private Funcionario $idFuncionario;
    #[Column]
    private DateTime $dataPedido;
    public function __construct(Cliente $idCliente, Funcionario $idFuncionario, DateTime $dataPedido)
    {
        $this->idCliente = $idCliente;
        $this->idFuncionario = $idFuncionario;
        $this->dataPedido = $dataPedido;
    }
    public function getIdPedido(): int
    {
        return $this->id;
    }

    public function getIdCliente(): Cliente
    {
        return $this->idCliente;
    }

    public function getIdFuncionario(): Funcionario
    {
        return $this->idFuncionario;
    }

    public function getDataPedido(): DateTime
    {
        return $this->dataPedido;
    }

    public function setIdPedido(int $id): void
    {
        $this->id = $id;
    }

    public function setIdCliente(Cliente $idCliente): void
    {
        $this->idCliente = $idCliente;
    }

    public function setIdFuncionario(Funcionario $idFuncionario): void
    {
        $this->idFuncionario = $idFuncionario;
    }

    public function setDataPedido(DateTime $dataPedido): void
    {
        $this->dataPedido = $dataPedido;
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
