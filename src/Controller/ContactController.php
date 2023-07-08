<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Messages;
use App\Form\ContactFormType;

class ContactController extends AbstractController
{
    #[Route('/', name: 'contact')]
    public function index(): Response
    {
        $message = new Messages();
        $form = $this->createForm(ContactFormType::class, $message);
        return $this->render('contact\index.html.twig',[
            'form' => $form,
        ]);
    }
}

?>