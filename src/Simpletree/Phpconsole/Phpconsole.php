<?php
/**
 * Created by Jakob
 * Date: 18-11-13
 * Time: 23:41
 */

namespace Simpletree\Phpconsole;
use PC;

/**
 * Class Phpconsole
 * @package Simpletree\Phpconsole
 * @var PhpConsole\Connector $connector
 * @var PhpConsole\Handler $handler
 */
class Phpconsole extends \yii\base\Component{

    private $_connector;
    private $_handler;

    public $registerGlobal = true;
    public $password = '1234';
    public $publicKeyByIp = true;
    public $enableSslOnlyMode = false;
    public $allowedIpMasks = [];
    public $sourceBasePath;
    public $serverEncoding;

    public function init()
    {
        $this->_connector = \PhpConsole\Connector::getInstance();
        $this->_handler = \PhpConsole\Handler::getInstance();

        if($this->registerGlobal){
            \PhpConsole\Helper::register($this->_connector);
        }

        if($this->password){
            if(is_array($this->password)){
                list($this->password, $this->publicKeyByIp) = $this->password;
            }
            $this->_connector->setPassword($this->password, $this->publicKeyByIp);
        }

        if($this->enableSslOnlyMode){
            $this->_connector->enableSslOnlyMode();
        }

        if($this->allowedIpMasks){
            $this->_connector->setAllowedIpMasks($this->allowedIpMasks);
        }

        if($this->sourceBasePath){
            $connector->setSourcesBasePath($this->sourceBasePath);
        }

        if($this->serverEncoding){
            $connector->setServerEncoding($this->serverEncdoding);
        }
    }

    /**
     * @return mixed
     */
    public function getConnector()
    {
        return $this->_connector;
    }

    /**
     * @return mixed
     */
    public function getHandler()
    {
        return $this->_handler;
    }
} 