<?php
function pdo_connect_mysql()
{
    $DATABASE_HOST = '127.0.0.1';
    $DATABASE_USER = 'USER';
    $DATABASE_PASS = 'PASSWORD';
    $DATABASE_NAME = 'DATABASE';
    $DATABASE_PORT = '3306';
    $CHARSET = 'utf8mb4';
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $dsn = "mysql:host=$DATABASE_HOST;dbname=$DATABASE_NAME;charset=$CHARSET;port=$DATABASE_PORT";
    try {
        return new PDO($dsn, $DATABASE_USER, $DATABASE_PASS, $options);
    } catch (PDOException $exception) {
        echo "$exception";
        exit('Failed to connect to database');
    }
}

$pdo = pdo_connect_mysql();
