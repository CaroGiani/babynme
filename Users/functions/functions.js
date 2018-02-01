function getDate(){
			
			var s_date=document.getElementById("d_one").value;
			if(s_date!=""){
				document.getElementById("d_two").value= s_date;
			}
			else{
				var err="WHEN WAS YOUR LAST PERIOD?"
				document.getElementById("d_two").value= err;
			}	
}
function getBab(){
	var s_date=document.getElementById("d_one").value;
			if(s_date!=""){
				document.getElementById("d_two").value= s_date;
			}
			else{
				var err="WHEN WAS YOUR LAST PERIOD?"
				document.getElementById("d_two").value= err;
			}	
}

function Visionprintreceipt()
{ 
  var disp_setting="toolbar=yes,location=no,directories=yes,menubar=yes,"; 
      disp_setting+="scrollbars=yes,width=700, height=400, left=100, top=25"; 
  var content_vlue = document.getElementById("print_content").innerHTML; 
  
  var docprint=window.open("","",disp_setting); 
   docprint.document.open(); 
   docprint.document.write('<html><head><title>DECREMENTA SYSTEM REPORT</title>'); 
   docprint.document.write('</head><body onLoad="self.print()" style="width:800px; font-size:12px; font-family:arial Narrow;text-shadow:0 1px 1px rgba(0,0,0,.1); border: 1px solid black;">');          
   docprint.document.write(content_vlue);          
   docprint.document.write('</body></html>'); 
   docprint.document.close(); 
   docprint.focus(); 
}

