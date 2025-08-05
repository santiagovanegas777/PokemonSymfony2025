<?php

namespace App\Controller;


use App\Entity\Debilidad;
use App\Entity\Pokemon;
use App\Form\PokemonTypeForm;
use App\Form\UserTypeForm;
use App\Manager\PokemonManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;


class UserController extends AbstractController{


    #[Route("/insert/user", name:"insertUser")]
    public function inserUser(EntityManagerInterface $doctrine, Request $request,UserPasswordHasherInterface $encrypted){

        $form=$this-> createForm(UserTypeForm::class);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){

            $user=$form->getData();
            $password=$user->getPassword();
            $passwordEncrypted = $encrypted->hashPassword($user,$password);
            $user->setPassword($passwordEncrypted);

            $doctrine->persist($user);
            $doctrine->flush();
            return $this->redirectToRoute('listPokemons');

        }

        return $this->render("Pokemon/insertPokemon.html.twig", ["pokemonForm"=>$form]);


    }

}
