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
        // Création du formulaire
        $form = $this->createForm(RegistrationFormType::class, $user);

        // Ajout de nouveaux attributs dans le formulaire, pour le nom et prénom
        $form->add('nom', TextType::class, array(
            'mapped' => false,
            'label' => 'nom'));
        $form->add('prenom', TextType::class, array(
            'mapped' => false,
            'label' => 'prenom'));

        // Reçois la requete du formulaire (si il y a)
        $form->handleRequest($request);

        // Si le formulaire a été validé et est valide
        if ($form->isSubmitted() && $form->isValid()) {
            // Encode le mot de passe
            $user->setPassword(
            $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // Création du touriste
            $user->setRoles(['ROLE_TOURISTE']);
            $touriste = new Touriste();
            $touriste->setNom($form->get("nom")->getData());
            $touriste->setPrenom($form->get("prenom")->getData());
            $touriste->setUser($user);
            $user->setTouriste($touriste);

            // Ajout à la base de données
            $entityManager->persist($user);
            $entityManager->persist($touriste);
            $entityManager->flush();

            return $this->redirectToRoute('connexion');
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
