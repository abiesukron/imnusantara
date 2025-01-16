<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/theme/error/404.latte */
final class Template_f5d5191b9b extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/theme/error/404.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-API-key" content="8508fb67480f042c6429bb02a251aad3edb67582">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 7 */;
		echo 'assets/css/style.css">
    <link rel="stylesheet" href="assets/package/icon8/css/line-awesome.min.css" >
    <title>Error 404 | Not Found</title>
</head>
<body class="center-page">
    <div class="semibold">
        404 | Not Found Error
    </div>
</body>
</html>';
	}
}
