<?php

namespace AssocBundle\Controller;

use AssocBundle\Entity\Abonne;
use AssocBundle\Entity\Article;
use AssocBundle\Entity\Message;
use AssocBundle\Entity\Don;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AssocController extends Controller {

    /**
     * Méthode permettant d'afficher la page d'accueil
     *
     * @return void
     */
    public function indexAction() {
        return $this->render('AssocBundle:Default:index.html.twig');
    }

    /**
     * Méthode envoyant un message depuis le formulaire de contact
     *
     * @param Request $request
     * @return void
     */
    public function envoiAction(Request $request) {
        $message = new Message();
        $form = $this->createForm('AssocBundle\Form\MessageType', $message);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($message);
            $em->flush($message);
            $message->getId();
            $request->getSession()->getFlashBag()->add('info', 'Message bien envoyé, on vous répondra dans les plus brefs délais');

            $message = $this->getDoctrine()->getRepository('AssocBundle:Message')->findById($message->getId());
            $contact = \Swift_Message::newInstance()
                    ->setSubject('Un nouveau message sur le formulaire de contact')
                    ->setFrom($form["email"]->getData())
                    ->setTo('honore@soamada.org')
                    ->setBody(
                    $this->renderView(
                            'Emails/contact.html.twig', array('messages' => $message)
                    ), 'text/html'
            );
            $this->get('mailer')->send($contact);
        }
        $membres = $this->getDoctrine()->getRepository('AppBundle:Membre')->findAll();
        // Puis on retourne la vue pour qu'elle affiche la page d'accueil
        return $this->render('AssocBundle:Default:index.html.twig', array('form' => $form->createView(),
                    'message' => $message,
                    'membres' => $membres,
        ));
    }

    /**
     * Méthode qui affiche tous les articles du journal
     *
     * @return void
     */
    public function afficherJournalAction() {
        $articles = $this->getDoctrine()->getRepository('AssocBundle:Article')->findAll();
        return $this->render('AssocBundle:Default:journal.html.twig', array('articles' => $articles));
    }

    /**
     * Méthode qui affiche un article en fonction de son identifiant
     * 
     * @param Article $id
     * @return type
     */
    public function selectionnerUnArticleAction(Article $id) {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('AssocBundle:Article')->find($id);
        return $this->render('AssocBundle:Default:unarticle.html.twig', array('article' => $article));
    }

    /**
     * Méthode qui permet de créer des articles pour le journal
     *
     * @param Request $request
     * @return void
     */
    public function creerArticlesAction(Request $request) {
        $article = new Article();
        $form = $this->createForm('AssocBundle\Form\ArticleType', $article);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush($article);
            $request->getSession()->getFlashBag()->add('success', 'Article crée !');
            return $this->redirectToRoute('assoc_journal');
        }
        return $this->render('AssocBundle:Default:creerarticles.html.twig', array('form' => $form->createView(), 'article' => $article));
    }

    /**
     * Méthode qui permet d'éditer un article dans le journal
     *
     * @param Request $request
     * @param Article $articles
     * @param Article $id
     * @return void
     */
    public function editerArticlesAction(Request $request, Article $article, Article $id) {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository('AssocBundle:Article')->find($id);
        if (null == $article) {
            throw new NotFoundException("L'article avec l'id " . $id . "n'existe pas");
        }
        $form = $this->createForm('AssocBundle\Form\ArticleType', $article);
        $form->handleRequest($request);
        if ($form->isValid() && $request->isMethod('POST')) {
            $em->flush($article);
            $request->getSession()->getFlashBag()->add('success', 'Article modifié !');
            return $this->redirectToRoute('assoc_journal', array('id' => $article->getId()));
        }
        return $this->render('AssocBundle:Default:editerarticles.html.twig', array('form' => $form->createView(), 'article' => $article));
    }

    /**
     * Méthode permettant de supprimer un article dans le journal
     *
     * @param Request $request
     * @param Article $articles
     * @return void
     */
    public function supprimerArticlesAction(Request $request, Article $articles) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($articles);
        $em->flush();
        $request->getSession()->getFlashBag()->add('success', 'Article supprimé !');
        return $this->redirectToRoute('assoc_journal');
    }

    /**
     * Méthode permettant d'inscrire à la Newsletter
     *
     * @return void
     */
    public function inscriptionNewsletterAction(Request $request) {
        $abonnes = new Abonne();
        $form = $this->createForm('AssocBundle\Form\AbonneType', $abonnes);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($abonnes);
            $em->flush($abonnes);
            $request->getSession()->getFlashBag()->add('success', 'Inscription à la newsletter réussie');
            $lettreinfo = \Swift_Message::newInstance()
                    ->setSubject('La lettre d\'information')
                    ->setFrom('admin@admin.com')
                    ->setTo($abonnes->getEmailabonne())
                    ->setBody(
                    $this->renderView(
                            'Emails/inscription.html.twig'
                    ), 'text/html'
            );
            $this->get('mailer')->send($lettreinfo);
            return $this->render('AssocBundle:Default:inscriptionnews.html.twig', array('form' => $form->createView()));
        }
        return $this->render('AssocBundle:Default:inscriptionnews.html.twig', array('form' => $form->createView(), 'abonnes' => $abonnes));
    }

    /**
     * Méthode affichant la liste des abonnées à la newsletter
     *
     * @return void
     */
    public function listeAbonnesAction() {
        $abonnes = $this->getDoctrine()->getRepository('AssocBundle:Abonne')->findAll();
        return $this->render('AssocBundle:Default:listeabonnenews.html.twig', array('abonnes' => $abonnes));
    }

    /**
     * Méthode qui envoi une lettre d'information
     *
     * @param Request $request
     * @return void
     */
    public function envoyerNewsletterAction(Request $request) {
        $abonnes = $this->getDoctrine()->getRepository('AssocBundle:Abonne')->findAll();
        $articles = $this->getDoctrine()->getRepository('AssocBundle:Article')->findAll();
        foreach ($abonnes as $abonne) {
            $lettreinfo = \Swift_Message::newInstance()
                    ->setSubject('La lettre d\'information')
                    ->setFrom('admin@admin.com')
                    ->setTo($abonne->getEmailabonne())
                    ->setContentType("text/html")
                    ->setBody($this->renderView(
                            'Emails/lettreinfos.html.twig', array('articles' => $articles)), 'text/html'
            );
        }
        $this->get('mailer')->send($lettreinfo);
        $request->getSession()->getFlashBag()->add('success', 'Envoi des news réussie');
        return $this->render('Emails/lettreinfos.html.twig', array('articles' => $articles, 'abonnes' => $abonnes));
    }

    /**
     * Méthode qui génère l'article en PDF
     * 
     * @param Request $request
     * @return Response
     */
    public function genererArticleenPdfAction(Request $request, Article $id) {
        $article = $this->getDoctrine()->getRepository('AssocBundle:Article')->find($id);
        $snappy = $this->get("knp_snappy.pdf");
        $html = $this->renderView('AssocBundle:Default:unarticle.html.twig', array('article' => $article));
        $nomdufichier = "article_de_l'association_en_pdf";
        return new Response($snappy->getOutputFromHtml($html), 200, array('Content-Type' => 'application/pdf', 'Content-Disposition' => 'inline; filename="' . $nomdufichier . '".pdf'));
    }

    /**
     * Méthode qui enregistre un don en base de données
     * 
     * @param Request $request
     * @return type
     */
    /*public function creerDonAction(Request $request) {
        $donateur = new don();
        $form = $this->createForm('AssocBundle\Form\DonType', $donateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($donateur);
            $em->flush($donateur);
            return $this->render('AssocBundle:Default:donsuite.html.twig', array('donateur' => $donateur));
        }

        //return $this->redirectToRoute('assoc_effectuerdon', array('id' => $donateur->getId()));
        return $this->render('AssocBundle:Default:don.html.twig', array('form' => $form->createView()));
    }*/

    /**
     * Méthode qui valide les informations du donateur
     * 
     * @param Request $request
     * @param Don $id
     * @param Don $donateur
     * @return type
     */
    /*public function confirmerDonAction(Request $request, Don $donateur, Don $id) {
        $em = $this->getDoctrine()->getManager();
        $donateur = $em->getRepository('AssocBundle:Don')->find($id);
        \Stripe\Stripe::setApiKey("sk_test_ParFvEdERjF2CoBJWKyHoBno00war72AiD");
        \Stripe\Charge::create(array("amount" => 500,
            "currency" => "eur",
            "source" => $request->$request->get('stripeToken'),
            "description" => "Paiement en ligne"));
        return $this->render('AssocBundle:Default:doneffectue.html.twig', array('donateur' => $donateur, 'id' => $donateur->getId()));
    }*/

    /**
     * Méthode qui valide les informations bancaires du donateur
     * 
     * @param Don $donateur
     * @param Don $id
     * @return type
     */
    /*public function validerDonAction(Request $request, Don $donateur, Don $id) {
        $em = $this->getDoctrine()->getManager();
        $donateur = $em->getRepository('AssocBundle:Don')->find($id);
        $request->getSession()->getFlashBag()->add('success', 'Don validé !');
        return $this->render('AssocBundle:Default:doneffectue.html.twig', array('donateur' => $donateur));
    }*/

    /**
     * Méthode qui génère la liste des abonnés à la newsletter en format CSV
     */
    public function exporterEnCsvAction() {

        $em = $this->getDoctrine()->getManager();
        $abonnes = $em->getRepository('AssocBundle:Abonne')->findAll();
        $writer = $this->container->get('egyg33k.csv.writer');
        $csv = $writer::createFromFileObject(new \SplTempFileObject());
        $csv->insertOne(['id', 'emailabonne', 'Membre_id']);
        foreach ($abonnes as $abonne) {
            $csv->insertOne([$abonne->getId(), $abonne->getEmailabonne(), $abonne->getMembre()]);
        }
        $csv->output('abonnes.csv');
        exit();
    }

}
