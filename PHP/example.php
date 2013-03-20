<?php
include("IMVUXML.php");
$imvu = new IMVUXML();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>Gateway Wrapper for IMVU Examples</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="menu">
<ul>
<li><a href="?help">Method List/Help Example</a></li>
<li><a href="?uinfo">UserID & User Info</a></li>
<div class="clearFloat"></div>
</ul>
</div>

    <div style="padding-left: 30px;">
<?php 
if(isset($_GET["help"]))
{ ?>
    <h1 style='font-size: 20px'>Gateway Get Method List</h1><br />
        <span style="font-size: 15px">
    Returns as <strong>Array</strong><br />
    Method Call <strong>$imvu->GetMethodList();</strong>
   <p style="font-size: 15px"><strong>Output</strong></p>
        </span>
    <?php
    $d = $imvu->GetMethodList();
    for($i= 0;$i<count($d);$i++)
    {
        echo $d[$i]."-> ".$imvu->GetMethodHelpInfo($d[$i])."<br />";
    }
}
if(isset($_GET["uinfo"]))
{?>
    <h1 style='font-size: 20px'>Gateway Get Method List</h1><br />
        <span style="font-size: 15px">
    Returns as <strong>Array</strong><br />
    Method Call UserID<strong>$imvu->GetUserID($username);</strong>
        </span>
    <p style="font-size: 15px"><strong>UserID Output</strong></p>
<?php
    echo "Toyz UserID: ".$imvu->GetUserID("Toyz");
    ?>
    <br /><br /><br />        <span style="font-size: 15px">
    
    Method Call UserID<strong>$imvu->GetUserInformation($username);</strong>
    <br />
    Requres <Strong>$imvu = new IMVUXML("", {Your Username}, {Your Password});</Strong>
        </span>
    <?php
}
?>
    </div>
</body>
</html>