<?php
    // Headers para instruir o navegador a não fazer cache da página HTML principal.
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP/1.1
    header("Pragma: no-cache"); // HTTP/1.0
    header("Expires: 0"); // Proxies
        
    $base = "https://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}";

?>
<?php
use App\Controller\Catalogo_aneisController;
use App\Controller\Catalogo_todosController;
use App\Controller\Catalogo_colaresController;
use App\Controller\Catalogo_pulseirasController;
use App\Controller\ContatoController;
use App\Controller\DashboardController;
use App\Controller\ErroController;
use App\Controller\HomeController;
use App\Controller\LoginController;
use App\Controller\SobreController;
use App\Controller\RegisterController;
use App\Controller\Controller;

require_once __DIR__ . '/../vendor/autoload.php';
$uri= $_SERVER['REQUEST_URI'];

$pages = [
    '/catalogo_todos' => new Catalogo_todosController,
    '/catalogo_aneis' => new Catalogo_aneisController,
    '/catalogo_colares' => new Catalogo_colaresController,
    '/catalogo_pulseiras' => new Catalogo_pulseirasController,
    '/contato' => new ContatoController,
    '/dashboard' => new DashboardController,
    '/home' => new HomeController,
    '/sobre' => new SobreController,
    '/login' => new LoginController,
    '/registro' => new RegisterController
];

$controller = $pages[$uri] ?? new ErroController;

$controller->render();
?>