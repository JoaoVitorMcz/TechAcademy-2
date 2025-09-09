<?php
namespace App\Controller;
use App\Model\Cliente;
use App\Model\Funcionario;
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
$clientes = Cliente::getAllCliente();
$produtos = Produto::getAllProdutos();
$funcionarios = Funcionario::getAllFuncionarios();

        include __DIR__ . '/../View/includes/header.php';
        include __DIR__ . '/../View/pages/dashboard.php';
        include __DIR__ . '/../View/includes/footer.php';
    }
}