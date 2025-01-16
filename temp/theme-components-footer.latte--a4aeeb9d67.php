<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\templates\theme\components\footer.latte */
final class Template_a4aeeb9d67 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\templates\\theme\\components\\footer.latte';

	public const Blocks = [
		['footer' => 'blockFooter'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('footer', get_defined_vars()) /* line 1 */;
	}


	/** {block footer} on line 1 */
	public function blockFooter(array $ʟ_args): void
	{
		echo '<div class="page-footer">
    <div></div>
    <div>&copy; ';
		echo LR\Filters::escapeHtmlText(date('Y')) /* line 4 */;
		echo ' | Tagline Media</div>
</div>
';
	}
}