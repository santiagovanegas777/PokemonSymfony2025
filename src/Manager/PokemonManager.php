<?php

namespace App\Manager;

use Symfony\Component\HttpFoundation\File\UploadedFile;

class PokemonManager {

    public function uploadImage(UploadedFile $file , $targetDir){

         $newFilename = uniqid().'.'.$file->guessExtension();

                $file->move(
                $targetDir,
                $newFilename

            );

              //sustuiriamos el "move"  por el upload a cloudinary

            return '/images/'.$newFilename;

    }
}
