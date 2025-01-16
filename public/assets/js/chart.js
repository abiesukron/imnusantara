/*
    ------ Contoh penggunaan 
    abieChart({
        id: "donut-detail",
        ukuran: 250,
        tipe: "donut",
        warna: "red",
        nilai: 10,
        color: 'dark',
    });

*/

function abieChart(x) {
    switch (x.tipe) {
        case 'pie':
            pie(x);
            break;
        default:
            donut(x);
            break;
    }
}

function donut(x) {
    el("#" + x.id).innerHTML = `
        <div class="donut_chart" id="donut-`+ x.id + `">
            <div class="wrapper">
                <span class="number" id="number-`+ x.id + `">0%</span>
            </div>
        </div>
    `;

    let number = el("#number-" + x.id);
    let donut = el("#donut-" + x.id);
    let counter = 0;

    let background = "var(--light-hover)";
    if (x.background) {
        background = x.background;
    }

    let warna = "var(--primary)";
    if (x.warna) {
        warna = x.warna;
    }

    let nilai = 0;
    if (x.nilai) {
        nilai = x.nilai;
    }

    let ukuran = "200px";
    if (x.ukuran) {
        ukuran = x.ukuran + "px";
    }

    setInterval(() => {
        if (counter < nilai.toFixed(2)) {
            counter++;

            if (counter <= nilai) {
                number.innerHTML = counter + "%";
            } else {
                number.innerHTML = nilai.toFixed(2) + "%";
            }

            donut.style.width = ukuran;
            donut.style.height = ukuran;

            donut.style.background = `conic-gradient( ${warna} ${counter * 3.6}deg, ${background} 0deg)`;
        }
    }, 30);

}

function grafikBarV(x) {
    let elID = x.id;
    let barElement = "";
    let data = x.data;

    let datapengunjung = [];
    let datakunjungan = [];
    let persenpengunjung = 0;
    let persenkunjungan = 0;
    let jmldmpengunjung = 0;
    let jmldmkunjungan = 0;

    for (let i = 0; i < data.length; i++) {
        datapengunjung.push(data[i].bardata[0].value);
        datakunjungan.push(data[i].bardata[1].value);
    }

    jmldmpengunjung = Math.max(...datapengunjung);
    jmldmkunjungan = Math.max(...datakunjungan);

    for (let i = 0; i < data.length; i++) {
        persenpengunjung = data[i].bardata[0].value / jmldmpengunjung * 100;
        persenkunjungan = data[i].bardata[1].value / jmldmkunjungan * 100;
        barElement += `
            <div class="bar-block">
                <label>`+ data[i].label.substring(0, 3) + `</label>
                <div class="bar-item" style="cursor:pointer;" onClick='return showDetailV({
                    pengunjung: `+ data[i].bardata[0].value + `,
                    kunjungan: `+ data[i].bardata[1].value + `,
                    label: "Rekap Bulan `+ data[i].label + `"
                })'>
                    <div class="item-1">
                        <label>Pengunjung</label>
                        <div class="bar-progres">
                            <div class="bar-values" style="height: `+ persenpengunjung.toFixed(2) + `%;"></div>
                        </div>
                    </div>
                    <div class="item-2">
                        <label>Kunjungan</label>
                        <div class="bar-progres">
                            <div class="bar-values" style="height: `+ persenkunjungan.toFixed(2) + `%;"></div>
                        </div>
                    </div>
                </div>
            </div>
        `;
    }

    document.getElementById(elID).innerHTML = `
        <div class="vBar">
            `+ barElement + `
        </div>
    `;
}

function showDetailV(x) {
    let pengunjung = 0;
    let kunjungan = 0;
    let label = "";
    let total = 0;
    let persenpengunjung = 0;
    let persenkunjungan = 0;
    pengunjung = x.pengunjung;
    kunjungan = x.kunjungan;
    total = pengunjung + kunjungan;
    label = x.label;
    persenpengunjung = pengunjung / total * 100;
    persenkunjungan = kunjungan / total * 100;
    let popup = document.querySelector(".popup");
    if (popup.classList.contains("none")) {
        popup.classList.remove("none");
    }
    popup.innerHTML = `
            <div class="card fixW-300">
                <div class="card-header">
                    <div>`+ label + `</div>
                    <div class="btn-grup-icon">
                        <button onClick="closePopup()"><i class="las la-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="list flex-between">
                        <div>Total Pengunjung</div>
                        <div class="semibold">`+ pengunjung + ` | ` + persenpengunjung.toFixed(2) + `%</div>
                    </div>
                    <div class="list flex-between">
                        <div>Total Kunjungan</div>
                        <div class="semibold">`+ kunjungan + ` | ` + persenkunjungan.toFixed(2) + `%</div>
                    </div>
                </div>
            </div>
        `;
    abieChart({
        id: "donut-detail",
        ukuran: 220,
        tipe: "donut",
        warna: "var(--tagline)",
        nilai: persen,
        color: 'dark',
    });
    return false;
}

/*
    Grafik Bar Horizontal


    --- contoh untuk menggunakan :
    grafikBarH({
        id: "barKategori",
        data: [
            {
                label: "Kategori 1",
                value: 100,
            },
            {
                label: "Kategori 2",
                value: 12,
            }
        ],
        total: 112,
        urutkan: true
    });
*/

let sumValue = 0;
function grafikBarH(x) {
    let IDe = x.id;
    let data = x.data;
    let total = Number(x.total);
    let urutkan = x.urutkan;
    let area = document.getElementById(IDe);
    let item = "";
    let persen = 0;
    let label = "";
    let totalvalue = 0;

    totalvalue = data.reduce(function (previousValue, currentValue) {
        return {
            value: previousValue.value + currentValue.value
        };
    });

    /* 
        Jika urutkan == true maka data akan diurutkan 
        berdasarkan value tertinggi sampai ke terendah 
    --- */
    if (urutkan == true) {
        data.sort((a, b) => b.value - a.value);
    }

    /* 
        Jika data lebih dari pada 8 maka akan menambahkan button more 
    --- */
    if (data.length > 7) {
        area.setAttribute("style", "height: 300px; overflow: hidden;");
        let more = document.createElement("div");
        more.setAttribute("class", "card-more");
        more.innerHTML = `<button id='btn` + x.id + `' onClick='more(` + IDe + `)'><i class="las la-angle-down"></i></button> `;
        area.parentElement.append(more);
    }

    for (let i = 0; i < data.length; i++) {
        if (data[i].label.length > 20) {
            label = data[i].label.substring(0, 17) + "...";
        } else {
            label = data[i].label;
        }
        persen = Number(data[i].value) / total * 100;
        item += `
            <div div class="bar-item" onClick='return showDetail({
                value: `+ data[i].value + `,
                totalvalue: `+ totalvalue['value'] + `,
                label: "`+ data[i].label + `"
            })'>
                <div class="bar-label">`+ label + `</div>
                <div class="bar-progres">
                    <div class="bar-value" style="width: `+ persen.toFixed(2) + `%;"></div>
                </div>
                <div class="bar-persen">`+ data[i].value + `</div>
            </div>
        `;

    }
    area.innerHTML = `
        <div div class="bar-horizontal" >
            `+ item + `
        </div>
    `;
}

function showDetail(x) {
    let value = 0;
    let total = 0;
    let persen = 0;
    let label = "";
    value = x.value;
    total = x.totalvalue;
    label = x.label;
    persen = Number(value) / total * 100;
    let popup = document.querySelector(".popup");
    if (popup.classList.contains("none")) {
        popup.classList.remove("none");
    }
    popup.innerHTML = `
            <div class="card fixW-300">
                <div class="card-header">
                    <div>`+ label + `</div>
                    <div class="btn-grup-icon">
                        <button onClick="closePopup()"><i class="las la-times"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div id="donut-detail"></div>
                    <div class="list flex-between">
                        <div>Detail Info</div>
                    </div>
                    <div class="list flex-between">
                        <div>Data</div>
                        <div class="semibold">`+ value + `</div>
                    </div>
                    <div class="list flex-between">
                        <div>Total Data</div>
                        <div class="semibold">`+ total + `</div>
                    </div>
                </div>
            </div>
        `;
    abieChart({
        id: "donut-detail",
        ukuran: 220,
        tipe: "donut",
        warna: "var(--tagline)",
        nilai: persen,
        color: 'dark',
    });
    return false;
}

function closePopup() {
    let popup = document.querySelector(".popup");
    popup.classList.add("none");
}

function more(x) {
    if (x.style.height == "300px") {
        x.style.height = "100%";
        x.style.transition = "all .5s";
        document.getElementById("btn" + x.id).innerHTML = `<i class="las la-angle-up"></i>`;
    } else {
        x.style.height = "300px";
        x.style.transition = "all .5s";
        document.getElementById("btn" + x.id).innerHTML = `<i class="las la-angle-down"></i>`;
    }
}