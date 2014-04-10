<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>File Upload</title>
</head>

<body>
<?php 
  if(isset($_POST["Import"]))
  {
      //First we need to make a connection with the database
      $host='localhost'; // Host Name.
      $db_user= 'root'; //User Name
      $db_password= '';
      $db= 'sathish'; // Database Name.
      $conn=mysql_connect($host,$db_user,$db_password) or die (mysql_error());
      mysql_select_db($db) or die (mysql_error());
      $filename=$_FILES["file"]["tmp_name"];
      if($_FILES["file"]["size"] > 0)
      {
          if (($getfile = fopen($filename, "r")) !== FALSE) 
		  { 
        	$data = fgetcsv($getfile, 1000, ",");
        	while (($data = fgetcsv($getfile, 1000, ",")) !== FALSE) {
         	$num = count($data); 
		   	for ($c=0; $c < $num; $c++) 
			{
			   $result = $data; 
			   $str = implode(",", $result); 
			   $slice = explode(",", $str);
			   $col1 = $slice[0]; 
			   $col2 = $slice[1];
			   $col3 = $slice[2]; 
			   $col4 = $slice[3]; 
			   $col5 = $slice[4]; 
			   $col6 = $slice[5]; 
			   $col7 = $slice[6]; 
			   $col8 = $slice[7]; 
			   $col9 = $slice[8]; 
			   $col10 = $slice[9]; 
			   $col11 = $slice[10]; 
			   $col12 = $slice[11]; 
			   $col13 = $slice[12]; 
			   $col14 = $slice[13]; 
			   $col15 = $slice[14]; 
			   $col16 = $slice[15]; 
			   $col17 = $slice[16]; 
			   $col18 = $slice[17]; 
			   $col19 = $slice[18]; 
			   $col20 = $slice[19]; 
			   $col21 = $slice[20]; 
  
			  // SQL Query to insert data into DataBase
  
			  $query = "INSERT INTO emp(emp_id,emp_name,branch,dt_of_join,bank_acc_no,bank_name,designation,emp_dep,asm,pf_no,esi_no,basic,utilty_allow,communication,mt_allow,spl_allow,house_rnt_allow,child_hstl_allow,project_allow,email,mobile)
  VALUES('".$col1."','".$col2."','".$col3."','".$col4."','".$col5."','".$col6."','".$col7."','".$col8."','".$col9."','".$col10."','".$col11."','".$col12."','".$col13."','".$col14."','".$col15."','".$col16."','".$col17."','".$col18."','".$col19."','".$col20."','".$col21."')";
  
			  mysql_query($query); 
		   }
		  } 
		}
		echo 'CSV File has been successfully Imported';
	 }
      else
          echo 'Invalid File:Please Upload CSV File';
	}
?>
</body>
</html>