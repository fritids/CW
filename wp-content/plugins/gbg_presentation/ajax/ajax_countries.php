<?php 
require('../../../../wp-load.php' );
require_once('../include/func.php' );

$countriesContent = (int)$_REQUEST['cont'];

  switch($countriesContent) {
    case 1:
		echo '<ul>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(10)">Algeria</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(11)">Angola</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(12)">Benin</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(13)">Botswana</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(14)">Burkina</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(15)">Burundi</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(16)">Cameroon</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(17)">Cape Verde</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(18)">Central African Republic</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(19)">Chad</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(110)">Comoros</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(111)">Congo Republic</a></li>
			</ul>';
		break;
	 case 2:
		echo '<ul>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(20)">Afghanistan</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(21)">Armenia</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(22)">Azerbaijan</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(23)">Bahrain</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(24)">Bangladesh</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(25)">Bhutan</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(26)">Brunei Darussalam</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(27)">Burma</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(28)">Cambodia</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(29)">China</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(210)">East Timor</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(211)">Gaza Strip</a></li>
			</ul>';
		break;
    case 3:
		echo '<ul>
			<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(30)">Belgium</a></li>
			<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(31)">Denmark</a></li>
			<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(32)">England</a></li>
			<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(33)">France</a></li>
			<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(34)">Germany</a></li>
			<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(35)">Greece</a></li>
			<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(36)">Italy</a></li>
			<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(37)">Russia</a></li>
			<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(38)">Spain</a></li>
			<li><a href="javascript:afficher_group(39)" style="cursor: pointer;">Sweden</a></li>
			<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(310)">Croatia</a></li>
			<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(311)">Estonia</a></li>
		</ul>';
		break;
	 case 4:
		echo '<ul>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(40)">Anguilla</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(41)">Aruba</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(42)">Bahamas</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(43)">Barbados</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(44)">Belize</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(45)">Bermuda</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(46)">Canada</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(47)">Cayman Islands</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(48)">Costa Rica</a></li>
			</ul>';
		break;
	 case 5:
		echo '<ul>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(50)">Argentina</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(51)">Bolivia</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(52)">Chile</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(53)">Colombia</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(54)">Ecuador</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(55)">French Guiana</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(56)">Falkland Islands</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(57)">Guyana</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(58)">Islas Malvinas</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(59)">Paraguay </a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(510)">Peru</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(511)">Suriname</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(512)">Uruguay</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(513)">Venezuela</a></li>
			</ul>';
		break;
	 case 6:
		echo '<ul>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(60)">Australia</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(61)">Fiji</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(62)">Kiribati</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(63)">Marshall Islands</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(64)">Micronesia</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(65)">Nauru</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(66)">New Zealand</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(67)">Palau</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(68)">Papua New Guinea</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(69)">Samoa, Western </a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(610)">Samoa US</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(611)">Salomon Islands</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(612)">Tonga</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(613)">Tuvalu</a></li>
				<li><a style="cursor: pointer; color: #999999;" onclick="loadGroupsContent(614)">Vanuatu</a></li>
			</ul>';
		break;
	default:
      echo 'In this demo version you can only select Europe and Sweden.';
	   }		
?>
