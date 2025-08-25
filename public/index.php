<?php
    // Headers para instruir o navegador a não fazer cache da página HTML principal.
    header("Cache-Control: no-cache, no-store, must-revalidate"); // HTTP/1.1
    header("Pragma: no-cache"); // HTTP/1.0
    header("Expires: 0"); // Proxies
        
    $base = "https://{$_SERVER['SERVER_NAME']}{$_SERVER['SCRIPT_NAME']}";

?>
<?php


require_once __DIR__ . '/../src/View/includes/header.php';

        $pagina = $_GET["param"] ?? "home";

        $param = explode("/", $pagina);

        $pagina = $param[0];
        $id = $param[1] ?? null;

        $pagina = __DIR__ . "/../src/View/pages{$_SERVER['REQUEST_URI']}.php";

        if (file_exists($pagina)) {
            include $pagina;
        } else {
            include __DIR__ . "/../src/View/pages/erro.php";
        }
    
require_once __DIR__ . '/../src/View/includes/footer.php';

?>