if (in_array($UserName, $arrUsers)) { 
      $isValid = true; 
    } 
    // Or, you may restrict access to only certain users based on their username. 
    if (in_array($UserGroup, $arrGroups)) { 
      $isValid = true; 
    } 
    if (($strUsers == "") && true) { 
      $isValid = true; 
    } 
  } 
  return $isValid; 
}

$MM_restrictGoTo = "login.php";
if (!((isset($_SESSION['MM_Username'])) && (isAuthorized("",$MM_authorizedUsers, $_SESSION['MM_Username'], $_SESSION['MM_UserGroup'])))) {   
  $MM_qsChar = "?";
  $MM_referrer = $_SERVER['PHP_SELF'];
  if (strpos($MM_restrictGoTo, "?")) $MM_qsChar = "&";
  if (isset($QUERY_STRING) && strlen($QUERY_STRING) > 0) 
  $MM_referrer .= "?" . $QUERY_STRING;
  $MM_restrictGoTo = $MM_restrictGoTo. $MM_qsChar . "accesscheck=" . urlencode($MM_referrer);
  header("Location: ". $MM_restrictGoTo); 
  exit;
}
?>

<?php
    require_once('Connections/speedycms.php');

    $client_id = mysql_real_escape_string($_GET['id']); 

    $con = mysql_connect($hostname_speedycms, $username_speedycms, $password_speedycms);

if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("speedycms") or die(mysql_error());
?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

if ((isset($_GET['id'])) && ($_GET['id'] != "") && (isset($_POST['deleteForm']))) {
  $deleteSQL = sprintf("DELETE FROM tbl_accident WHERE id=%s",
                       GetSQLValueString($_GET['id'], "int"));

  mysql_select_db($database_speedycms, $speedycms);
  $Result1 = mysql_query($deleteSQL, $speedycms) or die(mysql_error());

  $deleteGoTo = "progress.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}

mysql_select_db($database_speedycms, $speedycms);
$query_delete = "SELECT * FROM tbl_accident  WHERE id=$client_id";
$delete = mysql_query($query_delete, $speedycms) or die(mysql_error());
$row_delete = mysql_fetch_assoc($delete);
$totalRows_delete = mysql_num_rows($delete);
?>

<p class="form2">Are you sure you wish to <b>delete</b> the record for <?php echo $row_delete['clientName']; ?>?</p>
                <form name="form" method="POST" action="<?php echo $deleteAction; ?>">
            <p class="form2"><input type="submit" value="Yes" />
              <input name="no" type="button" id="no" value="No" />
            </p>
                              <input type="hidden" name="deleteForm" value="form" />
        </form> 