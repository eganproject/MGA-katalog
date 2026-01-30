@extends('layouts.landing', ['title' => $category->name ?? 'Kategori'])



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
                            500: '#21939F', // Primary Teal
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
        
        .category-item.active {
            background-color: #f0f9ff;
            color: #21939F;
            border-right: 3px solid #21939F;
        }
        .category-item.active svg { opacity: 1 !important; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>

@endsection


@section('content')
    @include('partials.headerSection', [
        'title_1' => 'Kategori',
        'title_2' => $category->name ?? '',
        'description' => $category->description ?? ''
    ])

  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="w-full">
            
            <!-- Sorting/Display/Search Bar (Updated: Removed Card Style) -->
            <!-- PERUBAHAN: Menghapus class 'bg-white p-4 rounded-2xl border border-slate-100 shadow-sm' -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-12 gap-6">
                <!-- Count -->
                <p class="text-sm text-slate-500 order-2 md:order-1">Menampilkan <span id="product-count" class="font-bold text-slate-900">8</span> Produk</p>
                
                <!-- Search Bar -->
                <div class="order-1 md:order-2 w-full md:w-auto relative group">
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-brand-200 to-purple-200 rounded-full blur opacity-20 group-hover:opacity-50 transition duration-300"></div>
                    <input type="text" id="productSearch" placeholder="Cari nama produk..." class="relative w-full md:w-80 pl-10 pr-4 py-2.5 rounded-full border border-slate-200 bg-white focus:ring-2 focus:ring-brand-100 focus:border-brand-500 outline-none transition-all text-sm placeholder:text-slate-400 shadow-sm">
                    <i data-lucide="search" class="absolute left-3.5 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400 z-10"></i>
                </div>

                <!-- Display Limit -->
                <div class="flex items-center gap-2 order-3">
                    <span class="text-sm text-slate-500">Tampilkan:</span>
                    <!-- Mengubah bg-slate-50 menjadi bg-white dan menambahkan border agar terlihat jelas tanpa container card -->
                    <select class="text-sm border border-slate-200 bg-white rounded-lg py-1.5 pl-3 pr-8 focus:ring-1 focus:ring-brand-500 cursor-pointer font-medium text-slate-700 hover:text-brand-600 shadow-sm">
                        <option>8</option>
                        <option>20</option>
                        <option>40</option>
                        <option>80</option>
                        <option>100</option>
                    </select>
                </div>
            </div>

            <!-- Products Grid (With ID for filtering) -->
            <div id="products-grid" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-8 gap-y-16">
                
                <!-- Product 1 -->
                <div class="product-item group cursor-pointer">
                    <!-- Image Wrapper -->
                    <div class="relative aspect-[4/3] flex items-center justify-center mb-6 overflow-visible">
                        <img src="https://cdn-icons-png.flaticon.com/512/5732/5732328.png" alt="MaxHub V6" class="w-full h-full object-contain relative z-10 transition-transform duration-500 group-hover:scale-110 drop-shadow-xl">
                    </div>
                    <div class="text-center px-2">
                        <h3 class="font-display font-bold text-slate-900 text-lg leading-tight group-hover:text-brand-600 transition-colors">MaxHub V6 Classic</h3>
                        <p class="mt-3 text-sm font-medium text-slate-400 flex items-center justify-center gap-1 group-hover:text-brand-600 transition-colors">
                            Lihat Detail Produk <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                        </p>
                    </div>
                </div>

                <!-- Product 2 -->
                <div class="product-item group cursor-pointer">
                    <div class="relative aspect-[4/3] flex items-center justify-center mb-6 overflow-visible">
                        <img src="https://cdn-icons-png.flaticon.com/512/3067/3067304.png" alt="Iceboard" class="w-full h-full object-contain relative z-10 transition-transform duration-500 group-hover:scale-110 drop-shadow-xl">
                    </div>
                    <div class="text-center px-2">
                        <h3 class="font-display font-bold text-slate-900 text-lg leading-tight group-hover:text-brand-600 transition-colors">Iceboard E2 Series</h3>
                        <p class="mt-3 text-sm font-medium text-slate-400 flex items-center justify-center gap-1 group-hover:text-brand-600 transition-colors">
                            Lihat Detail Produk <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                        </p>
                    </div>
                </div>

                <!-- Product 3 -->
                <div class="product-item group cursor-pointer">
                    <div class="relative aspect-[4/3] flex items-center justify-center mb-6 overflow-visible">
                        <img src="https://cdn-icons-png.flaticon.com/512/12144/12144793.png" alt="Horion" class="w-full h-full object-contain relative z-10 transition-transform duration-500 group-hover:scale-110 drop-shadow-xl">
                    </div>
                    <div class="text-center px-2">
                        <h3 class="font-display font-bold text-slate-900 text-lg leading-tight group-hover:text-brand-600 transition-colors">Horion M5A Super</h3>
                        <p class="mt-3 text-sm font-medium text-slate-400 flex items-center justify-center gap-1 group-hover:text-brand-600 transition-colors">
                            Lihat Detail Produk <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                        </p>
                    </div>
                </div>

                <!-- Product 4 -->
                <div class="product-item group cursor-pointer">
                    <div class="relative aspect-[4/3] flex items-center justify-center mb-6 overflow-visible">
                        <img src="https://cdn-icons-png.flaticon.com/512/5732/5732328.png" alt="Samsung Flip" class="w-full h-full object-contain relative z-10 transition-transform duration-500 group-hover:scale-110 drop-shadow-xl">
                    </div>
                    <div class="text-center px-2">
                        <h3 class="font-display font-bold text-slate-900 text-lg leading-tight group-hover:text-brand-600 transition-colors">Samsung Flip Pro</h3>
                        <p class="mt-3 text-sm font-medium text-slate-400 flex items-center justify-center gap-1 group-hover:text-brand-600 transition-colors">
                            Lihat Detail Produk <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                        </p>
                    </div>
                </div>

                <!-- Product 5 (Repeat for visual) -->
                <div class="product-item group cursor-pointer">
                    <div class="relative aspect-[4/3] flex items-center justify-center mb-6 overflow-visible">
                        <img src="https://cdn-icons-png.flaticon.com/512/3067/3067304.png" alt="LG One:Quick" class="w-full h-full object-contain relative z-10 transition-transform duration-500 group-hover:scale-110 drop-shadow-xl">
                    </div>
                    <div class="text-center px-2">
                        <h3 class="font-display font-bold text-slate-900 text-lg leading-tight group-hover:text-brand-600 transition-colors">LG One:Quick Works</h3>
                        <p class="mt-3 text-sm font-medium text-slate-400 flex items-center justify-center gap-1 group-hover:text-brand-600 transition-colors">
                            Lihat Detail Produk <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                        </p>
                    </div>
                </div>

                <!-- Product 6 -->
                <div class="product-item group cursor-pointer">
                    <div class="relative aspect-[4/3] flex items-center justify-center mb-6 overflow-visible">
                        <img src="https://cdn-icons-png.flaticon.com/512/12144/12144793.png" alt="MaxHub V6 ViewPro" class="w-full h-full object-contain relative z-10 transition-transform duration-500 group-hover:scale-110 drop-shadow-xl">
                    </div>
                    <div class="text-center px-2">
                        <h3 class="font-display font-bold text-slate-900 text-lg leading-tight group-hover:text-brand-600 transition-colors">MaxHub V6 ViewPro</h3>
                        <p class="mt-3 text-sm font-medium text-slate-400 flex items-center justify-center gap-1 group-hover:text-brand-600 transition-colors">
                            Lihat Detail Produk <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                        </p>
                    </div>
                </div>

                <!-- Product 7 -->
                <div class="product-item group cursor-pointer">
                    <div class="relative aspect-[4/3] flex items-center justify-center mb-6 overflow-visible">
                        <img src="https://cdn-icons-png.flaticon.com/512/5732/5732328.png" alt="ViewSonic ViewBoard" class="w-full h-full object-contain relative z-10 transition-transform duration-500 group-hover:scale-110 drop-shadow-xl">
                    </div>
                    <div class="text-center px-2">
                        <h3 class="font-display font-bold text-slate-900 text-lg leading-tight group-hover:text-brand-600 transition-colors">ViewSonic ViewBoard</h3>
                        <p class="mt-3 text-sm font-medium text-slate-400 flex items-center justify-center gap-1 group-hover:text-brand-600 transition-colors">
                            Lihat Detail Produk <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                        </p>
                    </div>
                </div>

                <!-- Product 8 -->
                <div class="product-item group cursor-pointer">
                    <div class="relative aspect-[4/3] flex items-center justify-center mb-6 overflow-visible">
                        <img src="https://cdn-icons-png.flaticon.com/512/3067/3067304.png" alt="BenQ DuoBoard" class="w-full h-full object-contain relative z-10 transition-transform duration-500 group-hover:scale-110 drop-shadow-xl">
                    </div>
                    <div class="text-center px-2">
                        <h3 class="font-display font-bold text-slate-900 text-lg leading-tight group-hover:text-brand-600 transition-colors">BenQ DuoBoard</h3>
                        <p class="mt-3 text-sm font-medium text-slate-400 flex items-center justify-center gap-1 group-hover:text-brand-600 transition-colors">
                            Lihat Detail Produk <i data-lucide="arrow-right" class="w-4 h-4 transition-transform group-hover:translate-x-1"></i>
                        </p>
                    </div>
                </div>

            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-16 gap-2">
                <button class="w-10 h-10 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:border-brand-500 hover:text-brand-500 transition-colors"><i data-lucide="chevron-left" class="w-4 h-4"></i></button>
                <button class="w-10 h-10 rounded-lg bg-brand-600 text-white flex items-center justify-center font-bold">1</button>
                <button class="w-10 h-10 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-600 hover:border-brand-500 hover:text-brand-500 transition-colors font-medium">2</button>
                <button class="w-10 h-10 rounded-lg bg-white border border-slate-200 flex items-center justify-center text-slate-500 hover:border-brand-500 hover:text-brand-500 transition-colors"><i data-lucide="chevron-right" class="w-4 h-4"></i></button>
            </div>
        </div>
    </div>


@endsection


@section('custom_script')

  <script>
        lucide.createIcons();
        
        // Data Produk Dummy
        const productsData = {
            'interactive': [ { name: 'MaxHub V6 Classic', img: 'monitor' }, { name: 'MaxHub V6 ViewPro', img: 'monitor' }, { name: 'Iceboard E2 Series', img: 'monitor' }, { name: 'Horion M5A', img: 'monitor' }, { name: 'Samsung Flip Pro', img: 'monitor' }, { name: 'LG One:Quick', img: 'monitor' } ],
            'mobile': [ { name: 'Portable LCD 43"', img: 'smartphone' }, { name: 'Portable LCD 55"', img: 'smartphone' }, { name: 'Foldable Signage', img: 'smartphone' }, { name: 'Battery Powered LCD', img: 'smartphone' }, { name: 'Outdoor Mobile Kiosk', img: 'smartphone' }, { name: 'Slimline Portable', img: 'smartphone' } ],
            'signage': [ { name: 'Wall Mount LCD', img: 'layout' }, { name: 'High Brightness LCD', img: 'layout' }, { name: 'Stretched Bar LCD', img: 'layout' }, { name: 'Double Sided Screen', img: 'layout' }, { name: 'Menu Board Display', img: 'layout' }, { name: 'Video Wall LCD', img: 'layout' } ],
            'videotron': [ { name: 'Indoor P1.8 LED', img: 'grid-3x3' }, { name: 'Indoor P2.5 LED', img: 'grid-3x3' }, { name: 'Outdoor P3.9 LED', img: 'grid-3x3' }, { name: 'Outdoor P5 LED', img: 'grid-3x3' }, { name: 'Transparent LED', img: 'grid-3x3' }, { name: 'Flexible LED Module', img: 'grid-3x3' } ],
            'kiosk': [ { name: 'Self Order Kiosk', img: 'mouse-pointer-click' }, { name: 'Payment Kiosk', img: 'mouse-pointer-click' }, { name: 'Information Kiosk', img: 'mouse-pointer-click' }, { name: 'Ticket Dispenser', img: 'mouse-pointer-click' }, { name: 'Check-in Kiosk', img: 'mouse-pointer-click' }, { name: 'Directory Kiosk', img: 'mouse-pointer-click' } ],
            'access': [ { name: 'Standing Bracket', img: 'layers' }, { name: 'Wall Mount Bracket', img: 'layers' }, { name: 'Ceiling Mount', img: 'layers' }, { name: 'Video Wall Push-out', img: 'layers' }, { name: 'Mobile Cart Stand', img: 'layers' }, { name: 'HDMI/VGA Cables', img: 'layers' } ]
        };

        const categoryTitles = { 'interactive': 'Interactive Panel', 'mobile': 'Mobile Signage', 'signage': 'Digital Signage', 'videotron': 'Videotron LED', 'kiosk': 'Kiosk System', 'access': 'Aksesoris' };

        function showCategory(catId) {
            document.querySelectorAll('.category-item').forEach(el => { el.classList.remove('active', 'bg-slate-50', 'text-brand-600', 'border-r-4', 'border-brand-500'); el.classList.add('text-slate-600'); });
            const activeBtn = document.querySelector(`button[data-category="${catId}"]`);
            if(activeBtn) { activeBtn.classList.add('active', 'bg-slate-50', 'text-brand-600'); activeBtn.classList.remove('text-slate-600'); }
            document.getElementById('mega-menu-title').innerText = categoryTitles[catId];
            const grid = document.getElementById('mega-menu-grid');
            grid.innerHTML = ''; 
            const items = productsData[catId];
            if(items) {
                items.forEach((prod, index) => {
                    const html = `
                        <a href="category_page.html" class="group/prod block p-3 rounded-xl border border-slate-100 hover:border-brand-200 hover:shadow-md transition-all duration-300 animate-pop-in" style="animation-delay: ${index * 50}ms">
                            <div class="h-24 bg-slate-50 rounded-lg flex items-center justify-center mb-3 group-hover/prod:bg-brand-50 transition-colors">
                                <i data-lucide="${prod.img}" class="w-8 h-8 text-slate-400 group-hover/prod:text-brand-500 transition-colors"></i>
                            </div>
                            <h6 class="text-xs font-bold text-slate-800 line-clamp-1 group-hover/prod:text-brand-600 transition-colors">${prod.name}</h6>
                            <p class="text-[10px] text-slate-400 mt-1">Lihat Detail</p>
                        </a>
                    `;
                    grid.innerHTML += html;
                });
                lucide.createIcons();
            }
        }

        window.addEventListener('DOMContentLoaded', () => { showCategory('interactive'); });

        // Navbar Scroll Effect
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

        // Search Filter Logic
        document.getElementById('productSearch').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const products = document.querySelectorAll('.product-item');
            let visibleCount = 0;

            products.forEach(product => {
                const title = product.querySelector('h3').innerText.toLowerCase();
                if (title.includes(searchTerm)) {
                    product.style.display = 'block';
                    visibleCount++;
                } else {
                    product.style.display = 'none';
                }
            });
            
            // Update product count
            document.getElementById('product-count').innerText = visibleCount;
        });

        document.getElementById('mobile-menu-btn').addEventListener('click', () => { document.getElementById('mobile-menu').classList.toggle('hidden'); });
    </script>
@endsection