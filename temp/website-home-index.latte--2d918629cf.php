<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/website/home/index.latte */
final class Template_2d918629cf extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/website/home/index.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'css' => 'blockCss', 'content' => 'blockContent', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('css', get_defined_vars()) /* line 3 */;
		$this->renderBlock('content', get_defined_vars()) /* line 4 */;
		$this->renderBlock('js', get_defined_vars()) /* line 10 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = '../main.latte';
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


	/** {block css} on line 3 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block content} on line 4 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<div class="page">
    <div class="art-hijau"></div>
';
		$this->createTemplate('./section/wellcome.latte', $this->params, 'include')->renderToContentType('html') /* line 7 */;
		echo '</div>
';
	}


	/** {block js} on line 10 */
	public function blockJs(array $ʟ_args): void
	{
	}
}
