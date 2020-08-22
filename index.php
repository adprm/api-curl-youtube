<?php

function get_Curl($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($curl);
    curl_close($curl);

    return json_decode($result, true);
}
// data pewdiepie
$result = get_Curl('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UC-lHJZR3Gqxm24_Vd_AJ5Yw&key=AIzaSyBGvMrA68EmULGGXoE0CkjbOkTpbOlUPWA');

$pewdiepiePic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$pewdiepieName = $result['items'][0]['snippet']['title'];
$pewdiepieSubscriber = $result['items'][0]['statistics']['subscriberCount'];

$result = get_Curl('https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UC-lHJZR3Gqxm24_Vd_AJ5Yw&maxResults=1&key=AIzaSyBGvMrA68EmULGGXoE0CkjbOkTpbOlUPWA&order=date');
$pewdiepieLatestVideo = $result['items'][0]['id']['videoId'];

// data t-series
$result = get_Curl('https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCq-Fj5jknLsUf-MWSy4_brA&key=AIzaSyBGvMrA68EmULGGXoE0CkjbOkTpbOlUPWA');

$tseriesPic = $result['items'][0]['snippet']['thumbnails']['medium']['url'];
$tseriesName = $result['items'][0]['snippet']['title'];
$tseriesSubscriber = $result['items'][0]['statistics']['subscriberCount'];

$result = get_Curl('https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCq-Fj5jknLsUf-MWSy4_brA&maxResults=1&key=AIzaSyBGvMrA68EmULGGXoE0CkjbOkTpbOlUPWA&order=date');
$tseriesLatestVideo = $result['items'][0]['id']['videoId'];

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>API-CURL-Youtube</title>
  </head>
  <body>
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="font-weight-light">Youtube API with CURL</h1>
                    <!-- content -->
                    <div class="row justify-content-center pt-4">
                    <!-- youtube -->
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?= $pewdiepiePic; ?>" width="200" class="rounded-circle img-thumbnail">
                                </div>
                                <div class="col-md-8">
                                    <h5><?= $pewdiepieName; ?><h5>
                                    <p><?= $pewdiepieSubscriber; ?> Subscribers.</p>
                                    <div class="g-ytsubscribe" data-channelid="UC-lHJZR3Gqxm24_Vd_AJ5Yw" data-layout="default" data-count="default"></div>
                                </div>
                            </div>
                            <div class="row mt-3 pb-3">
                                <div class="col">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $pewdiepieLatestVideo; ?>" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="<?= $tseriesPic; ?>" width="200" class="rounded-circle img-thumbnail">
                                </div>
                                <div class="col-md-8">
                                    <h5><?= $tseriesName; ?><h5>
                                    <p><?= $tseriesSubscriber; ?> Subscribers.</p>
                                    <div class="g-ytsubscribe" data-channelid="UCq-Fj5jknLsUf-MWSy4_brA" data-layout="default" data-count="default"></div>
                                </div>
                            </div>
                            <div class="row mt-3 pb-3">
                                <div class="col">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $tseriesLatestVideo; ?>" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <div style="height: 100px"></div>
                <p class="lead mb-0">https://adprm.github.io</p>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://apis.google.com/js/platform.js"></script>
  </body>
</html>