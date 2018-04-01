<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\ProfilEditType;
use App\Form\UserType;
use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegistrationController extends Controller
{
    /**
     * @Route("/register", name="user_registration")
     */
    public function index(Request $request, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new Users();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){ //si form envoyer et valide
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword()); //cryptage mdp
            $user->setPassword($password);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush(); //envoie dans la base de donnée

            return $this->redirectToRoute('profil');
        }

        return $this->render('registration/register.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/profil", name="profil")
     */
    public function profil (UsersRepository $usersRepository)
    {
        $userConnected = $this->getUser();

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(Users::class)->find($userConnected->getId());

        return $this->render('registration/profil.html.twig', ['user'=>$user]);
    }

    /**
     * @Route("/profil/edit", name="profil_edit")
     */
    public function profilEditAction (Request $request, UserPasswordEncoderInterface $encoder)
    {
        $userConnected = $this->getUser();

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(Users::class)->find($userConnected->getId());

        $form = $this->createForm(ProfilEditType::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            /** @var Users $editUser */
            $editUser = $form->getData();

            $plainpw = $editUser->getPlainPassword();

            $encode = $encoder->encodePassword($editUser, $plainpw);
            $editUser->setPassword($encode);

            $em = $this->getDoctrine()->getManager();
            $em->persist($editUser);
            $em->flush();

            return $this->redirectToRoute('profil');
        }

        return $this->render('registration/profiledit.html.twig', ['form'=>$form->createView()]);
    }
}
