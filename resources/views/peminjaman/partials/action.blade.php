<a href="{{ route('peminjaman.edit', $data->id) }}" class="btn btn-warning btn-sm">Edit</a>
<a href="{{ route('peminjaman.show', $data->id) }}" class="btn btn-info btn-sm">Detail</a>
<button class="btn btn-danger btn-sm delete-button" data-id="{{ $data->id }}">Hapus</button>

<script>
    $(document).on('click', '.delete-button', function() {
    var id = $(this).data('id');
    if (confirm('Yakin ingin menghapus peminjaman ini?')) {
        $.ajax({
            url: "{{ url('peminjaman') }}/" + id,
            type: 'DELETE',
            data: {_token: '{{ csrf_token() }}'},
            success: function(response) {
                alert(response.success);
                $('#peminjaman-table').DataTable().ajax.reload();
            }
        });
    }
});
</script>