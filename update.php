<?php
include "header.php";
include("sec.php");
include "consdb.php";

$id = $_POST['id'];

db_connect();

$query=mysql_query("select * from teammembers where id=".$id.";");

while($row=mysql_fetch_array($query)){

$fname = $row["fName"];

$lname = $row["lName"];

$upline = $row["upline"];

$attending = $row["attending"];

$email = $row["email"];

}

?>
<table border=0>

	<FORM METHOD="POST" ACTION="edit.php">



	      <TR>

		<TD align=right>First Name</TD>

		    <TD><INPUT NAME="fName" SIZE="50" value="<?php echo $fname;?>"></TD></TR>

		    	       <TR>

				<TD align=right>Last Name</TD>

				    <TD><INPUT NAME="lName" SIZE="50" value="<?php echo $lname;?>"></TD></TR>


				    	       <TR>

						<TD align=right>Upline</TD>

						    <TD><INPUT NAME="upline" SIZE="50" value="<?php echo $upline;?>"></TD></TR>
						    	       
								
									<TR>

										<TD align=right>Number Attending</TD>

										    <TD><INPUT NAME="attending" SIZE="20" value="<?php echo $attending;?>"></TD></TR>
										    	       

												<TR>

													<TD align=right>E-mail</TD>

													    <TD><INPUT NAME="email" SIZE="50" value="<?php echo $email;?>">

													    	       </TD>

															</TR>

															 <TR>

															  <TD align=right><FONT COLOR="#FF0000">NOTE:</FONT></TD>

															      <TD>E-mail address is required for a response.</TD>

															      		 </TR>

																	  <tr>

																	   <td colspan=2 align=center>
																	       
																	        <input type="hidden" name="id" value="<?php echo $_POST['id']; ?>">

																		       <INPUT TYPE="SUBMIT" VALUE="Submit" ALIGN="MIDDLE"><INPUT TYPE="RESET" NAME="reset" VALUE="Clear all fields" ALIGN="MIDDLE">



																		       	      </FORM>

																			      </table>
<?php
include "footer.php";
?>
