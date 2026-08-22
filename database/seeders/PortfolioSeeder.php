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
                'title' => 'Data Mining: Prediction and Classification of Heart Disease Risk Factors',
                'title_id' => 'Data Mining: Prediksi dan Klasifikasi Faktor Risiko Penyakit Jantung',
                'role' => 'Data Analyst & ML Developer',
                'role_id' => 'Analis Data & Pengembang ML',
                'description' => json_encode([
                    'Collected, cleaned, and preprocessed heart disease datasets for machine learning analysis',
                    'Implemented the Random Forest algorithm to predict potential heart disease risk based on clinical and demographic factors',
                    'Applied K-Means Clustering to group individuals based on similar risk factor patterns',
                    'Evaluated model performance using metrics such as accuracy, precision, recall, and silhouette score',
                    'Conducted data visualization to interpret the results and highlight significant features',
                    'Collaborated with team members to document findings and present insights in a final report and presentation',
                ]),
                'description_id' => json_encode([
                    'Mengumpulkan, membersihkan, dan melakukan preprocessing dataset penyakit jantung untuk analisis machine learning',
                    'Menerapkan algoritma Random Forest untuk memprediksi potensi risiko penyakit jantung berdasarkan faktor klinis dan demografis',
                    'Menerapkan K-Means Clustering untuk mengelompokkan individu berdasarkan pola faktor risiko yang serupa',
                    'Mengevaluasi performa model menggunakan metrik seperti akurasi, presisi, recall, dan silhouette score',
                    'Melakukan visualisasi data untuk menginterpretasikan hasil dan menyoroti fitur-fitur penting',
                    'Berkolaborasi dengan anggota tim untuk mendokumentasikan temuan dan mempresentasikan insight dalam laporan akhir',
                ]),
                'technologies' => 'Python, Random Forest, K-Means, Data Visualization',
                'link' => null,
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
                'link' => null,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'RENHAN Business Process Optimization & Humanitarian Operations App',
                'title_id' => 'Optimalisasi Proses Bisnis RENHAN & Aplikasi Operasi Kemanusiaan',
                'role' => 'System Analyst & UI/UX Designer',
                'role_id' => 'Analis Sistem & Desainer UI/UX',
                'description' => json_encode([
                    'Analyzed system and user needs at RENHAN to facilitate business process improvements',
                    'Architected system design employing UML-based diagrams (Use Case, Component, Deployment)',
                    'Defined core system functionalities and user workflows',
                    'Created iterative low and high-fidelity prototypes',
                ]),
                'description_id' => json_encode([
                    'Menganalisis kebutuhan sistem dan pengguna di RENHAN untuk mendukung perbaikan proses bisnis',
                    'Merancang arsitektur sistem menggunakan diagram berbasis UML (Use Case, Component, Deployment)',
                    'Mendefinisikan fungsionalitas inti sistem dan alur kerja pengguna',
                    'Membuat prototipe low-fidelity dan high-fidelity secara iteratif',
                ]),
                'technologies' => 'UML, Figma, Visual Paradigm, System Analysis',
                'link' => null,
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
                'link' => null,
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
            ['name' => 'Python', 'group_name' => 'Programming'],
            ['name' => 'PHP', 'group_name' => 'Programming'],
            ['name' => 'HTML', 'group_name' => 'Programming'],
            ['name' => 'CSS', 'group_name' => 'Programming'],
            ['name' => 'Laravel', 'group_name' => 'Programming'],
            ['name' => 'Oracle', 'group_name' => 'Database'],
            ['name' => 'MySQL Workbench', 'group_name' => 'Database'],
            ['name' => 'PhpMyAdmin', 'group_name' => 'Database'],
            ['name' => 'Figma', 'group_name' => 'Design & Modeling'],
            ['name' => 'Visual Paradigm 17.2', 'group_name' => 'Design & Modeling'],
            ['name' => 'Bizagi', 'group_name' => 'Design & Modeling'],
            ['name' => 'Visual Studio Code', 'group_name' => 'Development Tools'],
            ['name' => 'Github', 'group_name' => 'Development Tools'],
            ['name' => 'Jira', 'group_name' => 'Development Tools'],
            ['name' => 'Linux', 'group_name' => 'Systems & Environment'],
            ['name' => 'Virtual Box', 'group_name' => 'Systems & Environment'],
            ['name' => 'VMware', 'group_name' => 'Systems & Environment'],
            ['name' => 'Cisco Packet Tracer', 'group_name' => 'Systems & Environment'],
            ['name' => 'XAMPP Control Panel', 'group_name' => 'Systems & Environment'],
            ['name' => 'Laragon', 'group_name' => 'Systems & Environment'],
            ['name' => 'Microsoft Office', 'group_name' => 'Productivity'],
            ['name' => 'Manage Engine Service Desk', 'group_name' => 'Productivity'],
        ];

        foreach ($hardSkills as $index => $skill) {
            Skill::create([
                'name' => $skill['name'],
                'category' => 'hard',
                'group_name' => $skill['group_name'],
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
