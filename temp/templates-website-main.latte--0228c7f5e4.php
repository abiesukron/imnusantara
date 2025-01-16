<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\templates\website\main.latte */
final class Template_0228c7f5e4 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\templates\\website\\main.latte';

	public const Blocks = [
		['css' => 'blockCss', 'title' => 'blockTitle', 'content' => 'blockContent', 'popup' => 'blockPopup', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Baseurl" content="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 6 */;
		echo '">
    <meta name="x-API-key" content="';
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('APIKEY')) /* line 7 */;
		echo '">
    <meta name="x-Form-Key" content="">
    <meta name="page" content="';
		echo LR\Filters::escapeHtmlAttr($page) /* line 9 */;
		echo '">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 10 */;
		echo 'assets/css/website/style.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo 'assets/css/website/style_max_600.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 12 */;
		echo 'assets/css/website/style_min_600.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 13 */;
		echo 'assets/css/website/style_min_768.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 14 */;
		echo 'assets/css/website/style_min_992.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 15 */;
		echo 'assets/css/website/style_min_1280.css">
';
		$this->renderBlock('css', get_defined_vars()) /* line 16 */;
		echo '    <title>';
		$this->renderBlock('title', get_defined_vars()) /* line 17 */;
		echo '</title>
</head>
<body>
';
		$this->createTemplate('theme/components/header.latte', $this->params, 'include')->renderToContentType('html') /* line 20 */;
		echo '
    <div class="page">
';
		$this->renderBlock('content', get_defined_vars()) /* line 23 */;
		echo '    </div>

';
		$this->createTemplate('theme/components/footer.latte', $this->params, 'include')->renderToContentType('html') /* line 26 */;
		$this->createTemplate('theme/components/scrollevent.latte', $this->params, 'include')->renderToContentType('html') /* line 27 */;
		$this->renderBlock('popup', get_defined_vars()) /* line 28 */;
		echo '    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 29 */;
		echo 'assets/js/jquery-3.7.0.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 30 */;
		echo 'assets/js/form.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 31 */;
		echo 'assets/js/validasi.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 32 */;
		echo 'assets/js/toast.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 33 */;
		echo 'assets/js/website/script.js"></script>
    <script></script>
';
		$this->renderBlock('js', get_defined_vars()) /* line 35 */;
		echo '</body>
</html>';
	}


	/** {block css} on line 16 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block title} on line 17 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo LR\Filters::escapeHtmlText($title) /* line 17 */;
	}


	/** {block content} on line 23 */
	public function blockContent(array $ʟ_args): void
	{
	}


	/** {block popup} on line 28 */
	public function blockPopup(array $ʟ_args): void
	{
	}


	/** {block js} on line 35 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
