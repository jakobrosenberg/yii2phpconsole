<?php
/**
 * Created by Jakob
 * Date: 18-11-13
 * Time: 23:41
 */

namespace Simpletree\Phpconsole;
use PC;

class Phpconsole extends \yii\base\Component{

    private $_connector;

    public $registerGlobal = true;
    public $password = '1234';

    public function init()
    {
        $_connector = \PhpConsole\Connector::getInstance();

        if($this->registerGlobal){
            \PhpConsole\Helper::register($_connector);
        }

        if($this->password){
            $_connector->setPassword($this->password);
        }
    }

    public function getConnector()
    {
        return $this->_connector;
    }
} 