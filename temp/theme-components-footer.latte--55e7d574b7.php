<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\templates\website\theme\components\footer.latte */
final class Template_55e7d574b7 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\templates\\website\\theme\\components\\footer.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="footer">
    <div class="footer-brand">
        <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 3 */;
		echo 'assets/images/website/logo_footer.png">
        <div>Hadir, Berbuat, Bermanfaat</div>
    </div>
    <div class="footer-brand-icon">
        <a href="javascript:void(0)" class="icon">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 8 */;
		echo 'assets/images/website/youtube.png">
        </a>
        <a href="javascript:void(0)" class="icon">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo 'assets/images/website/ig.png">
        </a>
        <a href="javascript:void(0)" class="icon">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 14 */;
		echo 'assets/images/website/fb.png">
        </a>
        <a href="javascript:void(0)" class="icon">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 17 */;
		echo 'assets/images/website/x.png">
        </a>
        <a href="javascript:void(0)" class="icon">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 20 */;
		echo 'assets/images/website/tiktok.png">
        </a>
    </div>
    <div class="footer-link">
        <a href="javascript:void(0)">Tentang Kami</a>
        <a href="javascript:void(0)">Tim Redaksi</a>
        <a href="javascript:void(0)">Kontak Kami</a>
    </div>
    <div class="footer-menu">
        <ul>
            <li><a href="javascript:void(0)">Berita Terbaru</a></li>
            <li><a href="javascript:void(0)">Liputan Khusus</a></li>
            <li><a href="javascript:void(0)">Klik Poling</a></li>
        </ul>
    </div>
    <div class="footer-copy">
        Copyright &copy; 2024 - IM Nusantara
    </div>
</div>';
	}
}
