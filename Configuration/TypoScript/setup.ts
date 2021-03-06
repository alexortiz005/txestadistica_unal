
plugin.tx_estadisticaunal_estadisticaspreview {
    view {
        templateRootPaths.0 = EXT:estadistica_unal/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_estadisticaunal_estadisticaspreview.view.templateRootPath}
        partialRootPaths.0 = EXT:estadistica_unal/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_estadisticaunal_estadisticaspreview.view.partialRootPath}
        layoutRootPaths.0 = EXT:estadistica_unal/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_estadisticaunal_estadisticaspreview.view.layoutRootPath}
    }
    persistence {
        storagePid = {$plugin.tx_estadisticaunal_estadisticaspreview.persistence.storagePid}
        #recursive = 1
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}

plugin.tx_estadisticaunal_listcategorias {
    view {
        templateRootPaths.0 = EXT:estadistica_unal/Resources/Private/Templates/
        templateRootPaths.1 = {$plugin.tx_estadisticaunal_listcategorias.view.templateRootPath}
        partialRootPaths.0 = EXT:estadistica_unal/Resources/Private/Partials/
        partialRootPaths.1 = {$plugin.tx_estadisticaunal_listcategorias.view.partialRootPath}
        layoutRootPaths.0 = EXT:estadistica_unal/Resources/Private/Layouts/
        layoutRootPaths.1 = {$plugin.tx_estadisticaunal_listcategorias.view.layoutRootPath}
    }
    features {
        #skipDefaultArguments = 1
        # if set to 1, the enable fields are ignored in BE context
        ignoreAllEnableFieldsInBe = 0
        # Should be on by default, but can be disabled if all action in the plugin are uncached
        requireCHashArgumentForActionArguments = 1
    }
    mvc {
        #callDefaultActionIfActionCantBeResolved = 1
    }
}


# Module configuration
module.tx_estadisticaunal_web_estadisticaunalcifrasunalbe {
    persistence {
        storagePid = {$module.tx_estadisticaunal_cifrasunalbe.persistence.storagePid}
    }
    view {
        templateRootPaths.0 = EXT:estadistica_unal/Resources/Private/Backend/Templates/
        templateRootPaths.1 = {$module.tx_estadisticaunal_cifrasunalbe.view.templateRootPath}
        partialRootPaths.0 = EXT:estadistica_unal/Resources/Private/Backend/Partials/
        partialRootPaths.1 = {$module.tx_estadisticaunal_cifrasunalbe.view.partialRootPath}
        layoutRootPaths.0 = EXT:estadistica_unal/Resources/Private/Backend/Layouts/
        layoutRootPaths.1 = {$module.tx_estadisticaunal_cifrasunalbe.view.layoutRootPath}
    }
}


page{
    includeCSS {
        full-screen-helper = EXT:estadistica_unal/Resources/Public/Css/full-screen-helper.css
        list-categorias = EXT:estadistica_unal/Resources/Public/Css/list-categorias.scss
        indicadores-preview = EXT:estadistica_unal/Resources/Public/Css/indicadores-preview.scss
        estadisticas-unal = EXT:estadistica_unal/Resources/Public/Css/estadisticas-unal.scss
        estadisticas-protocolo = EXT:estadistica_unal/Resources/Public/Css/estadisticas-protocolo.scss
        slick = EXT:estadistica_unal/Resources/Public/Css/slick.css
        slick-theme = EXT:estadistica_unal/Resources/Public/Css/slick-theme.css
        font-awesome = EXT:estadistica_unal/Resources/Public/Css/font-awesome.min.css
        jssocials-theme-flat = EXT:estadistica_unal/Resources/Public/Css/jssocials-theme-flat.css
        jssocials = EXT:estadistica_unal/Resources/Public/Css/jssocials.css
    }
    
    includeJS{

        jquery = EXT:estadistica_unal/Resources/Public/Js/jquery-3.2.1.js      
        dragscroll = EXT:estadistica_unal/Resources/Public/Js/dragscroll.js
        modal-estadisticas = EXT:estadistica_unal/Resources/Public/Js/modal-estadisticas.js
        full-screen-helper = EXT:estadistica_unal/Resources/Public/Js/full-screen-helper.js
        jsprintf = EXT:estadistica_unal/Resources/Public/Js/jspdf/libs/sprintf.js
        jspdf = EXT:estadistica_unal/Resources/Public/Js/jspdf/jspdf.js
        jspdf_debug = EXT:estadistica_unal/Resources/Public/Js/jspdf/jspdf.debug.js
        jspdf_addimage = EXT:estadistica_unal/Resources/Public/Js/jspdf/jspdf.plugin.addimage.js
        base64 = EXT:estadistica_unal/Resources/Public/Js/jspdf/libs/base64.js

        
    }

    includeJSFooter{
        slick = EXT:estadistica_unal/Resources/Public/Js/slick.min.js
        estadistica-unal = EXT:estadistica_unal/Resources/Public/Js/estadistica-unal.js   
        jssocials = EXT:estadistica_unal/Resources/Public/Js/jssocials.min.js   
        jspdf_autotable = EXT:estadistica_unal/Resources/Public/Js/jspdf/jspdf.plugin.autotable.js
        protocolo = EXT:estadistica_unal/Resources/Public/Js/protocolo.js  

    }
}


ajaxContentEstadisticasListCategorias = PAGE
ajaxContentEstadisticasListCategorias {
    typeNum = 476

    # add plugin
    10 < tt_content.list.20.estadisticaunal_listcategorias

    # disable header code
    config {
        disableAllHeaderCode = 1
        additionalHeaders = Content-type: application/json, utf-8

        xhtml_cleaning = 0
        admPanel = 0
        debug = 0
    }
}
