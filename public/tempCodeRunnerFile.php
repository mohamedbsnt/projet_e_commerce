<?php
// generate-feed.php

// Récupération du JSON
$json = @file_get_contents('https://medhant.devaito.com/api/fetch-all-products');
$data = json_decode($json, true);
if (empty($data['products'])) {
    header('HTTP/1.1 500 Internal Server Error');
    echo 'Erreur de récupération des produits';
    exit;
}

// Création du flux XML
$xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><rss xmlns:g="http://base.google.com/ns/1.0" version="2.0"><channel></channel></rss>');
$channel = $xml->channel;
$channel->addChild('title', 'Catalogue Devaito');
$channel->addChild('link', 'https://medhant.devaito.com/api/fetch-all-products');

// Boucle sur les produits
foreach ($data['products'] as $p) {
    $item = $channel->addChild('item');
    $item->addChild('g:id', $p['id'], 'http://base.google.com/ns/1.0');
    $item->addChild('g:title', htmlspecialchars($p['name']), 'http://base.google.com/ns/1.0');
    $item->addChild('g:description', 'Voir ce produit sur Devaito', 'http://base.google.com/ns/1.0');
    $item->addChild('g:link', $p['url'], 'http://base.google.com/ns/1.0');
    $item->addChild('g:image_link', $p['image'], 'http://base.google.com/ns/1.0');
    $item->addChild('g:price', $p['price'].' '.$p['devise'], 'http://base.google.com/ns/1.0');
    $item->addChild('g:availability', 'in stock', 'http://base.google.com/ns/1.0');
}

// Envoi du XML au navigateur
header('Content-Type: application/xml; charset=UTF-8');
echo $xml->asXML();