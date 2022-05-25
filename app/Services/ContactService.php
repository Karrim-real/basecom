<?php
namespace App\Service;

use App\interface\ContactInterface;
use App\Models\Contactus;

class ContactService implements ContactInterface
{
    public function getAllMesages()
    {
      return Contactus::paginate(10);
    }

    public function getMesageByUserID(int $userID)
    {
      return Contactus::find($userID);
    }

    public function createMessage(array $messageBody)
    {
      return Contactus::create($messageBody);
    }

    public function replyMesageByUserID(int $userID, array $messageBody)
    {
      return Contactus::whereId($userID)->update($messageBody);
    }

    public function DeleteMesageByUserID(int $userID)
    {
      return Contactus::destroy($userID);
    }
}
