<!-- footer section start -->
<footer class=" bg-green-700 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-6 gap-8">
            <div class="lg:col-span-2">
                <img src="{{ asset('images/download_removebg_preview_1.webp') }}" alt="Logo"
                    class="mb-4 max-w-[200px]" />
                <p class="mb-5 text-sm">
                    Komplek SMPIT Al Ittihad Rumbai, JL. Yos Sudarso, Lembah Danai,
                    Kec. Rumbai Pesisir, Kota Pekanbaru, Riau 28265
                </p>
                <div class="flex space-x-4">
                    <a href="#" class="text-2xl hover:text-gray-300 transition-colors duration-300"><i
                            class="fab fa-facebook"></i></a>
                    <a href="#" class="text-2xl hover:text-gray-300 transition-colors duration-300"><i
                            class="fab fa-twitter"></i></a>
                    <a href="#" class="text-2xl hover:text-gray-300 transition-colors duration-300"><i
                            class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-4">Program Kami</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">Fullday School</a>
                    </li>
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">Boarding School</a>
                    </li>
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">Character
                            Building</a></li>
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">Enterpreneur
                            Student</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-4">Sekolah</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">Tentang Sekolah</a>
                    </li>
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">Career</a></li>
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">Alumni</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-4">Support</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">FAQ</a></li>
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">Policy</a></li>
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">Kurikulum</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-bold mb-4">Contact</h3>
                <ul class="space-y-2">
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">WhatsApp</a></li>
                    <li><a href="#" class="hover:text-gray-300 transition-colors duration-300">Support 24</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!-- footer section ends -->

<!-- script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/js/lightgallery.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script>
    document.getElementById('toggleNavbar').addEventListener('click', function() {
        document.getElementById('mobileMenu').classList.toggle('hidden');
    });
</script>
</body>

</html>
