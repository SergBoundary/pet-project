<?php

namespace core;

use core\Db;
//use vendor\core\App;

/**
 * Description of Model
 *
 * @author Serge Boundary
 */
class Model {
    
    protected $pdo;
    
    protected $table;


    public function __construct() {
        $this->pdo = Db::instance();
    }
    
    public function execute($sql, $param) {
        return $this->pdo->execute($sql, $param);
    }
    
    public function query($sql, $param) {
        return $this->pdo->query($sql, $param);
    }
    
    public function getAuthorIdFromUrl($url) {
        $sql = "SELECT `id` FROM `authors` WHERE `url` = :url LIMIT 1";
        $res = $this->pdo->query($sql, [':url' => $url]);
        if ($res) {
            return $res[0]['id'];
        }
        return false;
    }
}
