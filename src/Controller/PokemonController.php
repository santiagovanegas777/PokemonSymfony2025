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
    public function listPokemons(){

        $pokemons = [
           [
            "name"=>"Bulbasaur",
            "description"=>"Tras nacer, crece alimentándose durante un tiempo de los nutrientes que contiene el bulbo de su lomo.",
            "image"=>"https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/001.png",
            "code"=>"0001"
           ],
           [
            "name"=>"Ivysaur",
            "description"=>"Cuanta más luz solar recibe, más aumenta su fuerza y más se desarrolla el capullo que tiene en el lomo.",
            "image"=>"https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/002.png",
            "code"=>"0002"
           ],
           [
            "name"=>"Venusaur",
            "description"=>"Puede convertir la luz del sol en energía. Por esa razón, es más poderoso en verano.",
            "image"=>"https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/003.png",
            "code"=>"0003"
           ],
           [
            "name"=>"Charmander",
            "description"=>"La llama de su cola indica su fuerza vital. Si está débil, la llama arderá más tenue.",
            "image"=>"https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/004.png",
            "code"=>"0004"
           ],
           [
            "name"=>"Charmeleon",
            "description"=>"Al agitar su ardiente cola, eleva poco a poco la temperatura a su alrededor para sofocar a sus rivales.",
            "image"=>"https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/005.png",
            "code"=>"0005"
           ],
           [
            "name"=>"Charizard",
            "description"=>"Cuando se enfurece de verdad, la llama de la punta de su cola se vuelve de color azul claro.",
            "image"=>"https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/006.png",
            "code"=>"0006"
        ]
        ];

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
