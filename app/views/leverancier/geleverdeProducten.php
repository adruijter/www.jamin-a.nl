<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leveranciers Overzicht</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
  <body>

    <div class="container mt-3">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-primary">
                <h3><u>Overzicht Leveranciers</u></h3>
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

        <div class="row mt-2">
            <div class="col-2"></div>
            <div class="col-4">
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <th>Naam Leverancier: </th> 
                            <td><?= $data['dataRows'][0]->LeverancierNaam; ?></td>                       
                        </tr>
                        <tr>
                            <th>Contactpersoon: </th>
                            <td><?= $data['dataRows'][0]->Contactpersoon; ?></td>
                        </tr>
                        <tr>
                            <th>Leveranciernummer: </th>
                            <td><?= $data['dataRows'][0]->LeverancierNummer; ?></td>
                        </tr>
                        <tr>
                            <th>Mobiel: </th>
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
            <table class="table table-striped table-hover">
              <thead>
                <th>Naam Product</th>
                <th>Aantal in Magazijn</th>
                <th>Verpakkingseenheid</th>
                <th>Laatste Levering</th>
                <th>Nieuwe levering</th>
              </thead>
              <tbody>
                <!-- <?php var_dump($data['dataRows']); ?> -->
                <?php foreach ($data['dataRows'] as $row) : ?>
                    <tr>
                        <td><?= $row->LeverancierNaam; ?></td> 
                        <td><?= $row->AantalInMagazijn; ?></td>
                        <td><?= $row->VerpakkingsEenheid; ?></td>
                        <td><?= $row->LaatsteLevering; ?></td>
                        <td class="text-center">
                          <a href="<?= URLROOT; ?>/Leverancier/geleverdeproducten/<?= $row->Id; ?>">
                          <i class="bi bi-plus-square-fill"></i>
                          </a>                          
                        </td>
                    </tr>
                  <?php endforeach; ?>
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
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>