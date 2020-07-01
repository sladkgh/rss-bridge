<?php
class BundestagParteispendenBridge extends BridgeAbstract {
	const MAINTAINER = 'mibe';
	const NAME = 'Deutscher Bundestag - Parteispenden';
	const URI = <<<URI
https://www.bundestag.de/ajax/filterlist/de/parlament/praesidium/parteienfinanzierung/fundstellen50000/462002-462002
URI;

	const CACHE_TIMEOUT = 86400; // 24h
	const DESCRIPTION = 'Returns the latest "soft money" donations to parties represented in the German Bundestag.';
	const CONTENT_TEMPLATE = <<<TMPL
<p><b>Partei:</b><br>%s</p>
<p><b>Spendenbetrag:</b><br>%s</p>
<p><b>Spender:</b><br>%s</p>
<p><b>Eingang der Spende:</b><br>%s</p>
TMPL;

	public function getIcon()
	{
		return 'https://www.bundestag.de/static/appdata/includes/images/layout/favicon.ico';
	}

	public function collectData()
	{
		// Get the main page
		$html = getSimpleHTMLDOMCached(self::URI, self::CACHE_TIMEOUT)
			or returnServerError('Could not request ' . self::URI);

		// Build the URL from the first anchor element. The list is sorted by year, descending, so the first element is the current year.
		$firstAnchor = $html->find('a', 0)
			or returnServerError('Could not find the proper HTML element.');

		$url = 'https://www.bundestag.de' . $firstAnchor->href;

		// Get the actual page with the soft money donations
		$html = getSimpleHTMLDOMCached($url, self::CACHE_TIMEOUT)
			or returnServerError('Could not request ' . $url);

		$rows = $html->find('table.table > tbody > tr')
			or returnServerError('Could not find the proper HTML elements.');

		foreach($rows as $row) {
			$item = $this->generateItemFromRow($row);
			if (is_array($item)) {
				$item['uri'] = $url;
				$this->items[] = $item;
			}
		}
	}

	private function generateItemFromRow(simple_html_dom_node $row)
	{
		// The row must have 5 columns. There are monthly header rows, which are ignored here.
		if(count($row->children) != 5)
			return null;

		$item = array();

		//              | column     | paragraph inside column
		$party  = $row->children[0]->children[0]->innertext;
		$amount = $row->children[1]->children[0]->innertext . ' €';
		$donor  = $row->children[2]->children[0]->innertext;
		$date   = $row->children[3]->children[0]->innertext;
		$dip    = $row->children[4]->children[0]->find('a.dipLink', 0);

		$content = sprintf(self::CONTENT_TEMPLATE, $party, $amount, $donor, $date);

		$item = array(
			'title' => $party . ': ' . $amount,
			'content' => $content,
			'uid' => sha1($content),
			'timestamp' => DateTime::createFromFormat('d.m.Y', $date)->getTimestamp(),
			);

		// Try to get the link to the official document
		if ($dip != null)
			$item['enclosures'] = array($dip->href);

		return $item;
	}
}
