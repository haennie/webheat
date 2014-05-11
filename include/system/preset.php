<?php

class preset {
    public $id;
    public $priority;
    public $start_time;
    public $end_time;
    public $rel_user_id;
    public $active;
    public $temp;
    public $created;
    public $days;
    public $days_translated;
    public $name;
    private $db_parameters = array(
        'id', 'priority', 'start_time', 'end_time', 'rel_user_id', 'active', 'temp', 'created', 'days', 'name'
    );
    
    function fetch($id) {
        $query = $GLOBALS['db']->db_query("SELECT * FROM presets WHERE id = '$id'");
        
        $result = $GLOBALS['db']->db_fetch($query);
        
        foreach($result as $name => $value) {
            $this->$name = $value;
        }
        $this->cut_time();
        $this->translate_days();
    }
    function fetch_all_ids() {
        $query = $GLOBALS['db']->db_query("SELECT id FROM presets");
        
        while($row = $GLOBALS['db']->db_fetch($query)) {
            $ret_array[] = $row['id'];
        }
        return $ret_array;
    }
    
    //translate day numbers into weekdays
    
    function translate_days() {
        global $lbl_string;
        
        $days_array = explode(',', $this->days);
        foreach($days_array as $number) {
            
            if ($number == 1) $mon = $lbl_string['LBL_MON'].', ';
            else if ($number == 2) $tue = $lbl_string['LBL_TUE'].', ';
            else if ($number == 3) $wed = $lbl_string['LBL_WED'].', ';
            else if ($number == 4) $thu = $lbl_string['LBL_THU'].', ';
            else if ($number == 5) $fri = $lbl_string['LBL_FRI'].', ';
            else if ($number == 6) $sat = $lbl_string['LBL_SAT'].', ';
            else if ($number == 7) $sun = $lbl_string['LBL_SUN'].', ';

        }
        $this->days_translated = substr($mon.$tue.$wed.$thu.$fri.$sat.$sun, 0, -2);
        
        
    }
    
    //cut time valaues
    function cut_time() {

        $this->start_time = substr($this->start_time, 0, -3);
        $this->end_time = substr($this->end_time, 0, -3);
    }
    
    function save() {
        
        $this->active = 1;
        if (empty($this->id)) $this->id = uniqid('', true);
        if (empty($this->rel_user_id)) $this->rel_user_id = $_SESSION['name'];
        if (empty($this->created)) $this->created = date("Y-m-d H:m:s");
        if (is_array($this->days)) {
            foreach($this->days as $day) {
                $days .= "$day,";
            }
            $this->days = substr($days, 0, -1);
        }
        
        
        $name_string = "(";
        $value_string = "(";
        
        foreach ($this as $name => $value) {
            if(in_array($name, $this->db_parameters)) {
                $name_string .= "$name, ";
                $value_string .= "'$value', ";    
            }
            
        }
        
        $name_string = substr($name_string,0 , -2).')';
        $value_string = substr($value_string,0 , -2).')';
        
        $query = "INSERT INTO presets $name_string VALUES $value_string";
        $GLOBALS['db']->db_query($query);
    }
    
}
