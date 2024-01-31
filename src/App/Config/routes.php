<?php 
declare(strict_types=1);

namespace App\Config;
use Framework\App;
use App\Controllers\{HomeController, AboutController};

/**
 * We instantiate the class HomeController when our application is initialized
 */

function registerRoutes(App $app){
    $app->get('/', [HomeController::class, 'home']);
$app->get('/about', [AboutController::class, 'about']);
}
?>