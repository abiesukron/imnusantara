<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\vendor\abiesoft\Http/../../../templates/page/users/aktifitas.latte */
final class Template_b8951693b5 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\vendor\\abiesoft\\Http/../../../templates/page/users/aktifitas.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'content' => 'blockContent', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
		echo "\n";
		$this->renderBlock('js', get_defined_vars()) /* line 56 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['a' => '39'], $this->params) as $ʟ_v => $ʟ_l) {
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


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="page">
    <div class="page-header">
        <div class="page-info">
            <div class="display-6">';
		echo LR\Filters::escapeHtmlText($title) /* line 7 */;
		echo '</div>
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo '\'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                            </svg>
                        </a>
                    </li>
                    <li><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 17 */;
		echo 'users\'>Users</a></li>
                    <li>Histori Aktifitas</li>
                </ul>
            </div>
        </div>
        <div class="page-option">
            <form>
                <div class="btn-grup">
                    <button class="download-excel" type="button" data-tabel="log" title="Simpan tabel sebagai file excel"><i class="las la-download"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="flex-between box">
                        <div><strong>Device</strong></div>
                        <div><strong>Log</strong></div>
                    </div>
';
		foreach ($aktifitas as $a) /* line 39 */ {
			echo '                    <div class="flex-between box">
                        <div>';
			echo LR\Filters::escapeHtmlText($a->device) /* line 41 */;
			echo '</div>
                        <div>
                            <div class="flex-between" style="width: 200px;"><span>In</span> <span>';
			echo LR\Filters::escapeHtmlText($a->login != '' ? \AbieSoft\AsetCode\Utilities\Tanggal::simpelAndTime($a->login) : '-') /* line 43 */;
			echo '</span></div>
                            <div class="flex-between" style="width: 200px;"><span>Out</span> <span>';
			echo LR\Filters::escapeHtmlText($a->logout != '' ? \AbieSoft\AsetCode\Utilities\Tanggal::simpelAndTime($a->logout) : '-') /* line 44 */;
			echo '</span></div>
                        </div>
                    </div>
';

		}

		echo '                </div>
            </div>
        </div>

    </div>
</div>
';
	}


	/** {block js} on line 56 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
    
</script>
';
	}
}
