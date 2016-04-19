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

class PluginSelectentitiesConfig extends CommonDBTM {

   static $rightname         = 'config';

   static function canCreate() {
      return Session::haveRight('config', UPDATE);
   }

   static function canView() {
      return Session::haveRight('config', READ);
   }

   static function getTypeName($nb=0) {
      return __('Setup');
   }

   function getName($with_comment=0) {
      return __('Selectentities', 'selectentities');
   }

   static function install(Migration $mig) {
      return true;
   }

   static function uninstall() {
      return true;
   }
}
