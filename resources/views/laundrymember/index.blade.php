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
                        <a href="{{ route('laundrymember.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th scope="col">no</th>
                                    <th scope="col">no transaksi</th>
                                    <th scope="col">tanggal transaksi</th>
                                    <th scope="col">member id</th>
                                    <th scope="col">status laundry</th>
                                    <th scope="col">status pembayaran</th>
                                    <th scope="col">keterangan</th>
                                    <th scope="col">lokasi kirim</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataMember as $index => $item)
                                    <tr>
                                        <td class="text-center">
                                            {{ ++$index }}
                                        </td>
                                        <td>{{ $item->no_transaksi }}</td>
                                        <td>{{ $item->tgl_transaksi}}</td>
                                        <td>{{ $item->member_id}}</td>
                                        <td>{{ $item->status_laundry }}</td>
                                        <td>{{ $item->status_pembayaran}}</td>
                                        <td>{{ $item->keterangan}}</td>
                                        <td>{{ $item->lokasi_kirim}}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('laundrymember.destroy', $item->no_transaksi) }}" method="POST">
                                                <a href="{{ route('laundrymember.show', $item->no_transaksi) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('laundrymember.edit', $item->no_transaksi) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Laundry Member belum ada.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        {{-- {{ $user->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>