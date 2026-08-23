<?php

namespace Database\Seeders;

use App\Models\Certification;
use App\Models\Education;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use App\Models\WorkExperience;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        Profile::create([
            'full_name' => 'Revalina Aurellia Indrawan',
            'title' => 'Information Systems Student & Certified Data Scientist (BNSP)',
            'title_id' => 'Mahasiswa Sistem Informasi & Data Scientist Bersertifikat (BNSP)',
            'bio' => 'Information Systems student and certified Data Scientist (BNSP) with hands-on experience in data analysis, system architecture, and process automation. Dedicated to applying data-driven solutions to solve business challenges and enhance operational efficiency. Committed to leveraging analytical skills to streamline workflows and improve organizational performance.',
            'bio_id' => 'Mahasiswa Sistem Informasi dan Data Scientist bersertifikat (BNSP) dengan pengalaman langsung dalam analisis data, arsitektur sistem, dan otomatisasi proses. Berdedikasi menerapkan solusi berbasis data untuk memecahkan tantangan bisnis dan meningkatkan efisiensi operasional. Berkomitmen memanfaatkan kemampuan analitis untuk menyederhanakan alur kerja dan meningkatkan kinerja organisasi.',
            'email' => 'revalinaurellia@gmail.com',
            'phone' => '088213343786',
            'linkedin' => 'https://www.linkedin.com/in/revalina-aurellia-indrawan',
            'github' => 'https://github.com/Revlnrindrawan',
            'photo' => 'images/profile.png',
            'about_photo' => 'images/about-photo.jpg',
        ]);

        Education::insert([
            [
                'institution' => 'Telkom University',
                'location' => 'Bandung, Indonesia',
                'degree' => 'Information Systems',
                'start_date' => 'Sep 2022',
                'end_date' => 'Present',
                'gpa' => '3.38 / 4.00',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // High school entry intentionally omitted — not relevant to a
            // professional portfolio (removed per request, Aug 2026).
        ]);

        WorkExperience::insert([
            [
                'company' => 'Otoritas Jasa Keuangan (OJK)',
                'position' => 'Intern',
                'position_id' => 'Magang',
                'location' => 'Indonesia',
                'start_date' => 'Feb 2026',
                'end_date' => 'Feb 2026',
                'responsibilities' => json_encode([
                    'Stress Testing & Data Modeling',
                    'Automation of Financial Data Processing',
                    'International Policy Analysis',
                    'Financial Services Sector Surveillance',
                ]),
                'responsibilities_id' => json_encode([
                    'Stress Testing & Pemodelan Data',
                    'Otomatisasi Pemrosesan Data Keuangan',
                    'Analisis Kebijakan Internasional',
                    'Pengawasan Sektor Jasa Keuangan',
                ]),
                'photo' => 'images/exp-ojk.jpg',
                'type' => 'internship',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company' => 'PT Energi Mega Persada',
                'position' => 'Intern',
                'position_id' => 'Magang',
                'location' => 'Indonesia',
                'start_date' => 'Jul 2025',
                'end_date' => 'Sep 2025',
                'responsibilities' => json_encode([
                    'Developed an internal certification monitoring website for the HR department',
                    'Designed and implemented a system that allows HR to track employee certification status in real time',
                    'Enabled HR to easily identify certifications that are nearing expiration (within 3 months), already expired, or still valid',
                    'Improved efficiency in monitoring and decision-making processes by providing automated alerts and clear visualization of certification timelines',
                ]),
                'responsibilities_id' => json_encode([
                    'Mengembangkan website internal untuk memantau sertifikasi bagi departemen HR',
                    'Merancang dan mengimplementasikan sistem yang memungkinkan HR melacak status sertifikasi karyawan secara real-time',
                    'Memudahkan HR mengidentifikasi sertifikasi yang akan kedaluwarsa (dalam 3 bulan), sudah kedaluwarsa, atau masih berlaku',
                    'Meningkatkan efisiensi proses pemantauan dan pengambilan keputusan melalui notifikasi otomatis dan visualisasi timeline sertifikasi yang jelas',
                ]),
                'photo' => 'images/exp-emp.jpg',
                'type' => 'internship',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company' => 'Genesis 2024 — Information Systems Student Association',
                'position' => 'Guider',
                'position_id' => 'Pemandu',
                'location' => 'Telkom University',
                'start_date' => 'Aug 2024',
                'end_date' => 'Nov 2024',
                'responsibilities' => json_encode([
                    'Guided and mentored participants throughout the leadership training program',
                    'Provided motivation and emotional support for participant engagement and growth',
                    'Monitored character development and delivered regular evaluations',
                    'Acted as a role model for discipline, responsibility, and leadership',
                    'Delivered soft skill sessions on teamwork, communication, and problem-solving',
                ]),
                'responsibilities_id' => json_encode([
                    'Membimbing dan mendampingi peserta selama program pelatihan kepemimpinan',
                    'Memberikan motivasi dan dukungan emosional untuk keterlibatan dan perkembangan peserta',
                    'Memantau perkembangan karakter dan memberikan evaluasi berkala',
                    'Menjadi panutan dalam hal kedisiplinan, tanggung jawab, dan kepemimpinan',
                    'Menyampaikan sesi soft skill tentang kerja sama tim, komunikasi, dan pemecahan masalah',
                ]),
                'photo' => 'images/exp-guider.jpg',
                'type' => 'organizational',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Project::insert([
            [
                'title' => 'Predictive Analytics Dashboard for Maternal Healthcare Adoption',
                'title_id' => 'Predictive Analytics Dashboard for Maternal Healthcare Adoption',
                'image' => 'images/project-maternal-dashboard.jpg',
                'role' => 'Data Analyst & ML Developer',
                'role_id' => 'Analis Data & Pengembang ML',
                'description' => json_encode([
                    'Collected, cleaned, and preprocessed maternal healthcare datasets for machine learning analysis and demographic mapping',
                    'Applied machine learning algorithms to predict healthcare service adoption levels based on 5 key factors: individual, technical, social & government, psychological, and economic',
                    'Built an interactive Streamlit dashboard to visualize demographic distribution, the influence of the five adoption factors, and real-time regional analysis',
                ]),
                'description_id' => json_encode([
                    'Mengumpulkan, membersihkan, dan melakukan preprocessing dataset kesehatan ibu hamil untuk analisis machine learning dan pemetaan demografis',
                    'Menerapkan algoritma machine learning untuk memprediksi tingkat adopsi layanan kesehatan berdasarkan 5 faktor utama: individu, teknikal, sosial & pemerintah, psikologi, dan ekonomi',
                    'Membangun dashboard interaktif berbasis Streamlit untuk memvisualisasikan sebaran demografis, pengaruh kelima faktor adopsi, dan analisis wilayah secara real-time',
                ]),
                'technologies' => 'Streamlit, Deep Learning, Machine Learning, Data Visualization',
                'link' => 'https://dashboard-sentimen-awqfnmw5ek2wyt6abyxsuf.streamlit.app/Analisis_Demografi',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'TAMENG — Teknologi Aman Mandiri Untuk Negara',
                'title_id' => 'TAMENG — Teknologi Aman Mandiri Untuk Negara',
                'role' => 'Usability Tester',
                'role_id' => 'Penguji Usability',
                'description' => json_encode([
                    'Conducted usability testing for TAMENG, an internal disaster response support application developed for RENHAN operations',
                    'Focused on assessing navigation and utility during emergency scenarios to ensure all features were accessible, efficient, and operable under urgent conditions',
                ]),
                'description_id' => json_encode([
                    'Melakukan pengujian usability untuk TAMENG, aplikasi pendukung tanggap bencana internal yang dikembangkan untuk operasional RENHAN',
                    'Berfokus pada evaluasi navigasi dan kegunaan dalam skenario darurat untuk memastikan semua fitur mudah diakses, efisien, dan dapat dioperasikan dalam kondisi mendesak',
                ]),
                'technologies' => 'Usability Testing, UX Research',
                'link' => 'https://www.figma.com/design/MtdZmBWqzKqmVws6IFxGg5/PI?node-id=0-1&t=Td59i4VYO7mRk0qE-1',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Employee Certification Monitoring System',
                'title_id' => 'Employee Certification Monitoring System',
                'image' => 'images/project-emp-cert.jpg',
                'role' => 'Fullstack Developer',
                'role_id' => 'Pengembang Fullstack',
                'description' => json_encode([
                    'System Development: Designed and built an internal certification monitoring web app end-to-end specifically for HR department needs.',
                    'Implemented an automated tracking feature that instantly classifies employee certification status into three categories: Valid, Nearing Expiration (90 days out), and Expired.',
                    'Developed automated reminder notifications and an interactive timeline visualization to help HR act quickly before certifications expire.',
                    'Improved HR data monitoring efficiency to 100% digital, replacing manual tracking and minimizing compliance risk related to workforce certifications.',
                ]),
                'description_id' => json_encode([
                    'Pengembangan Sistem: Merancang dan membangun aplikasi web pemantauan sertifikasi internal dari tahap dasar (end-to-end) khusus untuk kebutuhan departemen HR.',
                    'Mengimplementasikan fitur pelacakan otomatis yang mengelompokkan status sertifikasi karyawan secara instan menjadi tiga kategori: Masih Berlaku, Mendekati Kedaluwarsa (H-90 hari), dan Kedaluwarsa.',
                    'Mengembangkan fitur notifikasi pengingat otomatis serta visualisasi timeline interaktif untuk membantu HR mengambil tindakan cepat sebelum sertifikasi habis masa berlakunya.',
                    'Meningkatkan efisiensi pemantauan data HR hingga 100% digital, menggantikan pelacakan manual, dan meminimalkan risiko kepatuhan (compliance risk) terkait sertifikasi tenaga kerja.',
                ]),
                'technologies' => 'HTML, CSS, Laravel, GitHub',
                'link' => 'https://github.com/ruthmarshanda04/emp-',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mathilda Relaxation App',
                'title_id' => 'Aplikasi Relaksasi Mathilda',
                'role' => 'UX Designer',
                'role_id' => 'Desainer UX',
                'description' => json_encode([
                    'Developed user experience strategy and design for a digital wellness application',
                    'Employed user research methodologies (interviews, observations) to identify key user needs',
                    'Visualized user interactions through journey maps and layouts',
                    'Produced iterative prototypes (low and high-fidelity) using standard design software',
                    'Contributed to a 5-person team using design thinking principles',
                ]),
                'description_id' => json_encode([
                    'Mengembangkan strategi dan desain pengalaman pengguna untuk aplikasi digital wellness',
                    'Menggunakan metodologi riset pengguna (wawancara, observasi) untuk mengidentifikasi kebutuhan utama pengguna',
                    'Memvisualisasikan interaksi pengguna melalui journey map dan layout',
                    'Menghasilkan prototipe iteratif (low dan high-fidelity) menggunakan software desain standar',
                    'Berkontribusi dalam tim beranggotakan 5 orang menggunakan prinsip design thinking',
                ]),
                'technologies' => 'Figma, User Research, Journey Mapping, Prototyping',
                'link' => 'https://www.figma.com/design/0OyxswehAoEXh0J8y0gAup/Mathilda-App?node-id=0-1&t=lpFjmH23CMBFoT5v-1',
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $softSkills = [
            'Critical Thinking' => 'Berpikir Kritis',
            'Problem Solving' => 'Pemecahan Masalah',
            'Leadership' => 'Kepemimpinan',
            'Time Management' => 'Manajemen Waktu',
            'Teamwork' => 'Kerja Tim',
            'Public Speaking' => 'Berbicara di Depan Umum',
        ];

        $index = 0;
        foreach ($softSkills as $en => $id) {
            Skill::create([
                'name' => $en,
                'name_id' => $id,
                'category' => 'soft',
                'sort_order' => ++$index,
            ]);
        }

        $hardSkills = [
            'Canva', 'Laravel', 'HTML', 'CSS', 'Figma',
            'Data Analysis', 'Data Visualization', 'Predictive Modeling',
            'Machine Learning', 'Deep Learning', 'Big Data',
        ];

        foreach ($hardSkills as $index => $name) {
            Skill::create([
                'name' => $name,
                'category' => 'hard',
                'sort_order' => $index + 1,
            ]);
        }

        $languages = [
            'Indonesian' => 'Bahasa Indonesia',
            'English' => 'Bahasa Inggris',
        ];
        $index = 0;
        foreach ($languages as $en => $id) {
            Skill::create([
                'name' => $en,
                'name_id' => $id,
                'category' => 'language',
                'sort_order' => ++$index,
            ]);
        }

        Certification::insert([
            [
                'title' => 'Sertifikasi Kompetensi Data Scientist',
                'issuer' => 'BNSP — LSP Informatika',
                'year' => '2025',
                'description' => 'Certified Associate Data Scientist (CADS) — Kecerdasan Buatan / Ilmuwan Data Madya. Reg. No. TIK.317.04114 2025. National professional competency certification validating expertise in data analysis, machine learning, and AI. Valid 3 years, issued Jakarta, 27 November 2025.',
                'description_id' => 'Ilmuwan Data Madya Bersertifikat (CADS) — Kecerdasan Buatan. No. Reg. TIK.317.04114 2025. Sertifikasi kompetensi profesi nasional yang memvalidasi keahlian dalam analisis data, machine learning, dan AI. Berlaku 3 tahun, diterbitkan di Jakarta, 27 November 2025.',
                'file_path' => 'files/sertifikat-bnsp-data-scientist.png',
                'is_featured' => true,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Aguna Course — Linux Fundamental',
                'issuer' => 'Aguna',
                'year' => '2024',
                'description' => 'Fundamental Linux operating system administration and command-line proficiency.',
                'description_id' => 'Dasar-dasar administrasi sistem operasi Linux dan kemampuan command-line.',
                'is_featured' => false,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Aguna Course — Virtual Machine Fundamental',
                'issuer' => 'Aguna',
                'year' => '2024',
                'description' => 'Virtual machine setup, configuration, and management fundamentals.',
                'description_id' => 'Dasar-dasar instalasi, konfigurasi, dan pengelolaan virtual machine.',
                'is_featured' => false,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'EPRT — English Proficiency and Readiness Test',
                'issuer' => 'Telkom University',
                'year' => '2024',
                'description' => 'Score: 480 — English proficiency assessment for academic and professional readiness.',
                'description_id' => 'Skor: 480 — Tes kemampuan bahasa Inggris untuk kesiapan akademik dan profesional.',
                'is_featured' => false,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
