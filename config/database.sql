/* 
Membuat table barang 
----------------------
CREATE TABLE `inventaris_barang`.`barang` (`id_barang` INT NOT NULL AUTO_INCREMENT , `kode_barang` TEXT NOT NULL , `nama_barang` VARCHAR(100) NOT NULL , `id_kategori` INT NOT NULL , `id_supplier` INT NOT NULL , `satuan` VARCHAR(20) NOT NULL , `stok` INT NOT NULL , `harga_beli` DECIMAL(12,2) NOT NULL , `harga_jual` DECIMAL(12,2) NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (`id_barang`)) ENGINE = InnoDB;
----------------------
//Membuat table users
CREATE TABLE `inventaris_barang`.`users` (`id_user` INT NOT NULL AUTO_INCREMENT , `nama_lengkap` VARCHAR(25) NOT NULL , `username` VARCHAR(25) NOT NULL , `password` VARCHAR(225) NOT NULL , `level` ENUM('admin','petugas') NOT NULL , `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id_user`)) ENGINE = InnoDB;
----------------------
//Membuah table barang_keluar
CREATE TABLE `inventaris_barang`.`barang_keluar` (`id_keluar` INT NOT NULL AUTO_INCREMENT , `tanggal` DATE NOT NULL , `id_barang` INT NOT NULL , `jumlah` INT NOT NULL , `tujuan` VARCHAR(100) NOT NULL , `keterangan` TEXT NOT NULL , `id_user` INT NOT NULL , PRIMARY KEY (`id_keluar`)) ENGINE = InnoDB;
----------------------
//Membuat table barang_masuk
CREATE TABLE `inventaris_barang`.`barang_masuk` (`id_masuk` INT NOT NULL AUTO_INCREMENT , `tanggal` DATE NOT NULL , `id_barang` INT NOT NULL , `jumlah` INT NOT NULL , `keterangan` TEXT NOT NULL , `id_user` INT NOT NULL , PRIMARY KEY (`id_masuk`)) ENGINE = InnoDB;
----------------------
//Membuat table peminjaman
CREATE TABLE `inventaris_barang`.`peminjaman` (`id_peminjam` INT NOT NULL AUTO_INCREMENT , `nama_peminjam` VARCHAR(25) NOT NULL , `nama_barang` VARCHAR(25) NOT NULL , `tanggal_peminjaman` DATE NOT NULL , `tanggal_pengembalian` DATE NOT NULL , `jumlah` INT NOT NULL , `keterangan` TEXT NOT NULL , PRIMARY KEY (`id_peminjam`)) ENGINE = InnoDB;
----------------------
//Membuat table kategori
CREATE TABLE `inventaris_barang`.`kategori` (`id_kategori` INT NOT NULL AUTO_INCREMENT , `nama_kategori` VARCHAR(25) NOT NULL , PRIMARY KEY (`id_kategori`)) ENGINE = InnoDB;
----------------------
//Membuat table supplier
CREATE TABLE `inventaris_barang`.`supplier` (`id_supplier` INT NOT NULL AUTO_INCREMENT , `nama_supplier` VARCHAR(100) NOT NULL , `alamat` TEXT NOT NULL , `telepon` VARCHAR(25) NOT NULL , PRIMARY KEY (`id_supplier`)) ENGINE = InnoDB;
*/