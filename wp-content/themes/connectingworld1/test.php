//
//Create login area, replace the phpBB2 in /phpBB2/login.php with your forum's //directory
//
<form action="/phpBB2/login.php" method="post" target="_top">

<table width="25%" cellspacing="2" cellpadding="2" border="0" align="center">
  <tr>
        <td align="left" class="nav"><a href="/phpBB2/index.php" class="nav">Prank Place Forum Index</a></td>

  </tr>
</table>

<table width="25%" cellpadding="4" cellspacing="1" border="0" class="forumline" align="center">
  <tr>
        <th height="25" class="thHead" nowrap="nowrap">Please enter your username and password to log in.</th>
  </tr>
  <tr>
        <td class="row1"><table border="0" cellpadding="3" cellspacing="1" width="100%">
    <tr>

        <td colspan="2" align="center">&nbsp;</td>
    </tr>
    <tr>
        <td width="11%" align="right"><span class="gen">Username:</span></td>
        <td>
     <input type="text" class="post" name="username" size="25" maxlength="40" value="" />
        </td>
    </tr>

    <tr>
        <td align="right"><span class="gen">Password:</span></td>
        <td>
     <input type="password" class="post" name="password" size="25" maxlength="32" />
        </td>
    </tr>
    <tr align="center">
        <td colspan="2"><span class="gen">Log me on automatically each visit: <input type="checkbox" name="autologin" /></span></td>

    </tr>
    <tr align="center">
        <td colspan="2"><input type="hidden" name="redirect" value="" /><input type="submit" name="login" class="mainoption" value="Log in" /></td>
    </tr>
    <tr align="center">
        <td colspan="2"><span class="gensmall"><a href="profile.php?mode=sendpassword" class="gensmall">I forgot my password</a></span></td>
    </tr>
  </table></td>

  </tr>
</table>

</form>