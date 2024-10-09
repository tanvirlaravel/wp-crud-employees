<?php 

class MyEmployees {
    private $wpdb;
    private $table_prefix;
    private $table_name;

    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->table_prefix = $wpdb->prefix;   // wp_
        $this->table_name = $this->table_prefix . 'employees_table';  // wp_employees_table
        echo $this->table_name;
    }
}