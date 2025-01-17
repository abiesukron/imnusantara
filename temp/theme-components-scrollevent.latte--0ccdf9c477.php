<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\templates\website\theme\components\scrollevent.latte */
final class Template_0ccdf9c477 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\templates\\website\\theme\\components\\scrollevent.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="scrollToTop">
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
        <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06l-6.22-6.22V21a.75.75 0 0 1-1.5 0V4.81l-6.22 6.22a.75.75 0 1 1-1.06-1.06l7.5-7.5Z" clip-rule="evenodd"></path>
    </svg>
</div>
<div class="buttonPolling" onClick=\'window.location.href=this.dataset.link\' data-link=\'';
		echo LR\Filters::escapeHtmlAttr($url) /* line 6 */;
		echo 'poling\'>
    <label>Klik Poling</label>
    <div class="lingkaran">
        <div class="inside">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path d="M18.375 2.25c-1.035 0-1.875.84-1.875 1.875v15.75c0 1.035.84 1.875 1.875 1.875h.75c1.035 0 1.875-.84 1.875-1.875V4.125c0-1.036-.84-1.875-1.875-1.875h-.75ZM9.75 8.625c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v11.25c0 1.035-.84 1.875-1.875 1.875h-.75a1.875 1.875 0 0 1-1.875-1.875V8.625ZM3 13.125c0-1.036.84-1.875 1.875-1.875h.75c1.036 0 1.875.84 1.875 1.875v6.75c0 1.035-.84 1.875-1.875 1.875h-.75A1.875 1.875 0 0 1 3 19.875v-6.75Z"></path>
            </svg>
            <div></div>
        </div>
    </div>
</div>
';
		if ($nama_sesi != '') /* line 17 */ {
			echo '<div class="menu-dashboard">
    <label>Halo, <span>';
			echo LR\Filters::escapeHtmlText($nama_sesi) /* line 19 */;
			echo '</span></label>
    <div class="btn-grup">
        <button title="Dashboard" onClick="window.location.href=this.dataset.link" data-link="';
			echo LR\Filters::escapeHtmlAttr($url) /* line 21 */;
			echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 21 */;
			echo '">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                <path fill-rule="evenodd" d="M2.25 5.25a3 3 0 0 1 3-3h13.5a3 3 0 0 1 3 3V15a3 3 0 0 1-3 3h-3v.257c0 .597.237 1.17.659 1.591l.621.622a.75.75 0 0 1-.53 1.28h-9a.75.75 0 0 1-.53-1.28l.621-.622a2.25 2.25 0 0 0 .659-1.59V18h-3a3 3 0 0 1-3-3V5.25Zm1.5 0v7.5a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5v-7.5a1.5 1.5 0 0 0-1.5-1.5H5.25a1.5 1.5 0 0 0-1.5 1.5Z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </div>
</div>
';
		}
	}
}
