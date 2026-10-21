CREATE DATABASE leksikon;
USE leksikon;

CREATE TABLE katalog (
  id_katalog INT AUTO_INCREMENT PRIMARY KEY,
  nama_katalog VARCHAR(100) NOT NULL
);

CREATE TABLE leksikon (
  id_leksikon INT AUTO_INCREMENT PRIMARY KEY,
  id_katalog INT,
  kata VARCHAR(100) NOT NULL,
  arti TEXT NOT NULL,
  sumber VARCHAR(100),
  FOREIGN KEY (id_katalog) REFERENCES katalog(id_katalog)
);

CREATE TABLE bookmark (
  id_bookmark INT AUTO_INCREMENT PRIMARY KEY,
  id_leksikon INT NOT NULL,
  tanggal_ditambahkan DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (id_leksikon) REFERENCES leksikon(id_leksikon)
);

INSERT INTO katalog (nama_katalog)
VALUES 
('Bahasa dan Budaya'),
('Kisah dan Kronikal'),
('Agama dan Kepercayaan');

INSERT INTO leksikon (id_katalog, kata, arti, sumber)
VALUES
(1, 'abdi', 'pelayan, pengikut.', 'Bausastra Jawa, 1939'),
(1, 'ajrih', 'rasa takut atau khawatir terhadap sesuatu.', 'Bausastra Jawa, 1939'),
(1, 'andhap asor', 'rendah hati, tidak sombong.', 'Bausastra Jawa, 1939'),
(1, 'asih', 'kasih sayang, cinta, welas asih.', 'Bausastra Jawa, 1939'),
(1, 'eling', 'ingat, sadar akan sesuatu.', 'Bausastra Jawa, 1939'),
(1, 'ngajeni', 'menghormati, menghargai.', 'Bausastra Jawa, 1939'),
(1, 'becik', 'baik, bagus.', 'Bausastra Jawa, 1939'),
(1, 'gawe', 'membuat, bekerja.', 'Bausastra Jawa, 1939'),
(1, 'urip', 'hidup.', 'Bausastra Jawa, 1939'),
(1, 'roso', 'perasaan batin, intuisi.', 'Bausastra Jawa, 1939');

INSERT INTO leksikon (id_katalog, kata, arti, sumber)
VALUES
(2, 'prabu', 'raja, pemimpin kerajaan.', 'Bausastra Jawa, 1939'),
(2, 'prajurit', 'tentara, ksatria yang bertugas menjaga kerajaan.', 'Bausastra Jawa, 1939'),
(2, 'kraton', 'istana, tempat tinggal raja dan pusat pemerintahan.', 'Bausastra Jawa, 1939'),
(2, 'patih', 'penasihat utama raja atau kepala pemerintahan.', 'Bausastra Jawa, 1939'),
(2, 'tumenggung', 'jabatan tinggi di pemerintahan kerajaan.', 'Bausastra Jawa, 1939');

INSERT INTO leksikon (id_katalog, kata, arti, sumber)
VALUES
(3, 'suwarga', 'surga, tempat bahagia abadi setelah kematian.', 'Bausastra Jawa, 1939'),
(3, 'neraka', 'tempat penderitaan bagi jiwa yang berdosa.', 'Bausastra Jawa, 1939'),
(3, 'sembahyang', 'berdoa atau beribadah kepada Tuhan.', 'Bausastra Jawa, 1939'),
(3, 'slamet', 'selamat, dalam keadaan baik dan aman.', 'Bausastra Jawa, 1939'),
(3, 'roso', 'rasa batin, perasaan spiritual yang dalam.', 'Bausastra Jawa, 1939');