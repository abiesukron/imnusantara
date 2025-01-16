<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\templates\main.latte */
final class Template_ca4e4ef80a extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\templates\\main.latte';

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
    <meta name="Prefix" content="';
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 7 */;
		echo '">
    <meta name="x-API-key" content="oIalAsd2Iamfj.plqjs">
    <meta name="x-Form-Key" content="">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 10 */;
		echo 'assets/css/style.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo 'assets/css/chart.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 12 */;
		echo 'assets/package/icon8/css/line-awesome.min.css" >
';
		$this->renderBlock('css', get_defined_vars()) /* line 13 */;
		echo '    <title>';
		$this->renderBlock('title', get_defined_vars()) /* line 14 */;
		echo '</title>
</head>
<body>
';
		$this->createTemplate('theme/components/header.latte', $this->params, 'include')->renderToContentType('html') /* line 17 */;
		$this->createTemplate('theme/components/sidebar.latte', $this->params, 'include')->renderToContentType('html') /* line 18 */;
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 20 */;
		echo "\n";
		$this->createTemplate('theme/components/footer.latte', $this->params, 'include')->renderToContentType('html') /* line 22 */;
		$this->renderBlock('popup', get_defined_vars()) /* line 23 */;
		echo '    <div id="toasthere"></div>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 25 */;
		echo 'assets/js/jquery-3.7.0.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 26 */;
		echo 'assets/js/style.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 27 */;
		echo 'assets/js/form.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 28 */;
		echo 'assets/js/tabel.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 29 */;
		echo 'assets/js/chart.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 30 */;
		echo 'assets/js/validasi.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 31 */;
		echo 'assets/js/toast.js"></script>
';
		$this->renderBlock('js', get_defined_vars()) /* line 32 */;
		echo '</body>
</html>';
	}


	/** {block css} on line 13 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block title} on line 14 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo LR\Filters::escapeHtmlText($title) /* line 14 */;
	}


	/** {block content} on line 20 */
	public function blockContent(array $ʟ_args): void
	{
	}


	/** {block popup} on line 23 */
	public function blockPopup(array $ʟ_args): void
	{
	}


	/** {block js} on line 32 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
