<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\vendor\abiesoft\Http/../../../templates/website/home/index.latte */
final class Template_af406a10ea extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\vendor\\abiesoft\\Http/../../../templates/website/home/index.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 13 */;
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

		$this->createTemplate('./section/block1.latte', $this->params, 'include')->renderToContentType('html') /* line 7 */;
		$this->createTemplate('./section/block2.latte', $this->params, 'include')->renderToContentType('html') /* line 8 */;
		$this->createTemplate('./section/block3.latte', $this->params, 'include')->renderToContentType('html') /* line 9 */;
		$this->createTemplate('./section/block4.latte', $this->params, 'include')->renderToContentType('html') /* line 10 */;
		$this->createTemplate('./section/block5.latte', $this->params, 'include')->renderToContentType('html') /* line 11 */;
	}


	/** {block js} on line 13 */
	public function blockJs(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 14 */;
		echo 'assets/package/owl/dist/owl.carousel.min.js"></script>
<script>

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
    Populer

    --------------------
*/
fetch(Baseurl + "api/berita/populer", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let populer = document.getElementById("populer");
        let konten = "";
        let link = "";
        let th = "";
        for(let i=0; i<result.data.length; i++){
            th = result.data[i].tglpublis.split(" ")[0].replaceAll("-","/");
            link = Baseurl +\'berita/baca/\'+th+\'/\'+result.data[i].slug;
            konten += `
                <a href="`+link+`" class=\'item\'>
                    <div>`+(i+1)+`</div>
                    <div>`+result.data[i].judul+`</div>
                </a>
            `;
        }

        populer.innerHTML = konten;
    }
}).catch(error => {
    console.log(error);
});


/*
    Nasional

    --------------------
*/
fetch(Baseurl + "api/berita/nasional", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let nasionalBig = document.getElementById("nasional1");
        let nasionalSmall = document.getElementById("nasional2");
        let bigKonten = "";
        let smallKonten = "";
        let link = "";
        let th = "";
        for(let i=0; i<result.data.length; i++){
            if(i == 0 || i == 1){
                th = result.data[i].tglpublis.split(" ")[0].replaceAll("-","/");
                link = Baseurl +\'berita/baca/\'+th+\'/\'+result.data[i].slug;
                bigKonten += `
                    <a href="`+link+`" class="item-list">
                        <div class="cover-list">
                            <img src="`+result.data[i].cover+`">
                        </div>
                        <div class="info-list">
                            <div class="judul">`+result.data[i].judul+`</div>
                            <div class="deskripsi">`+result.data[i].potongan.substr(0,180)+" [...]"+`</div>
                            <div class="time">`+datetimeConverter.toTimeStamp(result.data[i].tglpublis)+`</div>
                        </div>
                    </a>
                `;
            }else{
                th = result.data[i].tglpublis.split(" ")[0].replaceAll("-","/");
                link = Baseurl +\'berita/baca/\'+th+\'/\'+result.data[i].slug;
                smallKonten += `
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
        }

        nasionalBig.innerHTML = bigKonten;
        nasionalSmall.innerHTML = smallKonten;
    }
}).catch(error => {
    console.log(error);
});

/*
    Kriminal

    --------------------

fetch(Baseurl + "api/berita/kriminal", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let kriminal = document.getElementById("kriminal");
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

        kriminal.innerHTML = konten;
    }
}).catch(error => {
    console.log(error);
});

*/









/*
    Politik

    --------------------
*/
fetch(Baseurl + "api/berita/politik", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let politik = document.getElementById("politik");
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

        politik.innerHTML = konten;
    }
}).catch(error => {
    console.log(error);
});

/*
    Bisnis

    --------------------
*/
fetch(Baseurl + "api/berita/bisnis", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let bisnis = document.getElementById("bisnis");
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

        bisnis.innerHTML = konten;
    }
}).catch(error => {
    console.log(error);
});

/*
    Kata Warga

    --------------------
*/
fetch(Baseurl + "api/berita/katawarga", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let katawarga = document.getElementById("katawarga");
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

        katawarga.innerHTML = konten;
    }
}).catch(error => {
    console.log(error);
});

/*
    Institusi

    --------------------
*/
fetch(Baseurl + "api/berita/institusi", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let institusiBig = document.getElementById("institusi1");
        let institusiSmall = document.getElementById("institusi2");
        let bigKonten = "";
        let smallKonten = "";
        let link = "";
        let th = "";
        for(let i=0; i<result.data.length; i++){
            if(i == 0 || i == 1){
                th = result.data[i].tglpublis.split(" ")[0].replaceAll("-","/");
                link = Baseurl +\'berita/baca/\'+th+\'/\'+result.data[i].slug;
                bigKonten += `
                    <a href="`+link+`" class="item-list">
                        <div class="cover-list">
                            <img src="`+result.data[i].cover+`">
                        </div>
                        <div class="info-list">
                            <div class="judul">`+result.data[i].judul+`</div>
                            <div class="deskripsi">`+result.data[i].potongan.substr(0,180)+" [...]"+`</div>
                            <div class="time">`+datetimeConverter.toTimeStamp(result.data[i].tglpublis)+`</div>
                        </div>
                    </a>
                `;
            }else{
                th = result.data[i].tglpublis.split(" ")[0].replaceAll("-","/");
                link = Baseurl +\'berita/baca/\'+th+\'/\'+result.data[i].slug;
                smallKonten += `
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
        }

        institusiBig.innerHTML = bigKonten;
        institusiSmall.innerHTML = smallKonten;
    }
}).catch(error => {
    console.log(error);
});

/*
    Lintas Berita

    --------------------
*/
fetch(Baseurl + "api/berita/lintasberita", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let lintasberita = document.getElementById("lintasberita");
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

        lintasberita.innerHTML = konten;
    }
}).catch(error => {
    console.log(error);
});

/*
    Olah Raga

    --------------------
*/
fetch(Baseurl + "api/berita/olahraga", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let olahraga = document.getElementById("olahraga");
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

        olahraga.innerHTML = konten;
    }
}).catch(error => {
    console.log(error);
});

/*
    Internasional

    --------------------
*/
fetch(Baseurl + "api/berita/internasional", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let internasional = document.getElementById("internasional");
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

        internasional.innerHTML = konten;
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

$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        loop:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        items:1
    });
});

$(document).ready(function(){
    $(".owl-yt").owlCarousel({
        loop:true,
        autoplay:true,
        autoplayTimeout:5000,
        autoplayHoverPause:true,
        items: 1
    });
});
</script>
';
	}
}
