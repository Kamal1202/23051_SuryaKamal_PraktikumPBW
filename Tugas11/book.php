<?php

class Book {
    // Saya menyimpan kode buku, nama, dan jumlah sebagai properti privat
    private $code_book;
    private $name;
    private $qty;

    // Constructor ini saya gunakan untuk menginisialisasi objek Book saat dibuat
    // Saya hanya izinkan pengisian code_book dan qty lewat sini karena setter-nya saya buat privat
    public function __construct($code_book, $name, $qty) {
        $this->setCodeBook($code_book); // Saya panggil method privat untuk validasi dan set code_book
        $this->name = $name;            // Nama buku saya simpan langsung tanpa validasi
        $this->setQty($qty);            // Saya panggil method privat untuk validasi dan set qty
    }

    // Method ini saya gunakan untuk mengambil nilai code_book dari luar class
    public function getCodeBook() {
        return $this->code_book;
    }

    // Method ini saya gunakan untuk mengambil nilai qty dari luar class
    public function getQty() {
        return $this->qty;
    }

    // Method privat ini saya gunakan untuk memvalidasi dan menyimpan code_book
    private function setCodeBook($code_book) {
        // Saya periksa apakah format code_book sesuai dengan 'BB00'
        if (preg_match('/^[A-Z]{2}[0-9]{2}$/', $code_book)) {
            $this->code_book = $code_book;
        } else {
            // Kalau tidak sesuai, saya tampilkan pesan error
            echo "Error: Kode buku harus dalam format 'BB00' (2 huruf besar diikuti 2 angka).\n";
        }
    }

    // Method privat ini saya gunakan untuk memvalidasi dan menyimpan qty
    private function setQty($qty) {
        // Saya periksa apakah qty adalah integer dan nilainya positif
        if (is_int($qty) && $qty > 0) {
            $this->qty = $qty;
        } else {
            // Kalau tidak memenuhi syarat, saya tampilkan pesan error
            echo "Error: Jumlah buku harus berupa bilangan bulat positif.\n";
        }
    }
}
// Di bawah ini saya membuat objek baru dari class Book

$book1 = new Book("AB12", "Belajar PHP", 5); 
// Saya memasukkan code_book = "AB12", name = "Belajar PHP", dan qty = 5
// Karena format kode dan qty benar, maka objek berhasil dibuat

// Saya coba tampilkan data code_book dan qty
echo "Kode Buku: " . $book1->getCodeBook() . "\n";
echo "Jumlah Buku: " . $book1->getQty() . "\n";

// Sekarang saya coba buat objek lain dengan input yang salah
$book2 = new Book("oo22", "Salah Format", -10); 
// Karena "oo12" huruf kecil dan qty -10, maka akan muncul pesan error
// Nilai code_book dan qty tidak akan diset ke properti

// Coba saya tampilkan datanya juga (akan kosong/null karena gagal diset)
echo "Kode Buku: " . $book2->getCodeBook() . "\n";
echo "Jumlah Buku: " . $book2->getQty() . "\n";
?>