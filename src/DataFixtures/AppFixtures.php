<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Agenda;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AppFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        // Creare un utente admin
        $user = new User();
        $user->setEmail("admin@eglise.com");
        $hashedPassword = $this->passwordHasher->hashPassword($user, 'motdepasse123');
        $user->setPassword($hashedPassword);
        $user->setRoles(['ROLE_ADMIN']);
        $manager->persist($user);

        // Creare eventi per la chiesa
        $eventTitles = [
            'Messe du Dimanche',
            'Réunion de prière',
            'Conférence spirituelle',
            'Étude biblique',
            'Baptême en groupe',
            'Concert gospel',
            'Prière pour la paix',
            'Retraite spirituelle',
            'Célébration de Noël',
            'Pâques - Célébration de la résurrection'
        ];

        $locations = [
            'Église principale',
            'Salle de prière',
            'Jardin de l\'église',
            'Salle des jeunes',
            'Salle de conférence'
        ];

        for ($i = 0; $i < 10; $i++) {
            $agenda = new Agenda();
            $agenda->setTitle($eventTitles[$i]);

            // Immagina che la chiesa organizzi eventi un giorno specifico della settimana
            $eventDate = new \DateTime();
            $eventDate->setDate(2025, 1, $i + 1); // Eventi dal 1° gennaio 2025
            $agenda->setEventDate($eventDate);

            // Orari realistici per un evento di chiesa
            $startTime = new \DateTime('10:00:00');
            $startTime->modify("+$i hours");  // Aggiungiamo vari orari per gli eventi
            $agenda->setStartTime($startTime);

            $endTime = new \DateTime('12:00:00');
            $endTime->modify("+$i hours"); // Orario di fine in base al tipo di evento
            $agenda->setEndTime($endTime);

            // Descrizione dell'evento
            $agenda->setDescription("Rejoignez-nous pour $eventTitles[$i]. Un moment spécial de prière et de communion.");
            
            // Impostazione della location in base a una lista
            $agenda->setLocation($locations[$i % count($locations)]);

            // Eventi online o in presenza
            $agenda->setIsOnline($i % 2 === 0 ? 'oui' : 'non');

            $manager->persist($agenda);
        }

        $manager->flush();
    }
}
