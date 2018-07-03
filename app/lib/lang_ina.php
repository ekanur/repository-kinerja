<?

/*******************************************************************************
* Filename : lang.eng.php
* Description : english language
*******************************************************************************/

## HTML ##
$app['lang']['html']['title'] = "{$app['name']['autoresponse']}<br>";

## PAGINATION ##
$app['lang']['txt']['page'] = "Halaman";
$app['lang']['txt']['out_of'] = "dari";
$app['lang']['txt']['all'] = "Semua";

## ERROR COMPONENT ##
$app['lang']['error']['header'] = "<div class=\"alert alert-danger\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
$app['lang']['error']['element'] = "";
$app['lang']['error']['footer'] = "</div>";
$app['lang']['error']['title'] = "Error...";


## ERROR TYPE ##
$app['lang']['error']['empty'] = "Harus diisi.<br>";
$app['lang']['error']['digit'] = "Harus dalam angka.<br>";
$app['lang']['error']['date'] = "Tanggal harus benar.<br>";
$app['lang']['error']['checkbox'] = "Pilih minimal satu data.<br>";
$app['lang']['error']['select'] = "Harus dipilih.<br>";
$app['lang']['error']['email'] = "Alamat e-mail harus benar.<br>";
$app['lang']['error']['phone'] = "Nomor telepon harus benar.<br>";
$app['lang']['error']['hp'] = "Nomor HP harus benar.<br>";
$app['lang']['error']['numeric'] = "Harus dengan angka yang benar.<br>";
$app['lang']['error']['invalid_login'] = "Username atau password salah.<br>";
$app['lang']['error']['adm_not_login'] = "Anda belum login ...<br>Silakan login <a href='$app[www_siakad]/index.php'>disini</a><br>";
$app['lang']['error']['prt_not_login'] = "Anda belum login ...<br>Silakan login <a href='$app[www]/index.php'>disini</a><br>";
$app['lang']['error']['adm_no_permission'] = "Maaf, anda tidak diijinkan untuk menggunakan aplikasi ini.<br><br>";

$app['lang']['error']['root_not_login'] = "Anda belum login ...<br>Silakan login <a href='".$app['www']."/index.php?act=login_setup&step=1'>disini</a><br>";
$app['lang']['error']['invalid_image_validator']="Kode tidak cocok.<br>";
$app['lang']['error']['username_exist'] = "Username sudah terpakai. <br>Silahkan coba username lain.<br>";
$app['lang']['error']['email_exist'] = "Maaf, E-mail yang anda pakai sudah terdaftar. <br>Silahkan daftar dengan e-mail lain.<br>";
$app['lang']['error']['password_not_match'] = "Silahkan, ketik password ulang sama dengan password.<br>";
$app['lang']['error']['one_application_required'] = "Pilih minim salah satu aplikasi untuk pengguna.<br>";
$app['lang']['error']['image.ERR_TYPE'] = "Tipe image tidak sesuai.<br>";
$app['lang']['error']['image.ERR_WIDTH'] = "Panjang dan Lebar image diluar cakupan.<br>";
$app['lang']['error']['image.ERR_SIZE'] = "Ukuran terlalu besar.<br>";
$app['lang']['error']['ERR_COPY'] = "Upload gagal.<br>";
$app['lang']['error']['file.ERR_SIZE'] = "Ukuran File terlalu besar.<br>";
$app['lang']['error']['username_not_found'] = "Username tidak ada di database.<br>";

$app['lang']['error']['code_exist'] = "Kode sudah dipakai.<br>";
$app['lang']['error']['allocation_error'] = "Jatah jam pelajaran lebih kecil dari yang sudah digunakan.<br>";
$app['lang']['error']['nomor_induk_exist'] = "Nomor induk sudah terdaftar.<br>";
$app['lang']['error']['nama_exist'] = "Nama sudah terdaftar.<br>";

## SUCCESS TYPE ##
$app['lang']['success']['title'] = "Berhasil...<br>";
$app['lang']['success']['icon']="<img src=$app[www]/img/icon_success.gif />";

## FORM ##
$app['lang']['field']['name'] = "Nama<br>";
$app['lang']['field']['username'] = "Username<br>";
$app['lang']['field']['password'] = "Password<br>";
$app['lang']['field']['retype_password'] = "Password Ulang<br>";
$app['lang']['field']['code'] = "Kode<br>";
$app['lang']['field']['lesson'] = "Pelajaran<br>";
$app['lang']['field']['picture'] = "Gambar<br>";
$app['lang']['field']['question'] = "Pertanyaan<br>";
$app['lang']['field']['answer'] = "Jawaban<br>";
$app['lang']['field']['gender'] = "Jenis kelamin<br>";
$app['lang']['field']['birth_place'] = "Tempat lahir<br>";
$app['lang']['field']['birthday'] = "Tanggal lahir<br>";
$app['lang']['field']['phone'] = "No. Telepon<br>";
$app['lang']['field']['no_hp'] = "No HP<br>";
$app['lang']['field']['alamat'] = "Alamat<br>";
$app['lang']['field']['nama'] = "Nama<br>";
$app['lang']['field']['email'] = "Email<br>";
$app['lang']['field']['msg'] = "Pesan<br>";
$app['lang']['field']['bank'] = "Bank<br>";
$app['lang']['field']['kdkomp'] = "Mata Kuliah<br>";

## INFO ##
$app['lang']['info']['header'] = "<div class=\"alert alert-success\"><a href=\"#\" class=\"close\" data-dismiss=\"alert\">&times;</a>";
$app['lang']['info']['footer'] = "</div>";
$app['lang']['info']['adm_logout'] = "Admin telah logout.<br>";
$app['lang']['info']['tch_logout'] = "Guru telah logout.<br>";
$app['lang']['info']['prt_logout'] = "Wali Murid telah logout.<br>";
$app['lang']['info']['root_logout'] = "Root telah logout.<br>";
$app['lang']['info']['email'] = "Isi alamat email dengan benar. Contoh : xxxxx@yahoo.com";
$app['lang']['info']['phone'] = "Isi No. Telepon dengan benar. Contoh : +62317XXXXXX";
$app['lang']['info']['hp'] = "Isi No. HP dengan benar. Contoh : +628155XXXXXX";
$app['lang']['info']['user_added'] = "Pengguna baru sudah terdaftar di database.<br>";
$app['lang']['info']['user_modified'] = "Profil pengguna sudah diubah.<br>";
$app['lang']['info']['user_deleted'] = "Pengguna yang dipilih sudah dihapus.<br>";
$app['lang']['info']['user_set_status'] = "Status pengguna sudah diubah.<br>";
$app['lang']['info']['password_modified'] = "Password pengguna sudah diubah.<br>";
$app['lang']['info']['jalur_modified'] = "Jalur Masuk sudah diubah.<br>";
$app['lang']['info']['jalur_set_status'] = "Status jalur masuk sudah diubah.<br>";
$app['lang']['info']['theme_modified'] = "Warna Tampilan user sudah diubah.<br>";
$app['lang']['info']['config_modified'] = "Pengaturan sistem telah diubah.<br>";

$app['lang']['info']['bill_info_added'] = "Bill info baru telah ditambahkan ke database.<br>";
$app['lang']['info']['bill_info_modified'] = "Bill info telah diubah.<br>";
$app['lang']['info']['bill_info_deleted'] = "Bill info yang dipilih telah dihapus.<br>";
$app['lang']['info']['e_payment_info_added'] = "Payment info baru telah ditambahkan ke database.<br>";
$app['lang']['info']['e_payment_info_modified'] = "Payment info telah diubah.<br>";
$app['lang']['info']['e_payment_info_deleted'] = "Payment info yang dipilih telah dihapus.<br>";

?>