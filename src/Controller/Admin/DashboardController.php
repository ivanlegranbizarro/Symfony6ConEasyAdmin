<?php

namespace App\Controller\Admin;

use App\Entity\Category;
use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\User;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
  #[Route('/admin', name: 'admin')]
  public function index(): Response
  {
    $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
    return $this->redirect($adminUrlGenerator->setController(PostCrudController::class)->generateUrl());
  }

  public function configureDashboard(): Dashboard
  {
    return Dashboard::new()
      ->setTitle('Symfony6Curso');
  }

  public function configureMenuItems(): iterable
  {
    // yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
    yield MenuItem::linkToCrud('Category', 'fas fa-folder', Category::class);
    yield MenuItem::linkToCrud('Posts', 'fas fa-cloud', Post::class);
    yield MenuItem::linkToCrud('Comments', 'fas fa-comments', Comment::class);
    yield MenuItem::linkToCrud('Users', 'fas fa-users', User::class);

    yield MenuItem::linkToRoute('Back to the website', 'fas fa-home', 'app_home');
  }
}
