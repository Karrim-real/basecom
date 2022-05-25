<?php
namespace App\interface;

interface ContactInterface
{
    public function getAllMesages();
    public function getMesageByUserID(int $userID);
    public function createMessage(array $messageBody);
    public function replyMesageByUserID(int $userID, array $messageBody);
    public function DeleteMesageByUserID(int $userID);

}
