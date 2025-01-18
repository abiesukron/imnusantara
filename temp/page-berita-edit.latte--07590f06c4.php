<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\vendor\abiesoft\Http/../../../templates/page/berita/edit.latte */
final class Template_07590f06c4 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\vendor\\abiesoft\\Http/../../../templates/page/berita/edit.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'content' => 'blockContent', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo '

';
		$this->renderBlock('content', get_defined_vars()) /* line 4 */;
		echo "\n";
		$this->renderBlock('js', get_defined_vars()) /* line 152 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['k' => '80'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		$this->parentName = '../../main.latte';
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


	/** {block content} on line 4 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<form id=\'formInput\' name=\'formInput\' method=\'post\'>
    <div class=\'page\'>
        <div class=\'page-header\'>
            <div class=\'page-info\'>
                <div class=\'display-6\'>';
		echo LR\Filters::escapeHtmlText($title) /* line 9 */;
		echo '</div>
                <div class=\'breadcrumb\'>
                    <ul>
                        <li><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 12 */;
		echo '\'><i class=\'las la-home\'></i></a></li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 13 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 13 */;
		echo '/berita">Berita</a></li>
                        <li>Form Edit Berita</li>
                    </ul>
                </div>
            </div>
            <div class=\'page-option\'>
                <div class=\'btn-grup\'>
                    <button type=\'button\' onClick=\'window.location.href=this.dataset.link\' data-link="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 20 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 20 */;
		echo '/berita/read/';
		echo LR\Filters::escapeHtmlAttr($id) /* line 20 */;
		echo '" title="Lihat"><i class=\'las la-eye\'></i></button>
                    <button type=\'button\' onClick=\'window.location.href=this.dataset.link\' data-link="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 21 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 21 */;
		echo '/berita" title="Tabel"><i class=\'las la-table\'></i></button>
                </div>
            </div>
        </div>
        <div class=\'row\'>
            <div class=\'col-12\'>
                <div class=\'card\'>
                    <div class=\'card-header\'>
                        <div>Detail Berita</div>
                    </div>
                    <div class=\'card-form\'>
                        <div class=\'form-grup\'>
                            <label for=\'judul\'>Judul berita</label>
                            <input class=\'form-control\' id=\'judul\' name=\'judul\' placeholder=\'Judul Berita\' autocomplete=\'off\' value="';
		echo LR\Filters::escapeHtmlAttr($judul) /* line 34 */;
		echo '" autofocus>
                        </div>
                        <div class=\'form-grup\'>
                            <label for=\'slug\'>Slug berita</label>
                            <input class=\'form-control\' id=\'showslug\' name=\'showslug\' placeholder=\'Slug berita\' autocomplete=\'off\' value="';
		echo LR\Filters::escapeHtmlAttr($slug) /* line 38 */;
		echo '" disabled>
                            <input type="hidden" id=\'slug\' name=\'slug\' value="';
		echo LR\Filters::escapeHtmlAttr($slug) /* line 39 */;
		echo '">
                        </div>
                        <div class=\'form-grup\'>
                            <label for=\'potongan\'>Potongan berita</label>
                            <textarea data-tipe="editor-only" class=\'form-control\' id=\'potongan\' name=\'potongan\' placeholder=\'Potongan Berita\'>';
		echo LR\Filters::escapeHtmlText($potongan) /* line 43 */;
		echo '</textarea>
                        </div>
                        <div class=\'form-grup\'>
                            <label for=\'isi\'>Isi berita</label>
                            <textarea data-tipe="editor" class=\'form-control\' id=\'isi\' name=\'isi\' placeholder=\'Isi berita\'>';
		echo LR\Filters::escapeHtmlText($isi) /* line 47 */;
		echo '</textarea>
                        </div>
                        <div class=\'form-grup\'>
                            <div class="page-cover">
                                <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 51 */;
		echo LR\Filters::escapeHtmlAttr($cover) /* line 51 */;
		echo '" width=\'100%\'>
                            </div>
                            <label for=\'cover\' class="mt-20">Ganti Cover</label>
                            <input type="file" class=\'form-control\' id=\'cover\' name=\'cover\' placeholder=\'Cover berita\'>
                            <small>Upload file untuk mengganti cover yang lama</small>
                        </div>      
                        <div class=\'form-grup\'>
                            <label for=\'infogambar\'>Keterangan gambar</label>
                            <input class=\'form-control\' id=\'infogambar\' name=\'infogambar\' placeholder=\'Informasi gambar\'>
                        </div>                
                    </div>
                </div>
            </div>
            <div class=\'col-12\'>
                <div class=\'card\'>
                    <div class=\'card-header\'>
                        <div>Setingan</div>
                    </div>
                    <div class=\'card-form\'>
                        <div class=\'form-grup\'>
                            <label for=\'tag\'>Tag berita</label>
                            <input data-tipe="tag" class=\'form-control\' id=\'tag\' name=\'tag\' value="';
		echo LR\Filters::escapeHtmlAttr($tag) /* line 72 */;
		echo '" placeholder=\'Tag Berita\' autocomplete=\'off\'>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class=\'form-grup\'>
                                    <label for=\'kategoriid\'>Kategori berita</label>
                                    <select class=\'form-control\' id=\'kategoriid\' name=\'kategoriid\'>
                                        <option value="';
		echo LR\Filters::escapeHtmlAttr($idkategori) /* line 79 */;
		echo '">';
		echo LR\Filters::escapeHtmlText($namakategori) /* line 79 */;
		echo '</option>
';
		foreach ($kategori as $k) /* line 80 */ {
			echo '                                            <option value="';
			echo LR\Filters::escapeHtmlAttr($k->id) /* line 81 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($k->nama) /* line 81 */;
			echo '</option>
';

		}

		echo '                                    </select>
                                </div>
                            </div>
                            <input type=\'hidden\' id=\'komentar\' name=\'komentar\' value=\'tidak\'>
                            <!-- 
                            <div class="col-6">
                                <div class=\'form-grup\'>
                                    <label for=\'komentar\'>Komentar</label>
                                    <select class=\'form-control\' id=\'komentar\' name=\'komentar\'>
                                        <option value="';
		echo LR\Filters::escapeHtmlComment($komentar) /* line 92 */;
		echo '">';
		echo LR\Filters::escapeHtmlComment(($this->filters->capitalize)($komentar)) /* line 92 */;
		echo '</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak">Matikan</option>
                                    </select>
                                </div>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
            </div>
            <div class=\'col-12\'>
                <div class=\'card\'>
                    <div class=\'card-form\'>
                        <div class=\'form-grup\'>
                            <div class="form-info">
                                <div><strong>Jadwal publikasi</strong> digunakan untuk menunda penayangan di halaman website sampai dengan jadwal yang sudah ditentukan. tapi proses publikasi tetap 
                                menunggu penyuntingan dari <strong>Editor</strong>. Sehingga sekalipun status publikasi <strong>terbit</strong> dan jadwal publikasi <strong>sudah lewat</strong>, berita akan tetap berstatus <strong>pending</strong> 
                                dan berita tetap akan diterbitkan <strong>setelah proses penyuntingan</strong> dari Editor selesai.</div>
                                <div class="mt-20">
                                    <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 112 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 112 */;
		echo '/berita">
                                        <span>Lihat berita-berita yang sudah anda buat disini</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class=\'form-grup\'>
                                    <label for=\'publikasi\'>Publikasi</label>
                                    <select class=\'form-control\' id=\'publikasi\' name=\'publikasi\'>
                                        <option value="';
		echo LR\Filters::escapeHtmlAttr($publikasi) /* line 126 */;
		echo '">';
		echo LR\Filters::escapeHtmlText(($this->filters->capitalize)($publikasi)) /* line 126 */;
		echo '</option>
                                        <option value="terbit">Terbit</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class=\'form-grup\'>
                                    <label for=\'jadwal\'>Jadwal Publikasi</label>
                                    <input type="datetime-local" class=\'form-control\' id=\'jadwal\' name=\'jadwal\' value="';
		echo LR\Filters::escapeHtmlAttr($jadwal) /* line 135 */;
		echo '" placeholder=\'Jadwal publikasi\' autocomplete=\'off\'>
                                </div>
                            </div>
                        </div>
                        <div class=\'form-button\'>
                            <input type="hidden" id="id" name="id" value="';
		echo LR\Filters::escapeHtmlAttr($id) /* line 140 */;
		echo '">
                            <input type="hidden" id="__method" name="__method" value="PATCH">
                            <button class=\'btn btn-primary\'><span id=\'btnSubmit\'>Simpan Perubahan</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
';
	}


	/** {block js} on line 152 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
let formInput = el(\'#formInput\');
formInput.addEventListener(\'submit\', (e)=>{
    e.preventDefault();

    let val = validasi({
        formID: \'formInput\',
        validate: [
            \'judul|setText\',
            \'potongan|setText\',
            \'isi|setText\',
            \'tag|setPilihan\',
            \'kategoriid|setPilihan\',
            \'komentar|setPilihan\',
            \'publikasi|setPilihan\',
            \'jadwal|setText\'
        ],
    });

    if(val){
        submitForm({
            formID: \'formInput\',
            loadingLabel: \'Menyimpan..\',
            tabel: \'berita\',
            labelButton: \'Simpan Perubahan\',
            messageSuccess: \'Berita telah diperbarui\',
            focus: \'judul\'
        });

    }
});


let inputJudul = el("#judul");
if(inputJudul){
    inputJudul.addEventListener("keyup", ()=>{
        let showslug = el("#showslug");
        let slug = el("#slug");
        showslug.value = slugRemoverChar(inputJudul.value);
        slug.value = slugRemoverChar(inputJudul.value);
    });
}
</script>
';
	}
}
