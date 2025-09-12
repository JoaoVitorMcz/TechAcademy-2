<?php
namespace App\Controller;

use App\Model\Cliente;
use App\Model\Funcionario;
use App\Model\Produto;
use App\Core\Database;

class DashboardController implements Controller
{
    public function render(): void
    {
        $em = Database::getEntityManager();

        if (isset($_POST['salvarProduto'])) {
            $produto = new Produto(
                $_POST['nome'],
                $_POST['descricao'],
                $_POST['preco'],
                $_POST['estoque']
            );
            $em->persist($produto);
            $em->flush();
        }

        if (isset($_POST['salvarFuncionario'])) {
            $funcionario = new Funcionario(
                $_POST['nomeFuncionario'],
                $_POST['cargo'],
                $_POST['emailFuncionario'],
                $_POST['salario']
            );
            $em->persist($funcionario);
            $em->flush();
        }

        if (isset($_POST['salvarCliente'])) {
            $cliente = new Cliente(
                $_POST['nomeCliente'],
                $_POST['emailCliente'],
                $_POST['telefoneCliente'],
                $_POST['senhaCliente']
            );
            $em->persist($cliente);
            $em->flush();
        }

        // 🔹 Buscando tudo direto do Doctrine
        $clientes = $em->getRepository(Cliente::class)->findAll();
        $produtos = $em->getRepository(Produto::class)->findAll();
        $funcionarios = $em->getRepository(Funcionario::class)->findAll();

        include __DIR__ . '/../View/includes/header.php';
        include __DIR__ . '/../View/pages/dashboard.php';
        include __DIR__ . '/../View/includes/footer.php';
    }
}
