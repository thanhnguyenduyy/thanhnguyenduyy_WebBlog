// =====================================================
// DEV&PHOTO Client App JavaScript
// =====================================================

// =====================================================
// Mobile Menu Toggle
// =====================================================

const mobileToggle = document.getElementById('mobileToggle');
const mobileMenu = document.getElementById('mobileMenu');

if (mobileToggle && mobileMenu) {
    const menuIcon = mobileToggle.querySelector('.menu-icon');
    const closeIcon = mobileToggle.querySelector('.close-icon');

    function toggleMobileMenu() {
        const isHidden = mobileMenu.classList.contains('hidden');
        mobileMenu.classList.toggle('hidden', !isHidden);
        if (menuIcon) menuIcon.classList.toggle('hidden', isHidden);
        if (closeIcon) closeIcon.classList.toggle('hidden', !isHidden);
    }

    mobileToggle.addEventListener('click', toggleMobileMenu);
}

// =====================================================
// Theme Toggle (Dark/Light Mode)
// =====================================================

const themeToggle = document.getElementById('themeToggle');
const mobileThemeToggle = document.getElementById('mobileThemeToggle');

function getPreferredTheme() {
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) return savedTheme;
    return window.matchMedia('(prefers-color-scheme: light)').matches ? 'light' : 'dark';
}

function setTheme(theme) {
    document.documentElement.setAttribute('data-theme', theme);
    localStorage.setItem('theme', theme);
}

function toggleTheme() {
    const currentTheme = document.documentElement.getAttribute('data-theme') || 'dark';
    const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
    setTheme(newTheme);
}

// Initialize theme on page load
(function initTheme() {
    const theme = getPreferredTheme();
    setTheme(theme);
})();

// Add event listeners
if (themeToggle) {
    themeToggle.addEventListener('click', toggleTheme);
}

if (mobileThemeToggle) {
    mobileThemeToggle.addEventListener('click', toggleTheme);
}

// Listen for system preference changes
window.matchMedia('(prefers-color-scheme: light)').addEventListener('change', (e) => {
    if (!localStorage.getItem('theme')) {
        setTheme(e.matches ? 'light' : 'dark');
    }
});

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
// Blog Rendering
// =====================================================

const blogGrid = document.getElementById('blogGrid');
const blogFilters = document.querySelectorAll('.blog-filter');
let blogFilter = 'ALL';

function renderBlogPosts() {
    if (!blogGrid || typeof BLOG_POSTS === 'undefined') return;

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

function setBlogFilter(filter) {
    blogFilter = filter;
    blogFilters.forEach(btn => {
        btn.classList.toggle('active', btn.dataset.filter === filter);
    });
    renderBlogPosts();
}

blogFilters.forEach(filter => {
    filter.addEventListener('click', () => setBlogFilter(filter.dataset.filter));
});

// =====================================================
// Gallery Rendering with Lightbox
// =====================================================

const galleryGrid = document.getElementById('galleryGrid');
const galleryFilters = document.querySelectorAll('.gallery-filter');
let galleryFilter = 'ALL';

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
    if (lightbox) {
        lightbox.classList.add('active');
        document.body.style.overflow = 'hidden';
    }
}

function closeLightbox() {
    if (lightbox) {
        lightbox.classList.remove('active');
        document.body.style.overflow = '';
    }
}

function updateLightboxContent() {
    const photo = filteredPhotosForLightbox[currentPhotoIndex];
    if (photo) {
        if (lightboxImage) {
            lightboxImage.src = photo.url;
            lightboxImage.alt = photo.title;
        }
        if (lightboxTitle) lightboxTitle.textContent = photo.title;
        if (lightboxCategory) lightboxCategory.textContent = photo.category;
        if (lightboxExif) lightboxExif.textContent = photo.exif;
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

if (lightboxClose) lightboxClose.addEventListener('click', closeLightbox);
if (lightboxNext) lightboxNext.addEventListener('click', nextPhoto);
if (lightboxPrev) lightboxPrev.addEventListener('click', prevPhoto);

if (lightbox) {
    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });
}

document.addEventListener('keydown', (e) => {
    if (!lightbox || !lightbox.classList.contains('active')) return;
    switch (e.key) {
        case 'Escape': closeLightbox(); break;
        case 'ArrowRight': nextPhoto(); break;
        case 'ArrowLeft': prevPhoto(); break;
    }
});

function renderGallery() {
    if (!galleryGrid || typeof PHOTOS === 'undefined') return;

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

    document.querySelectorAll('.gallery-item').forEach((item) => {
        item.addEventListener('click', () => {
            const index = parseInt(item.dataset.index);
            openLightbox(index, filteredPhotos);
        });
    });
}

function setGalleryFilter(filter) {
    galleryFilter = filter;
    galleryFilters.forEach(btn => {
        btn.classList.toggle('active', btn.dataset.filter === filter);
    });
    renderGallery();
}

galleryFilters.forEach(filter => {
    filter.addEventListener('click', () => setGalleryFilter(filter.dataset.filter));
});

// =====================================================
// Projects Rendering
// =====================================================

const projectsGrid = document.getElementById('projectsGrid');

function renderProjects() {
    if (!projectsGrid || typeof PROJECTS === 'undefined') return;

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

// =====================================================
// Resources Rendering
// =====================================================

const resourcesGrid = document.getElementById('resourcesGrid');

function renderResources() {
    if (!resourcesGrid || typeof RESOURCES === 'undefined') return;

    resourcesGrid.innerHTML = RESOURCES.map(res => `
        <div class="resource-card">
            <div class="resource-card-main">
                <div class="resource-card-icon">${icons[res.icon] || icons.layout}</div>
                <div>
                    <h4 class="resource-card-title">${res.title}</h4>
                    <p class="resource-card-items">${res.items}</p>
                </div>
            </div>
            <span class="resource-card-download">${icons.download}</span>
        </div>
    `).join('');
}

// =====================================================
// Contact Form
// =====================================================

const contactForm = document.getElementById('contactForm');

if (contactForm) {
    const formInputs = {
        name: contactForm.querySelector('input[name="name"]'),
        email: contactForm.querySelector('input[name="email"]'),
        message: contactForm.querySelector('textarea[name="message"]')
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

    function validateField(fieldName) {
        const input = formInputs[fieldName];
        if (!input) return true;
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
            if (!validateField(key)) isValid = false;
        });
        return isValid;
    }

    function showToast(message, type = 'success') {
        const existingToast = document.querySelector('.toast');
        if (existingToast) existingToast.remove();

        const toast = document.createElement('div');
        toast.className = `toast ${type}`;
        toast.textContent = message;
        document.body.appendChild(toast);

        setTimeout(() => toast.classList.add('show'), 10);
        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }

    // Add error elements and event listeners
    Object.keys(formInputs).forEach(key => {
        const input = formInputs[key];
        if (!input) return;
        const formGroup = input.closest('.form-group');

        if (!formGroup.querySelector('.form-error')) {
            formGroup.appendChild(createErrorElement(validationRules[key].message));
        }

        input.addEventListener('blur', () => validateField(key));
        input.addEventListener('input', () => {
            formGroup.classList.remove('error', 'success');
        });
    });

    contactForm.addEventListener('submit', async (e) => {
        e.preventDefault();

        if (!validateAllFields()) {
            showToast('Vui lòng điền đầy đủ thông tin!', 'error');
            return;
        }

        const submitBtn = contactForm.querySelector('.form-submit');
        if (submitBtn) {
            submitBtn.classList.add('loading');
            submitBtn.disabled = true;
        }

        try {
            const response = await fetch(contactForm.action, {
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
            contactForm.reset();
            Object.keys(formInputs).forEach(key => {
                const input = formInputs[key];
                if (input) {
                    input.closest('.form-group').classList.remove('success', 'error');
                }
            });
        } catch (error) {
            showToast('Có lỗi xảy ra, vui lòng thử lại sau!', 'error');
        } finally {
            if (submitBtn) {
                submitBtn.classList.remove('loading');
                submitBtn.disabled = false;
            }
        }
    });
}

// =====================================================
// Initialize
// =====================================================

function init() {
    renderBlogPosts();
    renderGallery();
    renderProjects();
    renderResources();
}

document.addEventListener('DOMContentLoaded', init);
if (document.readyState !== 'loading') {
    init();
}
