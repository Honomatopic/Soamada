<?php

namespace AssocBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AssocBundle\Entity\Message;
use AppBundle\Entity\Membre;

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
    public function envoiAction(Request $request) {
        $message = new Message();
        $form = $this->createForm('AssocBundle\Form\MessageType', $message);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid() && $request->isMethod('POST')) {
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
        return $this->render('AssocBundle:Default:index.html.twig', array('form'=>$form->createView(), 
            //'post' => $_POST,
            'message'=>$message,
            'membres'=>$membres,
            ));
    }
}
