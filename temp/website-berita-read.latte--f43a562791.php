<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/website/berita/read.latte */
final class Template_f43a562791 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/website/berita/read.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 58 */;
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
                    <div class="flex-between">
                        <span class=\'waktu\' id="blockwaktu">
                            <span class="shimmer" style="background: #eee;  width: 150px; height: 20px;"></span>
                        </span>
                        <div class=\'button-icon-grup\' id="blocksosial">
                            <button class="shimmer" style="cursor: unset; width: 35px; height: 35px; border-radius: 50%; background: #eee;"></button>
                            <button class="shimmer" style="cursor: unset; width: 35px; height: 35px; border-radius: 50%; background: #eee;"></button>
                            <button class="shimmer" style="cursor: unset; width: 35px; height: 35px; border-radius: 50%; background: #eee;"></button>
                        </div>
                    </div> 
                </div>  
                <div class="block mt-20" id="isiberita">
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
                Kanan
            </div>
        </div>
    </div>
</section>
';
	}


	/** {block js} on line 58 */
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
        let waktu = result.data.tglterbit;
        let isi = htmlToArray.byDiv(result.data.isi);
        arrayIsi = isi;
        let urlberita = Baseurl + result.data.slug;
        document.getElementById("blockkategori").innerHTML = `<span class="badge">`+kategori+`</span><div>&nbsp;</div>`;
        document.getElementById("blockjudul").innerHTML = judul;
        document.getElementById("blockcover").innerHTML = `<img src=\'`+Baseurl+cover+`\'>`;
        document.getElementById("blockwaktu").innerHTML = datetimeConverter.toSimpleTime(waktu);
        document.getElementById("blocksosial").innerHTML = `
            <button onclick="window.location.href=this.dataset.link" data-link="https://www.facebook.com/sharer/sharer.php?u=`+urlberita+`">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="size-6">
                    <path d="M7.5 3.375c0-1.036.84-1.875 1.875-1.875h.375a3.75 3.75 0 0 1 3.75 3.75v1.875C13.5 8.161 14.34 9 15.375 9h1.875A3.75 3.75 0 0 1 21 12.75v3.375C21 17.16 20.16 18 19.125 18h-9.75A1.875 1.875 0 0 1 7.5 16.125V3.375Z" />
                    <path d="M15 5.25a5.23 5.23 0 0 0-1.279-3.434 9.768 9.768 0 0 1 6.963 6.963A5.23 5.23 0 0 0 17.25 7.5h-1.875A.375.375 0 0 1 15 7.125V5.25ZM4.875 6H6v10.125A3.375 3.375 0 0 0 9.375 19.5H16.5v1.125c0 1.035-.84 1.875-1.875 1.875h-9.75A1.875 1.875 0 0 1 3 20.625V7.875C3 6.839 3.84 6 4.875 6Z" />
                </svg>
            </button>
            <button onclick="window.location.href=this.dataset.link" data-link="whatsapp://send?text=`+urlberita+`">
                <svg height="800px" width="800px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" 
                    viewBox="0 0 58 58" xml:space="preserve">
                    <g>
                        <path d="M0,58l4.988-14.963C2.457,38.78,1,33.812,1,28.5C1,12.76,13.76,0,29.5,0S58,12.76,58,28.5
                            S45.24,57,29.5,57c-4.789,0-9.299-1.187-13.26-3.273L0,58z"/>
                        <path style="fill:#FFFFFF;" d="M47.683,37.985c-1.316-2.487-6.169-5.331-6.169-5.331c-1.098-0.626-2.423-0.696-3.049,0.42
                            c0,0-1.577,1.891-1.978,2.163c-1.832,1.241-3.529,1.193-5.242-0.52l-3.981-3.981l-3.981-3.981c-1.713-1.713-1.761-3.41-0.52-5.242
                            c0.272-0.401,2.163-1.978,2.163-1.978c1.116-0.627,1.046-1.951,0.42-3.049c0,0-2.844-4.853-5.331-6.169
                            c-1.058-0.56-2.357-0.364-3.203,0.482l-1.758,1.758c-5.577,5.577-2.831,11.873,2.746,17.45l5.097,5.097l5.097,5.097
                            c5.577,5.577,11.873,8.323,17.45,2.746l1.758-1.758C48.048,40.341,48.243,39.042,47.683,37.985z"/>
                    </g>
                </svg>
            </button>
            <button class="fb" onclick="window.location.href=this.dataset.link" data-link="https://www.facebook.com/sharer/sharer.php?u=`+urlberita+`">
                <svg width="800px" height="800px" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" class="bi bi-facebook">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                </svg>
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
		echo LR\Filters::escapeJs($url) /* line 179 */;
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
</script>
';
	}
}
