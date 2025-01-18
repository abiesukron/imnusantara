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
        <a href="https://youtube.com/@im_nusantaraofficial?si=ARr7hYI_MaDzSHqz" class="icon">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 8 */;
		echo 'assets/images/icon/icons8-youtube-48.png">
        </a>
        <a href="https://www.instagram.com/im_nusantaraofficial?igsh=aTZ4bDYyYzJ5OWFm" class="icon">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo 'assets/images/icon/icons8-instagram-48.png">
        </a>
        <a href="https://x.com/imnusantara_?t=vKCQHnTmwA_0aZIcSmw1TQ&s=08" class="icon">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 17 */;
		echo 'assets/images/icon/icons8-twitter-48.png">
        </a>
        <a href="https://www.tiktok.com/@im.nusantaraofficial?_t=ZS-8tAESmMmd2F&_r=1" class="icon">
            <img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 20 */;
		echo 'assets/images/icon/icons8-tiktok-48.png">
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
