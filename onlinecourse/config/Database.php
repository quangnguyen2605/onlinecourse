<?php
class Database
{
    private static $instance = null;
    private $connection;

    private $host = 'localhost';
    private $dbName = 'onlinecourse';
    private $username = 'root';
    private $password = '';

    private function __construct()
    {
        // Try connecting to the named database first
        $dsn = "mysql:host={$this->host};dbname={$this->dbName};charset=utf8mb4";

        try {
            $this->connection = new PDO($dsn, $this->username, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // If the database doesn't exist, attempt to create it
            if (strpos($e->getMessage(), 'Unknown database') !== false || $e->getCode() == '1049') {
                try {
                    $dsnNoDb = "mysql:host={$this->host};charset=utf8mb4";
                    $tmp = new PDO($dsnNoDb, $this->username, $this->password);
                    $tmp->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $tmp->exec("CREATE DATABASE IF NOT EXISTS `{$this->dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
                    $tmp = null;

                    // connect again to the newly created database
                    $this->connection = new PDO($dsn, $this->username, $this->password);
                    $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                } catch (PDOException $e2) {
                    die('Database creation failed: ' . $e2->getMessage());
                }
            } else {
                die('Database connection failed: ' . $e->getMessage());
            }
        }

        // If the database is empty (no tables), attempt to import database.sql if present
        try {
            $stmt = $this->connection->query("SHOW TABLES");
            $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
            if (empty($tables)) {
                $sqlFile = __DIR__ . '/../database.sql';
                if (file_exists($sqlFile)) {
                    $sql = file_get_contents($sqlFile);
                    // Remove basic SQL comments and split statements by ";\n"
                    $lines = preg_split('/\r\n|\n|\r/', $sql);
                    $sqlStatements = '';
                    foreach ($lines as $line) {
                        $trim = trim($line);
                        if ($trim === '' || strpos($trim, '--') === 0 || strpos($trim, '/*') === 0) {
                            continue;
                        }
                        $sqlStatements .= $line . "\n";
                    }
                    $stmts = array_filter(array_map('trim', explode(";\n", $sqlStatements)));
                    foreach ($stmts as $statement) {
                        if ($statement !== '') {
                            $this->connection->exec($statement);
                        }
                    }
                }
            }
        } catch (PDOException $e) {
            // ignore import errors to avoid breaking on complex SQL files
        }
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->connection;
    }
}
