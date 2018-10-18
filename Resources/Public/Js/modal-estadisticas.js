$(document).on("click",".estadistica-modal",function(event){ 

        var estadistica=$(this);

        event.preventDefault();

        console.log();

        var nombreEstadistica=$(this).data('nombre');
        var urlProtocoloEstadistica=$(this).data('url');

        $("#modalTitle").html(nombreEstadistica);
        $("#linkDashboardTitle").attr("href", urlProtocoloEstadistica)
        $("#linkDashboardTitle").attr("target", "_blank")

        urlModal=this.href;

        ajaxCallModal(urlModal);
});

$(document).on("click",".fullscreen-button",function(event){ 

    idFullscreenElement= $(this).data('iframe');
    FullScreenHelper.toggle(document.getElementById(idFullscreenElement));
        
});

$(document).on("click",".share-button",function(event){ 

    sharePanelId=$(this).data('sharePanel');
    link=$(this).data('link');

    sharePanel =$("#"+sharePanelId);
    shareSocials=sharePanel.find(".share-socials");

    sharePanel.toggle(500);

    shareSocials.jsSocials({
        showCount: false,
        showLabel: true,
        shareIn: "popup",
        url: link,
        text:document.title,
        shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "whatsapp"]
    });



    console.log();
        
});

function ajaxCallModal(urlAction){
     $.ajax({url: urlAction,

            success: function(result){

                //console.log(result);
                $("#dashboard").modal();
                $("#modalBody").html(result);
                dragscroll.reset();              


                $("#desagregaciones").children().first().trigger("click");

            },
            
            error: function(xhr){
                if(xhr.status==503){
                    alert("Server is busy, please try again in a while")
                }else{
                   alert("Error: " + xhr.status + " " + xhr.statusText);
                }
            }

    });

    $('[data-toggle="tooltip"]').tooltip(); 
}

$(document).on("click",".desagregacion",function(event){     

        var urlGetArchivos = $(this).data('url');

        var nombreDesagregacion = $(this).data('nombre');
        var tipo = $(this).data('tipo')

        if(tipo==0){
           

            $("#tabPaneDesagregacionRegular").fadeOut(500, function(){
                $(".nombreDesagregacion").html(nombreDesagregacion)
                ajaxCallGetArchivosDesagregacionRegular(urlGetArchivos);
            });

            $("#tabPaneDesagregacionRegular").addClass("in active");
           
            $("#tabPaneDesagregacionRegular").fadeIn(500);
        }else{

            $("#tabPaneDesagregacionRegular").fadeOut(500);

        }

     
});


function ajaxCallGetArchivosDesagregacionRegular(urlAction){
     $.ajax({url: urlAction,

            success: function(result){

                var archivos = JSON.parse(result);

                updateTabPaneDesagregacionRegular(archivos);
     
            },
            
            error: function(xhr){
                if(xhr.status==503){
                    alert("Server is busy, please try again in a while")
                }else{
                   alert("Error: " + xhr.status + " " + xhr.statusText);
                }
            }

    });
}

function updateTabPaneDesagregacionRegular(archivos){

    $("#panelArchivosDesagregacionRegularHistorico").removeClass();
    $("#panelArchivosDesagregacionRegularActual").removeClass();
    $("#pillsArchivosDesagregacionRegularHistorico").empty();
    $("#pillsArchivosDesagregacionRegularActual").empty();
    //$("#tabContentArchivosDesagregacionRegularHistorico").empty();
    //$("#tabContentArchivosDesagregacionRegularActual").empty();

    var archivos_historicos= []
    var archivos_actuales= []

    archivos.forEach(function(archivo, index) { 


        switch(archivo.tipo) {
            case 0:
                archivos_historicos.push(archivo);
                break;  
            case 1:
                archivos_actuales.push(archivo);
                break;                  
            default:
        }        
    });

    if(archivos_historicos.length!=0&&archivos_actuales.length!=0){

        $("#panelArchivosDesagregacionRegularHistorico").addClass("col-md-6 panelArchivos regularHistorico halfTabPane");
        $("#panelArchivosDesagregacionRegularActual").addClass("col-md-6 panelArchivos regularActual halfTabPane");
       

    }else{

        if(archivos_actuales.length==0){
            $("#panelArchivosDesagregacionRegularHistorico").addClass("col-md-12 panelArchivos");
            $("#panelArchivosDesagregacionRegularActual").addClass("hidden");

        }

        if(archivos_historicos.length==0){
            $("#panelArchivosDesagregacionRegularActual").addClass("col-md-12 panelArchivos");
            $("#panelArchivosDesagregacionRegularHistorico").addClass("hidden");

        }
    }


    archivos_historicos.forEach(function (archivo,index) {

        var pillArchivo = $("<li><a class=\"historico\" data-toggle=\"pill\" href=\"#archivo"+archivo['uid']+"\">"+archivo['nombreDisplay']+"</a></li>"); 
        $("#pillsArchivosDesagregacionRegularHistorico").append(pillArchivo);

        var archivoPrescedente=$("#archivo"+archivo['uid']);

        if(archivoPrescedente.length==0){
            var paneArchivo = generarPaneArchivo(archivo);
            $("#tabContentArchivosDesagregacionRegularHistorico").append(paneArchivo);            
        }
       
        
    });

    $("#pillsArchivosDesagregacionRegularHistorico").find("a").first().trigger("click");

    archivos_actuales.forEach(function (archivo,index) {
        
        var pillArchivo = $("<li><a class=\"actual\" data-toggle=\"pill\" href=\"#archivo"+archivo['uid']+"\">"+archivo['nombreDisplay']+"</a></li>"); 
        $("#pillsArchivosDesagregacionRegularActual").append(pillArchivo);

        var archivoPrescedente=$("#archivo"+archivo['uid']);

        if(archivoPrescedente.length==0){

            var paneArchivo = generarPaneArchivo(archivo);  
            $("#tabContentArchivosDesagregacionRegularActual").append(paneArchivo);
        }
        
    });

    function generarPaneArchivo(archivo) {

        var tabPaneArchivo = $("#tab-pane-template").clone();
        tabPaneArchivo.attr("id","archivo"+archivo['uid']);

        var iframe= tabPaneArchivo.find("iframe");

        iframe.attr("id","iframe"+archivo['uid']);
        iframe.attr("src",archivo['link']);

        var btnGroup=tabPaneArchivo.find(".btn-group");

        _iOSDevice = !!navigator.platform.match(/iPhone|iPod|iPad/);
        if (_iOSDevice) {
            $('.fullscreen-button').remove();
        }else{
            var buttonFullscreen=tabPaneArchivo.find(".fullscreen-button");
            buttonFullscreen.data("iframe","iframe"+archivo['uid']);
        }       

        var buttonShare=tabPaneArchivo.find(".share-button");
        buttonShare.data("share-panel","share-panel"+archivo['uid']);
        buttonShare.data("link",archivo['link']);
        buttonShare.data("text",archivo['nombreDisplay']);

        var sharePanel=tabPaneArchivo.find(".share-panel");
        sharePanel.attr("id","share-panel"+archivo['uid']);

        var shareURL=sharePanel.find(".share-url");
        shareURL.val(archivo['link']);

        var embedURL=sharePanel.find(".embed-url");
        embedURL.val(embedURL.val().replace('LINK-TOKEN',archivo['link']));

        return tabPaneArchivo;

    }

    $("#pillsArchivosDesagregacionRegularActual").find("a").first().trigger("click");


    $('[data-toggle="tooltip"]').tooltip(); 

   

   
}

