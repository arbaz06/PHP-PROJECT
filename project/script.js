function openModal() {
    document.getElementById('addEmployeeModal').style.display = 'block';
}

function closeModal() {
    document.getElementById('addEmployeeModal').style.display = 'none';
}

// Close the modal if the user clicks outside the modal content
window.onclick = function (event) {
    var modal = document.getElementById('addEmployeeModal');
    if (event.target === modal) {
        closeModal();
    }
};
