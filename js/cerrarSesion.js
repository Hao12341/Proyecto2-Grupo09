
async function logout() {
    const respuesta = await fetch('../api/sesion/', {
        method: 'delete'
    });
    if(respuesta.ok) {
        location.href = '../';
    }
}