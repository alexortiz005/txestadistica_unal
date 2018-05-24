var countPreviewChange=0;

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

    $('.switchingTab').click(function() {
      countPreviewChange=0;
    });


    period=$('#periodoTransicion').val();


    initWidthPreviewtabs();
    initPreviewFlow(period);

    



});

function initWidthPreviewtabs(){

    var tabsPreviewEstadistica = $('.tabPreviewEstadistica');
    tabsPreviewEstadistica.width((100/tabsPreviewEstadistica.length)+"%");

}

function initPreviewFlow(period){  
    setInterval(function() { previewFlowChanger(period) }, 1);

}

function previewFlowChanger(period){
    countPreviewChange++;
    if(countPreviewChange==period){      
        countPreviewChange=0;
        nextTabPreview();
    }
}

function nextTabPreview(){

    var switchingTabs =$('.switchingTab');
    var switchingTabsSize=switchingTabs.length;
    var nextIndex=0;

    switchingTabs.each(function(index){
        if($(this).hasClass('active')){
            nextIndex=(index+1)%switchingTabsSize;
        }

        $(this).find("a").blur();
    });


    var nextTab = switchingTabs.eq(nextIndex);

    nextTab.find("a").trigger("click");

}