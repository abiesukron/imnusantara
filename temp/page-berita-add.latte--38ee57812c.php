<?php

use Latte\Runtime as LR;

/** source: C:\Project\tagline\vendor\abiesoft\Http/../../../templates/page/berita/add.latte */
final class Template_38ee57812c extends Latte\Runtime\Template
{
	public const Source = 'C:\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page/berita/add.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 134 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['k' => '67'], $this->params) as $ʟ_v => $ʟ_l) {
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
                        <li>Form Berita</li>
                    </ul>
                </div>
            </div>
            <div class=\'page-option\'></div>
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
                            <input class=\'form-control\' id=\'judul\' name=\'judul\' placeholder=\'Judul Berita\' autocomplete=\'off\' autofocus>
                        </div>
                        <div class=\'form-grup\'>
                            <label for=\'slug\'>Slug berita</label>
                            <input class=\'form-control\' id=\'showslug\' name=\'showslug\' placeholder=\'Slug berita\' autocomplete=\'off\' disabled>
                            <input type="hidden" id=\'slug\' name=\'slug\'>
                        </div>
                        <div class=\'form-grup\'>
                            <label for=\'potongan\'>Potongan berita</label>
                            <textarea data-tipe="editor-only" class=\'form-control\' id=\'potongan\' name=\'potongan\' placeholder=\'Potongan Berita\'></textarea>
                        </div>
                        <div class=\'form-grup\'>
                            <label for=\'isi\'>Isi berita</label>
                            <textarea data-tipe="editor" class=\'form-control\' id=\'isi\' name=\'isi\' placeholder=\'Isi berita\'></textarea>
                        </div>
                        <div class=\'form-grup\'>
                            <label for=\'cover\'>Cover berita</label>
                            <input type="file" class=\'form-control\' id=\'cover\' name=\'cover\' placeholder=\'Cover berita\'>
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
                            <input data-tipe="tag" class=\'form-control\' id=\'tag\' name=\'tag\' placeholder=\'Tag Berita\' autocomplete=\'off\'>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class=\'form-grup\'>
                                    <label for=\'kategoriid\'>Kategori berita</label>
                                    <select class=\'form-control\' id=\'kategoriid\' name=\'kategoriid\'>
                                        <option value="">Kategori Berita</option>
';
		foreach ($kategori as $k) /* line 67 */ {
			echo '                                            <option value="';
			echo LR\Filters::escapeHtmlAttr($k->id) /* line 68 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($k->nama) /* line 68 */;
			echo '</option>
';

		}

		echo '                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class=\'form-grup\'>
                                    <label for=\'komentar\'>Komentar</label>
                                    <select class=\'form-control\' id=\'komentar\' name=\'komentar\'>
                                        <option value="">Aktifkan Komentar Berita</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="tidak">Matikan</option>
                                    </select>
                                </div>
                            </div>
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
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 96 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 96 */;
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
                                        <option value="">Publikasi</option>
                                        <option value="terbit">Terbit</option>
                                        <option value="draft">Draft</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class=\'form-grup\'>
                                    <label for=\'jadwal\'>Jadwal Publikasi</label>
                                    <input type="datetime-local" class=\'form-control\' id=\'jadwal\' name=\'jadwal\' placeholder=\'Jadwal publikasi\' autocomplete=\'off\'>
                                </div>
                            </div>
                        </div>
                        <div class=\'form-button\'>
                            <button class=\'btn btn-primary\'><span id=\'btnSubmit\'>Simpan</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
';
	}


	/** {block js} on line 134 */
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
            \'cover|setText\',
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
            labelButton: \'Simpan\',
            messageSuccess: \'Berita telah dibuat\',
            resetForm: [
                \'judul\',
                \'potongan\',
                \'isi\',
                \'cover\',
                \'tag\',
                \'kategoriid\',
                \'komentar\',
                \'publikasi\',
                \'jadwal\'
            ],
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
