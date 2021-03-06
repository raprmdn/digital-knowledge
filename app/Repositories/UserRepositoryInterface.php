<?php

namespace App\Repositories;

interface UserRepositoryInterface {

   public function findUserById($id);
   public function updatePersonalInformation($user, $attribute);
   public function updatePassword($user, $attribute);
   public function updateEmail($user, $attribute);
   public function updatePhotoProfile($user, $attribute);

}