<?php

namespace App\Controller\Auth;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\Model;
use Nelmio\ApiDocBundle\Annotation\Security;
use OpenApi\Attributes as OA;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{   
     /**
     * Return the token bearer por an user 
     *
     * @Route("/api/auth/login", methods={"POST"})
     * @OA\Response(
     *     response=200,
     *     description="Returns the token of an user",
     *     @OA\JsonContent(
     *        type="array",
     *        @OA\Items(
     *            @OA\Property(
     *                         property="username",
     *                         type="string",
     *                         example="aaxis"
     *                      ),
     *                      @OA\Property(
     *                         property="password",
     *                         type="string",
     *                         example="test"
     *                      )
     *            )
     *        )
     *     )
     * )
     * @OA\Parameter(
     *     name="order",
     *     in="query",
     *     description="The field used to order rewards",
     *     @OA\Schema(type="string")
     * )
     * @OA\Tag(name="Login")
     */
    public function __invoke(Request $request): JsonResponse
    {
        if ($request->get('username') == null || $request->get('password') == null) {
            return $this->json([
                'message' => 'Missing credentials',
            ], Response::HTTP_UNAUTHORIZED);
        }
    }
}
