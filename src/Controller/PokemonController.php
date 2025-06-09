<?php

namespace App\Controller;

use App\Entity\Pokemon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController{

    #[Route("/pokemon", name:"getPokemon")]
    public function getPokemon(){

        $pokemon =[
            "name"=>"Bulbasaur",
            "description"=>"For some time after its birth, it uses the nutrients that are packed into the seed on its back in order to grow.",
            "image"=>"https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/001.png",
            "code"=>"0001"
        ];

        return $this->render("Pokemon/pokemon.html.twig",["pokemon"=>$pokemon]);
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

        $doctrineSanti->persist($pokemon1);
        $doctrineSanti->persist($pokemon2);
        $doctrineSanti->persist($pokemon3);

        $doctrineSanti->flush();

        return new Response("pokemons insertados correctamente");
    }

}
