
<?php
/*

*	File:			studentSave.php
*	By:			TMIT
*	Date:		2010-06-01
*
*	This script collects data from studentCreate.php
*	and processes it
*
*
*=====================================
*/

{ 		//	Secure Connection Script
		$dbSuccess = false;
		$dbConnected = mysql_connect('localhost','root','');
		
		if ($dbConnected) {		
			$dbSelected = mysql_select_db('tpc',$dbConnected);
			if ($dbSelected) {
				$dbSuccess = true;
			} 	
		}
		//	END	Secure Connection Script
}

if ($dbSuccess) {
		
		{  //   collect the data with $_POST
		
			$Name = $_POST["name"];	
			$rollno = $_POST["rollno"];	
			$email = $_POST["email"];	
			$mobile = $_POST["mobile"];
			$programme = $_POST["programme"];
			$cpi = $_POST["cpi"];	
		}
			
		{  //   SQL:     $tCompany_SQLinsert	
		
			$tCompany_SQLinsert = "INSERT INTO students (";			
			$tCompany_SQLinsert .=  "name, ";
			$tCompany_SQLinsert .=  "rollno, ";
			$tCompany_SQLinsert .=  "email, ";
			$tCompany_SQLinsert .=  "mobileNo, ";
			$tCompany_SQLinsert .=  "programme, ";
			$tCompany_SQLinsert .=  "cpi ";
			$tCompany_SQLinsert .=  ") ";
			
			$tCompany_SQLinsert .=  "VALUES (";
			$tCompany_SQLinsert .=  "'".$Name."', ";
			$tCompany_SQLinsert .=  "'".$rollno."', ";
			$tCompany_SQLinsert .=  "'".$email."', ";
			$tCompany_SQLinsert .=  "'".$mobile."', ";
			$tCompany_SQLinsert .=  "'".$programme."', ";
			$tCompany_SQLinsert .=  "'".$cpi."' ";
			$tCompany_SQLinsert .=  ") ";
		}
		
		{	//		check the data and process it 
			
			if (empty($Name)) {
				echo '<span style="color:red; ">Cannot add student with no name.</span><br /><br />'; 
			} else {
					echo '<span style = "text-decoration: underline;">
							SQL statement:</span>
							<br />'.$tCompany_SQLinsert.'<br /><br />';
							
					if (mysql_query($tCompany_SQLinsert))  {	
						echo 'used to Successfully add new student.<br /><br />';
					} else {
						echo '<span style="color:red; ">FAILED to add new company.</span><br /><br />';
						
					}	
			}
		}

}

echo "<br /><hr /><br />";

echo '<a href="studentCreate.html">Create another student</a>';
echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
echo '<a href="../index.php">Quit - to homepage</a>';

?>