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
let page = getMeta("page");

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











// Scroll
let headerBrand = document.querySelector(".header-brand");
let headerMenu = document.querySelector(".header-menu");
let scrollToTop = document.querySelector(".scrollToTop");
let buttonPolling = document.querySelector(".buttonPolling");
window.addEventListener("scroll", () => {
    if (document.documentElement.scrollTop > 100) {
        headerBrand.classList.add("fixed");
        headerMenu.classList.add("fixed");
    }else{
        headerBrand.classList.remove("fixed");
        headerMenu.classList.remove("fixed");
    }

    if (document.documentElement.scrollTop > 10) {
        scrollToTop.classList.add("show");
        buttonPolling.classList.add("show");
    }else{
        scrollToTop.classList.remove("show");
        buttonPolling.classList.remove("show");
    }
});

scrollToTop.addEventListener("click", ()=>{
    document.documentElement.scrollTop = 0;
});


function copyteks(judul) {
    let copyberita = document.getElementById("isiberita");
    let isiberita = stripHtml(copyberita.innerHTML);
    navigator.clipboard.writeText(isiberita + ' -- Artikel ini telah terbit di https://tagline.id dengan judul '+judul).then(
        () => {
            alert('Teks disalin');
        }
    );
}










// Menu
let btnBar = document.querySelectorAll("button[data-model='buttonShowHideMenu']");
let menuBar = document.querySelector("div[data-model='showHideMenu']");
if(btnBar){
    for(let i=0; i<btnBar.length; i++){
        btnBar[i].addEventListener("click", ()=>{
            if(menuBar.classList.contains("active")){
                menuBar.classList.remove("active");
            }else{
                menuBar.classList.add("active");
            }
        });
    }
}

window.addEventListener("click", (e)=>{
    if(e.target.dataset.model != "buttonShowHideMenu") {
        menuBar.classList.remove("active");
    }
});







/*
    Date Time Converter


*/

(function(window){
	window.datetimeConverter = {
		toTimeStamp : function(str) {
            let seconds = Math.floor((new Date() - new Date(str)) / 1000);
            let interval = seconds / 31536000;
            if (interval > 1) {
                return Math.floor(interval) + " tahun yang lalu";
            }
            
            interval = seconds / 2592000;
            
            if (interval > 1) {
                return Math.floor(interval) + " bulan yang lalu";
            }
            
            interval = seconds / 86400;
            
            if (interval > 1) {
                return Math.floor(interval) + " hari yang lalu";
            }
            
            interval = seconds / 3600;
            
            if (interval > 1) {
                return Math.floor(interval) + " jam yang lalu";
            }
            
            interval = seconds / 60;
            
            if (interval > 1) {
                return Math.floor(interval) + " menit yang lalu";
            }

            return "Baru saja";
		},
		toFullTime : function(str) {
			
		},
        toSimpleTime : function(str) {
            let hr = Number(str.split(" ")[0].split("-")[2]);
            let bln = bulanString(Number(str.split(" ")[0].split("-")[1]));
            let th = str.split(" ")[0].split("-")[0];
            let tgl = hr + " " + bln + " " + th;
            let waktu = " "+str.split(" ")[1] + " WIB";
            return tgl + waktu;
		},
        to : function(str) {
			
		}
	};
})(window);

function bulanString (x){
    let result = "";
    switch(x){
        case 1:
            result = "Januari";
        break;
        case 2:
            result = "Februari";
        break;
        case 3:
            result = "Maret";
        break;
        case 4:
            result = "April";
        break;
        case 5:
            result = "Mei";
        break;
        case 6:
            result = "Juni";
        break;
        case 7:
            result = "Juli";
        break;
        case 8:
            result = "Agustus";
        break;
        case 9:
            result = "September";
        break;
        case 10:
            result = "Oktober";
        break;
        case 11:
            result = "November";
        break;
        case 12:
            result = "Desember";
        break;
    }
    return result;
}



(function(window){
	window.htmlToArray = {
		byDiv : function(str) {
            let arr = str.split(/<\/div><div>/);
            arr[0] = arr[0].replace('<div>', '');
            arr[arr.length - 1] = arr[arr.length - 1].replace('</div>', '');
            return arr;
		}
	};
})(window);




loadHighlight();

function loadHighlight(){
    fetch(Baseurl + "api/highlight/load", {
        method: 'GET',
        headers: HEADER,
    }).then(response => response.json()).then(data => {
        let datakonten = data.data;
        let highlightList = el("#hilightList");
        let konten = "";
        for(let i=0; i<datakonten.length; i++){
            konten += `<a href='javascript:void(0)' onClick='addVisitor({
                id: `+datakonten[i].id+`,
                model: "highlight|diklik",
                link:"`+datakonten[i].link+`"
            })'>`+datakonten[i].judul+`</a>`;
        }
        highlightList.innerHTML = konten;
    }).catch(error => {
        //console.log(error);
        //tbody.innerHTML = `<tr><td class='load' colspan='` + jlkolom + `'>` + msgError + `</td></tr>`;
    });
}

function addVisitor(x){
    let id = x.id;
    let model = x.model;
    let link = x.link;
    fetch(Baseurl + "api/visitor/addvisitor/"+model+"/"+id, {
        method: 'GET',
        headers: HEADER,
    }).then(response => response.text()).then(message => {
        window.location.href = link;
    }).catch(error => {
        //console.log(error);
        //tbody.innerHTML = `<tr><td class='load' colspan='` + jlkolom + `'>` + msgError + `</td></tr>`;
    });
    return false;
}