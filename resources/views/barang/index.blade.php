@extends('layouts.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3">
                <select class="form-control" id="filter_kategori">
                    <option value="">- Semua Kategori -</option>
                    @foreach($kategori as $item)
                        <option value="{{ $item->kategori_id }}">{{ $item->kategori_nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <table class="table table-bordered table-sm" id="table_barang">
            <thead>
                <tr><th>ID</th><th>Kode</th><th>Nama</th><th>Kategori</th><th>Harga Jual</th><th>Aksi</th></tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function() {
        var tableBarang = $('#table_barang').DataTable({
            serverSide: true,
            ajax: {
                "url": "{{ url('barang/list') }}",
                "type": "POST",
                "data": function (d) { d.kategori_id = $('#filter_kategori').val(); }
            },
            columns: [
                {data: "DT_RowIndex", className: "text-center", orderable: false, searchable: false},
                {data: "barang_kode"}, {data: "barang_nama"},
                {data: "kategori.kategori_nama"}, {data: "harga_jual"},
                {data: "aksi", orderable: false, searchable: false}
            ]
        });
        $('#filter_kategori').on('change', function() { tableBarang.ajax.reload(); });
    });
</script>
@endpush