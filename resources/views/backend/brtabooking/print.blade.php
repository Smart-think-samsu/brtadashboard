

<!DOCTYPE html>
<html lang="en">
<head>
  <title>.</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body onload="window.print()">

<div class="container">
  <h4 class="text-center">BRTA Booking List</h4>
  <p class="text-center">Date : {{($date->created_at)->format('d-m-Y')}}</p>            
  <table class="table table-bordered">
  <thead>
    <tr>
      <th data-field="id">SL</th>
      <th data-field="name">Booking ID</th>
      <th data-field="price">Driving License ID</th>
    </tr>
  </thead>
  <tbody>
    @foreach($datas as $key => $data)
    <tr>
      <td>{{++$key}}</td>
      <td>{{$data->barcode}}</td>
      <td>{{$data->drivingLicenseNo}}</td>
    </tr>
    @endforeach   

  </tbody>
  </table>
</div>
</body>
</html>





