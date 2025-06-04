USE portofolio_db;

CREATE TABLE artikel (
  id INT AUTO_INCREMENT PRIMARY KEY,
  judul VARCHAR(255) NOT NULL,
  deskripsi TEXT NOT NULL,
  link VARCHAR(255) NOT NULL
);

INSERT INTO artikel (judul, deskripsi, link) VALUES
('Universitas Sam Ratulangi', 'Sebuah kisah lengkap tentang sejarah, visi, dan perkembangan universitas negeri di Sulawesi Utara.', 'artikel-unsrat.html'),
('Teknik Informatika dan Masa Depan', 'Bagaimana jurusan ini jadi kekuatan utama di balik dunia teknologi dan digital saat ini.', 'artikel-informatika.html'),
('Memahami MBTI: Tipe Kepribadianmu Apa?', 'Kenali potensi dan gaya berpikirmu lewat 16 tipe kepribadian paling populer di dunia!', 'artikel-mbti.html');