# Gateway Wrapper for IMVU #

Gateway Wrapper for IMVU is a wrapper that will make it easier to access the IMVU XMLRPC API. I personally use this API for my webstore [Toyz Store](http:/toyzstore.net). 

Currently the API supprots the following Methods

    GetMethodList()
    GetMethodHelpInfo($methodName)
    GetUserID($username)
    AvatarExist($username)
    GetUserInformation($username)
    GiveCreditsAndProducts($transactionID, $CreditAmount, $ToUsername, $Products)
    GetCreditBalance($WithPromo)

## To use these is very simple ##

**Step 1**

You need to include the **IMVUXML.php** into your config.php and then create a instance of **IMVUXML**

    include("IMVUXML.php");
    $imvu = new IMVUXML("", {imvu username}, {imvu password);

**Step 2**

Once you include **IMVUXML.php** and create a instance of it all you got to do is call the function you want to call. A example of that is below

## Example ##

### Getting Gateway Methods ###
Returns as **Array**

    $iarray = $imvu->GetMethodList();
    print_r($iarray);

### Getting All Gateway Method's help files ###
Returns as **String**

Param **$methodName** is a **string**

    $iarray = $imvu->GetMethodList();
    for($i=0;$i<count($iarray);$i++)
    {
      echo $iarray[$i]."-> ".$imvu->GetMethodHelpInfo($iarray[$i])."<br />;
    }
    
### Getting User ID and User Info ###
UserID returns as **int**

    echo $imvu->GetUserID("Toyz");
    
User Info Returns as **Array**

    print_r($imvu->GetUserInformation("Toyz"));
    
### Check if user exist ###
Returns as **int**

1 = User Exist

0 = User Doesn't exist

    echo $imvu->AvatarExist("Toyz");

### Check Credit Balance ###
Returns as **int**

Param **$WithPromo** is **Boolean**

    echo $imvu->GetCreditBalance(true);
    
### Send Credits/Products ###
Returns as **Array**

Param **$transactionID** has to be a Unique String

Param **$CreditAmount** is a **int**

Param **$ToUsername** is a **String** (User whos getting said Credits/Items)

Param **$Products** is a **Array** (Can be empty)

    echo $imvu->GiveCreditsAndProducts("sdfhdslhfdasjlhfadskj", 10000, "Toyz", NULL);
    
    
