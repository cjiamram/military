<?php 

//$command = escapeshellcmd('T.py');
//$output = shell_exec($command);
//echo $output;
//$message = exec("/var/www/html/military/report/T.py");
//echo $message;

ob_start();
//passthru('python3 /var/www/html/military/report/T.py');
passthru('python3 T.py');

$output = ob_get_clean();

?>