function openModal() {
    taskModal.classList.remove('hidden');
    taskModal.classList.add('flex');
  }
  function closeModal() {
    taskModal.classList.add('hidden');
    taskModal.classList.remove('flex');
  }

 
function openEditModal(id, title, description, subject, startDate, endDate) {
    document.getElementById('edit_id').value = id;
    document.getElementById('edit_title').value = title;
    document.getElementById('edit_description').value = description;
    document.getElementById('edit_subject').value = subject;
    document.getElementById('edit_start_date').value = startDate;
    document.getElementById('edit_end_date').value = endDate;

    document.getElementById('editModal').classList.remove('hidden');
    document.getElementById('editModal').classList.add('flex');
}


function closeEditModal() {
  editModal.classList.add('hidden');
  editModal.classList.remove('flex');
}


