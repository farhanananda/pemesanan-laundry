<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Pegawai</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('nonmember.update', $nonmember->no_transaksi) }}" method="POST">
                          @csrf
                          @method('PUT')
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Pegawai</label>
                            <input type="date" name="tgl_transaksi" class="form-control" placeholder="Enter tgl transaksi" value="{{ old('tgl_transaksi', $nonmember->tgl_transaksi) }}"> 
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('nama_pegawai')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nama Customer</label>
                            <input type="text" name="nama_customer" class="form-control" placeholder="Enter nama customer"value="{{ old('nama_customer', $nonmember->nama_customer) }}">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('nama_customer')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nomor HP</label>
                            <input type="text" name="no_hp" class="form-control" placeholder="Enter nomor hp"value="{{ old('no_hp', $nonmember->no_hp) }}">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('no_hp')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Alamat</label>
                            <input type="text" name="alamat" class="form-control" placeholder="Enter nomor hp"value="{{ old('alamat', $nonmember->alamat) }}">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('alamat')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                          <div class="form-group">
                            <label for="exampleInputEmail1">Keterangan</label>
                            <input type="text" name="keterangan" class="form-control" placeholder="Enter keterangan"value="{{ old('keterangan', $nonmember->keterangan) }}">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            @error('keterangan')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                          </div>
                              <br/>
                              <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                              </div>
                          </form>
           
                        
                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
