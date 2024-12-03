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
            <table class="table table-hover">
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
                        foreach($data['dataRows'] as $product) { ?>
                        <tr>
                            <td><?= $product->Barcode; ?></td>
                            <td><?= $product->Naam; ?></td>
                            <td><?= $product->VerpakkingsEenheid; ?></td>
                            <td><?= $product->AantalAanwezig; ?></td>
                            <td class="text-center">
                                <a href="<?= URLROOT; ?>/magazijn/getProductPerAllergeenById/<?= $product->ProductId; ?>"><i class="bi bi-x-circle text-danger"></i></a>
                                
                            </td>
                            <td class="text-center">
                                <a href='<?= URLROOT; ?>/magazijn/getProductLeveringById/<?= $product->ProductId; ?>'><i class="bi bi-question-circle text-primary" ></i></a>
                            </td>
                        </tr>
                        <?php } ?>

                </tbody>
            </table>
        </div>
        <div class="col-2"></div>
    </div>

    <div class="row mt-3">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="row">
                <div class="col-6">
                    <nav class="pagination justify-content-begin">Homepage&nbsp;<a href="<?= URLROOT; ?>/homepages/index"><i class="bi bi-arrow-left-square-fill"></i></a></nav>

                </div>
                <div class="col-6">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination pagination-sm justify-content-end">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link" href="<?= URLROOT; ?>/magazijn/index/5/0">1</a></li>
                            <li class="page-item"><a class="page-link" href="<?= URLROOT; ?>/magazijn/index/5/5">2</a></li>
                            <li class="page-item"><a class="page-link" href="<?= URLROOT; ?>/magazijn/index/5/10">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>    
                </div>
            </div>
            
        </div>
        <div class="col-2"></div>
    </div>
</div>

<?php require_once APPROOT . '/views/includes/footer.php'; ?>