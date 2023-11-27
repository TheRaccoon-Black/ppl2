CREATE TABLE users (
    `id_user` int(11) NOT NULL AUTO_INCREMENT,   
    `nama` varchar(100) NOT NULL,   
    `email` varchar(255) NOT NULL,   
    `username` varchar(32) NOT NULL,   
    `password` varchar(64) NOT NULL,   
    PRIMARY KEY (`id_user`),   
    UNIQUE KEY `email` (`email`)   
);

CREATE TABLE admin (
    admin_id INT PRIMARY KEY,
    nama VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255)
);

CREATE TABLE transaksi_keuangan (
    id_transaksi INT PRIMARY KEY,
    id_user INT,
    jumlah DECIMAL(10, 2),
    tanggal DATE,
    keterangan VARCHAR(255),
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE kategori_transaksi (
    id_kategori INT PRIMARY KEY,
    namaKategori VARCHAR(255),
    Deskripsi VARCHAR(255)
);

CREATE TABLE transaksi_kategori (
    id_transaksi INT,
    id_kategori INT,
    PRIMARY KEY (id_transaksi, id_kategori),
    FOREIGN KEY (id_transaksi) REFERENCES transaksi_keuangan(id_transaksi),
    FOREIGN KEY (id_kategori) REFERENCES kategori_transaksi(id_kategori)
);

CREATE TABLE anggaran_bulanan (
    id_anggaran INT PRIMARY KEY,
    id_user INT,
    jumlah_anggaran DECIMAL(10, 2),
    kategori_anggaran VARCHAR(255),
    tanggal_mulai DATE,
    tanggal_berakhir DATE,
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE hutang_piutang (
    id_hutang INT PRIMARY KEY,
    id_user INT,
    nama_pemberi_hutang VARCHAR(255),
    jumlah_hutang DECIMAL(10, 2),
    tanggal_peminjaman DATE,
    tanggal_jatuh_tempo DATE,
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);

CREATE TABLE rencana_keuangan (
    id_rencana INT PRIMARY KEY,
    id_user INT,
    tujuan_keuangan VARCHAR(255),
    jumlah_dibutuhkan DECIMAL(10, 2),
    tanggal_target DATE,
    FOREIGN KEY (id_user) REFERENCES users(id_user)
);