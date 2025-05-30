<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Persunsika.co</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ecommerce.css">
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="text-white sticky top-0 z-10">
        <nav class="container mx-auto flex justify-between items-center px-12">
            <h1 class="font-bold">Persunsika.co</h1>
            <ul class="flex space-x-10">
                <li><a href="#home" class="hover:text-[var(--primary-red)] section-link">Home</a></li>
                <li><a href="#products" class="hover:text-[var(--primary-red)] section-link">Products</a></li>
                <li><a href="#about" class="hover:text-[var(--primary-red)] section-link">About Us</a></li>
                <li><a href="#contact" class="hover:text-[var(--primary-red)] section-link">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Hero Section -->
    <section id="home" class="bg-[var(--primary-red)] text-white pt-32 flex items-center justify-center section-bg active">
        <div class="container mx-auto text-center px-6">
            <h2 class="text-5xl font-bold mb-6 animate-fadeIn">Official Persunsika Merchandise</h2>
            <p class="text-xl mb-8 animate-slideUp">Saat kata tak Berdaya, Tulisan Berbicara</p>
            <a href="#products" class="bg-[var(--primary-black)] text-white px-8 py-4 rounded-full font-semibold btn-anim section-link">Shop Now</a>
            <div class="mt-12">
                <svg class="w-full h-24 opacity-20" viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 50C240 100 480 0 720 50C960 100 1200 0 1440 50" stroke="white" stroke-width="4"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="pt-32 flex items-center section-bg">
        <div class="container mx-auto px-6">
            <h2 class="text-4xl font-bold text-center mb-12 animate-fadeIn">Our Products</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Product Card 1 -->
                <div class="bg-[var(--primary-black)] text-white rounded-lg shadow-lg overflow-hidden product-card cursor-pointer" onclick="showProductPopup(1)">
                    <img src="img/Tshirt 1 (DPN).png" alt="T-Shirt" class="w-full h-64 object-contain">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">T-Shirt Mata Mahasiswa</h3>
                        <p class="text-gray-300 mb-4">Rp75.000</p>
                    </div>
                </div>
                <!-- Product Card 2 -->
                <div class="bg-[var(--primary-black)] text-white rounded-lg shadow-lg overflow-hidden product-card cursor-pointer" onclick="showProductPopup(2)">
                    <img src="img/Tshirt 2 (DPN).png" alt="T-Shirt" class="w-full h-64 object-contain">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">T-Shirt Don't Let It Be</h3>
                        <p class="text-gray-300 mb-4">Rp80.000</p>
                    </div>
                </div>
                <!-- Product Card 3 -->
                <div class="bg-[var(--primary-black)] text-white rounded-lg shadow-lg overflow-hidden product-card cursor-pointer" onclick="showProductPopup(3)">
                    <img src="img/Tshirt 3 (DPN).png" alt="T-Shirt" class="w-full h-64 object-contain">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">T-Shirt Freedom Of Speech (Black Edition)</h3>
                        <p class="text-gray-300 mb-4">Rp75.000</p>
                    </div>
                </div>
                <!-- Product Card 4 -->
                <div class="bg-[var(--primary-black)] text-white rounded-lg shadow-lg overflow-hidden product-card cursor-pointer" onclick="showProductPopup(4)">
                    <img src="img/Tshirt 4 (DPN).png" alt="T-Shirt" class="w-full h-64 object-contain">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">T-Shirt Freedom Of Speech (White Edition)</h3>
                        <p class="text-gray-300 mb-4">Rp75.000</p>
                    </div>
                </div>
                <!-- Product Card 5 -->
                <div class="bg-[var(--primary-black)] text-white rounded-lg shadow-lg overflow-hidden product-card cursor-pointer" onclick="showProductPopup(5)">
                    <img src="img/Totebag 1.png" alt="Totebag" class="w-full h-64 object-contain">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Totebag Mata Mahasiswa (Voice of Resistance)</h3>
                        <p class="text-gray-300 mb-4">Rp35.000</p>
                    </div>
                </div>
                <!-- Product Card 6 -->
                <div class="bg-[var(--primary-black)] text-white rounded-lg shadow-lg overflow-hidden product-card cursor-pointer" onclick="showProductPopup(6)">
                    <img src="img/Totebag 2.png" alt="Totebag" class="w-full h-64 object-contain">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Totebag Mata Mahasiswa (Art of Journalism)</h3>
                        <p class="text-gray-300 mb-4">Rp35.000</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="bg-gray-200 pt-32 flex items-center justify-center section-bg">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6 animate-fadeIn">About Us</h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto animate-slideUp">
                Persunsika.co is the official store for our institution's merchandise. 
                We offer high-quality apparel and accessories designed to celebrate 
                our community's spirit and pride. Every purchase supports our programs!
            </p>
            <div class="mt-12">
                <svg class="w-full h-24 opacity-20" viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 50C240 100 480 0 720 50C960 100 1200 0 1440 50" stroke="var(--primary-black)" stroke-width="4"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="pt-32 flex items-center justify-center section-bg">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6 animate-fadeIn">Contact Us</h2>
            <p class="text-lg text-gray-700 mb-12 animate-slideUp">
                Reach out to us through our social media channels!
            </p>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8 max-w-md mx-auto">
                <!-- Instagram Link -->
                <a href="https://www.instagram.com/persunsika.co?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" class="social-link">
                    <img src="img/instagram.svg" alt="Instagram" class="w-10 h-10">
                    <span class="username text-gray-700 text-lg">persunsika.cs</span>
                </a>
                <!-- WhatsApp Link -->
                <a href="https://wa.me/6281289762615" target="_blank" class="social-link">
                    <img src="img/whatsapp.svg" alt="WhatsApp" class="w-10 h-10">
                    <span class="username text-gray-700 text-lg">persunsika</span>
                </a>
            </div>
            <div class="mt-12">
                <svg class="w-full h-24 opacity-20" viewBox="0 0 1440 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 50C240 100 480 0 720 50C960 100 1200 0 1440 50" stroke="var(--primary-black)" stroke-width="4"/>
                </svg>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-[var(--primary-black)] text-white py-6">
        <div class="container mx-auto text-center">
            <p>© 2025 Persunsika.co. All rights reserved.</p>
        </div>
    </footer>

    <!-- Product Popup -->
    <div id="product-popup" class="popup">
        <div class="popup-content">
            <span class="popup-close" onclick="closeProductPopup()">×</span>
            <div id="popup-content" class="text-center">
            </div>
        </div>
    </div>

    <script src="ecommerce.js"></script>
</body>
</html>