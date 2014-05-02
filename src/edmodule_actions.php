<?php
/**
* Action dispatcher modification module
*
* @copyright 2002-2009 by papaya Software GmbH - All rights reserved.
* @link http://www.papaya-cms.com/
* @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public License, version 2
*
* You can redistribute and/or modify this script under the terms of the GNU General Public
* License (GPL) version 2, provided that the copyright and license notes, including these
* lines, remain unmodified. papaya is distributed in the hope that it will be useful, but
* WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
* FOR A PARTICULAR PURPOSE.
*
* @package Papaya-Modules
* @subpackage Free-Actions
* @version $Id: edmodule_actions.php 39581 2014-03-17 10:51:35Z weinert $
*/

/**
* Action dispatcher modification module
*
* Action dispatcher administration
*
* @package Papaya-Modules
* @subpackage Free-Actions
*/
class edmodule_actions extends base_module {
  /**
  * Plugin option fields
  * @var array $pluginOptionFields
  */
  var $pluginOptionFields = array(
    'AUTO_REGISTER_ACTIONS' => array(
      'Register actions on call', 'isNum', TRUE, 'yesno', NULL, '', 0
    )
  );

  /**
  * Permissions
  * @var array $permissions
  */
  var $permissions = array(
    1 => 'Manage'
  );

  /**
  * Execute module
  *
  * @access public
  */
  function execModule() {
    if ($this->hasPerm(1, TRUE)) {
      $actions = new admin_actions();
      $actions->module = $this;
      $actions->layout = $this->layout;
      $actions->execute();
      $actions->getXML($this->layout);
      $actions->getButtons();
    }
  }
}

