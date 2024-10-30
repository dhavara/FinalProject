@extends('layouts.app')
@extends('includes.sidebar')

@section('title', 'Data Mustahik')
@section('content')

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor Telepon</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <th>{{ $item->id }}</th>
                        <td>{{ $item->nama_mustahik }}</td>
                        <td>{{ $item->kategori_mustahik }}</td>
                        <td>{{ $item->alamat }}</td>
                        <td>{{ $item->handphone }}</td>
                        <td class="d-flex gap-2">
                            <div>
                                <a class="btn btn-primary"
                                    href="{{ route('mustahik.edit', $item->id) }}">Edit</a>
                            </div>
                            <form action="{{ route('mustahik.destroy', $item->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection