
plugin.tx_estadisticaunal_estadisticaspreview {
    view {
        # cat=plugin.tx_estadisticaunal_estadisticaspreview/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:estadistica_unal/Resources/Private/Templates/
        # cat=plugin.tx_estadisticaunal_estadisticaspreview/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:estadistica_unal/Resources/Private/Partials/
        # cat=plugin.tx_estadisticaunal_estadisticaspreview/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:estadistica_unal/Resources/Private/Layouts/
    }
    persistence {
        # cat=plugin.tx_estadisticaunal_estadisticaspreview//a; type=string; label=Default storage PID
        storagePid =
    }
}

plugin.tx_estadisticaunal_listcategorias {
    view {
        # cat=plugin.tx_estadisticaunal_listcategorias/file; type=string; label=Path to template root (FE)
        templateRootPath = EXT:estadistica_unal/Resources/Private/Templates/
        # cat=plugin.tx_estadisticaunal_listcategorias/file; type=string; label=Path to template partials (FE)
        partialRootPath = EXT:estadistica_unal/Resources/Private/Partials/
        # cat=plugin.tx_estadisticaunal_listcategorias/file; type=string; label=Path to template layouts (FE)
        layoutRootPath = EXT:estadistica_unal/Resources/Private/Layouts/
    }
}

module.tx_estadisticaunal_cifrasunalbe {
    view {
        # cat=module.tx_estadisticaunal_cifrasunalbe/file; type=string; label=Path to template root (BE)
        templateRootPath = EXT:estadistica_unal/Resources/Private/Backend/Templates/
        # cat=module.tx_estadisticaunal_cifrasunalbe/file; type=string; label=Path to template partials (BE)
        partialRootPath = EXT:estadistica_unal/Resources/Private/Backend/Partials/
        # cat=module.tx_estadisticaunal_cifrasunalbe/file; type=string; label=Path to template layouts (BE)
        layoutRootPath = EXT:estadistica_unal/Resources/Private/Backend/Layouts/
    }
    persistence {
        # cat=module.tx_estadisticaunal_cifrasunalbe//a; type=string; label=Default storage PID
        storagePid =
    }
}
