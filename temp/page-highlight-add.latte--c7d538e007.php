<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/page/highlight/add.latte */
final class Template_c7d538e007 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page/highlight/add.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 58 */;
	}


	public function prepare(): array
	{
		extract($this->params);

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
                        <li><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 13 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 13 */;
		echo '/highlight\'>Highlight</a></li>
                        <li>Buat</li>
                    </ul>
                </div>
            </div>
            <div class=\'page-option\'></div>
        </div>
        <div class=\'row\'>
            <div class=\'col-6\'>
                <div class=\'card\'>
                    <div class=\'card-header\'>
                        <div>Form Buat highlight</div>
                    </div>
                    <div class=\'card-form\'>
                        <div class=\'form-grup\'>
                            <label for=\'judul\'>Judul</label>
                            <input class=\'form-control\' id=\'judul\' name=\'judul\' placeholder=\'Judul highlight\' autofocus>
                        </div>
                        <div class=\'form-grup\'>
                            <label for=\'link\'>Link terkait</label>
                            <input class=\'form-control\' id=\'link\' name=\'link\' placeholder=\'Link berita/ yang terkait judul\'>
                        </div>
                        <div class=\'form-grup\'>
                            <label for=\'status\'>Status</label>
                            <select class=\'form-control\' id=\'status\' name=\'status\'>
                                <option value=\'\'>Pilih Status Publikasi</option>
                                <option value=\'Aktif\'>Aktif</option>
                                <option value=\'Tidak\'>Tidak</option>
                            </select>
                        </div>
                        <div class=\'form-grup\'>
                            <label for=\'expire\'>Tanggal expire</label>
                            <input type=\'date\' class=\'form-control\' id=\'expire\' name=\'expire\'>
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


	/** {block js} on line 58 */
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
        \'link|setText\',
        \'status|setPilihan\',
        \'expire|setText\',
        ],
    });

    if(val){
        submitForm({
            formID: \'formInput\',
            loadingLabel: \'Menyimpan..\',
            tabel: \'highlight\',
            labelButton: \'Simpan\',
            messageSuccess: \'Highlight telah dibuat\',
            resetForm: [\'judul\',\'link\',\'status\',\'expire\'],
            focus: \'judul\'
        });

    }
});
</script>
';
	}
}
