<?php

namespace App\DataFixtures;

use App\Entity\Pokemon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PokemonFixtures extends Fixture

{
       protected $httpClient;


    public  function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }


    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        for($i=0; $i<100; $i++){
        $randId = rand(100,999);

       $response =  $this->httpClient->request("GET","https://pokeapi.co/api/v2/pokemon/$randId");

       $content = json_decode($response->getContent(),true);

       $pokemon = new Pokemon();
       $pokemon->setName($content['name']);
       $pokemon->setImage("https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/$randId.png");
       $pokemon->setCode($randId);

       $manager->persist($pokemon);

        $manager->flush();
        }

    }
}
