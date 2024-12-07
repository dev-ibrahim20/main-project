<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Youtube Views</title>
</head>
<body>
    <div class="flex-center position-ref full-height">
        <div class="title m-b-md text-center">
            <h1>Video Views ({{$video->viewers}})</h1>
        </div>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/FWwYhBHrEpE?si=1UpCp33S2V22-jAh" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
    </div>
</body>
</html>