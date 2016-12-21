
/**
 * Created by Soufiane on 27/11/2016.
 */
$(document).ready(function(){
    $("#frmToonMap").hide();
    $("#Route").hide();


    var selectedItems = [];
    var totaal = 0;
    var alleItems = [];

    // Items toevoegen
    $("#items").click(function(){

        $("#items :selected").each(function(){
            var nieuweItem = [];
            nieuweItem ["naam"] = $(this).text();
            nieuweItem ["prijs"] = $(this).val();

            alleItems.push(nieuweItem);
            console.log(alleItems);
            console.log(selectedItems);
            selectedItems.push($(this).text());
            $("#selectedItems").append("<option>" + $(this).text()+ "</option>");
            $("#frmLeveringSelectedItems").val(JSON.stringify(selectedItems));

            totaal += parseFloat($(this).val());

            $("#frmNewLeveringBedrag").val(String(totaal));

            console.log( $("#frmNewLeveringBedrag").val());
        });
        //alert(selectedItems);
        return false;
    });


    // Items verwijderen
    $("#selectedItems").click(function(){

        $("#selectedItems option:selected").each(function(){
            var geselecteerd = $(this).text();
            console.log($(this).val());
            $.each(alleItems, function(key, value) {
                if (value !=null) {
                    if (value["naam"] == geselecteerd) {
                       // alert("index " + key + value["naam"]);
                        alleItems.splice(key, 1);
                        totaal -= value["prijs"];
                        $("#frmNewLeveringBedrag").val(String(totaal));
                    } else {

                    }
                }
            });
        });

        $('#selectedItems').empty();
        selectedItems  = [];
        $.each(alleItems, function(key, value) {
            $('#selectedItems')
                    .append($("<option></option>")
                    .attr("value",parseInt(value["prijs"]))
                    .text(value["naam"])
                );
            selectedItems.push(value["naam"]);
        });

        $("#frmLeveringSelectedItems").val(JSON.stringify(selectedItems));
        console.log($("#frmLeveringSelectedItems").val());
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

                var directionsService = new google.maps.DirectionsService();
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
                );
            } else {
                alert('Fout! Kan het adres niet vinden. '); // + status
            }
        });


    }






});