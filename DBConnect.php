<?php

/**
 * Creates the PDO connection to the database.
 * Credentials are read from the .env file, which is not pushed to GitHub.
 */
class DBConnect
{
    private const ENV_FILE = __DIR__ . '/.env';

    public function getPDO(): PDO
    {
        if (!is_file(self::ENV_FILE)) {
            throw new RuntimeException('no .env file');
        }

        // Reads the KEY=value lines of .env into an array
        $env = parse_ini_file(self::ENV_FILE);
        $dsn = 'mysql:host=' . $env['DB_HOST'] . ';dbname=' . $env['DB_NAME'] . ';charset=utf8mb4';

        return new PDO($dsn, $env['DB_USER'], $env['DB_PASSWORD']);
    }
}
