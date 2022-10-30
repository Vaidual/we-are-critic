<?PHP

// Gives access to database
include_once "./db/db.php";

// Provides XYZ framework


$date = date('Y-m-d', time());

ExecuteQuery("DELETE FROM Ip WHERE (date != \"$date\")");

ExecuteQuery("UPDATE Visit SET hosts = 0, views = 0 WHERE (date != \"$date\")");
ExecuteQuery("UPDATE Visit SET date = \"$date\""); 

$ip = $_SERVER['REMOTE_ADDR'];

$result = ExecuteQuery("SELECT * FROM Ip WHERE (ip_address = \"$ip\")");
$row = count($result);

if ($row > 0)
{
    $row = ExecuteQuery("SELECT hosts, views, total FROM
    Visit")[0];
    $new_hits = ++$row['views'];
    $new_total = ++$row['total'];
    ExecuteQuery("UPDATE Visit SET views = $new_hits, total = $new_total ");
}
else {
    ExecuteQuery("INSERT INTO Ip (ip_address, date) VALUES (\"$ip\", \"$date\")");
    $row = ExecuteQuery("SELECT hosts, views, total FROM Visit")[0];
    $new_hosts = ++$row['hosts'];
    $new_hits = ++$row['views'];
    $new_total = ++$row['total'];
    ExecuteQuery("UPDATE Visit SET hosts = $new_hosts, views = $new_hits, total = $new_total");
}
$row = ExecuteQuery("SELECT hosts, views, total FROM Visit")[0];
$_POST["hosts"] = $row["hosts"];
$_POST["views"] = $row["views"];
$_POST["total"] = $row["total"];