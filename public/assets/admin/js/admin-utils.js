/**
 * Utility to update a slug input based on a title string.
 * @param {string} title 
 * @param {string} targetId 
 */
function updateSlug(title, targetId) {
    const slug = title.toLowerCase()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_]+/g, '-')
        .replace(/^-+|-+$/g, '');
    const target = document.getElementById(targetId);
    if (target) {
        target.value = slug;
    }
}
