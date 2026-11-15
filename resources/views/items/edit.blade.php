<x-layout title="Edit Barang">
    <div class="max-w-xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Data Barang</h1>

        <form action="{{ route('items.update', $item) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kode Barang</label>
                <input type="text" name="item_code" value="{{ old('item_code', $item->item_code) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                @error('item_code') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Barang</label>
                <input type="text" name="name" value="{{ old('name', $item->name) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
                <select name="category" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                    @foreach (['Elektronik', 'Alat Tulis', 'Perabotan', 'Dapur'] as $cat)
                        <option value="{{ $cat }}" {{ old('category', $item->category) == $cat ? 'selected' : '' }}>
                            {{ $cat }}
                        </option>
                    @endforeach
                </select>
                @error('category') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                <input type="number" name="quantity" value="{{ old('quantity', $item->quantity) }}" min="1"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                @error('quantity') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Kondisi</label>
                <select name="condition" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-blue-500">
                    @foreach (['Baik', 'Rusak Ringan', 'Rusak Berat'] as $cond)
                        <option value="{{ $cond }}" {{ old('condition', $item->condition) == $cond ? 'selected' : '' }}>
                            {{ $cond }}
                        </option>
                    @endforeach
                </select>
                @error('condition') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end space-x-2 pt-4">
                <a href="{{ route('items.index') }}" class="px-4 py-2 border border-gray-300 rounded text-gray-700 hover:bg-gray-100">Batal</a>
                <button type="submit" class="px-4 py-2 bg-yellow-600 text-white rounded hover:bg-yellow-700">Update</button>
            </div>
        </form>
    </div>
</x-layout>