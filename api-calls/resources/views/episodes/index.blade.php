<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Episodes</title>
    </head>
    <body>
        <h1>Episodes</h1>
        @foreach($episodes as $episode)
        <div class="col">
            <div class="card h-100">
            <img src="<?= $episode->image; ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $episode->name ?></h5>
                <p class="card-text"><?= $episode->summary ?></p>
            </div>
            <div class="card-footer">
            <small class="text-muted">Season <?= $episode->season; ?>, Episode <?= $episode->episode; ?></small>
            </div>
            </div>
        </div>
        @endforeach
        {{ dd($episodes) }}
    </body>
</html>
