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
                 styles: {overflow: 'linebreak',
                          lineColor: [22, 140, 183],
                          lineWidth: 1},
                 headerStyles: {
                      lineWidth: 0
                  },
                  columnStyles: { 
                                0: { columnWidth: 'wrap' },                           
                                2: { columnWidth: 'wrap' },                           
                               },
                margin: {top: 80},
                addPageContent: function(data) {

                  doc.text(name, 150, 60);

                  var imgData = 'data:image/jpeg;base64,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';
                  doc.addImage(imgData, 'JPEG', 40, 30,100,40);
            
                  var width = doc.internal.pageSize.getWidth();    
                  var height = doc.internal.pageSize.getHeight();

                  doc.setFontSize(10);
                  doc.text(""+data.pageCount, width/2, height-20);

                  doc.text("DNPE UNAL", width-100, height-20);
                
                    
                }
                }
                );
  doc.save(name+".pdf");
  

})

