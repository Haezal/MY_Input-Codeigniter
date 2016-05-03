<?php
/**
 * Created by PhpStorm.
 * User: haezal
 * Date: 5/3/2016
 * Time: 9:40 AM
 */

class MY_Input extends CI_Input {

    function __construct()
    {
        parent::__construct();
    }

    public function post($index = NULL, $xss_clean = NULL)
    {
        $string = null;
        if (is_array($_POST)) {
            foreach ($_POST as $key => $val) {
                if (is_string($val)) {

                    $string[$key] = str_replace("'", "\'", $val);
                }
            }
        } else {
            if (is_string($_POST)) {

                $string = str_replace("'", "\'", $_POST);
            }
        }

        return $this->_fetch_from_array($string, $index, $xss_clean);
    }
}