<?php 

namespace App\Service;
use Illuminate\Support\Str;
class PhoneBook
{

    public static function searchByName(string $name) : array
    {
        return self::searchBy('name', $name);   
    }

    public static function searchByCity(string $name) : array
    {
        return self::searchBy('city', $name);   
    }

    public static function searchByEmail(string $name) : array
    {
        return self::searchBy('email', $name);   
    }

    public static function searchByPhone(string $name) : array
    {
        return self::searchBy('phone', $name);   
    }


    public static function searchBy(string $key , string $value) : array
    {

        return collect(self::contacts())->filter(function ($contact) use ($key, $value){
            return Str::contains(strtolower($contact[$key]), strtolower($value));
        })->all();

        /*
        //PHP 7
        return collect(self::contacts())
                ->filter(fn($contact) => Str::contains($contact['name'], $name))
                ->all();
        */
   
    }

    public static function contacts() : array
    {
        return [
            [
                'name'=>'John Doe',
                'email'=>'johndoe@example.com',
                'phone'=>'123456789',
                'city'=>'Quebec, CA'
            ],
            [
                'name'=>'Jane Doe',
                'email'=>'janedoe@example.com',
                'phone'=>'987456321',
                'city'=>'Quebec, CA'
            ],
            [
                'name'=>'Franck Bertrant',
                'email'=>'franckbertrant01@example.com',
                'phone'=>'458793332147',
                'city'=>'Paris, FR'
            ],
            [
                'name'=>'MAPANGOU Rigobert',
                'email'=>'franckbertrant01@example.com',
                'phone'=>'458793332147',
                'city'=>'Paris, FR'
            ],
            [
                'name'=>'Beatrice Lea MOUSSAVOU',
                'email'=>'bealea@example.com',
                'phone'=>'458793332147',
                'city'=>'Douala, CAM'
            ],
        ];
    }
}