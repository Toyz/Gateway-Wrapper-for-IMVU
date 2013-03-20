<?php
class IMVUXML{
    /*Config*/
    public $PluginPath;
    /*End Config*/
    protected $Username;
    protected $Password;
    
    protected $imvu;
    
    function __construct($path, $username, $password) {
        $this->PluginPath = $_SERVER['DOCUMENT_ROOT']."\\plugins\\";
        include($this->PluginPath."IXR_Library.php");
        $this->imvu = new IXR_Client('https://secure.imvu.com/api/xmlrpc/gateway.php');
        $this->Username = $username;
        $this->Password = $password;
    }

    function GetMethodList()
    {
        $this->imvu->query('system.listMethods');
        
        return $this->imvu->getResponse();
    }
    
    function GetMethodHelpInfo($methodName)
    {
        $this->imvu->query('system.methodHelp', $methodName);
        
        return $this->imvu->getResponse();
    }
    
    function GetUserID($username)
    {
        $this->imvu->query('gateway.getUserIdForAvatarName', $username);
        
        return $this->imvu->getResponse();
    }
    
    function AvatarExist($username)
    {
        $this->imvu->query('gateway.validateAvatarName', $username);
        
        return $this->imvu->getResponse();
    }
    
    function GetUserInformation($username)
    {
        $this->imvu->query('gateway.getUserInfo', $this->Username, $this->Password, self::GetUserID($username));
        
        return $this->imvu->getResponse();
    }
}
?>
