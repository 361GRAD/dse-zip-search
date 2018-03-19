<?php

namespace Dse\ZipSearchBundle\Element;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\Database;


class ContentDseZipSearch extends ContentElement
{
    protected $strTemplate = 'ce_dse_zipsearch';

    public function generate()
    {
        if (TL_MODE == 'BE') {
            $objTemplate = new BackendTemplate('be_wildcard');

            $objTemplate->wildcard = '### ' . $GLOBALS['TL_LANG']['MOD']['dse_zipsearch'][0] . ' ###';
            $objTemplate->title    = $this->headline;
            return $objTemplate->parse();
        }

        return parent::generate();
    }

    protected function compile()
    {
        $i=0;
        $zip = $_POST['zip'];

        $query = Database::getInstance()
            ->query('SELECT * FROM tl_dse_zipsearch ORDER BY id ')->fetchAllAssoc();

        foreach ($query as $data) {
            foreach(unserialize($data['area']) as $area) {
                if($zip > $area['zip_from'] && $zip < $area['zip_to']) {
                    $arrResult[$i] = $data;
                    $i++;
                }
            }
        }
        
        $this->Template->arrAdvisers = $arrResult;
    }

}