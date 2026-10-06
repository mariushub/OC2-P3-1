<?php

class DBConnect
{
    private const ENV_FILE = __DIR__ . '/.env';

    public function getPDO(): PDO
    {
        if (!is_file(self::ENV_FILE)) {
            throw new RuntimeException('no .env file');
        }

        $env = parse_ini_file(self::ENV_FILE);
        $dsn = 'mysql:host=' . $env['DB_HOST'] . ';dbname=' . $env['DB_NAME'] . ';charset=utf8mb4';

        return new PDO($dsn, $env['DB_USER'], $env['DB_PASSWORD']);
    }
}
