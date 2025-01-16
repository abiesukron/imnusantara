<?php

use Latte\Runtime as LR;

/** source: C:\Project\tagline\templates\theme\components\header.latte */
final class Template_00dd98ae53 extends Latte\Runtime\Template
{
	public const Source = 'C:\\Project\\tagline\\templates\\theme\\components\\header.latte';

	public const Blocks = [
		['header' => 'blockHeader'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('header', get_defined_vars()) /* line 1 */;
	}


	/** {block header} on line 1 */
	public function blockHeader(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="topbar">
    <div class="kiri">
        <div class="btn-grup-icon">
            <button>
                <svg id="btnshowhidemenu" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M3 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 5.25Zm0 4.5A.75.75 0 0 1 3.75 9h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 9.75Zm0 4.5a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Zm0 4.5a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </div>
    <div class="kanan">
        <div class="cover" id="btnpopupmenu"><img id="photopopupmenu" src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 13 */;
		echo LR\Filters::escapeHtmlAttr($photo_sesi) /* line 13 */;
		echo '" data-img="photouser"></div>
        <div class="popupmenu">
            <ul>
                <li>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 17 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 17 */;
		echo '/users/read/@';
		echo LR\Filters::escapeHtmlAttr(explode('@', $email_sesi)[0]) /* line 17 */;
		echo '/profile">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"></path>
                        </svg>
                        <span>Akun</span>
                    </a>
                </li>
                <li>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 25 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 25 */;
		echo '/users/read/@';
		echo LR\Filters::escapeHtmlAttr(explode('@', $email_sesi)[0]) /* line 25 */;
		echo '/tugas">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M2.625 6.75a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0A.75.75 0 0 1 8.25 6h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75ZM2.625 12a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0ZM7.5 12a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12A.75.75 0 0 1 7.5 12Zm-4.875 5.25a1.125 1.125 0 1 1 2.25 0 1.125 1.125 0 0 1-2.25 0Zm4.875 0a.75.75 0 0 1 .75-.75h12a.75.75 0 0 1 0 1.5h-12a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Tugas</span>
                    </a>
                </li>
                <li>
                    <a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 33 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 33 */;
		echo '/users/read/@';
		echo LR\Filters::escapeHtmlAttr(explode('@', $email_sesi)[0]) /* line 33 */;
		echo '/aktifitas">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                        </svg>
                        <span>Aktifitas</span>
                    </a>
                </li>
';
		if ($namagrup_sesi == 'Administrator') /* line 40 */ {
			echo '                    <li>
                        <a href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 42 */;
			echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 42 */;
			echo '/users/read/@';
			echo LR\Filters::escapeHtmlAttr(explode('@', $email_sesi)[0]) /* line 42 */;
			echo '/seting">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.325.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.431l-1.003.827c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.955.26 1.43l-1.298 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.47 6.47 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.281c-.09.543-.56.94-1.11.94h-2.594c-.55 0-1.019-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.431l1.004-.827c.292-.24.437-.613.43-.991a6.932 6.932 0 0 1 0-.255c.007-.38-.138-.751-.43-.992l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.086.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"></path>
                            </svg>
                            <span>Seting</span>
                        </a>
                    </li>
';
		}
		echo '                <li><div class="batas"></div></li>
                <li>
                    <form method="POST" id="formLogout" name="formLogout" data-nama="';
		echo LR\Filters::escapeHtmlAttr($nama_sesi) /* line 53 */;
		echo '">
                        <input type="hidden" id="__method" name="__method" value="LOGOUT">
                        <button href="javascript:void(0)">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9"></path>
                            </svg>
                            <span>Logout</span>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
';
	}
}
