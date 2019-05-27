/* require 'Router.php';
require 'Route.php';
require 'RouterException.php';

$router = new Router($_GET['url']);

$router->get('/', function() { echo 'accueil';});
$router->get('/posts', function() { echo 'tous les articles';});
$router->get('/posts/:id-:slug', function($id, $slug) { 
    echo 'afficher l\'article ' . $id . ' : ' . $slug;
})->with('id', '[0-9]+')->with('slug', '[a-z\-0-9]+');

$router->run(); */