<?php

/*
 * This file is part of the Access to Memory (AtoM) software.
 *
 * Access to Memory (AtoM) is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * Access to Memory (AtoM) is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Access to Memory (AtoM).  If not, see <http://www.gnu.org/licenses/>.
 */

class rulaErmPluginConfiguration extends sfPluginConfiguration
{
  public static
    $summary = 'Template modification plugin by RULA for ERM pilot.',
    $version = '0.0.1';

  /**
   * @see sfPluginConfiguration
   */
  public function initialize()
  {

    // This hack lets us set the directory that AtoM looks for the sfDcPlugin! 
    // NOTE: it does not reload the configuration in the main plugin directory (sfDcPlugin/config/sfDcPluginConfiguration.php), only allows us to control functionality within the module folder.
    // the plugin file is deleted because it tries to redeclare the class on the plugins page...
    $this->configuration->setPluginPath('sfDcPlugin', $this->rootDir . '/plugins/sfDcPlugin');

    $this->dispatcher->connect('context.load_factories', array($this, 'contextLoadFactories'));
    
    $decoratorDirs = sfConfig::get('sf_decorator_dirs');
    $decoratorDirs[] = $this->rootDir.'/templates';
    sfConfig::set('sf_decorator_dirs', $decoratorDirs);

    $moduleDirs = sfConfig::get('sf_module_dirs');
    $moduleDirs[$this->rootDir.'/modules'] = false;
    sfConfig::set('sf_module_dirs', $moduleDirs);
  }
}
