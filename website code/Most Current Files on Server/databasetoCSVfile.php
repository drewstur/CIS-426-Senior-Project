<?php // RAY_db_to_csv.php
error_reporting(E_ALL);
echo "<pre>";


// DEMONSTRATE HOW TO EXPORT A TABLE IN CSV FORMAT


// SET YOUR TABLE NAME HERE - OR MAYBE USE THE URL "GET" ARGUMENT?
$table_name = '???';// enter issa or alumni


// DATABASE CONNECTION AND SELECTION VARIABLES - GET THESE FROM YOUR HOSTING COMPANY
require('connection.php')

// OPEN A CONNECTION TO THE DATA BASE SERVER AND SELECT THE DB
$mysqli = new mysqli($db_host, $db_user, $db_word, $db_name);

// DID THE CONNECT/SELECT WORK OR FAIL?
if ($mysqli->connect_errno)
{
    $err
    = "CONNECT FAIL: "
    . $mysqli->connect_errno
    . ' '
    . $mysqli->connect_error
    ;
    trigger_error($err, E_USER_ERROR);
}


// OPEN THE CSV FILE - PUT YOUR FAVORITE NAME HERE
$csv = 'EXPORT_' . date('Ymdhis') . "_$table_name" . '.csv';
$fp  = fopen($csv, 'w');
if (!$fp) trigger_error("UNABLE TO OPEN $csv", E_USER_ERROR);


// GET THE COLUMN NAMES
$sql = "SHOW COLUMNS FROM $table_name";
if (!$res = $mysqli->query($sql))
{
    $err
    = 'QUERY FAILURE:'
    . ' ERRNO: '
    . $mysqli->errno
    . ' ERROR: '
    . $mysqli->error
    . ' QUERY: '
    . $sql
    ;
    trigger_error($err, E_USER_ERROR);
}
if ($res->num_rows == 0)
{
    trigger_error("WTF? $table_name HAS NO COLUMNS", E_USER_ERROR);
}
else
{
    while ($show_columns = $res->fetch_object())
    {
        $my_columns[] = $show_columns->Field;
    }
    // var_dump($my_columns);
}

// WRITE THE COLUMN NAMES TO THE CSV
if (!fputcsv($fp, $my_columns)) trigger_error("FAILURE IN WRITING COLUMN NAMES TO $csv", E_USER_ERROR);


// GET THE ROWS OF DATA
$sql = "SELECT * FROM $table_name";
if (!$res = $mysqli->query($sql))
{
    $err
    = 'QUERY FAILURE:'
    . ' ERRNO: '
    . $mysqli->errno
    . ' ERROR: '
    . $mysqli->error
    . ' QUERY: '
    . $sql
    ;
    trigger_error($err, E_USER_ERROR);
}

// ITERATE OVER THE DATA SET http://php.net/manual/en/mysqli-result.fetch-row.php
while ($row = $res->fetch_row())
{
    // WRITE THE COMMA-SEPARATED VALUES.
    if (!fputcsv($fp, $row)) trigger_error("FAILURE IN WRITING DATA TO $csv", E_USER_ERROR);
}

// ALL DONE
fclose($fp);


// SHOW THE CLIENT A LINK
echo "<p><a href=\"$csv\">$csv</a></p>" . PHP_EOL;