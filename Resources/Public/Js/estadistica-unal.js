var countPreviewChange=1;

var period=1;

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

    period=$('#periodoTransicion').val();

    initWidthPreviewtabs();
    initPreviewFlow();   


});

$(document).on("click", ".tempTab, .switchingTab", function() {
    $('.tempTab').remove();
    countPreviewChange=period;
    index=$(this).data('index');
    putFiveIndicadoresCenteredAtIndex(index);
});



function putFiveIndicadoresCenteredAtIndex(index){


    var indicadores = $('#poolIndicadores').children();

    var k= 0

    for (var j = index+2; j >=index-2; j--) {
        var newIndicador = indicadores.eq(j%indicadores.length).clone()
        newIndicador.addClass('tempTab')
        newIndicador.removeClass('switchingTab')        
        newIndicador.removeClass('active')

        if(k==2){
            newIndicador.addClass('active')
            newIndicador.find('.colour-shifter').each(function() {
                var imgOriginal = $(this).find('.unBadgeImgOriginal')                       
                var imgAlternative = $(this).find('.unBadgeImgAlternative')
                imgOriginal.addClass('hidden');
                imgAlternative.removeClass('hidden');                       
           });
        }else{

            newIndicador.find('.colour-shifter').each(function() {
                var imgOriginal = $(this).find('.unBadgeImgOriginal')                       
                var imgAlternative = $(this).find('.unBadgeImgAlternative')
                imgAlternative.addClass('hidden');
                imgOriginal.removeClass('hidden'); 

            });
        }             
         
        $('#previewIndicadores').prepend(newIndicador);
       
        k++

    }

    

}

function initWidthPreviewtabs(){

    var tabsPreviewIndicador = $('.tabPreviewIndicador');
    // tabsPreviewIndicador.width((100/tabsPreviewIndicador.length)+"%");
    tabsPreviewIndicador.width((100/6)+"%");

}

function initPreviewFlow(){  
    setInterval(function() { previewFlowChanger() }, 1);

}

function previewFlowChanger(){
    countPreviewChange--;
    if(countPreviewChange==0){      
        countPreviewChange=period;
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
    nextTab.trigger("click");

}