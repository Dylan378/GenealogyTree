<div class="bg-slate-900 text-white fixed top-0 left-0 right-0 z-50 shadow-md">
    <div class="container mx-auto py-4 flex items-center justify-between">
        <div class="flex items-center space-x-4">
            <div class="text-3xl font-extrabold">
                <a href="{{ route('home') }}" class="hover:opacity-80 transition">
                    Genealogy <span class="text-blue-400">tree</span>
                </a>
            </div>
            
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-white text-2xl">
                    <i class="fas fa-bars"></i>
                </button>
            </div>

            <!-- Navigation Menu (Desktop) -->
            <nav class="hidden md:flex space-x-6 pl-4">
                <a href="https://github.com/Dylan378/GenealogyTree" class="hover:text-gray-400">Genealogy tree Repo</a>
            </nav>
        </div>
    </div>
    
    <!-- Mobile Navigation Menu -->
    <div id="mobile-menu" class="md:hidden bg-slate-800 text-white absolute top-16 left-0 right-0 hidden">
        <div class="flex flex-col space-y-4 py-4 px-6">
            <a href="#" class="hover:text-gray-400">Dylan Celis Repo</a>
        </div>
    </div>
</div>

<script>
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });
</script>
