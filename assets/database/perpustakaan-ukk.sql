-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 02, 2024 at 08:54 AM
-- Server version: 8.0.30
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan-ukk`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int NOT NULL,
  `judul` varchar(225) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `sinopsis` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tahun_terbit` int NOT NULL,
  `id_kategori` int NOT NULL,
  `jumlah` int NOT NULL,
  `stok` int NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `judul`, `penulis`, `penerbit`, `sinopsis`, `tahun_terbit`, `id_kategori`, `jumlah`, `stok`, `foto`) VALUES
(1, 'Pulang Pergi', 'Tere Liye', 'Gramedia', 'Nam tempus turpis at metus scelerisque placerat nulla deumantos                     solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis                     ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo                     pharetras loremos', 2020, 1, 5, 0, '20240923132236.jpg'),
(3, 'Langit', 'Tere Liye', 'Gramedia', 'Nam tempus turpis at metus scelerisque placerat nulla deumantos solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo                     pharetras loremos', 2021, 1, 7, 7, '20240923132237.jpg'),
(4, 'Bulan', 'Tere Liye', 'Gramedia', 'Nam tempus turpis at metus scelerisque placerat nulla deumantos                     solicitud felis. Pellentesque diam dolor, elementum etos lobortis des mollis                     ut risus. Sedcus faucibus an sullamcorper mattis drostique des commodo                     pharetras loremos', 2022, 1, 6776, 6776, '20240923132238.jpg'),
(5, 'Dilan Dia adalah Dilanku 1990', 'Pidi Baiq', 'DAR! Mizan', 'Novel ini menceritakan tentang kisah cinta Milea. Milea adalah seorang murid baru di SMA Negeri di Bandung, pindahan dari jakarta. Saat dia jalan menuju sekolah dari arah belakang ada suara motor yang sengaja memperlambat kecepatannya untuk bisa sejajar dengan Milea, pengendara itu teman satu sekolahnya, seorang peramal. Peramal itu mengatakan bahwa mereka akan bertemu di kantin. Awalnya, Milea tidak menghiraukan laki-laki peramal itu. Tapi, setiap hari peramal itu selalu mengganggu Milea, selalu mengirimkan surat.  Milea mulai penasaran dengan laki-laki itu dan mencari tahu, laki-laki peramal itu bernama Dilan. ', 2014, 1, 100, 100, '20240927084537.jpg'),
(6, 'Dilan 1991', 'Pidi Baiq', 'Grane', 'Milea mulai bercerita tentang kisah cintanya dengan Dilan. Ya, Milea mengenang kisah cinta yang terjalin di kota romantis, Bandung. Kali ini kisah Milea dimulai saat Milea dan Dilan sudah resmi berpacaran. Kisah ini dimulai saat setelah mereka menandatangani materai tentang ikrar mereka sudah resmi berpacaran. Tempat jadian mereka berada di warung bi Eem, yang terletak tidak jauh dari Sekolah mereka. Seteah mereka berdua resmi berpacaran, Dilan membawa Milea naik ke motor Cb-nya. Mereka menyusuri jalanan dibawah rintik hujan yang terjadi pada Desember 1990 di kota Bandung tersebut.', 2015, 1, 100, 100, '20240927085027.jpg'),
(7, 'Milea: Suara dari Dilan', 'Pidi Baiq', 'DAR! Mizan', 'isah ini berfokus pada bagaimana Dilan merespons peristiwa-peristiwa penting dalam hubungannya dengan Milea, dari sudut pandangnya. Dia menceritakan perasaan cintanya yang mendalam kepada Milea, namun juga mengungkapkan kesulitannya dalam menjalani hubungan tersebut. Dilan, yang terkenal sebagai remaja tangguh dan anggota geng motor, memiliki cara berpikir dan pendekatan yang berbeda dalam menjalani cinta.\r\n\r\nDalam novel ini, Dilan berbicara tentang kegembiraan saat bersama Milea, tetapi juga rasa sakit ketika hubungan mereka mulai retak. Konflik yang terjadi akibat dunia geng motor yang Dilan jalani menjadi salah satu faktor pemisah mereka. Milea, yang khawatir dengan keselamatan Dilan dan tidak menyetujui keterlibatannya dalam dunia geng motor, merasa semakin jauh dari Dilan. Pada akhirnya, perpisahan mereka pun tak terhindarkan.\r\n\r\nNamun, dari sudut pandang Dilan, kita bisa melihat bahwa meskipun ia terlihat tenang dan sering bercanda, ada banyak perasaan dan emosi mendalam yang ia simpan. Buku ini menampilkan Dilan sebagai sosok yang lebih reflektif dan introspektif, memberikan perspektif baru mengenai apa yang sebenarnya terjadi dalam hubungan mereka.\r\n\r\nDengan gaya bahasa yang santai namun emosional, novel ini memberikan penutup yang mendalam untuk kisah cinta Dilan dan Milea, sekaligus menekankan betapa pentingnya memahami perasaan dari kedua sisi dalam sebuah hubungan.', 2016, 1, 100, 100, '20240927085311.jpg'),
(8, 'Ancika: Dia Yang Bersamaku Tahun 1995', 'Pidi Baiq', 'DAR! Mizan', 'Setelah hubungannya dengan Milea berakhir, Dilan perlahan mulai menata kembali kehidupannya. Pada tahun 1995, Dilan bertemu dengan Ancika, seorang gadis yang memiliki karakter kuat, cerdas, dan penuh semangat. Kehadiran Ancika membawa warna baru dalam hidup Dilan yang sebelumnya dihantui oleh kenangan tentang Milea.\r\n\r\nAncika menjadi teman yang mengerti dan mendukung Dilan, dan lambat laun hubungan mereka berkembang menjadi lebih dari sekadar teman. Meski Dilan masih memendam rasa terhadap Milea, ia mulai membuka hatinya untuk Ancika, yang mampu membuatnya merasa nyaman dan bahagia. Ancika memiliki perbedaan yang jelas dari Milea, terutama dalam hal bagaimana ia menghadapi Dilan dan dunia di sekitarnya.\r\n\r\nDalam novel ini, pembaca akan melihat sisi baru dari Dilan yang mencoba untuk move on dari cinta masa lalunya dan memulai lembaran baru dengan Ancika. Hubungan mereka tidak selalu mulus, namun karakter Ancika yang tegas dan penuh pengertian membuat Dilan merasa didukung dan diterima.\r\n\r\nKisah ini mengeksplorasi bagaimana Dilan menjalani kehidupan setelah masa SMA dan bagaimana ia belajar dari hubungan masa lalunya dengan Milea untuk tumbuh sebagai individu. Walaupun Ancika bukan Milea, dia tetap menjadi sosok yang berarti dan berharga bagi Dilan di masa itu.\r\n\r\nDengan gaya penceritaan Pidi Baiq yang khas—sederhana, hangat, dan penuh humor—novel ini menggambarkan perjalanan emosional Dilan dalam mencari cinta baru dan menemukan dirinya sendiri setelah pengalaman cinta yang rumit dengan Milea.', 2021, 1, 100, 100, '20240927085550.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `denda`
--

CREATE TABLE `denda` (
  `id_denda` int NOT NULL,
  `total_denda` int NOT NULL,
  `sudah_dibayar` int NOT NULL,
  `status_denda` enum('Lunas','Belum Lunas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `denda`
--

INSERT INTO `denda` (`id_denda`, `total_denda`, `sudah_dibayar`, `status_denda`) VALUES
(1, 1000, 1000, 'Lunas'),
(2, 1000, 1000, 'Lunas'),
(3, 1000, 0, 'Belum Lunas');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int NOT NULL,
  `kode_peminjaman` varchar(20) NOT NULL,
  `id_buku` int NOT NULL,
  `id_user` int NOT NULL,
  `tanggal_pengembalian_real` date DEFAULT NULL,
  `status` enum('Proses','Dipinjam','Dikembalikan','Ditolak','Terlambat') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_denda` int NOT NULL,
  `id_ulasan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `kode_peminjaman`, `id_buku`, `id_user`, `tanggal_pengembalian_real`, `status`, `id_denda`, `id_ulasan`) VALUES
(1, '2409221', 3, 3, '2024-09-22', 'Dikembalikan', 0, 1),
(2, '2409221', 1, 3, '2024-09-22', 'Dikembalikan', 0, 2),
(3, '2409222', 3, 3, '2024-09-22', 'Terlambat', 1, 3),
(4, '2409222', 1, 3, '2024-09-22', 'Terlambat', 2, 4),
(5, '2409273', 4, 3, '2024-09-27', 'Dikembalikan', 0, 5),
(6, '2409273', 3, 3, '2024-09-27', 'Dikembalikan', 0, 6),
(7, '2410021', 3, 3, '2024-10-02', 'Terlambat', 3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Novel'),
(3, 'Anime');

-- --------------------------------------------------------

--
-- Table structure for table `kategoribuku_relasi`
--

CREATE TABLE `kategoribuku_relasi` (
  `id_kategoribuku` int NOT NULL,
  `id_buku` int NOT NULL,
  `id_kategori` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `koleksi`
--

CREATE TABLE `koleksi` (
  `id_koleksi` int NOT NULL,
  `id_user` int NOT NULL,
  `id_buku` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `koleksi`
--

INSERT INTO `koleksi` (`id_koleksi`, `id_user`, `id_buku`) VALUES
(6, 1, 4),
(7, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `konfig`
--

CREATE TABLE `konfig` (
  `id_konfig` int NOT NULL,
  `nama_cv` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `alamat` text NOT NULL,
  `no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `konfig`
--

INSERT INTO `konfig` (`id_konfig`, `nama_cv`, `email`, `alamat`, `no`) VALUES
(1, 'Perpus', 'perpus@gmail.com', 's', '081235540603');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int NOT NULL,
  `kode_peminjaman` varchar(20) NOT NULL,
  `tanggal_peminjaman` date NOT NULL,
  `tanggal_pengembalian` date NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode_peminjaman`, `tanggal_peminjaman`, `tanggal_pengembalian`, `id_user`) VALUES
(1, '2409221', '2024-09-22', '2024-09-22', 3),
(2, '2409222', '2024-09-22', '2024-09-21', 3),
(3, '2409273', '2024-09-27', '2024-10-01', 3),
(4, '2410021', '2024-10-01', '2024-10-01', 3);

-- --------------------------------------------------------

--
-- Table structure for table `temp`
--

CREATE TABLE `temp` (
  `id_temp` int NOT NULL,
  `id_buku` int NOT NULL,
  `id_user` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `id_ulasan` int NOT NULL,
  `id_user` int NOT NULL,
  `id_buku` int NOT NULL,
  `rating` int NOT NULL,
  `ulasan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ulasan`
--

INSERT INTO `ulasan` (`id_ulasan`, `id_user`, `id_buku`, `rating`, `ulasan`) VALUES
(1, 1, 3, 4, 'fsdf'),
(2, 1, 1, 4, 'sadas'),
(3, 1, 3, 3, ''),
(4, 1, 1, 5, ''),
(5, 1, 4, 3, 'GGG'),
(6, 1, 3, 0, ''),
(7, 1, 3, 2, 'Bagus\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `role` enum('Admin','Petugas','Peminjam') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `nama`, `alamat`, `role`) VALUES
(1, 'admin', 'd74600e380dbf727f67113fd71669d88', 'Bagas@gmail.com', 'Bagas', 'Jungke', 'Admin'),
(2, 'petugas', 'd74600e380dbf727f67113fd71669d88', 'nadiv@gmail.com', 'Nadiv', 'Jaten', 'Petugas'),
(3, 'peminjam', 'd74600e380dbf727f67113fd71669d88', 'ardy@gmail.com', 'Ardy', 'Jetis', 'Peminjam'),
(14, 'deco', 'd74600e380dbf727f67113fd71669d88', 'deco@gmail.com', 'dencau', 'amsklma', 'Peminjam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  ADD PRIMARY KEY (`id_kategoribuku`);

--
-- Indexes for table `koleksi`
--
ALTER TABLE `koleksi`
  ADD PRIMARY KEY (`id_koleksi`);

--
-- Indexes for table `konfig`
--
ALTER TABLE `konfig`
  ADD PRIMARY KEY (`id_konfig`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `temp`
--
ALTER TABLE `temp`
  ADD PRIMARY KEY (`id_temp`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`id_ulasan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategoribuku_relasi`
--
ALTER TABLE `kategoribuku_relasi`
  MODIFY `id_kategoribuku` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `koleksi`
--
ALTER TABLE `koleksi`
  MODIFY `id_koleksi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `konfig`
--
ALTER TABLE `konfig`
  MODIFY `id_konfig` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `temp`
--
ALTER TABLE `temp`
  MODIFY `id_temp` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `id_ulasan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
