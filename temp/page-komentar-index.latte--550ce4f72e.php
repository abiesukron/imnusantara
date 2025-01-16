<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\vendor\abiesoft\Http/../../../templates/page/komentar/index.latte */
final class Template_550ce4f72e extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\vendor\\abiesoft\\Http/../../../templates/page/komentar/index.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 57 */;
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

		echo '<div class=\'page\'>
    <div class=\'page-header\'>
        <div class=\'page-info\'>
            <div class=\'display-6\'>';
		echo LR\Filters::escapeHtmlText($title) /* line 8 */;
		echo '</div>
            <div class=\'breadcrumb\'>
                <ul>
                    <li><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo '\'><i class=\'las la-home\'></i></a></li>
                    <li>Komentar</li>
                </ul>
            </div>
        </div>
        <div class=\'page-option\'>
            <form>
                <div class=\'btn-grup\'>
                    <button type=\'button\' class=\'refresh\' onClick=\'abiesoftTabel({
                        id: "tabelkomentar",
                        aktif: 1,
                        perpage: 10
                    })\' title=\'refresh tabel\'><i class=\'las la-sync-alt\'></i></button>
                    <button class=\'download-excel\' type=\'button\' data-tabel=\'komentar\' title=\'Simpan tabel sebagai file excel\'><i class=\'las la-download\'></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class=\'row\'>
        <div class=\'col-12\'>
            <div class=\'card\'>
                <div class=\'card-table\' id=\'tabelkomentar\'>
                    <table class=\'minW-800\'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Opsi</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
';
	}


	/** {block js} on line 57 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
abiesoftTabel({
    id: \'tabelkomentar\',
    aktif: 1,
    perpage: 10
});
</script>
';
	}
}
