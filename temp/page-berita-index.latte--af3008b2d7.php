<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\vendor\abiesoft\Http/../../../templates/page/berita/index.latte */
final class Template_af3008b2d7 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\vendor\\abiesoft\\Http/../../../templates/page/berita/index.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 64 */;
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
                    <li>Berita</li>
                </ul>
            </div>
        </div>
        <div class=\'page-option\'>
            <form>
                <div class=\'btn-grup\'>
                    <button type=\'button\' onClick=\'window.location.href=this.dataset.link\' data-link="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 19 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 19 */;
		echo '/berita/add"><i class=\'las la-plus\'></i><span>Buat</span></button>
                    <button type=\'button\' class=\'refresh\' onClick=\'abiesoftTabel({
                        id: "tabelberita",
                        aktif: 1,
                        perpage: 10
                    })\' title=\'refresh tabel\'><i class=\'las la-sync-alt\'></i></button>
                    <button class=\'download-excel\' type=\'button\' data-tabel=\'berita\' title=\'Simpan tabel sebagai file excel\'><i class=\'las la-download\'></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class=\'row\'>
        <div class=\'col-12\'>
            <div class=\'card\'>
                <div class=\'card-table\' id=\'tabelberita\'>
                    <table class=\'minW-800\'>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Dibaca</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Kategori</th>
                                <th>Dibaca</th>
                                <th>Status</th>
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


	/** {block js} on line 64 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
abiesoftTabel({
    id: \'tabelberita\',
    aktif: 1,
    perpage: 10
});
</script>
';
	}
}
