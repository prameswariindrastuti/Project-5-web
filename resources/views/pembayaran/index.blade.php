<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran - Kas Kelas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('siswa.index') }}" class="btn btn-md btn-info">DATA SISWA</a>
                </div>
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <a href="{{ route('pembayaran.create') }}" class="btn btn-md btn-success mb-3">TAMBAH PEMBAYARAN</a>
                        <table class="table table-bordered">
                            <thead>
                              <tr class="text-center">
                                <th scope="col">NO</th>
                                <th scope="col">SISWA</th>
                                <th scope="col">TANGGAL BAYAR</th>
                                <th scope="col">JUMLAH BAYAR</th>
                                <th scope="col">AKSI</th>
                              </tr>
                            </thead>
                            <tbody>
                                @php
                                $startIndex = ($pembayaran->currentPage() - 1) * $pembayaran->perPage() + 1;
                            @endphp
                            
                            @forelse ($pembayaran as $index => $bayars)
                                <tr class="text-center">
                                    <td>{{ $startIndex + $index }}</td>
                                    <td>{{ $bayars->siswa->nama }}</td>
                                    <td style="width: 150px;">{{ \Carbon\Carbon::parse($bayars->tgl_bayar)->formatLocalized('%d %B %Y') }}</td>
                                    <td style="width: 150px;">Rp. {{ number_format($bayars->jumlah_bayar, 0, ',', ',',) }}</td>
                                    <td class="text-center"> 
                                        <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('pembayaran.destroy', $bayars->id) }}" method="POST">   
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <div class="alert alert-danger">
                                    Data Pembayaran belum Tersedia.
                                </div>
                            @endforelse
                                     
                            </tbody>
                          </table>
                          {{ $pembayaran->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        //message with toastr
        @if(session()->has('success'))
        
            toastr.success('{{ session('success') }}', 'BERHASIL!'); 

        @elseif(session()->has('error'))

            toastr.error('{{ session('error') }}', 'GAGAL!'); 
            
        @endif
    </script>

</body>
</html>