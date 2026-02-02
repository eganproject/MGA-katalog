@extends('layouts.landing', ['title' => $product->name ?? 'Produk'])

@section('custom_style')
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    brand: {
                        50: '#eefcfd',
                        100: '#d0f6f9',
                        200: '#a6edf2',
                        300: '#6edfe6',
                        400: '#33c6d1',
                        500: '#21939F',
                        600: '#197682',
                        700: '#16606a',
                        800: '#174e57',
                        900: '#16424a',
                        dark: '#0f172a'
                    }
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                    display: ['Space Grotesk', 'sans-serif'],
                },
                animation: {
                    'float': 'float 6s ease-in-out infinite',
                    'fade-in-up': 'fadeInUp 0.8s ease-out forwards',
                    'pop-in': 'popIn 0.4s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                },
                keyframes: {
                    float: {
                        '0%, 100%': { transform: 'translateY(0)' },
                        '50%': { transform: 'translateY(-20px)' },
                    },
                    fadeInUp: {
                        '0%': { opacity: '0', transform: 'translateY(20px)' },
                        '100%': { opacity: '1', transform: 'translateY(0)' },
                    },
                    popIn: {
                        '0%': { opacity: '0', transform: 'scale(0.95)' },
                        '100%': { opacity: '1', transform: 'scale(1)' }
                    }
                }
            }
        }
    }
</script>
<style>
    .glass-nav {
        background: rgba(15, 23, 42, 0.85);
        backdrop-filter: blur(12px);
        border-bottom: 1px solid rgba(255,255,255,0.05);
    }
    ::-webkit-scrollbar { width: 8px; }
    ::-webkit-scrollbar-track { background: #f1f1f1; }
    ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
    ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
</style>
@endsection

@section('content')
    @include('partials.headerSection', [
        'title_1' => 'Produk',
        'title_2' => $product->name ?? '',
        'description' => $product->excerpt ?? ''
    ])

    <section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid lg:grid-cols-[1.1fr_0.9fr] gap-12 items-start">
            <!-- Gallery -->
            <div class="rounded-3xl p-4 md:p-6 relative overflow-visible">
                <div class="relative z-10">
                    @php
                        // Start with thumbnail (if any), then append product images (ordered by sort_order via relation)
                        $gallery = collect();
                        if ($product->thumbnail) {
                            $gallery->push((object)[
                                'file_path' => $product->thumbnail,
                                'alt_text'  => $product->name,
                            ]);
                        }
                        $gallery = $gallery->merge($product->images->values());
                        // Fallback to placeholder if still empty
                        $activeImage = $gallery->first();
                    @endphp
                    <div id="main-image-wrapper" class="group bg-slate-50 rounded-2xl border border-slate-100 flex items-center justify-center overflow-hidden shadow-sm cursor-zoom-in w-[451px] h-[451px] max-w-full mx-auto">
                        @if($activeImage?->file_path)
                            <img id="main-product-image" src="{{ asset('storage/'.$activeImage->file_path) }}" alt="{{ $activeImage->alt_text ?? $product->name }}" class="w-full h-full object-contain transition-transform duration-300 ease-out">
                        @else
                            <div class="h-full w-full flex items-center justify-center text-3xl font-display text-slate-400">{{ strtoupper(substr($product->name,0,2)) }}</div>
                        @endif
                    </div>

                    @if($gallery->count())
                        <div class="mt-4 flex flex-wrap gap-3 max-w-[451px] mx-auto">
                            @foreach($gallery as $img)
                                <button class="thumb-btn w-[100px] h-[100px] rounded-xl border {{ $loop->first ? 'border-brand-300 ring-2 ring-brand-200' : 'border-slate-200' }} bg-white overflow-hidden" data-src="{{ asset('storage/'.$img->file_path) }}">
                                    <img src="{{ asset('storage/'.$img->file_path) }}" alt="{{ $img->alt_text ?? $product->name }}" class="w-full h-full object-cover">
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            <!-- Detail -->
            <div class="space-y-6">
                <div class="flex items-start justify-between gap-4">
                    <div class="space-y-2">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-brand-50 text-brand-700 text-xs font-semibold uppercase tracking-wide">
                            {{ $product->category?->name ?? 'Tanpa Kategori' }}
                        </div>
                        <h1 class="font-display text-3xl md:text-4xl font-bold text-slate-900 leading-tight">{{ $product->name }}</h1>
                        <p class="text-slate-500">{{ $product->excerpt }}</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <span class="w-10 h-10 rounded-full bg-slate-100 flex items-center justify-center text-slate-500">
                            <i data-lucide="box" class="w-5 h-5"></i>
                        </span>
                    </div>
                </div>

                @if($product->description)
                    <div class="prose prose-slate max-w-none leading-relaxed">
                        {!! nl2br(e($product->description)) !!}
                    </div>
                @endif

                <div class="flex flex-wrap gap-3 pt-2">
                    <a href="#contact" class="inline-flex items-center gap-2 px-5 py-3 rounded-full bg-brand-600 text-white font-semibold shadow-lg shadow-brand-500/30 hover:bg-brand-700 transition">
                        Hubungi Kami
                        <i data-lucide="messages-square" class="w-4 h-4"></i>
                    </a>
                    <a href="{{ url()->previous() }}" class="inline-flex items-center gap-2 px-5 py-3 rounded-full border border-slate-200 text-slate-700 hover:border-brand-300 hover:text-brand-700 transition bg-white">
                        <i data-lucide="arrow-left" class="w-4 h-4"></i>
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom_script')
<script>
    lucide.createIcons();

    // Main image hover zoom following cursor
    const imgWrapper = document.getElementById('main-image-wrapper');
    const mainImg = document.getElementById('main-product-image');

    if (imgWrapper && mainImg) {
        const maxScale = 3;
        imgWrapper.addEventListener('mousemove', (e) => {
            const rect = imgWrapper.getBoundingClientRect();
            const xPercent = ((e.clientX - rect.left) / rect.width) * 100;
            const yPercent = ((e.clientY - rect.top) / rect.height) * 100;
            mainImg.style.transformOrigin = `${xPercent}% ${yPercent}%`;
            mainImg.style.transform = `scale(${maxScale})`;
        });

        imgWrapper.addEventListener('mouseleave', () => {
            mainImg.style.transformOrigin = '50% 50%';
            mainImg.style.transform = 'scale(1)';
        });
    }

    // Navbar scroll effect
    function updateNavbar() {
        const nav = document.getElementById('navbar');
        if (window.scrollY > 50) {
            nav.classList.add('glass-nav', 'shadow-md', 'py-0');
            nav.classList.remove('py-6');
        } else {
            nav.classList.remove('glass-nav', 'shadow-md', 'py-0');
            nav.classList.add('py-6');
        }
    }
    window.addEventListener('scroll', updateNavbar);
    window.addEventListener('load', updateNavbar);

    // Thumbnail switcher
    document.querySelectorAll('.thumb-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            const main = document.getElementById('main-product-image');
            main.src = btn.dataset.src;
            document.querySelectorAll('.thumb-btn').forEach(b => b.classList.remove('border-brand-300','ring-2','ring-brand-200'));
            btn.classList.add('border-brand-300','ring-2','ring-brand-200');
        });
    });

    document.getElementById('mobile-menu-btn')?.addEventListener('click', () => {
        document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });
</script>
@endsection
