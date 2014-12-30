<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) BoonEx Pty Limited - http://www.boonex.com/
 * CC-BY License - http://creativecommons.org/licenses/by/3.0/
 *
 * @defgroup    Accounts Accounts
 * @ingroup     TridentModules
 *
 * @{
 */

bx_import('BxTemplStudioModule');

class BxAccntStudioPage extends BxTemplStudioModule
{
    function __construct($sModule = "", $sPage = "")
    {
        parent::__construct($sModule, $sPage);

        bx_import('BxDolPermalinks');
        $oPermalink = BxDolPermalinks::getInstance();

        $this->aMenuItems = array(
            array('name' => 'settings', 'icon' => 'cogs', 'title' => '_adm_lmi_cpt_settings'),
            array('name' => 'manage', 'icon' => 'wrench', 'title' => '_bx_accnt_menu_item_title_manage', 'link' => BX_DOL_URL_ROOT . $oPermalink->permalink('page.php?i=accounts-administration')),
        );
    }
}

/** @} */
