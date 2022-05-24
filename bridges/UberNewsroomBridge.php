<?php
class UberNewsroomBridge extends BridgeAbstract {
	const NAME = 'Uber Newsroom Bridge';
	const URI = 'https://tracker.archiveteam.org/';
	const URI_JSON = 'https://newsroomapi.uber.com/wp-json/wp/v2/posts/';
	const DESCRIPTION = 'Returns news posts';
	const MAINTAINER = 'VerifiedJoseph';
	const PARAMETERS = array(array(
		'region' => array(
			'name' => 'Region',
			'type' => 'list',
			'values' => array(
				'All' => 'all',
				'United State' => 'en-US',
			),
			'defaultValue' => 'all',
		)
	)
);

	const CACHE_TIMEOUT = 3600;

	public function collectData() {
		$json = getContents(self::URI_JSON)
			or returnServerError('Could not request: ' . self::URI_JSON);

		$data = json_decode($json);

		foreach ($data as $post) {
			$item = array();
			$item['title'] = $post->title->rendered;
			$item['timestamp'] = $post->date;
			$item['uri'] = $post->link;
			$item['content'] = $post->content->rendered;

			$this->items[] = $item;	
		}
	}
}
