@extends('layout.master_layout')


@section('content')
<div class="row">


<div class="col-md-12" style="text-align: center">

    @if(isset($bResultaat) && $bResultaat == true)
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Succes! </strong> nieuwe levering toegevoegd!.
        </div>

    @elseif(isset($bResultaat) && $bResultaat == false)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <strong>Fout! </strong> Geen nieuwe levering toegevoegd.
        </div>
    @endif
</div>


</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Nieuwe levering</h3>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" action="{{route("postNieuweLevering")}}" method="post">
<div class="row">

    <div class="col-md-6" style="text-align: center">

            <div class="form-group">
                <label class="col-sm-4 control-label">Order nr</label>
                <div class="col-sm-8">
                    <input class="form-control" name="frmNewLeveringOrderNr"  type="number" required min="1"/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Bedrag</label>
                <div class="col-sm-8">
                    <input class="form-control" name="frmNewLeveringBedrag" value="10.50"  type="number" required/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Naam</label>
                <div class="col-sm-8">
                    <input class="form-control" name="frmNewLeveringNaam" placeholder="naam..." type="text" required/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Adres</label>
                <div class="col-sm-8">
                    <input class="form-control" name="frmNewLeveringAdres" id="frmAdres" placeholder="adres..." type="text" required/>
                    <input type="button" class="form-control"  id="frmToonMap" value="Toon adres op kaart"/>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-4 control-label">Telefoonnummer</label>
                <div class="col-sm-8">
                    <input class="form-control" name="frmNewLeveringTelefoon" placeholder="0488111111" type="tel" required/>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Betaling</label>
                <div class="col-sm-8">
                    <div class="radio radio-primary">
                        <input type="radio" name="frmNewLeveringBetaling" id="radio1" value="Betaald">
                        <label for="radio1">
                            Al betaald
                        </label>
                    </div>
                    <div class="radio radio-primary">
                        <input type="radio" name="frmNewLeveringBetaling" id="radio2" value="Niet Betaald" checked>
                        <label for="radio2">
                            Nog te betalen
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Nota</label>
                <div class="col-sm-8">
                    <textarea class="form-control" name="frmNewLeveringNota" rows="2" cols="20" required>Speciale wensen ...</textarea>
                </div>
            </div>

            <!-- Beveiliging als iemand uw session key heeft-->
            <input type="hidden" name="_token" value="{{Session::token()}}"/>


    </div>

    <div class="col-md-6" style="text-align: center">

            <div class="form-group">
                <label class="col-sm-4 control-label">Items:</label>
                <div class="col-sm-8">
                    <select  class="form-control" id="items" size="8"> <!--multiple-->
                        <optgroup label="Pizza">
                            <option>Hawai</option>
                            <option>Cannibale</option>
                            <option>Cheeseburger</option>
                            <option>Margerita</option>
                        </optgroup>

                        <optgroup label="Side">
                            <option>Chicken Box</option>
                            <option>Chickenitos</option>
                            <option>Kicken Chicken</option>
                            <option>Popcorn Chicken</option>
                        </optgroup>

                        <optgroup label="Pasta">
                            <option>Paste Rossa</option>
                            <option>Pasta Verde</option>
                            <option>Paste Bianca</option>
                        </optgroup>

                        <optgroup label="Drank">
                            <option>33cl Coca Cola</option>
                            <option>33cl Fanta</option>
                            <option>33cl Sprite</option>
                            <option>1.5L Coca Cola</option>
                            <option>1.5L Coca Cola Light</option>
                            <option>1.5L Coca Cola Zero</option>
                        </optgroup>





                    </select>
                </div>
            </div>



            <div class="form-group">
                <label class="col-sm-4 control-label">Winkelwagentje:</label>
                <div class="col-sm-8">
                    <select multiple class="form-control" id="selectedItems" size="8">


                    </select>
                </div>
            </div>
        <input type="hidden" name="frmLeveringItems" id="frmLeveringSelectedItems" />
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Toevoegen">

    </div>
</div>


</form>
    </div>
</div>

<div class="panel panel-default" id="Route">
    <div class="panel-heading">
        <h3 class="panel-title">Route</h3>
    </div>
    <div class="panel-body">
        <div class="row">

            <div class="col-md-12" >
                <div id="map"></div>
            </div>

        </div>
    </div>
</div>

@endsection