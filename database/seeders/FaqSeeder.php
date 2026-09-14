<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'question' => 'Where do you provide massage services?',
                'question_ms' => 'Di mana anda menyediakan perkhidmatan urutan?',
                'answer' => 'We provide professional outcall massage services directly to your home, hotel, apartment, or residence across selected areas of Kuala Lumpur. Our therapists travel to your preferred location so you can enjoy relaxation in the comfort of your own space.',
                'answer_ms' => 'Kami menyediakan perkhidmatan urutan panggilan profesional terus ke rumah, hotel, pangsapuri, atau kediaman anda di kawasan terpilih di Kuala Lumpur. Ahli terapi kami akan datang ke lokasi pilihan anda supaya anda boleh menikmati kelonggaran di ruang anda sendiri.',
                'sort_order' => 1,
            ],
            [
                'question' => 'How do I make a booking?',
                'question_ms' => 'Bagaimana saya membuat tempahan?',
                'answer' => 'Making a booking is simple. Choose your preferred massage service and duration, then click on the "Book Now" button. Fill in your preferred date, time, and location details. You will then be directed to WhatsApp to confirm your booking with our team. We recommend booking in advance to secure your preferred timeslot.',
                'answer_ms' => 'Membuat tempahan adalah mudah. Pilih perkhidmatan urutan dan tempoh pilihan anda, kemudian klik butang "Tempah Sekarang". Isi butiran tarikh, masa, dan lokasi pilihan anda. Anda akan diarahkan ke WhatsApp untuk mengesahkan tempahan anda dengan pasukan kami. Kami mengesyorkan tempahan lebih awal untuk mendapatkan slot masa pilihan anda.',
                'sort_order' => 2,
            ],
            [
                'question' => 'Do you provide hotel massage?',
                'question_ms' => 'Adakah anda menyediakan urutan hotel?',
                'answer' => 'Yes, hotel massage is one of our primary services. We regularly serve guests staying at hotels throughout the KLCC, Bukit Bintang, and KL Sentral areas. Simply provide us with your hotel name and room number when making the booking, and our therapist will arrive at your room at the scheduled time.',
                'answer_ms' => 'Ya, urutan hotel adalah salah satu perkhidmatan utama kami. Kami kerap melayan tetamu yang menginap di hotel di kawasan KLCC, Bukit Bintang, dan KL Sentral. Hanya berikan nama hotel dan nombor bilik anda semasa membuat tempahan, dan ahli terapi kami akan tiba di bilik anda pada masa yang dijadualkan.',
                'sort_order' => 3,
            ],
            [
                'question' => 'What payment methods are available?',
                'question_ms' => 'Apakah kaedah pembayaran yang disediakan?',
                'answer' => 'We accept cash payment directly to the therapist upon completion of the service, as well as popular electronic payment methods such as bank transfer and QR code payments. Payment details can be discussed during booking confirmation via WhatsApp.',
                'answer_ms' => 'Kami menerima pembayaran tunai terus kepada ahli terapi selepas perkhidmatan selesai, serta kaedah pembayaran elektronik popular seperti pemindahan bank dan pembayaran kod QR. Butiran pembayaran boleh dibincangkan semasa pengesahan tempahan melalui WhatsApp.',
                'sort_order' => 4,
            ],
            [
                'question' => 'How early should I book?',
                'question_ms' => 'Berapa awal saya perlu membuat tempahan?',
                'answer' => 'We recommend booking at least 2 to 3 hours in advance for same-day appointments. For weekend bookings or specific time preferences, we suggest booking a day or two ahead to ensure availability. That said, we always do our best to accommodate last-minute requests whenever possible.',
                'answer_ms' => 'Kami mengesyorkan tempahan sekurang-kurangnya 2 hingga 3 jam lebih awal untuk temujanji hari yang sama. Untuk tempahan hujung minggu atau pilihan masa tertentu, kami cadangkan tempahan satu atau dua hari lebih awal untuk memastikan kekosongan. Walau bagaimanapun, kami akan sentiasa berusaha untuk memenuhi permintaan terakhir jika boleh.',
                'sort_order' => 5,
            ],
            [
                'question' => 'Which areas do you cover?',
                'question_ms' => 'Kawasan manakah yang anda liput?',
                'answer' => 'We currently provide services in selected areas across Kuala Lumpur including KLCC, Bukit Bintang, KL Sentral, Bangsar, Mont Kiara, Sri Hartamas, Ampang, Damansara, Setapak, and Cheras. If you are located outside these areas, please contact us to confirm availability for your specific location.',
                'answer_ms' => 'Kami kini menyediakan perkhidmatan di kawasan terpilih di seluruh Kuala Lumpur termasuk KLCC, Bukit Bintang, KL Sentral, Bangsar, Mont Kiara, Sri Hartamas, Ampang, Damansara, Setapak, dan Cheras. Jika anda berada di luar kawasan ini, sila hubungi kami untuk mengesahkan ketersediaan untuk lokasi spesifik anda.',
                'sort_order' => 6,
            ],
            [
                'question' => 'Can I request a specific massage duration?',
                'question_ms' => 'Bolehkah saya meminta tempoh urutan tertentu?',
                'answer' => 'Yes, you may select from our available duration options for each massage service. Most services offer 60, 90, and 120 minute sessions, while the body scrub is available as a 30 minute treatment. The available durations and corresponding prices are clearly listed on each service card. If you require a custom duration, please discuss this with us during booking.',
                'answer_ms' => 'Ya, anda boleh memilih daripada pilihan tempoh yang tersedia untuk setiap perkhidmatan urutan. Kebanyakan perkhidmatan menawarkan sesi 60, 90, dan 120 minit, manakala lulur badan disediakan sebagai rawatan 30 minit. Tempoh yang tersedia dan harga sepadan disenaraikan dengan jelas pada setiap kad perkhidmatan. Jika anda memerlukan tempoh tersuai, sila bincangkan perkara ini dengan kami semasa tempahan.',
                'sort_order' => 7,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
