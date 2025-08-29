<?php
use App\Model\Produto;
// require_once __DIR__ . '../../../vendor/autoload.php';
$message = '';
if($_POST){
    if(isset($_POST['action'])){
        switch($_POST['action']){
            case'add':
                $nome = $_POST['nome'];
                $descricao = $_POST['descricao'];
                $preco = $_POST['preco'];
                $estoque = $_POST['estoque'];
                if($this->addProduto($nome, $descricao, $preco, $estoque)){
                    $message = "<div class='alert alert-success'>Produto adicionado com sucesso!</div>";
                }else{
                    $message = "<div class='alert alert-danger'>Erro ao adicionar</div>";
                }
                break;

                case 'edit':

        }
    }
}
$produto_edit = null;
if(isset($_GET['edit'])){
    $produto_edit = $this->getProdutoById(intval($_GET['edit']));
}

?>
<style>
    footer{
        display: none;
    }
</style>
<div class="container-dashboard">
<nav class="sidebar">
    <div class="sidebar-header">
        <h1>Carina Melo</h1>
    </div>
    <ul class="sidebar-nav">
        <li>
            <a href="">
                <i class="fas fa-box"></i>
                Produtos
            </a>
        </li>
        <li>
            <a href="">
                <i class="fas fa-users"></i>
                Funcionários
            </a>
        </li>
        <li>
            <a href="">
                <i class="fas fa-user-friends"></i>
                Clientes
            </a>
        </li>
        <li>
            <a href="">
                <i class="fas fa-shopping-cart"></i>
                Vendas 
            </a>
        </li>
        <li>
            <a href="">
                <i class="fas fa-chart-line"></i>
                Faturamento
            </a>
        </li>
    </ul>
</nav>
<main>
    <div class="page-header">
        <h1 id="produto"><i class="fas fa-box"></i>Gestão de Produtos</h1>
        <p>Cadastre e gerencie os produtos da sua loja</p>
    </div>
    <?php echo $message; ?>

    <div class="card-produto">
        <div class="card-header-produto">
            <h2 class="card-title-produto">
                <?php echo $produto_edit ? 'Editar Produto' : 'Novo Produto'; ?>
            </h2>
        </div>
        <form method="post" id="produto-form">
            <input type="hidden" name="action" value="<?php echo $produto_edit ? 'edit' : 'add';?>">
            <?php if($produto_edit):?>
                <input type="hidden" name="id" value="<?php echo $produto_edit['id']; ?>">
            <?php endif;?>

            <div class="div-form-produto">
                <div class="form-group-produto">
                    <label class="form-label">Nome do Produto</label>
                    <input type="text" name="nome" class="form-control" required value="<?php echo $produto_edit ? htmlspecialchars($produto_edit['nome']) : ''; ?>">
        
                </div>
                <div class="form-group-produto">
                    <label class="form-label">Preço</label>
                    <input type="number" name="preco" class="form-control" step="0.01" min="0" required 
                    value="<?php echo $produto_edit ? $produto_edit['preco'] : '';?>">
                </div>
            </div>
            <div class="div-form-produto">
                <div class="form-group-produto">
                    <label class="form-label">Estoque</label>
                    <input type="number" name="estoque" class="form-control" min="0" required
                    value="<?php echo $produto_edit ? $produto_edit['estoque'] : ''; ?>">
                </div>
                <div class="form-group-produto">
                    <label class="form-label">Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3"><?php echo $produto_edit ? htmlspecialchars($produto_edit['descricao']) : '';?></textarea>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn-protudo btn-primary-produto">
                    <i class="fas fa-save"></i>
                    <?php echo $produto_edit ? 'atualizar' : 'cadastrar'; ?>
                </button>
                <?php if ($produto_edit):?>
                    <a href="?param=dashboard#produto" class="btn-produto btn-secondary-produto">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                <?php endif;?>
            </div>
        </form>

    </div>
</main>
</div>