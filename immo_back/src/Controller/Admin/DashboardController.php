<?php

namespace App\Controller\Admin;


use App\Entity\User;
use App\Entity\Team;
use App\Entity\Property;
use App\Entity\PropertyType;
use App\Entity\TranscationType;
use App\Entity\Photo;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;


class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Immo Project');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-list', User::class);
        yield MenuItem::linkToCrud('Property', 'fas fa-list', Property::class);
        yield MenuItem::linkToCrud('PropertyType', 'fas fa-list', PropertyType::class);
        yield MenuItem::linkToCrud('TransactionType', 'fas fa-list', TranscationType::class);
        yield MenuItem::linkToCrud('Photo', 'fas fa-list', Photo::class);
        yield MenuItem::linkToCrud('Team', 'fas fa-list', Team::class);
    }
}
