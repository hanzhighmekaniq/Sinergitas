<div class="relative bg-[#0093DD] text-white">
    <!-- Wrapper -->
    <div class="container mx-auto">
        <!-- Konten Utama -->
        <section class="py-8" id="contact">
            <div class="flex flex-wrap lg:flex-nowrap gap-8">
                <!-- Left Side: Contact Form -->
                <div class="w-full lg:w-2/3 space-y-4">
                    <h2 class="text-left text-2xl lg:text-4xl font-bold">
                        KONTAK KAMI
                    </h2>
                    <p class="text-gray-300">
                        Untuk informasi lebih lanjut, hubungi kami atau isi formulir di bawah ini.
                    </p>
                    <form action="{{ route('contact.send') }}" method="GET">
                        @csrf
                        <div class="space-y-4">
                            <!-- Full Name -->
                            <label for="full_name" class="block text-sm font-medium text-white">Full Name</label>
                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}"
                                class="form-input rounded-lg w-full border border-gray-300 text-black px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Your Full Name" required>
                            @error('full_name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Email -->
                            <label for="email" class="block text-sm font-medium text-white">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="form-input rounded-lg w-full border border-gray-300 text-black px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Your Email" required>
                            @error('email')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Subject -->
                            <label for="subject" class="block text-sm font-medium text-white">Subject</label>
                            <input type="text" name="subject" id="subject" value="{{ old('subject') }}"
                                class="form-input rounded-lg w-full border border-gray-300 text-black px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Subject" required>
                            @error('subject')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Message -->
                            <label for="message" class="block text-sm font-medium text-white">Message</label>
                            <textarea name="message" id="message" rows="5"
                                class="form-input rounded-lg w-full border border-gray-300 text-black px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                placeholder="Your Message" required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            <!-- Submit Button -->
                            <button type="submit"
                                class="btn btn-primary bg-[#68B92E] w-full text-white py-2 px-4 rounded-lg hover:bg-[#569126] focus:outline-none focus:ring-2 focus:ring-green-700">
                                Send
                            </button>
                        </div>
                    </form>


                    @if (session('success'))
                        <p class="text-green-500 mt-4">{{ session('success') }}</p>
                    @endif
                </div>

                <!-- Right Side: Contact Information -->
                <div class="w-full lg:w-1/2 space-y-6">
                    <div class="space-y-2">
                        <h3 class="flex items-center gap-2 text-lg font-semibold">
                            <i class="fa fa-map-marker"></i> Address
                        </h3>
                        <p>Jl. Cendrawasih No. 20 Jember, East Java, Indonesia</p>
                        <div class="aspect-w-16 aspect-h-9">
                            <iframe src="https://www.google.com/maps/embed?pb=..." class="rounded-lg w-full h-full"
                                frameborder="0" allowfullscreen></iframe>
                        </div>
                    </div>
                    <div class="space-y-2">
                        <h3 class="flex items-center gap-2 text-lg font-semibold">
                            <i class="fa fa-phone"></i> Contact
                        </h3>
                        <p>Telp (62-331) 487642</p>
                    </div>
                    <div class="space-y-2">
                        <h3 class="flex items-center gap-2 text-lg font-semibold">
                            <i class="fa fa-envelope-o"></i> Email
                        </h3>
                        <address>
                            Faks (62-331) 427533 <br>
                            <a href="mailto:bps3509@bps.go.id" class="text-white font-bold">bps3509@bps.go.id</a>
                        </address>
                    </div>
                    <div class="flex space-x-4 text-2xl">
                        <a href="https://www.instagram.com/bpsjember/" target="_blank" class="hover:text-orange-400"><i
                                class="fa fa-instagram"></i></a>
                        <a href="https://www.youtube.com/c/BPSKabupatenJember" target="_blank"
                            class="hover:text-red-500"><i class="fa fa-youtube"></i></a>
                        <a href="https://www.facebook.com/jemberkab.bps.go.id/" target="_blank"
                            class="hover:text-blue-500"><i class="fa fa-facebook"></i></a>
                        <a href="https://x.com/bps_jember/" target="_blank" class="hover:text-sky-500"><i
                                class="fa fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="fixed bottom-0 left-0 w-full bg-[#0093DD] text-center">
        <p class="text-white">Hak Cipta &copy; 2024 Badan Pusat Statistik Kabupaten Jember</p>
    </footer>
</div>
