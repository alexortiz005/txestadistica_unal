$(document).on("click",".estadistica",function(event){ 

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
        var paneArchivo = $("<div  class=\"player tab-pane fade\"></div>");
        paneArchivo.attr("id","archivo"+archivo['uid']);

        var iframe = $("<iframe frameborder=\"0\"></iframe>");
        iframe.attr("id","iframe"+archivo['uid']);
        iframe.attr("src",archivo['link']);

        var btnGroup=$("<div class=\"btn-group btn-group-justified\"></div>");

        var buttonFullscreen=$("<a  class=\"btn btn-info\" onclick=\"FullScreenHelper.toggle(document.getElementById('iframe"+archivo['uid']+"'));\"> Pantalla Completa <span class=\"glyphicon glyphicon-fullscreen\"> </a> ")
        var buttonShare=$("<a  class=\"btn btn-success\"> Compartir <span class=\"glyphicon glyphicon-share-alt\"> </a> ")

        btnGroup.append(buttonFullscreen);
        btnGroup.append(buttonShare);

        paneArchivo.append(iframe);
        paneArchivo.append(btnGroup);

        return paneArchivo;

    }

    $("#pillsArchivosDesagregacionRegularActual").find("a").first().trigger("click");


    $('[data-toggle="tooltip"]').tooltip(); 

   

   
}

