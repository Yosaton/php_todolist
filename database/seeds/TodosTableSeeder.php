<?php

use Illuminate\Database\Seeder;
use App\Todo;


class TodosTableSeeder extends Seeder{
 /**
  * Run the database seeds.
  *
  * @return void
  */
 public function run(){
  Todo::truncate();
  factory(Todo::class, 4)->create();
 }
}