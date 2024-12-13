<?php require_once APPROOT . '/views/includes/header.php'; ?>



<!-- Maak een nieuwe view aan voor deze link -->
<div class="container">
    <div class="row mt-3" style='<?= $data['messageVisibility']; ?>'>
            <div class="col-2"></div>
            <div class="col-8 text-center">
                <div class="alert alert-<?= $data['messageColor']; ?>" role="alert">
                    <?= $data['message']; ?>
                </div>
            </div>
            <div class="col-2"></div>
   </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h3><?= $data['title']; ?></h3>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <?php if (isset($data['pagination'])) { echo $data['pagination']->paginationView(); } ?>
        </div>
        <div class="col-2"></div>
    </div>


    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Barcode</th>
                        <th>Naam</th>
                        <th>Verpakkingseenheid</th>
                        <th>Aantalaanwezig</th>
                        <th>AllergenenInfo</th>
                        <th>LeverantieInfo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if (!isset($data['dataRows'])) {
                            echo '<tr><td colspan="6" class="text-center">Geen data beschikbaar</td></tr>';
                        } else {
                        foreach($data['dataRows'] as $product) { ?>
                        <tr>
                            <td><?= $product->Barcode; ?></td>
                            <td><?= $product->Naam; ?></td>
                            <td class="text-center"><?= $product->VerpakkingsEenheid; ?></td>
                            <td class="text-center"><?= $product->AantalAanwezig; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/magazijn/getProductPerAllergeenById/<?= $product->ProductId; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                
                            </td>
                            <td class="text-center">
                                <a href='<?= URLROOT; ?>/magazijn/getProductLeveringById/<?= $product->ProductId; ?>'><i class="bi bi-question-circle text-primary" ></i></a>
                            </td>
                        </tr>
                        <?php }} ?>

                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">              
            <h5 class="justify-content-begin"><a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left-square-fill"></i></a></h5>         
        </div>
        <div class="col-2"></div>
    </div>

    
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>