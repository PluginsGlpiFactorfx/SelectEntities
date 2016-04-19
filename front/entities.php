<?php
/**
@package   selectentities
@author    Gilles Dubois, Valentin Deville
@copyright Copyright (c) 2010-2015 FactorFX
@license   AGPL License 3.0 or (at your option) any later version http://www.gnu.org/licenses/agpl-3.0-standalone.html
@link      https://www.factorfx.com
@since     2015

--------------------------------------------------------------------------
 */

include("../../../inc/includes.php");

/**
 *
 */
function add_select(){
	
	echo "<table class='tab_cadre_fixe' id='TabEnt'>";
	echo "<th>Selectionner entitée</th>";
	echo "<tr><td><center>";
	Dropdown::show('Entity', array(
			'name' => 'tabs_entities',
			'on_change' => "removeAndRefresh();",
	));
	echo "</center></td></tr>";
	echo "</table>";
	

}

add_select();

?>
