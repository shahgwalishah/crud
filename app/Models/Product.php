<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;

    protected  $fillable = [
      'title' , 'description' , 'price'
    ];

    public static function createProductData($data) {
        DB::beginTransaction();
        try {
            self::create([
                'title' => $data['title'],
                'description' => $data['description'],
                'price' => $data['price']
            ]);
            DB::commit();
            return collect([
                'status' => true,
                'message' => 'product data added successfully .. !'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return collect([
               'status' => false,
               'message' => $e->getMessage()
            ]);
        }
    }

    public static function updateProductData($data) {
        DB::beginTransaction();
        try {
            self::where('id','=',$data['id'])->update([
                'title' => $data['title'],
                'description' => $data['description'],
                'price' => $data['price']
            ]);
            DB::commit();
            return collect([
                'status' => true,
                'message' => 'product update successfully .. !'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return collect([
               'status' => false,
               'message' => $e->getMessage()
            ]);
        }
    }
}
