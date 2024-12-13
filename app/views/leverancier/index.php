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

        <div class="row">
          <div class="col-2"></div>
          <div class="col-8">
            <table class="table table-striped table-hover">
              <thead>
                <th>Naam</th>
                <th>Contactpersoon</th>
                <th>Leveranciernummer</th>
                <th>Mobiel</th>
                <th>Aantal producten</th>
                <th>Toon Producten</th>
              </thead>
              <tbody>
                <?php foreach ($data['dataRows'] as $row) : ?>
                    <tr>
                        <td><?= $row->Naam; ?></td>
                        <td><?= $row->Contactpersoon; ?></td>
                        <td><?= $row->LeverancierNummer; ?></td>
                        <td><?= $row->Mobiel; ?></td>
                        <td class="text-center"><?= $row->AantalProducten; ?></td>
                        <td class="text-center">
                          <a href="<?= URLROOT; ?>/Leverancier/geleverdeproducten/<?= $row->Id; ?>">
                            <i class="bi bi-box-fill text-primary"></i>
                          </a>                          
                        </td>
                    </tr>
                  <?php endforeach; ?>
              </tbody>
            </table>
          </div>
          <div class="col-2"></div>
        </div>
    </div>
    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>