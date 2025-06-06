<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CatatDuit</title>
  <link rel="stylesheet" href="{{ asset('assetss/css/style.css')}}">
  <link rel="shortcut icon" href="{{ asset('assetss/img/money.png')}}" type="image/x-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body>
  <h1>CatatDuit</h1>
	<!-- <p>Cari Data  :</p>
	<form action="/pemasukan/cari" method="GET">
    @csrf
		<input type="text" name="cari" placeholder="Cari .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
	</form> -->
  <table id="tabel-transaksi">
    <thead>
      <tr>
        <th>Jenis</th>
        <th>Jumlah</th>
        <th>Keterangan</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
      <form action="/keuangan/simpan" method="post">
        @csrf
        <tr>
          <th>
           <div class="mb-3">
            <select
              class="form-select form-select-lg"
              name="jenis"
              id=""
              required
            >
              <option value="" disable selected>Select one</option>
              <option value="Pemasukan">Pemasukan</option>
              <option value="Pengeluaran">Pengeluaran</option>
            </select>
          </div>
        </th>
          <th>
            <input
            type="number"
            class="form-control"
            name="jumlah_uang"
            value="{{ old('jumlah_uang') }}"
            id=""
            aria-describedby="helpId"
            placeholder="Masukan Jumlah Uang"
            required
            />
          </th>
            <th>
      <input
            type="text"
            class="form-control"
            name="keterangan"
            id=""
            aria-describedby="helpId"
            placeholder="Isi Keterangan"
            required
            />
          </th>
          <th>
            <input
            type="date"
            class="form-control"
            name="tanggal"
            id=""
            value="{{ old('tanggal') }}"
            aria-describedby="helpId"
            placeholder="Masukan Tanggal"
            required
            />
          </th>
          <th>
            <button class="btn btn-primary" type="submit"><i class="fa-solid fa-floppy-disk"></i>Simpan</button>
          </th>
        </tr>
      </form>
        <thead>
    <tr>
      <th scope="col">Nomor</th>
      <th scope="col">Jenis</th>
      <th scope="col">Tanggal</th>
      <th scope="col">Jumlah Uang</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>
    @foreach($pemasukan as $pemasukan)
    <tr>
      <td>{{ $loop->iteration }}</td>
      <td>
        @if($pemasukan->jenis == "Pemasukan") 
          <p style="color: green;">{{ $pemasukan->jenis }}</p>
        @elseif($pemasukan->jenis == "Pengeluaran") 
          <p style="color: red;">{{ $pemasukan->jenis }}</p>
        @endif
</td>
      <td>{{ \Carbon\Carbon::parse($pemasukan->tanggal)->format('d/m/Y') }}</td>
      <td>Rp. {{ number_format($pemasukan->jumlah_uang) }}</td>
      <td>{{ $pemasukan->keterangan }}</td>
    </tr>
    @endforeach
    <tr>
      <td colspan="5"><b>Saldo : Rp. {{ number_format($saldo) }}</b></td>
    </tr>
  </tbody>
</thead>
</table>
<footer>
  <center>
    <p class="total">
      <b class="pemasukan">Total Pemasukan : Rp. {{ number_format($jumlahPemasukan) }}</b>
      <b class="saldo">Saldo : Rp. {{ number_format($saldo) }}</b>
      <b class="pengeluaran">Total Pengeluaran : Rp. {{ number_format($jumlahPengeluaran) }}</b>
    </p>
  </center>
</footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>