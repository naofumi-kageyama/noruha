<?php
function noruha_fetch_ogp_data($url, $cacheTime = 3600) {
    $cacheDir = get_stylesheet_directory() . '/cache';

    if (!is_dir($cacheDir)) {
        mkdir($cacheDir, 0755, true);
    }

    $cacheFile = $cacheDir . '/ogp_' . md5($url) . '.json';

    if (file_exists($cacheFile) && (time() - filemtime($cacheFile)) < $cacheTime) {
        $cachedData = file_get_contents($cacheFile);
        if ($cachedData !== false) {
            $parsedData = json_decode($cachedData, true);
            if (is_array($parsedData)) {
                return $parsedData;
            }
        }
    }

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; Discordbot/2.0; +https://discordapp.com)');

    $html = curl_exec($ch);
    curl_close($ch);

    if (!$html) return [];

    libxml_use_internal_errors(true);
    $dom = new DOMDocument();
    $dom->loadHTML('<?xml encoding="UTF-8">' . $html);
    libxml_clear_errors();

    $xpath = new DOMXPath($dom);
    $ogpMetaTags = $xpath->query('//meta[starts-with(@property, "og:")]');

    $ogpData = [];
    foreach ($ogpMetaTags as $tag) {
        if (!($tag instanceof DOMElement)) continue;
        $property = str_replace('og:', '', $tag->getAttribute('property'));
        $ogpData[$property] = $tag->getAttribute('content');
    }

    if (!empty($ogpData)) {
        file_put_contents($cacheFile, json_encode($ogpData, JSON_UNESCAPED_UNICODE));
    }

    return $ogpData;
}

function noruha_register_ogp_endpoint() {
    register_rest_route('noruha/v1', '/ogp', [
        'methods'             => 'GET',
        'callback'            => 'noruha_ogp_callback',
        'permission_callback' => '__return_true',
        'args'                => [
            'url' => [
                'required'          => true,
                'type'              => 'string',
                'sanitize_callback' => 'esc_url_raw',
                'validate_callback' => function ($value) {
                    return filter_var($value, FILTER_VALIDATE_URL) !== false;
                },
            ],
        ],
    ]);
}
add_action('rest_api_init', 'noruha_register_ogp_endpoint');

function noruha_ogp_callback(WP_REST_Request $request) {
    $url       = $request->get_param('url');
    $fetch_url = str_replace('x.com', 'fxtwitter.com', $url);
    $ogp       = noruha_fetch_ogp_data($fetch_url);
    return rest_ensure_response($ogp);
}
