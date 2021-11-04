/* ===== SHOW MODAL ===== */
const mostrarModal = (openButton, modalContent) => {
    const openBtn = document.getElementById(openButton),
    modalContainer = document.getElementById(modalContent)
    if(openBtn && modalContainer){
        openBtn.addEventListener('click', ()=>{
            modalContainer.classList.add('show-preview')
            // console.log(openBtn.getAttribute('data-img'))
            document.querySelector('.img__modal').setAttribute('src',"../files/upload/"+openBtn.getAttribute('data-img'))
        })
    }

}
mostrarModal('abrir','preview-modal')
/* ===== CLOSE MODAL ===== */
const removeModal = (openButton, modalContent) => {
    const openBtn = document.getElementById(openButton),
    modalContainer = document.getElementById(modalContent)
    if(openBtn && modalContainer){
        openBtn.addEventListener('click', ()=>{
            modalContainer.classList.remove('show-preview')
        })
    }

}
removeModal('close-button','preview-modal')


/* ======== Carregar todos itens =========== */
const itens = document.querySelectorAll('.item')
itens.forEach(e => {
    mostrarModal(e.getAttribute('id'),'preview-modal');  
})