<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class CI_Controller {

    private static $instance;
    protected $user_id;
    protected $user_type;

    /**
     * Constructor
     */
    public function __construct() {
        self::$instance = & $this;

        // Assign all the class objects that were instantiated by the
        // bootstrap file (CodeIgniter.php) to local class variables
        // so that CI can run as one big super object.
        foreach (is_loaded() as $var => $class) {
            $this->$var = & load_class($class);
        }

        $this->load = & load_class('Loader', 'core');

        $this->load->initialize();
        $this->user_id = $this->session->userdata('user_id');
        $this->user_type = $this->session->userdata('user_type');
        log_message('debug', "Controller Class Initialized");
    }

    public static function &get_instance() {
        return self::$instance;
    }

    function loadSidebar() {
        $menu;
        $user_type = $this->user_type;
        if ($user_type == 'Employee') {
            $menu['Sidebar'] = array(
                'Inbox' => array(
                ),
                'Profle' => array(
                ),
                'Jobs & Application' => array( 
                    'Add Jobs'=>'job/add',
                    ' View Jobs'=>'job/job_list'
                ),
                'Recruiters' => array(
                ),
                'Settings' => array(
                )
            );
        } elseif ($user_type == 'User') {
            $menu['Sidebar'] = array(
                'Inbox' => array(
                    'Message' => '#'
                ),
                'Profle' => array(
                    'View Profile' => 'User/view',
                    'Project' => 'User/user_projects',
                    'Education' => 'User/user_qualification'
                ),
                'Jobs & Application' => array(
                    'Saved Jobs' => '#',
                    'Application History' => '#'
                ),
                'Recruiters' => array(
                    'Job & Updates' => '#'
                ),
                'Settings' => array(
                    'Change Password' => '#'
                )
            );
        } else {
            
        }
        return $menu;
    }

}
