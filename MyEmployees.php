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
        $this->table_name = $this->table_prefix . 'employees_table'; // wp_employees_table
       
    }

    // Create DB table + WordPress Page
    public function callPluginActivationFunctions(){
        $collate = $this->wpdb->get_charset_collate();
       $createCommand = "
       CREATE TABLE `". $this->table_name ."` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(50) NOT NULL,
        `email` varchar(50) DEFAULT NULL,
        `designation` varchar(50) DEFAULT NULL,
        `profile_image` varchar(220) DEFAULT NULL,
        PRIMARY KEY (`id`)
        ) ". $collate ."
       ";

       require_once (ABSPATH . "/wp-admin/includes/upgrade.php");
       dbDelta( $createCommand );

       // Wp page 
       $page_title = "Employee CRUD Stystem";
       $page_content = "[wp-employee-form]";

       if( ! get_page_by_title( $page_title ) ){
            wp_insert_post( array(
                "post_title"    => $page_title,
                "post_content"  => $page_content,
                "post_type"     => "page",
                "post_status"   => "publish"
            ) );
       }
    }

    public function dropEmployessTable(){
        $delete_command = "DROP TABLE IF EXISTS {$this->table_name}";

        $this->wpdb->query($delete_command);
    }

    // Render Employee Form Layout
    public function createEmployessForm(){
        ob_start();

        include_once WCE_DIR_PATH . "template/employee_form.php";
        $template = ob_get_contents();

        ob_end_clean();

        return $template;
    }


    // Add css and js
    public function addAssetsToPlugin(){
        // Style 
        wp_enqueue_style( "employee-crud-css", WCE_DIR_URL . "assets/styles.css" );

        
        // validation js
        wp_enqueue_script( "jquery-validate", WCE_DIR_URL . "assets/jquery.validate.min.js", array("jquery"), "1.19.5" );
        // js
        wp_enqueue_script( "employee-crud-js", WCE_DIR_URL . "assets/script.js", array("jquery"), "3.0" );

        // wp_localize_script
        wp_localize_script( "employee-crud-js", "wce_object", array(
            "ajax_url" => admin_url( "admin-ajax.php" )
        ));
    }


    // Proecess ajax request : Add employee form
    public function handleAddEmployeeFormData(){

        $name = sanitize_text_field( $_POST['name'] );
        $email = sanitize_text_field( $_POST['email'] );
        $designation = sanitize_text_field( $_POST['designation'] );

        /**
         * array("test_form" => false) -> wp_handle_upload is not going to check any file attributes or even file submission
         * 
         * array ("test_form" => true)  -> wp_handle_upload will validate form request, nonce value or other form parameters
         */
        // Check for file
        $profile_url = "";
        if(isset($_FILES['profile_image']['name'])){
            $fileUpload = wp_handle_upload( $_FILES['profile_image'], array("test_form" => false) ); 
            $profile_url = $fileUpload["url"];
        }else{}

        $this->wpdb->insert($this->table_name, [
            "name"          => $name,
            "email"         => $email,
            "designation"   => $designation,
            "profile_image"   => $profile_url
        ]);

        $employes_id = $this->wpdb->insert_id;
        
        if($employes_id > 0){
            echo json_encode([
                "status"    => 1,
                "message"   => "Succefully Employee created",
            ]);
        }else{
            echo json_encode([
                "status"    => 0,
                "message"   => "Failed to save emplyee"
            ]);
           
        }
        
        die;
    }
}