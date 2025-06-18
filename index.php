<?php
    $base = $_SERVER['SERVER_NAME'] . $_SERVER['SCRIPT_NAME'];

?>
<?php

require_once 'includes/header.php';

            $pagina = $_GET["param"] ?? "home";

            $param = explode("/", $pagina);

            $pagina = $param[0];
            $id = $param[1] ?? null;

            $pagina = "pages/{$pagina}.php";

            if (file_exists($pagina)) {
                include $pagina;
            } else {
                include "pages/erro.php";
            }
    
require_once 'includes/footer.php';

?>