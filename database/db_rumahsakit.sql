-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Jan 2021 pada 09.28
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_rumahsakit`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(50) NOT NULL,
  `spesialis` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telp`) VALUES
('4d2ae3bd-30d7-4bb3-818e-1b36e6d7ce7d', 'Dr. Hilman', 'Penyakit Dalam', 'Leuwigajah', '081342887548'),
('5213e649-eb33-4057-bf26-12266d426311', 'Dr. Suci', 'THT', 'Bandung', '087876742290'),
('cff9c12f-f393-4ae5-8cf9-7dc94b6a07d3', 'Dr. Edi', 'Umum', 'Cimahi', '081834777409'),
('d8165eb0-e044-435f-aedc-6e9eea098b0d', 'Dr. Sujono', 'Spesialis Jantung', 'Cimahi', '089644336644'),
('d97698e4-4bf6-426d-945f-d33a8a4f87d1', 'Dr. Sinta', 'Gigi', 'Depok', '087788231749');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(100) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('00ec01b6-70c2-46b2-ac1a-4c37646eb0d0', 'Hufadine', 'Magh, Tukak lambung'),
('1b309abb-1e24-496e-ae19-abe0b21a766c', 'Caplang', 'Minya Kayu Putih'),
('3960c1f1-de9f-46ff-9ed2-01c493b5dcf1', 'Atorvastatin', 'Obat penurun lemak  LDL dan trigliserida'),
('48f33016-54ae-4ecd-aff7-70f7e83d6889', 'Calortusin', 'Paracetamol'),
('569595be-b8fa-45d3-970a-a859cdd44cd2', 'Bimaflox', 'Diare, Demam, Pencernaan'),
('5dfb408c-2b95-457d-9643-f1a41137299a', 'Betadine', 'Obat Luka'),
('60c3aaf5-df9c-4f6f-922e-69b757b933f6', 'Thrombophob', 'Obat Memar'),
('a8d5de80-6f42-45c8-9c1c-373b8d80f039', 'Panadol', 'Obat Sakit Kepala'),
('ac504820-df51-4f60-9700-f1a8c48dae19', 'Paracetamol', 'Obat Panas'),
('aecb7d0b-303b-4b3f-b144-0bb6a908083c', 'Bodrex', 'Obat sakit Kepala'),
('c15d7716-88cc-4de4-b432-035a48cc6d6e', 'Cap Tawon', 'Minyak Gosok'),
('f1c613a1-8aaf-49b8-9f51-cf04203d8497', 'Entrostop', 'Obat diare');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `no_identitas` varchar(30) NOT NULL,
  `nama_pasien` varchar(50) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `no_identitas`, `nama_pasien`, `gender`, `alamat`, `no_telp`) VALUES
('183af5a4-0535-4c6e-8059-a72891868f71', '8937488921', 'Indah', 'P', 'Cimahi Selatan', '085834772910'),
('2debce23-68b7-4e47-86a1-777d63e4e2cf', '12742389892', 'Shinta', 'P', 'Margahayu', '08132389249'),
('4ad79800-da61-49c4-a275-ed876d3b8360', '2684929384', 'Rendi', 'L', 'Leuwigajah', '089648389214'),
('603d0e4e-3af6-429c-84ce-40442514b249', '32678432945', 'Kurniawan', 'L', 'Cijerah', '087836486272'),
('8d455ad2-6e1c-4331-90fc-473dff0e57bd', '43573524902', 'Hilmi', 'L', 'Kuningan', '081374834633');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poli`
--

CREATE TABLE `tb_poli` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_poli`
--

INSERT INTO `tb_poli` (`id_poli`, `nama_poli`, `gedung`) VALUES
('0153f314-0fb9-4e03-9e6e-c4605e136516', 'Poli Gigi', 'Gd. A lt.3'),
('0cb561bc-df18-479c-9afa-f1594c36f45a', 'Radiologi', 'Gd. Semangka Lt.3'),
('12813416-96ff-417f-8d64-be08c69cf381', 'Poli Anak', 'Gd. Nanas Lt.2'),
('5ad9a40d-ca34-4489-89eb-07b7f59a70b5', 'Poli Saraf', 'Gd. N Lt.6'),
('fc71f9c6-d34d-4633-bdb2-17c9be9a3c20', 'Poli Umum', 'Gd. A Lt.2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rm`
--

CREATE TABLE `tb_rm` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rm`
--

INSERT INTO `tb_rm` (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `id_poli`, `tgl_periksa`) VALUES
('07283a0b-9996-4a23-a060-fd36c6401bc7', '4ad79800-da61-49c4-a275-ed876d3b8360', 'Sakit Tenggorokan, Demam', 'd8165eb0-e044-435f-aedc-6e9eea098b0d', 'Radang Tenggorokan', 'fc71f9c6-d34d-4633-bdb2-17c9be9a3c20', '2021-01-19'),
('dfd179c7-1547-4533-8dd6-cf615e2be0db', '603d0e4e-3af6-429c-84ce-40442514b249', 'Kesemutan di bagian tangan dan kaki', '4d2ae3bd-30d7-4bb3-818e-1b36e6d7ce7d', 'Kolesterol', 'fc71f9c6-d34d-4633-bdb2-17c9be9a3c20', '2021-01-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rm_obat`
--

CREATE TABLE `tb_rm_obat` (
  `id` int(11) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rm_obat`
--

INSERT INTO `tb_rm_obat` (`id`, `id_rm`, `id_obat`) VALUES
(7, 'dfd179c7-1547-4533-8dd6-cf615e2be0db', '3960c1f1-de9f-46ff-9ed2-01c493b5dcf1'),
(8, '07283a0b-9996-4a23-a060-fd36c6401bc7', '569595be-b8fa-45d3-970a-a859cdd44cd2'),
(9, '07283a0b-9996-4a23-a060-fd36c6401bc7', '48f33016-54ae-4ecd-aff7-70f7e83d6889'),
(10, '07283a0b-9996-4a23-a060-fd36c6401bc7', 'ac504820-df51-4f60-9700-f1a8c48dae19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` varchar(50) NOT NULL,
  `name` varchar(80) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_users`
--

INSERT INTO `tb_users` (`id_user`, `name`, `username`, `password`) VALUES
('45e8c5fc-4919-11eb-b456-40b07609c70b', 'Isni Dwitiniardi', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indeks untuk tabel `tb_rm`
--
ALTER TABLE `tb_rm`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indeks untuk tabel `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indeks untuk tabel `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_rm`
--
ALTER TABLE `tb_rm`
  ADD CONSTRAINT `tb_rm_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rm_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  ADD CONSTRAINT `tb_rm_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `tb_poli` (`id_poli`);

--
-- Ketidakleluasaan untuk tabel `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD CONSTRAINT `tb_rm_obat_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rm` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rm_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
