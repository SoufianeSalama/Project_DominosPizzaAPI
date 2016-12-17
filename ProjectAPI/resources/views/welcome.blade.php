<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Project Domino's Pizza API</title>


    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">


    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
</head>
<body>

<div class="container" style="margin-top:80px">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4" >

            <div class="panel panel-default">
                <div class="panel-heading">
                    <strong>Welkom</strong>
                </div>
                <div class="panel-body">


                        <fieldset>
                            <div class="row"  style="margin-bottom:50px">
                                <div class="center-block" style="text-align: center;">
                                    <img src="../img/logo.png" alt="logo">
                                </div>
                            </div>

                            <div class="row">

                                    <div class="col-sm-12 col-md-10  col-md-offset-1 ">
                                        {{--<div class="form-group">
                                            <label for="key" class="sr-only">Gebruikersnaam</label>
                                            <input type="text" name="frmInloggenGebruikersnaam" id="key" class="form-control" placeholder="Gebruikersnaam">
                                        </div>

                                        <div class="form-group">
                                            <label for="key" class="sr-only">Wachtwoord</label>
                                            <input type="password" name="frmInloggenWachtwoord" id="key" class="form-control" placeholder="Wachtwoord">
                                        </div>--}}
                                        <br><br>

                                        <div class="form-group">
                                            <a href="/dashboard/test"><input  type="submit" class="btn btn-lg btn-primary btn-block" value="Welkom"></a>
                                        </div>
                                    </div>
                                    <!-- Beveiliging als iemand uw session key heeft
                                    <input type="hidden" name="_token" value="{{Session::token()}}"/>-->

                            </div>
                        </fieldset>

                </div>

            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>