@extends('layout.master_layout')


@section('content')

    <div class="row">

        <div class="col-md-3"></div>

        <div class="col-md-6">
            <h2 style="text-align: center">Personeelsleden</h2>
            <br><br>
            <table class="table table-striped custab">
                <thead>
                <tr>
                    <th>ID</th><!--class="text-center"-->
                    <th>Naam</th>
                    <th>Gebruikersnaam</th>
                    <th>Acces Level</th>
                    <th >Action</th>
                </tr>
                </thead>

                @if(!empty($aPersoneel))
                    @foreach($aPersoneel as $persoon)
                        <?php //var_dump($persoon);?>
                        <tr>
                            <td><?php echo $persoon->id ;?></td>
                            <td><?php echo $persoon->naam;?></td>
                            <td><?php echo $persoon->gebruikersnaam; ?></td>
                            <td>1 (Personeelslid) </td>
                            <td ><a href="#" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-remove"></span> Verwijderen</a></td>
                        </tr>

                    @endforeach
                @else
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <strong>Fout! </strong> Geen personeelsleden in het systeem.
                    </div>

                @endif



            </table>


        </div>
        <div class="col-md-3"></div>

    </div>
@endsection