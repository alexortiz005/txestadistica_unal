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
            'Categorias Main'
        );

        if (TYPO3_MODE === 'BE') {

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

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_estadisticaunal_domain_model_atributo', 'EXT:estadistica_unal/Resources/Private/Language/locallang_csh_tx_estadisticaunal_domain_model_atributo.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_estadisticaunal_domain_model_atributo');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_estadisticaunal_domain_model_estadistica', 'EXT:estadistica_unal/Resources/Private/Language/locallang_csh_tx_estadisticaunal_domain_model_estadistica.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_estadisticaunal_domain_model_estadistica');

    }
);
