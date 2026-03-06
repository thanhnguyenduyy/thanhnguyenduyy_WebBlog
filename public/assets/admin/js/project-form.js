/**
 * Project form logic: Tech stack tag management
 */
let tags = [];

function initProjectForm(initialTags) {
    tags = initialTags || [];
    renderTags();
}

function renderTags() {
    const container = document.getElementById('tech_stack_container');
    const hiddenContainer = document.getElementById('hidden_tags');

    if (!container || !hiddenContainer) return;

    container.innerHTML = '';
    hiddenContainer.innerHTML = '';

    tags.forEach((tag, index) => {
        // UI Tag
        const tagEl = document.createElement('span');
        tagEl.className = 'inline-flex items-center px-2 py-1 rounded text-[10px] font-bold bg-zinc-100 dark:bg-zinc-800 text-zinc-700 dark:text-zinc-300 uppercase tracking-widest group';
        tagEl.innerHTML = `${tag} <button type="button" onclick="removeTag(${index})" class="ml-1 text-zinc-400 hover:text-red-500 transition-colors"><svg xmlns="http://www.w3.org/2000/svg" width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></svg></button>`;
        container.appendChild(tagEl);

        // Hidden Input
        const input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'tech_stack[]';
        input.value = tag;
        hiddenContainer.appendChild(input);
    });
}

function handleTechInput(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        const val = e.target.value.trim();
        if (val && !tags.includes(val)) {
            tags.push(val);
            e.target.value = '';
            renderTags();
        }
    }
}

function removeTag(index) {
    tags.splice(index, 1);
    renderTags();
}
