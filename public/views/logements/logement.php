<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 py-5">
            <h1 class="text-center">Logement N°</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Adresse</th>
                        <th>Surface</th>
                        <th>Type</th>
                        <th>Prix</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><?= $logement['titre'] ?></td>
                        <td><?= $logement['adresse'] ?>, <?= $logement['ville'] ?> (<?= $logement['cp'] ?>)</td>
                        <td><?= $logement['surface'] ?></td>
                        <td><?= $logement['type'] ?></td>
                        <td><?= $logement['prix'] ?></td>
                        <td><img height="100px" src="<?= $logement['photo'] ?>" /></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>