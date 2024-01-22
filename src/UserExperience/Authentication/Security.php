<?php

namespace App\UserExperience\Authentication;

use App\Core\App;
use App\Core\Base\Model;

/**
 * Description of Security
 *
 * @author Se Bo
 */
class Security extends App {
    
    protected $model;

    public $error;
    
    public $success;

    public function __construct() {
        parent::__construct();
        
        $this->model = new Model();
        $this->oldTokensCleaning();
    }
    
    /**
     * Delete old not valid tokens
     */
    protected function oldTokensCleaning() {
        $datetime = $this->getDateTime();
        // Delete token from batabase
        $this->model->execute("DELETE FROM `tokens` WHERE `end` < :time", [':time' => $datetime->format('Y-m-d H:i:s')]);
    }
}
