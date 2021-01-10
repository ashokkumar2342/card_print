<?php 


 exec("java -jar pdfbox-app.jar Decrypt -password ASHO1991 ak.pdf");
 // exec("java -jar pdfbox-app.jar ExtractImages ak.pdf");
 // exec("java -jar pdfbox-app.jar ExtractText ak.pdf");
 exec("java -jar pdfbox-app.jar PDFToImage -imageType png -dpi 300 -cropbox 35 100 290 260 ak.pdf");
 // exec("java -jar pdfbox-app.jar PDFToImage -imageType png -dpi 300 -cropbox 290 260 0 0 secure3.pdf");
 
echo 'success';

?>