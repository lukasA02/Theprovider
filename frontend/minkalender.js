function runshiiiht3(anv,losen){
    var jqxhr = $.ajax({
        method: "GET",
        url: "../minkalender.php",
        data: { anv: "TheAdmin", losen: "T000stef" }
      })


      .done(function(result) {
        //här får jag svaret
        //"result" innehåller det som sidan svarar med, oftast då json

        console.log(result);
        console.log(result.slice(0, 28)); // {"aid":"1","hash":000000000}
        result = result.replace(result.slice(0, 28), "");
        console.log(result);
        const obj = JSON.parse(result);
        console.log(obj);
       // document.getElementById("resultat").innerHTML=obj;

    var html = "";
    for(i=0; i<obj.length; i++) {
        html += 'ID: ' + obj[i].ID +  ' Namn: ' + obj[i].Namn + ' Ägare: ' + obj[i].Agare + ' Start tid: ' + obj[i].Starttid + ' Slut tid: ' + obj[i].Sluttid + '<br>';
    }
        document.getElementById("resultat").innerHTML=html;

      })
      .fail(function() {
        alert( "error" );
      });
    }