<?php

namespace App\Controller;

use App\Entity\Touriste;
use App\Entity\User;
use App\Form\RegistrationFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class RegistrationController extends AbstractController
{
    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, EntityManagerInterface $entityManager): Response
    {
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->add('nom', TextType::class, array(
            'mapped' => false,
            'label' => 'nom'));
        $form->add('prenom', TextType::class, array(
            'mapped' => false,
            'label' => 'prenom'));
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );
            $user->setRoles(['ROLE_TOURISTE']);
            $touriste = new Touriste();
            $touriste->setNom($form->get("nom")->getData());
            $touriste->setPrenom($form->get("prenom")->getData());
            $touriste->setUser($user);
            $user->setTouriste($touriste);
            $entityManager->persist($user);
            $entityManager->persist($touriste);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $this->redirectToRoute('connexion');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
