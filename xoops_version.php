<?php
/*
  ------------------------------------------------------------------------
                XOOPS - PHP Content Management System
                    Copyright (c) 2000 XOOPS.org
                       <http://www.xoops.org/>
  ------------------------------------------------------------------------
  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.

  You may not change or alter any portion of this comment or credits
  of supporting developers from this source code or any supporting
  source code which is considered copyrighted (c) material of the
  original comment or credit authors.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307 USA
 -------------------------------------------------------------------------
 Author: Raul Recio (AKA UNFOR)
 Project: The XOOPS Project
 -------------------------------------------------------------------------
 */
/**
 * XoopsPartners - a partner affiliation links module
 *
 * @category     Module
 * @package      xoopspartners
 * @subpackage   init
 * @author       Raul Recio (aka UNFOR)
 * @author       XOOPS Module Development Team
 * @copyright    {@link http://xoops.org 2001-2016 XOOPS Project}
 * @license      {@link http://www.gnu.org/licenses/gpl-2.0.html GNU Public License}
 * @link         http://xoops.org XOOPS
 */

defined('XOOPS_ROOT_PATH') || exit('Restricted access');

$moduleDirname = basename(__DIR__);

$modversion = array(
    'name'                => _MI_XPARTNERS_NAME,
    'description'         => _MI_XPARTNERS_DESC,
    'version'             => 1.12,
    'module_status'       => 'Final',
    'official'            => 0,  // 1 if maintained by XOOPS CORE Development Team
    'author'              => 'Raul Recio (unfor)',
    'credits'             => 'Mage, Mamba, ZySpec',
    'license'             => 'GNU GPL 2.0',
    'license_url'         => 'www.gnu.org/licenses/gpl-2.0.html/',
    'help'                => 'page=help',
    'image'               => 'assets/images/logoModule.png',
    'dirname'             => $moduleDirname,
    /**
     * About
     */
    'author_website_url'  => 'http://xoops.org',
    'author_website_name' => 'XOOPS',
    'module_website_url'  => 'http://xoops.org',
    'module_website_name' => 'XOOPS',
    'release_date'        => '2016/07/10',
    'min_php'             => '5.5',
    'min_xoops'           => '2.5.8',
    'min_db'              => array('mysql' => '5.0.7', 'mysqli' => '5.0.7'),
    'min_admin'           => '1.1',
    'dirmoduleadmin'      => 'Frameworks/moduleclasses',
    'icons16'             => 'Frameworks/moduleclasses/icons/16',
    'icons32'             => 'Frameworks/moduleclasses/icons/32',

    'onInstall'   => 'include/action.module.php',
    'onUpdate'    => 'include/action.module.php',
    'onUninstall' => 'include/action.module.php',
    /**
     * dB settings
     */
    // All tables should not have any prefix!
    'sqlfile'     => array('mysql' => 'sql/mysql.sql'),
    // Tables created by sql file (without prefix!)
    'tables'      => array('partners'),

    /**
     * Admin things
     */
    'hasAdmin'    => 1,
    'adminindex'  => 'admin/index.php',
    'adminmenu'   => 'admin/menu.php',

    // Set to 1 if you want to display menu generated by system module
    'system_menu' => 1,

    /**
     * Blocks
     */
    'blocks'      => array(
        array(
            'file'        => 'partners.php',
            'name'        => _MI_XPARTNERS_NAME,
            'description' => _MI_XPARTNERS_DESC,
            'show_func'   => 'b_xoopspartners_show',
            'edit_func'   => 'b_xoopspartners_edit',
            'options'     => '1|1|1|1|1|hits|DESC|0',
            'template'    => 'xoopspartners_block_site.tpl'
        )
    ),

    // Menu
    'hasMain'     => 1,

    /**
     * Templates
     */
    'templates'   => array(
        array(
            'file'        => 'xoopspartners_index.tpl',
            'description' => _MI_XPARTNERS_TMPLT1_DESC
        ),

        array(
            'file'        => 'xoopspartners_join.tpl',
            'description' => _MI_XPARTNERS_TMPLT2_DESC
        )
    ),

    // Config Settings (only for modules that need config settings generated automatically)

    // name of config option for accessing its specified value. i.e. $xoopsModuleConfig['storyhome']
    'config'      => array(
        array(
            'name'        => 'cookietime',

            // title of this config option displayed in config settings form
            'title'       => '_MI_XPARTNERS_RECLICK',
            'description' => '',

            // Form element type used in config form for this option. C
            // Can be one of either textbox, textarea, select, select_multi, yesno, group, group_multi
            //
            'formtype'    => 'select',

            // value type of this config option. can be one of either int, text, float, array, or other
            // form type of 'group_multi', 'select_multi' must always be 'array'
            // form type of 'yesno', 'group' must be always be 'int'
            'valuetype'   => 'int',

            // the default value for this option
            // ignore it if no default
            // 'yesno' formtype must be either 0(no) or 1(yes)
            'default'     => 86400,
            'options'     => array(
                '_MI_XPARTNERS_HOUR'    => '3600',
                '_MI_XPARTNERS_3HOURS'  => '10800',
                '_MI_XPARTNERS_5HOURS'  => '18000',
                '_MI_XPARTNERS_10HOURS' => '36000',
                '_MI_XPARTNERS_DAY'     => '86400'
            )
        ),

        array(
            'name'        => 'modlimit',
            'title'       => '_MI_XPARTNERS_MLIMIT',
            'description' => '_MI_XPARTNERS_MLIMITDSC',
            'formtype'    => 'textbox',
            'valuetype'   => 'int',
            'default'     => 5
        ),

        array(
            'name'        => 'modshow',
            'title'       => '_MI_XPARTNERS_MSHOW',
            'description' => '_MI_XPARTNERS_MSHOWDSC',
            'formtype'    => 'select',
            'valuetype'   => 'int',
            'default'     => 1,
            'options'     => array(
                '_MI_XPARTNERS_IMAGES' => 1,
                '_MI_XPARTNERS_TEXT'   => 2,
                '_MI_XPARTNERS_BOTH'   => 3
            )
        ),

        array(
            'name'        => 'modsort',
            'title'       => '_MI_XPARTNERS_MSORT',
            'description' => '_MI_XPARTNERS_MSORTDSC',
            'formtype'    => 'select',
            'valuetype'   => 'text',
            'default'     => 'hits',
            'options'     => array(
                '_MI_XPARTNERS_ID'     => 'id',
                '_MI_XPARTNERS_HITS'   => 'hits',
                '_MI_XPARTNERS_TITLE'  => 'title',
                '_MI_XPARTNERS_WEIGHT' => 'weight'
            )
        ),

        array(
            'name'        => 'modorder',
            'title'       => '_MI_XPARTNERS_MORDER',
            'description' => '_MI_XPARTNERS_MORDERDSC',
            'formtype'    => 'select',
            'valuetype'   => 'text',
            'default'     => 'DESC',
            'options'     => array(
                '_ASCENDING'  => 'ASC',
                '_DESCENDING' => 'DESC'
            )
        ),

        array(
            'name'        => 'incadmin',
            'title'       => '_MI_XPARTNERS_INCADMIN',
            'description' => '_MI_XPARTNERS_INCADMINDSC',
            'formtype'    => 'yesno',
            'valuetype'   => 'int',
            'default'     => 1
        ),

        // Max Filesize Upload in kilo bytes
        array(
            'name'        => 'maxuploadsize',
            'title'       => '_MI_XPARTNERS_UPLOADFILESIZE',
            'description' => '_MI_XPARTNERS_UPLOADFILESIZE_DESC',
            'formtype'    => 'textbox',
            'valuetype'   => 'int',
            'default'     => 1048576
        ),

        // Max width
        array(
            'name'        => 'maxwidth',
            'title'       => '_MI_XPARTNERS_IMAGE_MAX_WIDTH',
            'description' => '_MI_XPARTNERS_IMAGE_MAX_WIDTH_DESC',
            'formtype'    => 'textbox',
            'valuetype'   => 'int',
            'default'     => 150
        ),

        // Max height
        array(
            'name'        => 'maxheight',
            'title'       => '_MI_XPARTNERS_IMAGE_MAX_HEIGHT',
            'description' => '_MI_XPARTNERS_IMAGE_MAX_WIDTH_DESC',
            'formtype'    => 'textbox',
            'valuetype'   => 'int',
            'default'     => 110
        )
    )
);
