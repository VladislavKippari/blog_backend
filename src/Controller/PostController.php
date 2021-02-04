<?php

namespace App\Controller;
use App\Entity\Post;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;
class PostController extends AbstractController
{
    
   /**
     * @Route("/api/posts-list", name="postsList")
     */
    public function postsList(): Response
    {
        $posts=$this->getDoctrine()->getRepository(Post::class)->findAll();

        return $this->json($posts);
    }

    /**
     * @Route("/api/new-post", name="newPost")
     */
    public function newPost(Request $request): Response
    {
       $date=new \DateTime();
       
        $data = json_decode($request->getContent(), true);
        $userIdString=$data['userId'];
        $userId = (int)$userIdString;
        $user=$this->getDoctrine()->getRepository(User::class)->find(1);
        $entityManager = $this->getDoctrine()->getManager();
      

        $post = new Post();

        $post->setUser($user);
        
        $post->setTitle($data['title']);
        
        $post->setBody($data['body']);
        $post->setCreatedAt($date);
        $post->setUpdatedAt($date);

        $entityManager->persist($post);

        $entityManager->flush();

        return $this->json($post);
    }
}
