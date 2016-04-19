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

class PluginSelectentitiesTicket {
	
	static function beforeAddTicket(Ticket $post){

		$post->fields['entities_id'] = $post->input['tabs_entities'];
		$post->input['entities_id']  = $post->input['tabs_entities'];

		return false;

	}
}
