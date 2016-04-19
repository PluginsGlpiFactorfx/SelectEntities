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

function plugin_init_selectentities() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['add_javascript']['selectentities'] = array("js/entities.js");

    $PLUGIN_HOOKS['post_prepareadd']['selectentities'] = array(
        'Ticket'           => array('PluginSelectentitiesTicket', 'beforeAddTicket'),
   );

   $PLUGIN_HOOKS['csrf_compliant']['selectentities'] = true;

}

function plugin_version_selectentities() {

   return array('name'           => __('SelectEntities', 'selectentities'),
                'version'        => '1.0',
                'license'        => 'AGPLv3+',
                'author'         => 'Gilles Dubois, Valentin Deville',
                'homepage'       => 'http://factorfx.com',
                'minGlpiVersion' => '0.90');
}

function plugin_selectentities_check_prerequisites() {

   if (version_compare(GLPI_VERSION,'0.90','lt') || version_compare(GLPI_VERSION,'0.91','ge')) {
      echo "This plugin requires GLPI >= 0.90";
      return false;
   }
   return true;
}


function plugin_selectentities_check_config($verbose=false) {
   return true;
}
