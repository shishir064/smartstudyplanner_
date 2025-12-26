function openModal() {
    taskModal.classList.remove('hidden');
    taskModal.classList.add('flex');
  }
  function closeModal() {
    taskModal.classList.add('hidden');
    taskModal.classList.remove('flex');
  }

 
function openEditModal(id, title, description, category) {
  editModal.classList.remove('hidden');
  editModal.classList.add('flex');

  document.getElementById('edit_id').value = id;
  document.getElementById('edit_title').value = title;
  document.getElementById('edit_description').value = description;
  document.getElementById('edit_category').value = category;
}

function closeEditModal() {
  editModal.classList.add('hidden');
  editModal.classList.remove('flex');
}