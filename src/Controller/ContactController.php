<?php
namespace App\Controller;

use App\Entity\Messages;
use App\Form\ContactFormType;
use App\Repository\MessagesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/', name: 'contact')]
    public function index(Request $request, MessagesRepository $messagesRepository): Response
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
                $messagesRepository->save($message, true);
                $this->addFlash('success', 'Köszönjük szépen a kérdésedet.
                Válaszunkkal hamarosan keresünk a megadott e-mail címen.');
                return $this->redirectToRoute('contact');
            }else{
                $form->addError(new FormError('Hiba! Kérjük töltsd ki az összes mezőt!'));
            }
        }

        return $this->render('contact\index.html.twig',[
            'form' => $form,
        ]);
    }
}
