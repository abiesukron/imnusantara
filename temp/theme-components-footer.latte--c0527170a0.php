<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\templates\theme\components\footer.latte */
final class Template_c0527170a0 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\templates\\theme\\components\\footer.latte';

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
		echo ' | IM Nusantara</div>
</div>
';
	}
}
