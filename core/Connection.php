<?php
class Connection
{
    // Hold the class instance.
    private static $instance = null, $conn = null;

    // The constructor is private
    // to prevent initiation with outer code.

    //kết nối database
    private function __construct($config)
    {
        mysqli_report(MYSQLI_REPORT_STRICT);
        try {
            if (empty($config['pass'])) {
                $config['pass'] = '';
            }
            $con = mysqli_connect($config['host'], $config['user'], $config['pass'], $config['db']);
            self::$conn = $con;
        } catch (Exception $e) {
            echo "Connection failed";
            die();
        }
    }

    // The object is created from within the class itself
    // only if the class has no instance.
    public static function getInstance($config)
    {
        if (self::$instance == null) {
            $connection = new Connection($config);
            self::$instance = self::$conn;
        }

        return self::$instance;
    }
}
