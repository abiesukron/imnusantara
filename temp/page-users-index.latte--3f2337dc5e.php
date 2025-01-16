<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/page/users/index.latte */
final class Template_3f2337dc5e extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page/users/index.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 69 */;
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
                    <li>Users</li>
                </ul>
            </div>
        </div>
        <div class="page-option">
            <form>
                <div class="btn-grup">
                    <button type="button" onClick="window.location.href=this.dataset.link" data-link="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 24 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 24 */;
		echo '/users/add"><i class="las la-plus"></i><span>Buat</span></button>
                    <button type="button" class="refresh" onClick="abiesoftTabel({
                        id: \'tabelusers\',
                        aktif: 1,
                        perpage: 10
                    })" title="refresh tabel"><i class="las la-sync-alt"></i></button>
                    <button class="download-excel" type="button" data-tabel="users" title="Simpan tabel sebagai file excel"><i class="las la-download"></i></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-table" id="tabelusers">
                    <table class="minW-800">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Grup</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Grup</th>
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


	/** {block js} on line 69 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
    abiesoftTabel({
        id: \'tabelusers\',
        aktif: 1,
        perpage: 10
    });
</script>
';
	}
}
