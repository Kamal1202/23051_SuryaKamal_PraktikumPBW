console.log("No. 2 Kalkulator");
console.log("Surya Kamal - 2310631170051 \n");

// Mendefinisikan fungsi kalkulator yang menerima operator dan sejumlah angka
const kalkulator = (operator, ...angka) => {
    // Menggunakan switch untuk menentukan operasi berdasarkan operator
    switch (operator) {
        case '+':
            return angka.reduce((a, b) => a + b); // Penjumlahan
        case '-':
            return angka.reduce((a, b) => a - b); // Pengurangan
        case '*':
            return angka.reduce((a, b) => a * b); // Perkalian
        case '/':
            return angka.reduce((a, b) => a / b); // Pembagian
        case '%':
            return angka.reduce((a, b) => a % b); // Modulus
        default:
            return "Operator tidak valid!";
        // Menggunakan metode reduce untuk menjumlahkan semua elemen array angka
    }
};

// Fungsi untuk menampilkan soal dan hasil
const tampilkanHasil = (operator, ...angka) => {
    const hasil = kalkulator(operator, ...angka); // Menghitung hasil menggunakan fungsi kalkulator
    const soal = angka.join(` ${operator} `); // Menggabungkan elemen-elemen array angka menjadi string soal
    console.log(`${soal} = ${hasil}`); // Menampilkan soal dan hasil
};

console.log("1) Penjumlahan:"); //Operasi penjumlahan pada kalkulator menggunakan operator '+'
tampilkanHasil('+', 10, 5, 3); // Output: 10 + 5 + 3 = 18

console.log("\n2) Pengurangan:"); //Operasi pengurangan pada kalkulator menggunakan operator '-'
tampilkanHasil('-', 20, 5); // Output: 20 - 5 = 15

console.log("\n3) Perkalian:"); //Operasi perkalian pada kalkulator menggunakan operator '*'
tampilkanHasil('*', 2, 4, 3); // Output: 2 * 4 * 3 = 24

console.log("\n4) Pembagian:"); //Operasi pembagian pada kalkulator menggunakan operator '/'
tampilkanHasil('/', 100, 2, 5); // Output: 100 / 2 / 5 = 10

console.log("\n5) Modulus:"); //Operasi modulus pada kalkulator menggunakan operator '%'
tampilkanHasil('%', 10, 3); // Output: 10 % 3 = 1