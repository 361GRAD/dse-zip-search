<?php

/**
 * 361GRAD - Element Buttons
 *
 * @package   dse-elements-bundle
 * @author    Markus Häfner <markus@361.de>
 * @copyright 2018 361GRAD
 * @license   http://www.361.de proprietary
 */

// Element palettes
$GLOBALS['TL_DCA']['tl_content']['palettes']['dse_zipsearch_redirect'] =
    '{type_legend},type,headline;' .
    '{buttonone_legend},dse_zipsearch_redirect,dse_zipsearch_redirect_text_label,dse_zipsearch_redirect_button,dse_zipsearch_redirect_error;';

// Element fields
$GLOBALS['TL_DCA']['tl_content']['fields']['dse_zipsearch_redirect'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['dse_zipsearch_redirect'],
    'inputType' => 'pageTree',
    'eval'      => [
        'mandatory' => true,
        'fieldType' => 'radio',
        'tl_class' => 'w50 autoheight wizard clr'
    ],
    'sql' => "int(10) unsigend NOT NULL default '0'"
];

$GLOBALS['TL_DCA']['tl_content']['fields']['dse_zipsearch_redirect_text_label'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['dse_zipsearch_redirect_text_label'],
    'inputType' => 'text',
    'eval'      => [
        'mandatory' => true,
        'maxlength' => 255,
        'tl_class' => 'w50 clr'
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];
$GLOBALS['TL_DCA']['tl_content']['fields']['dse_zipsearch_redirect_button'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['dse_zipsearch_redirect_button'],
    'inputType' => 'text',
    'eval'      => [
        'mandatory' => true,
        'maxlength' => 255,
        'tl_class' => 'w50'
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];
$GLOBALS['TL_DCA']['tl_content']['fields']['dse_zipsearch_redirect_error'] = [
    'label'     => &$GLOBALS['TL_LANG']['tl_content']['dse_zipsearch_redirect_error'],
    'inputType' => 'text',
    'eval'      => [
        'mandatory' => true,
        'maxlength' => 255,
        'tl_class' => 'long clr'
    ],
    'sql' => "varchar(255) NOT NULL default ''"
];