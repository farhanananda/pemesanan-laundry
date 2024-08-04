<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Laundry Non Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Laundry Non Member</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('nonmember.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th scope="col">no</th>
                                    <th scope="col">no transaksi</th>
                                    <th scope="col">tanggal transaksi</th>
                                    <th scope="col">nama customer</th>
                                    <th scope="col">alamat</th>
                                    <th scope="col">no hp</th>
                                    <th scope="col">keterangan</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataNonMember as $index => $nonmember)
                                    <tr>
                                        <td class="text-center">
                                            {{ ++$index }}
                                        </td>
                                        <td>{{ $nonmember->no_transaksi }}</td>
                                        <td>{{ $nonmember->tgl_transaksi}}</td>
                                        <td>{{ $nonmember->nama_customer}}</td>
                                        <td>{{ $nonmember->alamat }}</td>
                                        <td>{{ $nonmember->no_hp}}</td>
                                        <td>{{ $nonmember->keterangan}}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('nonmember.destroy', $nonmember->no_transaksi) }}" method="POST">
                                                <a href="{{ route('nonmember.show', $nonmember->no_transaksi) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('nonmember.edit', $nonmember->no_transaksi) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data non member belum ada.
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