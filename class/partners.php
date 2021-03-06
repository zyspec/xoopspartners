<?php
/*
 * You may not change or alter any portion of this comment or credits
 * of supporting developers from this source code or any supporting source code
 * which is considered copyrighted (c) material of the original comment or credit authors.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 *------------------------------------
 * Author: Raul Recio (AKA UNFOR)
 * Project: The XOOPS Project
 *------------------------------------
 */
/**
 * XoopsPartners - a partner affiliation links module
 *
 * @package      module\xoopspartners\class
 * @author       Raul Recio (aka UNFOR)
 * @author       XOOPS Module Development Team
 * @copyright    http://xoops.org 2001-2016 &copy; XOOPS Project
 * @license      http://www.gnu.org/licenses/gpl-2.0.html GNU Public License
 */

defined('XOOPS_ROOT_PATH') || exit('Restricted access');

/**
 * Class XoopspartnersPartners
 *
 * {@inheritDoc}
 * @see XoopsObject
 */
class XoopspartnersPartners extends XoopsObject
{
    protected $db;

    /**
     * constructor
     *
     * @todo change 'url' to XOBJ_DTYPE_URL
     * @param null $id
     */
    public function __construct($id = null)
    {
        $this->db = XoopsDatabaseFactory::getDatabaseConnection();

        $this->initVar('id', XOBJ_DTYPE_INT, null, false);
        $this->initVar('weight', XOBJ_DTYPE_INT, null, false, 10);
        $this->initVar('hits', XOBJ_DTYPE_INT, null, true, 10);
        $this->initVar('url', XOBJ_DTYPE_TXTBOX, null, true);
        $this->initVar('image', XOBJ_DTYPE_TXTBOX, null, true);
        $this->initVar('title', XOBJ_DTYPE_TXTBOX, null, false);
        $this->initVar('description', XOBJ_DTYPE_TXTBOX, null, true);
        $this->initVar('status', XOBJ_DTYPE_INT, null, false, 0);
        if (!empty($id)) {
            if (is_array($id)) {
                $this->assignVars($id);
            } else {
                $this->load((int)$id);
            }
        }
    }

    /**
     * Returns category title
     *
     * @return string
     */
    public function __toString()
    {
        return $this->getVar('title', 's');
    }
}

/**
 *
 * {@inheritDoc}
 * @see XoopsPersistableObjectHandler
 * @copyright copyright &copy; 2000 XOOPS.org
 *
 */
class XoopspartnersPartnersHandler extends XoopsPersistableObjectHandler
{
    /**
     * XoopspartnersPartnersHandler constructor
     *
     * @param XoopsDatabase $db
     */
    public function __construct(XoopsDatabase $db)
    {
        parent::__construct($db, 'partners', 'XoopspartnersPartners', 'id', 'title');
    }
}
