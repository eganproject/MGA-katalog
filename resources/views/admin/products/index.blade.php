@extends('layouts.admin')
@php use Illuminate\Support\Str; @endphp

@section('content')
    <div class="flex flex-wrap items-center justify-between gap-4">
        <div>
            <h2 class="text-2xl font-semibold">Produk</h2>
            <p class="text-sm text-slate-400">Kelola produk beserta gambar galerinya.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="inline-flex items-center rounded-xl bg-gradient-to-r from-sky-500 to-blue-500 px-4 py-2 text-sm font-semibold text-slate-900 shadow-lg shadow-sky-500/30">Tambah Produk</a>
    </div>

    @if(session('status'))
        <div class="rounded-xl border border-emerald-600/50 bg-emerald-500/10 px-4 py-3 text-sm text-emerald-200">
            {{ session('status') }}
        </div>
    @endif

    <div class="overflow-hidden rounded-2xl border border-slate-800 bg-slate-900/70 shadow-xl shadow-slate-900/50">
        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-900 text-slate-400">
                    <tr class="border-b border-slate-800">
                        <th class="px-4 py-3 text-left">#</th>
                        <th class="px-4 py-3 text-left">Produk</th>
                        <th class="px-4 py-3 text-left">Kategori</th>
                        <th class="px-4 py-3 text-left">Status</th>
                        <th class="px-4 py-3 text-left">Excerpt</th>
                        <th class="px-4 py-3 text-left">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-800 text-slate-200">
                    @forelse($products as $index => $product)
                        <tr class="hover:bg-slate-800/50">
                            <td class="px-4 py-3">{{ $products->firstItem() + $index }}</td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-3">
                                    @if($product->thumbnail)
                                        <img src="{{ asset('storage/'.$product->thumbnail) }}" alt="{{ $product->name }}" class="h-12 w-16 rounded-lg object-cover flex-shrink-0">
                                    @else
                                        <div class="h-12 w-16 rounded-lg bg-slate-800/80 border border-slate-700 flex items-center justify-center text-xs text-slate-500 flex-shrink-0">No Img</div>
                                    @endif
                                    <div>
                                        <div class="font-semibold">{{ $product->name }}</div>
                                        <div class="text-xs text-slate-400">/{{ $product->slug }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-slate-300">{{ $product->category?->name ?? '-' }}</td>
                            <td class="px-4 py-3">
                                <span class="inline-flex rounded-full px-3 py-1 text-xs font-semibold {{ $product->is_active ? 'bg-emerald-500/20 text-emerald-200' : 'bg-amber-500/20 text-amber-200' }}">
                                    {{ $product->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-slate-300">{{ Str::limit($product->excerpt, 60) }}</td>
                            <td class="px-4 py-3">
                                <div class="flex flex-wrap items-center gap-2">
                                    <a href="{{ route('admin.products.edit', $product) }}" class="rounded-lg border border-slate-700 px-3 py-1.5 text-xs font-semibold text-slate-100 hover:border-sky-500/60">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Hapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="rounded-lg bg-gradient-to-r from-rose-500 to-orange-400 px-3 py-1.5 text-xs font-semibold text-white">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-slate-500">Belum ada produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="border-t border-slate-800 px-4 py-3 flex justify-end">
            {{ $products->links() }}
        </div>
    </div>
@endsection
