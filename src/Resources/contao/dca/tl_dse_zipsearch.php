<?php

$GLOBALS['TL_DCA']['tl_dse_zipsearch'] = [
    'config' => [
        'dataContainer'    => 'Table',
        'enableVersioning' => true,
        'sql'              => [
            'keys' => [
                'id' => 'primary'
            ]
        ],
    ],

    'list' => [
        'sorting'           => [
            'mode'        => 2,
            'fields'      => [
                'name'
            ],
            'flag'        => 3,
            'panelLayout' => 'sort,search,limit'
        ],
        'label'             => [
            'fields'      => [
                'name'
            ],
            'showColumns' => true,
        ],
        'global_operations' => [
            'all' => [
                'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
                'href'       => 'act=select',
                'class'      => 'header_edit_all',
                'attributes' => 'onclick="Backend.getScrollOffset()" accesskey="e"'
            ],
        ],
        'operations'        => [
            'edit'   => [
                'label' => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['edit'],
                'href'  => 'act=edit',
                'icon'  => 'edit.gif'
            ],
            'delete' => [
                'label'      => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['delete'],
                'href'       => 'act=delete',
                'icon'       => 'delete.gif',
                'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm']
                    . '\'))return false;Backend.getScrollOffset()"'
            ],
            'show'   => [
                'label'      => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['show'],
                'href'       => 'act=show',
                'icon'       => 'show.gif',
                'attributes' => 'style="margin-right:3px;"'
            ],
        ],
    ],

    'palettes' => [
//        'default' => '{locations_legend:hide},name,geoCodeCountry,geoLat,geoLong,title,street,postal,location,text,phone,mail,web;'
        'default' => '{adviser_legend},name,position,state,phone,fax,mobil,mail;{area_legend},area'
    ],

    'fields' => [
        'id'             => [
            'sql' => 'int(10) unsigned NOT NULL auto_increment'
        ],
        'tstamp'         => [
            'sql' => "int(10) unsigend NOT NULL default '0'"
        ],
        'name'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['name'],
            'exclude'   => true,
            'sorting'   => true,
            'search'    => true,
            'flag'      => 1,
            'inputType' => 'text',
            'eval'      => [
                'mandatory' => true,
                'maxlength' => 255,
                'tl_class'  => 'w50 clr',
            ],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'position'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['position'],
            'exclude'   => true,
            'sorting'   => false,
            'search'    => false,
            'flag'      => 1,
            'inputType' => 'text',
            'eval'      => [
                'mandatory' => true,
                'maxlength' => 255,
                'tl_class'  => 'w50 clr',
            ],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'state'        => [
            'label'     => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['state'],
            'exclude'   => true,
            'sorting'   => false,
            'search'    => false,
            'flag'      => 1,
            'inputType' => 'text',
            'eval'      => [
                'mandatory' => false,
                'maxlength' => 255,
                'tl_class'  => 'w50',
            ],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'phone'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['phone'],
            'exclude'   => true,
            'sorting'   => false,
            'search'    => false,
            'inputType' => 'text',
            'eval'      => [
                'mandatory' => true,
                'tl_class' => 'w50 clr',
                'rgxp'     => 'phone'
            ],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'fax'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['fax'],
            'exclude'   => true,
            'sorting'   => false,
            'search'    => false,
            'inputType' => 'text',
            'eval'      => [
                'mandatory' => true,
                'tl_class' => 'w50',
                'rgxp'     => 'phone'
            ],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'mobil'         => [
            'label'     => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['mobil'],
            'exclude'   => true,
            'sorting'   => false,
            'search'    => false,
            'inputType' => 'text',
            'eval'      => [
                'mandatory' => true,
                'tl_class' => 'w50 clr',
                'rgxp'     => 'phone'
            ],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'mail'          => [
            'label'     => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['mail'],
            'exclude'   => true,
            'sorting'   => false,
            'search'    => false,
            'inputType' => 'text',
            'eval'      => [
                'mandatory' => true,
                'unique' => true,
                'tl_class' => 'w50',
                'rgxp'     => 'email'
            ],
            'sql'       => "varchar(255) NOT NULL default ''"
        ],
        'area'          => [
            'label'     => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['area'],
            'exclude'   => true,
            'sorting'   => false,
            'search'    => false,
            'inputType' => 'multiColumnWizard',
            'eval'      => [
                // add this line for a new button
                'dragAndDrop'  => true,
                'tl_class' => 'w50 clr wizard',
                'maxCount' => 16,
                'columnFields' => [
                    'zip_from' => [
                        'label'     => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['zip_from'],
                        'exclude'   => true,
                        'inputType' => 'text',
                        'eval'      => [
                            'tl_class' => 'w50 clr'
                        ],
                    ],
                    'zip_to' => [
                        'label'     => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['zip_to'],
                        'exclude'   => true,
                        'inputType' => 'text',
                        'eval'      => [
                            'tl_class' => 'w50'
                        ],
                    ],
                ],
            ],
            'sql'       => 'blob NULL',
        ],

//        'text'           => [
//            'label'     => &$GLOBALS['TL_LANG']['tl_dse_zipsearch']['text'],
//            'exclude'   => true,
//            'inputType' => 'textarea',
//            'eval'      => [
//                'rte'      => 'tinyMCE',
//                'tl_class' => 'clr',
//            ],
//            'sql'       => 'text NULL'
//        ],
    ]
];
