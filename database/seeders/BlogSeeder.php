<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Blog;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        Blog::insert([

            [
                'judul' => 'Peningkatan Aktivitas UMKM oleh FLOMART',
                'gambar' => 'NEWS.jpg',
                'kategori' => 'UMKM',
                'penulis' => 'Titania Ang',
                'tanggal' => '2025-12-12',
                'isi' => 'FLOMART hadir sebagai platform e-commerce berbasis tanaman yang bertujuan membantu pelaku UMKM di sektor pertanian dan hortikultura untuk berkembang lebih luas di era digital.

Melalui sistem marketplace yang terintegrasi, pelaku usaha lokal kini dapat memasarkan produk tanaman, bibit, pupuk, hingga perlengkapan berkebun kepada konsumen dari berbagai daerah tanpa harus memiliki toko fisik besar.

Digitalisasi yang dilakukan FLOMART membantu UMKM meningkatkan efisiensi penjualan, memperluas jangkauan pasar, dan mempercepat proses transaksi secara online. Fitur seperti pengelolaan katalog produk, pencarian tanaman berdasarkan kategori, hingga sistem pemesanan otomatis menjadi solusi praktis bagi para penjual tanaman lokal.

Selain itu, FLOMART juga mendukung promosi produk UMKM melalui tampilan marketplace yang menarik dan mudah diakses oleh pembeli. Dengan adanya sistem ulasan dan rating, konsumen dapat lebih percaya terhadap kualitas produk yang dijual.

Banyak pelaku usaha tanaman mengaku mengalami peningkatan penjualan sejak bergabung dengan FLOMART. Produk yang sebelumnya hanya dikenal di lingkungan sekitar kini dapat menjangkau pasar yang lebih luas secara efektif dan berkelanjutan.

Ke depan, FLOMART berkomitmen untuk terus mendukung pertumbuhan UMKM Indonesia melalui inovasi teknologi digital yang ramah lingkungan dan berfokus pada sektor pertanian modern.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'judul' => 'Cara Merawat Tanaman Sayur agar Tumbuh Optimal',
                'gambar' => 'tanah.jpg',
                'kategori' => 'Perawatan',
                'penulis' => 'Septian Ang',
                'tanggal' => '2025-12-09',
                'isi' => 'Merawat tanaman sayur agar tumbuh optimal membutuhkan perhatian pada beberapa faktor penting seperti penyiraman, pencahayaan, media tanam, dan pemupukan.

Penyiraman sebaiknya dilakukan secara rutin pada pagi atau sore hari agar kelembapan tanah tetap terjaga. Hindari penyiraman berlebihan karena dapat menyebabkan akar tanaman membusuk.

Selain air, tanaman sayur juga membutuhkan sinar matahari yang cukup untuk proses fotosintesis. Sebagian besar tanaman sayur memerlukan paparan sinar matahari minimal 4 hingga 6 jam setiap hari.

Pemilihan media tanam yang subur dan kaya nutrisi juga sangat berpengaruh terhadap pertumbuhan tanaman. Campuran tanah, kompos, dan sekam bakar dapat membantu menjaga struktur tanah tetap gembur dan memiliki drainase yang baik.

Pemupukan dapat dilakukan menggunakan pupuk organik maupun pupuk cair sesuai kebutuhan tanaman. Pemberian nutrisi secara berkala membantu tanaman tumbuh lebih sehat, menghasilkan daun yang segar, dan meningkatkan kualitas panen.

Selain itu, penting untuk rutin memeriksa tanaman dari serangan hama atau penyakit. Penggunaan pestisida alami dapat menjadi solusi ramah lingkungan untuk menjaga tanaman tetap sehat.

Dengan perawatan yang tepat dan konsisten, tanaman sayur dapat tumbuh subur serta menghasilkan panen berkualitas baik untuk kebutuhan rumah tangga maupun usaha pertanian.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'judul' => 'Urban Farming: Gaya Berkebun di Lahan Terbatas',
                'gambar' => 'berkebun.jpg',
                'kategori' => 'Urban Farming',
                'penulis' => 'Daniel Ang',
                'tanggal' => '2025-12-08',
               'isi' => 'Urban farming menjadi salah satu solusi modern bagi masyarakat perkotaan yang memiliki keterbatasan lahan namun tetap ingin bercocok tanam.

Konsep urban farming memungkinkan masyarakat memanfaatkan area kecil seperti halaman rumah, balkon, rooftop, hingga dinding bangunan untuk menanam berbagai jenis tanaman sayur, buah, maupun tanaman hias.

Selain membantu memenuhi kebutuhan pangan rumah tangga, urban farming juga memberikan manfaat lingkungan seperti mengurangi polusi udara, meningkatkan kualitas udara, dan menciptakan suasana rumah yang lebih hijau serta nyaman.

Metode urban farming yang populer saat ini meliputi hidroponik, vertikultur, dan penggunaan pot tanam sederhana. Teknik tersebut memungkinkan tanaman tetap tumbuh optimal meskipun berada di area terbatas.

Kegiatan berkebun di perkotaan juga dapat menjadi aktivitas positif yang membantu mengurangi stres dan meningkatkan produktivitas sehari-hari. Banyak masyarakat mulai menjadikan urban farming sebagai hobi sekaligus peluang usaha kecil.

Dengan perkembangan teknologi dan akses informasi yang semakin mudah, urban farming diprediksi akan terus berkembang sebagai gaya hidup ramah lingkungan di masa depan.',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}