<?php

use Latte\Runtime as LR;

/** source: C:\Project\tagline\vendor\abiesoft\Http/../../../templates/page/berita/read.latte */
final class Template_f4b76f8398 extends Latte\Runtime\Template
{
	public const Source = 'C:\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page/berita/read.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 117 */;
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

		echo '<form id=\'formHapusPage\' name=\'formHapusPage\' method=\'post\' data-tabel="berita" data-formid=\'';
		echo LR\Filters::escapeHtmlAttr($id) /* line 5 */;
		echo '\' data-label=\'';
		echo LR\Filters::escapeHtmlAttr($judul) /* line 5 */;
		echo '\'>
    <div class=\'page berita\'>
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
                        <li>Detail</li>
                    </ul>
                </div>
            </div>
            <div class=\'page-option\'>
                <div class=\'btn-grup\'>
                    <button type=\'button\' onClick=\'window.location.href=this.dataset.link\' data-link="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 20 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 20 */;
		echo '/berita" title="Tabel"><i class=\'las la-table\'></i></button>
                    <button type=\'button\' onClick=\'window.location.href=this.dataset.link\' data-link="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 21 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 21 */;
		echo '/berita/edit/';
		echo LR\Filters::escapeHtmlAttr($id) /* line 21 */;
		echo '" title="Edit"><i class=\'las la-edit\'></i></button>
                    <input type=\'hidden\' id=\'id\' name=\'id\' value=\'';
		echo LR\Filters::escapeHtmlAttr($id) /* line 22 */;
		echo '\'>
                    <input type=\'hidden\' id=\'__method\' name=\'__method\' value=\'DELETE\'>
                    <button type=\'submit\'><i class="las la-times" title="Hapus"></i></button>
                </div>
            </div>
        </div>
        <div class=\'row\'>
            <div class=\'col-12\'>
                <div class="page-cover">
                    <span class="badge ';
		echo LR\Filters::escapeHtmlAttr($badge) /* line 31 */;
		echo '">';
		echo LR\Filters::escapeHtmlText($publikasi) /* line 31 */;
		echo '</span>
                    <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 32 */;
		echo LR\Filters::escapeHtmlAttr($cover) /* line 32 */;
		echo '" width=\'100%\'>
                </div>
                <div class=\'card\'>
                    <div class=\'card-body\'>
                        <div class="display-6 text-center judul">
                            ';
		echo LR\Filters::escapeHtmlText($judul) /* line 37 */;
		echo '
                        </div>
                        <div class="text-justify isi" id="isi">
                            ';
		echo $potongan /* line 40 */;
		echo '
                        </div>
                    </div>
                </div>
            </div>
            <div class=\'col-6\'>
                <div class=\'card\'>
                    <div class=\'card-body\' style=\'height: 153px;\'>
                        <div class="text-center display-7">Dibaca</div>
                        <div class="text-center display-1">';
		echo LR\Filters::escapeHtmlText($dibaca) /* line 49 */;
		echo '</div>
                    </div>
                </div>
            </div>
            <div class=\'col-6\'>
                <div class=\'card\'>
                    <div class=\'card-body\'>
                        <div class="text-center display-7">Informasi</div>
                        <div class="flex-between">
                            <div class="text-semibold">Nama Penulis</div>
                            <div><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 59 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 59 */;
		echo '/users/read/';
		echo LR\Filters::escapeHtmlAttr($uidpenulis) /* line 59 */;
		echo '/profile">';
		echo LR\Filters::escapeHtmlText($penulis) /* line 59 */;
		echo '</a></div>
                        </div>
                        <div class="flex-between">
                            <div class="text-semibold">Nama Editor</div>
                            <div><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 63 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 63 */;
		echo '/users/read/';
		echo LR\Filters::escapeHtmlAttr($uideditor) /* line 63 */;
		echo '/profile">';
		echo LR\Filters::escapeHtmlText($editor) /* line 63 */;
		echo '</a></div>
                        </div>
                        <div class="flex-between">
                            <div class="text-semibold">Dibuat Tanggal</div>
                            <div>';
		echo LR\Filters::escapeHtmlText($dibuat) /* line 67 */;
		echo '</div>
                        </div>
                        <div class="flex-between">
                            <div class="text-semibold">Perbaikan Terakhir Tanggal</div>
                            <div>';
		echo LR\Filters::escapeHtmlText($diupdate) /* line 71 */;
		echo '</div>
                        </div>
                        <div class="flex-between">
                            <div class="text-semibold">Terbit Tanggal</div>
                            <div>';
		echo LR\Filters::escapeHtmlText($diterbitkan) /* line 75 */;
		echo '</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\'col-3\'>
                <div class=\'card\'>
                    <div class=\'card-body\'>
                        <div class="text-center display-7">Dibagikan Dg Copas</div>
                        <div class="text-center display-5">';
		echo LR\Filters::escapeHtmlText($copy) /* line 84 */;
		echo '</div>
                    </div>
                </div>
            </div>
            <div class=\'col-3\'>
                <div class=\'card\'>
                    <div class=\'card-body\'>
                        <div class="text-center display-7">Dibagikan Ke Facebook</div>
                        <div class="text-center display-5">';
		echo LR\Filters::escapeHtmlText($facebook) /* line 92 */;
		echo '</div>
                    </div>
                </div>
            </div>
            <div class=\'col-3\'>
                <div class=\'card\'>
                    <div class=\'card-body\'>
                        <div class="text-center display-7">Dibagikan Ke Twitter</div>
                        <div class="text-center display-5">';
		echo LR\Filters::escapeHtmlText($twitter) /* line 100 */;
		echo '</div>
                    </div>
                </div>
            </div>
            <div class=\'col-3\'>
                <div class=\'card\'>
                    <div class=\'card-body\'>
                        <div class="text-center display-7">Dibagikan Ke Wa</div>
                        <div class="text-center display-5">';
		echo LR\Filters::escapeHtmlText($wa) /* line 108 */;
		echo '</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
';
	}


	/** {block js} on line 117 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
