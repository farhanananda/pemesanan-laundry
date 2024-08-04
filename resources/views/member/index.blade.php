<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Data Member</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <a href="{{ route('member.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>

                                    <th scope="col">no</th>
                                    <th scope="col">no identitas</th>
                                    <th scope="col">nama member</th>
                                    <th scope="col">no hp</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($dataMember as $index => $member)
                                    <tr>
                                        <td class="text-center">
                                            {{ ++$index }}
                                        </td>
                                        <td>{{ $member->no_identitas }}</td>
                                        <td>{{ $member->nama_member}}</td>
                                        <td>{{ $member->no_hp}}</td>
                                        <td class="text-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('member.destroy', $member->id) }}" method="POST">
                                                <a href="{{ route('member.show', $member->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                                <a href="{{ route('member.edit', $member->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data member belum ada.
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

