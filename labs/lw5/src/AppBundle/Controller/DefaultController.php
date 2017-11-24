<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'cards_count' => 6,
            'books' => $this->getBooks(),
        ]);
    }

    private function getBooks()
    {
        return [
            [
                'url' => 'src/images/lord_of_the_files.jpg',
                'name' => 'Lord of the Flies',
                'description' => 'Golding’s iconic 1954 novel, now with a new foreword by Lois Lowry, remains one of the greatest books ever written for young adults and an unforgettable classic for readers of any age. This edition includes a new Suggestions for Further Reading by Jennifer Buehler.At the dawn of the next world war, a...',
                'rating' => 4
            ],
            [
                'url' => 'src/images/charlottes_web.jpg',
                'name' => 'Charlotte\'s Web',
                'description' => 'Wilbur the pig is scared of the end of the season, because he knows that come that time, he will end up on the dinner table. He hatches a plan with Charlotte, a spider that lives in his pen, to ensure that this will never happen.',
                'rating' => 5
            ],
            [
                'url' => 'src/images/battlefield_of_the_mind.jpg',
                'name' => 'Battlefield of the Mind : Winning the Battle in Your Mind',
                'description' => 'Worry, doubt, confusion, depression, anger and feelings of condemnation: all these are attacks on the mind. If readers suffer from negative thoughts, they can take heart! Joyce Meyer has helped millions win these all-important battles. In her most popular bestseller ever, the beloved author and minister shows readers how to change their lives by changing their minds...',
                'rating' => 4
            ],
            [
                'url' => 'src/images/esperanza_rising.jpg',
                'name' => 'Esperanza Rising',
                'description' => 'Pura Belpré Award WinnerIRA Notable Book for a Global SocietyNew York Public Library\'s 100 Titles for Reading and SharingEsperanza thought she\'d always live with her family on their ranch in Mexico--she\'d always have fancy dresses, a beautiful home, and servants. But a sudden tragedy forces Esperanza...',
                'rating' => 2
            ],
            [
                'url' => 'src/images/in_cold_blood.jpg',
                'name' => 'In Cold Blood',
                'description' => 'With the publication of this book, Capote permanently ripped through the barrier separating crime reportage from serious literature. As he reconstructs the 1959 murder of a Kansas farm family and the investigation that led to the capture, trial, and execution of the killers, Capote generates suspense...',
                'rating' => 5
            ],
            [
                'url' => 'src/images/zodiak.jpg',
                'name' => 'Zodiac',
                'description' => 'Who was Zodiac? A serial killer who claimed 37 dead. A sexual sadist who taunted police with anonymous notes. A madman who was never apprehended. This is the first, complete account of Zodiac\'s reign of terror. Is he still out there?',
                'rating' => 5
            ]
        ];
    }
}
