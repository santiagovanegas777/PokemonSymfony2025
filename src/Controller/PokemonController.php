<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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

}
