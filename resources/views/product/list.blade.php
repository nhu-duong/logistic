<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Blockchain mock app back-office!</title>
  </head>
  <body>
    <h1>Hello, admin!</h1>
    <?php
    $statuses = ["New", "Purchased", "Activated"];
    ?>
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Code</th>
            <th scope="col">Status</th>
            <th scope="col">Purchased By</th>
            <th scope="col">Purchased At</th>
            <th scope="col">Activated By</th>
            <th scope="col">Activated At</th>
          </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $item) { ?>
          <tr>
            <th scope="row"><?php echo $item['id']; ?></th>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['code']; ?></td>
            <td><?php echo $item['status']; ?></td>
            <td><?php echo $item['purchased_by']; ?></td>
            <td><?php echo $item['purchased_at']; ?></td>
            <td><?php echo $item['activated_by']; ?></td>
            <td><?php echo $item['activated_at']; ?></td>
          </tr>
            <?php } ?>
        </tbody>
    </table>
    {{ $products->links() }}

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>