<form action="{{ route('tagihan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
    @csrf
    @method('DELETE')
    <button type="submit" class="text-red-600 hover:text-red-900">
        <i class="fas fa-trash-alt"></i>
    </button>
</form>