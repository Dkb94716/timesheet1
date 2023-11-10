<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
  Project Name : Timesheet
  Developed In: Clavis Technologies Pvt Ltd.
  Modification History
  Create Date           Version         Author			Description                                Last modified
  __________	___________	_______________   ________________________________________  ________________________________________
  25-02-2015            1.0             Ajay                 Controller for DMS                      25-02-2015
 */
//require_once APPPATH."/third_party/openkm/openkm/OpenKM.php"; 

class DMS extends CI_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
         $this->load->library('test/TestFolder');
    }
    
    function do_test(){
      
       //$testAuth = new TestAuth();
       // $testAuth->test();
       $testFolder = new TestFolder();
        $testFolder->test_move('/okm:root/Client/Test Client','TestClient');
        
   
    }
    
    

}
