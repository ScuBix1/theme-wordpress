'use strict';
function confirmationSubmit() {
  let form = document.getElementById('formulaire');
  if (form.name.value == 0 ) {
    alert('Le nom est obligatoire');
    form.name.value = '';
    form.name.classList.add('is-invalid');
    return false;
  }

  if (form.mail.value == 0) {
    alert('Le mail est obligatoire');
    form.mail.value = '';
    form.mail.classList.add('is-invalid');
    return false;
  }
  if (form.message.value == 0) {
    alert('Veuillez renseigner un commentaire');
    form.message.value = '';
    form.message.classList.add('is-invalid');
    return false;
  }
  form.submit();
}
