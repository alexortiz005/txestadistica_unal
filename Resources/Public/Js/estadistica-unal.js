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

    //codigo para estadisticas preview

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

    $('#indicadores').slick({
        centerMode: true,
        centerPadding: '1%',
        infinite: true,
        autoplay: true,
        autoplaySpeed: $('#periodoTransicion').val(),
        slidesToShow: 5,
        focusOnSelect: true,
        responsive: [
        {
          breakpoint: 768,
          settings: {
            arrows: true,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 3
          }
        },
        {
          breakpoint: 480,
          settings: {
            arrows: true,
            centerMode: true,
            centerPadding: '40px',
            slidesToShow: 1
          }
        }
        ]
    });

    // On before slide change
    $('#indicadores').on('afterChange', function(event, slick, currentSlide, nextSlide){
        $('.slick-center').find(".tabPreviewIndicador").first().find('a').trigger('click')
        $('.slick-center').find(".unBadgeImgAlternative").removeClass('hidden');
        $('.slick-center').find(".unBadgeImgOriginal").addClass('hidden');


    })

    $('#indicadores').on('beforeChange', function(event, slick, currentSlide, nextSlide){
        $(".slick-slide").find(".unBadgeImgAlternative").addClass('hidden');
        $(".slick-slide").find(".unBadgeImgOriginal").removeClass('hidden');

    })


    $('.slick-center').first().find('a').trigger('click')

   
    function setHeightsTabPreviewIndicador(){

        var maxHeight=0;

        $('.tabPreviewIndicador').each(function( index ) {
            if($(this).height()>maxHeight){
                maxHeight=$(this).height()
            }
        });

        $('.tabPreviewIndicador').each(function( index ) {
            $(this).height(maxHeight);           
        });
    
    }

    setHeightsTabPreviewIndicador();


});




