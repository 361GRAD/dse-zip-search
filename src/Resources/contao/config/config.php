<?php

$GLOBALS['TL_CTE']['dse_elements']['dse_zipsearch'] =
    'Dse\\ZipSearchBundle\\Element\\ContentDseZipSearch';

$GLOBALS['TL_CTE']['dse_elements']['dse_zipsearch_redirect'] =
    'Dse\\ZipSearchBundle\\Element\\ContentDseZipSearchRedirect';


$GLOBALS['BE_MOD']['content']['dse_zipsearch'] = array
(
    'tables' => array('tl_dse_zipsearch')
);