<?php
use App\Model\Cliente;
use App\Model\Funcionario;
use App\Model\Produto;
require_once __DIR__ . '/../../../vendor/autoload.php';
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

?>
<style>
    footer{
        display: none;
    }
</style>
<nav class="navbar navbar-expand-lg navbar-light bg-very-light-clear">
            <div class="container">
                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#produto">Produtos</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#funcionario">Funcionários</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="#cliente">Clientes</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="">Vendas</a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="">Faturamento</a>
                        </li>
                        <!--
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-search"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="bi bi-cart3"></i></a>
                        </li>
                        -->
                    </ul>
                </div>
            </div>
        </nav>
<main>
    <div class="page-header">
        <h1 id="produto"><i class="fas fa-box"></i>Gestão de Produtos</h1>
        <p>Cadastre e gerencie os produtos da sua loja</p>
    </div>
    <div class="card-produto">
        <div class="card-header-produto">
            <h2 class="card-title-produto">
                <?php echo 'Novo Produto'; ?>
            </h2>
        </div>
        <form method="post" id="produto-form">
            <div class="div-form-produto">
                <div class="form-group-produto">
                    <label class="form-label">Nome do Produto</label>
                    <input type="text" name="nome" class="form-control" required>
        
                </div>
                <div class="form-group-produto">
                    <label class="form-label">Preço</label>
                    <input type="number" name="preco" class="form-control" step="0.01" min="0" required>
                </div>
            </div>
            <div class="div-form-produto">
                <div class="form-group-produto">
                    <label class="form-label">Estoque</label>
                    <input type="number" name="estoque" class="form-control" min="0" required>
                </div>
                <div class="form-group-produto">
                    <label class="form-label">Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3"></textarea>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn-protudo btn-primary-produto" name="salvarProduto">
                    <i class="fas fa-save"></i>
                    <?php echo'cadastrar'; ?>
                </button>
            </div>
        </form>
        </div>
    <div class="card-produto mb-4 tabela">
        <div class="card-header-produto card-tabela">
            <h2 class="card-title-produto card-titulo-tabela">
                Tabela de Produtos:
            </h2>
        </div>
        <table class="tabela-produto">
            <tr><th>Id_Produto</th><th>Produto</th><th>Preço</th><th>Estoque</th><th>Descrição</th></tr>
            <?php foreach($produtos as $produ): ?>
                <tr>
                    <td><?=$produ->getIdProduto()?></td>
                    <td><?=$produ->getNome()?></td>
                    <td><?=$produ->getPreco()?></td>
                    <td><?=$produ->getEstoque()?></td>
                    <td><?=$produ->getDescricao()?></td>
                </tr>
                <?php endforeach ?>
        </table>
    </div>
    <div class="page-header">
        <h1 id="funcionario"><i class="fa-solid fa-user-tie"></i>Gestão de Funcionários</h1>
        <p>Cadastre e gerencie os funcionários da sua loja</p>
    </div>
    <div class="card-produto">
        <div class="card-header-produto">
            <h2 class="card-title-produto">
                <?php echo 'Novo Funcionário'; ?>
            </h2>
        </div>
        <form method="post" id="funcionario-form">
            <div class="div-form-produto">
                <div class="form-group-produto">
                    <label class="form-label">Nome do Funcionário</label>
                    <input type="text" name="nomeFuncionario" class="form-control" required>
                </div>
                <div class="form-group-produto">
                    <label class="form-label">Cargo</label>
                    <input type="text" name="cargo" class="form-control" required>
                </div>
            </div>
            <div class="div-form-produto">
                <div class="form-group-produto">
                    <label class="form-label">Email</label>
                    <input type="text" name="emailFuncionario" class="form-control" required>
                </div>
                <div class="form-group-produto">
                    <label class="form-label">Salario</label>
                    <input type="number" name="salario" class="form-control" step="0.01" min="0" required>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn-protudo btn-primary-produto" style="margin-top: 15px" name="salvarFuncionario">
                    <i class="fas fa-save"></i>
                    <?php echo'cadastrar'; ?>
                </button>
            </div>
        </form>
        </div>
    <div class="card-produto mb-4 tabela">
        <div class="card-header-produto card-tabela">
            <h2 class="card-title-produto card-titulo-tabela">
                Tabela de Funcionários:
            </h2>
        </div>
        <table class="tabela-produto">
            <tr><th>id_Funcionario</th><th>Nome</th><th>Cargo</th><th>Email</th><th>Salário</th></tr>
            <?php foreach($funcionarios as $func): ?>
                <tr>
                    <td><?=$func->getIdFuncionario()?></td>
                    <td><?=$func->getNome()?></td>
                    <td><?=$func->getCargo()?></td>
                    <td><?=$func->getEmail()?></td>
                    <td><?=$func->getSalario()?></td>
                </tr>
                <?php endforeach ?>
        </table>
    </div>
    <div class="page-header">
        <h1 id="cliente"><i class="fa-solid fa-user"></i>Gestão de Clientes</h1>
        <p>Cadastre e gerencie os Clientes da sua loja</p>
    </div>
    <div class="card-produto">
        <div class="card-header-produto">
            <h2 class="card-title-produto">
                <?php echo 'Novo Clientes'; ?>
            </h2>
        </div>
        <form method="post" id="cliente-form">
            <div class="div-form-produto">
                <div class="form-group-produto">
                    <label class="form-label">Nome do Cliente</label>
                    <input type="text" name="nomeCliente" class="form-control" required>
                </div>
                <div class="form-group-produto">
                    <label class="form-label">Email</label>
                    <input type="text" name="emailCliente" class="form-control" required>
                </div>
            </div>
            <div class="div-form-produto">
                <div class="form-group-produto">
                    <label class="form-label">Telefone</label>
                    <input type="number" name="telefoneCliente" class="form-control" required>
                </div>
                <div class="form-group-produto">
                    <label class="form-label">Senha</label>
                    <input type="text" name="senhaCliente" class="form-control"  min="6" required>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn-protudo btn-primary-produto" style="margin-top: 15px" name="salvarCliente">
                    <i class="fas fa-save"></i>
                    <?php echo'cadastrar'; ?>
                </button>
            </div>
        </form>
        </div>
    <div class="card-produto mb-4 tabela">
        <div class="card-header-produto card-tabela">
            <h2 class="card-title-produto card-titulo-tabela">
                Tabela de Clientes:
            </h2>
        </div>
        <table class="tabela-produto">
            <tr><th>id_Cliente</th><th>Nome</th><th>Email</th><th>Telefone</th><th>Senha</th></tr>
            <?php foreach($clientes as $client): ?>
                <tr>
                    <td><?=$client->getId()?></td>
                    <td><?=$client->getNome()?></td>
                    <td><?=$client->getEmail()?></td>
                    <td><?=$client->getTelefone()?></td>
                    <td><?=$client->getSenha()?></td>
                </tr>
                <?php endforeach ?>
        </table>
    </div>
</main>