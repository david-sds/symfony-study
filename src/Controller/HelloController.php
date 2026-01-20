<?php

namespace App\Controller;

use App\Entity\Comment;
use App\Entity\MicroPost;
use App\Repository\CommentRepository;
use App\Repository\MicroPostRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HelloController extends AbstractController
{
    private array $messages = [
        "hello", "hi", "bye",
    ];

    #[Route('/', name: 'app_index')]
    public function index(MicroPostRepository $posts, CommentRepository $comments): Response
    {
        /* $post = new MicroPost(); */
        /* $post->setTitle('Hello'); */
        /* $post->setText('Hello'); */
        /* $post->setCreated(new DateTime()); */

        /* $post = $posts->find(2); */
        /* if (!$post instanceof MicroPost) { */
        /*     throw new \Exception("Post not found"); */
        /* } */
        /* $comment = $post->getComments()[0]; */
        /**/
        /* if (!$comment instanceof Comment) { */
        /*     throw new \Exception("Comment not found"); */
        /* } */
        /* $comment->setPost(null); */
        /* $comments->add($comment); */
        /* dd($post); */

        /* $comment = new Comment(); */
        /* $comment->setText('Hello'); */
        /* $comment->setPost($post); */
        /* $post->addComment($comment); */
        /* $posts->add($post); */
        /* $comments->add($comment); */

        /* $user = new User(); */
        /* $user->setEmail('email@email.com'); */
        /* $user->setPassword('12345678'); */
        /**/
        /* $profile = new UserProfile(); */
        /* $profile->setUser($user); */
        /* $profiles->add($profile); */

        /* $profile = $profiles->find(1); */
        /* $profiles->remove($profile); */


        return $this->render(
            'hello/index.html.twig',
            ['message' => implode(',', array_slice($this->messages, 0, 3))]
        );

    }

    #[Route('/messages/{id<\d+>}', name: 'app_show_one')]
    public function showOne(int $id): Response
    {
        return $this->render(
            'hello/show_one.html.twig',
            [ 'message' => $this->messages[$id] ]
        );
        /* return new Response( */
        /*     $this->messages[$id] */
        /* ); */
    }
}
