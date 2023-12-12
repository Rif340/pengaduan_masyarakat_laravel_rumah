<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/home.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <title>PengaduanMasyarakat.com</title>
</head>

<body>


  <div class="container">
    <h1 class="text-center">Detail Pengaduan {{$pengaduan->nik}}</h1>
    <h4>Isi Pengaduan : {{$pengaduan->isi_laporan}}</h4>
    <img src='{{asset("storage/image/" .$pengaduan->foto)}}' width="100%" height="500px">
    <p class="mt-2">Tanggal Pengaduan : {{$pengaduan->tgl_pengaduan}}</p>


    <table style="margin-top: 2rem;" class="table">
      <thead>
        <tr>@foreach($petugas as $tanggapan)
          <th class="table-warning">Tanggapan oleh petugas:  
            {{$tanggapan->nama_petugas}}@break  
          </th>@endforeach
        </tr>
      </thead>
      <tbody>
    @foreach($tampil_tanggapan as $tampil_tanggapan)
        <tr>
            <td class="table-secondary">
            {{$tampil_tanggapan->tanggapan}}
            </td>
        </tr>
    @endforeach
      </tbody>
    </table>

    <a href="/home" type="button" class="btn btn-success">Why Back To Home</a>
  </div>
</body>

</html>