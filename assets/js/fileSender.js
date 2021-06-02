
document.querySelectorAll('.fileSender').forEach((ele) => {
    ele.addEventListener('change', function (event) {
        if (ele.files && ele.files.length > 0) {
            for (let i = 0; i < ele.files.length; i++) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    if (ele.hasAttribute('data-target')) {
                        let targetContainer = document.querySelector(ele.getAttribute('data-target'))
                        if (targetContainer) {
                            let id = Date.now()
                            targetContainer.innerHTML += templateFile(e.target.result, ele.files.item(i).name, id) + `<input type="hidden" class="documentosAnexos" name="documentos[]" value="${e.target.result}" id="input${id}" />`;
                            ajustaHeight(id)
                            document.querySelector('#temArquivos').value = "1"
                            if (i == ele.files.length - 1) {
                                ele.value = "";
                            }
                        }
                    }
                }
                reader.readAsDataURL(ele.files.item(i));
            }
        }
        
    })
})

function templateFile(src, filename, id) {
    var newTemplate = `
    <div id="thumb${id}" class="card col-12 col-lg-3 fileSenderCard" style="max-width: 100%;">
        <div class="thumbs" style="background-image:url('${src}');background-position:center center;background-size:cover;position:relative;">
            <a href="javascript:void(0)" onclick="removeFileSender('${id}')" class="btn btn-outline btn-danger" style="position:absolute;top:0px;right:0px;">
                <i class="fa fa-trash"></i>
            </a>
        </div>
        <div class="card-body">
            <div class="file-title">
                <h5 class="card-title" style="white-space: nowrap;overflow:hidden;text-overflow: ellipsis;width:100%;">${filename}</h5>
            </div>
        </div>
    </div>
    `;
    return newTemplate;
}

const vw = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0)

function ajustaHeight(id) {
    let thumbElement = document.querySelector('#thumb' + id)

    if (vw > 768) {
        thumbElement.style.width = "25%"
        thumbElement.querySelector("#thumb" + id + " .thumbs").style.height = "250px";
    } else {
        thumbElement.style.width = "80%"
        thumbElement.querySelector("#thumb" + id + " .thumbs").style.height = "20vh";
    }
}

function removeFileSender(id) {
    var thumb = document.querySelector("#thumb" + id)
    var input = document.querySelector("#input" + id)
    if (thumb && input) {
        thumb.remove()
        input.remove()
    }


    
    if (!document.querySelector(".documentosAnexos")) {
        document.querySelector('#temArquivos').value = "";
    }
}