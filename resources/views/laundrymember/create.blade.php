<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Laundry Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Laundry Member</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('laundrymember.store') }}" method="POST"   >
                          @csrf
                            
                              <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Transaksi</label>
                                <input type="date" name="tgl_transaksi" class="form-control" placeholder="Enter tanggal transaksi">
                               
                                @error('tgl_transaksi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="member_id">Member</label>
                                <select class="form-control" name="member_id" id="member_id">
                                    @foreach ($dataMember as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_member }}
                                        </option>
                                    @endforeach

                                </select>
                                @error('member_id')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="Enter keterangan">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('keterangan')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="exampleInputEmail1">Lokasi Kirim</label>
                                <input type="text" name="lokasi_kirim" class="form-control" placeholder="Enter lokasi kirim">
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                                @error('lokasi_kirim')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                                @enderror
                              </div>
                              <div class="form-group">
                                <label for="status_laundry">Status Laundry</label>
                                <select class="form-control" name="status_laundry" id="status_laundry">
                                        <option value="menunggu">Menunggu</option>
                                        <option value="diproses">Diproses</option>
                                        <option value="selesai">Selesai</option>

                                </select>
                                @error('status_laundry')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                              <label for="status_pembayaran">Status Pembayaran</label>
                              <select class="form-control" name="status_pembayaran" id="status_pembayaran">
                                      <option value="bayar">Bayar</option>
                                      <option value="belum">Belum</option>

                              </select>
                              @error('status_pembayaran')
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