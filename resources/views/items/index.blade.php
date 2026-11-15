<x-layout title="Daftar Inventaris Barang">
    <div class="bg-white p-6 rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Daftar Barang</h1>
            <a href="{{ route('items.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded font-medium">
                + Tambah Barang
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-200 text-left">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="border border-gray-200 px-4 py-2">Kode</th>
                        <th class="border border-gray-200 px-4 py-2">Nama Barang</th>
                        <th class="border border-gray-200 px-4 py-2">Kategori</th>
                        <th class="border border-gray-200 px-4 py-2">Jumlah</th>
                        <th class="border border-gray-200 px-4 py-2">Kondisi</th>
                        <th class="border border-gray-200 px-4 py-2 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="border border-gray-200 px-4 py-2 font-mono text-sm">{{ $item->item_code }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $item->name }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $item->category }}</td>
                            <td class="border border-gray-200 px-4 py-2">{{ $item->quantity }}</td>
                            <td class="border border-gray-200 px-4 py-2">
                                <span class="px-2 py-1 text-xs rounded 
                                    {{ $item->condition === 'Baik' ? 'bg-green-100 text-green-800' : ($item->condition === 'Rusak Ringan' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $item->condition }}
                                </span>
                            </td>
                            <td class="border border-gray-200 px-4 py-2 text-center space-x-2">
                                <a href="{{ route('items.edit', $item) }}" class="text-yellow-600 hover:underline font-medium">Edit</a>
                                
                                <form action="{{ route('items.destroy', $item) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus barang ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline font-medium">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="border border-gray-200 px-4 py-6 text-center text-gray-500">
                                Belum ada data barang.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>