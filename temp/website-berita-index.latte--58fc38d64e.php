<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/website/berita/index.latte */
final class Template_58fc38d64e extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/website/berita/index.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 169 */;
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

		echo '<section class="putih min-vh">
    <div class="container">
        <div class="row">
            <div class="col-4">
                <div class="side-menu">
                    <ul data-konten="';
		echo LR\Filters::escapeHtmlAttr($kategori) /* line 12 */;
		echo '">
                        <li ';
		if ($kategori == 'Nasional') /* line 13 */ {
			echo ' class=\'active\'; ';
		}
		echo ' ><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 13 */;
		echo 'berita/index/nasional">Nasional</a></li>
                        <li ';
		if ($kategori == 'Institusi') /* line 14 */ {
			echo ' class=\'active\'; ';
		}
		echo '><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 14 */;
		echo 'berita/index/institusi">Institusi</a></li>
                        <li ';
		if ($kategori == 'Kriminal') /* line 15 */ {
			echo ' class=\'active\'; ';
		}
		echo '><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 15 */;
		echo 'berita/index/kriminal">Kriminal</a></li>
                        <li ';
		if ($kategori == 'Politik') /* line 16 */ {
			echo ' class=\'active\'; ';
		}
		echo '><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 16 */;
		echo 'berita/index/politik">Politik</a></li>
                        <li ';
		if ($kategori == 'Kata Warga') /* line 17 */ {
			echo ' class=\'active\'; ';
		}
		echo '><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 17 */;
		echo 'berita/index/kata-warga">Kata Warga</a></li>
                        <li ';
		if ($kategori == 'Olah Raga') /* line 18 */ {
			echo ' class=\'active\'; ';
		}
		echo '><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 18 */;
		echo 'berita/index/olah-raga">Olah Raga</a></li>
                        <li ';
		if ($kategori == 'Edukasi') /* line 19 */ {
			echo ' class=\'active\'; ';
		}
		echo '><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 19 */;
		echo 'berita/index/edukasi">Edukasi</a></li>
                        <li ';
		if ($kategori == 'Bisnis') /* line 20 */ {
			echo ' class=\'active\'; ';
		}
		echo '><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 20 */;
		echo 'berita/index/bisnis">Bisnis</a></li>
                        <li ';
		if ($kategori == 'Lintas Berita') /* line 21 */ {
			echo ' class=\'active\'; ';
		}
		echo '><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 21 */;
		echo 'berita/index/lintas-berita">Lintas Berita</a></li>
                        <li ';
		if ($kategori == 'Internasional') /* line 22 */ {
			echo ' class=\'active\'; ';
		}
		echo '><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 22 */;
		echo 'berita/index/internasional">Internasional</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-8">
                <div class="indexHeader">
                    <div class="info">
                        <div>index dari kategori</div>
                        <label>';
		echo LR\Filters::escapeHtmlText($kategori) /* line 30 */;
		echo '</label>
                    </div>
                    <div class="opsi">
                        <button class="active">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 0 1 1.5 18.375V5.625ZM21 9.375A.375.375 0 0 0 20.625 9h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5Zm0 3.75a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5Zm0 3.75a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 0 0 .375-.375v-1.5ZM10.875 18.75a.375.375 0 0 0 .375-.375v-1.5a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375h7.5ZM3.375 15h7.5a.375.375 0 0 0 .375-.375v-1.5a.375.375 0 0 0-.375-.375h-7.5a.375.375 0 0 0-.375.375v1.5c0 .207.168.375.375.375Zm0-3.75h7.5a.375.375 0 0 0 .375-.375v-1.5A.375.375 0 0 0 10.875 9h-7.5A.375.375 0 0 0 3 9.375v1.5c0 .207.168.375.375.375Z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                        <button>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0A.75.75 0 0 1 8.25 6h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM2.625 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 12a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12A.75.75 0 0 1 7.5 12Zm-4.875 5.25a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
                <div class="grid-content" id="kontenIndex">
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
    </div>
</section>
';
	}


	/** {block js} on line 169 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>

/*
    Edukasi

    --------------------
*/
let activePage = el(\'ul[data-konten]\');
fetch(Baseurl + "api/berita/index_"+activePage.dataset.konten.toLowerCase().replaceAll(" ",""), {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    if(result.message == "OK"){
        let kontenIndex = document.getElementById("kontenIndex");
        let konten = "";
        let th = "";
        let link = "";
        for(let i=0; i<result.data.length; i++){
            th = result.data[i].tglpublis.split(" ")[0].replaceAll("-","/");
            link = Baseurl + `berita/baca/`+th+`/`+result.data[i].slug;
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

        kontenIndex.innerHTML = konten;
    }else {
        window.location.href = Baseurl;
    }
}).catch(error => {
    console.log(error);
});
</script>
';
	}
}
