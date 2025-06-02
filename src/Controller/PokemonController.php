<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PokemonController extends AbstractController{

    #[Route("/pokemon")]
    public function getPokemon(){

        $pokemon =[
            "name"=>"Bulbasaur",
            "description"=>"For some time after its birth, it uses the nutrients that are packed into the seed on its back in order to grow.",
            "image"=>"https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/001.png",
            "code"=>"0001"
        ];

        return $this->render("Pokemon/pokemon.html.twig",["pokemon"=>$pokemon]);
    }

}
