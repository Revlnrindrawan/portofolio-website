@extends('layouts.app')

@section('content')
<nav class="navbar" id="navbar">
    <div class="container nav-container">
        <a href="#home" class="nav-logo">
            <span class="nav-logo-mark">RAI</span>
            <span class="nav-logo-text">Revalina<span class="nav-logo-dot">.</span></span>
        </a>
        <div class="nav-right">
            <ul class="nav-links" id="navLinks">
                <li><a href="#about"><span data-i18n-en>About</span><span data-i18n-id>Tentang</span></a></li>
                <li><a href="#experience"><span data-i18n-en>Experience</span><span data-i18n-id>Pengalaman</span></a></li>
                <li><a href="#skills"><span data-i18n-en>Skills</span><span data-i18n-id>Keahlian</span></a></li>
                <li><a href="#projects"><span data-i18n-en>Projects</span><span data-i18n-id>Proyek</span></a></li>
                <li><a href="#certifications"><span data-i18n-en>Certifications</span><span data-i18n-id>Sertifikasi</span></a></li>
                <li><a href="#contact" class="nav-cta"><span data-i18n-en>Contact</span><span data-i18n-id>Kontak</span></a></li>
            </ul>
            <div class="lang-switch" id="langSwitch">
                <button type="button" class="lang-switch-btn" id="langSwitchBtn" aria-haspopup="listbox" aria-expanded="false">
                    <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                    <span id="langSwitchLabel">EN</span>
                    <svg class="lang-switch-chevron" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M6 9l6 6 6-6"/>
                    </svg>
                </button>
                <ul class="lang-switch-menu" id="langSwitchMenu" role="listbox">
                    <li><button type="button" class="lang-option" data-lang-value="en" role="option">English <span class="lang-option-check">✓</span></button></li>
                    <li><button type="button" class="lang-option" data-lang-value="id" role="option">Bahasa Indonesia <span class="lang-option-check">✓</span></button></li>
                </ul>
            </div>
            <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </div>
</nav>

<section class="hero" id="home">
    <div class="container hero-container">
        <div class="hero-content">
            <div class="hero-badge">
                <span class="badge-icon">
                    <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M13 2 3 14h7l-1 8 10-12h-7l1-8z"/>
                    </svg>
                </span>
                <span data-i18n-en>Available for Opportunities</span>
                <span data-i18n-id>Terbuka untuk Peluang Baru</span>
            </div>
            <h1 class="hero-name">
                {{ $profile->full_name }}
            </h1>
            <p class="hero-title">
                <span data-i18n-en>{{ $profile->title }}</span>
                <span data-i18n-id>{{ $profile->title_id ?? $profile->title }}</span>
            </p>
            <p class="hero-summary">
                <span data-i18n-en>Certified Data Scientist (BNSP) and Information Systems student skilled in transforming complex data into actionable insights, scalable system architectures, and automated solutions that drive smarter decision-making.</span>
                <span data-i18n-id>Data Scientist Bersertifikat (BNSP) dan mahasiswa Sistem Informasi yang terampil mengubah data kompleks menjadi wawasan yang actionable, arsitektur sistem yang scalable, dan solusi otomatis untuk pengambilan keputusan yang lebih cerdas.</span>
            </p>
            <div class="hero-actions">
                <a href="#contact" class="btn btn-primary">
                    <span data-i18n-en>Get In Touch</span>
                    <span data-i18n-id>Hubungi Saya</span>
                </a>
            </div>
        </div>
        <div class="hero-visual">
            <div class="profile-frame">
                @if($profile->photo && file_exists(public_path($profile->photo)))
                    <img src="{{ asset($profile->photo) }}" alt="{{ $profile->full_name }}" class="profile-photo">
                @else
                    <div class="profile-placeholder">
                        <span>RAI</span>
                    </div>
                @endif
            </div>
            <div class="hero-stats">
                <div class="stat-card">
                    <span class="stat-number">{{ $projects->count() }}+</span>
                    <span class="stat-label"><span data-i18n-en>Projects</span><span data-i18n-id>Proyek</span></span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $certifications->count() }}</span>
                    <span class="stat-label"><span data-i18n-en>Certifications</span><span data-i18n-id>Sertifikasi</span></span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $softSkills->count() + $hardSkills->count() }}</span>
                    <span class="stat-label"><span data-i18n-en>Skills</span><span data-i18n-id>Keahlian</span></span>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <span><span data-i18n-en>Scroll</span><span data-i18n-id>Gulir</span></span>
        <div class="scroll-line"></div>
    </div>
</section>

<section class="section" id="about">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><span data-i18n-en>01 — About Me</span><span data-i18n-id>01 — Tentang Saya</span></span>
            <h2 class="section-title"><span data-i18n-en>Professional Summary</span><span data-i18n-id>Ringkasan Profesional</span></h2>
        </div>
        <div class="glass-card about-card">
            @if($profile->about_photo && file_exists(public_path($profile->about_photo)))
            <div class="about-photo-col">
                <div class="lanyard-stage" id="lanyardStage">
                    <div class="lanyard-mount"></div>
                    <div class="lanyard-rope" id="lanyardRope">
                        <span class="lanyard-emblem">RAI</span>
                    </div>
                    <div class="lanyard-card-wrap" id="lanyardCardWrap">
                        <div class="lanyard-hook"></div>
                        <div class="lanyard-card-frame">
                            <div class="lanyard-card">
                                <img src="{{ asset($profile->about_photo) }}" alt="{{ $profile->full_name }}" class="about-photo" draggable="false">
                                <div class="lanyard-card-info">
                                    <span class="lanyard-card-name">{{ $profile->full_name }}</span>
                                    <span class="lanyard-card-role">
                                        <span data-i18n-en>Data Scientist (BNSP) · Information Systems</span>
                                        <span data-i18n-id>Data Scientist (BNSP) · Sistem Informasi</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="about-body">
                <p class="about-text">
                    <span data-i18n-en>{{ $profile->bio }}</span>
                    <span data-i18n-id>{{ $profile->bio_id ?? $profile->bio }}</span>
                </p>

                <div class="about-education">
                    <h3 class="card-title">
                        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                            <path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"/>
                        </svg>
                        <span data-i18n-en>Education</span>
                        <span data-i18n-id>Pendidikan</span>
                    </h3>
                    <div class="timeline">
                        @foreach($educations as $education)
                        <div class="timeline-item">
                            <div class="timeline-marker"></div>
                            <div class="timeline-content">
                                <h4>{{ $education->institution }}</h4>
                                <p class="timeline-meta">
                                    {{ $education->location }} · {{ $education->start_date }} —
                                    @if($education->end_date === 'Present')
                                        <span data-i18n-en>Present</span><span data-i18n-id>Sekarang</span>
                                    @else
                                        {{ $education->end_date }}
                                    @endif
                                </p>
                                @if($education->gpa)
                                    <span class="gpa-badge">
                                        <span data-i18n-en>GPA</span><span data-i18n-id>IPK</span>: {{ $education->gpa }}
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                @if(file_exists(public_path('files/revalina-aurellia-indrawan-resume.pdf')))
                <a href="{{ asset('files/revalina-aurellia-indrawan-resume.pdf') }}" download class="btn btn-sm about-cv-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                        <polyline points="7 10 12 15 17 10"/>
                        <line x1="12" y1="15" x2="12" y2="3"/>
                    </svg>
                    <span data-i18n-en>Download CV</span>
                    <span data-i18n-id>Unduh CV</span>
                </a>
                @endif
            </div>
        </div>
    </div>
</section>

<section class="section" id="experience">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><span data-i18n-en>02 — Work Experience</span><span data-i18n-id>02 — Pengalaman Kerja</span></span>
            <h2 class="section-title"><span data-i18n-en>Professional Journey</span><span data-i18n-id>Perjalanan Profesional</span></h2>
        </div>
        <div class="experience-grid">
            @foreach($workExperiences as $experience)
            @php $hasExpPhoto = $experience->photo && file_exists(public_path($experience->photo)); @endphp
            <div class="glass-card experience-card {{ $hasExpPhoto ? 'has-photo' : '' }}">
                @if($hasExpPhoto)
                <div class="experience-photo-wrap">
                    <img src="{{ asset($experience->photo) }}" alt="{{ $experience->company }}" class="experience-photo">
                    <span class="experience-type experience-type-overlay {{ $experience->type }}">
                        @if($experience->type === 'internship')
                            <span data-i18n-en>Internship</span><span data-i18n-id>Magang</span>
                        @else
                            <span data-i18n-en>Organizational</span><span data-i18n-id>Organisasi</span>
                        @endif
                    </span>
                </div>
                @endif
                <div class="experience-body">
                    <div class="experience-header">
                        <div>
                            @unless($hasExpPhoto)
                            <span class="experience-type {{ $experience->type }}">
                                @if($experience->type === 'internship')
                                    <span data-i18n-en>Internship</span><span data-i18n-id>Magang</span>
                                @else
                                    <span data-i18n-en>Organizational</span><span data-i18n-id>Organisasi</span>
                                @endif
                            </span>
                            @endunless
                            <h3 class="experience-position">
                                <span data-i18n-en>{{ $experience->position }}</span>
                                <span data-i18n-id>{{ $experience->position_id ?? $experience->position }}</span>
                            </h3>
                            <p class="experience-company">{{ $experience->company }}</p>
                        </div>
                        <span class="experience-date">
                            @if($experience->start_date === $experience->end_date)
                                {{ $experience->start_date }}
                            @else
                                {{ $experience->start_date }} —
                                @if($experience->end_date === 'Present')
                                    <span data-i18n-en>Present</span><span data-i18n-id>Sekarang</span>
                                @else
                                    {{ $experience->end_date }}
                                @endif
                            @endif
                        </span>
                    </div>
                    <ul class="experience-list">
                        @foreach($experience->responsibilities as $i => $item)
                        <li>
                            <span data-i18n-en>{{ $item }}</span>
                            <span data-i18n-id>{{ $experience->responsibilities_id[$i] ?? $item }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section" id="skills">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><span data-i18n-en>03 — Skills</span><span data-i18n-id>03 — Keahlian</span></span>
            <h2 class="section-title"><span data-i18n-en>Technical & Soft Skills</span><span data-i18n-id>Keahlian Teknis & Non-Teknis</span></h2>
        </div>
        <div class="skills-grid">
            <div class="glass-card skills-card">
                <h3 class="card-title">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    <span data-i18n-en>Soft Skills</span>
                    <span data-i18n-id>Keahlian Non-Teknis</span>
                </h3>
                <div class="skill-tags">
                    @foreach($softSkills as $skill)
                    <span class="skill-tag soft">
                        <span data-i18n-en>{{ $skill->name }}</span>
                        <span data-i18n-id>{{ $skill->name_id ?? $skill->name }}</span>
                    </span>
                    @endforeach
                </div>
            </div>
            <div class="glass-card skills-card skills-card-wide">
                <h3 class="card-title">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="16 18 22 12 16 6"/>
                        <polyline points="8 6 2 12 8 18"/>
                    </svg>
                    <span data-i18n-en>Hard Skills</span>
                    <span data-i18n-id>Keahlian Teknis</span>
                </h3>
                @php
                    $groupedHardSkills = $hardSkills->groupBy('group_name');
                @endphp
                <div class="hard-skills-groups">
                    @foreach($groupedHardSkills as $group => $skills)
                    <div class="skill-group">
                        <h4 class="skill-group-title">{{ $group }}</h4>
                        <div class="skill-tags">
                            @foreach($skills as $skill)
                            <span class="skill-tag hard">{{ $skill->name }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="glass-card skills-card">
                <h3 class="card-title">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="12" cy="12" r="10"/>
                        <line x1="2" y1="12" x2="22" y2="12"/>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/>
                    </svg>
                    <span data-i18n-en>Languages</span>
                    <span data-i18n-id>Bahasa</span>
                </h3>
                <div class="skill-tags">
                    @foreach($languages as $language)
                    <span class="skill-tag language">
                        <span data-i18n-en>{{ $language->name }}</span>
                        <span data-i18n-id>{{ $language->name_id ?? $language->name }}</span>
                    </span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="projects">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><span data-i18n-en>04 — Projects</span><span data-i18n-id>04 — Proyek</span></span>
            <h2 class="section-title"><span data-i18n-en>Featured Work</span><span data-i18n-id>Karya Unggulan</span></h2>
        </div>
        <div class="projects-grid">
            @foreach($projects as $index => $project)
            <div class="glass-card project-card" data-aos="fade-up">
                <div class="project-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                <h3 class="project-title">
                    <span data-i18n-en>{{ $project->title }}</span>
                    <span data-i18n-id>{{ $project->title_id ?? $project->title }}</span>
                </h3>
                @if($project->role)
                <p class="project-role">
                    <span data-i18n-en>{{ $project->role }}</span>
                    <span data-i18n-id>{{ $project->role_id ?? $project->role }}</span>
                </p>
                @endif
                <ul class="project-list">
                    @foreach(array_slice($project->description, 0, 3) as $i => $item)
                    <li>
                        <span data-i18n-en>{{ $item }}</span>
                        <span data-i18n-id>{{ $project->description_id[$i] ?? $item }}</span>
                    </li>
                    @endforeach
                </ul>
                @if($project->technologies)
                <div class="project-tech">
                    @foreach(explode(', ', $project->technologies) as $tech)
                    <span>{{ trim($tech) }}</span>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section" id="certifications">
    <div class="container">
        <div class="section-header">
            <span class="section-tag"><span data-i18n-en>05 — Certifications</span><span data-i18n-id>05 — Sertifikasi</span></span>
            <h2 class="section-title"><span data-i18n-en>Credentials & Achievements</span><span data-i18n-id>Kredensial & Pencapaian</span></h2>
        </div>
        @if($featuredCertification)
        @php $featuredHasFile = $featuredCertification->file_path; @endphp
        <{{ $featuredHasFile ? 'a' : 'div' }}
            class="featured-cert{{ $featuredHasFile ? ' featured-cert-link' : '' }}"
            @if($featuredHasFile)
                href="{{ asset($featuredCertification->file_path) }}" target="_blank" rel="noopener noreferrer"
            @endif
        >
            <div class="featured-cert-glow"></div>
            <div class="featured-cert-content">
                <div class="featured-cert-icon">
                    <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                        <path d="M12 15l-2 5 2-1 2 1-2-5z"/>
                        <circle cx="12" cy="8" r="6"/>
                    </svg>
                </div>
                <div>
                    <span class="featured-label">
                        <span data-i18n-en>Featured Certification</span>
                        <span data-i18n-id>Sertifikasi Unggulan</span>
                    </span>
                    <h3>{{ $featuredCertification->title }}</h3>
                    <p>{{ $featuredCertification->issuer }} · {{ $featuredCertification->year }}</p>
                    <p class="featured-desc">
                        <span data-i18n-en>{{ $featuredCertification->description }}</span>
                        <span data-i18n-id>{{ $featuredCertification->description_id ?? $featuredCertification->description }}</span>
                    </p>
                    @if($featuredHasFile)
                    <span class="featured-cert-cta">
                        <span data-i18n-en>View Certificate</span>
                        <span data-i18n-id>Lihat Sertifikat</span>
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M7 17L17 7M7 7h10v10"/>
                        </svg>
                    </span>
                    @endif
                </div>
            </div>
        </{{ $featuredHasFile ? 'a' : 'div' }}>
        @endif
        <div class="cert-grid">
            @foreach($certifications->where('is_featured', false) as $cert)
            @php $certHasFile = $cert->file_path; @endphp
            <{{ $certHasFile ? 'a' : 'div' }}
                class="glass-card cert-card{{ $certHasFile ? ' cert-card-link' : '' }}"
                @if($certHasFile)
                    href="{{ asset($cert->file_path) }}" target="_blank" rel="noopener noreferrer"
                @endif
            >
                <div class="cert-year">{{ $cert->year }}</div>
                <h4>{{ $cert->title }}</h4>
                <p>{{ $cert->issuer }}</p>
                @if($cert->description)
                <p class="cert-desc">
                    <span data-i18n-en>{{ $cert->description }}</span>
                    <span data-i18n-id>{{ $cert->description_id ?? $cert->description }}</span>
                </p>
                @endif
                @if($certHasFile)
                <span class="cert-card-cta">
                    <span data-i18n-en>View Certificate →</span>
                    <span data-i18n-id>Lihat Sertifikat →</span>
                </span>
                @endif
            </{{ $certHasFile ? 'a' : 'div' }}>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-contact" id="contact">
    <div class="container">
        <div class="contact-wrapper glass-card">
            <div class="section-header">
                <span class="section-tag"><span data-i18n-en>06 — Contact</span><span data-i18n-id>06 — Kontak</span></span>
                <h2 class="section-title"><span data-i18n-en>Let's Connect</span><span data-i18n-id>Mari Terhubung</span></h2>
                <p class="contact-subtitle">
                    <span data-i18n-en>Interested in collaborating or discussing opportunities? Feel free to reach out.</span>
                    <span data-i18n-id>Tertarik untuk berkolaborasi atau mendiskusikan peluang? Jangan ragu untuk menghubungi saya.</span>
                </p>
            </div>
            <div class="contact-grid">
                <a href="mailto:{{ $profile->email }}?subject={{ rawurlencode('Portfolio Inquiry - Let\'s Connect') }}" class="contact-item contact-item-email">
                    <div class="contact-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </div>
                    <div>
                        <span class="contact-label"><span data-i18n-en>Email</span><span data-i18n-id>Email</span></span>
                        <span class="contact-value">{{ $profile->email }}</span>
                    </div>
                </a>
                <a href="{{ $profile->github ?? 'https://github.com/Revlnrindrawan' }}" target="_blank" rel="noopener noreferrer" class="contact-item contact-item-github">
                    <div class="contact-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 .5C5.65.5.5 5.65.5 12c0 5.08 3.29 9.39 7.86 10.91.57.1.78-.25.78-.55 0-.27-.01-1.16-.02-2.11-3.2.7-3.88-1.36-3.88-1.36-.52-1.34-1.28-1.7-1.28-1.7-1.04-.72.08-.7.08-.7 1.15.08 1.76 1.19 1.76 1.19 1.03 1.75 2.68 1.25 3.34.96.1-.75.4-1.25.73-1.54-2.55-.29-5.24-1.28-5.24-5.69 0-1.26.45-2.29 1.19-3.09-.12-.29-.51-1.46.11-3.05 0 0 .97-.31 3.18 1.18a11.1 11.1 0 0 1 5.79 0c2.2-1.49 3.17-1.18 3.17-1.18.63 1.59.23 2.76.12 3.05.74.8 1.18 1.83 1.18 3.09 0 4.42-2.69 5.39-5.25 5.68.41.36.78 1.06.78 2.14 0 1.55-.01 2.79-.01 3.17 0 .3.2.66.79.55A10.52 10.52 0 0 0 23.5 12c0-6.35-5.15-11.5-11.5-11.5z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="contact-label">GitHub</span>
                        <span class="contact-value">Revlnrindrawan</span>
                    </div>
                </a>
                <a href="{{ $profile->linkedin }}" target="_blank" rel="noopener noreferrer" class="contact-item contact-item-linkedin">
                    <div class="contact-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 0 1-2.063-2.065 2.062 2.062 0 1 1 2.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="contact-label">LinkedIn</span>
                        <span class="contact-value">revalina-aurellia-indrawan</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
    <div class="container">
        <p>&copy; {{ date('Y') }} {{ $profile->full_name }}.</p>
    </div>
</footer>
@endsection
