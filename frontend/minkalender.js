function runshiiiht3(aid,hash){
    var jqxhr = $.ajax({
        method: "GET",
        url: "../minkalender.php",
        data: { aid: 1, hash: 123456789 }
      })


      .done(function(result) {
        //här får jag svaret
        //"result" innehåller det som sidan svarar med, oftast då json

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