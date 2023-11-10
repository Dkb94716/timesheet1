<?php

class Holiday_model extends CI_Model {
    /*
      Developed In: Clavis Technologies Pvt Ltd.
      Modification History
      Create Date   Author			Description
      __________  _______________  ________________________________________
      16-02-2015     Ajay                   Model for Holiday
     */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function insertHoliday($data) {
        if ($this->checkHoliday($data)) {
            $this->db->insert('holiday', $data);
            $insert_id = $this->db->insert_id();
            return $insert_id;
        } else {
            return false;
        }
    }

    /** function to update records */
    function updateHoliday($data) {
        if ($this->checkHoliday($data)) {
            $this->db->where('holiday_id', $data['holiday_id']);
            $this->db->update('holiday', $data);

            return $data['holiday_id'];
        } else {

            return false;
        }
    }

    function deleteHoliday($holiday_id) {

        $this->db->where('holiday_id', $holiday_id);
        $this->db->delete('holiday');

        return true;
    }

    function checkHoliday($data) {
        $this->db->select('*');
        $this->db->from('holiday');
        if (!empty($data['holiday_id'])) {

            $this->db->where_not_in('holiday_id', $data['holiday_id']);
        }
        $this->db->where('YEAR(holiday_date)', $data['holiday_date']);
        $this->db->where('holiday_name', $data['holiday_name']);
        $query = $this->db->get();
        $num_rows = $query->num_rows();

        if ($num_rows > 0) {
            return false;
        } else {
            return true;
        }
    }

    function listHoliday($holiday_id = NULL, $holiday_date=NULL) {
        $where = '';
        if (!empty($holiday_id)) {
            $where = '  where holiday_id=' . $holiday_id;
        }
        elseif(!empty($holiday_date)){
            $where = ' where YEAR(holiday_date) = ' . $holiday_date;
        }

        $query = $this->db->query('select holiday_id,DATE_FORMAT(holiday_date,\'%d %M %Y\') as holiday_date_str,holiday_name'
                . ' from holiday ' . $where . ' order by holiday_date asc');
       //echo $this->db->last_query();die;
        $result = $query->result();
        if ($query->num_rows() == 0) {
            return false;
        } else {
            return $result;
        }
    }

}
