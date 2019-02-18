<?php
/**
 * Created by PhpStorm.
 * User: gauthierbosson
 * Date: 10/02/2019
 * Time: 18:41
 */

namespace App\Controller;
use ApiPlatform\Core\Bridge\Symfony\Validator\Validator;
use ApiPlatform\Core\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


class AuthController extends AbstractController
{

    /**
     * @param Request $request
     * @param UserPasswordEncoderInterface $encoder
     * @return Response
     */
    public function register(Request $request, UserPasswordEncoderInterface $encoder,ValidatorInterface $validator): Response
    {
        $em = $this->getDoctrine()->getManager();
        /** @var Validator $validator */
        try {
            $username = $request->request->get('_username');
            $password = $request->request->get('_password');
            $user = new User($username);
            $user->setPassword($password);
            $validator->validate($user);
            $em->persist($user);
            $em->flush();
            return $this->json($user,JsonResponse::HTTP_CREATED);
        }catch (ValidationException $exception) {
            return $this->json(["errors" => 'error'], JsonResponse::HTTP_BAD_REQUEST);
        }
    }
    public function api(): Response
    {
        return new Response(sprintf('Logged in as %s', $this->getUser()->getUsername()));
    }
}