<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function()
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Unal.EstadisticaUnal',
            'Estadisticaspreview',
            'Cifras Preview'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Unal.EstadisticaUnal',
            'Listcategorias',
            'Categorias'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Unal.EstadisticaUnal',
            'Showprotocolo',
            'Protocolo'
        );

       if (TYPO3_MODE === 'BE') {

            $_EXTKEY='estadistica_unal';
            $extensionName = \TYPO3\CMS\Core\Utility\GeneralUtility::underscoredToUpperCamelCase($_EXTKEY);

            //pi_flexform value for cifras preview
            $frontendpluginName = 'Estadisticaspreview';
            $pluginSignature = strtolower($extensionName).'_'.strtolower($frontendpluginName);

            $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
            $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature]= 'select_key, pages, recursive';

            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/cifras_preview.xml');
    

            //pi_flexform value for categorias
            $frontendpluginName = 'Listcategorias';
            $pluginSignature = strtolower($extensionName).'_'.strtolower($frontendpluginName);

            $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
            $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$pluginSignature]= 'select_key';

            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/categorias.xml');


            //pi_flexform value for protocolo
            $frontendpluginName = 'Showprotocolo';
            $pluginSignature = strtolower($extensionName).'_'.strtolower($frontendpluginName);

            $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';

            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:'.$_EXTKEY.'/Configuration/FlexForms/protocolo.xml');


            \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
                'Unal.EstadisticaUnal',
                'web', // Make module a submodule of 'web'
                'cifrasunalbe', // Submodule key
                '', // Position
                [
                    'Categoria' => 'list, show','Desagregacion' => 'list, show','Archivo' => 'list, show','Atributo' => 'list, show','Estadistica' => 'list, show',
                ],
                [
                    'access' => 'user,group',
                    'icon'   => 'EXT:estadistica_unal/Resources/Public/Icons/user_mod_cifrasunalbe.svg',
                    'labels' => 'LLL:EXT:estadistica_unal/Resources/Private/Language/locallang_cifrasunalbe.xlf',
                ]
            );

        }


        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile('estadistica_unal', 'Configuration/TypoScript', 'Estadistica Unal');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_estadisticaunal_domain_model_categoria', 'EXT:estadistica_unal/Resources/Private/Language/locallang_csh_tx_estadisticaunal_domain_model_categoria.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_estadisticaunal_domain_model_categoria');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_estadisticaunal_domain_model_desagregacion', 'EXT:estadistica_unal/Resources/Private/Language/locallang_csh_tx_estadisticaunal_domain_model_desagregacion.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_estadisticaunal_domain_model_desagregacion');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_estadisticaunal_domain_model_archivo', 'EXT:estadistica_unal/Resources/Private/Language/locallang_csh_tx_estadisticaunal_domain_model_archivo.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_estadisticaunal_domain_model_archivo');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_estadisticaunal_domain_model_atributodesagregacion', 'EXT:estadistica_unal/Resources/Private/Language/locallang_csh_tx_estadisticaunal_domain_model_atributodesagregacion.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_estadisticaunal_domain_model_atributodesagregacion');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_estadisticaunal_domain_model_estadistica', 'EXT:estadistica_unal/Resources/Private/Language/locallang_csh_tx_estadisticaunal_domain_model_estadistica.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_estadisticaunal_domain_model_estadistica');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_estadisticaunal_domain_model_tipoatributodesagregacion', 'EXT:estadistica_unal/Resources/Private/Language/locallang_csh_tx_estadisticaunal_domain_model_tipoatributodesagregacion.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_estadisticaunal_domain_model_tipoatributodesagregacion');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_estadisticaunal_domain_model_atributoestadistica', 'EXT:estadistica_unal/Resources/Private/Language/locallang_csh_tx_estadisticaunal_domain_model_atributoestadistica.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_estadisticaunal_domain_model_atributoestadistica');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_estadisticaunal_domain_model_tipoatributoestadistica', 'EXT:estadistica_unal/Resources/Private/Language/locallang_csh_tx_estadisticaunal_domain_model_tipoatributoestadistica.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_estadisticaunal_domain_model_tipoatributoestadistica');

    }
);
