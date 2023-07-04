@extends('layout.page')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Perhitungan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Perhitungan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Bobot</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>0.25</th>
                    <th>0.2</th>
                    <th>0.2</th>
                    <th>0.15</th>
                    <th>0.2</th>
                  </tr>
                  </thead>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Normalisasi Dan Hasil</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    {{-- <th>Kode Alternatif</th> --}}
                    <th>No</th>
                    <th>Alternatif</th>
                    <th>C1</th>
                    <th>C2</th>
                    <th>C3</th>
                    <th>C4</th>
                    <th>C5</th>
                    <th>Hasil</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($results as $result)
                    <tr>
                        {{-- <td>{{$alternatif->nama }}</td>
                        <td>{{$alternatif->Fasilitas / $C1min['alternatif']}}</td>
                        <td>{{$C2min['alternatif'] / $alternatif->Harga }}</td> --}}
                        {{-- <td>{{$alternatif->Varian_paket / $C3max['alternatif']}}</td>
                        <td>{{$alternatif->Lahan_parkir / $C4max['alternatif']}}</td>
                        <td>{{$alternatif->Varian_background / $C5max['alternatif']}}</td> --}}
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $result['nama'] }}</td>
                        <td>{{ $result['Fasilitas'] }}</td>
                        <td>{{ $result['Harga'] }}</td>
                        <td>{{ $result['Varian_paket'] }}</td>
                        <td>{{ $result['Lahan_parkir'] }}</td>
                        <td>{{ $result['Varian_background'] / 8 }}</td>
                        <td>{{ $result['hasil'] }}</td>
                    </tr>
                @endforeach
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


  </div>

  @endsection
