@extends('layout.master_layout')


@section('content')

    <script type="text/javascript">

        $( document).ready(function(){
            var children = $("#main").children();
            console.log(children);
            for(var a = 0; a < children.length ; a ++){
               var id = children[a].children[1].children[0].children[2].children[0].id;
                createQrCode(id.substr(6));
            }

            function createQrCode(id){

                var qrcode = new QRCode(document.getElementById("qrcode" + id), {
                    width : 150,
                    height : 150
                });

                url = "<?php $host= gethostname(); echo gethostbyname($host);?>"   + "/api/" + id;

                qrcode.makeCode(url);
            }
        });




    </script>
    <div id="main">
    @if(!empty($aLeveringen))
        @foreach($aLeveringen as $levering)

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Order nr <?php echo $levering->ordernr ;?></h3>
                </div>
                <div class="panel-body">

                    <div class="row">

                        <div class="col-sm-4">
                            <table>
                                <tr>
                                    <td><label>Naam:</label></td>
                                    <td><?php echo $levering->naam ;?></td>
                                </tr>
                                <tr>
                                    <td><label>Adres:</label></td>
                                    <td><?php echo $levering->adres ;?></td>
                                </tr>
                                <tr>
                                    <td><label>Telefoon:</label></td>
                                    <td><?php echo $levering->telefoon ;?></td>
                                </tr>
                                <tr>
                                    <td><label>Nota:</label></td>
                                    <td><?php echo $levering->nota ;?></td>
                                </tr>
                                <tr>
                                    <td><label>Betaling:</label></td>
                                    <td><?php echo $levering->betaling ;?></td>
                                </tr>
                                <tr>
                                    <td><label>Bedrag:</label></td>
                                    <td><?php echo $levering->bedrag ;?></td>
                                </tr>

                            </table>


                        </div>

                        <div class="col-sm-4">
                            <label>Bestelling:</label>
                            <ul>
                                <?php
                                $test = json_decode($levering->bestelling);
                                /*foreach($test as $value) {
                                    echo $value;
                                }*/
                                for($i = 0; $i < count($test); ++$i) {
                                ?>
                                <li><?php echo $test[$i]; ?></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>


                        <div class="col-sm-4">
                            <div id="qrcode<?php echo $levering->id ;?>" style="width:100px; height:100px; margin-top:15px;"></div>
                        </div>



                    </div>

                </div>
            </div>
        @endforeach

    @else
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Fout! </strong> Geen leveringen in het systeem.
        </div>



    @endif
    </div>
@endsection