<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') exit;

$code = trim($_POST['code'] ?? '');
$blacklist = ['shell_exec', 'exec', 'system', 'passthru', 'proc_open', 'popen', 'curl_exec', 'curl_multi_exec', 'phpinfo'];
foreach ($blacklist as $fn) if (stripos($code, $fn) !== false) exit("Fonction non autorisée.");

if (strpos($code, '<?php') !== 0) $code = "<?php\n" . $code . "\n?>";

$tmpFile = tempnam(sys_get_temp_dir(), 'php_sandbox_') . '.php';
file_put_contents($tmpFile, $code);
$output = shell_exec("php " . escapeshellarg($tmpFile) . " 2>&1");
unlink($tmpFile);

echo str_replace("\n", "<br>", htmlspecialchars($output));
