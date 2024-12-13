<?php require_once APPROOT . '/views/includes/header.php'; ?>

<!-- Maak een nieuwe view aan voor deze link -->
<div class="container">
    <div class="row mt-3" style='<?= $data['messageVisibility']; ?>'>
            <div class="col-4"></div>
            <div class="col-4 text-center">
                <div class="alert alert-<?= $data['messageColor']; ?>" role="alert">
                    <?= $data['message']; ?>
                </div>
            </div>
            <div class="col-4"></div>
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

            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>Naam:</th>
                        <td><?= $data['dataRows'][0]->ProductNaam; ?></td>
                    </tr>
                    <tr>
                        <th>Barcode:</th>
                        <td><?= $data['dataRows'][0]->Barcode; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            
            <table class="table table-hover">
                <thead>
                    <th>Naam Allergeen</th>
                    <th>Omschrijving Allergeen</th>
                </thead>
                <tbody>
                    <?php if ($data['dataRows'][array_key_last($data['dataRows'])]->AllergeenNaam == NULL) { ?>
                        <tr>
                            <td colspan="2" class="text-center text-danger">
                            In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken 
                            </td>
                        </tr>

                    <?php header('Refresh:4; url=' . URLROOT . '/Magazijn/index'); } else {
                        foreach ($data['dataRows'] as $allergeenInfo) : ?>

                            <tr>
                                <td><?= $allergeenInfo->AllergeenNaam; ?></td>
                                <td><?= $allergeenInfo->Omschrijving; ?></td>
                            </tr>
                        <?php endforeach; 
                    } ?>
                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>

    
    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <h5><a href="<?= URLROOT; ?>/Magazijn/index"><i class="bi bi-arrow-left-square-fill"></i></a></h5>
        </div>
        <div class="col-2"></div>

    </div>
    


<?php require_once APPROOT . '/views/includes/footer.php'; ?>
