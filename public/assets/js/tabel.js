let storagetabel = [];
let opsitabel = [];
let storagetr = [];
let opsiakses = [];
let msgNotFound = `<div><img src='` + Baseurl + `assets/images/ilustrasi/notfound.png'></div>`;
let msgEmptyData = `<div><img src='` + Baseurl + `assets/images/ilustrasi/empty.png'></div>`;
let msgError = `<div><img src='` + Baseurl + `assets/images/ilustrasi/error.png'></div>`;
let maxpaging = 8;

function abiesoftTabel(x) {
    let ID = x.id;
    let TABEL = ID.replaceAll("tabel", "");

    let elementTable = el("#" + ID);

    let keyword = "";

    if (elementTable.children.length == 1) {
        jlkolom = elementTable.children[0].children[0].children[0].children.length;
        headerTable(elementTable);
        footerTable(elementTable);
        tbodyTable(elementTable.children[1]);
    }

    let tbody = elementTable.children[1].children[1];
    tbody.innerHTML = `<tr><td class='load' colspan='` + jlkolom + `'><div class='loader' class='fix40'></div></td></tr>`;

    setTimeout(() => {
        if (opsitabel[ID] == undefined) {
            opsitabel[ID] = {
                jlkolom: jlkolom,
                perpage: x.perpage,
                aktif: x.aktif,
                keyword: keyword,
                totalpencarian: 0,
                jldata: 0,
                jlhalaman: 1
            }
        }

        fetch(Baseurl + "api/" + TABEL, {
            method: 'GET',
            headers: HEADER,
        }).then(response => response.json()).then(data => {
            let listData = data.data;
            let opsi = data.opsi;
            opsiakses[ID] = opsi.split("");
            let total = listData.length;
            if (total > 0) {
                storagetabel[ID] = listData;
                loadData(x);
            } else {
                tbody.innerHTML = `<tr><td class='load' colspan='` + jlkolom + `'>` + msgEmptyData + `</td></tr>`;
            }

        }).catch(error => {
            tbody.innerHTML = `<tr><td class='load' colspan='` + jlkolom + `'>` + msgError + `</td></tr>`;
        });
    });



}

function headerTable(x) {
    let div = document.createElement("div");
    div.innerHTML = `
        <div class='kiri'></div>
        <div class='kanan'></div>
    `;
    div.setAttribute("class", "table-header");
    x.prepend(div);
}

function footerTable(x) {
    let div = document.createElement("div");
    div.innerHTML = `
        <div></div>
        <div class='pagination'></div>
    `;
    div.setAttribute("class", "table-footer");
    x.append(div);
}

function tbodyTable(x) {
    let tbody = document.createElement("tbody");
    x.children[0].after(tbody);
}

function loadData(x) {
    let ID = x.id;
    let elementTable = el("#" + ID);
    let tbody = elementTable.children[1].children[1];
    let tr = "";
    let no = 1;
    let data = storagetabel[ID];
    let total = data.length;
    opsitabel[ID].jldata = total;
    let tableHeaderKiri = elementTable.children[0].children[0];
    let tableHeaderKanan = elementTable.children[0].children[1];
    let tableFooterKiri = elementTable.children[2].children[0];
    let tableFooterKanan = elementTable.children[2].children[1];
    let jlkolom = opsitabel[ID].jlkolom;
    let perpage = opsitabel[ID].perpage;
    let aktif = opsitabel[ID].aktif;
    let keyword = opsitabel[ID].keyword;
    let jldata = opsitabel[ID].jldata;
    let jlhalaman = opsitabel[ID].jlhalaman;

    tbody.innerHTML = "";
    tbody.innerHTML = `<tr><td class='load' colspan='` + jlkolom + `'><div class='loader' class='fix40'></div></td></tr>`;

    let datafilter = [];
    storagetr[ID] = [];
    datafilter = [];
    let dpencarian = 0;
    for (let i = 0; i < data.length; i++) {
        let str = "";
        Object.keys(data[i]).forEach((label) => {
            if (label != "id" && label != "dibuat") {
                str += data[i][label];
            }
        });
        if (keyword != '') {
            if (str.toLocaleLowerCase().match(keyword.toLocaleLowerCase())) {
                dpencarian += 1;
                datafilter.push(data[i]);
            }
        } else {
            dpencarian = 0;
            datafilter.push(data[i]);
        }
    }

    opsitabel[ID].totalpencarian = dpencarian;
    totalpencarian = opsitabel[ID].totalpencarian;

    if (totalpencarian > 0) {
        opsitabel[ID].jldata = totalpencarian;
    } else {
        opsitabel[ID].jldata = total;
        opsitabel[ID].perpage = x.perpage;
        opsitabel[ID].aktif = x.aktif;
    }

    jldata = opsitabel[ID].jldata;
    storagetr[ID] = datafilter;



    let batas = aktif * perpage;
    let start = 1;
    if (perpage * aktif == perpage) {
        no = start;
    } else {
        no = (perpage * (aktif - 1)) + 1;
    }

    for (let i = 0; i < storagetr[ID].length; i++) {

        let datalabel = "";
        if (i > no - 2 && i < batas) {

            let td = "";
            td += `<td>` + no + `</td>`;
            Object.keys(storagetr[ID][i]).forEach((label) => {
                if (label != "id" && label != "dibuat") {
                    td += `<td>` + storagetr[ID][i][label] + `</td>`;
                    datalabel += storagetr[ID][i][label] + "|";
                }
            });

            let btnE = "";
            let btnR = "";
            let btnD = "";

            if (opsiakses[ID].includes("E")) {
                btnE = `<button type='button' onClick='window.location.href=this.dataset.link' data-link='` + Baseurl + Prefix+ `/` + ID.replace("tabel", "") + `/edit/` + storagetr[ID][i].id + `'><i class="las la-edit"></i></button>`;
            }

            if (opsiakses[ID].includes("R")) {
                if(ID.replace("tabel","") == "users"){
                    btnR = `<button type='button' onClick='window.location.href=this.dataset.link' data-link='` + Baseurl + Prefix+ `/` + ID.replace("tabel", "") + `/read/@` + storagetr[ID][i].email.split("@")[0] + `/profile'><i class="las la-eye"></i></button>`;
                }else{
                    btnR = `<button type='button' onClick='window.location.href=this.dataset.link' data-link='` + Baseurl + Prefix+ `/` + ID.replace("tabel", "") + `/read/` + storagetr[ID][i].id + `'><i class="las la-eye"></i></button>`;
                }
            }

            if (opsiakses[ID].includes("D")) {
                btnD = `
                    <form id='formHapus-`+ ID + `' name='formHapus-` + ID + `' data-formid='` + storagetr[ID][i].id + `' data-label='` + datalabel.split("|")[0] + `' method='POST'>
                        <input type='hidden' id='id' name='id' value='`+ storagetr[ID][i].id + `'>
                        <input type='hidden' id='__method' name='__method' value='DELETE'>
                        <input type='hidden' id='__csrf' name='__csrf' value='`+ getMeta("x-Form-Key") + `'>
                        <button type='submit'><i class="las la-times"></i></button>
                    </form>
                `;
            }

            td += `<td>
                    <div class="button-opsi-area">
                    `+ btnE + btnR + btnD + `
                    </div> 
                </td> `;

            if (no % 2 == 0) {
                tr += `<tr class="even"> ` + td + `</tr> `;
            } else {
                tr += `<tr> ` + td + `</tr> `;
            }

            no++;

        }
    }

    tbody.innerHTML = tr;







    /*


        Opsi Table
    */

    btnOpsiPPerPage({
        tableHeaderKiri: tableHeaderKiri,
        id: ID,
        jlkolom: jlkolom,
        aktif: aktif,
        total: total,
        keyword: keyword,
        totalpencarian: totalpencarian,
        jldata: jldata,
        jlhalaman: jlhalaman
    });

    inputOpsiSearch({
        tableHeaderKanan: tableHeaderKanan,
        id: ID,
        jlkolom: jlkolom,
        perpage: perpage,
        aktif: aktif,
        total: total,
        keyword: keyword,
        totalpencarian: totalpencarian,
        jldata: jldata,
        jlhalaman: jlhalaman
    });

    infoHasilPencarian({
        tableFooterKiri: tableFooterKiri,
        totalpencarian: totalpencarian,
        total: total,
        keyword: keyword,
        tbody: tbody,
        msgNotFound: msgNotFound,
        jldata: jldata
    });


    jlhalaman = jldata / perpage;
    opsitabel[ID].jlhalaman = jlhalaman;
    let angkaBPage = 1;
    let bPage = "";

    if (aktif != 1) {
        bPage += `<button style='margin-right: 10px;' onClick='updatePerPage({
            id: "`+ ID + `",
            jkolom: `+ jlkolom + `,
            aktif: `+ (aktif - 1) + `,
            perpage: `+ perpage + `,
            keyword: "`+ keyword + `",
            totalpencarian: `+ totalpencarian + `,
            jldata: `+ jldata + `,
            jlhalaman: `+ jlhalaman + `
        })'><i class="las la-arrow-left"></i></button>`;
    }

    for (let i = 0; i < Math.ceil(jlhalaman); i++) {

        if (aktif < 5 && i < 6) {
            if (angkaBPage == aktif) {
                bPage += `<button class='active' onClick='updatePerPage({
                    id: "`+ ID + `",
                    jkolom: `+ jlkolom + `,
                    aktif: `+ angkaBPage + `,
                    perpage: `+ perpage + `,
                    keyword: "`+ keyword + `",
                    totalpencarian: `+ totalpencarian + `,
                    jldata: `+ jldata + `,
                    jlhalaman: `+ jlhalaman + `
                })'>` + angkaBPage + `</button>`;
            } else {
                bPage += `<button onClick='updatePerPage({
                    id: "`+ ID + `",
                    jkolom: `+ jlkolom + `,
                    aktif: `+ angkaBPage + `,
                    perpage: `+ perpage + `,
                    keyword: "`+ keyword + `",
                    totalpencarian: `+ totalpencarian + `,
                    jldata: `+ jldata + `,
                    jlhalaman: `+ jlhalaman + `
                })'>` + angkaBPage + `</button>`;
            }
        }

        if (aktif > 4 & i > (aktif - 6) && i < (aktif + 1)) {
            if (angkaBPage == aktif) {
                bPage += `<button class='active' onClick='updatePerPage({
                    id: "`+ ID + `",
                    jkolom: `+ jlkolom + `,
                    aktif: `+ angkaBPage + `,
                    perpage: `+ perpage + `,
                    keyword: "`+ keyword + `",
                    totalpencarian: `+ totalpencarian + `,
                    jldata: `+ jldata + `,
                    jlhalaman: `+ jlhalaman + `
                })'>` + angkaBPage + `</button>`;
            } else {
                bPage += `<button onClick='updatePerPage({
                    id: "`+ ID + `",
                    jkolom: `+ jlkolom + `,
                    aktif: `+ angkaBPage + `,
                    perpage: `+ perpage + `,
                    keyword: "`+ keyword + `",
                    totalpencarian: `+ totalpencarian + `,
                    jldata: `+ jldata + `,
                    jlhalaman: `+ jlhalaman + `
                })'>` + angkaBPage + `</button>`;
            }

        }

        angkaBPage++;
    }

    if (aktif < (jlhalaman - 1)) {

        if (jlhalaman > 6) {
            bPage += `<button class='disabled'>...</button>`;
        }

        if (jlhalaman > 50) {
            let shortcutBtn = aktif + 15;
            if (shortcutBtn < jlhalaman) {
                bPage += `<button style='margin-left: 10px;' onClick='updatePerPage({
                    id: "`+ ID + `",
                    jkolom: `+ jlkolom + `,
                    aktif: `+ shortcutBtn + `,
                    perpage: `+ perpage + `,
                    keyword: "`+ keyword + `",
                    totalpencarian: `+ totalpencarian + `,
                    jldata: `+ jldata + `,
                    jlhalaman: `+ jlhalaman + `
                })'>`+ shortcutBtn + `</button>`;
            }
        }


        bPage += `<button style='margin-left: 10px;' onClick='updatePerPage({
            id: "`+ ID + `",
            jkolom: `+ jlkolom + `,
            aktif: `+ (aktif + 1) + `,
            perpage: `+ perpage + `,
            keyword: "`+ keyword + `",
            totalpencarian: `+ totalpencarian + `,
            jldata: `+ jldata + `,
            jlhalaman: `+ jlhalaman + `
        })'><i class="las la-arrow-right"></i></button>`;
    }

    if (keyword != "" && totalpencarian == 0) {
        tableHeaderKiri.innerHTML = "";
        tableFooterKanan.innerHTML = "";
    } else {
        tableFooterKanan.innerHTML = bPage;
    }

    loadHapus(x);

}

function btnOpsiPPerPage(x) {
    let ID = x.id;
    let total = x.total;
    let jlkolom = x.jlkolom;
    let aktif = x.aktif;
    let tableHeaderKiri = x.tableHeaderKiri;
    let keyword = x.keyword;
    let totalpencarian = x.totalpencarian;
    let jldata = x.jldata;
    let jlhalaman = x.jlhalaman;
    let btnPerPage = "";

    let btnaktif5 = "";
    let btnaktif10 = "";
    let btnaktif50 = "";
    let btnaktif100 = "";
    let btnaktif500 = "";
    let btnaktif1000 = "";

    if (opsitabel[ID].perpage == 5) { btnaktif5 = " class='active' "; }
    if (opsitabel[ID].perpage == 10) { btnaktif10 = " class='active' "; }
    if (opsitabel[ID].perpage == 50) { btnaktif50 = " class='active' "; }
    if (opsitabel[ID].perpage == 100) { btnaktif100 = " class='active' "; }
    if (opsitabel[ID].perpage == 500) { btnaktif500 = " class='active' "; }
    if (opsitabel[ID].perpage == 1000) { btnaktif1000 = " class='active' "; }

    if (jldata < 10) {
        btnPerPage = `
            <button class='active' onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 5,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>5</button>
        `;
    } else if (jldata < 50) {
        btnPerPage = `
            <button `+ btnaktif5 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 5,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>5</button>
            <button `+ btnaktif10 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 10,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>10</button>
        `;
    } else if (jldata < 100) {
        btnPerPage = `
            <button `+ btnaktif5 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 5,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>5</button>
            <button `+ btnaktif10 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 10,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>10</button>
            <button `+ btnaktif50 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 50,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>50</button>
        `;
    } else if (jldata < 500) {
        btnPerPage = `
            <button `+ btnaktif5 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 5,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>5</button>
            <button `+ btnaktif10 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 10,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>10</button>
            <button `+ btnaktif50 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 50,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>50</button>
            <button `+ btnaktif100 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 100,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>100</button>
        `;
    } else if (jldata < 1000) {
        btnPerPage = `
            <button `+ btnaktif5 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 5,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>5</button>
            <button `+ btnaktif10 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 10,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>10</button>
            <button `+ btnaktif50 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 50,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>50</button>
            <button `+ btnaktif100 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 100,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>100</button>
            <button `+ btnaktif500 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 500,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>500</button>
        `;
    } else {
        btnPerPage = `
            <button `+ btnaktif5 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 5,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>5</button>
            <button `+ btnaktif10 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 10,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>10</button>
            <button `+ btnaktif50 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 50,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>50</button>
            <button `+ btnaktif100 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 100,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>100</button>
            <button `+ btnaktif500 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 500,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>500</button>
            <button `+ btnaktif1000 + ` onClick='updatePerPage({
                id: "`+ ID + `",
                jkolom: `+ jlkolom + `,
                aktif: 1,
                perpage: 1000,
                keyword: "`+ keyword + `",
                totalpencarian: `+ totalpencarian + `,
                jldata: `+ jldata + `,
                jlhalaman: `+ jlhalaman + `
            })'>1000</button>
        `;
    }
    tableHeaderKiri.innerHTML = btnPerPage;
}

function inputOpsiSearch(x) {
    let tableHeaderKanan = x.tableHeaderKanan;
    let ID = x.id;
    let jlkolom = x.jlkolom;
    let aktif = x.aktif;
    let perpage = x.perpage;
    let keyword = x.keyword;
    let totalpencarian = x.totalpencarian;
    let jldata = x.jldata;
    let jlhalaman = x.jlhalaman;
    tableHeaderKanan.innerHTML = `
        <div class='form-tabel'>
            <form class='formTabelCari' onSubmit='return false;'>
                <div class='form-group'>
                    <input class='form-control' placeholder='Cari ..' id='cari`+ ID + `' name='cari` + ID + `'>
                </div>
                <div class='form-button'>
                    <button><i class="las la-search"></i></button>
                </div>
            </form>
        </div>
    `;

    let inputCari = el("#cari" + ID);
    inputCari.value = keyword;
    if (keyword != "") {
        inputCari.focus();
    }
    inputCari.addEventListener('keyup', () => {
        updatePerPage({
            id: ID,
            jlkolom: jlkolom,
            aktif: 1,
            perpage: perpage,
            keyword: inputCari.value,
            totalpencarian: totalpencarian,
            jldata: jldata,
            jlhalaman: jlhalaman
        });
    });
}

function infoHasilPencarian(x) {
    let tableFooterKiri = x.tableFooterKiri;
    let totalpencarian = x.totalpencarian;
    let total = x.total;
    let keyword = x.keyword;
    let tbody = x.tbody;
    let msgNotFound = x.msgNotFound;
    if (totalpencarian > 0) {
        tableFooterKiri.innerHTML = `<div>Ditemukan <strong>` + totalpencarian + `</strong> dari <strong>` + total + `</strong> untuk pencarian <strong>` + keyword + `</strong> </div>`;
    } else {
        if (keyword != "") {
            tbody.innerHTML = `<tr><td class='load' colspan='` + jlkolom + `'>` + msgNotFound + `</td></tr>`;
            tableFooterKiri.innerHTML = `<div>Tidak ditemukan data <strong>` + keyword + `</strong> </div>`;
        } else {
            tableFooterKiri.innerHTML = `<div>Total data <strong>` + total + `</strong></div>`;
        }
    }
}

function updatePerPage(x) {
    let ID = x.id;
    opsitabel[ID] = {
        jlkolom: jlkolom,
        perpage: x.perpage,
        aktif: x.aktif,
        keyword: x.keyword,
        totalpencarian: x.totalpencarian,
        jldata: x.jldata,
        jlhalaman: x.jlhalaman
    }
    loadData({
        id: ID,
        aktif: x.aktif,
        perpage: x.perpage
    });
}

function loadHapus(x) {
    let ID = x.id;
    let tabel = ID.replace("tabel", "");
    let formHapus = document.querySelectorAll("#formHapus-" + ID);
    if (formHapus) {
        for (let i = 0; i < formHapus.length; i++) {
            formHapus[i].addEventListener("submit", (e) => {
                e.preventDefault();
                let dataID = formHapus[i].dataset.formid;
                let label = formHapus[i].dataset.label;

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
                            abiesoftTabel(x);
                            Toast({
                                tipe: 'success',
                                message: pesan.split("|")[1]
                            });
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
}

