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
        <div class="col-4">

            <table class="table table-hover table-striped">
                <tbody>
                    <tr>
                        <th>Naam Leverancier:</th>
                        <td><?= $data['dataRows'][0]->LeverancierNaam; ?></td>
                    </tr>
                    <tr>
                        <th>Contactpersoon Leverancier:</th>
                        <td><?= $data['dataRows'][0]->Contactpersoon; ?></td>
                    </tr>
                    <tr>
                        <th>Leveranciernummer:</th>
                        <td><?= $data['dataRows'][0]->Leveranciernummer; ?></td>
                    </tr>
                    <tr>
                        <th>Mobiel:</th>
                        <td><?= $data['dataRows'][0]->Mobiel; ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="col-6"></div>
    </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            
            <table class="table table-hover table-striped">
                <thead>
                    <th>Naam product</th>
                    <th>Datum laatste levering</th>
                    <th>Aantal</th>
                    <th>Eerstvolgende levering</th>
                </thead>
                <tbody>
                    <?php if ($data['dataRows'][array_key_last($data['dataRows'])]->AantalAanwezig == 0) { ?>
                        <tr>
                            <td colspan="4" class="text-center text-danger">
                                Er is van dit van product op dit moment geen voorraad aanwezig<br> de verwachte eerstvolgende levering is: 
                                <span class="text-primary"><?= $data['dataRows'][array_key_last($data['dataRows'])]->DatumEerstVolgendeLevering; ?></span> 
                            </td>
                        </tr>

                    <?php header('Refresh:4; url=' . URLROOT . '/Magazijn/index'); }  else {
                    foreach ($data['dataRows'] as $levering) { ?>

                        <tr>
                            <td><?= $levering->ProductNaam; ?></td>
                            <td><?= $levering->DatumLevering ?></td>
                            <td><?= $levering->Aantal; ?></td>
                            <td><?= $levering->DatumEerstVolgendeLevering ?? "-"; ?></td>
                        </tr>
                    <?php } } ?>
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
