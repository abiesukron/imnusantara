<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\vendor\abiesoft\Http/../../../templates/website/berita/read.latte */
final class Template_79a23a9d5d extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\vendor\\abiesoft\\Http/../../../templates/website/berita/read.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'css' => 'blockCss', 'content' => 'blockContent', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('css', get_defined_vars()) /* line 3 */;
		$this->renderBlock('content', get_defined_vars()) /* line 6 */;
		$this->renderBlock('js', get_defined_vars()) /* line 306 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = '../main.latte';
		return get_defined_vars();
	}


	/** {block title} on line 2 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo LR\Filters::escapeHtmlText($title) /* line 2 */;
	}


	/** {block css} on line 3 */
	public function blockCss(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 4 */;
		echo 'assets/package/owl/dist/assets/owl.carousel.min.css">
';
	}


	/** {block content} on line 6 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<section class="putih" id="berita" data-id="';
		echo LR\Filters::escapeHtmlAttr($beritaID) /* line 7 */;
		echo '">
    <div class="container">
        <div class="row read">
            <div class="col-8">
                <div class="block" id="blockkategori">
                    <span class="shimmer" style="background: #eee;  width: 15%; height: 30px; margin-top: 0px;"></span>
                    <div>&nbsp;</div>
                </div>  
                <div class="block">
                    <div class="display-5" id="blockjudul">
                        <span class="shimmer" style="background: #eee;  width: 100%; height: 30px;"></span>
                        <span class="shimmer" style="background: #eee;  width: 30%; height: 30px; margin-top: 0px;"></span>
                    </div>
                </div>
                <div class="block">
                    <div class="cover" id="blockcover">
                        <span class="shimmer" style="display: block; background: #eee;  width: 100%; height: 400px;"></span>
                    </div>
                </div>  
                <div class="block mt-10">
                    <div>
                        <div class=\'infogambar\' id="blockinfo">
                            <span class="shimmer" style="background: #eee;  width: 150px; height: 20px;"></span>
                        </div>
                        <div class=\'waktu text-center\' id="blockwaktu">
                            <span class="shimmer" style="background: #eee;  width: 150px; height: 20px;"></span>
                        </div>
                        <div class=\'text-center mt-10\'>
                            Bagikan ke :
                        </div>
                        <div class=\'button-png-grup mt-10\' id="blocksosial">
                            <button class="shimmer" style="cursor: unset; width: 35px; height: 35px; border-radius: 50%; background: #eee;"></button>
                            <button class="shimmer" style="cursor: unset; width: 35px; height: 35px; border-radius: 50%; background: #eee;"></button>
                            <button class="shimmer" style="cursor: unset; width: 35px; height: 35px; border-radius: 50%; background: #eee;"></button>
                            <button class="shimmer" style="cursor: unset; width: 35px; height: 35px; border-radius: 50%; background: #eee;"></button>
                        </div>
                    </div> 
                </div>  
                <div class="block mt-20 isi-berita" id="isiberita">
                    <span class="shimmer" style="background: #eee;  width: 100%; height: 20px;"></span>
                    <span class="shimmer" style="background: #eee;  width: 100%; height: 20px;"></span>
                    <span class="shimmer" style="background: #eee;  width: 30%; height: 20px; margin-top: 0px;"></span>
                    <span class="shimmer" style="background: #eee;  width: 100%; height: 20px; margin-top: 20px;"></span>
                    <span class="shimmer" style="background: #eee;  width: 100%; height: 20px;"></span>
                    <span class="shimmer" style="background: #eee;  width: 10%; height: 20px; margin-top: 0px;"></span>
                    <span class="shimmer" style="background: #eee;  width: 100%; height: 20px; margin-top: 20px;"></span>
                    <span class="shimmer" style="background: #eee;  width: 100%; height: 20px;"></span>
                    <span class="shimmer" style="background: #eee;  width: 25%; height: 20px; margin-top: 0px;"></span>
                </div>    
                <div class="block mt-20" id="blockkomentar"></div>     
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-badge">
                        <label class="badge-label">Terkait</label>
                    </div>
                    <div class="card-list overflow-off" id="terkait">

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>
                    
                    </div>
                </div>


                <div class="card">
                    <div class="card-badge">
                        <label class="badge-label">Terbaru</label>
                    </div>
                    <div class="card-list overflow-off" id="terbaru">

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>
                    
                    </div>
                </div>
            </div>

            <div class="col-12 left-custom">
                <div class="card">
                    <!-- 
                        Slide
                    
                    
                    -->

                    <div class="banner-998-200">
                        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 212 */;
		echo 'assets/images/website/banner_5.jpg">
                    </div>

                    <div class="white-page row right-custom">
                        <div class="card-badge x-custom">
                            <label class="badge-label">Edukasi</label>
                            <button onClick="window.location.href=this.dataset.link" data-link="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 218 */;
		echo 'berita/index/edukasi">
                                <span>Index</span>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path fill-rule="evenodd" d="M12.97 3.97a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 0 1 0 1.06l-7.5 7.5a.75.75 0 1 1-1.06-1.06l6.22-6.22H3a.75.75 0 0 1 0-1.5h16.19l-6.22-6.22a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="card-x" id="edukasi">
                            <a class="item-list">
                                <div class="cover-list">
                                    <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                                </div>
                                <div class="info-list">
                                    <div class="judul">
                                        <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                        <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    </div>
                                    <div class="deskripsi">
                                        <div class="shimmer" style="width: 100%; height: 15px; background: #eee;"></div>
                                        <div class="shimmer" style="width: 100%; height: 15px; background: #eee;"></div>
                                        <div class="shimmer" style="width: 60%; height: 15px; background: #eee;"></div>
                                    </div>
                                    <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                                </div>
                            </a>

                            <a class="item-list">
                                <div class="cover-list">
                                    <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                                </div>
                                <div class="info-list">
                                    <div class="judul">
                                        <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                        <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    </div>
                                    <div class="deskripsi">
                                        <div class="shimmer" style="width: 100%; height: 15px; background: #eee;"></div>
                                        <div class="shimmer" style="width: 100%; height: 15px; background: #eee;"></div>
                                        <div class="shimmer" style="width: 60%; height: 15px; background: #eee;"></div>
                                    </div>
                                    <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                                </div>
                            </a>

                            <a class="item-list">
                                <div class="cover-list">
                                    <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                                </div>
                                <div class="info-list">
                                    <div class="judul">
                                        <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                        <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    </div>
                                    <div class="deskripsi">
                                        <div class="shimmer" style="width: 100%; height: 15px; background: #eee;"></div>
                                        <div class="shimmer" style="width: 100%; height: 15px; background: #eee;"></div>
                                        <div class="shimmer" style="width: 60%; height: 15px; background: #eee;"></div>
                                    </div>
                                    <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                                </div>
                            </a>

                            <a class="item-list">
                                <div class="cover-list">
                                    <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                                </div>
                                <div class="info-list">
                                    <div class="judul">
                                        <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                        <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    </div>
                                    <div class="deskripsi">
                                        <div class="shimmer" style="width: 100%; height: 15px; background: #eee;"></div>
                                        <div class="shimmer" style="width: 100%; height: 15px; background: #eee;"></div>
                                        <div class="shimmer" style="width: 60%; height: 15px; background: #eee;"></div>
                                    </div>
                                    <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
';
	}


	/** {block js} on line 306 */
	public function blockJs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script>
let beritaID = document.getElementById("berita").dataset.id;
/*
    Detail Berita

    --------------------
*/
let pageAktif = 1;
let arrayIsi = [];
let konten = "";
let btnPagination = "";
let perPage = 8;
let elIsi = document.getElementById("isiberita");
fetch(Baseurl + "api/berita/detail/"+beritaID, {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let kategori = result.data.namakategori;
        let judul = result.data.judul;
        let cover = result.data.cover;
        let infogambar = result.data.infogambar;
        let penulis = result.data.penulis;
        let waktu = result.data.tglterbit;
        let isi = htmlToArray.byDiv(result.data.isi);
        arrayIsi = isi;
        let urlberita = Baseurl + result.data.slug;
        document.getElementById("blockkategori").innerHTML = `<span class="badge">`+kategori+`</span><div>&nbsp;</div>`;
        document.getElementById("blockjudul").innerHTML = judul;
        document.getElementById("blockcover").innerHTML = `<img src=\'`+Baseurl+cover+`\'>`;
        document.getElementById("blockinfo").innerHTML = infogambar;
        document.getElementById("blockwaktu").innerHTML = `<span class=\'penulis strong\'>`+penulis+`</span> | <span>` + datetimeConverter.toSimpleTime(waktu) + `</span>`;
        document.getElementById("blocksosial").innerHTML = `
            <button onclick="window.location.href=this.dataset.link" data-link="javascript:void(0)">
                <img src=\'`+Baseurl+`assets/images/icon/icons8-copy-48.png\'>
            </button>
            <button onclick="window.location.href=this.dataset.link" data-link="https://twitter.com/intent/tweet?text=`+urlberita+`">
                <img src=\'`+Baseurl+`assets/images/icon/icons8-twitter-48.png\'>
            </button>
            <button onclick="window.location.href=this.dataset.link" data-link="whatsapp://send?text=`+urlberita+`">
                <img src=\'`+Baseurl+`assets/images/icon/icons8-whatsapp-48.png\'>
            </button>
            <button class="fb" onclick="window.location.href=this.dataset.link" data-link="https://www.facebook.com/sharer/sharer.php?u=`+urlberita+`">
                <img src=\'`+Baseurl+`assets/images/icon/icons8-facebook-48.png\'>
            </button>
        `;


       
        let jumlahPage = isi.length / perPage;
        for(let i=0; i<isi.length; i++){
            if(i < perPage){
                konten += `<div class=\'mt-20\'>`+isi[i]+`</div>`;
            }
        }

        for(let a=1; a < jumlahPage + 1; a++){
            if(a == pageAktif){
                btnPagination += `<button class=\'active\' onClick=\'setPageAktif(this.dataset.page)\' data-page=\'`+a+`\'>`+a+`</button>`;
            }else{
                btnPagination += `<button onClick=\'setPageAktif(this.dataset.page)\' data-page=\'`+a+`\'>`+a+`</button>`;
            }
        }

        if(jumlahPage > 1){
            elIsi.innerHTML = konten + `<div class=\'btn-page\'>`+btnPagination+`</div>`;
        }else{
            elIsi.innerHTML = konten;
        }


        if(result.data.komentar == "aktif"){

            document.getElementById("blockkomentar").innerHTML = `
                <div class="withSesiUser">
                    <div class="labelKomentar">
                        <span>Komentar</span>
                    </div>
                    <form method="post">
                        <div class="komentar">
                            <div class="header">
                                <div class="photo">
                                    <img src="https://newprofilepic.photo-cdn.net//assets/images/article/profile.jpg?90af0c8">
                                </div>
                                <div class="info">
                                    <div>
                                        <div>Arunika Uta</div>
                                        <small>Baru saja</small>
                                    </div>
                                </div>
                            </div>
                            <div class="form-grup">
                                <textarea class="form-control" data-tipe=\'editor-only\'></textarea>
                            </div>
                        </div>
                    </form>
                </div>
                <div id=\'showkomentar\'>
                    <div class="komentar">
                        <div class="header">
                            <div class="photo">
                                <img src="https://newprofilepic.photo-cdn.net//assets/images/article/profile.jpg?90af0c8">
                            </div>
                            <div class="info">
                                <div>
                                    <div>Arunika Uta</div>
                                    <small>Baru saja</small>
                                </div>
                            </div>
                            <div class="expresi">
                                <img src="';
		echo LR\Filters::escapeJs($url) /* line 417 */;
		echo 'assets/images/website/emoticon/kaget.png">
                            </div>
                        </div>
                        <div class="body">                            
                            <div>Ini adalah komentar anda</div>
                        </div>
                    </div>
                </div>
            `;

        }else{
            document.getElementById("blockkomentar").innerHTML = "";
        }
        
    }
}).catch(error => {
    console.log(error);
});

function setPageAktif(x){
    konten = "";
    btnPagination = "";
    elIsi.innerHTML = "";
    pageAktif = x;
    let jumlahPage = arrayIsi.length / perPage;
    for(let i=0; i<arrayIsi.length; i++){
        if(pageAktif == 1){
            awal = 0;
            if(i < perPage){
                konten += `<div class=\'mt-20\'>`+arrayIsi[i]+`</div>`;
            }
        }else{
            let range = Number(pageAktif) * perPage - perPage;
            let awal = range - 1;
            let batas = range + perPage;
            if(i > awal && i < batas){
                konten += `<div class=\'mt-20\'>`+arrayIsi[i]+`</div>`;
            }
        }
    }
    for(let a=1; a< jumlahPage + 1; a++){
        if(a == pageAktif){
            btnPagination += `<button class=\'active\' onClick=\'setPageAktif(this.dataset.page)\' data-page=\'`+a+`\'>`+a+`</button>`;
        }else{
            btnPagination += `<button onClick=\'setPageAktif(this.dataset.page)\' data-page=\'`+a+`\'>`+a+`</button>`;
        }
    }
    if(jumlahPage > 1){
        elIsi.innerHTML = konten + `<div class=\'btn-page\'>`+btnPagination+`</div>`;
    }else{
        elIsi.innerHTML = konten;
    }
}


/*
    Terkait

    --------------------
*/
let terkait = el(\'#berita\');
let kat = "";
if(el(\'#berita\')){
    kat = "/"+terkait.dataset.id;
}

fetch(Baseurl + "api/berita/terkait"+kat, {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let terkait = document.getElementById("terkait");
        let konten = "";
        let link = "";
        let th = "";
        for(let i=0; i<result.data.length; i++){
            th = result.data[i].tglpublis.split(" ")[0].replaceAll("-","/");
            link = Baseurl +\'berita/baca/\'+th+\'/\'+result.data[i].slug;
            konten += `
                <a href="`+link+`" class="item-list">
                    <div class="cover-list">
                        <img src="`+result.data[i].cover+`">
                    </div>
                    <div class="info-list">
                        <div class="judul">`+result.data[i].judul+`</div>
                        <div class="time">`+datetimeConverter.toTimeStamp(result.data[i].tglpublis)+`</div>
                    </div>
                </a>
            `;
        }

        terkait.innerHTML = konten;
    }
}).catch(error => {
    console.log(error);
});




/*
    Terbaru

    --------------------
*/
fetch(Baseurl + "api/berita/terbaru", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let terbaru = document.getElementById("terbaru");
        let konten = "";
        let link = "";
        let th = "";
        for(let i=0; i<result.data.length; i++){
            th = result.data[i].tglpublis.split(" ")[0].replaceAll("-","/");
            link = Baseurl +\'berita/baca/\'+th+\'/\'+result.data[i].slug;
            konten += `
                <a href="`+link+`" class="item-list">
                    <div class="cover-list">
                        <img src="`+result.data[i].cover+`">
                    </div>
                    <div class="info-list">
                        <div class="judul">`+result.data[i].judul+`</div>
                        <div class="time">`+datetimeConverter.toTimeStamp(result.data[i].tglpublis)+`</div>
                    </div>
                </a>
            `;
        }

        terbaru.innerHTML = konten;
    }
}).catch(error => {
    console.log(error);
});


/*
    Edukasi

    --------------------
*/
fetch(Baseurl + "api/berita/edukasi", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let edukasi = document.getElementById("edukasi");
        let konten = "";
        let link = "";
        let th = "";
        for(let i=0; i<result.data.length; i++){
            th = result.data[i].tglpublis.split(" ")[0].replaceAll("-","/");
            link = Baseurl +\'berita/baca/\'+th+\'/\'+result.data[i].slug;
            konten += `
                <a href="`+link+`" class="item-list">
                    <div class="cover-list">
                        <img src="`+result.data[i].cover+`">
                    </div>
                    <div class="info-list">
                        <div class="judul">`+result.data[i].judul+`</div>
                        <div class="deskripsi">
                            `+result.data[i].potongan.substr(0,180)+" [...]"+`
                        </div>
                        <div class="time">`+datetimeConverter.toTimeStamp(result.data[i].tglpublis)+`</div>
                    </div>
                </a>
            `;
        }

        edukasi.innerHTML = konten;
    }
}).catch(error => {
    console.log(error);
});
</script>
';
	}
}
