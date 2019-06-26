<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 py-5">
            <form class="mt-3" method="post" action="<?= url('ajouter-logement') ?>" enctype="multipart/form-data">
                <h6 class="text-center">Remplissez ce formulaire pour ajouter un logement</h6>
                <small class="my-2">Les champs signalés avec &#42; sont obligatoires</small>
                
                <div class="form-group">
                    <label for="title">Titre &#42;</label>
                    <input type="text" name="title" id="title" class="form-control">
                </div>

                <div class="form-group">
                    <label for="address">Adresse &#42;</label>
                    <input type="text" name="address" id="address" class="form-control">
                </div>

                <div class="form-group">
                    <label for="city">Ville &#42;</label>
                    <input type="text" name="city" id="city" class="form-control">
                </div>

                <div class="form-group">
                    <label for="cp">Code Postal &#42;</label>
                    <input type="text" name="cp" id="cp" class="form-control">
                </div>

                <div class="form-group">
                    <label for="surface">Surface &#42;</label>
                    <input type="text" name="surface" id="surface" class="form-control">
                </div>

                <div class="form-group">
                    <label for="price">Prix &#42;</label>
                    <input type="text" name="price" id="price" class="form-control">
                </div>

                <p>Type de logement &#42;</p>
                <div>
                    <input type="radio" id="location" name="type" value="location" checked>
                    <label for="location">Location</label>
                </div>
                <div class="my-2">
                    <input type="radio" id="vente" name="type" value="vente">
                    <label for="vente">Vente</label>
                </div>

                <div class="my-2">
                    <label for="photo">Image du logement:</label>
                    <input type="file" id="photo" name="photo">
                </div>


                <div class="form-group">
                    <label for="description">Description du logement</label>
                    <textarea class="form-control" id="description" name="description" rows="5" columns="10"></textarea>
                </div>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
</div>



<?php $content = ob_get_clean() ?>
<?php view('template', compact('content')); ?>