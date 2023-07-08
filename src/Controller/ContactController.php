<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormError;
use App\Entity\Messages;
use App\Form\ContactFormType;

class ContactController extends AbstractController
{
    #[Route('/', name: 'contact')]
    public function index(Request $request): Response
    {
        $message = new Messages();

        $form = $this->createForm(ContactFormType::class, $message,[
            'method' => 'POST',
        ]);
        $form->handleRequest($request);

        $successMessage = null;
        if ($form->isSubmitted())
        {
            if ($form->isValid())
            {
                $contactForm = $form->getData();
            }else{
                $form->addError(new FormError('Hiba! Kérjük töltsd ki az összes mezőt!'));
            }
        }

        return $this->render('contact\index.html.twig',[
            'form' => $form,
        ]);
    }
}

?>