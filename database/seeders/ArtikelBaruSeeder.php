<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArtikelBaruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil ID penulis pertama yang ada di database
        $penulisId = DB::table('penulis')->first()->id ?? 7;

        // Ambil ID kategori baru berdasarkan nama kategori
        $kesehatanId = DB::table('kategori_artikel')->where('nama_kategori', 'kesehatan')->value('id');
        $hiburanId = DB::table('kategori_artikel')->where('nama_kategori', 'hiburan')->value('id');
        $kulinerId = DB::table('kategori_artikel')->where('nama_kategori', 'kuliner')->value('id');
        $edukasiId = DB::table('kategori_artikel')->where('nama_kategori', 'edukasi')->value('id');

        // Jika ada kategori yang belum terbuat, hentikan seeder
        if (!$kesehatanId || !$hiburanId || !$kulinerId || !$edukasiId) {
            $this->command->error('Beberapa kategori baru belum ditemukan di database. Pastikan KategoriArtikelSeeder sudah dijalankan.');
            return;
        }

        $newArticles = [
            // Kategori Kesehatan
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kesehatanId,
                'judul' => 'Pentingnya Menjaga Pola Tidur Teratur untuk Kesehatan Tubuh',
                'isi' => "Pola tidur yang teratur merupakan salah satu fondasi utama bagi kesehatan fisik dan mental yang optimal. Di tengah tuntutan aktivitas modern yang serba cepat, waktu tidur sering kali menjadi hal pertama yang dikorbankan. Padahal, saat kita tertidur, tubuh melakukan berbagai proses pemulihan penting mulai dari regenerasi sel hingga penyusunan kembali memori otak.\n\nKurang tidur yang terjadi secara terus-menerus dapat berdampak buruk pada sistem kekebalan tubuh kita. Ketika tubuh tidak mendapatkan istirahat yang cukup, produksi sitokin—yaitu protein yang membantu melawan infeksi dan peradangan—akan menurun secara drastis. Akibatnya, kita menjadi lebih rentan terhadap berbagai penyakit infeksi ringan seperti flu hingga penyakit kronis lainnya.\n\nSelain kesehatan fisik, kesehatan mental juga sangat dipengaruhi oleh kualitas dan kuantitas tidur kita. Gangguan tidur yang berkepanjangan sering kali dikaitkan dengan peningkatan risiko kecemasan dan depresi klinis. Tidur yang cukup membantu menstabilkan emosi dan menjaga fokus kognitif, sehingga kita dapat membuat keputusan dengan lebih baik sepanjang hari.\n\nUntuk memulai pola tidur yang sehat, cobalah untuk menetapkan jadwal tidur dan bangun yang konsisten setiap harinya, bahkan pada akhir pekan. Hindari penggunaan perangkat elektronik setidaknya satu jam sebelum tidur karena paparan cahaya biru dapat menghambat produksi hormon melatonin yang memicu rasa kantuk. Investasi waktu untuk tidur yang berkualitas adalah langkah awal menuju kehidupan yang lebih produktif dan bahagia.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:20',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kesehatanId,
                'judul' => 'Manfaat Konsumsi Air Putih secara Cukup Setiap Hari',
                'isi' => "Air merupakan komponen terbesar dalam tubuh manusia, mencakup sekitar enam puluh persen dari total berat badan kita. Oleh karena itu, menjaga kecukupan cairan tubuh dengan mengonsumsi air putih yang cukup setiap hari sangat krusial bagi kelangsungan fungsi organ-organ vital. Kehilangan cairan melalui keringat dan aktivitas harian harus segera digantikan agar tubuh terhindar dari kondisi dehidrasi.\n\nSalah satu manfaat utama dari konsumsi air putih yang cukup adalah mendukung kelancaran sistem pencernaan. Air membantu memecah makanan yang kita konsumsi agar nutrisinya dapat diserap secara optimal oleh dinding usus. Selain itu, kecukupan air dalam tubuh juga mencegah timbulnya masalah konstipasi atau sembelit dengan cara melunakkan konsistensi feses.\n\nBagi organ ginjal, air putih bertindak sebagai bahan pelarut alami yang sangat penting untuk menyaring racun dari dalam darah. Air membantu memperlancar pembuangan zat-zat sisa metabolisme melalui urine, sehingga meminimalkan terbentuknya endapan kristal yang berisiko menjadi batu ginjal. Dengan minum cukup air, kita secara aktif membantu meringankan beban kerja organ ginjal kita.\n\nKebutuhan air harian setiap orang dapat berbeda-beda tergantung pada berat badan, tingkat aktivitas fisik, serta kondisi cuaca lingkungan sekitar. Namun, sebagai standar umum, mengonsumsi sekitar delapan gelas atau dua liter air putih per hari sangat dianjurkan untuk orang dewasa. Biasakan membawa botol minum saat beraktivitas untuk memudahkan Anda memantau kecukupan asupan cairan harian.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:22',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kesehatanId,
                'judul' => 'Panduan Memulai Diet Sehat dan Seimbang Bagi Pemula',
                'isi' => "Memulai diet sehat sering kali disalahartikan sebagai upaya ekstrem untuk membatasi makan atau kelaparan demi menurunkan berat badan dengan cepat. Pemahaman yang keliru ini justru dapat membahayakan kesehatan tubuh karena kurangnya asupan nutrisi penting. Diet yang sebenarnya adalah mengatur pola makan yang seimbang untuk memenuhi kebutuhan gizi harian secara konsisten.\n\nLangkah pertama yang paling penting bagi pemula adalah memahami pembagian makronutrisi yang dibutuhkan oleh tubuh kita. Piring makan ideal harus terdiri dari karbohidrat kompleks sebagai sumber energi utama, protein sebagai pembangun otot, serta lemak sehat untuk mendukung fungsi sel. Menyeimbangkan porsi makanan ini secara proporsional jauh lebih baik daripada mengeliminasi satu jenis nutrisi secara total.\n\nSelain makronutrisi, asupan mikronutrisi seperti vitamin dan mineral dari sayur-sayuran dan buah-buahan segar juga tidak boleh dilewatkan. Serat alami yang terkandung di dalamnya sangat baik untuk menjaga kesehatan pencernaan serta memberikan rasa kenyang yang lebih lama. Mencoba mengonsumsi berbagai warna sayuran yang berbeda membantu memastikan tubuh mendapatkan ragam nutrisi yang lengkap.\n\nKunci keberhasilan diet sehat terletak pada konsistensi dan keberlanjutan program dalam jangka panjang, bukan sekadar hasil instan dalam beberapa minggu. Hindari produk-produk pelangsing instan yang menjanjikan hasil cepat tanpa mengubah pola makan dasar. Mulailah secara perlahan dengan mengurangi konsumsi gula berlebih dan makanan olahan, serta mulailah memasak makanan sendiri di rumah.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:25',
            ],

            // Kategori Hiburan
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $hiburanId,
                'judul' => 'Perkembangan Industri Film Lokal yang Kian Mendunia',
                'isi' => "Industri perfilman tanah air tengah mengalami masa keemasan dengan lahirnya berbagai karya berkualitas tinggi yang mendapat apresiasi internasional. Film-film lokal kini tidak hanya merajai bioskop dalam negeri, tetapi juga sukses menembus festival film bergengsi di tingkat dunia. Pencapaian ini membuktikan bahwa kualitas penyutradaraan, akting, dan sinematografi sineas kita tidak kalah saing.\n\nSalah satu faktor pendukung kemajuan ini adalah keberanian para pembuat film untuk mengeksplorasi genre dan narasi yang lebih beragam. Dari drama sosial yang mendalam, film laga dengan koreografi memukau, hingga film horor psikologis yang menegangkan, semuanya diproduksi dengan standar estetika yang tinggi. Hal ini berhasil menarik minat penonton global yang mencari cerita unik dengan perspektif lokal.\n\nDukungan teknologi modern dalam proses produksi dan distribusi digital juga memainkan peran penting dalam memperluas jangkauan penonton. Kehadiran berbagai platform streaming global memudahkan film lokal untuk diakses oleh penonton dari belahan dunia lain secara legal dan cepat. Keadaan ini membuka peluang investasi yang lebih besar bagi perkembangan industri kreatif tanah air.\n\nKendati demikian, tantangan seperti pengembangan sumber daya manusia dan perlindungan hak kekayaan intelektual masih perlu mendapat perhatian serius. Diperlukan kolaborasi yang sinergis antara pemerintah, asosiasi perfilman, dan masyarakat luas untuk terus mendorong ekosistem industri yang sehat. Dengan dukungan yang konsisten, masa depan film lokal di kancah internasional dipastikan akan semakin bersinar.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:30',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $hiburanId,
                'judul' => 'Pengaruh Musik Terhadap Produktivitas dan Fokus Kerja',
                'isi' => "Mendengarkan musik saat bekerja atau belajar telah menjadi kebiasaan yang sangat umum bagi banyak orang di era modern ini. Banyak orang merasa bahwa kehadiran alunan nada di latar belakang dapat membantu mengusir rasa jenuh dan meningkatkan konsentrasi. Namun, pengaruh musik terhadap kinerja otak sebenarnya sangat bergantung pada jenis musik dan tugas yang sedang dikerjakan.\n\nSecara ilmiah, mendengarkan musik favorit dapat memicu pelepasan dopamin di otak, yang berfungsi meningkatkan suasana hati atau mood kerja. Mood yang baik secara langsung berdampak pada peningkatan motivasi dan penurunan tingkat stres saat menghadapi tenggat waktu yang ketat. Musik instrumental atau dengan tempo yang stabil sering kali direkomendasikan untuk menemani pekerjaan kognitif yang rumit.\n\nSebaliknya, musik dengan lirik yang dominan atau beat yang terlalu cepat kadang kala justru dapat mengalihkan fokus perhatian kita. Pikiran manusia cenderung secara tidak sadar mencoba memproses kata-kata dari lirik lagu tersebut, yang dapat memecah konsentrasi saat kita membaca atau menulis dokumen. Oleh sebab itu, penting bagi setiap individu untuk memilih playlist yang tepat sesuai kebutuhan.\n\nPada akhirnya, efektivitas musik sebagai alat bantu produktivitas bersifat sangat personal dan subjektif bagi masing-masing orang. Sebagian orang membutuhkan keheningan total untuk berpikir jernih, sementara sebagian lainnya justru membutuhkan stimulasi audio untuk tetap terjaga. Bereksperimen dengan berbagai genre musik seperti lo-fi, klasik, atau ambient dapat membantu Anda menemukan formula fokus terbaik.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:32',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $hiburanId,
                'judul' => 'Mengenal Tren Virtual Reality (VR) di Industri Game Modern',
                'isi' => "Teknologi Virtual Reality atau VR telah membawa perubahan revolusioner dalam cara kita menikmati permainan video game di era digital. VR menawarkan tingkat imersi yang luar biasa dengan membawa pemain langsung masuk dan berinteraksi di dalam dunia virtual secara tiga dimensi. Pengalaman bermain yang interaktif ini tidak dapat disamai oleh layar monitor konvensional biasa.\n\nPerkembangan perangkat keras VR yang kian terjangkau dan nyaman digunakan menjadi salah satu motor penggerak utama tren ini di pasaran. Perusahaan teknologi terus berinnovasi mengurangi bobot kacamata headset VR serta meningkatkan resolusi layar untuk mencegah efek pusing pada pengguna. Teknologi pelacakan gerakan tangan dan mata juga semakin presisi guna menghadirkan simulasi yang realistis.\n\nDari sisi konten, para pengembang game kini mulai serius memproduksi game skala besar khusus untuk platform VR dengan cerita yang kompleks. Game VR tidak lagi hanya menyajikan demo teknis yang singkat, melainkan sudah menjadi media bercerita yang mendalam dan menantang secara taktis. Kolaborasi antara aspek visual yang memukau dan audio spasial menciptakan realitas baru yang sangat adiktif.\n\nMeskipun memiliki potensi masa depan yang sangat cerah, industri game VR masih harus menghadapi tantangan adopsi massal karena spesifikasi PC yang dibutuhkan cukup tinggi. Namun, seiring berjalannya waktu dan penurunan biaya produksi teknologi, hambatan ini diperkirakan akan segera teratasi. Masa depan hiburan interaktif akan semakin berpusat pada teknologi imersif yang mengaburkan batas antara dunia nyata dan digital.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:35',
            ],

            // Kategori Kuliner
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kulinerId,
                'judul' => 'Menjelajahi Cita Rasa Kuliner Tradisional Nusantara yang Khas',
                'isi' => "Indonesia sangat terkenal dengan kekayaan kuliner tradisionalnya yang memiliki cita rasa kuat dan khas di setiap daerah. Kekayaan rempah-rempah alami yang melimpah menjadi kunci utama kelezatan masakan Nusantara yang diwariskan secara turun-temurun. Setiap hidangan mencerminkan keunikan budaya dan sejarah masyarakat lokal yang membuatnya sangat berharga.\n\nDari ujung barat hingga timur, kita dapat menemukan variasi hidangan dengan karakteristik rasa yang sangat beragam dan menakjubkan. Kuliner Sumatra terkenal dengan kuah santan kental dan bumbu pedas yang kaya, sementara Jawa cenderung menyukai rasa manis dan gurih yang lembut. Keberagaman cita rasa ini menjadikan petualangan kuliner di Indonesia tidak pernah membosankan bagi siapa saja.\n\nSalah satu contoh ikonik kuliner Indonesia yang telah diakui dunia adalah Rendang dari Minangkabau, Sumatra Barat. Proses memasaknya yang memakan waktu berjam-jam menggunakan santan dan aneka rempah menghasilkan daging yang empuk dan bumbu yang meresap sempurna. Kelezatan hidangan ini membuktikan keahlian memasak tingkat tinggi yang dimiliki oleh nenek moyang kita sejak dahulu kala.\n\nMenjaga kelestarian resep masakan tradisional di tengah gempuran kuliner modern dan makanan cepat saji asing adalah tanggung jawab kita bersama. Edukasi kepada generasi muda mengenai pentingnya menghargai warisan kuliner lokal perlu terus digalakkan secara kreatif. Dengan demikian, cita rasa khas Nusantara akan tetap lestari dan dapat dinikmati oleh generasi mendatang.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:40',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kulinerId,
                'judul' => 'Tips Sukses Memulai Bisnis Kuliner Rumahan untuk Pemula',
                'isi' => "Memulai bisnis kuliner rumahan kini menjadi salah satu pilihan wirausaha yang paling diminati oleh banyak orang di era digital. Modalnya yang relatif fleksibel dan pasar yang selalu ada menjadikan bisnis ini sangat menarik untuk dicoba oleh siapa saja. Namun, bersaing di industri makanan memerlukan persiapan yang matang agar usaha Anda dapat bertahan dan berkembang.\n\nHal pertama yang harus Anda tentukan secara spesifik adalah menu andalan yang memiliki keunikan dibanding kompetitor di pasaran. Jangan mencoba menjual semua jenis makanan sekaligus, fokuslah pada satu atau dua menu yang benar-benar Anda kuasai dengan rasa yang konsisten. Keunikan rasa dan kualitas bahan baku akan menjadi identitas utama merek kuliner rumahan Anda.\n\nSelain rasa, aspek kebersihan dalam proses pengolahan dan kemasan produk juga memegang peranan krusial dalam membangun kepercayaan pelanggan. Kemasan yang rapi, menarik, dan aman untuk pengiriman jarak jauh akan memberikan nilai tambah di mata konsumen. Manfaatkan juga platform media sosial secara maksimal untuk mempromosikan produk Anda melalui foto yang estetik.\n\nManajemen keuangan yang disiplin merupakan pilar penting lainnya yang sering diabaikan oleh para pebisnis kuliner pemula. Pisahkan dengan jelas uang pribadi dan uang operasional bisnis untuk mempermudah evaluasi laba rugi setiap bulannya. Mulailah dalam skala kecil terlebih dahulu, lalu tingkatkan kapasitas produksi seiring dengan pertumbuhan basis pelanggan yang loyal.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:42',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kulinerId,
                'judul' => 'Perbedaan Cokelat Hitam dan Cokelat Susu bagi Kesehatan',
                'isi' => "Cokelat merupakan salah satu camilan manis yang paling digemari oleh semua kalangan di seluruh belahan dunia. Di pasaran, kita umumnya mengenal dua jenis cokelat yang paling populer, yaitu cokelat hitam (dark chocolate) dan cokelat susu (milk chocolate). Meskipun sekilas terlihat mirip, keduanya memiliki perbedaan mendasar dari segi kandungan dan dampak bagi kesehatan.\n\nCokelat hitam memiliki persentase kandungan kakao padat yang jauh lebih tinggi, biasanya berkisar antara 70 hingga 90 persen. Tingginya kandungan kakao ini membuat cokelat hitam kaya akan senyawa antioksidan penting yang disebut flavonoid. Flavonoid terbukti sangat baik dalam menjaga kesehatan jantung dengan cara melancarkan aliran darah dan menurunkan tekanan darah.\n\nSementara itu, cokelat susu mengandung persentase kakao yang lebih rendah karena telah dicampur dengan susu padat dan gula dalam jumlah banyak. Penambahan bahan-bahan ini memberikan tekstur yang lebih lembut dan rasa manis yang dominan di lidah. Namun, tingginya kandungan gula dan lemak jenuh di dalamnya membuat cokelat susu kurang dianjurkan dikonsumsi dalam porsi besar.\n\nMeskipun cokelat hitam terbukti memiliki manfaat kesehatan yang lebih besar, konsumsinya tetap harus dibatasi agar tidak berlebihan. Pilihlah cokelat hitam dengan kandungan gula minimal untuk mendapatkan manfaat kesehatan yang maksimal tanpa kalori berlebih. Menikmati satu atau dua kotak kecil cokelat hitam setiap hari dapat menjadi pilihan camilan sehat Anda.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:45',
            ],

            // Kategori Edukasi
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $edukasiId,
                'judul' => 'Pentingnya Pembelajaran Lifelong Learning di Era Digital',
                'isi' => "Pembelajaran sepanjang hayat atau lifelong learning telah berubah dari sekadar konsep akademis menjadi kebutuhan mutlak di era digital ini. Kecepatan perkembangan teknologi informasi menuntut setiap individu untuk terus memperbarui pengetahuan mereka agar tidak tertinggal. Gelar akademis formal kini tidak lagi menjamin relevansi keterampilan kita dalam jangka panjang.\n\nDi era modern, banyak pekerjaan konvensional yang mulai terotomatisasi oleh kecerdasan buatan, sementara profesi baru yang menuntut keahlian digital terus bermunculan. Untuk beradaptasi dengan transisi ini, kita dituntut memiliki fleksibilitas mental untuk belajar, melupakan hal lama, dan mempelajari hal baru (learn, unlearn, relearn). Proses belajar mandiri ini sangat penting untuk mempertahankan daya saing di pasar kerja.\n\nKehadiran internet memberikan kemudahan akses yang luar biasa terhadap berbagai sumber belajar berkualitas secara gratis maupun berbayar. Kita dapat mengikuti kursus online dari universitas ternama dunia, membaca jurnal ilmiah, atau mempelajari keterampilan teknis baru melalui video tutorial dari rumah. Tidak ada lagi batasan ruang dan waktu untuk menambah pengetahuan kita.\n\nMenumbuhkan kebiasaan belajar mandiri memerlukan disiplin pribadi dan rasa ingin tahu yang tinggi sepanjang waktu. Alokasikan waktu setidaknya 30 menit setiap hari untuk membaca buku atau mempelajari topik baru di luar bidang keahlian utama Anda. Menjadi pembelajar sepanjang hayat akan memperluas cakrawala berpikir kita dan membuat hidup menjadi lebih bermakna.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:50',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $edukasiId,
                'judul' => 'Cara Efektif Meningkatkan Minat Baca Buku pada Anak',
                'isi' => "Minat baca buku merupakan salah satu aset paling berharga yang harus ditanamkan sejak dini pada diri anak-anak kita. Membaca tidak hanya meningkatkan kemampuan berbahasa dan memperluas wawasan anak, tetapi juga melatih daya imajinasi serta fokus konsentrasi mereka. Namun, di tengah kepungan gawai dan media sosial visual, mengajak anak membaca buku menjadi tantangan tersendiri.\n\nSalah satu metode yang paling efektif untuk menumbuhkan kebiasaan membaca adalah melalui keteladanan dari orang tua di rumah. Anak-anak adalah peniru yang sangat ulung, sehingga mereka akan cenderung tertarik membaca jika melihat orang tuanya juga gemar membaca buku. Buatlah waktu membaca bersama keluarga secara rutin tanpa adanya gangguan dari layar televisi atau ponsel pintar.\n\nSelain keteladanan, menyediakan lingkungan rumah yang ramah literasi juga sangat membantu memicu minat baca anak. Sediakan rak buku kecil yang mudah dijangkau anak, berisi buku-buku bergambar yang menarik sesuai usia perkembangan mereka. Libatkan anak secara aktif saat memilih buku yang ingin mereka baca saat berkunjung ke toko buku atau perpustakaan.\n\nMulailah membiasakan membacakan dongeng sebelum tidur kepada anak secara konsisten sejak usia balita. Proses interaksi hangat saat mendengarkan cerita akan membangun asosiasi positif dalam diri anak bahwa membaca adalah aktivitas yang sangat menyenangkan. Dengan kesabaran dan konsistensi, kecintaan anak pada buku akan tumbuh secara alami seiring waktu.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:52',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $edukasiId,
                'judul' => 'Mengenal Konsep Dasar Sains dalam Kehidupan Sehari-hari',
                'isi' => "Sains sering kali dianggap sebagai mata pelajaran yang rumit, penuh dengan rumus matematika, dan hanya ada di dalam laboratorium sekolah. Anggapan ini membuat banyak orang merasa berjarak dengan ilmu pengetahuan alam. Padahal, konsep dasar sains bekerja secara aktif di sekitar kita dalam setiap aktivitas sederhana yang kita lakukan sehari-hari.\n\nSebagai contoh mudah, ketika kita memasak air hingga mendidih, kita sedang menyaksikan proses perubahan wujud zat akibat perpindahan energi panas atau kalor. Begitu pula saat kita melempar bola ke atas dan bola tersebut jatuh kembali ke tanah karena adanya pengaruh gaya gravitasi bumi. Memahami konsep-konsep ini membantu kita menjelaskan fenomena alam secara rasional dan logis.\n\nMelakukan eksperimen sains sederhana di rumah bersama anak-anak dapat menjadi metode belajar yang sangat menyenangkan dan edukatif. Eksperimen mencampur cuka dengan soda kue untuk membuat replika gunung berapi meletus mengajarkan konsep reaksi kimia asam-basa secara visual. Kegiatan interaktif ini sangat efektif dalam merangsang rasa ingin tahu dan kemampuan berpikir kritis sejak dini.\n\nDengan menyadari kehadiran sains di kehidupan sehari-hari, kita akan lebih menghargai pentingnya metode ilmiah dalam menyelesaikan berbagai masalah. Sains bukan sekadar hafalan teori, melainkan sebuah cara pandang logis untuk memahami bagaimana alam semesta bekerja secara harmonis. Mari kita terus belajar dan mengeksplorasi keajaiban sains di sekitar kita dengan pikiran terbuka.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 00:55',
            ],

            // Kesehatan Baru
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kesehatanId,
                'judul' => 'Pentingnya Aktivitas Fisik Ringan di Sela-Sela Waktu Kerja',
                'isi' => "Menghabiskan waktu berjam-jam duduk di depan layar komputer merupakan kebiasaan umum pekerja kantoran modern saat ini. Kurangnya pergerakan fisik ini sering kali memicu berbagai keluhan kesehatan mulai dari pegal otot hingga gangguan kardiovaskular. Tubuh manusia secara alami tidak dirancang untuk berada dalam posisi pasif untuk durasi yang sangat lama tanpa jeda.\n\nMelakukan aktivitas fisik ringan atau peregangan di sela-sela waktu kerja dapat memberikan perubahan positif yang signifikan bagi tubuh. Gerakan sederhana seperti memutar bahu, meregangkan leher, atau berjalan kaki singkat selama lima menit dapat meningkatkan aliran darah ke seluruh tubuh. Pasokan oksigen yang lancar ke otak juga membantu menjaga konsentrasi tetap tajam.\n\nSelain menjaga kesehatan otot dan sendi, peregangan teratur terbukti efektif dalam meredakan tingkat stres emosional selama bekerja. Ketika otot-otot tubuh meregang, ketegangan psikologis yang menumpuk akibat beban kerja juga ikut berkurang secara perlahan. Hal ini merangsang pelepasan hormon endorfin yang memicu perasaan rileks dan suasana hati yang lebih positif.\n\nMemulai kebiasaan sehat ini tidak memerlukan peralatan khusus atau waktu yang lama di sela kesibukan harian Anda. Anda dapat menggunakan alarm pengingat setiap dua jam sekali untuk berdiri dan melangkah di sekitar meja kerja Anda. Menjadikan pergerakan aktif sebagai bagian dari rutinitas harian adalah investasi sederhana demi kelangsungan kesehatan fisik jangka panjang.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 09:30',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kesehatanId,
                'judul' => 'Dampak Negatif Konsumsi Gula Berlebih bagi Kesehatan Jangka Panjang',
                'isi' => "Konsumsi gula yang manis memang memberikan kenikmatan instan dan dorongan energi yang cepat bagi tubuh kita. Namun, di balik rasa manisnya yang memanjakan lidah, konsumsi gula berlebih menyimpan ancaman serius bagi metabolisme organ tubuh. Kebiasaan mengonsumsi makanan dan minuman manis secara tidak terkontrol kini menjadi salah satu pemicu utama krisis kesehatan global.\n\nSalah satu dampak paling nyata dari asupan gula berlebih adalah peningkatan risiko obesitas dan diabetes melitus tipe dua. Gula yang masuk ke dalam tubuh dalam jumlah besar akan memaksa organ pankreas bekerja lebih keras memproduksi hormon insulin. Seiring berjalannya waktu, sel-sel tubuh dapat mengalami resistensi terhadap insulin, menyebabkan kadar gula darah melonjak tinggi.\n\nTidak hanya memengaruhi kadar gula darah, asupan pemanis buatan maupun gula pasir berlebih juga dapat merusak kesehatan jantung kita. Konsumsi gula berlebih memicu hati untuk memproduksi lebih banyak lemak jahat yang dapat menyumbat aliran pembuluh darah arteri. Akibatnya, tekanan darah akan meningkat dan risiko terkena penyakit stroke maupun serangan jantung menjadi lebih besar.\n\nUntuk mencegah bahaya tersebut, sangat dianjurkan untuk mulai membatasi konsumsi pemanis harian dan beralih ke sumber manis yang alami. Membaca label informasi nilai gizi pada kemasan makanan kemasan sebelum membelinya adalah langkah awal yang sangat bijaksana. Gantilah camilan manis olahan dengan buah-buahan segar yang kaya akan serat alami dan vitamin penting bagi tubuh.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 09:32',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kesehatanId,
                'judul' => 'Mengenal Manfaat Luar Biasa Meditasi untuk Kesehatan Mental',
                'isi' => "Kesehatan mental kini mendapatkan perhatian yang semakin besar seiring dengan tingginya tekanan hidup di era modern. Salah satu metode yang terbukti ilmiah untuk membantu menjaga keseimbangan emosi dan kesehatan jiwa adalah dengan meditasi. Meditasi merupakan latihan pemusatan perhatian yang bertujuan untuk menenangkan pikiran dari hiruk-pikuk kekhawatiran harian.\n\nSaat kita melakukan meditasi secara rutin, aktivitas pada area otak yang mengatur kecemasan dan rasa takut akan mengalami penurunan. Latihan pernapasan dalam meditasi merangsang sistem saraf parasimpatik untuk memperlambat detak jantung dan menurunkan kadar hormon stres kortisol. Hal ini memberikan rasa damai dan ketenangan batin yang mendalam bagi pelakunya.\n\nSelain meredakan kecemasan, meditasi juga sangat efektif dalam melatih fokus pikiran dan meningkatkan kemampuan konsentrasi kita. Dengan membiasakan pikiran untuk tetap berada pada momen saat ini, kita tidak mudah terdistraksi oleh pikiran negatif masa lalu atau kecemasan masa depan. Kemampuan kognitif ini sangat membantu dalam meningkatkan produktivitas kerja harian.\n\nMelakukan meditasi tidak memerlukan waktu berjam-jam atau tempat khusus yang sunyi senyap di tengah alam terbuka. Anda cukup meluangkan waktu sekitar sepuluh hingga lima belas menit setiap pagi dalam posisi duduk yang nyaman dan tenang. Fokuskan perhatian pada embusan napas Anda sendiri, dan rasakan manfaat ketenangan yang mengalir secara perlahan ke seluruh tubuh.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 09:35',
            ],

            // Hiburan Baru
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $hiburanId,
                'judul' => 'Kebangkitan Musik Piringan Hitam di Kalangan Generasi Muda',
                'isi' => "Di era digital di mana musik dapat diakses dengan mudah secara instan melalui platform streaming, sebuah tren unik justru sedang berkembang. Piringan hitam atau vinyl yang sempat dianggap sebagai teknologi usang masa lalu kini kembali diminati secara luas. Menariknya, peminat format fisik ini sebagian besar justru datang dari kalangan generasi muda milenial dan Gen Z.\n\nSalah satu daya tarik utama dari piringan hitam adalah kualitas suara analog yang dihasilkannya terasa lebih hangat dan autentik. Alunan nada yang dihasilkan dari gesekan jarum pemutar pada piringan memberikan tekstur suara yang tidak dapat ditiru oleh file digital terkompresi. Sensasi mendengarkan musik secara utuh ini menawarkan pengalaman audio yang lebih mendalam.\n\nSelain aspek kualitas suara, mengoleksi piringan hitam juga memberikan kepuasan tersendiri dari sisi kepemilikan fisik sebuah karya seni. Sampul album berukuran besar dengan desain grafis yang artistik sering kali dianggap sebagai barang koleksi bernilai estetika tinggi. Proses meletakkan piringan pada turntable dan menurunkan jarum pemutar menciptakan ritual mendengarkan yang intim.\n\nFenomena kebangkitan vinyl ini juga mendorong para musisi modern untuk kembali merilis karya terbaru mereka dalam format piringan hitam. Toko-toko rilisan fisik yang sempat tutup kini mulai bergeliat kembali menjadi ruang berkumpulnya para pencinta musik lintas generasi. Tren ini membuktikan bahwa penghargaan terhadap proses menikmati karya seni secara fisik tidak akan pernah sepenuhnya tergantikan.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 09:40',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $hiburanId,
                'judul' => 'Pengaruh Tren Serial Dokumenter Terhadap Kesadaran Sosial Masyarakat',
                'isi' => "Serial dokumenter kini bukan lagi tontonan alternatif yang membosankan dan hanya diminati oleh kalangan akademisi tertentu saja. Melalui berbagai platform streaming global, dokumenter dikemas secara dramatis dengan sinematografi memukau yang mampu memikat jutaan penonton. Perubahan gaya penyajian ini berhasil membawa isu-isu realitas dunia ke permukaan diskusi populer.\n\nKekuatan utama dari serial dokumenter terletak pada kemampuannya menyajikan narasi investigatif yang mendalam mengenai suatu fenomena sosial. Penonton diajak melihat sisi lain dari kasus hukum, kerusakan lingkungan, hingga intrik politik dari sudut pandang yang jarang terekspos. Kedekatan cerita dengan kenyataan hidup ini memicu rasa empati yang kuat dari pemirsa.\n\nDampak dari popularitas tontonan ini sering kali melampaui batas layar kaca dengan melahirkan gerakan sosial nyata di masyarakat. Banyak penonton yang mulai tergerak untuk menandatangani petisi, melakukan donasi, atau mengubah gaya hidup mereka setelah menonton dokumenter bertema lingkungan. Informasi visual yang disajikan terbukti mampu menggerakkan kesadaran kolektif.\n\nMeskipun demikian, penonton juga dituntut untuk tetap kritis dalam menyaring setiap sudut pandang yang dihadirkan oleh pembuat film dokumenter. Hal ini penting karena setiap karya visual tidak pernah sepenuhnya bebas dari bias editorial sang sutradara dalam menyusun alur cerita. Menonton dengan pikiran terbuka namun tetap analitis adalah cara terbaik menikmati tayangan edukatif ini.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 09:42',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $hiburanId,
                'judul' => 'Eksplorasi Seni Teater Tradisional yang Bertahan di Era Modern',
                'isi' => "Seni teater tradisional merupakan salah satu pilar kebudayaan bangsa yang kaya akan nilai moral, sejarah, dan keindahan estetika pertunjukan. Di tengah gempuran industri hiburan modern yang serba digital, keberadaan seni panggung rakyat ini menghadapi tantangan yang sangat berat. Banyak kelompok teater daerah yang harus berjuang keras mempertahankan eksistensi mereka dari kepunahan.\n\nKeunikan dari pertunjukan teater tradisional terletak pada interaksi langsung yang hangat antara para aktor di panggung dengan penonton. Dialog yang diselingi humor lokal, iringan musik tradisional, serta kostum yang sarat makna budaya menciptakan atmosfer pertunjukan yang magis. Pengalaman menonton langsung ini menyajikan kehangatan manusiawi yang tidak ada pada media digital.\n\nUntuk dapat bertahan menarik minat penonton masa kini, beberapa komunitas teater mulai melakukan kolaborasi seni yang inovatif. Mereka memadukan unsur cerita klasik dengan tata lampu modern, efek visual digital, serta isu-isu kontemporer yang relevan bagi generasi muda. Penyesuaian kreatif ini dilakukan tanpa menghilangkan esensi nilai luhur yang dikandungnya.\n\nDukungan aktif dari masyarakat luas dan pemerintah setempat sangat dibutuhkan untuk melestarikan warisan seni pertunjukan ini agar tidak hilang. Menghadiri pertunjukan teater lokal secara langsung adalah tindakan nyata yang sangat berarti untuk mendukung keberlangsungan hidup para seniman. Melestarikan seni teater tradisional berarti menjaga identitas budaya bangsa agar tetap hidup.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 09:45',
            ],

            // Kuliner Baru
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kulinerId,
                'judul' => 'Mengulik Rahasia Kelezatan Bumbu Dasar Masakan Khas Indonesia',
                'isi' => "Kekayaan cita rasa kuliner Nusantara yang sangat menggugah selera tidak dapat dipisahkan dari peran penting racikan bumbu rempah. Dalam dunia memasak tradisional Indonesia, dikenal konsep bumbu dasar yang menjadi fondasi utama pembuatan berbagai menu hidangan lezat. Penggunaan bumbu dasar ini mempermudah proses memasak sekaligus menjaga konsistensi rasa masakan yang dibuat.\n\nTerdapat tiga jenis bumbu dasar yang paling populer digunakan, yaitu bumbu dasar merah, bumbu dasar putih, dan bumbu dasar kuning. Bumbu dasar merah yang terdiri dari cabai, bawang merah, dan bawang putih sangat cocok untuk masakan bercita rasa pedas seperti balado. Sementara bumbu dasar putih memberikan rasa gurih yang cocok untuk hidangan soto atau tumisan.\n\nDi sisi lain, bumbu dasar kuning mendapatkan warna cerahnya dari kunyit yang dipadukan dengan kemiri dan bawang putih. Bumbu ini merupakan kunci utama kelezatan berbagai hidangan seperti ayam goreng, ikan bakar, hingga aneka gulai tradisional. Kehadiran kunyit tidak hanya memberikan warna kuning yang cantik tetapi juga aroma khas yang menggoda selera makan.\n\nMembuat bumbu dasar sendiri di rumah dan menyimpannya di dalam lemari es merupakan tips praktis bagi Anda yang sibuk. Bumbu yang telah ditumis matang dapat bertahan hingga beberapa minggu dan siap digunakan kapan saja Anda ingin memasak hidangan favorit. Dengan memahami formula dasar ini, petualangan Anda di dapur rumah akan menjadi jauh lebih menyenangkan dan efisien.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 09:50',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kulinerId,
                'judul' => 'Pengaruh Estetika Penyajian Makanan Terhadap Kepuasan Kuliner',
                'isi' => "Menikmati hidangan kuliner kini tidak lagi hanya sebatas memuaskan rasa lapar dan memanjakan indra pengecap di lidah kita. Di era visual saat ini, keindahan estetika penyajian makanan atau food plating memegang peran penting dalam memengaruhi persepsi rasa. Tampilan makanan yang ditata dengan apik dapat meningkatkan ekspektasi dan kepuasan bersantap secara keseluruhan.\n\nSecara psikologis, proses menikmati makanan sebenarnya sudah dimulai sejak mata kita memandang hidangan yang disajikan di atas piring. Penataan warna yang kontras, keseimbangan porsi, serta kebersihan piring makan secara tidak sadar mengirimkan sinyal positif ke otak kita. Hal ini merangsang produksi air liur dan memicu rasa lapar bahkan sebelum suapan pertama dimulai.\n\nPara juru masak profesional memanfaatkan teknik plating untuk menciptakan cerita visual yang mendukung cita rasa dari masakan tersebut. Mereka mengatur penempatan komponen utama, saus, hingga hiasan daun garnish untuk menciptakan harmoni visual yang indah. Sentuhan seni di atas piring ini mengubah aktivitas makan biasa menjadi sebuah pengalaman kultural yang mewah.\n\nAnda pun dapat mempraktikkan seni penataan makanan sederhana ini saat menyajikan hidangan harian untuk keluarga tercinta di rumah. Gunakan piring berwarna netral seperti putih agar warna alami dari sayuran dan lauk pauk Anda terlihat lebih menonjol. Meluangkan waktu sedikit untuk menghias sajian adalah bentuk apresiasi terhadap makanan dan orang-orang yang menikmatinya.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 09:52',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $kulinerId,
                'judul' => 'Tren Kuliner Berbahan Dasar Tanaman yang Kian Digemari',
                'isi' => "Tren gaya hidup sehat dan ramah lingkungan kini telah memicu lahirnya berbagai inovasi kuliner baru di kancah global. Salah satu tren yang sedang berkembang pesat dan menarik perhatian banyak kalangan adalah kuliner berbasis tanaman atau plant-based food. Makanan ini tidak lagi dianggap hambar, melainkan disajikan dengan cita rasa lezat yang menggugah selera.\n\nKuliner berbasis tanaman dirancang untuk meniru tekstur dan rasa produk hewani dengan menggunakan bahan baku nabati sepenuhnya. Penggunaan protein kedelai, jamur, serta kacang-kacangan diolah sedemikian rupa sehingga menghasilkan produk alternatif daging yang sangat mirip aslinya. Hal ini memudahkan orang yang ingin mengurangi konsumsi daging tanpa kehilangan sensasi rasanya.\n\nSelain memiliki manfaat yang sangat baik untuk kesehatan tubuh seperti menurunkan kadar kolesterol, tren ini juga berdampak baik bagi bumi. Industri makanan berbasis tanaman membutuhkan lahan dan air yang jauh lebih sedikit serta menghasilkan emisi karbon yang lebih rendah dibanding peternakan. Memilih menu nabati merupakan kontribusi kecil untuk kelestarian lingkungan.\n\nKini, restoran-restoran modern hingga gerai makanan cepat saji mulai aktif menghadirkan menu plant-based dalam daftar sajian mereka. Variasi menu yang ditawarkan pun semakin beragam mulai dari burger nabati, pasta lezat, hingga hidangan penutup yang bebas susu hewani. Menjelajahi dunia kuliner nabati menawarkan petualangan rasa baru yang menyehatkan sekaligus ramah lingkungan.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 09:55',
            ],

            // Edukasi Baru
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $edukasiId,
                'judul' => 'Pentingnya Melatih Kemampuan Berpikir Kritis Sejak Dini',
                'isi' => "Di era banjir informasi saat ini, kemampuan untuk menyaring dan menganalisis berita secara objektif menjadi keterampilan yang sangat krusial. Kemampuan berpikir kritis bukanlah bakat bawaan lahir, melainkan keterampilan mental yang harus dilatih sejak usia dini secara konsisten. Anak-anak yang terbiasa berpikir kritis akan tumbuh menjadi pribadi yang mandiri dan tidak mudah termakan hoaks.\n\nMelatih berpikir kritis pada anak dapat dimulai dengan cara membiasakan mereka untuk bertanya mengenai alasan di balik suatu peristiwa. Alih-alih langsung memberikan jawaban instan, orang tua dapat memancing rasa ingin tahu anak dengan pertanyaan terbuka yang merangsang logika berpikir mereka. Proses diskusi interaktif ini membantu anak melihat masalah dari berbagai sudut pandang berbeda.\n\nSelain itu, kegiatan membaca buku bersama dan mendiskusikan alur cerita juga sangat efektif dalam melatih analisis kognitif anak. Tanyakan kepada anak mengenai keputusan yang diambil oleh karakter dalam buku dan apa alternatif solusi yang bisa dilakukan. Cara menyenangkan ini melatih anak untuk memprediksi konsekuensi logis dari setiap tindakan yang diambil.\n\nMengembangkan keterampilan berpikir kritis membutuhkan kesabaran dan ruang kebebasan berpendapat yang aman di dalam lingkungan keluarga. Hindari sikap otoriter yang langsung mematahkan pendapat atau argumen yang dikemukakan oleh anak saat berdiskusi. Dengan bimbingan yang tepat, anak akan belajar membuat keputusan hidup yang bijak berlandaskan logika yang sehat.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 10:00',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $edukasiId,
                'judul' => 'Manfaat Metode Belajar Aktif untuk Meningkatkan Daya Ingat',
                'isi' => "Metode belajar konvensional yang hanya mengandalkan hafalan pasif sering kali dinilai kurang efektif dalam mempertahankan informasi jangka panjang. Banyak siswa yang cepat lupa dengan materi pelajaran sesaat setelah ujian sekolah selesai dilaksanakan. Untuk mengatasi masalah ini, metode belajar aktif atau active learning hadir sebagai alternatif pembelajaran yang lebih efektif.\n\nBelajar aktif menuntut siswa untuk terlibat secara langsung dalam proses pemrosesan informasi melalui diskusi, praktik, atau presentasi. Saat kita menjelaskan kembali suatu materi kepada orang lain, otak kita bekerja secara aktif menyusun kembali informasi tersebut secara terstruktur. Aktivitas kognitif ini memperkuat koneksi sinapsis di otak sehingga ingatan tersimpan lebih kuat.\n\nSalah satu contoh teknik belajar aktif yang sangat populer dan mudah diterapkan adalah teknik Feynman yang dikembangkan fisikawan terkenal. Teknik ini menantang Anda untuk mempelajari suatu konsep lalu menjelaskannya kembali dengan bahasa sesederhana mungkin seolah mengajar anak kecil. Cara ini membantu mendeteksi bagian materi mana yang belum benar-benar Anda pahami.\n\nMenerapkan metode ini dalam rutinitas belajar harian akan mengubah aktivitas belajar yang membosankan menjadi lebih interaktif dan menantang. Cobalah untuk membuat rangkuman kreatif menggunakan peta pikiran atau mind mapping guna memvisualisasikan hubungan antarkonsep materi. Belajar secara aktif membuat proses menuntut ilmu menjadi lebih bermakna dan bertahan lama di memori.",
                'gambar' => '6a2b8801d08bf.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 10:02',
            ],
            [
                'id_penulis' => $penulisId,
                'id_kategori' => $edukasiId,
                'judul' => 'Mengenal Peran Penting Pendidikan Karakter di Sekolah Modern',
                'isi' => "Pendidikan di sekolah modern saat ini tidak boleh hanya berfokus pada pencapaian prestasi akademik dan penguasaan sains teknologi saja. Kebutuhan untuk mencetak generasi muda yang memiliki integritas moral dan etika yang baik menjadi hal yang mendesak untuk dipenuhi. Di sinilah peran penting pendidikan karakter sebagai penyeimbang kecerdasan intelektual siswa.\n\nPendidikan karakter bertujuan untuk menanamkan nilai-nilai luhur seperti kejujuran, tanggung jawab, toleransi, dan rasa empati sosial pada siswa. Nilai-nilai ini tidak diajarkan sebagai hafalan teori semata, melainkan diintegrasikan ke dalam aktivitas harian di sekolah. Melalui pembiasaan sikap saling menghargai, lingkungan belajar yang kondusif akan tercipta dengan sendirinya.\n\nGuru memegang peranan krusial sebagai teladan utama dalam pembentukan karakter siswa selama berada di lingkungan sekolah. Sikap adil, disiplin, dan tutur kata santun yang ditunjukkan oleh guru akan dicontoh secara langsung oleh para anak didiknya. Kolaborasi yang erat antara pihak sekolah dan orang tua di rumah menjadi kunci keberhasilan program ini.\n\nHasil dari pendidikan karakter yang sukses mungkin tidak terlihat secara instan dalam lembar nilai rapor ujian akhir sekolah. Namun, dampaknya akan sangat terasa ketika siswa terjun ke tengah kehidupan masyarakat luas sebagai warga negara yang bertanggung jawab. Membangun karakter mulia adalah investasi terbesar untuk masa depan bangsa yang harmonis dan beradab.",
                'gambar' => '6a2b8d1b4f065.jpeg',
                'hari_tanggal' => 'Sabtu, 13 Juni 2026 | 10:05',
            ]
        ];

        foreach ($newArticles as $article) {
            DB::table('artikel')->updateOrInsert(
                [
                    'judul' => $article['judul']
                ],
                [
                    'id_penulis' => $article['id_penulis'],
                    'id_kategori' => $article['id_kategori'],
                    'isi' => $article['isi'],
                    'gambar' => $article['gambar'],
                    'hari_tanggal' => $article['hari_tanggal'],
                ]
            );
        }
    }
}
