'mysql' => [
            'driver' => 'mysql',
+           'host' => env('DB_HOST', 'remotemysql.com'),
            'port' => env('DB_PORT', '3306'),
+           'database' => env('DB_DATABASE', 'XXsvTwHH5i'),
+           'username' => env('DB_USERNAME', 'XXsvTwHH5i'),
+           'password' => env('DB_PASSWORD', '7ikditXWYb'),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'options' => [PDO::ATTR_EMULATE_PREPARES => true],
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
        ],