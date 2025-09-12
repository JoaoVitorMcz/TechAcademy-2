<?php
namespace App\Controller;
use App\Model\Cliente;
use App\Model\Funcionario;
use App\Model\ItensPedidos;
use App\Model\pedidos;
use App\Model\Produto;
class DashboardController implements Controller
{
    public function render(): void
    {
if (isset($_POST['salvarProduto'])) {
    $produto = new Produto(
        $_POST['nome'],
        $_POST['descricao'],
        $_POST['preco'],
        $_POST['estoque']
    );
    $produto->save();
}

if (isset($_POST['salvarFuncionario'])) {
    $funcionario = new Funcionario(
        $_POST['nomeFuncionario'],
        $_POST['cargo'],
        $_POST['emailFuncionario'],
        $_POST['salario']
    );
    $funcionario->save();
}
if(isset($_POST['salvarCliente'])){
    $cliente = new Cliente(
        $_POST['nomeCliente'],
        $_POST['emailCliente'],
        $_POST['telefoneCliente'],
        $_POST['senhaCliente'],
    );
    $cliente->save();
}
if(isset($_POST['salvarItensPedidos'])){
    $em = \App\Core\Database::getEntityManager();
    $pedido = $em->find(\App\Model\pedidos::class, $_POST['idPedido']);
    $produto = $em->find(\App\Model\Produto::class, $_POST['idProduto']);
    $itemPedido = new ItensPedidos(
        $pedido,
        $produto,
        $_POST['quantidade'],
        $_POST['precoUnitario'],
    );
    $itemPedido->save();
}
if(isset($_POST['salvarPedidos'])){
    $em = \App\Core\Database::getEntityManager();
    $cliente = $em->find(\App\Model\Cliente::class, $_POST['clientesPedidos']);
    $funcionario = $em->find(\App\Model\Funcionario::class, $_POST['funcionariosPedidos']);
    $dataPedido = new \DateTime($_POST['dataPedido']);

    $pedido = new \App\Model\Pedidos(
        $cliente,
        $funcionario,
        $dataPedido
    );
    $pedido->save();
}
$clientes = Cliente::getAllCliente();
$produtos = Produto::getAllProdutos();
$funcionarios = Funcionario::getAllFuncionarios();
$pedidos = Pedidos::getAllPedidos();
$itensPedidos = ItensPedidos::getAllItensPedidos();

        include __DIR__ . '/../View/includes/header.php';
        include __DIR__ . '/../View/pages/dashboard.php';
        include __DIR__ . '/../View/includes/footer.php';
    }
}