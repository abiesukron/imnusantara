function el(x) {
    let result = document.querySelector(x);
    return result;
}


function getMeta(metaName) {
    const metas = document.getElementsByTagName('meta');
    for (let i = 0; i < metas.length; i++) {
        if (metas[i].getAttribute('name') === metaName) {
            return metas[i].getAttribute('content');
        }
    }
    return '';
}

//const url = getMeta("x-baseurl");
const apikey = getMeta("x-API-key");
let Baseurl = getMeta("Baseurl");
let Prefix = getMeta("Prefix");



/*
    Popup Menu Profile
*/

if (el("#btnshowhidemenu")) {
    el("#btnshowhidemenu").addEventListener("click", () => {
        if (el("sidebar").classList.contains("mini")) {
            el("sidebar").classList.remove("mini");
            el(".topbar").classList.remove("mini");
            el(".page").classList.remove("mini");
            el(".page-footer").classList.remove("mini");
        } else {
            el("sidebar").classList.add("mini");
            el(".topbar").classList.add("mini");
            el(".page").classList.add("mini");
            el(".page-footer").classList.add("mini");
        }
    });
}



/*
    Popup Menu Profile
*/

if (el("#btnpopupmenu")) {
    el("#btnpopupmenu").addEventListener("click", () => {
        if (el(".popupmenu").classList.contains("active")) {
            el(".popupmenu").classList.remove("active");
        } else {
            el(".popupmenu").classList.add("active");
        }
    });
}





/*
    Window Event
*/

let refresh = document.querySelectorAll(".refresh");
if (refresh) {
    for (let i = 0; i < refresh.length; i++) {
        refresh[i].addEventListener("click", () => {
            refresh[i].children[0].classList.add("rotate");
            setTimeout(() => {
                refresh[i].children[0].classList.remove("rotate");
                Toast({
                    tipe: "success",
                    message: "Data uptodate"
                });
            }, 400);
        });
    }
}

let downloadExcel = document.querySelectorAll(".download-excel");
if (downloadExcel) {
    for (let i = 0; i < downloadExcel.length; i++) {
        downloadExcel[i].addEventListener("click", () => {
            Toast({
                tipe: "info",
                message: "Membuat file excel.."
            });

            fetch(Baseurl + 'api/' + downloadExcel[i].dataset.tabel + '/excel', {
                method: 'GET',
                headers: HEADER
            }).then(response => response.json()).then(pesan => {
                // console.log(pesan);
                Toast({
                    tipe: "success",
                    message: "File didownload"
                });
                window.location.href = Baseurl + pesan.data[0];
            }).catch(error => {
                // console.log(downloadExcel[i].dataset.tabel);
                Toast({
                    tipe: 'error',
                    message: error
                });
            });

        });
    }
}



/*
    Sidebar
*/

let datamodel = document.querySelectorAll("li[data-model='sub']");
if (datamodel) {
    for (let i = 0; i < datamodel.length; i++) {
        datamodel[i].removeAttribute("class");
        datamodel[i].children[0].children[2].classList.remove("la-angle-down");
        datamodel[i].children[0].children[2].classList.add("la-angle-right");
        datamodel[i].addEventListener("click", () => {
            if (datamodel[i].classList.contains("open")) {
                datamodel[i].removeAttribute("class");
            } else {
                datamodel[i].setAttribute("class", "open");
            }
            if (datamodel[i].children[0].children[2].classList.contains("la-angle-right")) {
                datamodel[i].children[0].children[2].classList.remove("la-angle-right");
                datamodel[i].children[0].children[2].classList.add("la-angle-down");
            } else {
                datamodel[i].children[0].children[2].classList.remove("la-angle-down");
                datamodel[i].children[0].children[2].classList.add("la-angle-right");
            }
        });
    }
}



/*
    Window Event
*/

window.addEventListener("click", (e) => {
    if (e.target.id != "photopopupmenu") {
        el(".popupmenu").classList.remove("active");
    }

    if(e.target.id != "btnshowhidemenu") {
        el(".topbar").classList.remove("mini");
        el("sidebar").classList.remove("mini");
        el(".page").classList.remove("mini");
    }
});


const HEADER = {
    "x-API-key": apikey,
    "Content-Type": "application/json",
};

const HEADERFORM = {
    "x-API-key": apikey,
};

let getForm = document.querySelectorAll("form");
if (getForm) {
    fetch(Baseurl + "api/csrf", {
        method: 'GET',
        headers: HEADER,
    }).then(response => response.json()).then(data => {
        let csrfData = data.csrf;
        for (let i = 0; i < getForm.length; i++) {
            let input = document.createElement("input");
            input.setAttribute("type", "hidden");
            input.setAttribute("id", "__csrf");
            input.setAttribute("name", "__csrf");
            input.setAttribute("value", csrfData);
            getForm[i].append(input);
        }
        let meta = document.getElementsByTagName("meta");
        meta['x-Form-Key'].content = csrfData;
    }).catch(error => {
        //console.log(error);
        //tbody.innerHTML = `<tr><td class='load' colspan='` + jlkolom + `'>` + msgError + `</td></tr>`;
    });
}






/*
    Format
*/

function angkaRibuan(x) {
    let angka = x.toString();
    let number_string = angka.replace(/[^,\d]/g, '').toString();
    let split = number_string.split(',');
    let sisa = split[0].length % 3;
    let angka_hasil = split[0].substr(0, sisa);
    let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    // Tambahkan titik jika yang di input sudah menjadi angka ribuan
    if (ribuan) {
        let separator = sisa ? '.' : '';
        angka_hasil += separator + ribuan.join('.');
    }

    angka_hasil = split[1] != undefined ? angka_hasil + ',' + split[1] : angka_hasil;
    return angka_hasil;
}




/*
    Event Logout 
*/

let formLogout = document.querySelectorAll("#formLogout");

if(formLogout){
    for(let i=0; i<formLogout.length; i++){
        formLogout[i].addEventListener("submit", (e) => {
            e.preventDefault();
        
            Toast({
                tipe: "logout",
                message: "Halo <strong>"+formLogout[i].dataset.nama+"</strong>, <br/> Yakin ingin keluar aplikasi?"
            });
        
            let ya = el("#ya");
            let batal = el("#batal");
        
            ya.addEventListener("click", () => {
                const form = document.querySelector('form[id="formLogout"]');
                const formData = new FormData(form);
                fetch(Baseurl + 'api/auth', {
                    method: 'POST',
                    headers: HEADERFORM,
                    body: formData
                }).then(response => response.text()).then(pesan => {
                    window.location.href = Baseurl;
                }).catch(error => {
                    Toast({
                        tipe: 'error',
                        message: error
                    });
                });
            });
        
            batal.addEventListener("click", () => {
                Toast({
                    tipe: "error",
                    message: "dibatalkan"
                });
            });
        
        });
    }
}






/*
    Slug Remove

*/
function slugRemoverChar(teks){
    let result = teks.replaceAll(" ","-").replaceAll(",","").replaceAll(";","").replaceAll("'","").replaceAll(":","").replaceAll(".","").replaceAll("~","").replaceAll("#","").replaceAll("$","").replaceAll("%","").replaceAll("^","").replaceAll("&","").replaceAll("*","").replaceAll("(","").replaceAll(")","").replaceAll("+","").replaceAll("}","").replaceAll("{","").replaceAll('"',"").replaceAll("=","").replaceAll("[","").replaceAll("]","").replaceAll("?","").replaceAll("!","");
    return result.toLowerCase();
}


/*
    Hapus

*/
let formHapusPage = document.querySelectorAll("#formHapusPage");
if (formHapusPage) {
    for (let i = 0; i < formHapusPage.length; i++) {
        formHapusPage[i].addEventListener("submit", (e) => {
            e.preventDefault();
            let tabel = formHapusPage[i].dataset.tabel;
            let dataID = formHapusPage[i].dataset.formid;
            let label = formHapusPage[i].dataset.label;

            Toast({
                tipe: "konfirmasi",
                message: "Ingin menghapus data <strong style='color: #ff4a1d;'>" + label + "</strong> ini?"
            });

            let ya = el("#ya");
            let batal = el("#batal");

            ya.addEventListener("click", () => {
                const form = document.querySelector('form[data-formid="' + dataID + '"]');
                const formData = new FormData(form);
                fetch(Baseurl + 'api/' + tabel, {
                    method: 'POST',
                    headers: HEADERFORM,
                    body: formData
                }).then(response => response.text()).then(pesan => {
                    if (pesan.split("|")[0] == "Berhasil") {
                        Toast({
                            tipe: 'success',
                            message: pesan.split("|")[1]
                        });
                        setTimeout(()=>{
                            window.location.href=Baseurl+tabel;
                        },500);
                    } else {
                        Toast({
                            tipe: 'error',
                            message: pesan
                        });
                    }
                }).catch(error => {
                    Toast({
                        tipe: 'error',
                        message: error
                    });
                });
            });

            batal.addEventListener("click", () => {
                Toast({
                    tipe: "error",
                    message: "dibatalkan"
                });
            });

        });
    }
}