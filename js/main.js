let  statusCamera = 0
let photoBase64 = "";

/* ====== Selecionar Foto ==== */
function openWindowFile(params) { 
    document.getElementById('file').click()
    hideAlltab("img-loaded")
}


/* ====== Gerenciando o botão camera ======== */
function getphoto(){
    if (statusCamera) {
        
        const videoElement = document.querySelector('.camera-foto')
        
        let canvas = document.querySelector('.img-loaded-end')
        let file = document.querySelector('#file')
        
        
        canvas.getContext('2d').drawImage(videoElement, 0, 0, 320, 160)
        let dados = canvas.toDataURL('image/png')
        //console.log(dados)
        photoBase64 =  dados
        //file.value = dados
        hideAlltab('img-loaded-end')
        statusCamera = 0
    }else{
        hideAlltab('camera-foto')
        statusCamera = 1
        startVideoFromCamera()
    }
}

/* ======== Pegando Video da camera ========*/
function startVideoFromCamera() {
    hideAlltab("camera-foto")
    navigator.mediaDevices.getUserMedia({video:true}).then( stream =>{
        const videoElement = document.querySelector('.camera-foto')
        videoElement.srcObject = stream
    }).catch(error =>{
        console.log(error)
    })
    
}
/* ====== Ficheiro Carregado ==== */
function readPhoto(pa) {  
    visualizacaoImagens(pa.target)
}
/* ====== Ficheiro Carregado ==== */
let visualizacaoImagens = (input) =>{    
    if (input.files) {
        let quantImagens = input.files.length;

        for (i = 0; i < quantImagens; i++) {
            let reader = new FileReader();

            reader.onload = function(event) {
                document.getElementById('img-loaded').src = event.target.result
                photoBase64 = event.target.result
            }

            reader.readAsDataURL(input.files[i]);
        }
    }
}

/* ========== Enviar photo ===========*/
function sendPhoto(){ 
    if (photoBase64 == "") {
        callModal("Selecione uma imagem ou fotografe");
    }else{
        let request = new XMLHttpRequest()
        request.open('POST', 'php/action/save_photo.php',true)
        request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8')
        request.onloadend = (e)=>{
            hideAlltab('no')
            const response = JSON.parse(request.responseText)
            callModal(response.message); 
            photoBase64 = ""
        }
        request.onerror = (error) =>{
            console.log(error)
        } 
        const sendBase64Photo = photoBase64.replaceAll(" ","")
        const formatoType = photoBase64.split(',')
        const formatoResorce = formatoType[0].split(';')
        const formato = formatoResorce[0].split('/')
        //console.log(formato[0]) 
        //console.log(sendBase64Photo)
        
        //request.send('base_img='+sendBase64Photo+'&title='+sendTitlePhoto+'&action=add')
        request.send('base_img='+sendBase64Photo+'&action=add&type='+formato[1])
    }
}


/* ========== Hide All Menu ==========*/
function hideAlltab(active) {
    if(active == "no"){
        document.querySelector('.camera-foto').classList.remove('active')
        document.querySelector('.img-loaded').classList.remove('active')
        document.getElementById('canvas').classList.remove('active')
    }
    else{    
        document.querySelector('.camera-foto').classList.remove('active')
        document.querySelector('.img-loaded').classList.remove('active')
        document.getElementById('canvas').classList.remove('active')
        document.querySelector('.'+active).classList.add('active')
    }
}


document.getElementById('capture-file').addEventListener('click',getphoto)
document.getElementById('save-photo').addEventListener('click',sendPhoto)
document.getElementById('file').addEventListener('change',readPhoto)
document.querySelector('.select-file').addEventListener('click', openWindowFile)


function callModal(mensagem){
    document.querySelector('.display p').innerHTML = mensagem
    document.querySelector('.mensagem__modal').classList.remove('no-active')
}

function hideModal(){
    document.querySelector('.mensagem__modal').classList.add('no-active')
}

document.querySelector('.ok-button').addEventListener('click', hideModal)