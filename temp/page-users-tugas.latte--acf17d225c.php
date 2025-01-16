<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\vendor\abiesoft\Http/../../../templates/page/users/tugas.latte */
final class Template_acf17d225c extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\vendor\\abiesoft\\Http/../../../templates/page/users/tugas.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 61 */;
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
                    <li><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 17 */;
		echo 'users\'>Users</a></li>
                    <li>Tugas</li>
                </ul>
            </div>
        </div>
        <div class="page-option"></div>
    </div>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-search">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"></path>
                    </svg>
                    <input id="searchList" name="searchList" placeholder="Ketik untuk mencari..">
                </div>
                <div class="card-list">
                    <ul>
                        <li>
                            <div class="info">
                                <label>Judul</label>
                                <div class="deskripsi">
                                    <div>Deskripsi</div>
                                    <div>Sukron Abbayroad</div>
                                </div>
                            </div>
                            <div class="opsi">
                                <button title="Review Teruskan/ Kembalikan">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5"></path>
                                    </svg>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>
';
	}


	/** {block js} on line 61 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>

</script>
';
	}
}
