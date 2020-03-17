<?php

use App\User;
use App\Course;
use App\Category;
use Cocur\Slugify\Slugify;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $slugify = new Slugify();

        $user = new User();
        $user->email = 'florent.nicolas@ynov.com';
        $user->name = 'Florent NICOLAS';
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->email = 'axel.paris@ynov.com';
        $user->name = 'Axel PARIS';
        $user->password = Hash::make('password');
        $user->save();

        $course = new Course();
        $course->title = 'Laravel : Créer un site e-commerce de A à Z';
        $course->subtitle = 'Construire un site e-commerce complet avec le framework Laravel';
        $course->price = 49.99;
        $course->image = 'https://www.reachfirst.com/wp-content/uploads/2018/08/Web-Development.jpg';
        $course->slug = $slugify->slugify($course->title);
        $course->introduction = "Dans cette formation sur Laravel, vous allez apprendre à créer un site ecommerce de A à Z. A la fin de cette formation, vous serez capable de construire et sécuriser votre propre site web, via un système d'authentification.";
        $course->description = "Dans cette formation sur Laravel, vous allez apprendre à créer un site ecommerce de A à Z.
        A la fin de cette formation, vous serez capable de construire et sécuriser votre propre site web, via un système d'authentification.
        Vous apprendrez les notions essentielles de Laravel, telles que le routing, l'utilisation du modèle MVC, la création de Model, l'utilisation d'un moteur de template, la communication avec une base de données etc..
        Nous aborderons aussi comment gérer les relations entre models, l'enregistrements de message flash, la réalisation de paiements, l'envoi d'emails, le filtrage de données, l'authentification, la mise en place d'un dashboard admin, l'upload d'images etc..
        Nous aborderons aussi l'envoi d'email avec l'utilisation d'un webmail simplifié.
        Bon apprentissage !";

        $course->category_id = Category::all()->random(1)->first()->id;;
        
        $user = User::where('email', 'axel.paris@ynov.com')->take(1)->firstOrFail();
        $course->user_id = $user->id;

        $course->save();


        $course = new Course();
        $course->title = 'Laravel : Créer un site e-commerce de A à Z';
        $course->subtitle = 'Construire un site e-commerce complet avec le framework Laravel';
        $course->price = 49.99;
        $course->image = 'https://www.reachfirst.com/wp-content/uploads/2018/08/Web-Development.jpg';
        $course->slug = $slugify->slugify($course->title);
        $course->introduction = "Dans cette formation sur Laravel, vous allez apprendre à créer un site ecommerce de A à Z. A la fin de cette formation, vous serez capable de construire et sécuriser votre propre site web, via un système d'authentification.";
        $course->description = "Dans cette formation sur Laravel, vous allez apprendre à créer un site ecommerce de A à Z.
        A la fin de cette formation, vous serez capable de construire et sécuriser votre propre site web, via un système d'authentification.
        Vous apprendrez les notions essentielles de Laravel, telles que le routing, l'utilisation du modèle MVC, la création de Model, l'utilisation d'un moteur de template, la communication avec une base de données etc..
        Nous aborderons aussi comment gérer les relations entre models, l'enregistrements de message flash, la réalisation de paiements, l'envoi d'emails, le filtrage de données, l'authentification, la mise en place d'un dashboard admin, l'upload d'images etc..
        Nous aborderons aussi l'envoi d'email avec l'utilisation d'un webmail simplifié.
        Bon apprentissage !";

        $course->category_id = Category::all()->random(1)->first()->id;;
        
        $user = User::where('email', 'axel.paris@ynov.com')->take(1)->firstOrFail();
        $course->user_id = $user->id;

        $course->save();
    }
}
