<?php
/**
 * Created by PhpStorm.
 * User: Soufiane
 * Date: 30/11/2016
 * Time: 16:56
 */<div class="row">

        <div class="col-sm-1"></div>

        <div class="col-sm-10">
            <h2 style="text-align: center">Leveringen</h2>
            <br><br>
            <table class="table table-striped custab">
                <thead>
                <tr>
                    <th>orderID</th><!--class="text-center"-->
                    <th>orderNR</th>
                    <th>Naam</th>
                    <th>Adres</th>
                    <th>Telefoon</th>
                    <th>Betaling</th>
                    <th>Bedrag(€)</th>
                    <th>Nota</th>
                    <th>Tijdstip</th>
                    <th>Actie</th>

                </tr>
                </thead>

@if(!empty($aLeveringen))
    @foreach($aLeveringen as $levering)
                        <?php //var_dump($persoon);?>
<tr>
    <td><?php echo $levering->id ;?></td>
    <td><?php echo $levering->ordernr ;?></td>
    <td><?php echo $levering->naam ;?></td>
    <td><?php echo $levering->adres ;?></td>
    <td><?php echo $levering->telefoon;?></td>
    <td><?php echo $levering->betaling;?></td>
    <td><?php echo $levering->bedrag; ?></td>
    <td><?php echo $levering->nota; ?></td>
    <td><?php echo $levering->timestamp; ?></td>
    <td ><a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Verwijderen</a></td>
</tr>

@endforeach
@else
<div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <strong>Fout! </strong> Geen leveringen in het systeem.
</div>

@endif



</table>


</div>
<div class="col-sm-1"></div>

</div>--}}