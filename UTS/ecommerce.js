const products = {
    1: {
        name: "T-Shirt Mata Mahasiswa",
        price: "Rp75.000",
        images: ["img/Tshirt 1 (DPN).png", "img/Tshirt 1 (BLKG).png"],
        description: "High-quality cotton T-shirt featuring the iconic Mata Mahasiswa design."
    },
    2: {
        name: "T-Shirt Don't Let It Be",
        price: "Rp80.000",
        images: ["img/Tshirt 2 (DPN).png", "img/Tshirt 2 (BLKG).png"],
        description: "Bold and stylish T-shirt with a powerful message."
    },
    3: {
        name: "T-Shirt Freedom Of Speech (Black Edition)",
        price: "Rp75.000",
        images: ["img/Tshirt 3 (DPN).png", "img/Tshirt 3 (BLKG).png"],
        description: "Black edition T-shirt celebrating freedom of expression."
    },
    4: {
        name: "T-Shirt Freedom Of Speech (White Edition)",
        price: "Rp75.000",
        images: ["img/Tshirt 4 (DPN).png", "img/Tshirt 4 (BLKG).png"],
        description: "White edition T-shirt celebrating freedom of expression."
    },
    5: {
        name: "Totebag Mata Mahasiswa (Voice of Resistance)",
        price: "Rp35.000",
        images: ["img/Totebag 1.png"],
        description: "Durable totebag with a resistant design."
    },
    6: {
        name: "Totebag Mata Mahasiswa (Art of Journalism)",
        price: "Rp35.000",
        images: ["img/Totebag 2.png"],
        description: "Eco-friendly totebag celebrating journalism."
    }
};

// Show Product Popup
function showProductPopup(id) {
    const product = products[id];
    const popupContent = document.getElementById('popup-content');
    popupContent.innerHTML = `
                <h2 class="text-2xl font-bold mb-4">${product.name}</h2>
                <div class="carousel mb-6">
                    ${product.images.map((img, index) => `
                        <img src="${img}" class="carousel-img w-full ${index === 0 ? 'block' : 'hidden'}" alt="${product.name}">
                    `).join('')}
                </div>
                <p class="text-gray-300 mb-4">${product.description}</p>
                <p class="text-xl font-semibold mb-4">${product.price}</p>
                <button class="bg-[var(--primary-red)] text-white px-6 py-3 rounded btn-anim" onclick="addToCart(${id})">Add to Cart</button>
                <div class="flex justify-center space-x-4 mt-4">
                    ${product.images.map((_, index) => `
                        <button class="w-3 h-3 rounded-full ${index === 0 ? 'bg-[var(--primary-red)]' : 'bg-gray-400'}" onclick="changeCarouselImage(${id}, ${index})"></button>
                    `).join('')}
                </div>
            `;
    document.getElementById('product-popup').style.display = 'flex';
}

// Close Product Popup
function closeProductPopup() {
    document.getElementById('product-popup').style.display = 'none';
}

// Carousel Image Change
function changeCarouselImage(productId, index) {
    const images = document.querySelectorAll(`#popup-content .carousel-img`);
    const buttons = document.querySelectorAll(`#popup-content button.rounded-full`);
    images.forEach(img => img.classList.add('hidden'));
    buttons.forEach(btn => btn.classList.replace('bg-[var(--primary-red)]', 'bg-gray-400'));
    images[index].classList.remove('hidden');
    buttons[index].classList.replace('bg-gray-400', 'bg-[var(--primary-red)]');
}

// Add to Cart
function addToCart(id) {
    alert(`${products[id].name} added to cart!`);
}

// Section Navigation
document.querySelectorAll('.section-link').forEach(link => {
    link.addEventListener('click', function (e) {
        e.preventDefault();
        const targetId = this.getAttribute('href').substring(1);
        document.querySelectorAll('section').forEach(section => {
            section.classList.remove('active');
        });
        const targetSection = document.getElementById(targetId);
        targetSection.classList.add('active');
        targetSection.scrollIntoView({ behavior: 'smooth' });
    });
});

// Animations on Scroll
const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('active');
        }
    });
}, { threshold: 0.1 });

document.querySelectorAll('section').forEach(section => {
    observer.observe(section);
});