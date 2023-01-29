<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <title>Episodes</title>
    </head>
    <body>
        <h1>Episodes</h1>
        <div class="row">
            @forelse($episodes as $episode)
                <div class="col-3" style="display: flex">
                    <div class="card h-10" style="display: flex; flex-direction: column; flex-grow: 1; margin-bottom: 20px">
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
            @empty
                <h2>No new episodes to show</h2>
            @endforelse
        </div> 
    </body>
</html>
