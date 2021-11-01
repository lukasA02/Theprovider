function runshiiiht3(anv,losen){
    var jqxhr = $.ajax({
        method: "GET",
        url: "../bjudain.php",
        data: { anv: "TheAdmin", losen: "T000stef" }
      })


      .done(function(result) {
        //här får jag svaret 
        //"result" innehåller det som sidan svarar med, oftast då json 
        
        console.log(result);
        const obj = JSON.parse(result);
        //console.log(obj);
       // document.getElementById("resultat").innerHTML=obj; 
    
    var html = ""; 
    for(i=0; i<obj.length; i++) {
        html += 'ID: ' + obj[i].rattigheterID +  ' Event: ' + obj[i].eventID + ' Anvädare: ' + obj[i].anvandarID + '<br>';
    }       
        document.getElementById("resultat").innerHTML=html;

      })
      .fail(function() {
        alert( "error" );
      });
    }