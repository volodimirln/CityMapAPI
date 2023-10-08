<?php

namespace App\Http\Controllers;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PlaceController extends Controller
{
    public function start(){

        if(!Schema::hasTable('Categories')){
        Schema::create('Categories', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description', 1000)->nullable();
        });
    }

    if(!Schema::hasTable('Curators')){
        Schema::create('Curators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('status');
            $table->string('social_network');
        });
    }
    if(!Schema::hasTable('Cities')){
        Schema::create('Cities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description', 1000)->nullable();
            $table->string('coordinates')->nullable();
            $table->string('country');
        });
    }
    if(!Schema::hasTable('Areas')){
        Schema::create('Areas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description', 1000)->nullable();
            $table->string('coordinates');
            $table->unsignedBigInteger('curator_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')->references('id')->on('Cities');
            $table->foreign('curator_id')->references('id')->on('Curators');
        });
    }

   

    if(!Schema::hasTable('Places')){
            Schema::create('Places', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('description', 1000)->nullable();
                $table->integer("popylarity")->nullable();
                $table->string("advice")->nullable();
                $table->unsignedBigInteger('area_id');
                $table->unsignedBigInteger('category_id');
                $table->string('address');
                $table->foreign('category_id')->references('id')->on('Categories');
                $table->foreign('area_id')->references('id')->on('Areas');
            });
        }

        if(!Schema::hasTable('CuratorsPhotos')){
            Schema::create('CuratorsPhotos', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('path');
                $table->unsignedBigInteger('curator_id');
                $table->foreign('curator_id')->references('id')->on('Curators');
            });
        }

        if(!Schema::hasTable('PlacesPhotos')){
            Schema::create('PlacesPhotos', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('path');
                $table->unsignedBigInteger('place_id');
                $table->foreign('place_id')->references('id')->on('Places');
            });
        }

        if(!Schema::hasTable('CityPhotos')){
            Schema::create('CityPhotos', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('path');
                $table->unsignedBigInteger('city_id');
                $table->foreign('city_id')->references('id')->on('Cities');
            });
        }

        if(!Schema::hasTable('CategoriesPhotos')){
            Schema::create('CategoriesPhotos', function (Blueprint $table) {
                $table->id();
                $table->string('title')->nullable();
                $table->string('path');
                $table->unsignedBigInteger('category_id');
                $table->foreign('category_id')->references('id')->on('Categories');
            });
        }

        if(!Schema::hasTable('Flights')){
            Schema::create('Flights', function (Blueprint $table) {
                $table->id();
                $table->string("chat_id");
                $table->string("type");
                $table->string("class")->nullable();
                $table->dateTime("date")->nullable();
                $table->string("username");
                $table->timestamps();
            });
        }

        if(!Schema::hasTable('Tours')){
            Schema::create('Tours', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('place_id');
                $table->string("descriptin", 1000);
                $table->datetime("visiting_time");
                $table->timestamps();
                $table->foreign('place_id')->references('id')->on('Places');
            });
        }
    }
}
