<?php

namespace core;

/**
 * Description of TSinglton
 *
 * @author Serge Boundary
 */
trait TSingletone {
    
    protected static $instance;
    
    public static function instance() {
        if(self::$instance === null){
            self::$instance = new self;
        }
        return self::$instance;
    }
    
}
