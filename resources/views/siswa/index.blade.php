@extends('layouts.app')

@section('title','Dafar Santri')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Santri</h6>
    </div>
    <div class="card-body">
        <a href="{{ route('siswa.tambah') }}" class="btn btn-primary">
            <i><span class="material-symbols-outlined" style="font-variation-settings: 'wght' 500;">person_add</span></i>
        </a>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nim</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>No_HP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @foreach ($siswa as $row)
                        <tr>
                            <th>{{ $no++ }}</th>
                            <td>{{ $row->nim }}</td>
                            <td>{{ $row->nama }}</td>
                            <td>{{ $row->kelas }}</td>
                            <td>{{ $row->no_hp }}</td>
                            <td> 
                                <a href="{{ route ('siswa.edit', $row->id) }}" class="btn btn-warning">
                                    <span class="material-symbols-outlined">edit_square</span>
                                </a>
                                <form action="{{ route('siswa.delete', $row->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger delete-button">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
         </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-button');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const form = this.closest('form');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda tidak akan bisa mengembalikan ini!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush