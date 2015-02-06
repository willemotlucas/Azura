<?php

$start = microtime(true);

define('WEBROOT', dirname(__FILE__));
define('ROOT', dirname(WEBROOT));
define('DS', DIRECTORY_SEPARATOR);
define('CORE', ROOT.DS.'core');
define('BASE_URL', dirname(dirname($_SERVER['SCRIPT_NAME'])));
define('CSS', ROOT.DS.'webroot'.DS.'css');
define('JS', ROOT.DS.'webroot'.DS.'js');

require CORE.DS.'includes.php';

new Dispatcher();

?>

<div style="position:fixed;bottom:0;height:30px;line-height:30px;padding-left:10px;left:0;right:0;color:#FFF;">
<?php echo 'Page générée en ' . round(microtime(true) - $start, 5) . ' secondes.'; ?>
</div>