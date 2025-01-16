(function(window){
	window.htmlentities = {
		encode : function(str) {
			const entities = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#39;'
            };
            return str.replace(/[&<>"']/g, match => entities[match]);
		},
		decode : function(str) {
			const entities = {
                '&amp;': '&',
                '&lt;': '<',
                '&gt;': '>',
                '&quot;': '"',
                '&#39;': "'"
            };
            return str.replace(/&amp;|&lt;|&gt;|&quot;|&#39;/g, match => entities[match]);
		}
	};
})(window);


/*
  Textarea
*/

let observe;
if (window.attachEvent) {
    observe = function (element, event, handler) {
        element.attachEvent('on'+event, handler);
    };
}else {
    observe = function (element, event, handler) {
        element.addEventListener(event, handler, false);
    };
}

function autoheight (x) {
    let text = document.getElementById(x);
    function resize () {
        text.style.height = 'auto';
        text.style.height = text.scrollHeight+'px';
    }
    /* 0-timeout to get the already changed text */
    function delayedResize () {
        window.setTimeout(resize, 0);
    }
    observe(text, 'change',  resize);
    observe(text, 'cut',     delayedResize);
    observe(text, 'paste',   delayedResize);
    observe(text, 'drop',    delayedResize);
    observe(text, 'keydown', delayedResize);
    resize();
}

let textarea = document.querySelectorAll('textarea');
if(textarea){
    for (let i=0; i < textarea.length; i++) {

        if(textarea[i].dataset.tipe == "editor"){
            
            // Editor Text
            textarea[i].parentElement.children[1].setAttribute("style","display: none;");
            let div = document.createElement("div");
            div.setAttribute("class","form-control editor");
            div.innerHTML = `
                <button type="button" class="button-opsi`+i+`" data-command="bold" title="Teks Bold">B</button>
                <button type="button" class="button-opsi`+i+`" data-command="italic" title="Teks Italic">/</button>
                <button type="button" class="button-opsi`+i+`" data-command="underline" title="Teks Underline">U</button>
                <button type="button" class="button-opsi`+i+`" data-command="insertOrderedList" title="List Order"><i class="las la-list-ol"></i></button>
                <button type="button" class="button-opsi`+i+`" data-command="insertUnorderedList" title="Unlist Order"><i class="las la-list-ul"></i></button>
                <button type="button" class="button-opsi`+i+`" data-command="justifyLeft" title="Teks Rata Kiri"><i class="las la-align-left"></i></button>
                <button type="button" class="button-opsi`+i+`" data-command="justifyCenter" title="Teks Center"><i class="las la-align-center"></i></button>
                <button type="button" class="button-opsi`+i+`" data-command="justifyRight" title="Teks Rata Kanan"><i class="las la-align-right"></i></button>
                <button type="button" class="button-opsi`+i+`" data-command="justifyFull" title="Teks Rata Kanan Kiri"><i class="las la-align-justify"></i></button>
                <button type="button" class="button-opsi`+i+`" data-command="createLink" title="Buat Link"><i class="las la-link"></i></button>
                <button type="button" class="button-opsi`+i+`" data-command="embedLinkMore" title="Tambahkan Berita Lain"><i class="las la-paperclip"></i></button>
                <button type="button" class="button-opsi`+i+`" data-command="embedYoutube" title="Tambahkan Youtube"><i class="lab la-youtube"></i></button>
                <button type="button" class="button-opsi`+i+`" data-command="embedPhoto" title="Tambahkan Photo"><i class="las la-image"></i></button>
                <div id="editor`+i+`" contenteditable="true" style="width: 100%; min-height: 80px; margin-top: 15px;"></div>
            `;
            textarea[i].parentElement.append(div);
            let edt = el("#editor"+i);

            let btnOpsi = document.querySelectorAll(".button-opsi"+i); 
            for(let a=0; a<btnOpsi.length; a++){
                btnOpsi[a].addEventListener("click",()=>{
                    let cmd = btnOpsi[a].dataset.command;
                    if(cmd == "createLink"){
                        let url = prompt("Masukan link :", "http://");
                        document.execCommand(cmd, false, url);
                        textarea[i].value =  edt.innerHTML;
                    }else if(cmd == "insertOrderedList"){
                        const selection = window.getSelection().toString();
                        const olTag = `<ul style='list-style-type:decimal'><li>${selection}</li></ul>`;
                        document.execCommand("insertHTML", false, olTag);
                        textarea[i].value =  edt.innerHTML;
                    }else if(cmd == "insertUnorderedList"){
                        const selection = window.getSelection().toString();
                        const ulTag = `<ul style='list-style-type:circle'><li>${selection}</li></ul>`;
                        document.execCommand("insertHTML", false, ulTag);
                        textarea[i].value =  edt.innerHTML;
                    }else if(cmd == "embedLinkMore"){
                        let url = prompt("Masukan deskripsi konten terkait:", "");
                        let embed = "";
                        if(url != "") {
                            embed =`<taglineMore>
                                <ul>
                                    <li><a href='javascript:void(0)'>Berita 1</a></li>
                                    <li><a href='javascript:void(0)'>Berita 2</a></li>
                                </ul>
                            </taglineMore>`;
                        }
                        document.execCommand("insertHTML", false, embed);
                        textarea[i].value =  edt.innerHTML;
                    }else if(cmd == "embedYoutube"){
                        let url = prompt("Masukan link youtube:", "http://");
                        let embed = "";
                        if(url != "") {
                            url = url.split("v=")[1].split("&")[0];
                            embed =`<iframe width="560" height="315" src="https://www.youtube.com/embed/${url}" title="YouTube video player" frameborder="0" allowfullscreen></iframe>`;
                        }
                        document.execCommand("insertHTML", false, embed);
                        textarea[i].value =  edt.innerHTML;
                    }else if(cmd == "embedPhoto"){
                        let url = prompt("Masukan url photo:", "http://");
                        let embed = "";
                        if(url != "") {
                            embed =`<img src="${url}" width: 100%;>`;
                        }
                        document.execCommand("insertHTML", false, embed);
                        textarea[i].value =  edt.innerHTML;
                    }else{
                        document.execCommand(cmd, false, null);
                        textarea[i].value =  edt.innerHTML;
                    }
                });
            }

            edt.addEventListener("keyup", ()=>{
                textarea[i].value =  edt.innerHTML;
            });

            if(textarea[i].value.split("").length > 0){
                edt.innerHTML = htmlentities.decode(textarea[i].value);
            }

        }else if(textarea[i].dataset.tipe == "editor-only"){
            
            // Editor Text
            textarea[i].parentElement.children[1].setAttribute("style","display: none;");
            let div = document.createElement("div");
            div.setAttribute("class","form-control editor");
            div.innerHTML = `
                <div id="editor`+i+`" contenteditable="true" style="width: 100%; min-height: 40px;"></div>
            `;
            textarea[i].parentElement.append(div);
            let edt = el("#editor"+i);

            edt.addEventListener("keyup", ()=>{
                textarea[i].value =  edt.innerHTML;
            });

            if(textarea[i].value.split("").length > 0){
                edt.innerHTML = htmlentities.decode(textarea[i].value);
            }

        }else{
            textarea[i].setAttribute("rows", "3");
            autoheight(textarea[i].id);
        }

    }

    function resetTextarea() {
        for (let i=0; i < textarea.length; i++) {

            if(textarea[i].dataset.tipe == "editor"){
                textarea[i].parentElement.children[2].children[textarea[i].parentElement.children[2].children.length-1].innerHTML = "";
            }else if(textarea[i].dataset.tipe == "editor-only"){
                textarea[i].parentElement.children[2].children[textarea[i].parentElement.children[2].children.length-1].innerHTML = "";
            }else{
                textarea[i].value = "";
            }
        }
    }

}


/*
    Input Tipe
*/

let input = document.querySelectorAll('input');
if(input){
    for (let i=0; i < input.length; i++) {
        
        if(input[i].dataset.tipe == "password"){
            let icon = document.createElement("i");
            icon.setAttribute("id","ps-"+input[i].id);
            icon.setAttribute("class","las la-eye");
            if(input[i].parentElement.children[0].nodeName == "LABEL") {
                icon.setAttribute("style","position: absolute; right: 15px; top: 40px; font-size: 16pt; cursor: pointer;");
            }else{
                icon.setAttribute("style","position: absolute; right: 15px; top: 13px; font-size: 16pt; cursor: pointer;");
            }
            input[i].parentElement.prepend(icon);
            input[i].setAttribute("type","password");
            input[i].setAttribute("style","padding-right: 50px;");

            icon.addEventListener("click", ()=>{
                if(icon.classList.contains("la-eye")){
                    icon.classList.remove("la-eye");
                    icon.classList.add("la-eye-slash");
                    input[i].setAttribute("type","text");
                }else{
                    icon.classList.remove("la-eye-slash");
                    icon.classList.add("la-eye");
                    input[i].setAttribute("type","password");
                }
            });
        }

        if(input[i].dataset.tipe == "email"){
            let icon = document.createElement("i");
            icon.setAttribute("id","em-"+input[i].id);
            icon.setAttribute("class","las la-envelope");
            if(input[i].parentElement.children[0].nodeName == "LABEL") {
                icon.setAttribute("style","position: absolute; right: 15px; top: 40px; font-size: 16pt; cursor: pointer;");
            }else{
                icon.setAttribute("style","position: absolute; right: 15px; top: 13px; font-size: 16pt; cursor: pointer;");
            }
            input[i].parentElement.prepend(icon);
            input[i].setAttribute("type","email");
            input[i].setAttribute("style","padding-right: 50px;");

            icon.addEventListener("click", ()=>{
                window.location.href="mailto:"+input[i].value;
            });
        }


        if(input[i].dataset.tipe == "tag"){
            input[i].parentElement.children[1].setAttribute("style", "display: none;");
            let div = document.createElement("div");
            div.setAttribute("class","form-control");
            div.setAttribute("style","padding: 10px;");
            div.innerHTML = `<div id="showTag`+i+`"></div><input style='float: left; background: none; font-size: 12pt; padding: 5px;' placeholder="Ketik lalu enter" id="tagAdd`+i+`"><div style='clear: both;'></div>`;
            input[i].parentElement.append(div);

            let dataArrayTag = [];
            dataArrayTag["#showTag"+i] = [];

            if(input[i].value != ""){
                for(let s=0; s<input[i].value.split(",").length; s++){
                    let valueTag = input[i].value.split(",")[s];
                    let showTag = el("#showTag"+i);
                    let span = document.createElement("span");
                    span.setAttribute("style","position: relative; float: left; gap: 5px; margin:3px; padding: 5px 25px 5px 5px; border-radius: 4px; background: #e3e7ee;");
                    if(valueTag != "" && !dataArrayTag["#showTag"+i].includes(valueTag)){
                        span.innerHTML = valueTag + "<button type='button' style='position: absolute; right: 5px; display: flex; justify-content: center; align-items: center; width: 15px; height: 15px; top: 7px;' class='btnCloseTag'><i class='las la-times'></i></button>";
                        showTag.append(span);
                        dataArrayTag["#showTag"+i].push(valueTag);
                        let btnCloseTag = document.querySelectorAll(".btnCloseTag");
                        if(btnCloseTag){
                            for(let m=0; m<btnCloseTag.length; m++){
                                btnCloseTag[m].addEventListener("click", (e)=>{
                                    e.preventDefault();
                                    btnCloseTag[m].parentElement.remove();
                                    let strUntukDihapus = btnCloseTag[m].parentElement.innerText;
                                    let index = dataArrayTag["#showTag"+i].indexOf(strUntukDihapus);
                                    if (index !== -1) {
                                        dataArrayTag["#showTag"+i].splice(index, 1); 
                                        input[i].value = dataArrayTag["#showTag"+i];
                                    }
                                });
                            }
                        }
                    }
                }
                dataArrayTag["#showTag"+i] = input[i].value.split(",");

                el("#tagAdd"+i).addEventListener("keydown", (e)=> {
                    if (e.key === "Enter") {
                        e.preventDefault();
                        let valueTag = e.target.value;
                        let showTag = el("#showTag"+i);
                        let span = document.createElement("span");
                        span.setAttribute("style","position: relative; float: left; gap: 5px; margin:3px; padding: 5px 25px 5px 5px; border-radius: 4px; background: #e3e7ee;");
                        if(valueTag != "" && !dataArrayTag["#showTag"+i].includes(valueTag)){
                            span.innerHTML = valueTag + "<button type='button' style='position: absolute; right: 5px; display: flex; justify-content: center; align-items: center; width: 15px; height: 15px; top: 7px;' class='btnCloseTag'><i class='las la-times'></i></button>";
                            showTag.append(span);
                            e.target.value = "";
                            e.target.focus();
                            dataArrayTag["#showTag"+i].push(valueTag);
                            let btnCloseTag = document.querySelectorAll(".btnCloseTag");
                            if(btnCloseTag){
                                for(let m=0; m<btnCloseTag.length; m++){
                                    btnCloseTag[m].addEventListener("click", (e)=>{
                                        e.preventDefault();
                                        btnCloseTag[m].parentElement.remove();
                                        let strUntukDihapus = btnCloseTag[m].parentElement.innerText;
                                        let index = dataArrayTag["#showTag"+i].indexOf(strUntukDihapus);
                                        if (index !== -1) {
                                            dataArrayTag["#showTag"+i].splice(index, 1); 
                                            input[i].value = dataArrayTag["#showTag"+i];
                                        }
                                    });
                                }
                            }
                        }
                        input[i].value = dataArrayTag["#showTag"+i];
                        console.log(dataArrayTag["#showTag"+i]);
                        console.log(input[i].value);
                    }
    
                    if (e.key === "Backspace") {
                        if(e.target.value.length == 0){
                            dataArrayTag["#showTag"+i].pop();
                            let showTag = el("#showTag"+i);
                            if(showTag.children.length != 0){
                                showTag.children[showTag.children.length -1].remove();
                                input[i].value = dataArrayTag["#showTag"+i];
                            }
                        }
                    }
                });
            }else{

                el("#tagAdd"+i).addEventListener("keydown", (e)=> {
                    if (e.key === "Enter") {
                        e.preventDefault();
                        let valueTag = e.target.value;
                        let showTag = el("#showTag"+i);
                        let span = document.createElement("span");
                        span.setAttribute("style","position: relative; float: left; gap: 5px; margin:3px; padding: 5px 25px 5px 5px; border-radius: 4px; background: #e3e7ee;");
                        if(valueTag != "" && !dataArrayTag["#showTag"+i].includes(valueTag)){
                            span.innerHTML = valueTag + "<button type='button' style='position: absolute; right: 5px; display: flex; justify-content: center; align-items: center; width: 15px; height: 15px; top: 7px;' class='btnCloseTag'><i class='las la-times'></i></button>";
                            showTag.append(span);
                            e.target.value = "";
                            e.target.focus();
                            dataArrayTag["#showTag"+i].push(valueTag);
                            let btnCloseTag = document.querySelectorAll(".btnCloseTag");
                            if(btnCloseTag){
                                for(let m=0; m<btnCloseTag.length; m++){
                                    btnCloseTag[m].addEventListener("click", (e)=>{
                                        e.preventDefault();
                                        btnCloseTag[m].parentElement.remove();
                                        let strUntukDihapus = btnCloseTag[m].parentElement.innerText;
                                        let index = dataArrayTag["#showTag"+i].indexOf(strUntukDihapus);
                                        if (index !== -1) {
                                            dataArrayTag["#showTag"+i].splice(index, 1); 
                                            input[i].value = dataArrayTag["#showTag"+i];
                                        }
                                    });
                                }
                            }
                        }
                        input[i].value = dataArrayTag["#showTag"+i];
                    }
    
                    if (e.key === "Backspace") {
                        if(e.target.value.length == 0){
                            dataArrayTag["#showTag"+i].pop();
                            let showTag = el("#showTag"+i);
                            if(showTag.children.length != 0){
                                showTag.children[showTag.children.length -1].remove();
                                input[i].value = dataArrayTag["#showTag"+i];
                            }
                        }
                    }
    
                });

            }


            function resetTag(){
                let showTag = el("#showTag"+i);
                showTag.innerHTML = "";
                input[i].value = "";
                input[i].parentElement.children[1].value = "";
                dataArrayTag["#showTag"+i] = [];
            }
            
        }

    }
}



/*
    Select Tipe
*/

let select = document.querySelectorAll('select');
if(select){

    for (let i=0; i < select.length; i++) {
        
        if(select[i].dataset.tipe == "select"){
            select[i].setAttribute("style","display: none;");
            let div = document.createElement("div");
            div.setAttribute("class","form-control selectCustom");
            div.setAttribute("style","cursor: pointer; position: relative");

            let listItem = "";
            let items = [];
            for(let l = 0; l<select[i].children.length; l++){
                if(select[i].children[l].value != ""){
                    items["itemSelect"+i] = select[i].children;
                }
            }
            
            div.innerHTML = `
                <div class='labelOption' id="select`+i+`"><span>`+select[i].children[0].innerHTML+`</span><i class="las la-angle-down"></i></div>
                <i class="las la-search iconSearch" id="iconSearch`+i+`" style="display: none;"></i>
                <input placeholder="Cari.." id="cari`+i+`" class="cariOption hide">
                <ul class='listOption hide' id="listOp`+i+`">
                    `+listItem+`
                </ul>
            `;
            select[i].parentElement.append(div);

            let iconSearch = el("#iconSearch"+i);
            let inputCari = el("#cari"+i);
            let selectBtn = el("#select"+i);
            if(selectBtn){
                selectBtn.addEventListener("click", ()=>{
                    let listOp = el("#listOp"+i);
                    if(listOp.classList.contains("hide")){
                        selectBtn.innerHTML = `<span></span><i class="las la-angle-up"></i>`;
                        iconSearch.setAttribute("style", "display: block;");
                        inputCari.classList.remove("hide");
                        listOp.classList.remove("hide");
                        inputCari.focus();

                        listOp.innerHTML = "";
                        for(let a=1; a<items["itemSelect"+i].length; a++){
                            listItem += `<li data-value='`+items["itemSelect"+i][a].value+`'>`+items["itemSelect"+i][a].innerHTML+`</li>`;
                        }
                        listOp.innerHTML = listItem;

                        inputCari.addEventListener("keyup", ()=>{
                            listOp.innerHTML = "";
                            listItem = "";
                            for(let a=1; a<items["itemSelect"+i].length; a++){
                                if(items["itemSelect"+i][a].innerHTML.toLowerCase().match(inputCari.value.toLowerCase()) && items["itemSelect"+i][a].value != ""){
                                    listItem += `<li data-value='`+items["itemSelect"+i][a].value+`'>`+items["itemSelect"+i][a].innerHTML+`</li>`;
                                }
                            }
                            if(listItem.length == 0){
                                listItem = "<div style='padding:15px; text-align: center; border: 1px dashed #bdbdbd; color: #bdbdbd; margin-bottom: 10px; border-radius: 4px;'>Tidak ditemukan</div>";
                            }
                            listOp.innerHTML = listItem;
                            for(let x=0; x < listOp.children.length; x++){
                                listOp.children[x].addEventListener("click", ()=>{
                                    select[i].children[0].innerHTML = listOp.children[x].innerHTML;
                                    select[i].children[0].value = listOp.children[x].dataset.value;
                                    selectBtn.innerHTML = `<span>`+select[i].children[0].innerHTML+`</span><i class="las la-angle-down"></i>`;
                                    iconSearch.setAttribute("style", "display: none;");
                                    inputCari.classList.add("hide");
                                    listOp.classList.add("hide");
                                    inputCari.value="";
                                    listOp.innerHTML = "";
                                    listItem = "";
                                });
                            }
                        });

                        for(let x=0; x < listOp.children.length; x++){
                            listOp.children[x].addEventListener("click", ()=>{
                                select[i].children[0].innerHTML = listOp.children[x].innerHTML;
                                select[i].children[0].value = listOp.children[x].dataset.value;
                                selectBtn.innerHTML = `<span>`+select[i].children[0].innerHTML+`</span><i class="las la-angle-down"></i>`;
                                iconSearch.setAttribute("style", "display: none;");
                                inputCari.classList.add("hide");
                                listOp.classList.add("hide");
                                inputCari.value="";
                                listOp.innerHTML = "";
                                listItem = "";
                            });
                        }

                    }else{
                        selectBtn.innerHTML = `<span>`+select[i].children[0].innerHTML+`</span><i class="las la-angle-down"></i>`;
                        iconSearch.setAttribute("style", "display: none;");
                        inputCari.classList.add("hide");
                        listOp.classList.add("hide");
                        inputCari.value="";
                    }
                });
            }
        }

    }


    function resetSelect() {
        if(select){
            for (let i=0; i < select.length; i++) {
                if(select[i].dataset.tipe == "select"){
                    let label = "Pilihan "+select[i].parentElement.children[0].innerHTML;
                    select[i].parentElement.children[2].children[0].children[0].innerHTML = label;
                    select[i].children[0].value = "";
                    select[i].children[0].innerHTML = label;
                }
    
            }
        }
    }

}

function resetSlug() {
    let showslug = document.getElementById("showslug");
    let slug = document.getElementById("slug");
    if(showslug){
        showslug.value = "";
        slug.value = "";
    }
}







/*
    Submit
*/

function submitForm(x) {
    let formID = x.formID;
    let loadingLabel = x.loadingLabel;
    let tabel = x.tabel;
    let labelButton = x.labelButton;
    let messageSuccess = x.messageSuccess;
    let resetForm = x.resetForm;
    let focus = x.focus;

    btnSubmit.innerHTML = loadingLabel;
    const form = document.querySelector('form[id="'+formID+'"]');
    const formData = new FormData(form);
    fetch(Baseurl + 'api/' + tabel, {
        method: 'POST',
        headers: HEADERFORM,
        body: formData
    }).then(response => response.text()).then(pesan => {
        btnSubmit.innerHTML = labelButton;
        if(pesan == "Berhasil"){
            if(resetForm){
                el("#"+focus).focus();
                for(let a=0; a<resetForm.length; a++){
                    el("#"+resetForm[a]).value = "";
                }
                resetTextarea();
                resetSelect();
                if(typeof resetTag === 'function') {
                    resetTag();
                }
                resetSlug();
                Toast({
                    tipe: 'success',
                    message: messageSuccess
                });
            }

            Toast({
                tipe: 'success',
                message: messageSuccess
            });
        }else{
            Toast({
                tipe: 'error',
                message: pesan
            });
        }
    }).catch(error => {
        btnSubmit.innerHTML = labelButton;
        Toast({
            tipe: 'error',
            message: error
        });
    });
}
