<?php

namespace App\Controller;


use App\Entity\Debilidad;
use App\Entity\Pokemon;
use App\Form\PokemonTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController{

    #[Route("/pokemon/{id}", name:"getPokemon")]
    public function getPokemon(EntityManagerInterface $doctrine, $id){

        $repository = $doctrine->getRepository(Pokemon::class);
        $pokemon = $repository->find($id);


        return $this->render("Pokemon/pokemon.html.twig",["pokemon"=>$pokemon]);
    }

     #[Route("/insert/pokemon", name:"insertPokemon")]
    public function insertPokemon(EntityManagerInterface $doctrine, Request $request){

        $form=$this-> createForm(PokemonTypeForm::class);
        $form->handleRequest($request);
        if($form->isSubmitted()&& $form->isValid()){

            $pokemon=$form->getData();

            $doctrine->persist($pokemon);
            $doctrine->flush();
            return $this->redirectToRoute('listPokemons');

        }

        return $this->render("Pokemon/insertPokemon.html.twig", ["pokemonForm"=>$form]);


    }

    #[Route("/pokemons", name:"listPokemons")]
    public function listPokemons(EntityManagerInterface $doctrineSanti){

        $repositori= $doctrineSanti->getRepository(Pokemon::class);
        $pokemons = $repositori->findAll();


        return $this->render("Pokemon/listPokemons.html.twig",["pokemons"=>$pokemons]);
    }

    #[Route("/new/pokemon")]
    public function newPokemon(EntityManagerInterface $doctrineSanti)
    {
        $pokemon1 = new Pokemon();

        $pokemon1->setName("Pikaka");
        $pokemon1->setDescription("Cuando se enfurece de verdad, la llama de la punta de su cola se vuelve de color azul claro.");
        $pokemon1->setImage("https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/088.png");
        $pokemon1->setCode("15");

         $pokemon2 = new Pokemon();

        $pokemon2->setName("Pikakas");
        $pokemon2->setDescription("Cuando se enfurece de verdad, la llama de la punta de su cola se vuelve de color azul claro.");
        $pokemon2->setImage("https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/068.png");
        $pokemon2->setCode("14");

         $pokemon3 = new Pokemon();

        $pokemon3->setName("Pikakad");
        $pokemon3->setDescription("Cuando se enfurece de verdad, la llama de la punta de su cola se vuelve de color azul claro.");
        $pokemon3->setImage("https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/067.png");
        $pokemon3->setCode("16");

        $debilidad1= new Debilidad();
        $debilidad1->setName("Fuego");

        $debilidad2= new Debilidad();
        $debilidad2->setName("Agua");

        $debilidad3= new Debilidad();
        $debilidad3->setName("Hipnosis");

        $debilidad4= new Debilidad();
        $debilidad4->setName("Eléctrico");

        $pokemon3->addDebilidade($debilidad2);
        $pokemon3->addDebilidade($debilidad4);

        $pokemon1->addDebilidade($debilidad1);


        $doctrineSanti->persist($pokemon1);
        $doctrineSanti->persist($pokemon2);
        $doctrineSanti->persist($pokemon3);
        $doctrineSanti->persist($debilidad1);
        $doctrineSanti->persist($debilidad2);
        $doctrineSanti->persist($debilidad3);
        $doctrineSanti->persist($debilidad4);

        $doctrineSanti->flush();

        return new Response("pokemons insertados correctamente");
    }

}
