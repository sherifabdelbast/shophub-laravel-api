<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Ensure test database exists
        $this->ensureTestDatabaseExists();
    }

    protected function ensureTestDatabaseExists(): void
    {
        $database = config('database.connections.pgsql.database');
        $username = config('database.connections.pgsql.username');
        $password = config('database.connections.pgsql.password');
        $host = config('database.connections.pgsql.host');
        $port = config('database.connections.pgsql.port');

        try {
            // Connect to postgres database to create test database
            $pdo = new \PDO(
                "pgsql:host={$host};port={$port};dbname=postgres",
                $username,
                $password
            );
            $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

            // Check if database exists, create if it doesn't
            $stmt = $pdo->query("SELECT 1 FROM pg_database WHERE datname = '{$database}'");
            if ($stmt->rowCount() === 0) {
                $pdo->exec("CREATE DATABASE {$database}");
            }
        } catch (\PDOException $e) {
            // Silently fail - database might already exist or Docker might not be running
            // Tests will fail with a clearer error message if database doesn't exist
        }
    }
}
