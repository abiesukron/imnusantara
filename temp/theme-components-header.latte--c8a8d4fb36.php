<?php

use Latte\Runtime as LR;

/** source: E:\Sukron\Backup 9 Oktober 2024\Sukron\Project\tagline\templates\website\theme\components\header.latte */
final class Template_c8a8d4fb36 extends Latte\Runtime\Template
{
	public const Source = 'E:\\Sukron\\Backup 9 Oktober 2024\\Sukron\\Project\\tagline\\templates\\website\\theme\\components\\header.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="header">
    <div class="container">
        <div class="header-cover">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 4 */;
		echo 'assets/images/website/cover.jpg">
        </div>
    </div>
    <div class="header-brand">
        <div class="container flex-between">
            <img class="pointer" src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 9 */;
		echo 'assets/images/website/logo_tagline.png" onClick="window.location.href=this.dataset.link" data-link="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 9 */;
		echo '">
            <div class="flex-between">
                <div class="header-search">
                    <input id="search" placeholder="Cari..">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z"></path>
                    </svg>
                </div>
                <button data-model="buttonShowHideMenu">
                    <svg data-model="buttonShowHideMenu" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <div class="header-menu" data-model="showHideMenu">
        <div class="container">
            <ul>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 28 */;
		echo '">Home</a></li>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 29 */;
		echo 'berita/index/nasional">Nasional</a></li>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 30 */;
		echo 'berita/index/institusi">Institusi</a></li>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 31 */;
		echo 'berita/index/kriminal">Kriminal</a></li>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 32 */;
		echo 'berita/index/politik">Politik</a></li>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 33 */;
		echo 'berita/index/kata-warga">Kata Warga</a></li>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 34 */;
		echo 'berita/index/olah-raga">Olah Raga</a></li>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 35 */;
		echo 'berita/index/edukasi">Edukasi</a></li>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 36 */;
		echo 'lipsus">Video Lipsus</a></li>
                <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 37 */;
		echo 'poling">Klik Poling</a></li>
            </ul>
        </div>
    </div>
    <div class="header-marquee">
        <div class="container">
            <div class="header-marquee-label">Highlight</div>
            <marquee>
                <a href="javascript:void(0)">Judul Berita 1</a>
                <a href="javascript:void(0)">Judul Berita 2</a>
            </marquee>
        </div>
    </div>
</div>';
	}
}
