<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>PengaduanMasyarakat.com</title>
</head>

<body>
    

    <div class="container">
        <center><h1>Detail petugas</h1></center>
    <table  style="margin-top: 2rem;" class="table">
        <thead>
          <tr>
            <th scope="col" class="table-warning">id_petugas</th>
            <th scope="col" class="table-warning">nama petugas</th>
            <th scope="col" class="table-warning">username</th>
            <th scope="col" class="table-warning">password</th>
            <th scope="col" class="table-warning">telepon</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="table-secondary">{{$petugas->id_petugas}}</th>
            <td class="table-secondary">{{$petugas->nama_petugas}}</td>
            <td class="table-secondary">{{$petugas->username}}</td>
            <td class="table-secondary">{{$petugas->password}}</td>
            <td class="table-secondary">{{$petugas->telepon}}</td>
          </tr>
        </tbody>
      </table>
      <a href="/petugas" type="button" class="btn btn-success">Way Back To Home</a>
    </div>
</body>
</html>
