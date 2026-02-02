// =====================================================
// Data
// =====================================================

// Use injected data if available, otherwise fallback to mock data
const BLOG_POSTS = window.BLOG_POSTS || [
    {
        id: 1,
        title: "Modern Web Architecture: Beyond the Basics",
        date: "OCT 24, 2023",
        excerpt: "Exploring how to build scalable React applications using micro-frontends and serverless.",
        category: "IT",
        image: "https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80&w=1000",
        tags: ["#REACT", "#ARCHITECTURE", "#WEBDEV"]
    },
    {
        id: 2,
        title: "The Art of Black and White Street Photography",
        date: "NOV 05, 2023",
        excerpt: "Why stripping away color can reveal the true soul of a city and its people.",
        category: "PHOTOGRAPHY",
        image: "https://images.unsplash.com/photo-1514565131-fce0801e5785?auto=format&fit=crop&q=80&w=1000",
        tags: ["#STREET", "#MONOCHROME", "#TECHNIQUE"]
    },
    {
        id: 3,
        title: "Deploying High-Performance Static Sites",
        date: "DEC 12, 2023",
        excerpt: "A deep dive into Edge functions, CDN strategies, and caching for developers.",
        category: "IT",
        image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1000",
        tags: ["#DEPLOYMENT", "#PERFORMANCE", "#VERCEL"]
    },
    {
        id: 4,
        title: "Lựa chọn Hosting cho Developer năm 2024",
        date: "JAN 20, 2024",
        excerpt: "VPS, Serverless hay Shared Hosting? Đâu là lựa chọn tối ưu cho dự án của bạn...",
        category: "IT",
        image: "https://images.unsplash.com/photo-1558494949-ef010cbdcc51?auto=format&fit=crop&q=80&w=1000",
        tags: ["#HOSTING", "#BACKEND", "#DEVOPS"]
    },
    {
        id: 5,
        title: "Bố cục tối giản trong nhiếp ảnh kiến trúc",
        date: "FEB 12, 2024",
        excerpt: "Làm thế nào để 'less is more' thực sự hiệu quả trong khung hình kiến trúc hiện đại...",
        category: "PHOTOGRAPHY",
        image: "https://images.unsplash.com/photo-1493246507139-91e8bef99c1e?auto=format&fit=crop&q=80&w=1000",
        tags: ["#MINIMAL", "#COMPOSITION", "#ARCHITECTURE"]
    }
];

const PHOTOS = window.PHOTOS || [
    { id: 1, url: "https://images.unsplash.com/photo-1514565131-fce0801e5785?auto=format&fit=crop&q=80&w=1000", title: "Cyberpunk Tokyo", category: "STREET", exif: "ISO 800 · 24mm · f/4.0" },
    { id: 2, url: "https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&q=80&w=1000", title: "Urban Soul", category: "PORTRAIT", exif: "ISO 400 · 85mm · f/1.8" },
    { id: 3, url: "https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?auto=format&fit=crop&q=80&w=1000", title: "Alpine Serenity", category: "TRAVEL", exif: "ISO 100 · 35mm · f/8.0" },
    { id: 4, url: "https://images.unsplash.com/photo-1501785888041-af3ef285b470?auto=format&fit=crop&q=80&w=1000", title: "Desert Echoes", category: "TRAVEL", exif: "ISO 200 · 50mm · f/11" },
    { id: 5, url: "https://images.unsplash.com/photo-1533035353720-f1c6a75cd8ab?auto=format&fit=crop&q=80&w=1000", title: "Monolith", category: "MINIMAL", exif: "ISO 100 · 35mm · f/1.8" },
    { id: 6, url: "https://images.unsplash.com/photo-1476514525535-07fb3b4ae5f1?auto=format&fit=crop&q=80&w=1000", title: "Mist and Peaks", category: "TRAVEL", exif: "ISO 400 · 16mm · f/4.0" },
    { id: 7, url: "https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&q=80&w=1000", title: "Valley Gaze", category: "PORTRAIT", exif: "ISO 200 · 85mm · f/2.0" },
    { id: 8, url: "https://images.unsplash.com/photo-1449156001437-3a16213eb44b?auto=format&fit=crop&q=80&w=1000", title: "Geometric Lines", category: "MINIMAL", exif: "ISO 100 · 24mm · f/5.6" },
];

const PROJECTS = window.PROJECTS || [
    {
        id: 1,
        name: "Aperture Engine",
        tech: ["React", "Go", "WebAssembly"],
        desc: "A powerful browser-based RAW image processor using WebAssembly for near-native performance.",
        image: "https://images.unsplash.com/photo-1555066931-4365d14bab8c?auto=format&fit=crop&q=80&w=1000"
    },
    {
        id: 2,
        name: "DevFlow CMS",
        tech: ["Next.js", "PostgreSQL", "Tailwind"],
        desc: "A specialized content management system optimized for technical documentation and portfolio showcase.",
        image: "https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&q=80&w=1000"
    },
    {
        id: 3,
        name: "Focus Tracker",
        tech: ["TypeScript", "Node.js", "Redis"],
        desc: "A productivity tool designed for creative professionals to track deep work sessions and creative flow.",
        image: "https://images.unsplash.com/photo-1498050108023-c5249f4df085?auto=format&fit=crop&q=80&w=1000"
    }
];

const RESOURCES = window.RESOURCES || [
    { title: 'Lightroom Presets', items: '5 Pack - Urban Night', icon: 'camera' },
    { title: 'Next.js Template', items: 'Portfolio Minimalist', icon: 'layout' },
    { title: 'Checklist SEO', items: '2024 Edition', icon: 'book' },
    { title: 'Wallpaper Pack', items: 'High Resolution', icon: 'camera' },
    { title: 'Dev Environment setup', items: 'Config Files', icon: 'terminal' },
];

// =====================================================
// State
// =====================================================

let activePage = 'home';
let galleryFilter = 'ALL';
let blogFilter = 'ALL';

// =====================================================
// DOM Elements
// =====================================================

const mobileToggle = document.getElementById('mobileToggle');
const mobileMenu = document.getElementById('mobileMenu');
const menuIcon = mobileToggle.querySelector('.menu-icon');
const closeIcon = mobileToggle.querySelector('.close-icon');
const logo = document.getElementById('logo');
const navItems = document.querySelectorAll('.nav-item');
const mobileNavItems = document.querySelectorAll('.mobile-nav-item');
const blogGrid = document.getElementById('blogGrid');
const galleryGrid = document.getElementById('galleryGrid');
const projectsGrid = document.getElementById('projectsGrid');
const resourcesGrid = document.getElementById('resourcesGrid');
const blogFilters = document.querySelectorAll('.blog-filter');
const galleryFilters = document.querySelectorAll('.gallery-filter');
const contactForm = document.getElementById('contactForm');

// =====================================================
// Icon Templates
// =====================================================

const icons = {
    camera: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path>
        <circle cx="12" cy="13" r="4"></circle>
    </svg>`,
    layout: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect>
        <line x1="3" y1="9" x2="21" y2="9"></line>
        <line x1="9" y1="21" x2="9" y2="9"></line>
    </svg>`,
    book: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path>
        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path>
    </svg>`,
    terminal: `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <polyline points="4 17 10 11 4 5"></polyline>
        <line x1="12" y1="19" x2="20" y2="19"></line>
    </svg>`,
    download: `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
        <polyline points="7 10 12 15 17 10"></polyline>
        <line x1="12" y1="15" x2="12" y2="3"></line>
    </svg>`,
    externalLink: `<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
        <polyline points="15 3 21 3 21 9"></polyline>
        <line x1="10" y1="14" x2="21" y2="3"></line>
    </svg>`
};

// =====================================================
// Functions
// =====================================================

function setActivePage(page) {
    activePage = page;

    // Update nav items
    navItems.forEach(item => {
        item.classList.toggle('active', item.dataset.page === page);
    });
    mobileNavItems.forEach(item => {
        item.classList.toggle('active', item.dataset.page === page);
    });

    // Update pages
    document.querySelectorAll('.page').forEach(p => {
        p.classList.remove('active');
    });
    const targetPage = document.getElementById(`page-${page}`);
    if (targetPage) {
        targetPage.classList.add('active');
    }

    // Scroll to top
    window.scrollTo(0, 0);

    // Close mobile menu
    closeMobileMenu();
}

function closeMobileMenu() {
    mobileMenu.classList.add('hidden');
    menuIcon.classList.remove('hidden');
    closeIcon.classList.add('hidden');
}

function toggleMobileMenu() {
    const isHidden = mobileMenu.classList.contains('hidden');
    mobileMenu.classList.toggle('hidden', !isHidden);
    menuIcon.classList.toggle('hidden', isHidden);
    closeIcon.classList.toggle('hidden', !isHidden);
}

function renderBlogPosts() {
    const filteredPosts = blogFilter === 'ALL'
        ? BLOG_POSTS
        : BLOG_POSTS.filter(post => post.category === blogFilter);

    blogGrid.innerHTML = filteredPosts.map(post => `
        <article class="blog-card">
            <div class="blog-card-image">
                <img src="${post.image}" alt="${post.title}">
                <div class="blog-card-category">${post.category}</div>
            </div>
            <div class="blog-card-content">
                <span class="blog-card-date">${post.date}</span>
                <h3 class="blog-card-title">${post.title}</h3>
                <p class="blog-card-excerpt">${post.excerpt}</p>
            </div>
        </article>
    `).join('');
}

// Gallery rendering is handled by the new renderGallery function with lightbox support below

function renderProjects() {
    projectsGrid.innerHTML = PROJECTS.map(project => `
        <div class="project-card">
            <div class="project-card-image">
                <img src="${project.image}" alt="${project.name}">
                <div class="project-card-image-overlay"></div>
            </div>
            <div class="project-card-content">
                <div class="project-card-header">
                    <h3 class="project-card-title">${project.name}</h3>
                    <span class="project-card-link">${icons.externalLink}</span>
                </div>
                <p class="project-card-desc">${project.desc}</p>
                <div class="project-card-tech">
                    ${project.tech.map(t => `<span class="project-tech-tag">${t}</span>`).join('')}
                </div>
            </div>
        </div>
    `).join('');
}

function renderResources() {
    resourcesGrid.innerHTML = RESOURCES.map(res => `
        <div class="resource-card">
            <div class="resource-card-main">
                <div class="resource-card-icon">${icons[res.icon]}</div>
                <div>
                    <h4 class="resource-card-title">${res.title}</h4>
                    <p class="resource-card-items">${res.items}</p>
                </div>
            </div>
            <span class="resource-card-download">${icons.download}</span>
        </div>
    `).join('');
}

function setBlogFilter(filter) {
    blogFilter = filter;
    blogFilters.forEach(btn => {
        btn.classList.toggle('active', btn.dataset.filter === filter);
    });
    renderBlogPosts();
}

function setGalleryFilter(filter) {
    galleryFilter = filter;
    galleryFilters.forEach(btn => {
        btn.classList.toggle('active', btn.dataset.filter === filter);
    });
    renderGallery();
}

// =====================================================
// Event Listeners
// =====================================================

// Logo click
logo.addEventListener('click', () => setActivePage('home'));

// Mobile toggle
mobileToggle.addEventListener('click', toggleMobileMenu);

// Nav items
navItems.forEach(item => {
    item.addEventListener('click', () => setActivePage(item.dataset.page));
});

// Mobile nav items
mobileNavItems.forEach(item => {
    item.addEventListener('click', () => setActivePage(item.dataset.page));
});

// Home page buttons
document.querySelectorAll('.home-buttons .btn').forEach(btn => {
    btn.addEventListener('click', () => setActivePage(btn.dataset.page));
});

// Blog filters
blogFilters.forEach(filter => {
    filter.addEventListener('click', () => setBlogFilter(filter.dataset.filter));
});

// Gallery filters
galleryFilters.forEach(filter => {
    filter.addEventListener('click', () => setGalleryFilter(filter.dataset.filter));
});

// Contact form handling is now done by the form validation module below

// =====================================================
// Initialize
// =====================================================

function init() {
    renderBlogPosts();
    renderGallery();
    renderProjects();
    renderResources();
}

// Run on DOM ready
document.addEventListener('DOMContentLoaded', init);

// Run immediately if DOM already loaded
if (document.readyState !== 'loading') {
    init();
}

// =====================================================
// Lightbox Functionality
// =====================================================

const lightbox = document.getElementById('lightbox');
const lightboxImage = document.getElementById('lightboxImage');
const lightboxTitle = document.getElementById('lightboxTitle');
const lightboxCategory = document.getElementById('lightboxCategory');
const lightboxExif = document.getElementById('lightboxExif');
const lightboxClose = document.getElementById('lightboxClose');
const lightboxPrev = document.getElementById('lightboxPrev');
const lightboxNext = document.getElementById('lightboxNext');

let currentPhotoIndex = 0;
let filteredPhotosForLightbox = [];

function openLightbox(photoIndex, photos) {
    filteredPhotosForLightbox = photos;
    currentPhotoIndex = photoIndex;
    updateLightboxContent();
    lightbox.classList.add('active');
    document.body.style.overflow = 'hidden';
}

function closeLightbox() {
    lightbox.classList.remove('active');
    document.body.style.overflow = '';
}

function updateLightboxContent() {
    const photo = filteredPhotosForLightbox[currentPhotoIndex];
    if (photo) {
        lightboxImage.src = photo.url;
        lightboxImage.alt = photo.title;
        lightboxTitle.textContent = photo.title;
        lightboxCategory.textContent = photo.category;
        lightboxExif.textContent = photo.exif;
    }
}

function nextPhoto() {
    currentPhotoIndex = (currentPhotoIndex + 1) % filteredPhotosForLightbox.length;
    updateLightboxContent();
}

function prevPhoto() {
    currentPhotoIndex = (currentPhotoIndex - 1 + filteredPhotosForLightbox.length) % filteredPhotosForLightbox.length;
    updateLightboxContent();
}

// Lightbox event listeners
lightboxClose.addEventListener('click', closeLightbox);
lightboxNext.addEventListener('click', nextPhoto);
lightboxPrev.addEventListener('click', prevPhoto);

// Close on backdrop click
lightbox.addEventListener('click', (e) => {
    if (e.target === lightbox) {
        closeLightbox();
    }
});

// Keyboard navigation
document.addEventListener('keydown', (e) => {
    if (!lightbox.classList.contains('active')) return;

    switch (e.key) {
        case 'Escape':
            closeLightbox();
            break;
        case 'ArrowRight':
            nextPhoto();
            break;
        case 'ArrowLeft':
            prevPhoto();
            break;
    }
});

// Update renderGallery to add click handlers
function renderGallery() {
    const filteredPhotos = galleryFilter === 'ALL'
        ? PHOTOS
        : PHOTOS.filter(photo => photo.category === galleryFilter);

    galleryGrid.innerHTML = filteredPhotos.map((photo, index) => `
        <div class="gallery-item" data-index="${index}">
            <img src="${photo.url}" alt="${photo.title}">
            <div class="gallery-item-overlay">
                <h3 class="gallery-item-title">${photo.title}</h3>
                <span class="gallery-item-category">${photo.category}</span>
                <p class="gallery-item-exif">${photo.exif}</p>
            </div>
        </div>
    `).join('');

    // Add click handlers for lightbox
    document.querySelectorAll('.gallery-item').forEach((item) => {
        item.addEventListener('click', () => {
            const index = parseInt(item.dataset.index);
            openLightbox(index, filteredPhotos);
        });
    });
}

// =====================================================
// Form Validation
// =====================================================

const formInputs = {
    name: contactForm.querySelector('input[type="text"]'),
    email: contactForm.querySelector('input[type="email"]'),
    message: contactForm.querySelector('textarea')
};

const validationRules = {
    name: {
        validate: (value) => value.trim().length >= 2,
        message: 'Vui lòng nhập tên (ít nhất 2 ký tự)'
    },
    email: {
        validate: (value) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value),
        message: 'Vui lòng nhập email hợp lệ'
    },
    message: {
        validate: (value) => value.trim().length >= 10,
        message: 'Vui lòng nhập tin nhắn (ít nhất 10 ký tự)'
    }
};

function createErrorElement(message) {
    const error = document.createElement('span');
    error.className = 'form-error';
    error.textContent = message;
    return error;
}

function initFormValidation() {
    // Add error elements to each form group
    Object.keys(formInputs).forEach(key => {
        const input = formInputs[key];
        const formGroup = input.closest('.form-group');

        // Add error span if not exists
        if (!formGroup.querySelector('.form-error')) {
            formGroup.appendChild(createErrorElement(validationRules[key].message));
        }

        // Real-time validation on blur
        input.addEventListener('blur', () => validateField(key));

        // Remove error on input
        input.addEventListener('input', () => {
            const formGroup = input.closest('.form-group');
            formGroup.classList.remove('error');
            formGroup.classList.remove('success');
        });
    });
}

function validateField(fieldName) {
    const input = formInputs[fieldName];
    const formGroup = input.closest('.form-group');
    const rule = validationRules[fieldName];
    const isValid = rule.validate(input.value);

    formGroup.classList.remove('error', 'success');
    formGroup.classList.add(isValid ? 'success' : 'error');

    return isValid;
}

function validateAllFields() {
    let isValid = true;
    Object.keys(formInputs).forEach(key => {
        if (!validateField(key)) {
            isValid = false;
        }
    });
    return isValid;
}

function showToast(message, type = 'success') {
    // Remove existing toast
    const existingToast = document.querySelector('.toast');
    if (existingToast) {
        existingToast.remove();
    }

    // Create new toast
    const toast = document.createElement('div');
    toast.className = `toast ${type}`;
    toast.textContent = message;
    document.body.appendChild(toast);

    // Show toast
    setTimeout(() => toast.classList.add('show'), 10);

    // Hide and remove toast
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 3000);
}

// Override contact form submit handler
contactForm.removeEventListener('submit', () => { });
contactForm.addEventListener('submit', async (e) => {
    e.preventDefault();

    if (!validateAllFields()) {
        showToast('Vui lòng điền đầy đủ thông tin!', 'error');
        return;
    }

    const submitBtn = contactForm.querySelector('.form-submit');
    submitBtn.classList.add('loading');
    submitBtn.disabled = true;

    // Simulate API call or real call to Laravel
    try {
        const response = await fetch('{{ route('contact.send') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                name: formInputs.name.value,
                email: formInputs.email.value,
                message: formInputs.message.value
            })
        });
        const data = await response.json();
        showToast(data.message, 'success');
    } catch (error) {
        showToast('Có lỗi xảy ra, vui lòng thử lại sau!', 'error');
    }
});

// Initialize form validation on page load
document.addEventListener('DOMContentLoaded', initFormValidation);
if (document.readyState !== 'loading') {
    initFormValidation();
}
