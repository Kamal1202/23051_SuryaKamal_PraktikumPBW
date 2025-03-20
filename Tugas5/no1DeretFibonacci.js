console.log("No. 1 Deret Fibonacci");
console.log("Surya Kamal - 2310631170051 \n");

// Mendefinisikan fungsi fibonacci yang menerima satu parameter n
const fibonacci = (n) => {
    // Inisialisasi array dengan dua angka pertama dalam deret Fibonacci
    let fibo = [0, 1];

    // Menghitung angka Fibonacci berikutnya hingga mencapai n angka
    for (let i = 2; i < n; i++) {
        // Menambahkan angka Fibonacci baru ke array
        fibo.push(fibo[i - 1] + fibo[i - 2]);
    }

    // Mengembalikan array yang berisi n angka Fibonacci
    return fibo;
};

// Contoh pengguan: mencetak 10 angknaa Fibonacci
console.log("Menampilkan 10 deret Angka Fibonacci: ");
console.log(fibonacci(10));