// console.log('Hello, world!')

// alert('Pemberitahuan!');

// confirm("Konfirmasi?");

// console.log(confirm("Konfirmasi?"));

// var nama = prompt('Masukkan nama:');
// console.log('Halo, ' + nama);

// var konfirmasi = confirm('Apakah Anda ingin pindah halaman?');
// if (konfirmasi == true) {
//     document.location.href = "coba.html";
// }

// let a = 2;
// for(let a = 0; a < 5; a++) {
//     console.log("ini a di dalam for : ", a);
// }
// console.log("ini a di luar for : ", a);

// console.log(5 === "5");

// function sapa(nama) {
//     return "Halo " + nama;
// }
// console.log(sapa("Budi"));

// function tambah(a = 1, b = 2) {
//     return a + b;
// }
// console.log(tambah());

// let mobil = {
//     merek: "Toyota",
//     model: "Carrola",
//     tahun: 2020,    
// };

// console.log(mobil.merek);
// console.log(mobil["tahun"]);

// let angka = [1, 2, 3, 4, 5];
// console.log(angka[2]);
// console.log(angka);
// angka.push(6);
// console.log(angka);
// mobil["warna"] = "Merah";
// console.log(mobil);

const judul = document.getElementById('judul');
judul.style.backgroundColor = 'red';

const btn = document.getElementById('btn');
btn.addEventListener('click', function() {
    alert('Tombol ditekan!');
});

btn.addEventListener('mouseenter', function() {
    btn.style.backgroundColor = 'red';
});

btn.addEventListener('mouseout', function() {
    btn.style.backgroundColor = '';
});

const ubahjudul = document.getElementById('ubahjudul');
ubahjudul.addEventListener('click', function() {
    judul.innerHTML="Button Diklik!";
});