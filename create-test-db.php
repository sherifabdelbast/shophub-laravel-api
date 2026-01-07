<?php

/**
 * Script to create the test database in PostgreSQL
 * Run: php create-test-db.php
 */

$host = '127.0.0.1';
$port = '5432';
$database = 'shophub_test';
$username = 'shophub';
$password = 'shophub';

try {
    // Connect to postgres database
    $pdo = new PDO(
        "pgsql:host={$host};port={$port};dbname=postgres",
        $username,
        $password
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Check if database exists
    $stmt = $pdo->query("SELECT 1 FROM pg_database WHERE datname = '{$database}'");
    
    if ($stmt->rowCount() === 0) {
        $pdo->exec("CREATE DATABASE {$database}");
        echo "✓ Test database '{$database}' created successfully.\n";
    } else {
        echo "✓ Test database '{$database}' already exists.\n";
    }
} catch (PDOException $e) {
    echo "✗ Error: " . $e->getMessage() . "\n";
    echo "Make sure:\n";
    echo "  1. Docker is running\n";
    echo "  2. PostgreSQL container is up (docker-compose up -d)\n";
    echo "  3. Database credentials are correct\n";
    exit(1);
}

