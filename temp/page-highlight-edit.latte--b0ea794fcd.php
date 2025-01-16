<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/page/highlight/edit.latte */
final class Template_b0ea794fcd extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page/highlight/edit.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 44 */;
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
                        <li>Edit</li>
                    </ul>
                </div>
            </div>
            <div class=\'page-option\'></div>
        </div>
        <div class=\'row\'>
            <div class=\'col-6\'>
                <div class=\'card\'>
                    <div class=\'card-header\'>
                        <div>Form Edit highlight</div>
                    </div>
                    <div class=\'card-form\'>
                        <div class=\'form-grup\'>
                            <label for=\'nama\'>Nama</label>
                            <input class=\'form-control\' id=\'nama\' name=\'nama\' placeholder=\'Nama\' autocomplete=\'off\' autofocus>
                        </div>
                        <div class=\'form-button\'>
                            <input type=\'hidden\' id=\'__method\' name=\'__method\' value=\'PATCH\'>
                            <input type=\'hidden\' id=\'id\' name=\'id\' value=\'';
		echo LR\Filters::escapeHtmlAttr($id) /* line 33 */;
		echo '\'>
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


	/** {block js} on line 44 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
let formInput = el(\'#formInput\');
formInput.addEventListener(\'submit\', (e)=>{
    e.preventDefault();

    let val = validasi({
        formID: \'formInput\',
        validate: [
        \'nama|setText\'
        ],
    });

    if(val){
        submitForm({
            formID: \'formInput\',
            loadingLabel: \'Menyimpan..\',
            tabel: \'highlight\',
            labelButton: \'Simpan\',
            messageSuccess: \'Highlight telah diupdate\',
            focus: \'nama\'
        });

    }
});
</script>
';
	}
}
