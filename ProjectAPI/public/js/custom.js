
/**
 * Created by Soufiane on 27/11/2016.
 */
$(document).ready(function(){
    $("#frmToonMap").hide();
    $("#Route").hide();


    var selectedItems = [];

    // Items toevoegen
    $("#items").click(function(){

        $("#items :selected").each(function(){
            selectedItems.push($(this).val());
             $("#selectedItems").append("<option>" + $(this).val()+ "</option>");
            $("#frmLeveringSelectedItems").val(JSON.stringify(selectedItems));
            alert($("#frmLeveringSelectedItems").val());
        });
        //alert(selectedItems);
        return false;
    });


    // Items verwijderen
    $("#selectedItems").click(function(){

        $("#selectedItems :selected").each(function(){
            selectedItems.pop($(this).val());


        });
        $('#selectedItems').empty();

        $.each(selectedItems, function(key, value) {
            $('#selectedItems').append($("<option/>", {
                value: key,
                text: value
            }));
        });
        $("#frmLeveringSelectedItems").val(JSON.stringify(selectedItems));
        alert($("#frmLeveringSelectedItems").val());s
        //alert(selectedItems);

    });


    $("#frmAdres").click(function(){

        if ($("#frmAdres").val() != ""){
            $("#frmToonMap").show();
        }

    });

    $("#frmToonMap").click(function(){

        toonMap($("#frmAdres").val());


    });



    function toonMap(adres){
        $("#Route").show();

        var winkelAdres = new google.maps.LatLng(50.930997, 5.328689);
        var destinationAdres = "";
        var shopIconUrl = "../img/logoSmall.png";
        var destinationIconUrl="../img/destinationIcon.png";

        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: winkelAdres
        });
        var marker = new google.maps.Marker({
            position: winkelAdres,
            map: map,
            icon: shopIconUrl
        });

        var geocoder = new google.maps.Geocoder;
        geocoder.geocode( { 'address': adres}, function(results, status) {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                destinationAdres = results[0].geometry.location;
                var marker = new google.maps.Marker({
                    position: results[0].geometry.location,
                    map: map,
                    icon: destinationIconUrl
                });

            } else {
                alert('Fout! Kan het adres niet vinden. ' + status);
            }
        });

          /*var directionsService = new google.maps.DirectionsService();
                alert(winkelAdres +"  "+ destinationAdres);
                var directionsRequest = {
                  origin: winkelAdres,
                  destination: destinationAdres,
                  travelMode: google.maps.DirectionsTravelMode.DRIVING,
                  unitSystem: google.maps.UnitSystem.METRIC
                };
                directionsService.route(
                  directionsRequest,
                  function(response, status)
                  {
                    alert(status);
                      if (status == google.maps.DirectionsStatus.OK)
                    {
                      new google.maps.DirectionsRenderer({
                        map: map,
                        directions: response,
                        suppressMarkers:true
                      });
                    }
                    else
                      $("#error").append("Unable to retrieve your route<br />");
                  }
                );*/
    }






});