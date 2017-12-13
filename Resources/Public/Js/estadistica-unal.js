$(document).ready(function(){

    function initBannerList(){

        var cantidad_minima = 6
        var bannerList= $(".bannerList ul.nav-tabs")
        var cantidad_elementos=bannerList.children().length
        var cantidad_faltante= cantidad_minima-cantidad_elementos

        if(cantidad_faltante>0){

            if(cantidad_faltante%2==0){

                for (var i = cantidad_faltante/2; i > 0; i--) {
                    bannerList.prepend('<li></li>');                
                }

                for (var i = cantidad_faltante/2; i > 0; i--) {
                    bannerList.append('<li></li>');                
                }

            }else{

                var cantidad_minima = 7
                var cantidad_faltante= cantidad_minima-cantidad_elementos

                for (var i = cantidad_faltante/2; i > 0; i--) {
                    bannerList.prepend('<li></li>');                
                }

                for (var i = cantidad_faltante/2; i > 0; i--) {
                    bannerList.append('<li></li>');                
                }

            }   

        }
   
    }

    initBannerList()

    $('[data-toggle="tooltip"]').tooltip();

    $(".colour-shifter").hover(
    	function(){ //mouseover
    		var img = $(this).find('img')
    		uri_altbadge=img.data("altbadge")
    		img.attr("src",uri_altbadge)
        }, 
        function(){ //mouseout
        	var img = $(this).find('img')
        	var uri_badge = img.data("badge")
        	img.attr("src",uri_badge)
    	}
    );


    $(".estadistica").on('click', function(event) {

        event.preventDefault();

        var unBadgeData=$(this).find(".unBadgeData");
        var estadisticasTitle=unBadgeData.find("h5").text();
        var uriVerMas=unBadgeData.find("h6").text();

        $("#modalTitle").html(estadisticasTitle);
        $("#linkDashboardTitle").attr("href", uriVerMas)

        url_action=this.href;

        $.ajax({url: url_action,

				success: function(result){

    				//console.log(result);
    				$("#dashboard").modal();
    				$("#modalBody").html(result);
                    dragscroll.reset();
                    $('[data-toggle="tooltip"]').tooltip(); 

            	},
                
            	error: function(xhr){
                	alert("Error: " + xhr.status + " " + xhr.statusText);
            	}

        });
    });


});