<?php

namespace App\Controller;
use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;
class UserController extends AbstractController
{
     /**
     * @Route("/api/new-user", name="new-user")
     */
    public function newUser(Request $request): Response
    {
        $data = json_decode($request->getContent(), true);
        $users=$this->getDoctrine()->getRepository(User::class)->findAll();
        foreach ( $users as $user ) {
            if ( $data['email'] == $user->getEmail() && $data['password'] == $user->getPassword() && $data['username'] == $user->getUsername()) {
                
                    throw new HttpException(404, "User already exists.");
               
                
            } 
        }
        $entityManager = $this->getDoctrine()->getManager();

        $user = new User();
        $user->setUsername($data['username']);
        $user->setEmail($data['email']);
        $user->setRoles([$data['role']]);
        $user->setPassword($data['password']);
        

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return $this->json($user);
    }
     /**
     * @Route("/api/user-list", name="userList")
     */
    public function userList(): Response
    {
        $users=$this->getDoctrine()->getRepository(User::class)->findAll();
        return $this->json($users);
    }
    /**
     * @Route("/api/user-login", name="userLogin")
     */
    public function userLogin(Request $request): Response
    {
        
        $data = json_decode($request->getContent(), true);
        $users=$this->getDoctrine()->getRepository(User::class)->findAll();
        foreach ( $users as $user ) {
            if ( $data['email'] == $user->getEmail() && $data['password'] == $user->getPassword()) {
                return $this->json($user);
            } 
        }
        throw new HttpException(404, "Wrong username or password!");

    }
}
