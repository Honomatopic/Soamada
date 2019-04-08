<?php

namespace AssocBundle\Controller;

use AssocBundle\Entity\Article;
use AssocBundle\Entity\Message;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class AssocController extends Controller
{
    /**
     * Méthode affichant la page d'accueil
     *
     * @return void
     */
    public function indexAction()
    {
        return $this->render('AssocBundle:Default:index.html.twig');
    }

    /**
     * Méthode envoyant un message depuis le formulaire de contact
     *
     * @param Request $request
     * @return void
     */
    public function envoiAction(Request $request)
    {
        $message = new Message();
        $form = $this->createForm('AssocBundle\Form\MessageType', $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush($message);
            $request->getSession()->getFlashBag()->add('info', 'Message bien envoyé, on vous répondra dans les plus brefs délais');
            $message = \Swift_Message::newInstance()
                ->setSubject('Votre message sur le formulaire de contact')
                ->setFrom('admin@admin.com')
                ->setTo($message->getEmail())
                ->setBody(
                    $this->renderView(
                        'Emails/contact.html.twig'
                    ),
                    'text/html'
                )

            ;
            $this->get('mailer')->send($message);

        }
        $membres = $this->getDoctrine()->getRepository('AppBundle:Membre')->findAll();
        // Puis on retourne la vue pour qu'elle affiche la page d'accueil
        return $this->render('AssocBundle:Default:index.html.twig', array('form' => $form->createView(),
            //'post' => $_POST,
            'message' => $message,
            'membres' => $membres,
        ));
    }

    /**
     * Méthode qui affiche tous les articles du journal
     *
     * @return void
     */
    public function afficherJournalAction()
    {
        $articles = $this->getDoctrine()->getRepository('AssocBundle:Article')->findAll();
        foreach($articles as $key => $value) {
            $value->setPhoto(base64_encode(stream_get_contents($value->getPhoto())));
        }

        return $this->render('AssocBundle:Default:journal.html.twig', array('articles'=>$articles, ));
    }

    /**
     * Méthode qui permet de créer des articles pour le journal
     *
     * @param Request $request
     * @return void
     */
    public function creerArticlesAction(Request $request)
    {
        $article = new Article();
        $form = $this->createForm('AssocBundle\Form\ArticleType', $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) {
            $someNewFilename = 'article.jpg';
            $file = $form['photo']->getData();
            $file->move('/img', $someNewFilename);
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush($article);
            $request->getSession()->getFlashBag()->add('success', 'Article crée !');
            return $this->render('AssocBundle:Default:article.html.twig', array('form' => $form->createView()));
        }
        return $this->render('AssocBundle:Default:article.html.twig', array('form' => $form->createView(), 'article' => $article));
    }
}
