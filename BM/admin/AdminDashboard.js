document.addEventListener('DOMContentLoaded', function () {
    // Auto-resize textarea
    const textarea = document.getElementById('announcementText');
    if (textarea) {
        textarea.addEventListener('input', function () {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    }

    // Submit announcement form
    const form = document.getElementById('announcementForm');
    if (form) {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            const title = document.getElementById('announcementTitle').value.trim();
            const content = document.getElementById('announcementText').value.trim();

            if (title && content) {
                fetch('post_announcement.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ title, content })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        location.reload();
                    } else {
                        alert('Error: ' + data.message);
                    }
                })
                .catch(err => {
                    alert('Could not post announcement. Try again.');
                    console.error(err);
                });

                form.reset();
                textarea.style.height = 'auto';
            }
        });
    }

    // Attach delete listeners
    const deleteButtons = document.querySelectorAll('.delete-btn');
    deleteButtons.forEach(button => {
        button.addEventListener('click', () => {
            const announcementId = button.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this announcement?')) {
                fetch('../php/delete_announcement.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({ id: announcementId })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === 'success') {
                        location.reload();
                    } else {
                        alert('Failed to delete: ' + data.message);
                    }
                })
                .catch(err => {
                    console.error("Delete error:", err);
                    alert("Error deleting announcement.");
                });
            }
        });
    });
});

// Toggle rows/items
function toggleList(button, elementId) {
    const container = document.getElementById(elementId);
    const allItems = Array.from(container.children).filter(el => el.nodeType === 1);

    const isHidden = allItems.slice(3).some(el => el.classList.contains('hidden'));
    allItems.slice(3).forEach(el => el.classList.toggle('hidden', !isHidden));

    button.textContent = isHidden ? 'Show Less' : 'Show More';
}
