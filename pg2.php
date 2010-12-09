  <div class="col1">
    <table align="center" margin-top=10px class="form" border=0>
      <FORM METHOD="POST" ACTION="sendtodb.php">
        <TR>
          <TD align=right>First Name:</TD>
          <TD><INPUT NAME="fName" SIZE="35"></TD>
          </TR>
	<TR>
	  <TD align=right>Last Name:</TD>
	  <TD><INPUT NAME="lName" SIZE="35"></TD>
	</TR>  
        <TR>
          <TD align=right>Upline:</TD>
          <TD><INPUT NAME="upline" SIZE="35"></TD>
          </TR>
        <TR>
          <TD align=right>Attending:</TD>
          <TD><input type="checkbox" NAME="attending" value="One" />One<input type="checkbox" Name="attending" value="Two" />Two</TD>
          </TR>
        <TR>
          <TD align=right>Email:</TD>
          <TD><INPUT NAME="email" SIZE="35"></TD>
          </TR>
        <TR>
          <TD colspan=2 align="center"><INPUT TYPE="SUBMIT" VALUE="SUBMIT" ALIGN="MIDDLE"></TD>
          </TR>
        </FORM>
    </table>
    <p class="importPara">Reminder: Cost is $7 per person. Send Payment by December 3rd.</p>
  </div>
  <div class ="col1">
       <h1>Registration</h1>
       <p>Ladies, please fill in the information to the left to register for our Christmas PARTY! Be sure to mark  how many will be attending. Can't wait to see you there.</p>
  </div>

<?php
   $x= $_GET['a'];
   echo $x;
?>
