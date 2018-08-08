function elementToPDF(element_selector) {


  

}

$(".tableToPDF").click(function() {
  

  var name=$(this).data("name")

  var doc = new jsPDF('l', 'pt', 'letter')
  var elem = document.getElementById($(this).data("table"));
  var res = doc.autoTableHtmlToJson(elem);
  doc.autoTable(res.columns, 
                res.data,                
                {theme: 'striped',
                 styles: {overflow: 'linebreak'},
                 columnStyles: { 
                                0: { columnWidth: 'wrap' },                            
                               },
                margin: {top: 80},
                addPageContent: function(data) {
                  doc.text(name, 150, 60);
                  var img = new Image;
                  img.onload = function() {
                      doc.addImage(this, 40, 30,100,40);
                      doc.save(name+".pdf");
                  };
                  img.crossOrigin = "";  // for demo as we are at different origin than image
                  img.src = "/typo3conf/ext/estadistica_unal/Resources/Public/Images/escudo_unal.jpeg";  
                }
                }
                );
  

})

