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

    function GetCreditBalance($WithPromo)
    {
        if($WithPromo)
        {
            $this->imvu->query('gateway.checkBalance2', $this->Username, $this->Password);
        }else{
            $this->imvu->query('gateway.checkBalance', $this->Username, $this->Password);
        }
        
        return $this->imvu->getResponse();
    }

    function GiveCreditsAndProducts($transactionID, $CreditAmount, $ToUsername, $Products)
    {
        $this->imvu->query('gateway.giveCreditsAndProducts2', $transactionID, $this->Username, $this->Password, $ToUsername, $CreditAmount, $Products);
        
        return $this->imvu->getResponse();
    }

    function GetProductInfo($PID)
    {
        $this->imvu->query('gateway.getProductInfo', $this->Username, $this->Password, $PID);
        
        return $this->imvu->getResponse();
    }
    
    function GetCatagories($Start_Row, $End_Row)
    {
        $this->imvu->query('gateway.getCategories', $this->Username, $this->Password, $Start_Row, $End_Row);
        
        return $this->imvu->getResponse();
    }
}
?>
