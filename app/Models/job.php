<?
namespace App\Models;
use Arr;
use PhpParser\Node\Expr\ArrayItem;

class job{
    public static function all(): array
    {
        return  [
            [
                'id' => 1,
                'title' => 'Director',
                'salary' => '$50,00',
            ],
        
            [
                'id' => 2,
                'title' => 'Programmer',
                'salary' => '100,000'
            ],
            [
                'id' => 3,
                'title' => 'Teacher',
                'salary' => '40,000'
            ]
        ];
    }
    public static function find (int $id): array
    {
       return Arr::first(static ::all(), fn($job) => $job['id'] == $id);
    
       if (! $job) {
        abort(404); // Geeft 404 als $job null is
    }
    } 


 }