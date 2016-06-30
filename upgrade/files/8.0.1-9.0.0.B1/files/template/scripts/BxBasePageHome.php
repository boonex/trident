<?php defined('BX_DOL') or die('hack attempt');
/**
 * Copyright (c) BoonEx Pty Limited - http://www.boonex.com/
 * CC-BY License - http://creativecommons.org/licenses/by/3.0/
 *
 * @defgroup    TridentCore Trident Core
 * @{
 */

/**
 * Homepage.
 */
class BxBasePageHome extends BxTemplPage
{
    protected $_sTourTheme = 'default';

    public function __construct($aObject, $oTemplate)
    {
        parent::__construct($aObject, $oTemplate);
        $this->addMarkers(array('site_title' => getParam('site_title')));

        $oCover = BxDolCover::getInstance();
        $iFileIdCover = (int)getParam('sys_site_cover_home');
        $oCover->set(array(
            'class' => 'bx-cover-homepage',
            'title' => _t('_sys_txt_homepage_cover', BX_DOL_URL_ROOT . BxDolPermalinks::getInstance()->permalink('page.php?i=create-account')),
            'bx_if:bg' => array (
                'condition' => $iFileIdCover,
                'content' => array('image_url' => ($iFileIdCover ? BxDolTranscoder::getObjectInstance(BX_DOL_TRANSCODER_OBJ_COVER)->getFileUrlById($iFileIdCover) : '')),
            ),            
        ));
    }

    public function getCode ()
    {
        $s = parent::getCode ();
        if (isAdmin())
            $s .= $this->_oTemplate->parseHtmlByName('homepage_tour.html', array('tour_theme' => $this->_sTourTheme));
        return $s;
    }

    protected function _addJsCss()
    {
        parent::_addJsCss();
        if (isAdmin()) {
            $this->_oTemplate->addJs(array(
                'shepherd/js/tether.min.js',
                'shepherd/js/shepherd.min.js',
            ));
            $this->_oTemplate->addCss(array(
                'homepage.css',
                BX_DIRECTORY_PATH_PLUGINS_PUBLIC . 'shepherd/css/|shepherd-theme-' . $this->_sTourTheme . '.css'
            ));
        }
    }
}

/** @} */
