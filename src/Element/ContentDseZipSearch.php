<?php

namespace Dse\ZipSearchBundle\Element;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\File;
use Contao\FilesModel;
use Contao\FrontendTemplate;
use Contao\Database;
use Contao\StringUtil;
use Contao\Image;



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


                    $data['singleSRC'] = FilesModel::findByUuid($data['singleSRC']);
//                    $data['singleSRC'] = StringUtil::binToUuid($data['singleSRC']);
                    $imgReturn = Image::getHtml(Image::get($data['singleSRC']->path, unserialize($data['size'])[0], unserialize($data['size'])[1], unserialize($data['size'])[2]), 'my first image');

                    $arrResult[$i]['image'] = $imgReturn;
                    $arrResult[$i]['data'] = $data;
                    $i++;
                }
            }
        }

        $this->Template->arrAdvisers = $arrResult;
    }
}