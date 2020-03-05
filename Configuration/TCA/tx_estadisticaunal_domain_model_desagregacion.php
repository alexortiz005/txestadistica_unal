<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_db.xlf:tx_estadisticaunal_domain_model_desagregacion',
        'label' => 'nombre',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'nombre,nombre_display,archivos,atributos',
        'iconfile' => 'EXT:estadistica_unal/Resources/Public/Icons/tx_estadisticaunal_domain_model_desagregacion.gif'
    ],
    'interface' => [
        'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, nombre, nombre_display, archivos, atributos',
    ],
    'types' => [
        '1' => ['showitem' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, nombre, nombre_display, archivos, atributos, --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'special' => 'languages',
                'items' => [
                    [
                        'LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages',
                        -1,
                        'flags-multiple'
                    ]
                ],
                'default' => 0,
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_estadisticaunal_domain_model_desagregacion',
                'foreign_table_where' => 'AND tx_estadisticaunal_domain_model_desagregacion.pid=###CURRENT_PID### AND tx_estadisticaunal_domain_model_desagregacion.sys_language_uid IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        't3ver_label' => [
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'max' => 255,
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
            'config' => [
                'type' => 'check',
                'items' => [
                    '1' => [
                        '0' => 'LLL:EXT:lang/Resources/Private/Language/locallang_core.xlf:labels.enabled'
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'behaviour' => [
                'allowLanguageSynchronization' => true
            ],
            'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 13,
                'eval' => 'datetime',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
            ],
        ],

        'nombre' => [
            'exclude' => true,
            'label' => 'LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_db.xlf:tx_estadisticaunal_domain_model_desagregacion.nombre',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'nombre_display' => [
            'exclude' => true,
            'label' => 'LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_db.xlf:tx_estadisticaunal_domain_model_desagregacion.nombre_display',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim'
            ],
        ],
        'archivos' => [
            'exclude' => true,
            'label' => 'LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_db.xlf:tx_estadisticaunal_domain_model_desagregacion.archivos',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_estadisticaunal_domain_model_archivo',
                'foreign_table_where' => 'AND tx_estadisticaunal_domain_model_archivo.pid=###CURRENT_PID###',
                'MM' => 'tx_estadisticaunal_desagregacion_archivo_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
        'atributos' => [
            'exclude' => true,
            'label' => 'LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_db.xlf:tx_estadisticaunal_domain_model_desagregacion.atributos',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectMultipleSideBySide',
                'foreign_table' => 'tx_estadisticaunal_domain_model_atributodesagregacion',
                'foreign_table_where' => 'AND tx_estadisticaunal_domain_model_atributodesagregacion.pid=###CURRENT_PID###',
                'enableMultiSelectFilterTextfield' => true,
                'MM' => 'tx_estadisticaunal_desagregacion_atributo_mm',
                'size' => 10,
                'autoSizeMax' => 30,
                'maxitems' => 9999,
                'multiple' => 0,
                'fieldControl' => [
                    'editPopup' => [
                        'disabled' => false,
                    ],
                    'addRecord' => [
                        'disabled' => false,
                    ],
                    'listModule' => [
                        'disabled' => true,
                    ],
                ],
            ],
            
        ],
    
    ],
];
