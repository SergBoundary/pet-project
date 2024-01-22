<?php

namespace App\UserExperience\Authentication;

use App\UserExperience\Authentication\Security;

/**
 * Description of Token
 *
 * @author Se Bo
 */
class Token extends Security {

    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Create token end write token into session
     * 
     * @return string
     */
    public function get() {
        // Get the current date and time
        $datetime = $this->getDateTime();
        // Create a date and time variable for the ending new token
        $datetime->add(new \DateInterval("P".self::$configSys['Safety']['Tokens']['IntervalDays']."DT".self::$configSys['Safety']['Tokens']['IntervalHours']."H".self::$configSys['Safety']['Tokens']['IntervalMinutes']."M"));
        // Create session name and token id
        $token['session'] = bin2hex(random_bytes(8));
        $token['token'] = bin2hex(random_bytes(32));
        // Write token into session
        $_SESSION[$token['session']] = $token['token'];
        // Write token into batabase
        $res = $this->model->execute("INSERT INTO tokens(session, token, end) VALUES (:session, :token, :time)", [':session' => $token['session'], ':token' => $token['token'], ':time' => $datetime->format('Y-m-d H:i:s')]);
        
        return $token;
    }
}
