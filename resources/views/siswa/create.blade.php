<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Data Siswa - Kas Kelas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body style="background: lightgray">

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="mb-3">
                    <a href="{{ route('siswa.index') }}" class="btn btn-md btn-secondary"><< KEMBALI</a>
                </div>
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        
                            @csrf
                            
                                <!-- error message untuk title -->

                            <div class="form-group">
                                <label class="font-weight-bold">Nama</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" placeholder="Masukkan Nama">
                            
                                <!-- error message untuk title -->
                                @error('nama')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">

                            <div class="form-group">
                                <label for="exampleDropdown" class="font-weight-bold">KELAS</label>
                                <select name="kelas" class="form-control" id="exampleDropdown">
                                    <option value="Pilih Kelas">Pilih Kelas</option>
                                    <option value="XII PPLG">XII - PPLG</option>
                                    <option value="XI PPLG">XI - PPLG</option>
                                    <option value="X PPLG">X - PPLG</option>
                                    <option value="XII TE 4">XII - TE 4</option>
                                    <option value="XI TE 4">XI - TE 4</option>
                                    <option value="X TE 4">X - TE 4</option>
                                    <option value="XII Ototronika">XII - Ototronika</option>
                                    <option value="XI Ototronika">XI - Ototronika</option>
                                    <option value="X Ototronika">X - Ototronika</option>
                                  </select>
                                
                            
                                <!-- error message untuk content -->
                                @error('kelas')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                            <button type="reset" class="btn btn-md btn-warning">RESET</button>

                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    
</script>
</body>
</html>