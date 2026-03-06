/**
 * Blog form logic: EasyMDE and AI generation
 */
function initBlogForm(options) {
    // Initialize EasyMDE
    const easyMDE = new EasyMDE({
        element: document.getElementById('markdown-editor'),
        spellChecker: false,
        autosave: {
            enabled: true,
            uniqueId: options.autosaveId,
            delay: 1000,
        },
        status: ["chars", "lines", "words"],
        showIcons: ["code", "table"],
    });

    return easyMDE;
}

async function generateWithAI(route, csrfToken) {
    const title = document.getElementById('post-title').value;
    const btn = document.getElementById('ai-gen-btn');
    const btnText = document.getElementById('ai-btn-text');
    const excerptField = document.getElementById('post-excerpt');

    if (!title) {
        alert("Please enter a title first");
        return;
    }

    btn.disabled = true;
    btnText.textContent = 'GENERATING...';

    try {
        const response = await fetch(route, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ title })
        });
        const data = await response.json();
        excerptField.value = data.suggestion;
    } catch (error) {
        console.error('AI generation failed:', error);
    } finally {
        btn.disabled = false;
        btnText.textContent = 'GENERATE WITH AI';
    }
}
