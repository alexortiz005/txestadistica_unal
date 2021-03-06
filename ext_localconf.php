<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Unal.EstadisticaUnal',
            'Estadisticaspreview',
            [
                'Indicador' => 'preview',
                'Categoria' => 'list, show',
                'Desagregacion' => 'list, show',
                'Archivo' => 'list, show',
                'AtributoDesagregacion' => 'list, show',
                'Estadistica' => 'list, show'
                
            ],
            // non-cacheable actions
            [
                'Categoria' => '',
                'Desagregacion' => '',
                'Archivo' => '',
                'AtributoDesagregacion' => '',
                'Estadistica' => '',
                'Indicador' => ''
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Unal.EstadisticaUnal',
            'Listcategorias',
            [
                'Categoria' => 'list, show',
                'Desagregacion' => 'list, show, getArchivos',
                'Archivo' => 'list, show',
                'Atributo' => 'list, show',
                'Estadistica' => 'list, show, modal'
            ],
            // non-cacheable actions
            [
                'Categoria' => '',
                'Desagregacion' => '',
                'Archivo' => '',
                'AtributoDesagregacion' => '',
                'Estadistica' => '',
                'Indicador' => ''
            ]
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Unal.EstadisticaUnal',
            'Showprotocolo',
            [                
                'Estadistica' => 'protocolo'
            ],
            // non-cacheable actions
            [
                'Categoria' => '',
                'Desagregacion' => '',
                'Archivo' => '',
                'AtributoDesagregacion' => '',
                'Estadistica' => '',
                'Indicador' => ''
            ]
        );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    estadisticaspreview {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('estadistica_unal') . 'Resources/Public/Icons/user_plugin_estadisticaspreview.svg
                        title = LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_db.xlf:tx_estadistica_unal_domain_model_estadisticaspreview
                        description = LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_db.xlf:tx_estadistica_unal_domain_model_estadisticaspreview.description
                        tt_content_defValues {
                            CType = list
                            list_type = estadisticaunal_estadisticaspreview
                        }
                    }
                    listcategorias {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('estadistica_unal') . 'Resources/Public/Icons/user_plugin_listcategorias.svg
                        title = LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_db.xlf:tx_estadistica_unal_domain_model_listcategorias
                        description = LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_db.xlf:tx_estadistica_unal_domain_model_listcategorias.description
                        tt_content_defValues {
                            CType = list
                            list_type = estadisticaunal_listcategorias
                        }
                    }
                    showprotocolo {
                        icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('estadistica_unal') . 'Resources/Public/Icons/user_plugin_showprotocolo.svg
                        title = LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_db.xlf:tx_estadistica_unal_domain_model_showprotocolo
                        description = LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_db.xlf:tx_estadistica_unal_domain_model_showprotocolo.description
                        tt_content_defValues {
                            CType = list
                            list_type = estadisticaunal_showprotocolo
                        }
                    }
                }
                show = *
            }
       }'
    );
    }
);
