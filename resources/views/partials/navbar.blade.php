 <!-- Navigation -->
    <nav class="fixed w-full z-50 transition-all duration-300 py-6" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center cursor-pointer" onclick="window.scrollTo(0,0)">
                    <div class="bg-brand-600 text-white p-2 rounded-lg mr-2">
                        <i data-lucide="monitor-play" class="w-6 h-6"></i>
                    </div>
                    <span class="font-display font-bold text-2xl tracking-tight text-white shadow-sm">M<span class="text-brand-500">GA</span></span>
                </div>

                <!-- Menu Tengah (Updated with Mega Menu Split View) -->
                <div class="hidden md:flex space-x-8 items-center absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
                    <a href="/" class="text-slate-100 hover:text-white font-medium transition drop-shadow-md">Beranda</a>
                    
                    <!-- MENU PRODUK DENGAN SPLIT MEGA MENU -->
                    <div class="relative group">
                        <button class="text-slate-100 hover:text-white font-medium transition drop-shadow-md flex items-center gap-1 focus:outline-none py-4">
                            Produk 
                            <i data-lucide="chevron-down" class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"></i>
                        </button>

                        <!-- Split Mega Menu Card -->
                        <div class="absolute left-1/2 -translate-x-1/2 top-full pt-4 w-[850px] max-w-[90vw] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform group-hover:translate-y-0 translate-y-4 z-50">
                            <div class="bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden flex h-[420px]">
                                
                                <!-- LEFT SIDE: Categories List -->
                                <div class="w-64 bg-slate-50 py-6 flex flex-col border-r border-slate-100">
                                    <h5 class="px-6 text-xs font-bold text-slate-400 uppercase tracking-widest mb-4">Kategori</h5>
                                    <div class="flex-1 overflow-y-auto">
                                        <button data-category="interactive" onmouseover="showCategory('interactive')" class="category-item active w-full text-left px-6 py-3 text-sm font-medium text-slate-600 hover:bg-white hover:text-brand-600 transition-all flex items-center justify-between group/cat">
                                            Interactive Panel
                                            <i data-lucide="chevron-right" class="w-4 h-4 opacity-0 group-hover/cat:opacity-100 transition-opacity"></i>
                                        </button>
                                        <button data-category="mobile" onmouseover="showCategory('mobile')" class="category-item w-full text-left px-6 py-3 text-sm font-medium text-slate-600 hover:bg-white hover:text-brand-600 transition-all flex items-center justify-between group/cat">
                                            Mobile Signage
                                            <i data-lucide="chevron-right" class="w-4 h-4 opacity-0 group-hover/cat:opacity-100 transition-opacity"></i>
                                        </button>
                                        <button data-category="signage" onmouseover="showCategory('signage')" class="category-item w-full text-left px-6 py-3 text-sm font-medium text-slate-600 hover:bg-white hover:text-brand-600 transition-all flex items-center justify-between group/cat">
                                            Digital Signage
                                            <i data-lucide="chevron-right" class="w-4 h-4 opacity-0 group-hover/cat:opacity-100 transition-opacity"></i>
                                        </button>
                                        <button data-category="videotron" onmouseover="showCategory('videotron')" class="category-item w-full text-left px-6 py-3 text-sm font-medium text-slate-600 hover:bg-white hover:text-brand-600 transition-all flex items-center justify-between group/cat">
                                            Videotron LED
                                            <i data-lucide="chevron-right" class="w-4 h-4 opacity-0 group-hover/cat:opacity-100 transition-opacity"></i>
                                        </button>
                                        <button data-category="kiosk" onmouseover="showCategory('kiosk')" class="category-item w-full text-left px-6 py-3 text-sm font-medium text-slate-600 hover:bg-white hover:text-brand-600 transition-all flex items-center justify-between group/cat">
                                            Kiosk System
                                            <i data-lucide="chevron-right" class="w-4 h-4 opacity-0 group-hover/cat:opacity-100 transition-opacity"></i>
                                        </button>
                                        <button data-category="access" onmouseover="showCategory('access')" class="category-item w-full text-left px-6 py-3 text-sm font-medium text-slate-600 hover:bg-white hover:text-brand-600 transition-all flex items-center justify-between group/cat">
                                            Aksesoris
                                            <i data-lucide="chevron-right" class="w-4 h-4 opacity-0 group-hover/cat:opacity-100 transition-opacity"></i>
                                        </button>
                                    </div>
                                    
                                    <!-- Footer Link Left -->
                                    <div class="px-6 mt-4 pt-4 border-t border-slate-200">
                                        <a href="/kategori" class="text-xs text-brand-600 font-bold hover:underline flex items-center gap-1">
                                            Lihat Semua Kategori <i data-lucide="arrow-big-right-dash" class="w-3 h-3"></i>
                                        </a>
                                    </div>
                                </div>

                                <!-- RIGHT SIDE: Product Grid (Dynamic Content) -->
                                <div class="flex-1 p-8 bg-white overflow-y-auto">
                                    <div class="flex justify-between items-center mb-6">
                                        <h4 id="mega-menu-title" class="font-display font-bold text-xl text-slate-800">Interactive Panel</h4>
                                        <a href="#" class="text-xs font-semibold text-brand-500 hover:text-brand-700 flex items-center">Lihat Semua <i data-lucide="arrow-right" class="w-3 h-3 ml-1"></i></a>
                                    </div>
                                    
                                    <!-- Grid Container -->
                                    <div id="mega-menu-grid" class="grid grid-cols-3 gap-4">
                                        <!-- Content will be injected by JS -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="/tentang" class="text-slate-100 hover:text-white font-medium transition drop-shadow-md">Tentang</a>
                </div>

                <!-- Tombol Kanan -->
                <div class="flex items-center gap-4">
                    <div class="md:hidden flex items-center">
                        <button id="mobile-menu-btn" class="text-white hover:text-brand-500 focus:outline-none">
                            <i data-lucide="menu" class="w-8 h-8"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden md:hidden bg-slate-900 border-t border-slate-800 absolute w-full">
            <div class="px-4 pt-2 pb-6 space-y-2 shadow-lg">
                <a href="#home" class="block px-3 py-3 text-base font-medium text-slate-300 hover:bg-slate-800 hover:text-white rounded-md">Beranda</a>
                <a href="#products" class="block px-3 py-3 text-base font-medium text-slate-300 hover:bg-slate-800 hover:text-white rounded-md">Produk</a>
                <a href="#about" class="block px-3 py-3 text-base font-medium text-slate-300 hover:bg-slate-800 hover:text-white rounded-md">Tentang</a>
                <a href="#contact" class="block px-3 py-3 text-base font-medium text-slate-300 hover:bg-slate-800 hover:text-white rounded-md">Kontak</a>
            </div>
        </div>
    </nav>