<?php
/**
 * FAQ Page Controller
 *
 * Displays the frequently asked questions page.
 * Prepares FAQ data and renders the FAQ view.
 *
 * @package Control
 * @version 1.0
 */

/**
 * Array of frequently asked questions and answers
 *
 * @var array Array of associative arrays with 'q' and 'a' keys
 */
$faqs = [
  ["q" => "Quels sont les horaires d’ouverture ?", "a" => "Nous sommes ouverts 7j/7 de 06h à 23h."],
  ["q" => "Puis-je résilier mon abonnement ?", "a" => "Oui, la résiliation est possible selon les conditions de l’abonnement."],
  ["q" => "Proposez-vous des cours collectifs ?", "a" => "Oui : HIIT, Yoga, Cardio, Renforcement, etc."],
  ["q" => "Y a-t-il un coaching personnalisé ?", "a" => "Oui, un coach peut vous accompagner selon l’offre choisie."],
];

require __DIR__ . "/../view/faq.php";