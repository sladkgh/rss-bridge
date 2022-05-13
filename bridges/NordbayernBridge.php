<?php

class NordbayernBridge extends BridgeAbstract {

	const MAINTAINER = 'schabi.org';
	const NAME = 'Nordbayern';
	const CACHE_TIMEOUT = 3600;
	const URI = 'https://www.nordbayern.de';
	const DESCRIPTION = 'Bridge for Bavarian regional news site nordbayern.de';
	const PARAMETERS = array( array(
		'region' => array(
			'name' => 'region',
			'type' => 'list',
			'exampleValue' => 'Nürnberg',
			'title' => 'Select a region',
			'values' => array(
				'Nürnberg' => 'nuernberg',
				'Fürth' => 'fuerth',
				'Erlangen' => 'erlangen',
				'Altdorf' => 'altdorf',
				'Ansbach' => 'ansbach',
				'Bad Windsheim' => 'bad-windsheim',
				'Bamberg' => 'bamberg',
				'Dinkelsbühl/Feuchtwangen' => 'dinkelsbuehl-feuchtwangen',
				'Feucht' => 'feucht',
				'Forchheim' => 'forchheim',
				'Gunzenhausen' => 'gunzenhausen',
				'Hersbruck' => 'hersbruck',
				'Herzogenaurach' => 'herzogenaurach',
				'Hilpoltstein' => 'hilpoltstein',
				'Höchstadt' => 'hoechstadt',
				'Lauf' => 'lauf',
				'Neumarkt' => 'neumarkt',
				'Neustadt/Aisch' => 'neustadt-aisch',
				'Pegnitz' => 'pegnitz',
				'Roth' => 'roth',
				'Rothenburg o.d.T.' => 'rothenburg-o-d-t',
				'Treuchtlingen' => 'treuchtlingen',
				'Weißenburg' => 'weissenburg'
			)
		),
		'policeReports' => array(
			'name' => 'Police Reports',
			'type' => 'checkbox',
			'exampleValue' => 'checked',
			'title' => 'Include Police Reports',
		)
	));

	private function getValidImage($picture) {
		$img = $picture->find('img', 0);
		if ($img) {
			$imgUrl = $img->src;
			if(!str_contains($imgUrl, 'logo-vnp.png')  &&
				!str_contains($imgUrl, 'logo-vnp.png') &&
				!str_contains($imgUrl, 'logo-nuernberger-nachrichten.png') &&
				!str_contains($imgUrl, 'logo-nordbayern.png') &&
				!str_contains($imgUrl, 'logo-nuernberger-nachrichten.png') &&
				!str_contains($imgUrl, 'logo-erlanger-nachrichten.png') &&
				!str_contains($imgUrl, 'logo-nordbayerische-nachrichten.png') &&
				!str_contains($imgUrl, 'logo-fuerther-nachrichten.png') &&
				!str_contains($imgUrl, 'logo-altmuehl-bote.png') &&
				!str_contains($imgUrl, 'logo-weissenburger-tagblatt.png') &&
				!str_contains($imgUrl, 'logo-treuchtlinger-kurier.png') &&
				!str_contains($imgUrl, 'logo-neumarkter-nachrichten.png') &&
				!str_contains($imgUrl, 'logo-roth-hilpoltsteiner-volkszeitung.png') &&
				!str_contains($imgUrl, 'logo-hilpoltsteiner-zeitung.png') &&
				!str_contains($imgUrl, 'logo-schwabacher-tagblatt.png')) {
				return '<br><img src="' . $imgUrl . '">';
			}
		}
		return '';
	}

	private function getUseFullContent($rawContent) {
		$content = '';
		foreach($rawContent->children as $element) {
			if(($element->tag === 'p' || $element->tag === 'h3') &&
				$element->class !== 'article__teaser') {
				$content .= $element;
			} else if($element->tag === 'main') {
				$content .= self::getUseFullContent($element->find('article', 0));
			} else if($element->tag === 'header') {
				$content .= self::getUseFullContent($element);
			} else if($element->tag === 'div' &&
				!str_contains($element->class, 'article__infobox') &&
				!str_contains($element->class, 'authorinfo')) {
				$content .= self::getUseFullContent($element);
			} else if($element->tag === 'section' &&
				(str_contains($element->class, 'article__richtext') ||
					str_contains($element->class, 'article__context'))) {
				$content .= self::getUseFullContent($element);
			} else if($element->tag === 'picture') {
				$content .= self::getValidImage($element);
			}
		}
		return $content;
	}

	private function getTeaser($content) {
		$teaser = $content->find('p[class=article__teaser]', 0);
		if($teaser == null) {
			return '';
		}
		$teaser = $teaser->plaintext;
		$teaser = preg_replace('/ {143}- {66}/', ' - ', $teaser);
		$teaser = preg_replace('/ {53}/', '', $teaser);
		$teaser = '<p class="article__teaser">' . $teaser . '</p>';
		return $teaser;
	}

	private function handleArticle($link) {
		$item = array();
		$article = getSimpleHTMLDOM($link);
		defaultLinkTo($article, self::URI);
		$content = $article->find('article[id=article]', 0);
		$item['uri'] = $link;

		$author = $article->find('[id="openAuthor"]', 0);
		if ($author) {
			$item['author'] = $author->plaintext;
		}

		$createdAt = $article->find('[class=article__release]', 0);
		if ($createdAt) {
			$item['timestamp'] = strtotime(str_replace('Uhr', '', $createdAt->plaintext));
		}

		if ($article->find('h2', 0) == null) {
			$item['title'] = $article->find('h3', 0)->innertext;
		} else {
			$item['title'] = $article->find('h2', 0)->innertext;
		}
		$item['content'] = '';

		if ($article->find('section[class*=article__richtext]', 0) == null) {
			$content = $article->find('div[class*=modul__teaser]', 0)
						   ->find('p', 0);
			$item['content'] .= $content;
		} else {
			$content = $article->find('article', 0);
			// change order of article teaser in order to show it on top
			// of the title image. If we didn't do this some rss programs
			// would show the subtitle of the title image as teaser instead
			// of the actuall article teaser.
			$item['content'] .= self::getTeaser($content);
			$item['content'] .= self::getUseFullContent($content);
		}

		// exclude police reports if desired
		if($this->getInput('policeReports') ||
			!str_contains($item['content'], 'Hier geht es zu allen aktuellen Polizeimeldungen.')) {
			$this->items[] = $item;
		}

		$article->clear();
	}

	private function handleNewsblock($listSite) {
		$main = $listSite->find('main', 0);
		foreach($main->find('article') as $article) {
			$url = $article->find('a', 0)->href;
			$url = urljoin(self::URI, $url);
			self::handleArticle($url);
		}
	}

	public function collectData() {
		$region = $this->getInput('region');
		if($region === 'rothenburg-o-d-t') {
			$region = 'rothenburg-ob-der-tauber';
		}
		$url = self::URI . '/region/' . $region;
		$listSite = getSimpleHTMLDOM($url);

		self::handleNewsblock($listSite);
	}
}
