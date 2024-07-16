function updateNotification(message, pesan) {
    var htmlContent = '<div class="custom-notification"><i class="fa fa-bell-o"></i><strong>' + message + '</strong><br><span>' + pesan + '</span></div>';

    var notify = $.notify({
        message: htmlContent
    }, {
        type: 'theme',
        allow_dismiss: true,
        delay: 1000,
        showProgressbar: true,
        timer: 500,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-secondary" role="alert">' +
            '<div><span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span></div>' +
            '<div data-notify="message">{2}</div>' +
            '<div class="progress" data-notify="progressbar">' +
            '<div class="progress-bar progress-bar-secondary" role="progressbar" ' +
            'aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
    });

    // Menyesuaikan lebar kotak notifikasi
    var notifyContainer = notify.$container[0];
    var notifyMessage = notifyContainer.querySelector('[data-notify="message"]');
    var messageWidth = notifyMessage.offsetWidth;
    notifyContainer.style.width = messageWidth + 'px';
}

var sekarang = new Date();
var namaHari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
var indeksHari = sekarang.getDay();
var hari = namaHari[indeksHari];
var jam = sekarang.getHours();
var menit = sekarang.getMinutes();
var detik = sekarang.getSeconds();
console.log("Hari ini adalah " + hari + ", pukul " + jam + ":" + menit + ":" + detik);

let message = "";
let pesan = "";

if (jam >= 5 && jam < 12) {
    message = "SELAMAT PAGI, GOOD MORNING";
    pesan = "Selamat hari baru! Semangat untuk memulai hari ini dengan penuh energi dan semangat!";
} else if (jam >= 12 && jam < 13) {
    message = "SELAMAT SIANG, GOOD AFTERNOON";
    pesan = "Waktunya istirahat sebentar dan nikmati makan siangmu. Tetap semangat untuk menyelesaikan tugas-tugasmu!";
}else if(jam >= 13 && jam < 15){
    message = "SELAMAT SIANG, GOOD AFTERNOON";
    pesan = "Siang yang cerah!. Jangan lupa minum dan tetap semangat untuk menyelesaikan tugas-tugasmu!";
} else if (jam >= 15 && jam < 18) {
    message = "SELAMAT SORE, GOOD AFTERNOON";
    pesan = "Sore yang cerah! Jangan lupa untuk menyelesaikan pekerjaanmu dengan semangat!";
} else {
    message = "SELAMAT MALAM, GOOD EVENING";
    if (jam >= 21 && jam < 23) {
        pesan = "Semangat terus! Meskipun larut malam, tetap pertahankan fokus dan semangatmu!";
    }
     else {
        pesan = "Walaupun sudah malam, jangan lupakan untuk tetap semangat! Teruskan usahamu!";
    }
} 


// Panggil fungsi untuk menampilkan notifikasi
updateNotification(message, pesan);
