<?php

namespace App\Core\Base;

/**
 * Description of View
 *
 * @author Serge Boundary
 */
class View {
    
    public $route = [];
    
    public $layout;
    
    public $view;
    
    public function __construct($route, $layout = '', $view = '') {
      // Data from Controller
      $this->route = $route;
      if($layout === false){
          $this->layout = false;
      } else {
          if(empty($layout)) {
            $this->layout = LAYOUT.'default';
          } else {
            $this->layout = LAYOUT.$layout;
          }
      }
      $this->view = $view;
    }
    
    public function render($vars) {
//        debug('render');
//        debug('layout: '.$this->layout);
        debug('>> '.$this->view);
        if(is_array($vars)) {
            extract($vars); 
        }
        if ($this->view == "login") {
            $file_view = LOGIN.".php";
        } elseif ($this->view == "registration") {
            $file_view = REGISTRATION.".php";
        } elseif ($this->view == "confirmation") {
            $file_view = CONFIRMATION.".php";
        } else {
            if ($this->route['author'] == 'nobody') {
              if ($this->view == 'index') {
                $file_view = str_replace('\\', '/', CONTENT."{$this->route['author']}/{$this->view}");
              } else {
                $file_view = str_replace('\\', '/', CONTENT."{$this->route['author']}/{$this->route['type']}/{$this->view}");
              }
            } else {
              if ($this->view == 'index') {
                $file_view = str_replace('\\', '/', CONTENT."authors/{$this->route['author']}/{$this->view}");
              } else {
                $file_view = str_replace('\\', '/', CONTENT."authors/{$this->route['author']}/{$this->route['type']}/{$this->view}");
              }
            }
        }
//        debug($this->layout);
//        debug($this->view);
        debug($file_view);
        ob_start();
        if(is_file($file_view)) {
            require $file_view;
        } else {
            throw new \Exception("Не найден контент <b>{$file_view}</b>.", 404);
        }
        $content = ob_get_clean();
        debug($content);
        if(false !== $this->layout) {
            debug($this->layout);
            if ($this->view == "login" || $this->view == "registration" || $this->view == "confirmation") {
                $file_layout = str_replace('\\', '/', "{$this->layout}/auth.php");
            } else {
                $file_layout = str_replace('\\', '/', "{$this->layout}/index.php");
            }
            debug($file_layout);
            if(is_file($file_layout)) {
                require $file_layout;
            } else {
                throw new \Exception("Не найден шаблон <b>{$file_layout}</b>.", 404);
            }
        }
    }
}
