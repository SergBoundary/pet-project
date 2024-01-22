<?php

namespace App\UserExperience\Authentication;

use App\UserExperience\Authentication\Security;

/**
 * Description of Validation
 *
 * @author Se Bo
 */
class Validation extends Security {
    
    protected $lMin, $lMax;
    
    protected $pMin, $pMax;

    public function __construct() {
        parent::__construct();
        
        $this->lMin= self::$configSys['Safety']['Rules']['LoginMin'];
        $this->lMax= self::$configSys['Safety']['Rules']['LoginMax'];
        
        $this->pMin= self::$configSys['Safety']['Rules']['PasswordMin'];
        $this->pMax= self::$configSys['Safety']['Rules']['PasswordMax'];
    }
    
    /**
     * Validate that a token contains only hex-alpha-numeric characters
     * 
     * @param type $str
     * @return boolean
     */    
    public function token($str) {
        if(!isset($str) || !is_string($str)) {
            return FALSE;
        }
        
        return preg_match('/^([a-f0-9])+$/i', $str);
    }
    
    /**
     * Validate that a login contains only alpha-numeric characters
     * 
     * @param type $str
     * @return boolean
     */    
    public function login($str) {
        if(!isset($str) || !is_string($str)) {
            return FALSE;
        }
        
        $str=stripcslashes($str);
        $str=strip_tags($str);
        
        if (strlen($str) >= $this->lMin && strlen($str) <= $this->lMax) {
            return preg_match('/^([-a-z0-9_+*~])+$/i', $str);
        } else {
            $this->error .= '<div class="alert-danger">Not format length login.<button type="button" class="alert-close">x</button></div>';
        }
        
        return FALSE;
    }

    /**
     * Validate that a password contains only alpha-numeric characters
     * 
     * @param type $str
     * @return boolean
     */  
    public function password($str) {
        if(!isset($str) || !is_string($str)) {
            return FALSE;
        }
        
        $str=stripcslashes($str);
        $str=strip_tags($str);
        
        if (strlen($str) >= $this->pMin && strlen($str) <= $this->pMax) {
            return preg_match('/^([-a-z0-9_+*~!,\.])+$/i', $str);
        } else {
            $this->error .= '<div class="alert-danger">Not format length password.<button type="button" class="alert-close">x</button></div>';
        }
        
        return FALSE;
    }

    /**
     * Validate that a username contains only alpha-numeric characters
     * 
     * @param type $str
     * @return boolean
     */  
    public function username($str) {
        if(!isset($str) || !is_string($str)) {
            return FALSE;
        }
        
        return preg_match('/^([-a-z0-9_\.])+$/i', $str);
    }

    /**
     * Validate that a email is a valid e-mail address
     * 
     * @param type $str
     * @return boolean
     */
    public function email($str) {
        if(!isset($str) || !is_string($str)) {
            return FALSE;
        }
        
        return filter_var($str, \FILTER_VALIDATE_EMAIL);
    }
}
