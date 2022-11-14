"use strict";

window.addEventListener('onload', function(){
    var country_btn = document.getElementById("lookup_country");
    var city_btn = document.getElementById("lookup_cities");
    var lookup = document.querySelector("#country");
    var result = document.querySelector("#result");


    country_btn.addEventListener("click", function(){
        var val = lookup.value;
        var request = new XMLHttpRequest();

        var url = "http://localhost/info2180-lab5/world.php?country="+val+"&context=''";

        request.onreadystatechange = getData;
        request.open("GET", url);
        request.send();
    });

    city_btn.addEventListener("click", function(){
        var val = lookup.value;
        var request = new XMLHttpRequest();

        var url = "http://localhost/info2180-lab5/world.php?country="+val+"&context=cities";

        request.onreadystatechange = getData;
        request.open("GET", url);
        request.send();
    });


    var request =fetch(url).then((response) =>{
        var res = request.text();
        return res;
    });   
    console.log(request);
    res = result.innerHTML; 
});
