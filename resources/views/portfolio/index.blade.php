@extends('layouts.app')

@section('content')
<nav class="navbar" id="navbar">
    <div class="container nav-container">
        <a href="#home" class="nav-logo">
            <span class="logo-bracket">&lt;</span>RAI<span class="logo-bracket">/&gt;</span>
        </a>
        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <ul class="nav-links" id="navLinks">
            <li><a href="#about">About</a></li>
            <li><a href="#experience">Experience</a></li>
            <li><a href="#skills">Skills</a></li>
            <li><a href="#projects">Projects</a></li>
            <li><a href="#certifications">Certifications</a></li>
            <li><a href="#contact" class="nav-cta">Contact</a></li>
        </ul>
    </div>
</nav>

<section class="hero" id="home">
    <div class="container hero-container">
        <div class="hero-content">
            <div class="hero-badge">
                <span class="pulse-dot"></span>
                Available for Opportunities
            </div>
            <h1 class="hero-name">
                {{ $profile->full_name }}
            </h1>
            <p class="hero-title">{{ $profile->title }}</p>
            <p class="hero-summary">{{ Str::limit($profile->bio, 180) }}</p>
            <div class="hero-actions">
                <a href="#contact" class="btn btn-primary">Get In Touch</a>
                <a href="#projects" class="btn btn-outline">View Projects</a>
            </div>
            @if($featuredCertification)
                @if($featuredCertification->file_path)
                <a href="{{ asset($featuredCertification->file_path) }}" target="_blank" rel="noopener noreferrer" class="bnsp-badge bnsp-badge-link">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 15l-2 5 2-1 2 1-2-5z"/>
                        <circle cx="12" cy="8" r="6"/>
                    </svg>
                    <span>BNSP Certified Data Scientist</span>
                    <svg class="bnsp-badge-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M7 17L17 7M7 7h10v10"/>
                    </svg>
                </a>
                @else
                <div class="bnsp-badge">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 15l-2 5 2-1 2 1-2-5z"/>
                        <circle cx="12" cy="8" r="6"/>
                    </svg>
                    <span>BNSP Certified Data Scientist</span>
                </div>
                @endif
            @endif
        </div>
        <div class="hero-visual">
            <div class="profile-frame">
                <div class="profile-ring"></div>
                <div class="profile-ring profile-ring-2"></div>
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
                    <span class="stat-label">Projects</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $certifications->count() }}</span>
                    <span class="stat-label">Certifications</span>
                </div>
                <div class="stat-card">
                    <span class="stat-number">{{ $softSkills->count() + $hardSkills->count() }}</span>
                    <span class="stat-label">Skills</span>
                </div>
            </div>
        </div>
    </div>
    <div class="scroll-indicator">
        <span>Scroll</span>
        <div class="scroll-line"></div>
    </div>
</section>

<section class="section" id="about">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">01 — About Me</span>
            <h2 class="section-title">Professional Summary</h2>
        </div>
        <div class="about-grid">
            <div class="glass-card about-card">
                <p class="about-text">{{ $profile->bio }}</p>
            </div>
            <div class="glass-card education-card">
                <h3 class="card-title">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                        <path d="M6 12v5c0 2 2 3 6 3s6-1 6-3v-5"/>
                    </svg>
                    Education
                </h3>
                <div class="timeline">
                    @foreach($educations as $education)
                    <div class="timeline-item">
                        <div class="timeline-marker"></div>
                        <div class="timeline-content">
                            <h4>{{ $education->institution }}</h4>
                            <p class="timeline-meta">{{ $education->location }} · {{ $education->start_date }} — {{ $education->end_date }}</p>
                            @if($education->gpa)
                                <span class="gpa-badge">GPA: {{ $education->gpa }}</span>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt" id="experience">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">02 — Work Experience</span>
            <h2 class="section-title">Professional Journey</h2>
        </div>
        <div class="experience-grid">
            @foreach($workExperiences as $experience)
            <div class="glass-card experience-card">
                <div class="experience-header">
                    <div>
                        <span class="experience-type {{ $experience->type }}">
                            {{ $experience->type === 'internship' ? 'Internship' : 'Organizational' }}
                        </span>
                        <h3 class="experience-position">{{ $experience->position }}</h3>
                        <p class="experience-company">{{ $experience->company }}</p>
                    </div>
                    <span class="experience-date">{{ $experience->start_date }} — {{ $experience->end_date }}</span>
                </div>
                <ul class="experience-list">
                    @foreach($experience->responsibilities as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section" id="skills">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">03 — Skills</span>
            <h2 class="section-title">Technical & Soft Skills</h2>
        </div>
        <div class="skills-grid">
            <div class="glass-card skills-card">
                <h3 class="card-title">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                        <circle cx="12" cy="7" r="4"/>
                    </svg>
                    Soft Skills
                </h3>
                <div class="skill-tags">
                    @foreach($softSkills as $skill)
                    <span class="skill-tag soft">{{ $skill->name }}</span>
                    @endforeach
                </div>
            </div>
            <div class="glass-card skills-card skills-card-wide">
                <h3 class="card-title">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <polyline points="16 18 22 12 16 6"/>
                        <polyline points="8 6 2 12 8 18"/>
                    </svg>
                    Hard Skills
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
                    Languages
                </h3>
                <div class="skill-tags">
                    @foreach($languages as $language)
                    <span class="skill-tag language">{{ $language->name }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt" id="projects">
    <div class="container">
        <div class="section-header">
            <span class="section-tag">04 — Projects</span>
            <h2 class="section-title">Featured Work</h2>
        </div>
        <div class="projects-grid">
            @foreach($projects as $index => $project)
            <div class="glass-card project-card" data-aos="fade-up">
                <div class="project-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</div>
                <h3 class="project-title">{{ $project->title }}</h3>
                @if($project->role)
                <p class="project-role">{{ $project->role }}</p>
                @endif
                <ul class="project-list">
                    @foreach(array_slice($project->description, 0, 3) as $item)
                    <li>{{ $item }}</li>
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
            <span class="section-tag">05 — Certifications</span>
            <h2 class="section-title">Credentials & Achievements</h2>
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
                    <span class="featured-label">Featured Certification</span>
                    <h3>{{ $featuredCertification->title }}</h3>
                    <p>{{ $featuredCertification->issuer }} · {{ $featuredCertification->year }}</p>
                    <p class="featured-desc">{{ $featuredCertification->description }}</p>
                    @if($featuredHasFile)
                    <span class="featured-cert-cta">
                        View Certificate
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
                <p class="cert-desc">{{ $cert->description }}</p>
                @endif
                @if($certHasFile)
                <span class="cert-card-cta">View Certificate →</span>
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
                <span class="section-tag">06 — Contact</span>
                <h2 class="section-title">Let's Connect</h2>
                <p class="contact-subtitle">Interested in collaborating or discussing opportunities? Feel free to reach out.</p>
            </div>
            @php
                $waDigits = ltrim(preg_replace('/\D/', '', $profile->phone), '0');
                $waNumber = '62' . $waDigits;
            @endphp
            <a href="https://wa.me/{{ $waNumber }}?text={{ urlencode('Hi Revalina, I saw your portfolio and would like to connect!') }}"
               target="_blank" rel="noopener noreferrer" class="contact-hero contact-hero-wa">
                <div class="contact-hero-icon">
                    <svg width="30" height="30" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/>
                        <path d="M12.004 2.003c-5.514 0-9.997 4.483-9.997 9.997 0 1.762.464 3.479 1.345 4.988L2 22l5.144-1.324a9.96 9.96 0 0 0 4.86 1.238h.004c5.514 0 9.997-4.483 9.997-9.997 0-2.67-1.04-5.182-2.929-7.071a9.935 9.935 0 0 0-7.072-2.843zm0 18.163h-.003a8.15 8.15 0 0 1-4.152-1.137l-.298-.177-3.053.786.815-2.977-.194-.306a8.156 8.156 0 0 1-1.25-4.356c0-4.509 3.669-8.178 8.178-8.178a8.13 8.13 0 0 1 5.786 2.396 8.13 8.13 0 0 1 2.393 5.788c0 4.508-3.668 8.176-8.222 8.176z"/>
                    </svg>
                </div>
                <div class="contact-hero-text">
                    <span class="contact-hero-title">Chat on WhatsApp</span>
                    <span class="contact-hero-sub">Fastest way to reach me — usually replies within a day</span>
                </div>
                <svg class="contact-hero-arrow" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M5 12h14M13 6l6 6-6 6"/>
                </svg>
            </a>
            <div class="contact-grid">
                <a href="mailto:{{ $profile->email }}" class="contact-item contact-item-email">
                    <div class="contact-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                    </div>
                    <div>
                        <span class="contact-label">Email</span>
                        <span class="contact-value">{{ $profile->email }}</span>
                    </div>
                </a>
                <a href="tel:{{ $profile->phone }}" class="contact-item contact-item-phone">
                    <div class="contact-icon">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/>
                        </svg>
                    </div>
                    <div>
                        <span class="contact-label">Phone</span>
                        <span class="contact-value">{{ $profile->phone }}</span>
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
        <p>&copy; {{ date('Y') }} {{ $profile->full_name }}. Built with Laravel.</p>
    </div>
</footer>
@endsection
