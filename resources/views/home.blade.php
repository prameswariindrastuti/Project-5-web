<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="http://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <a href="{{ route('siswa.index') }}" class="btn btn-md btn-info">DATA SISWA</a>
                </div>
                <!-- siswa -->
                <div class="card mt-5">
                    <div class="card-header" style="background-color: gray;">
                        <h5>Data Siswa</h5>
                    </div>
                    <div class="card-body">
                    <table class="table table-bordered">
                            <thead>
                              <tr>
                                <th scope="col">NAMA</th>
                                <th scope="col">KELAS</th>
                             
                              </tr>
                            </thead>
                            <tbody>
                              @forelse ($siswa as $siswa)
                                <tr>
                                    <td>{{ $siswa->nama }}</td>
                                    <td>{!! $siswa->kelas !!}</td>
                                    
                                </tr>
                              @empty
                                  <div class="alert alert-danger">
                                      Data Post belum Tersedia.
                                  </div>
                              @endforelse
                            </tbody>
                          </table>
                    </div>
                </div>
               <!-- pembayaran -->
                <div class="card mt-5 mb-5">
                    <div class="card-header" style="background-color: yellow;">
                        <h5>Data Siswa</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Total Kas</th>
                                    <th scope="col">Tanggal Terakhir Bayar</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pembayaran as $key => $siswa )
                                    <tr class="text-center">
                                        <td style="width: 20px;">{{ $key + 1 }}</td>
                                        <td style="width: 150px;">
                                            @if ($siswa->siswa)
                                            {{ $siswa->siswa->nama}}
                                            @else<span style="color:grey;">Kosong</span>
                                            @endif
                                        </td>
                                        <td style="width: 150px;">Rp. {{ number_format($siswa->jumlah_bayar,0,',',',',) }}</td>
                                        <td style="width: 150px;">{{ \Carbon\Carbon::parse($siswa->tanggal_bayar)->formatLocalized('%d %B %Y') }}</td>
                
                                        
                                    @endforeach
                                    
                                </tbody>
                        </table> 
                    </div>              
                </div>
            </div>    
        </div>
    </div>
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        feather.replace();
        </script>
</body>
</html>