-- Create test database if it doesn't exist
DO $$
BEGIN
    IF NOT EXISTS (SELECT FROM pg_database WHERE datname = 'shophub_test') THEN
        CREATE DATABASE shophub_test;
    END IF;
END
$$;

