const name = document.getElementById('user')
const password = document.getElementById('password')
const form = document.getElementById('form_registro')


form.addEventListener('submit', (e) => {
    let messages = []
    if (name.value === '' || name.value == null) {
        messages.push('Escribe el nombre')
    }

    if (messages.length > 0) {
        e.preventDefault()
        errorElement.innerText = messages.join(',')
    }

})