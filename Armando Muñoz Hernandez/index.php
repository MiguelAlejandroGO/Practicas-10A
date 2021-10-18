<?php

$result = get_data('https://api.deezer.com/artist/27');

function get_data($url){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);
    return json_decode($result, true);
}

$name = $result['name'];
$picture = $result['picture_xl'];
$nb_album = $result['nb_album'];
$nb_fan = $result['nb_fan'];
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <title>App Shell Practica</title>
  </head>
  <body>
    <div class="jumbotron" id="home">
      <div class="container">
        <div class="text-center">
          <img src="<?= $picture; ?>" class="rounded-circle img-thumbnail">
          <h1 class="display-4"><?= $name; ?></h1>
          <h3 class="lead"><?= $nb_album; ?> Albums | <?= $nb_fan; ?> Fans</h3>
        </div>
      </div>
    </div>

    <section class="about" id="about">
      <div class="container">
        <div class="row mb-4">
          <div class="col text-center">
            <h2>Acerca de</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-5">
            <center>
            <p style= align="right">
            Daft Punk fue un dúo francés de french house formado por los DJ y productores Guy-Manuel de Homem-Christo y Thomas Bangalter. Daft Punk alcanzó una gran popularidad dentro del house a mediados de los años 90 en Francia y continuó con su éxito los años siguientes.  El dúo también es acreditado por la producción de canciones que se consideran esenciales en el estilo french house.
            </p>
            </center>
          </div>
          <div class="col-md-5">
            <center>
            <p style= align="right">
            Su último disco, el Random Access Memories fue considerado innovador para el género por su mezcla de instrumentación en vivo, sonidos disco, funk, rock y R&B, entre otros. El año pasado, la revista Rolling Stone lo ubicó en el número 295 de su lista de los "500 mejores álbumes de todos los tiempos".            </p>
            </center> 
            <br>
            <br>
            <br>         
          </div>
        </div>
      </div>
      <center>
      <iframe src="https://open.spotify.com/embed/playlist/1dSoeTDsDTFkQnTrIptCdU?theme=0" width="500" height="500" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
      </center>
      </section>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="app.js"></script>  
</body>
</html>