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


function plugin_selectentities_install() {

   $migration = new Migration(180);

   // No autoload when plugin is not activated
   require 'inc/config.class.php';
   PluginSelectentitiesConfig::install($migration);

   $migration->executeMigration();

   return true;
}


function plugin_selectentities_uninstall() {

   // No autoload when plugin is not activated
   require 'inc/config.class.php';

   return PluginSelectentitiesConfig::uninstall();
}
