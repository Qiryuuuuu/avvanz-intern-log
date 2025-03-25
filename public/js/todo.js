function toggleElementVisibility(elementId) {
    const element = document.getElementById(elementId);
    if (element) {  
        element.style.display = element.style.display === 'none' ? 'block' : 'none';
    }
}

function toggleActions(taskId) {
    toggleElementVisibility("actions-" + taskId);
}

function toggleMenu(taskId) {
    toggleElementVisibility("move-" + taskId);
}