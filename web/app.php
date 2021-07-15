<?php

$dbHost = $_ENV['POSTGRES_HOST'];
$dbName = $_ENV['POSTGRES_DB'];
$dbUser = $_ENV['POSTGRES_USER'];
$dbPass = $_ENV['POSTGRES_PASSWORD'];

$c = new PDO("pgsql:dbname=$dbName;host=$dbHost", $dbUser, $dbPass);

$sql = "select id, name from author";
$result = [];
foreach ($c->query($sql) as $row) {
    $result[] = [
        'id' => $row['id'],
        'name' => $row['name'],
    ];
}

$env = $_ENV;
ksort($env);

?>
<pre>
Data from table `author`

===|======
id | name
---|------
<?php foreach ($result as $row) { echo " {$row['id']} | {$row['name']}\n"; } ?>
==========

---------------------------------------------------------------------------------

Debug of ENV vars
==================
<?php foreach ($env as $key => $value) { echo "$key=$value\n"; } ?>
</pre>
