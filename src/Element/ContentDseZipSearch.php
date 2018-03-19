<?php

namespace Dse\ZipSearchBundle\Element;

use Contao\BackendTemplate;
use Contao\ContentElement;
use Contao\File;
use Contao\FilesModel;
use Contao\FrontendTemplate;
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

        // Set up Images in template
//        $self = $this;
//
//        $this->Template->getImageObject = function () use ($self) {
//            return call_user_func_array(array($self, 'getImageObject'), func_get_args());
//        };

        $this->Template->arrAdvisers = $arrResult;
    }

    /**
     * Get an image object from uuid
     *
     * @param       $uuid
     * @param null  $size
     * @param null  $maxSize
     * @param null  $lightboxId
     * @param array $item
     *
     * @return \FrontendTemplate|object
     */
    public function getImageObject($uuid, $size = null, $maxSize = null, $lightboxId = null, $item = array())
    {
        global $objPage;

        if (!$uuid) {
            return null;
        }

        $image = FilesModel::findByUuid($uuid);

        if (!$image) {
            return null;
        }

        try {
            $file = new File($image->path, true);
            if (!$file->exists()) {
                return null;
            }
        } catch (\Exception $e) {
            return null;
        }

        $imageMeta = $this->getMetaData($image->meta, $objPage->language);

        if (is_string($size) && trim($size)) {
            $size = deserialize($size);
        }
        if (!is_array($size)) {
            $size = array();
        }
        $size[0] = isset($size[0]) ? $size[0] : 0;
        $size[1] = isset($size[1]) ? $size[1] : 0;
        $size[2] = isset($size[2]) ? $size[2] : 'crop';

        $image = array(
            'id'        => $image->id,
            'uuid'      => isset($image->uuid) ? $image->uuid : null,
            'name'      => $file->basename,
            'singleSRC' => $image->path,
            'size'      => serialize($size),
            'alt'       => $imageMeta['title'],
            'imageUrl'  => $imageMeta['link'],
            'caption'   => $imageMeta['caption'],
        );

        $image = array_merge($image, $item);

        $imageObject = new FrontendTemplate('dse_image_object');
        $this->addImageToTemplate($imageObject, $image, $maxSize, $lightboxId);
        $imageObject = (object) $imageObject->getData();

        if (empty($imageObject->src)) {
            $imageObject->src = $imageObject->singleSRC;
        }

        return $imageObject;
    }

}