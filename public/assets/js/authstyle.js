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
