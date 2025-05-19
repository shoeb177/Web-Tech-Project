document.querySelectorAll('.tab').forEach(tab => {
    tab.addEventListener('click', () => {
        document.querySelectorAll('.tab').forEach(t => t.classList.remove('active'));
        document.querySelectorAll('.tab-content').forEach(c => c.classList.remove('active'));

        tab.classList.add('active');
        const tabId = tab.getAttribute('data-tab');
        const target = document.getElementById(`${tabId}-tab`);
        if (target) target.classList.add('active');
    });
});



const editForm = document.getElementById('edit-profile-form');
const cancelEdit = document.getElementById('cancel-edit');

if (editForm) {
    editForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const firstName = document.getElementById('edit-first-name').value.trim();
        const lastName = document.getElementById('edit-last-name').value.trim();
        const email = document.getElementById('edit-email').value.trim();

        if (!firstName || !lastName || !email) {
            alert('Please fill in all required fields');
            return;
        }

        if (!validateEmail(email)) {
            alert('Please enter a valid email address');
            return;
        }

        document.getElementById('view-first-name').textContent = firstName;
        document.getElementById('view-last-name').textContent = lastName;
        document.getElementById('view-email').textContent = email;
        document.getElementById('view-phone').textContent = document.getElementById('edit-phone').value;
        document.getElementById('view-dob').textContent = formatDate(document.getElementById('edit-dob').value);
        document.getElementById('view-address').textContent = document.getElementById('edit-address').value;

        document.querySelector('.tab[data-tab="view"]').click();
        alert('Profile updated successfully!');
    });
}

if (cancelEdit) {
    cancelEdit.addEventListener('click', function () {
        document.querySelector('.tab[data-tab="view"]').click();
    });
}

const passwordForm = document.getElementById('reset-password-form');
const passwordMessage = document.getElementById('password-message');

if (passwordForm) {
    passwordForm.addEventListener('submit', function (e) {
        e.preventDefault();

        const currentPassword = document.getElementById('current-password').value;
        const newPassword = document.getElementById('new-password').value;
        const confirmPassword = document.getElementById('confirm-password').value;

        if (newPassword !== confirmPassword) {
            passwordMessage.textContent = 'New passwords do not match';
            passwordMessage.style.color = 'red';
            return;
        }

        if (newPassword.length < 8) {
            passwordMessage.textContent = 'Password must be at least 8 characters';
            passwordMessage.style.color = 'red';
            return;
        }

        passwordMessage.textContent = 'Password changed successfully!';
        passwordMessage.style.color = 'green';
        passwordForm.reset();

        setTimeout(() => {
            passwordMessage.textContent = '';
        }, 3000);
    });
}



if (cancelCrop) {
    cancelCrop.addEventListener('click', () => {
        avatarModal.style.display = 'none';
    });
}



function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function formatDate(dateString) {
    if (!dateString) return '';
    const options = { year: 'numeric', month: 'long', day: 'numeric' };
    return new Date(dateString).toLocaleDateString(undefined, options);
}