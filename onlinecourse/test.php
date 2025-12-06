<?php
// Test file to verify the application setup
error_reporting(E_ALL);
ini_set('display_errors', 1);

echo "<h1>Online Course Platform - Test Page</h1>";

// Test 1: Check if we're in the right directory
echo "<h2>1. Directory Check</h2>";
echo "<p>Current directory: " . __DIR__ . "</p>";
echo "<p>index.php exists: " . (file_exists(__DIR__ . '/index.php') ? 'YES' : 'NO') . "</p>";
echo "<p>config/Database.php exists: " . (file_exists(__DIR__ . '/config/Database.php') ? 'YES' : 'NO') . "</p>";

// Test 2: Check Database Connection
echo "<h2>2. Database Connection Check</h2>";
try {
    require_once __DIR__ . '/config/Database.php';
    $db = Database::getInstance()->getConnection();
    echo "<p style='color: green;'>✓ Database connection successful!</p>";
    
    // Check if tables exist
    $stmt = $db->query("SHOW TABLES FROM onlinecourse");
    $tables = $stmt->fetchAll(PDO::FETCH_COLUMN);
    echo "<p>Tables found: " . count($tables) . "</p>";
    echo "<ul>";
    foreach ($tables as $table) {
        echo "<li>" . htmlspecialchars($table) . "</li>";
    }
    echo "</ul>";
} catch (Exception $e) {
    echo "<p style='color: red;'>✗ Database connection failed: " . htmlspecialchars($e->getMessage()) . "</p>";
}

// Test 3: Check if controllers exist
echo "<h2>3. Controllers Check</h2>";
$controllers = ['HomeController', 'AuthController', 'StudentController', 'InstructorController', 'AdminController', 'CourseController'];
foreach ($controllers as $controller) {
    $path = __DIR__ . '/controllers/' . $controller . '.php';
    echo "<p>" . $controller . ": " . (file_exists($path) ? '✓' : '✗') . "</p>";
}

// Test 4: Check if models exist
echo "<h2>4. Models Check</h2>";
$models = ['User', 'Course', 'Category', 'Lesson', 'Material', 'Enrollment'];
foreach ($models as $model) {
    $path = __DIR__ . '/models/' . $model . '.php';
    echo "<p>" . $model . ": " . (file_exists($path) ? '✓' : '✗') . "</p>";
}

// Test 5: PHP Version
echo "<h2>5. PHP Version</h2>";
echo "<p>PHP Version: " . phpversion() . "</p>";

// Test 6: Extensions Check
echo "<h2>6. Required Extensions</h2>";
$extensions = ['pdo', 'pdo_mysql', 'session'];
foreach ($extensions as $ext) {
    echo "<p>" . $ext . ": " . (extension_loaded($ext) ? '✓' : '✗') . "</p>";
}

echo "<hr>";
echo "<p><a href='index.php'>Go to Home Page</a></p>";
?>
