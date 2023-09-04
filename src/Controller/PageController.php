<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\CommentType;

use App\Repository\PostRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PageController extends AbstractController
{
  #[Route('/', name: 'app_home')]
  public function home(PostRepository $post): Response
  {
    return $this->render('page/home.html.twig', [
      'posts' => $post->findLatest(),
    ]);
  }

  #[Route('/blog/{slug}', name: 'app_post')]
  public function post(Post $post): Response
  {
    $form = $this->createForm(CommentType::class);
    return $this->render('page/post.html.twig', [
      'post' => $post,
      'form' => $form->createView(),
    ]);
  }
}
