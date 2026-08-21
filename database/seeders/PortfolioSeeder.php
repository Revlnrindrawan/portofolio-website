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
            'bio' => 'Information Systems student and certified Data Scientist (BNSP) with hands-on experience in data analysis, system architecture, and process automation. Dedicated to applying data-driven solutions to solve business challenges and enhance operational efficiency. Committed to leveraging analytical skills to streamline workflows and improve organizational performance.',
            'email' => 'revalinaurellia@gmail.com',
            'phone' => '088213343786',
            'linkedin' => 'https://www.linkedin.com/in/revalina-aurellia-indrawan',
            'photo' => 'images/profile.jpg',
        ]);

        Education::insert([
            [
                'institution' => 'Telkom University',
                'location' => 'Bandung, Indonesia',
                'degree' => 'Information Systems',
                'start_date' => 'Sep 2022',
                'end_date' => 'Present',
                'gpa' => '3.37 / 4.00',
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
                'location' => 'Indonesia',
                'start_date' => 'Feb 2026',
                'end_date' => 'Present',
                'responsibilities' => json_encode([
                    'Stress Testing & Data Modeling',
                    'Automation of Financial Data Processing',
                    'International Policy Analysis',
                    'Financial Services Sector Surveillance',
                ]),
                'type' => 'internship',
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company' => 'PT Energi Mega Persada',
                'position' => 'Intern',
                'location' => 'Indonesia',
                'start_date' => 'Jul 2025',
                'end_date' => 'Sep 2025',
                'responsibilities' => json_encode([
                    'Developed an internal certification monitoring website for the HR department',
                    'Designed and implemented a system that allows HR to track employee certification status in real time',
                    'Enabled HR to easily identify certifications that are nearing expiration (within 3 months), already expired, or still valid',
                    'Improved efficiency in monitoring and decision-making processes by providing automated alerts and clear visualization of certification timelines',
                ]),
                'type' => 'internship',
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company' => 'Genesis 2024 — Information Systems Student Association',
                'position' => 'Guider',
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
                'type' => 'organizational',
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Project::insert([
            [
                'title' => 'Data Mining: Prediction and Classification of Heart Disease Risk Factors',
                'role' => 'Data Analyst & ML Developer',
                'description' => json_encode([
                    'Collected, cleaned, and preprocessed heart disease datasets for machine learning analysis',
                    'Implemented the Random Forest algorithm to predict potential heart disease risk based on clinical and demographic factors',
                    'Applied K-Means Clustering to group individuals based on similar risk factor patterns',
                    'Evaluated model performance using metrics such as accuracy, precision, recall, and silhouette score',
                    'Conducted data visualization to interpret the results and highlight significant features',
                    'Collaborated with team members to document findings and present insights in a final report and presentation',
                ]),
                'technologies' => 'Python, Random Forest, K-Means, Data Visualization',
                'link' => null,
                'sort_order' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'TAMENG — Teknologi Aman Mandiri Untuk Negara',
                'role' => 'Usability Tester',
                'description' => json_encode([
                    'Conducted usability testing for TAMENG, an internal disaster response support application developed for RENHAN operations',
                    'Focused on assessing navigation and utility during emergency scenarios to ensure all features were accessible, efficient, and operable under urgent conditions',
                ]),
                'technologies' => 'Usability Testing, UX Research',
                'link' => null,
                'sort_order' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'RENHAN Business Process Optimization & Humanitarian Operations App',
                'role' => 'System Analyst & UI/UX Designer',
                'description' => json_encode([
                    'Analyzed system and user needs at RENHAN to facilitate business process improvements',
                    'Architected system design employing UML-based diagrams (Use Case, Component, Deployment)',
                    'Defined core system functionalities and user workflows',
                    'Created iterative low and high-fidelity prototypes',
                ]),
                'technologies' => 'UML, Figma, Visual Paradigm, System Analysis',
                'link' => null,
                'sort_order' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mathilda Relaxation App',
                'role' => 'UX Designer',
                'description' => json_encode([
                    'Developed user experience strategy and design for a digital wellness application',
                    'Employed user research methodologies (interviews, observations) to identify key user needs',
                    'Visualized user interactions through journey maps and layouts',
                    'Produced iterative prototypes (low and high-fidelity) using standard design software',
                    'Contributed to a 5-person team using design thinking principles',
                ]),
                'technologies' => 'Figma, User Research, Journey Mapping, Prototyping',
                'link' => null,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $softSkills = [
            'Critical Thinking', 'Problem Solving', 'Leadership',
            'Time Management', 'Teamwork', 'Public Speaking',
        ];

        foreach ($softSkills as $index => $skill) {
            Skill::create([
                'name' => $skill,
                'category' => 'soft',
                'sort_order' => $index + 1,
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

        $languages = ['Indonesian', 'English'];
        foreach ($languages as $index => $language) {
            Skill::create([
                'name' => $language,
                'category' => 'language',
                'sort_order' => $index + 1,
            ]);
        }

        Certification::insert([
            [
                'title' => 'Sertifikasi Kompetensi Data Scientist',
                'issuer' => 'BNSP — LSP Informatika',
                'year' => '2025',
                'description' => 'Certified Associate Data Scientist (CADS) — Kecerdasan Buatan / Ilmuwan Data Madya. National professional competency certification validating expertise in data analysis, machine learning, and AI.',
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
                'is_featured' => false,
                'sort_order' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
